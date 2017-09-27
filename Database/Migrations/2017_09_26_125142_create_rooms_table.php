<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('facility_id');
            $table->string('name');
            $table->integer('category_id')->nullable();
            $table->timestamps();
            $table->foreign('facility_id')
                ->references('id')
                ->on('settings_clinics')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_rooms');
    }
}
