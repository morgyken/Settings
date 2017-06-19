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

namespace Ignite\Settings\Providers;

use Ignite\Settings\Events\Handlers\ClearSettingsCache;
use Ignite\Settings\Events\SettingWasCreated;
use Ignite\Settings\Events\SettingWasUpdated;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        SettingWasCreated::class => [
            ClearSettingsCache::class,
        ],
        SettingWasUpdated::class => [
            ClearSettingsCache::class,
        ],
    ];

}
