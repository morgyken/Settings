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
Route::group([ 'as' => 'settings', 'middleware' => mconfig('core.core.middleware.backend'),
    'prefix' => 'settings', 'namespace' => 'Ignite\Settings\Http\Controllers'], function() {
    Route::get('settings/{module}', ['as' => 'dashboard.module.settings', 'uses' => 'SettingsController@getModuleSettings']);
    Route::get('settings', ['as' => 'admin.setting.settings.index', 'uses' => 'SettingsController@index']);
    Route::post('settings', ['as' => 'admin.setting.settings.store', 'uses' => 'SettingsController@store']);
});
