<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsFinalColumnInInvoiceMemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_memo', function (Blueprint $table) {
            $table->tinyInteger('is_final')->default(0)->after('create_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_memo', function (Blueprint $table) {
            $table->dropColumn('is_final');
        });
    }
}
