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
     * @var Store
     */
    private $session;
    protected $data = [];

    /**
     * SettingsController constructor.
     * @param SettingsRepository $setting
     * @param Store $session
     */
    public function __construct(SettingsRepository $setting, Store $session) {
        parent::__construct();
        $this->setting = $setting;
        $this->session = $session;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index() {
        return redirect()->route('settings.module.settings', ['core']);
    }

    public function store(SettingsRequest $request) {
        $this->setting->createOrUpdate($request->all());
        flash("Settings saved");
        return redirect()->route('settings.module.settings', [$this->session->get('module', 'Core')]);
    }

    public function getModuleSettings($module) {
        $currentModule = \Module::find($module);
        $this->assetPipeline->requireJs('selectize.js');
        $this->assetPipeline->requireCss('selectize.css');
        $this->assetPipeline->requireCss('selectize-default.css');
        $this->session->set('module', $currentModule->getLowerName());
        $this->data['current_module'] = $currentModule;
        $this->data['modulesWithSettings'] = $this->setting->moduleSettings(\Module::enabled());
        $this->data['setting'] = $this->setting->getModuleSettings($currentModule->getLowerName());
        $this->data['db_settings'] = $this->setting->savedModuleSettings($currentModule->getLowerName());
        return view('settings::settings.module-setting', ['data' => $this->data]);
    }

}
