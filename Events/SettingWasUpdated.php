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

namespace Ignite\Settings\Events;

class SettingWasUpdated {
    /**
     * @var string The setting name
     */
    public $name;

    /**
     * @var string|array
     */
    public $values;

    /**
     * @var string|array Containing the old values
     */
    public $oldValues;

    /**
     * SettingWasCreated constructor.
     * @param $name
     * @param $values
     * @param null $oldValues
     */
    public function __construct($name, $values, $oldValues = null) {
        $this->name = $name;
        $this->values = $values;
        $this->oldValues = $oldValues;
    }
}
