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
use Ignite\Core\Http\Controllers\AdminBaseController;
use Ignite\Settings\Http\Requests\SettingsRequest;
use Ignite\Settings\Repositories\SettingsRepository;
use Illuminate\Session\Store;

class SettingsController extends AdminBaseController {

    /**
     * @var SettingRepository
     */
    private $setting;

    /**
     * @var Module
     */
    private $module;

    /**
     * @var Store
     */
    private $session;

    /**
     * SettingsController constructor.
     * @param SettingsRepository $setting
     * @param Store $session
     */
    public function __construct(SettingsRepository $setting, Store $session) {
        parent::__construct();
        $this->setting = $setting;
        $this->module = app('modules');
        $this->session = $session;
    }

    public function index() {
        return redirect()->route('dashboard.module.settings', ['core']);
    }

    public function store(SettingsRequest $request) {
        $this->setting->createOrUpdate($request->all());
        flash("Settings saved");
        return redirect()->route('dashboard.module.settings', [$this->session->get('module', 'Core')]);
    }

    public function getModuleSettings($currentModule) {
        $this->assetPipeline->requireJs('selectize.js');
        $this->assetPipeline->requireCss('selectize.css');
        $this->assetPipeline->requireCss('selectize-default.css');

        $this->session->set('module', $currentModule->getLowerName());

        $modulesWithSettings = $this->setting->moduleSettings($this->module->enabled());

        $translatableSettings = $this->setting->translatableModuleSettings($currentModule->getLowerName());
        $plainSettings = $this->setting->plainModuleSettings($currentModule->getLowerName());

        $dbSettings = $this->setting->savedModuleSettings($currentModule->getLowerName());

        return view('setting::admin.module-settings', compact('currentModule', 'translatableSettings', 'plainSettings', 'dbSettings', 'modulesWithSettings'));
    }

}
