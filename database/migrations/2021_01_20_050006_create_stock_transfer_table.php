<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_transfer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gia_id')->unsigned()->comment('Id of Gia')->nullable();
            $table->integer('stock')->nullable();
            $table->string('send_from')->nullable();
            $table->integer('send_to')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('status')->comment('0=pending,1=accept,2=reject')->default('0')->nullable(false);     
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
        Schema::dropIfExists('stock_transfer');
    }
}
