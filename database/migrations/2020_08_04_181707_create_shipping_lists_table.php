<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_lists', function (Blueprint $table) {
            $table->id();
            $table->string('nameShipping');
            $table->string('fname');
            $table->string('lname');
            $table->string('cname');
            $table->string('address');
            $table->string('kab');
            $table->string('kec');
            $table->string('kel');
            $table->string('phone');
            $table->integer('statusShippingList')->default(1);
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
        Schema::dropIfExists('shipping_lists');
    }
}
