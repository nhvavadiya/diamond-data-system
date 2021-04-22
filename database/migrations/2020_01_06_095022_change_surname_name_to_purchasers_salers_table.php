<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSurnameNameToPurchasersSalersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchasers', function (Blueprint $table) {
            $table->string('surname')->nullable(false)->change();
            $table->string('name')->nullable(false)->change();
        });

        Schema::table('salers', function (Blueprint $table) {
            $table->string('surname')->nullable(false)->change();
            $table->string('name')->nullable(false)->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasers', function (Blueprint $table) {
            $table->string('surname')->nullable(true)->change();
            $table->string('name')->nullable(true)->change();
        });

        Schema::table('salers', function (Blueprint $table) {
            $table->string('surname')->nullable(true)->change();
            $table->string('name')->nullable(true)->change();
        });
    }
}
