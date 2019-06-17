<?php


namespace App\Modeles;
use DB;
use App\Metier\Burger;

class BurgerDAO extends DAO
{
    public function getLesBurgers()
    {
        $burgers = DB::table('produit')->where('categorie','=','burger')->get();
        $lesBurgers = array();
        foreach ($burgers as $burger) {
            $idProd = $burger->id;
            $lesBurgers[$idProd] = $this->creerObjetMetier($burger);
        }
        return $lesBurgers;
    }

    public function getBurgerById($idBurger)
    {
        //On sélectionne une conference par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $monBurger = DB::table('produit')->where('id', '=', $idBurger)->first();
        $burger = $this->creerObjetMetier($monBurger);
        return $burger;
    }

    //
    protected function creerObjetMetier(\stdClass $objet)
    {
        $leBurger = new Burger();
        $leBurger->setId($objet->id);
        $leBurger->setNom($objet->name);
        $leBurger->setImage($objet->image);
        $leBurger->setComposition($objet->composition);
        $leBurger->setPrix($objet->prix);
        return $leBurger;
    }

    public function creationProduit(Burger $burger){
        DB::table('produit')->insert([
            'id'=>$burger->getId(),
            'nom'=>$burger->getNom(),
            'image'=>$burger->getImage(),
            'categorie'=>$burger->getCategorie(),
            'composition'=>$burger->getComposition(),
            'prix'=>$burger->getPrix()
        ]);
    }
}