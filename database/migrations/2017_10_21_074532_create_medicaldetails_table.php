<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicaldetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicaldetails', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('usedate');
            $table->string('hospitalname');
            $table->float('amount');
            $table->integer('medical_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('medicaldetails', function (Blueprint $table) {
            $table->foreign('medical_id')->references('id')->on('medicals')->onDelete('cascade');// cascade 는 참조 테이블 지우는거.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicaldetails');
    }
}
