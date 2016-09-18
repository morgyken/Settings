<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsurancesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('settings_insurance', function(Blueprint $column) {
            $column->increments('id');
            $column->string('name');
            $column->string('address');
            $column->string('post_code')->nullable();
            $column->string('town');
            $column->string('street')->nulllable();
            $column->string('building')->nulllable();
            $column->string('telephone')->nullable();
            $column->string('mobile');
            $column->string('fax')->nullable();
            $column->string('email');
            $column->softDeletes();
            $column->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('settings_insurance');
    }

}
