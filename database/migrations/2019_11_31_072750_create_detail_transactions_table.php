<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->bigIncrements('detail_transactions_id');
            $table->unsignedBigInteger('transactions_id');
            $table->foreign('transactions_id')->references('transactions_id')->on('transactions')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('list_items_id');
            $table->foreign('list_items_id')->references('list_items_id')->on('list_items')->onUpdate('cascade')->onDelete('cascade');
            $table->double('quantity', 8, 2);
            $table->double('sub_total', 8, 2);
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
        Schema::dropIfExists('detail_transactions');
    }
}
