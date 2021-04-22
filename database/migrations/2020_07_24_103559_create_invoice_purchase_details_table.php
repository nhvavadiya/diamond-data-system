<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_purchase_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_purchase_id')->nullable();
            $table->foreign('invoice_purchase_id')->references('id')->on('invoice_purchase')->onDelete('cascade');
            $table->string('branch')->nullable();
            $table->tinyInteger('is_gia')->comment('1=gia, 2=no gia')->nullable(false);
            $table->text('details')->nullable();
            $table->integer('pcs')->nullable();
            $table->float('carat')->nullable();
            $table->integer('unit_price')->nullable();
            $table->float('amount')->nullable();
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
        Schema::dropIfExists('invoice_purchase_details');
    }
}
