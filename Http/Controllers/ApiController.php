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

}
