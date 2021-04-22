<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->bigInteger('rapnet_id')->after('skype')->nullable();
            $table->string('website', 100)->after('rapnet_id')->nullable();
            $table->string('whatsapp', 15)->after('website')->nullable();
            $table->text('remark')->after('whatsapp')->nullable();
            $table->text('contact_person', 50)->after('remark')->nullable();
            
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
            $table->dropColumn([
                'rapnet_id',
                'website',
                'whatsapp',
                'remark',
                'contact_person'
            ]);
        });
    }
}
