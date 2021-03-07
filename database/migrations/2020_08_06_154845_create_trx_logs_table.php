<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrxLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('amountPay');
            $table->bigInteger('shipping_list_id')->unsigned();
            $table->foreign('shipping_list_id')->references('id')->on('shipping_lists');
            $table->integer('statusPaidOff')->default(0)->comment('1 Paid Off,0 UnPaid');
            $table->bigInteger('bank_market_id')->unsigned();
            $table->foreign('bank_market_id')->references('id')->on('bank_markets');
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
        Schema::dropIfExists('trx_logs');
    }
}
