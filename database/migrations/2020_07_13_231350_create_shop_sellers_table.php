<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_sellers', function (Blueprint $table) {
            $table->id();
            $table->string('nameShop');
            $table->string('addressShop');
            $table->string('addressShop1');
            $table->string('handPhone');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('kabupatenShop');
            $table->string('kecamatanShop');
            $table->string('kelurahanShop');
            $table->string('lang')->nullable();
            $table->string('long')->nullable();
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
        Schema::dropIfExists('shop_sellers');
    }
}
