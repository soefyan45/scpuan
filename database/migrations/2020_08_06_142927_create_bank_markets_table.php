<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_markets', function (Blueprint $table) {
            $table->id();
            $table->string('nameBank');
            $table->string('accountBank');
            $table->integer('numberBank');
            $table->integer('DefaultBankMarket')->default(0)->comment('1 default');
            $table->integer('statusBankMarket')->default(1)->comment('1 active,0 disable');
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
        Schema::dropIfExists('bank_markets');
    }
}
