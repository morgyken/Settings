<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Ignite\Settings\Entities\Wards
 *
 * @property-read \Ignite\Settings\Entities\Clinics $clinic
 * @mixin \Eloquent
 */
class Wards extends Model {

    public $table = 'settings_wards';

    public function clinic() {
        return $this->belongsTo(Clinics::class, 'clinic_id', 'clinic_id');
    }

}
