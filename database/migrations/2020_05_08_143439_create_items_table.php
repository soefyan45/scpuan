<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('nameItem');
            $table->string('slugNameItem');
            $table->string('descriptionItem');
            $table->integer('priceItem');
            $table->integer('qtyItem');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('categoryitem_id')->unsigned();
            $table->foreign('categoryitem_id')->references('id')->on('categoryitems');
            $table->bigInteger('itemtype_id')->unsigned();
            $table->foreign('itemtype_id')->references('id')->on('itemtypes');
            $table->integer('statusItem')->default(1);
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
        Schema::dropIfExists('items');
    }
}
