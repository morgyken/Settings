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
Route::group([ 'as' => 'settings.', 'middleware' => mconfig('core.core.middleware.backend'),
    'prefix' => 'settings', 'namespace' => 'Ignite\Settings\Http\Controllers'], function() {
    Route::get('settings/{module}', ['as' => 'module.settings', 'uses' => 'SettingsController@getModuleSettings']);
    Route::get('settings', ['as' => 'settings', 'uses' => 'SettingsController@index']);
    Route::post('settings', ['as' => 'settings.save', 'uses' => 'SettingsController@store']);

    //prvious
    Route::get('/', ['uses' => 'SetupController@index', 'as' => 'index']);
    Route::get('practice/information', ['uses' => 'SetupController@practice', 'as' => 'practice']);
    Route::post('practice/update', ['uses' => 'SetupController@save_practice', 'as' => 'practice.save']);
    Route::get('clinics/show/{edit?}', ['uses' => 'SetupController@clinics', 'as' => 'clinics']);
    Route::post('clinics/save/{edit?}', ['uses' => 'SetupController@save_clinic', 'as' => 'clinic.save']);
    Route::get('companies/show/{id?}', ['uses' => 'SetupController@insurance', 'as' => 'companies']);
    Route::post('companies/save/{id?}', ['uses' => 'SetupController@save_insurance', 'as' => 'companies.save']);
    Route::get('scheme/show/{company?}', ['uses' => 'SetupController@schemes', 'as' => 'schemes']);
    Route::post('scheme/save/{company?}', ['uses' => 'SetupController@save_schemes', 'as' => 'schemes.save']);
    Route::match(['post', 'get'], 'procedures/{procedure?}', ['as' => 'procedures', 'uses' => 'SetupController@procedures']);
    Route::match(['post', 'get'], 'procedure_cat/{cat?}', ['as' => 'procedure_cat', 'uses' => 'SetupController@procedure_cat']);
    Route::match(['post', 'get'], 'schedule_cat/{cat?}', ['as' => 'schedule_cat', 'uses' => 'SetupController@schedule_cat']);
    Route::match(['post', 'get'], 'user/{id}', ['uses' => 'SetupController@user_profile', 'as' => 'userprofile']);
    Route::get('insurance/{id}/scheme/exclusions', ['uses' => 'SetupController@exclude_product', 'as' => 'exclusions']);
});
