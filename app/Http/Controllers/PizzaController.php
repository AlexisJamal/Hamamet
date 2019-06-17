<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modeles\PizzaDAO;


class PizzaController extends Controller
{
    public function getPizzas(){
        $pizza = new PizzaDAO();
        $lesPizzas = $pizza->getLesPizzas();
        return view('pizza', compact('lesPizzas'));
    }
}