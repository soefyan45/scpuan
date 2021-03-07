<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_balances', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->integer('debit')->nullable();
            $table->integer('kredit')->nullable();
            $table->bigInteger('log_order_seller_id')->unsigned();
            $table->foreign('log_order_seller_id')->references('id')->on('log_order_sellers');
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('log_balances');
    }
}
