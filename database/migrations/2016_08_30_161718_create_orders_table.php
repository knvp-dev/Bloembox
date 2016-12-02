<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id');
            $table->string('recipient');
            $table->string('street');
            $table->integer('number');
            $table->integer('postalcode');
            $table->string('city');
            $table->string('hospital');
            $table->integer('room');
            $table->date('deliverydate');
            $table->integer('payment_id');
            $table->integer('price')->unsigned();
            $table->integer('completed')->default(0);
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
        Schema::drop('orders');
    }
}
