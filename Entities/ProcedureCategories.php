<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Ignite\Settings\Entities\ProcedureCategories
 *
 * @property integer $id
 * @property string $name
 * @property string $applies_to
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Ignite\Settings\Entities\Procedures[] $procedures
 * @property-read mixed $applies
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\ProcedureCategories whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\ProcedureCategories whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\ProcedureCategories whereAppliesTo($value)
 * @method static \Illuminate\Database\Query\Builder|\Ignite\Settings\Entities\ProcedureCategories whereDeletedAt($value)
 * @mixin \Eloquent
 */
class ProcedureCategories extends Model {

    use SoftDeletes;

    public $timestamps = false;
    public $table = 'settings_procedure_categories';

    public function procedures() {
        return $this->hasMany(Procedures::class, 'category_id', 'category_id');
    }

    public function getAppliesAttribute() {
        return config('system.applies_to.' . $this->applies_to);
    }

}
