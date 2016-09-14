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
Route::group(['prefix' => 'users',
    'middleware' => mconfig('core.core.middleware.api'),
    'namespace' => $namespace,
    'as' => 'settings.api.'], function () {

});
