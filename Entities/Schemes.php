<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Ignite\Settings\Entities\Schemes
 *
 * @property int $id
 * @property int $company
 * @property string $name
 * @property int $type
 * @property string $attention
 * @property bool $smart
 * @property float $amount
 * @property string $effective_date
 * @property string $deleted_at
 * @property string $expiry_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Ignite\Settings\Entities\Insurance $companies
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Schemes whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Schemes whereAttention($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Schemes whereCompany($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Schemes whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Schemes whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Schemes whereEffectiveDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Schemes whereExpiryDate($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Schemes whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Schemes whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Schemes whereSmart($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Schemes whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Schemes whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Schemes extends Model {

    protected $fillable = [];
    public $table = 'settings_schemes';

    public function companies() {
        return $this->belongsTo(Insurance::class, 'company');
    }

}
