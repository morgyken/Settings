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

use Ignite\Core\Repositories\BaseRepository;

/**
 * Interface SettingRepository
 * @package Ignite\Settings\Repositories
 */
interface SettingsRepository extends BaseRepository {

    /**
     * Create or update the settings
     * @param $settings
     * @return mixed
     */
    public function createOrUpdate($settings);

    /**
     * Find a setting by its name
     * @param $settingName
     * @return mixed
     */
    public function findByName($settingName);

    /**
     * Return all modules that have settings
     * with its settings
     * @param  array|string $modules
     * @return array
     */
    public function moduleSettings($modules);

    /**
     * Return the saved module settings
     * @param $module
     * @return mixed
     */
    public function savedModuleSettings($module);

    /**
     * Find settings by module name
     * @param  string $module
     * @return mixed
     */
    public function findByModule($module);

    /**
     * Find the given setting name for the given module
     * @param  string $settingName
     * @return mixed
     */
    public function get($settingName);

    /**
     * Return the translatable module settings
     * @param $module
     * @return array
     */
    public function translatableModuleSettings($module);

    /**
     * Return the non translatable module settings
     * @param $module
     * @return array
     */
    public function plainModuleSettings($module);
}
