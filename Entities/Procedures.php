<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Ignite\Settings\Entities\Procedures
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $category_id
 * @property float $cash_charge
 * @property boolean $charge_insurance
 * @property string $description
 * @property boolean $active
 * @property-read \Ignite\Settings\Entities\ProcedureCategories $categories
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Procedures whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Procedures whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Procedures whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Procedures whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Procedures whereCashCharge($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Procedures whereChargeInsurance($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Procedures whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\Procedures whereActive($value)
 * @mixin \Eloquent
 */
class Procedures extends Model {

    protected $fillable = [];
    public $timestamps = false;
    public $table = 'settings_procedures';

    public function categories() {
        return $this->belongsTo(ProcedureCategories::class, 'category', 'id');
    }

}
