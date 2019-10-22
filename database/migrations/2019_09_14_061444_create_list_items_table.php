<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_items', function (Blueprint $table) {
            $table->bigIncrements('list_items_id');
            $table->unsignedBigInteger('item_categories_id');
            $table->foreign('item_categories_id')->references('item_categories_id')->on('item_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('unit_items_id');
            $table->foreign('unit_items_id')->references('unit_items_id')->on('unit_items')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('durations_id');
            $table->foreign('durations_id')->references('durations_id')->on('durations')->onUpdate('cascade')->onDelete('cascade');
            $table->string('list_items_name');
            $table->double('list_items_price');
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
        Schema::dropIfExists('list_items');
    }
}
