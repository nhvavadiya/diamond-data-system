<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 50)->nullable(false);
            $table->string('surname', 50)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('company_name', 50)->nullable();
            $table->tinyInteger('gender')->comment('1=male, 2=female')->default('1')->nullable(false);
            $table->string('position', 50)->nullable();
            $table->date('date_of_birth')->nullable(false);
            $table->string('reference', 50)->nullable();
            $table->text('address')->nullable(false);
            $table->string('mobile', 10)->nullable(false);
            $table->string('other_mobile', 15)->nullable();
            $table->string('fax', 200)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
