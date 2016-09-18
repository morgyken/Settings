<?php

namespace Ignite\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePracticeRequest extends FormRequest {

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
            "mobile" => "",
            "email" => "required|email",
            "fax" => "",
            "country" => "required",
            "town" => "required",
            "street" => "",
            "building" => "",
            "office" => "",
            "pin" => ""
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
