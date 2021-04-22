<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stock')->nullable();
            $table->string('availability')->nullable();
            $table->string('shape')->nullable();
            $table->float('weight')->nullable();
            $table->string('color')->nullable();
            $table->string('clarity')->nullable();
            $table->string('cut_grade')->nullable();
            $table->string('polish')->nullable();
            $table->string('symmetry')->nullable();
            $table->string('fluorescence_intensity')->nullable();
            $table->string('fluorescence_color')->nullable();
            $table->float('measurements')->nullable();
            $table->string('lab')->nullable();
            $table->string('report')->nullable();
            $table->string('treatment')->nullable();
            $table->string('rapnet_price')->nullable();
            $table->string('rapnet_discount')->nullable();
            $table->string('cash_price')->nullable();
            $table->string('cash_price_discount')->nullable();
            $table->string('fancy_color')->nullable();
            $table->string('fancy_color_intensity')->nullable();
            $table->string('fancy_color_overtone')->nullable();
            $table->float('depth')->nullable();
            $table->integer('table')->nullable();
            $table->string('girdle_thin')->nullable();
            $table->string('girdle_thick')->nullable();
            $table->string('girdle')->nullable();
            $table->string('girdle_condition')->nullable();
            $table->string('culet_size')->nullable();
            $table->string('culet_condition')->nullable();
            $table->string('crown_height')->nullable();
            $table->string('crown_angle')->nullable();
            $table->string('pavilion_depth')->nullable();
            $table->string('pavilion_dngle')->nullable();
            $table->string('laser_inscription')->nullable();
            $table->string('cert_comment')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('is_matched_pair_separable')->nullable();
            $table->string('pair_stock')->nullable();
            $table->string('allow_rapLink_feed')->nullable();
            $table->integer('parcel_stones')->nullable();
            $table->string('report_filename')->nullable();
            $table->string('diamond_image')->nullable();
            $table->string('sarine_loupe')->nullable();
            $table->string('trade_show')->nullable();
            $table->string('key_to_symbols')->nullable();
            $table->string('shade')->nullable();
            $table->string('star_length')->nullable();
            $table->string('center_inclusion')->nullable();
            $table->string('black_inclusion')->nullable();
            $table->string('milky')->nullable();
            $table->string('member_comment')->nullable();
            $table->string('report_issue_date')->nullable();
            $table->string('report_type')->nullable();
            $table->string('lab_location')->nullable();
            $table->string('brand')->nullable();
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
        Schema::dropIfExists('gia');
    }
}
