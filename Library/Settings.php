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

namespace Ignite\Settings\Library;

use Ignite\Core\Contracts\Settings as SettingsContract;
use Ignite\Settings\Repositories\SettingsRepository;

/**
 * Description of Settings
 *
 * @author samuel
 */
class Settings implements SettingsContract {

    /**
     * @var SettingRepository
     */
    private $setting;

    /**
     * @param SettingRepository $setting
     */
    public function __construct(SettingsRepository $setting) {
        $this->setting = $setting;
    }

    /**
     * Getting the setting
     * @param  string $name
     * @param  string   $locale
     * @param  string   $default
     * @return mixed
     */
    public function get($name, $locale = null, $default = null) {
        $defaultFromConfig = $this->getDefaultFromConfigFor($name);

        $setting = $this->setting->findByName($name);
        if (!$setting) {
            return is_null($default) ? $defaultFromConfig : $default;
        }
        return empty($setting->plainValue) ? $defaultFromConfig : $setting->plainValue;
    }

    /**
     * Determine if the given configuration value exists.
     *
     * @param  string $name
     * @return bool
     */
    public function has($name) {
        $default = microtime(true);

        return $this->get($name, null, $default) !== $default;
    }

    /**
     * Set a given configuration value.
     *
     * @param  string $key
     * @param  mixed  $value
     * @return void
     */
    public function set($key, $value) {

    }

    /**
     * Get the default value from the settings configuration file,
     * for the given setting name.
     * @param string $name
     * @return string
     */
    private function getDefaultFromConfigFor($name) {
        list($module, $settingName) = explode('::', $name);
        return mconfig("$module.settings.$settingName.default", '');
    }

}
