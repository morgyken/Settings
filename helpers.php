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
if (!function_exists('setting')) {
    /**
     * Retrieve a value from the setting repository
     * @param $name
     * @param null $default
     * @return mixed
     */
    function setting($name, $default = null) {
        return app('setting.settings')->get($name, $default);
    }

}
