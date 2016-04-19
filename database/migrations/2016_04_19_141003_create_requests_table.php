<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
            $table->integer('insurance_id')->unsigned();
            $table->foreign('insurance_id')
                ->references('id')
                ->on('insurances');
            $table->integer('request_type_id')->unsigned();
            $table->foreign('request_type_id')
                ->references('id')
                ->on('request_types');
            $table->string('status');
            $table->date('turnaround_date');
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
        Schema::drop('requests');
    }
}
