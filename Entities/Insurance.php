<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Ignite\Settings\Entities\Insurance
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $post_code
 * @property string $town
 * @property string $street
 * @property string $building
 * @property string $telephone
 * @property string $mobile
 * @property string $fax
 * @property string $email
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Ignite\Settings\Entities\Schemes[] $schemes
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance wherePostCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereTown($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereStreet($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereBuilding($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereTelephone($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereMobile($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereFax($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Insurance whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Insurance extends Model {

    protected $fillable = [];
    public $table = 'settings_insurance';

    public function schemes() {
        return $this->hasMany(Schemes::class, 'company_id', 'company_id');
    }

}
