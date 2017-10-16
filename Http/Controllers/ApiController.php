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

use Ignite\Settings\Entities\InsuranceSchemePricing;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{

    public function get_schemes(Request $request)
    {
        return get_schemes($request->id);
    }

    public function save_co_price(Request $request)
    {
        $procedure = $request->procedure;
        $price = $request->price;
        $co = $request->co;

        $cprice = \Ignite\Settings\Entities\CompanyPrice::whereCompany($co)->whereProcedure($procedure)->get(); //findOrNew(['company' => $co, 'procedure' => $procedure]); //whereCompany($co)->whereProcedure($procedure)->get();
        foreach ($cprice as $c) {
            $c->price = $price;
            $c->save();
        }
    }

    public function editPne(Request $request, $type)
    {
        $update = $request->data;
        foreach ($update as $item) {
            $price = InsuranceSchemePricing::firstOrNew([
                $type => $item['product'],
                'scheme_id' => $item['scheme']
            ]);
            $price->amount = $item['amount'];
            $price->excluded = $item['excluded'] === 'true';
            $price->save();
        }
        return response()->json(['saved' => true]);
    }

}
