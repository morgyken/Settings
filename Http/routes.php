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
$router->get('settings/{module}', ['as' => 'module.settings', 'uses' => 'SettingsController@getModuleSettings']);
$router->get('settings', ['as' => 'settings', 'uses' => 'SettingsController@index']);
$router->post('settings', ['as' => 'settings.save', 'uses' => 'SettingsController@store']);

//previous
$router->get('/', ['uses' => 'SetupController@index', 'as' => 'index']);
$router->get('practice/information', ['uses' => 'SetupController@practice', 'as' => 'practice']);
$router->post('practice/update', ['uses' => 'SetupController@save_practice', 'as' => 'practice.save']);
$router->get('clinics/show/{edit?}', ['uses' => 'SetupController@clinics', 'as' => 'clinics']);
$router->post('clinics/save/{edit?}', ['uses' => 'SetupController@save_clinic', 'as' => 'clinic.save']);
$router->get('companies/show/{id?}', ['uses' => 'SetupController@insurance', 'as' => 'companies']);
$router->post('companies/save/{id?}', ['uses' => 'SetupController@save_insurance', 'as' => 'companies.save']);
$router->get('scheme/show/{company?}', ['uses' => 'SetupController@schemes', 'as' => 'schemes']);
$router->get('scheme/p-and-e/drugs/{id}/sapi', ['uses' => 'SetupController@pneDrugs', 'as' => 'pne.drugs']);
$router->get('scheme/p-and-e/procedure/{id}/sapi', ['uses' => 'SetupController@pneProcedures', 'as' => 'pne.procedures']);
$router->post('scheme/save/{company?}', ['uses' => 'SetupController@save_schemes', 'as' => 'schemes.save']);
$router->match(['post', 'get'], 'schedule_cat/{cat?}', ['as' => 'schedule_cat', 'uses' => 'SetupController@schedule_cat']);
$router->match(['post', 'get'], 'user/{id}', ['uses' => 'SetupController@user_profile', 'as' => 'userprofile']);
$router->get('insurance/{id}/scheme/exclusions', ['uses' => 'SetupController@exclude_product', 'as' => 'exclusions']);
$router->get('facility/rooms/{id?}', ['uses' => 'SetupController@rooms', 'as' => 'rooms']);
$router->post('facility/rooms/save', ['uses' => 'SetupController@saveRoom', 'as' => 'rooms.save']);

$router->get('company/procedures/{company?}', ['uses' => 'SetupController@CompanyProcedures', 'as' => 'company.procedures']);
$router->post('manage/company/procedures/', ['uses' => 'SetupController@CompanyProcedures', 'as' => 'company.procedures.save']);
$router->get('purge/company/procedure/{co?}/{procedure?}', ['uses' => 'SetupController@purge_co_price', 'as' => 'company.procedures.purge']);
