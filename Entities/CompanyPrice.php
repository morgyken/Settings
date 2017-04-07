<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

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
