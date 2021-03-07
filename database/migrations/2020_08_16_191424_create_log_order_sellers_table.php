<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogOrderSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_order_sellers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trx_log_id')->unsigned();
            $table->foreign('trx_log_id')->references('id')->on('trx_logs');
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items');
            $table->bigInteger('shop_seller_id')->unsigned();
            $table->foreign('shop_seller_id')->references('id')->on('shop_sellers');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('price_order');
            $table->integer('status_order')->default(0)->comment('0 unproses,1 konfirmasi,2 proses, 3 selesai');
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
        Schema::dropIfExists('log_order_sellers');
    }
}
