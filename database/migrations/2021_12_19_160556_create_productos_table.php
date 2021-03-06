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
            $table->timestamps();
            $table->string('imagen');
			$table->string('nombre_producto');
			$table->string('talla_producto');
			$table->string('descripcion_producto');
			$table->integer('cantidad_producto');
			$table->integer('id_marca_producto')->unsigned();
			$table->string('estado');
			$table->integer('valor_producto');
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
