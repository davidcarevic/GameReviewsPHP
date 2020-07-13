<?php


namespace App\Models;


class Menu
{
    public function getMenu(){

        return \DB::table('menu')->get();

}
    public function getDropdown(){
        return \DB::table('dropdown')->get();
    }

}
