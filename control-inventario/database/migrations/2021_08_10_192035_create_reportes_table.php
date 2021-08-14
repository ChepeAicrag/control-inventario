<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->string('accion');
            $table->integer('cantidad');
            $table->integer('cantidad_ant');
            $table->integer('cantidad_act');
            $table->boolean('status_delete');
            $table->ForeignId('id_usuario')->references('id')->on('usuarios');
            $table->ForeignId('id_auth')->references('id')->on('usuarios');
            $table->ForeignId('id_producto')->references('id')->on('productos');
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
        Schema::dropIfExists('reportes');
    }
}
