<?php


namespace App\Modeles;
use App\Metier\Produit;
use DB;
use Auth;

class ProduitDAO extends DAO
{

    public function getLesProduits()
    {
        $produits = DB::table('produit')->get();
        $lesProduits = array();
        foreach ($produits as $produit) {
            $idProd = $produit->id;
            $lesProduits[$idProd] = $this->creerObjetMetier($produit);
        }
        return $lesProduits;
    }



    public function getProduitById($idProd)
    {

        $monProduit = DB::table('produit')->where('id', $idProd)->get();
        $lesProduits = array();
        foreach ($monProduit as $produit) {
            $idProd = $produit->id;
            $lesProduits[$idProd] = $this->creerObjetMetier($produit);
        }
        return $lesProduits;
    }



    //
    protected function creerObjetMetier(\stdClass $objet)
    {
        $leProduit = new Produit();
        $leProduit->setId($objet->id);
        $leProduit->setNom($objet->name);
        $leProduit->setImage($objet->image);
        $leProduit->setCategorie($objet->categorie);
        $leProduit->setComposition($objet->composition);
        $leProduit->setPrix($objet->prix);
        return $leProduit;
    }



    public function creationProduit($idProduit){
        DB::table('commande')->insert([
            'produitId'=>$idProduit,
            'userId'=>Auth::user()->id
        ]);
    }
}