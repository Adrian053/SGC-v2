<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalities', function (Blueprint $table) {
            $table->id('gen_id');
            $table->timestamps();
            $table->Integer('objetivo');
            $table->Integer('year');
            $table->date('F_aprovacion');
            $table->date('F_apertura');
            $table->date('F_cumplimiento');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generalities');
    }
}
