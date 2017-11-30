<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

class Rebate extends Model
{
    protected $fillable = [
        'scheme_id', 'rebate'
    ];

    protected $table = "settings_nhif_rebates";

    /*
    * Relationship between a scheme and the rebate
    */
    public function scheme()
    {
        return $this->belongsTo(Schemes::class, 'scheme_id');
    }
}
