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
$namespace = 'Ignite\Settings\Http\Controllers';

//back-end routes
Route::group(['prefix' => 'api/settings',
    'middleware' => mconfig('core.core.middleware.api'),
    'namespace' => $namespace,
    'as' => 'api.settings.'], function () {
    Route::get('get_schemes', ['uses' => 'ApiController@get_schemes', 'as' => 'get_schemes']);
});
