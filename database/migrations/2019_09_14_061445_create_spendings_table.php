<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spendings', function (Blueprint $table) {
            $table->bigIncrements('spendings_id');
            $table->unsignedBigInteger('branches_id');
            $table->foreign('branches_id')->references('branches_id')->on('branches')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('spending_categories_id');
            $table->foreign('spending_categories_id')->references('spending_categories_id')->on('spending_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('spendings_name');
            $table->string('spendings_total');
            $table->string('spendings_date');
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
        Schema::dropIfExists('spendings');
    }
}
