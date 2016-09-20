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

use Ignite\Core\Repositories\BaseCacheDecorator;

/**
 * Description of CacheSettingsDecorator
 *
 * @author samuel
 */
class CacheSettingsDecorator extends BaseCacheDecorator implements SettingsRepository {

    public function __construct(SettingRepository $setting) {
        parent::__construct();
        $this->entityName = 'settings.settings';
        $this->repository = $setting;
    }

    /**
     * Create or update the settings
     * @param $settings
     * @return mixed
     */
    public function createOrUpdate($settings) {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->createOrUpdate($settings);
    }

    /**
     * Find a setting by its name
     * @param $settingName
     * @return mixed
     */
    public function findByName($settingName) {
        return $this->cache
                        ->tags($this->entityName, 'global')
                        ->remember("{$this->locale}.{$this->entityName}.findByName.{$settingName}", $this->cacheTime, function () use ($settingName) {
                            return $this->repository->findByName($settingName);
                        }
        );
    }

    /**
     * Return all modules that have settings
     * with its settings
     * @param  array|string $modules
     * @return array
     */
    public function moduleSettings($modules) {
        $moduleList = implode(',', $modules);

        return $this->cache
                        ->tags($this->entityName, 'global')
                        ->remember("{$this->locale}.{$this->entityName}.moduleSettings.{$moduleList}", $this->cacheTime, function () use ($modules) {
                            return $this->repository->moduleSettings($modules);
                        }
        );
    }

    /**
     * Return the saved module settings
     * @param $module
     * @return mixed
     */
    public function savedModuleSettings($module) {
        return $this->cache
                        ->tags($this->entityName, 'global')
                        ->remember("{$this->locale}.{$this->entityName}.savedModuleSettings.{$module}", $this->cacheTime, function () use ($module) {
                            return $this->repository->savedModuleSettings($module);
                        }
        );
    }

    /**
     * Find settings by module name
     * @param  string $module
     * @return mixed
     */
    public function findByModule($module) {
        return $this->cache
                        ->tags($this->entityName, 'global')
                        ->remember("{$this->locale}.{$this->entityName}.findByModule.{$module}", $this->cacheTime, function () use ($module) {
                            return $this->repository->findByModule($module);
                        }
        );
    }

    /**
     * Find the given setting name for the given module
     * @param  string $settingName
     * @return mixed
     */
    public function get($settingName) {
        return $this->cache
                        ->tags($this->entityName, 'global')
                        ->remember("{$this->locale}.{$this->entityName}.get.{$settingName}", $this->cacheTime, function () use ($settingName) {
                            return $this->repository->get($settingName);
                        }
        );
    }

    /**
     * Return the non translatable module settings
     * @param $module
     * @return array
     */
    public function getModuleSettings($module) {
        return $this->cache
                        ->tags($this->entityName, 'global')
                        ->remember("{$this->locale}.{$this->entityName}.plainModuleSettings.{$module}", $this->cacheTime, function () use ($module) {
                            return $this->repository->plainModuleSettings($module);
                        }
        );
    }

}
