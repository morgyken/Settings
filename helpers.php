<?php

/*
 * =============================================================================
 *
 * Collabmed Solutions Ltd
 * Project: Collabmed Health Platform
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 *
 * =============================================================================
 */

use Ignite\Settings\Entities\Clinics;
use Ignite\Settings\Entities\Insurance;
use Ignite\Settings\Entities\ProcedureCategories;
use Ignite\Settings\Entities\Procedures;
use Ignite\Settings\Entities\Schemes;
use Ignite\Settings\Entities\Wards;
use Ignite\Users\Entities\Roles;
use Ignite\Users\Entities\User;
use Illuminate\Support\Collection;

if (!function_exists('setting')) {

    /**
     * Retrieve a value from the setting repository
     * @param $name
     * @param null $default
     * @return mixed
     */
    function setting($name, $default = null) {
        return app('setting.settings')->get($name, $default);
    }

}


if (!function_exists('get_clinics')) {

    /**
     * Gets all clinics in the practice
     * @param $practice_id The practice id
     * @return array Select ready array
     */
    function get_clinics($practice_id = null) {

        if (empty($practice_id)) {
            $practice_id = config('practice.practice_id');
        }
        if (empty($practice_id)) {
            return Clinics::all()->pluck('name', 'id');
        }
        return Clinics::wherePracticeId($practice_id)->get()->pluck('name', 'id');
    }

}
if (!function_exists('get_users')) {

    /**
     * Function to get a group of user roles
     * TODO Currently works for doctors. Fix this soon
     * @param null $role
     * @return \Illuminate\Support\Collection Doctors
     */
    function get_users($role = null) {
        if (empty($role)) {
            //we might retun all or none
        }
        return User::with('profile')->where('group_id', 5)->get()->pluck('profile.full_name', 'user_id');
    }

}
if (!function_exists('get_wards')) {

    /**
     * Get Wards Array
     * @param int $clinic_id
     * @return array Wards list
     */
    function get_wards($clinic_id = null) {
        $wards = Wards::select('ward_id', 'name')->get()->toArray();
        if (!empty($clinic_id)) {
            $wards = Wards::whereClinic($clinic_id)->select('id', 'name')->get()->toArray();
        }
        $build = [];
        foreach ($wards as $value) {
            $build[$value['id']] = $value['name'];
        }
        return $build;
    }

}
if (!function_exists('get_user_groups')) {

    /**
     * Get User Groups
     * @return \Illuminate\Support\Collection
     */
    function get_user_groups() {
        // return \Dervis\Modules\Core\Repositories\RoleRepository::all();
        return Roles::all()->reject(function($value) {
                    return $value->name === 'sudo';
                })->pluck('display_name', 'id');
    }

}
if (!function_exists('get_insurance_companies')) {

    /**
     * @return \Illuminate\Support\Collection All insurance companies registered
     */
    function get_insurance_companies() {
        return Insurance::all()->pluck('name', 'id');
    }

}
if (!function_exists('get_schemes')) {

    /**
     * @param $id The scheme id
     * @return \Illuminate\Support\Collection An associative array of schemes
     */
    function get_schemes($id) {
        return Schemes::whereCompany($id)->pluck('name', 'id');
    }

}
if (!function_exists('get_product_categories')) {

    /**
     * @return \Illuminate\Support\Collection Procedure Collection
     */
    function get_procedure_categories() {
        return ProcedureCategories::all()->pluck('name', 'id');
    }

}
if (!function_exists('get_clinic_name')) {

    /**
     * Fetch the Clinic name given the ID
     * @param int $id
     * @return string
     */
    function get_clinic_name($id = null) {
        if (empty($id)) {
            $id = Cookie::get('clinic') || 1;
        }
        return Clinics::findOrNew($id)->name;
    }

}
if (!function_exists('get_procedures')) {

    /**
     * @return \Illuminate\Support\Collection
     */
    function get_procedures() {
        return Procedures::all()->pluck('name', 'id');
    }

}
if (!function_exists('get_doctors')) {

    /**
     * List of doctors
     * @return array
     */
    function get_doctors() {
        return User::with(['profile'])->get()->pluck('profile.full_name', 'id')->toArray();
        /*
          return User::with(['profile', 'role'])
          ->whereIn('group_id', [5, 12])->get()->pluck('profile.full_name', 'id')->toArray();
          // dd($next);
         */
    }

}
if (!function_exists('is_excluded')) {

    /**
     * Get products excluded in scheme
     * @param Collection $collection
     * @param InventoryProducts $product
     * @return bool
     */
    function is_excluded(Collection $collection, InventoryProducts $product) {
        return $collection->contains(function ($key, $value) use ($product) {
                    return $value->product == $product->id;
                });
    }

}
if (!function_exists('get_role')) {

    /**
     * Get all user roles
     * @param Collection $role
     * @return string
     */
    function get_role(Collection $role) {
        if ($role->isEmpty()) {
            return "";
        }
        $build = [];
        foreach ($role as $roler) {
            $build[] = $roler->name;
        }
        return implode(',', $build);
    }

}