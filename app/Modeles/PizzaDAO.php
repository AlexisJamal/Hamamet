<?php


namespace App\Modeles;
use DB;
use App\Metier\Pizza;

class PizzaDAO extends DAO
{
    public function getLesPizzas()
    {
        $pizzas = DB::table('produit')->where('categorie','=','pizza')->get();
        $lesPizzas = array();
        foreach ($pizzas as $pizza) {
            $idProd = $pizza->id;
            $lesPizzas[$idProd] = $this->creerObjetMetier($pizza);
        }
        return $lesPizzas;
    }

    public function getPizzaById($idPizza)
    {
        //On sélectionne une conference par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $maPizza = DB::table('produit')->where('id', '=', $idPizza)->first();
        $pizza = $this->creerObjetMetier($maPizza);
        return $pizza;
    }

    //
    protected function creerObjetMetier(\stdClass $objet)
    {
        $laPizza = new Pizza();
        $laPizza->setId($objet->id);
        $laPizza->setNom($objet->name);
        $laPizza->setImage($objet->image);
        $laPizza->setComposition($objet->composition);
        $laPizza->setPrix($objet->prix);
        return $laPizza;
    }

    public function creationProduit(Pizza $pizza){
        DB::table('produit')->insert([
            'id'=>$pizza->getId(),
            'nom'=>$pizza->getNom(),
            'image'=>$pizza->getImage(),
            'categorie'=>$pizza->getCategorie(),
            'composition'=>$pizza->getComposition(),
            'prix'=>$pizza->getPrix()
        ]);
    }
}