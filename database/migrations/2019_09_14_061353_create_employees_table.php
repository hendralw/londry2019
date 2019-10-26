<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('employees_id');
            $table->unsignedBigInteger('branches_id');
            $table->foreign('branches_id')->references('branches_id')->on('branches')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id')->references('roles_id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->string('employees_name');
            $table->string('employees_phone');
            $table->string('employees_address');
            $table->double('employees_salary');
            $table->string('username')->unique();
            $table->string('password');
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
        Schema::dropIfExists('employees');
    }
}