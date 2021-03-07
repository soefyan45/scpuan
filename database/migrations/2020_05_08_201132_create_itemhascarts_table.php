<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemhascartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemhascarts', function (Blueprint $table) {
            $table->id();
            // id cart atau keranjang
            // $table->bigInteger('itemcart_id')->unsigned();
            // $table->foreign('itemcart_id')->references('id')->on('itemcarts');
            // id seller atau id lapak
            $table->bigInteger('selleruser_id')->unsigned();
            $table->foreign('selleruser_id')->references('id')->on('sellerusers');
            // detail item yang di beli
            $table->integer('qtyItemCart');
            $table->integer('priceItem');
            $table->integer('colorItem')->nullable();
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
        Schema::dropIfExists('itemhascarts');
    }
}
