<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('settings_practice', function(Blueprint $column) {
            $column->increments('id');
            $column->string('name');
            $column->string('address');
            $column->string('telephone');
            $column->string('fax')->nullable();
            $column->string('mobile')->nullable();
            $column->string('email')->nullable();
            $column->string('country');
            $column->string('town');
            $column->string('street')->nullable();
            $column->string('building')->nullable();
            $column->string('office')->nullable();
            $column->string('pin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('settings_practice');
    }

}
