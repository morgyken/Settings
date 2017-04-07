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

namespace Ignite\Settings\Http\Controllers;

use Illuminate\Routing\Controller;

class ApiController extends Controller {

    public function get_schemes(\Illuminate\Http\Request $request) {
        return get_schemes($request->id);
    }

    public function save_co_price(\Illuminate\Http\Request $request) {
        $procedure = $request->procedure;
        $price = $request->price;
        $co = $request->co;

        $cprice = \Ignite\Settings\Entities\CompanyPrice::whereCompany($co)->whereProcedure($procedure)->get(); //findOrNew(['company' => $co, 'procedure' => $procedure]); //whereCompany($co)->whereProcedure($procedure)->get();
        foreach ($cprice as $c) {
            $c->price = $price;
            $c->save();
        }
    }

}
