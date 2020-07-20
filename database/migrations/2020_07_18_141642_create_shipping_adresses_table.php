<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_adresses', function (Blueprint $table) {
            $table->bigIncrements('shipping_adresses_id');
            $table->string('shipping_adresses_fullname');
            $table->string('shipping_adresses_adress1');
            $table->string('shipping_adresses_adress2')->nullable();
            $table->string('shipping_adresses_phone1');
            $table->string('shipping_adresses_phone2')->nullable();
            $table->string('shipping_adresses_email');
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
        Schema::dropIfExists('shipping_adresses');
    }
}
