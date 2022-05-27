<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Order;
class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status', [Order::PENDIENTE, Order::RECIBIDO,Order::ENVIADO,Order::ENTREGADO,Order::ANULADO])->default(Order::PENDIENTE);
            $table->enum('envio_type', [1,2]);
            $table->float('shipping_cost');
            $table->float('total');
            $table->json('content');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');


            $table->unsignedBigInteger('ciudad_id');
            $table->foreign('ciudad_id')->references('id')->on('ciudads');

            $table->unsignedBigInteger('barrio_id');
            $table->foreign('barrio_id')->references('id')->on('barrios');

            $table->string('direccion');
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
        Schema::dropIfExists('orders');
    }
}
