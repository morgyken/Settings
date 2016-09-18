<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('settings_clinics', function(Blueprint $column) {
            $column->increments('id');
            $column->integer('practice')->unsigned();
            $column->string('name');
            $column->string('address');
            $column->string('telephone');
            $column->string('fax')->nullable();
            $column->string('mobile')->nullable();
            $column->string('email');
            $column->string('town');
            $column->string('location')->nullable();
            $column->string('street');
            $column->string('building');
            $column->string('office');
            $column->enum('status', ['active', 'inactive']);
            $column->string('type');
            $column->timestamps();

            $column->foreign('practice')
                    ->references('id')
                    ->on('settings_practice')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('settings_clinics');
    }

}
