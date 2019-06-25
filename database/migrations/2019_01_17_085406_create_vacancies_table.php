<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vacancy_id');
            $table->string('name', 255)->nullable();
            $table->string('companyName', 128)->nullable();
            $table->string('city', 128)->nullable();
            $table->date('date')->nullable();
            $table->string('salary', 128)->nullable();
            $table->string('branch', 128)->nullable();
            $table->longText('description', 1000)->nullable();
            $table->string('contactPerson', 128)->nullable();
            $table->string('contactPhone', 128)->nullable();
            $table->string('contactURL', 255)->nullable();
            $table->string('dateTxt', 128)->nullable();
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
        Schema::dropIfExists('vacancies');
    }
}
