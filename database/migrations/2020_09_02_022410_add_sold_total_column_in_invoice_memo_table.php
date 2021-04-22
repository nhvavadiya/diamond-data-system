<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoldTotalColumnInInvoiceMemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_memo', function (Blueprint $table) {
            $table->float('sold_carat_total')->nullable()->after('total');
            $table->float('sold_total')->nullable()->after('sold_carat_total');
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
            $table->dropColumn(['sold_carat_total', 'sold_total']);
        });
    }
}
