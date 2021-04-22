<?php

namespace App\Http\Controllers\Base\Admin;
use App\Http\Controllers\Base\BaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AdminController extends BaseController
{
    public function getRandomString($number = 16)
    {
        return Str::random($number);
    }

    public function removeFile($filePath)
    {
        if(File::exists(public_path($filePath))){
            File::delete(public_path($filePath));
        }
    }
}
