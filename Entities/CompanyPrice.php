<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Ignite\Settings\Entities\CompanyPrice
 *
 * @property int $id
 * @property int $procedure
 * @property int $company
 * @property float $price
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Ignite\Settings\Entities\Insurance $firm
 * @property-read \Ignite\Evaluation\Entities\Procedures $procedures
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\CompanyPrice whereCompany($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\CompanyPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\CompanyPrice whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\CompanyPrice wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\CompanyPrice whereProcedure($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\CompanyPrice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompanyPrice extends Model {

    protected $fillable = [];
    //migrations- Modules/Evaluation/2017_04_05_194627_create_company_prices_table
    public $table = 'company_prices';

    public function firm() {
        return $this->hasOne(Insurance::class, 'company');
    }

    public function procedures() {
        return $this->hasOne(\Ignite\Evaluation\Entities\Procedures::class, 'id', 'procedure');
    }

}
