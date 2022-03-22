<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacancy_id')->nullable();
            $table->foreign('vacancy_id')->references('id')->on('vacancies')->onUpdate('cascade')->onDelete('cascade');
            // $table->integer('workforce');
            $table->string('jobFunction');
            $table->string('jobDesc')->nullable();
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->string('document')->nullable();
            $table->string('requirement')->nullable();
            $table->string('status')->nullable();
            $table->string('feedbackNotes')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
