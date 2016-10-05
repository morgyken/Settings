<?php

/*
 * =============================================================================
 *
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 *
 * =============================================================================
 */

namespace Ignite\Settings\Library;

use Ignite\Settings\Entities\Clinics;
use Ignite\Settings\Entities\Insurance;
use Ignite\Settings\Entities\Practice;
use Ignite\Settings\Entities\Schemes;
use Ignite\Settings\Http\Requests\CreateClinicRequest;
use Ignite\Settings\Http\Requests\CreateInsuranceRequest;
use Ignite\Settings\Http\Requests\CreateInsuranceSchemesRequest;
use Ignite\Settings\Http\Requests\CreatePracticeRequest;

/**
 * Description of SetupFunctions
 *
 * @author Samuel Dervis <samueldervis@gmail.com>
 */
class SetupFunctions {

    /**
     * @param CreatePracticeRequest $request
     * @return bool
     */
    public static function new_update_practice(CreatePracticeRequest $request) {
        $practice = Practice::findOrNew(1);
        $practice->name = $request->name;
        $practice->address = $request->address;
        $practice->telephone = $request->telephone;
        $practice->fax = $request->fax;
        $practice->mobile = $request->mobile;
        $practice->email = $request->email;
        $practice->country = $request->country;
        $practice->town = $request->town;
        $practice->street = $request->street;
        $practice->building = $request->building;
        $practice->office = strtoupper($request->office);
        $practice->pin = strtoupper($request->pin);
        if ($practice->save()) {
            return true;
        }
        flash()->error("Information could not be saved");
        return false;
    }

    /**
     * @param CreateClinicRequest $request
     * @param null $clinic_id
     * @return bool
     */
    public static function add_clinic(CreateClinicRequest $request, $clinic_id = null) {
        $is_editing = false;
        if (!empty($clinic_id)) {
            $is_editing = true;
        }
        $clinic = Clinics::findOrNew($clinic_id);
        $clinic->name = $request->name;
        $clinic->address = $request->address;
        $clinic->telephone = $request->telephone;
        $clinic->fax = $request->fax;
        $clinic->mobile = $request->mobile;
        $clinic->email = $request->email;
        $clinic->town = ucfirst($request->town);
        $clinic->location = $request->location;
        $clinic->street = $request->street;
        $clinic->building = $request->building;
        $clinic->office = $request->office;
        $clinic->status = $request->status;
        $clinic->type = $request->type;
        $clinic->practice = $request->practice_id;
        if ($clinic->save()) {
            return true;
        }
        flash()->error("An error occurred");
        return false;
    }

    /**
     * @param CreateInsuranceRequest $request
     * @param null $company_id
     * @return bool
     */
    public static function add_insurance_company(CreateInsuranceRequest $request, $company_id = null) {
        $company = Insurance::findOrNew($company_id);
        $company->name = ucwords($request->name);
        $company->address = $request->address;
        $company->post_code = $request->post_code;
        $company->town = $request->town;
        $company->street = $request->street;
        $company->building = $request->building;
        $company->telephone = $request->telephone;
        $company->mobile = $request->mobile;
        $company->fax = $request->fax;
        $company->email = $request->email;
        if ($company->save()) {
            return true;
        }
        flash()->error("An error occurred");
        return false;
    }

    /**
     * @param CreateInsuranceSchemesRequest $request
     * @param null $id
     * @return bool
     */
    public static function add_scheme(CreateInsuranceSchemesRequest $request, $id = null) {
        $scheme = Schemes::findOrNew($id);
        $scheme->name = $request->name;
        $scheme->type = $request->type;
        $scheme->attention = $request->attention;
        $scheme->company = $request->company;
        $scheme->effective_date = $request->effective_date;
        $scheme->expiry_date = $request->expiry_date;
        if ($request->has('smart')) {
            $scheme->smart = $request->smart;
        }
        if ($request->has('amount')) {
            $scheme->amount = $request->amount;
        }
        if ($scheme->save()) {
            return true;
        }
        flash()->error("An error occurred");
        return false;
    }



    /**
     * Adds an appointment or schedule categories
     * @param Request $request
     * @param int|null $id
     * @return bool
     */
    public static function add_schedule_category(Request $request, $id = null) {
        $schedule = AppointmentCategory::findOrNew($id);
        $schedule->name = $request->name;
        if ($schedule->save()) {
            flash("New category \"" . $schedule->name . "\" has been added");
            return true;
        }
        flash()->error("An error occurred");
        return false;
    }


    public static function include_exclude_product(Request $request) {
        if ($request->to == 'exclude') {
            $to_save = InventoryProductExclusion::firstOrNew(['product' => $request->product, 'scheme' => $request->scheme]);
            return $to_save->save();
        } else {
            return InventoryProductExclusion::whereProduct($request->product)->whereScheme($request->scheme)->delete();
        }
    }

}
