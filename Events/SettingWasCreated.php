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

class SettingWasCreated {

    /**
     * @var string Setting name
     */
    public $name;

    /**
     * @var string|array
     */
    public $values;

    /**
     * @param $name
     * @param $isTranslatable
     * @param $values
     */
    public function __construct($name, $values) {
        $this->name = $name;
        $this->values = $values;
    }

}
