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

$router->get('get_schemes', ['uses' => 'ApiController@get_schemes', 'as' => 'get_schemes']);
$router->get('update_co_price', ['uses' => 'ApiController@save_co_price', 'as' => 'save_co_price']);
