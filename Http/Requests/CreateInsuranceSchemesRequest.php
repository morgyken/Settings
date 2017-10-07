<?php

namespace Ignite\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInsuranceSchemesRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        /*
          return [
          "name" => "required",
          "company" => "required",
          "type" => "required",
          "attention" => "required",
          "amount" => "required_if",
          "effective_date" => "required|date",
          "expiry_date" => "required|date"
          ];
         */
        return [
            "name" => "required",
            "company" => "required",
            //"type" => "required",
            //"attention" => "",
            //"amount" => "",
            //"effective_date" => "",
            //"expiry_date" => ""
        ];
    }

    public function messages() {
        return ['required_if' => 'The amount is required'];
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
