<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGiaIdColumnInInvoiceMemoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_memo_details', function (Blueprint $table) {
            $table->bigInteger('gia_id')->unsigned()->nullable()->comment("Id of Gia or NoGia")->after('is_gia');
            $table->string('file')->nullable()->comment("Gia document")->after('remark');
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
            $table->dropColumn('file');
            $table->dropColumn('gia_id');
        });
    }
}
