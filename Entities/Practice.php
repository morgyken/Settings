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
 * @property string|null $fax
 * @property string|null $mobile
 * @property string|null $email
 * @property string $country
 * @property string $town
 * @property string|null $street
 * @property string|null $building
 * @property string|null $office
 * @property string|null $pin
 * @property string|null $logo
 * @property-read \Illuminate\Database\Eloquent\Collection|\Ignite\Settings\Entities\Clinics[] $clinics
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereBuilding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereOffice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice wherePin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Practice whereTown($value)
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
