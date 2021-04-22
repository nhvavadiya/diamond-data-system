<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoldAmountColumnInInvoiceMemoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_memo_details', function (Blueprint $table) {
            $table->float('sold_amount')->nullable()->after('sold_carat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_memo_details', function (Blueprint $table) {
            $table->dropColumn('sold_amount');
        });
    }
}
