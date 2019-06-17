<?php


namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Metier\Produit;
use App\Modeles\ProduitDAO;
use Session;

class ProduitController extends Controller
{
    public function getProduits(){
        $produit = new ProduitDAO();
        $lesProduits = $produit->getLesProduits();
        return view('produits', compact('lesProduits'));
    }

    public function getIndex(){
        return view('welcome');
    }

    public function getAddToCart(Request $request, $id){
        $produit = Produit::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($produit, $produit->id);

        $request->session()->put('cart', $cart);
        dd($request->session()->get('cart'));
        return redirect()->route('produit.index');
    }
}