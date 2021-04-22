<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 50)->nullable(false);
            $table->string('surname', 50)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('nick_name', 50)->nullable();
            $table->string('position', 50)->nullable();
            $table->string('branch', 50)->nullable();
            $table->string('mobile', 10)->nullable(false);
            $table->string('chat', 200)->nullable();
            $table->string('skype', 200)->nullable();
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
        Schema::dropIfExists('purchasers');
    }
}
