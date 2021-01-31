<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('sku', 100)->nullable();
            $table->integer('min_stock')->nullable();
            $table->string('remarks', 200)->nullable();
            $table->string('product_image')->nullable();
            $table->integer('op_qty')->nullable();
            $table->date('op_date')->nullable();
            $table->unsignedBigInteger('uom_id');
            $table->timestamps();

            $table->foreign('uom_id')->references('id')->on('uoms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
