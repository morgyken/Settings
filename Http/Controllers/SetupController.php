<?php

namespace Ignite\Settings\Http\Controllers;

use Ignite\Core\Http\Controllers\AdminBaseController;
use Ignite\Core\Library\Validation;
use Ignite\Settings\Entities\Clinics;
use Ignite\Settings\Entities\Insurance;
use Ignite\Settings\Entities\Practice;
use Ignite\Settings\Entities\Schemes;
use Ignite\Settings\Http\Requests\CreateClinicRequest;
use Ignite\Settings\Http\Requests\CreateInsuranceRequest;
use Ignite\Settings\Http\Requests\CreateInsuranceSchemesRequest;
use Ignite\Settings\Http\Requests\CreatePracticeRequest;
use Ignite\Settings\Library\SetupFunctions;
use Ignite\Settings\Entities\CompanyPrice;
use Illuminate\Http\Request;

class SetupController extends AdminBaseController {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function practice() {
        $this->data['practice'] = Practice::all()->first();
        return view('settings::practice', ['data' => $this->data]);
    }

    /**
     * @param CreatePracticeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save_practice(CreatePracticeRequest $request) {
        if (SetupFunctions::new_update_practice($request)) {
            flash('Practice Updated');
        }
        return redirect()->route('settings.practice');
    }

    /**
     * @param null $edit_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function clinics($edit_id = null) {
        $this->data['clinics'] = Clinics::wherePractice(config('practice.id'))->get();
        $this->data['clinic_model'] = Clinics::findOrNew($edit_id);
        return view('settings::clinics', ['data' => $this->data, 'id' => $edit_id]);
    }

    public function save_clinic(CreateClinicRequest $request, $edit_id = null) {
        if (SetupFunctions::add_clinic($request, $edit_id)) {
            flash('Facility saved');
        }
        return redirect()->route('settings.clinics');
    }

    /**
     * @param null $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insurance($company = null) {
        $this->data['companies'] = Insurance::all();
        $this->data['model'] = Insurance::findOrNew($company);
        return view('settings::insurance', ['data' => $this->data, 'id' => $company]);
    }

    /**
     * @param null $company procedure prices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function CompanyProcedures(Request $request) {
        if ($request->isMethod('post')) {
            $this->saveCoProcedure($request);
        }
        $this->data['procedures'] = CompanyPrice::whereCompany($request->company)->get();
        $this->data['model'] = Insurance::findOrNew($request->company);
        return view('settings::company_procedures', ['data' => $this->data, 'id' => $request->company]);
    }

    public function purge_co_price(\Illuminate\Http\Request $request) {
        $procedure = $request->procedure;
        $price = $request->price;
        $co = $request->co;
        try {
            $cprice = \Ignite\Settings\Entities\CompanyPrice::whereCompany($co)->whereProcedure($procedure)->get(); //findOrNew(['company' => $co, 'procedure' => $procedure]); //whereCompany($co)->whereProcedure($procedure)->get();
            foreach ($cprice as $c) {
                $c->price = $price;
                $c->delete();
            }
            flash("Price(s) Saved", 'success');
        } catch (\Exception $ex) {
            flash("Price could not be saved", 'danger');
        }
        return back();
    }

    /**
     * Build an index of items dynamically
     * @return array
     */
    private function get_selected_stack(Request $request) {
        $stack = [];
        foreach ($request->input() as $key => $one) {
            if (starts_with($key, 'item')) {
                $stack[] = substr($key, 4);
            }
        }
        return $stack;
    }

    function saveCoProcedure(Request $request) {
        try {
            $set = $this->get_selected_stack($request);
            foreach ($set as $item) {
                $procedure = "item" . $item;
                $price = 'price' . $item;
                $cp = new CompanyPrice();
                $cp->procedure = $request->$procedure;
                $cp->company = $request->company;
                $cp->price = $request->$price;
                $cp->save();
            }
        } catch (\Exception $e) {
            //sip coffee
        }
    }

    /**
     * @param CreateInsuranceRequest $request
     * @param null $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save_insurance(CreateInsuranceRequest $request, $company = null) {
        if (SetupFunctions::add_insurance_company($request, $company)) {
            flash("Insurance company saved");
        }
        return redirect()->route('settings.companies');
    }

    /**
     * @param null $parent_company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schemes($parent_company = null) {
        $this->data['schemes'] = empty($parent_company) ?
                Schemes::all() :
                Schemes::whereCompany($parent_company)->get();
        return view('settings::schemes', ['data' => $this->data, 'select' => $parent_company]);
    }

    public function save_schemes(CreateInsuranceSchemesRequest $request, $company = null) {
        if (SetupFunctions::add_scheme($request)) {
            flash("Insurance scheme has been saved");
        }
        return redirect()->route('settings.schemes', $company);
    }

    public function schedule_cat(Request $request, $id = null) {
        if ($request->isMethod('post')) {
            if (empty($id))
                $this->validate($request, Validation::validate_schedule_category(), ['unique' => 'Already exist']);
            if (SetupFunctions::add_schedule_category($request, $id)) {
                return redirect()->route('settings.schedule_cat');
            }
        }
        $this->data['categories'] = AppointmentCategory::all();
        $this->data['model'] = AppointmentCategory::findOrNew($id);
        return view('settings::schedule_cat', ['data' => $this->data]);
    }

    public function user_profile(Request $request, $id) {
        if ($request->isMethod('post')) {
            $this->validate($request, Validation::validate_edit_user());
            if (SetupFunctions::edit_system_user($request, $id)) {
                return redirect()->route('settings.users');
            }
        }
        $this->data['user'] = User::find($id);
        return view('settings::userprofile', ['data' => $this->data]);
    }

    public function permission(Request $request, $group_id) {
        if ($request->isMethod('post')) {
            try {
                if (SetupFunctions::save_permissions($request, $group_id)) {
                    return redirect()->route('settings.user_groups');
                }
            } catch (\Exception $e) {
                flash('Something went wrong');
                return back();
            }
        }
        $this->data['user_group'] = UserGroup::find($group_id);
        $this->data['permissions'] = Permission::all();
        return view('settings::permissions', ['data' => $this->data]);
    }

    public function exclude_product($id) {
        try {
            $this->data['products'] = \Ignite\Inventory\Entities\InventoryProducts::all();
            $this->data['excluded'] = \Ignite\Inventory\Entities\InventoryProductExclusion::whereScheme($id)->select('product')->get();
            $this->data['scheme'] = Schemes::find($id);
            return view('settings::exclusions', ['data' => $this->data]);
        } catch (\Exception $e) {
            flash('Something went wrong');
            return back();
        }
    }

    public function consultation() {

    }

}
