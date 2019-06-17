<?php

namespace App\Http\Controllers;

use App\Modeles\ViandeDAO;
use App\Modeles\SauceDAO;

class ViandeController extends Controller
{
    public function getViandes(){
        $viande = new ViandeDAO();
        $lesViandes = $viande->getLesViandes();

        $sauce = new SauceDAO();
        $lesSauces = $sauce->getLesSauces();
        return view('tacos', compact('lesViandes', 'lesSauces'));
    }
}
