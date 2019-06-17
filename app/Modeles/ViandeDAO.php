<?php


namespace App\Modeles;
use DB;
use App\Metier\Viande;

class ViandeDAO extends DAO
{
    public function getLesViandes()
    {
        $viandes = DB::table('produit')->where('categorie','=','tacos')->get();
        $lesViandes = array();
        foreach ($viandes as $viande) {
            $idProd = $viande->id;
            $lesViandes[$idProd] = $this->creerObjetMetier($viande);
        }
        return $lesViandes;
    }

    public function getViandeById($idViande)
    {
        //On sélectionne une conference par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $maViande = DB::table('produit')->where('id', '=', $idViande)->first();
        $viande = $this->creerObjetMetier($maViande);
        return $viande;
    }

    //
    protected function creerObjetMetier(\stdClass $objet)
    {
        $laViande = new Viande();
        $laViande->setId($objet->id);
        $laViande->setNom($objet->name);
        $laViande->setImage($objet->image);
        $laViande->setComposition($objet->composition);
        $laViande->setPrix($objet->prix);
        return $laViande;
    }

    public function creationProduit(Viande $viande){
        DB::table('produit')->insert([
            'id'=>$viande->getId(),
            'nom'=>$viande->getNom(),
            'image'=>$viande->getImage(),
            'categorie'=>$viande->getCategorie(),
            'composition'=>$viande->getComposition(),
            'prix'=>$viande->getPrix()
        ]);
    }
}