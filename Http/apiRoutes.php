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
/** @var \Illuminate\Routing\Router $router */
$router->get('get_schemes', ['uses' => 'ApiController@get_schemes', 'as' => 'get_schemes']);
$router->get('update_co_price', ['uses' => 'ApiController@save_co_price', 'as' => 'save_co_price']);

$router->post('pne/price/edit/{type}', ['uses' => 'ApiController@editPne', 'as' => 'pne.price.edit']);

