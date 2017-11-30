<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Ignite\Inpatient\Entities\Rebate;

/**
 * Ignite\Settings\Entities\Schemes
 *
 * @property int $id
 * @property int $company
 * @property string $name
 * @property int $type
 * @property string|null $attention
 * @property int $smart
 * @property float|null $amount
 * @property \Carbon\Carbon $effective_date
 * @property string|null $deleted_at
 * @property string $expiry_date
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Ignite\Settings\Entities\Insurance $companies
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Schemes whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Schemes whereAttention($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Schemes whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Schemes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Schemes whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Schemes whereEffectiveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Schemes whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Schemes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Schemes whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Schemes whereSmart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Schemes whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Schemes whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Schemes extends Model {

    protected $dates = ['effective_date'];
    public $table = 'settings_schemes';

    public function companies() {
        return $this->belongsTo(Insurance::class, 'company');
    }

    /*
    * Relationship between a scheme and a rebate
    * Applicable only to NHIF schemes=
    */
    public function rebate()
    {
        return $this->hasOne(Rebate::class, 'scheme_id');
    }
}
