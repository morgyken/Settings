<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Ignite\Settings\Entities\Clinics
 *
 * @property integer $id
 * @property integer $practice
 * @property string $name
 * @property string $address
 * @property string $telephone
 * @property string $fax
 * @property string $mobile
 * @property string $email
 * @property string $town
 * @property string $location
 * @property string $street
 * @property string $building
 * @property string $office
 * @property string $status
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Ignite\Settings\Entities\Practice $practices
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics wherePractice($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereTelephone($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereFax($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereMobile($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereTown($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereLocation($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereStreet($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereBuilding($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereOffice($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Clinics whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Clinics extends Model {

    protected $fillable = [];
    public $table = 'settings_clinics';

    public function practices() {
        return $this->belongsTo(Practice::class, 'practice');
    }

}
