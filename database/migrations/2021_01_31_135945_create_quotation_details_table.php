<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quote_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->float('quantity', 6, 2);
            $table->float('rate', 8, 2);
            $table->float('gross_total', 8, 2);
            $table->float('total_amount', 10, 2);
            $table->string('notes', 500)->nullable();
            $table->timestamps();

            $table->foreign('quote_id')->references('id')->on('quotations')->onDelete('cascade');
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
        Schema::dropIfExists('quotation_details');
    }
}
