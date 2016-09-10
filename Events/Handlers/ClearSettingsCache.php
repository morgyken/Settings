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

namespace Ignite\Settings\Events\Handlers;

use Illuminate\Contracts\Cache\Repository;

class ClearSettingsCache {

    /**
     * @var Repository
     */
    private $cache;

    public function __construct(Repository $cache) {
        $this->cache = $cache;
    }

    public function handle() {
        $this->cache->tags('settings.settings')->flush();
    }

}
