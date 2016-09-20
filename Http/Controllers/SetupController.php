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

    public function procedures(Request $request, $id = null) {
        if ($request->isMethod('post')) {
            if (empty($id)) {
                $this->validate($request, Validation::validate_procedures());
            }
            if (SetupFunctions::add_procedure($request, $id)) {
                return redirect()->route('settings.procedures');
            }
        }
        $this->data['procedure'] = Procedures::findOrNew($id);
        $this->data['procedures'] = Procedures::all();
        return view('settings::procedures')->with('data', $this->data);
    }

    public function procedure_cat(Request $request, $id = null) {
        if ($request->isMethod('post')) {
            if (empty($id))
                $this->validate($request, Validation::validate_procedure_category(), ['unique' => 'Already exist']);
            if (SetupFunctions::add_procedure_category($request, $id)) {
                return redirect()->route('settings.procedure_cat');
            }
        }
        $this->data['categories'] = ProcedureCategories::all();
        $this->data['model'] = ProcedureCategories::findOrNew($id);
        return view('settings::procedure_cat')->with('data', $this->data);
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
        return view('settings::schedule_cat')->with('data', $this->data);
    }

    public function user_profile(Request $request, $id) {
        if ($request->isMethod('post')) {
            $this->validate($request, Validation::validate_edit_user());
            if (SetupFunctions::edit_system_user($request, $id)) {
                return redirect()->route('settings.users');
            }
        }
        $this->data['user'] = User::find($id);
        return view('settings::userprofile')->with('data', $this->data);
    }

    public function permission(Request $request, $group_id) {
        if ($request->isMethod('post')) {
            if (SetupFunctions::save_permissions($request, $group_id)) {
                return redirect()->route('settings.user_groups');
            }
        }
        $this->data['user_group'] = UserGroup::find($group_id);
        $this->data['permissions'] = Permission::all();
        return view('settings::permissions')->with('data', $this->data);
    }

    public function exclude_product($id) {
        $this->data['products'] = InventoryProducts::all();
        $this->data['excluded'] = InventoryProductExclusion::whereScheme($id)->select('product')->get();
        $this->data['scheme'] = Schemes::find($id);
        return view('settings::exclusions', ['data' => $this->data]);
    }

}
