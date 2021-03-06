<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Students', function (Blueprint $table) {
            $table->id();
            $table->string('Firstname',60)->nullable();
            $table->string('Middlename',60)->nullable();
            $table->string('Lastname',60)->nullable();
            $table->date('Birthdate',60)->nullable();
            $table->string('Gender',10)->nullable();
            $table->string('Address',300)->nullable();
            $table->string('Citizenship',50)->nullable();
            $table->string('Religion',50)->nullable();
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
        Schema::dropIfExists('table_students');
    }
}
