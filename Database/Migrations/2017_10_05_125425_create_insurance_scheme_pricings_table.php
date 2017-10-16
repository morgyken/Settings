<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceSchemePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_insurance_scheme_pricing', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('scheme_id');
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('procedure_id')->nullable();
            $table->double('amount', 10, 2)->nullable();
            $table->boolean('excluded')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finance_insurance_scheme_pricing');
    }
}
