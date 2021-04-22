<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceMemoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_memo_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_memo_id')->nullable();
            $table->foreign('invoice_memo_id')->references('id')->on('invoice_memo')->onDelete('cascade');
            $table->string('branch')->nullable();
            $table->tinyInteger('is_gia')->comment('1=gia, 2=no gia')->nullable(false);
            $table->text('details')->nullable();
            $table->integer('pcs')->nullable();
            $table->float('carat')->nullable();
            $table->integer('unit_price')->nullable();
            $table->float('amount')->nullable();
            $table->float('return_carat')->nullable();
            $table->float('sold_carat')->nullable();
            $table->string('remark', 1000)->nullable();
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
        Schema::dropIfExists('invoice_memo_details');
    }
}
