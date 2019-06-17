<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Tacos;

class TacosController extends Controller
{
    public function getTacos(){
        $tacos = new Tacos();
        $lesTacos = $tacos->getLesTacos();
        return view('Tacos', compact('lesTacos'));
    }
}
