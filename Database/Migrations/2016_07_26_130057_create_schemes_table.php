<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchemesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('settings_schemes', function(Blueprint $column) {
            $column->increments('id');
            $column->integer('company')->unsigned();
            $column->string('name');
            $column->smallInteger('type');
            $column->string('attention')->nullable();
            $column->boolean('smart')->default(false);
            $column->decimal('amount', 10, 2)->nullable();
            $column->date('effective_date');
            $column->softDeletes();
            $column->date('expiry_date');
            $column->timestamps();

            $column->foreign('company')
                    ->references('id')
                    ->on('settings_insurance')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('settings_schemes');
    }

}
