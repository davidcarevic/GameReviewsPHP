<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class Promo
{
    public function getPromo(){
        return DB::table('promo')
            ->first();
    }

}
