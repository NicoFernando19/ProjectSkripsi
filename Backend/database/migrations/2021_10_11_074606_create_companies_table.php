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
            $table->string("companyEmail");
            $table->string("companyPhone");
            $table->string("TanggalBerdiri");
            $table->string("Website");
            $table->string("BidangUsaha");
            $table->string("Industri");
            $table->string("SubIndustri");
            $table->string("companyDetails");
            $table->string("address");
            $table->unsignedBigInteger('Company_type_id');
            $table->foreign('Company_type_id')->references('id')->on('company_types')->onUpdate('cascade')->onDelete('cascade');
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
