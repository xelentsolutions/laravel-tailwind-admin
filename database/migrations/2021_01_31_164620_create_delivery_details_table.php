<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dc_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->float('qty', 6, 2);
            $table->string('notes', 500)->nullable();
            $table->timestamps();

            $table->foreign('dc_id')->references('id')->on('delivery_challans')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_details');
    }
}
