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

namespace Ignite\Settings\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Description of Settings
 *
 * @author samuel
 */
class Settings extends Facade {

    protected static function getFacadeAccessor() {
        return 'setting.settings';
    }

}
