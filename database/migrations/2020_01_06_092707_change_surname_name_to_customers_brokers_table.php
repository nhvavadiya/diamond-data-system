<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSurnameNameToCustomersBrokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('surname')->nullable(false)->change();
            $table->string('name')->nullable(false)->change();
        });

        Schema::table('brokers', function (Blueprint $table) {
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
        Schema::table('customers', function (Blueprint $table) {
            $table->string('surname')->nullable(true)->change();
            $table->string('name')->nullable(true)->change();
        });

        Schema::table('brokers', function (Blueprint $table) {
            $table->string('surname')->nullable(true)->change();
            $table->string('name')->nullable(true)->change();
        });
    }
}
