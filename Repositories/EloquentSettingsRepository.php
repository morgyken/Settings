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

namespace Ignite\Settings\Repositories;

use Ignite\Core\Repositories\EloquentBaseRepository;
use Ignite\Settings\Events\SettingWasCreated;
use Ignite\Settings\Events\SettingWasUpdated;

/**
 * Description of EloquentSettingsRepository
 *
 * @author samuel
 */
class EloquentSettingsRepository extends EloquentBaseRepository implements SettingsRepository {

    /**
     * Update a resource
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data) {

    }

    /**
     * Return all settings, with the setting name as key
     * @return array
     */
    public function all() {
        $rawSettings = parent::all();
        $settings = [];
        foreach ($rawSettings as $setting) {
            $settings[$setting->name] = $setting;
        }
        return $settings;
    }

    /**
     * Create or update the settings
     * @param $settings
     * @return mixed|void
     */
    public function createOrUpdate($settings) {
        $this->removeTokenKey($settings);
        foreach ($settings as $settingName => $settingValues) {
            if ($setting = $this->findByName($settingName)) {
                $this->updateSetting($setting, $settingValues);
                continue;
            }
            $this->createForName($settingName, $settingValues);
        }
    }

    /**
     * Remove the token from the input array
     * @param $settings
     */
    private function removeTokenKey(&$settings) {
        unset($settings['_token']);
    }

    /**
     * Find a setting by its name
     * @param $settingName
     * @return mixed
     */
    public function findByName($settingName) {
        return $this->model->where('name', $settingName)->first();
    }

    /**
     * Create a setting with the given name
     * @param string $settingName
     * @param $settingValues
     */
    private function createForName($settingName, $settingValues) {
        $setting = new $this->model();
        $setting->name = $settingName;
        $setting->value = $this->getSettingValue($settingValues);
        event(new SettingWasCreated($settingName, false, $settingValues));
        return $setting->save();
    }

    /**
     * Update the given setting
     * @param object setting
     * @param $settingValues
     */
    private function updateSetting($setting, $settingValues) {
        $name = $setting->name;
        $oldValues = $setting->value;
        $setting->value = $this->getSettingValue($settingValues);
        event(new SettingWasUpdated($name, true, $settingValues, $oldValues));
        return $setting->save();
    }

    /**
     * Return all modules that have settings
     * with its settings
     * @param  array|string $modules
     * @return array
     */
    public function moduleSettings($modules) {
        if (is_string($modules)) {
            return mconfig(strtolower($modules) . ".settings");
        }
        $modulesWithSettings = [];
        foreach ($modules as $module) {
            if ($moduleSettings = mconfig(strtolower($module->getName()) . ".settings")) {
                $modulesWithSettings[$module->getName()] = $moduleSettings;
            }
        }
        return $modulesWithSettings;
    }

    /**
     * Return the saved module settings
     * @param $module
     * @return mixed
     */
    public function savedModuleSettings($module) {
        $moduleSettings = [];
        foreach ($this->findByModule($module) as $setting) {
            $moduleSettings[$setting->name] = $setting;
        }
        return $moduleSettings;
    }

    /**
     * Find settings by module name
     * @param  string $module Module name
     * @return mixed
     */
    public function findByModule($module) {
        return $this->model->where('name', 'LIKE', $module . '::%')->get();
    }

    /**
     * Find the given setting name for the given module
     * @param  string $settingName
     * @return mixed
     */
    public function get($settingName) {
        return $this->model->where('name', 'LIKE', "{$settingName}")->first();
    }

    /**
     * Return the non translatable module settings
     * @param $module
     * @return array
     */
    public function getModuleSettings($module) {
        return $this->moduleSettings($module);
    }

    /**
     * Return a setting name using dot notation: asgard.{module}.settings.{settingName}
     * @param string $settingName
     * @return string
     */
    private function getConfigSettingName($settingName) {
        list($module, $setting) = explode('::', $settingName);

        return "ignite.{$module}.settings.{$setting}";
    }

    /**
     * Return the setting value(s). If values are ann array, json_encode them
     * @param string|array $settingValues
     * @return string
     */
    private function getSettingValue($settingValues) {
        if (is_array($settingValues)) {
            return json_encode($settingValues);
        }

        return $settingValues;
    }

}
