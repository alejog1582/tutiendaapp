<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
			$table->string('customer_name');
			$table->string('customer_email');
			$table->string('customer_mobile');
            $table->string('status');
			$table->integer('id_producto')->unsigned();
			$table->integer('cantidades');
			$table->string('direccion_envio');
			$table->string('apto_casa_oficina')->nullable();
			$table->string('barrio');
			$table->date('fecha_entrega');
			$table->time('hora_entrega');
			$table->string('medio_pago');
			$table->string('valor_pedido');			
			$table->string('id_unico_pedido')->nullable();	
			$table->string('requestId_placetopay')->nullable();	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
