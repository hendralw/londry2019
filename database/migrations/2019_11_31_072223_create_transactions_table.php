<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('transactions_id');
            $table->unsignedBigInteger('customers_id');
            $table->string('status');
            $table->foreign('customers_id')->references('customers_id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('employees_id');
            $table->foreign('employees_id')->references('employees_id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->double('total', 8, 2);
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
        Schema::dropIfExists('transactions');
    }
}
