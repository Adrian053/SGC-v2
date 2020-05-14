<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            /*$table->Integer('numero');
            $table->longText('descripcion');
            $table->text('responsable');
            $table->text('recursos');
            $table->date('F_inicio');
            $table->integer('ponderacion');
            $table->string('estado');
            $table->date('F_finalizacion');
            $table->text('evidencias');*/
            $table->text('numero');
            $table->longText('descripcion');
            $table->text('responsable');
            $table->text('recursos');
            $table->text('F_inicio');
            $table->text('ponderacion');
            $table->text('estado');
            $table->text('F_finalizacion');
            $table->text('evidencias');
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
        Schema::dropIfExists('actions');
    }
}
