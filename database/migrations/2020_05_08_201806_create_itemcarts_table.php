<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemcartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemcarts', function (Blueprint $table) {
            $table->id();
            // id pembeli
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            // id seller atau lapak
            $table->bigInteger('selleruser_id')->unsigned();
            $table->foreign('selleruser_id')->references('id')->on('sellerusers');
            // id item isi cart
            $table->bigInteger('itemhascart_id')->unsigned();
            $table->foreign('itemhascart_id')->references('id')->on('itemhascarts');

            $table->integer('chekOutCart')->default(0);
            $table->integer('statusItemChart')->default(1);
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
        Schema::dropIfExists('itemcarts');
    }
}
