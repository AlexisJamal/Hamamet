<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modeles\BurgerDAO;


class BurgerController extends Controller
{
    public function getBurgers(){
        $burger = new BurgerDAO();
        $lesBurgers = $burger->getLesBurgers();
        return view('burgers', compact('lesBurgers'));
    }
}