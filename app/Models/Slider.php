<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 3/13/2019
 * Time: 7:31 PM
 */

namespace App\Models;


use Illuminate\Support\Facades\DB;

class Slider
{
    public function getSlider(){
        return DB::table('slider')->get();
    }

}
