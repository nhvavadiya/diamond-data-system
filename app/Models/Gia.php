<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Gia extends BaseModel
{
    protected $table = "gia";
    protected $fillable = [ 
           'stock','availability','shape','weight','color','clarity','cut_grade','polish','symmetry','fluorescence_intensity','fluorescence_color','measurements','lab',
           'report','treatment','rapnet_price','rapnet_discount','cash_price','cash_price_discount','fancy_color','fancy_color_intensity','fancy_color_overtone','depth',
           'table','girdle_thin','girdle_thick','girdle','girdle_condition','culet_size','culet_condition','crown_height','crown_angle','pavilion_depth','pavilion_dngle','laser_inscription',
           'cert_comment','country','state','city','is_matched_pair_separable','pair_stock','allow_rapLink_feed','parcel_stones','report_filename','diamond_image',
           'sarine_loupe','trade_show','key_to_symbols','shade','star_length','center_inclusion','black_inclusion','milky','member_comment','report_issue_date','report_type','lab_location','brand'
     ];
}
