<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('bill_date');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('po_id')->nullable();
            $table->float('fare', 10, 2)->nullable();
            $table->string('remarks', 200)->nullable();
            $table->longText('bill_image')->nullable();
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
        Schema::dropIfExists('bills');
    }
}
