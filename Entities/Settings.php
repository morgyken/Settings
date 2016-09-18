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

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Ignite\Settings\Entities\Settings
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property string $payload
 * @property boolean $autoload
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Settings whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Settings whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Settings whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Settings wherePayload($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Settings whereAutoload($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Settings whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Settings whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Settings extends Model {

    protected $guarded = [];
    public $table = 'settings_settings';

}
