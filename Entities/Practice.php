<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Ignite\Settings\Entities\Practice
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $telephone
 * @property string $fax
 * @property string $mobile
 * @property string $email
 * @property string $country
 * @property string $town
 * @property string $street
 * @property string $building
 * @property string $office
 * @property string $pin
 * @property-read \Illuminate\Database\Eloquent\Collection|\Ignite\Settings\Entities\Clinics[] $clinics
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice whereBuilding($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice whereFax($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice whereMobile($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice whereOffice($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice wherePin($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice whereStreet($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice whereTelephone($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Practice whereTown($value)
 * @mixin \Eloquent
 */
class Practice extends Model {

    protected $fillable = [];
    public $table = 'settings_practice';
    public $timestamps = false;

    public function clinics() {
        return $this->hasMany(Clinics::class, 'practice');
    }

}
