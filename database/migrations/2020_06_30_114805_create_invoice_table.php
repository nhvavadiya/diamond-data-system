<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('l_invoice')->nullable();
            $table->string('e_invoice')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('seller_id')->nullable();
            $table->string('reference')->nullable();
            $table->integer('unit_price')->nullable();
            $table->float('rate')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('is_broker')->comment('1=yes, 2=no')->default('1')->nullable(false);
            $table->float('percentage')->nullable();
            $table->date('date')->nullable();
            $table->text('term')->nullable();
            $table->date('duedate')->nullable();
            $table->string('payment_in')->nullable();
            $table->float('carat_total')->nullable();
            $table->float('total')->nullable();
            $table->string('inv_type')->comment('1=sale, 2=purchase, 3=memo')->default('1')->nullable(false);
            $table->string('create_by')->nullable();
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
        Schema::dropIfExists('invoice');
    }
}
