<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Ignite\Settings\Entities\InsuranceSchemePricing
 *
 * @property int $id
 * @property int $scheme_id
 * @property int|null $product_id
 * @property int|null $procedure_id
 * @property float|null $amount
 * @property int $excluded
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\InsuranceSchemePricing whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\InsuranceSchemePricing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\InsuranceSchemePricing whereExcluded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\InsuranceSchemePricing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\InsuranceSchemePricing whereProcedureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\InsuranceSchemePricing whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\InsuranceSchemePricing whereSchemeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\InsuranceSchemePricing whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InsuranceSchemePricing extends Model
{
    protected $table = 'finance_insurance_scheme_pricing';
    protected $guarded = [];
}
