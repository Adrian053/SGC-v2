<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('obj_descripcion');
            $table->text('procesos');
            $table->text('responsable');
            $table->text('indicador');
            $table->text('meta');
            $table->bigInteger('gen_id2')->unsigned();
            $table->foreign('gen_id2')->references('gen_id')->on('generalities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identifications');
    }
}
