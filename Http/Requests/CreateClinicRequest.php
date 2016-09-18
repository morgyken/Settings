<?php

namespace Ignite\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClinicRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            "name" => "required",
            "address" => "required",
            "telephone" => "required",
            "fax" => "",
            "location" => "",
            "town" => "required",
            "mobile" => "",
            "email" => "required|email",
            "status" => "required",
            "street" => "",
            "building" => "",
            "office" => "",
            "type" => "required",
            "practice_id" => "required",
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

}
