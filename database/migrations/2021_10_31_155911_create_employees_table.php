<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string("username");
            $table->string('name')->nullable();
            $table->string("roles")->nullable();
            $table->string("phoneNumber")->nullable();
            $table->date("lastLogin")->nullable();
            $table->string("address")->nullable();
            $table->string("address2")->nullable();
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->string("about")->nullable();
            $table->string("jobTitle")->nullable();
            $table->string("jobDesc")->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean("isActive")->default(1);
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
