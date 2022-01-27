<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("username");
            $table->string('name');
            $table->string('email')->unique();
            $table->string("roles")->nullable();
            $table->string("phoneNumber")->nullable();
            $table->date("TanggalBerdiri")->nullable();
            $table->string("WebsiteUrl")->nullable();
            $table->string("BidangUsaha")->nullable();
            $table->string("Industri")->nullable();
            $table->string("SubIndustri")->nullable();
            $table->string("address")->nullable();
            $table->string("address2")->nullable();
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("zip")->nullable();
            $table->string("about")->nullable();
            $table->string("imgName")->nullable();
            $table->unsignedBigInteger('company_type_id');
            $table->foreign('company_type_id')->references('id')->on('company_types')->onUpdate('cascade')->onDelete('cascade');
            $table->datetime("lastLogin")->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
