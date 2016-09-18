<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Dervis\Modules\Setup\Entities\Beds
 *
 * @property-read \Dervis\Modules\Setup\Entities\Wards $ward
 * @mixin \Eloquent
 */
class Beds extends Model {

    public $table = 'settings_beds';

    public function ward() {
        return $this->belongsTo(Wards::class, 'ward');
    }

}
