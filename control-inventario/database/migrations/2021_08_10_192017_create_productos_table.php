<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->double('precio_v', 8, 2)->nullable();
            $table->double('precio_c', 8, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->boolean('status_delete');
            $table->string('imagen')->nullable();
            $table->ForeignId('id_categoria')->references('id')->on('categorias');
            $table->ForeignId('id_catalogo')->references('id')->on('catalogos');
            $table->ForeignId('id_bodega')->references('id')->on('bodegas');
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
        Schema::dropIfExists('productos');
    }
}
