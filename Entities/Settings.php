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
 * @property int $id
 * @property string $name
 * @property string|null $value
 * @property string|null $payload
 * @property int $autoload
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Settings whereAutoload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Settings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Settings whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Settings wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Settings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Settings whereValue($value)
 * @mixin \Eloquent
 */
class Settings extends Model {

    protected $guarded = [];
    public $table = 'settings_settings';

}
