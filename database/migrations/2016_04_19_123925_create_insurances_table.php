<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('insurance_type_id')->unsigned()->nullable();
            $table->foreign('insurance_type_id')
                ->references('id')
                ->on('insurance_types')
                ->onDelete('set null');
            $table->integer('provider_id')->unsigned();
            $table->foreign('provider_id')
                ->references('id')
                ->on('providers')
                ->onDelete('cascade');
            $table->decimal('payment', 15, 2);
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('insurances');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
