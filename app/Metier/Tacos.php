<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tacos extends Model
{

    public function getTacos(){
        $lesTacos = DB::table('tacos')->get();
        return $lesTacos;
    }
}
