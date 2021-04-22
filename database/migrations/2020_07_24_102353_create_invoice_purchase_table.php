<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_purchase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('l_invoice')->nullable();
            $table->string('e_invoice')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->foreign('seller_id')->references('id')->on('salers')->onDelete('set null');
            $table->string('reference')->nullable();
            $table->integer('unit_price')->nullable();
            $table->float('rate')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('country')->onDelete('set null');
            $table->tinyInteger('is_broker')->comment('1=yes, 2=no')->default('1')->nullable(false);
            $table->float('percentage')->nullable();
            $table->date('date')->nullable();
            $table->integer('term')->nullable();
            $table->date('duedate')->nullable();
            $table->string('payment_in')->nullable();
            $table->float('carat_total')->nullable();
            $table->float('total')->nullable();
            $table->unsignedBigInteger('create_by')->nullable();
            $table->foreign('create_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('invoice_purchase');
    }
}
