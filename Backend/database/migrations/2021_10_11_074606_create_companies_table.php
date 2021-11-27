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
            $table->string("companyName");
            $table->string("email");
            $table->string('password');
            $table->string("companyPhone");
            $table->string("TanggalBerdiri");
            $table->string("WebsiteUrl");
            $table->string("BidangUsaha");
            $table->string("Industri");
            $table->string("SubIndustri");
            $table->string("companyDetails");
            $table->string("address");
            $table->unsignedBigInteger('company_type_id');
            $table->foreign('company_type_id')->references('id')->on('company_types')->onUpdate('cascade')->onDelete('cascade');
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
