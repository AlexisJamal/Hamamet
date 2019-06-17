<?php


namespace App\Modeles;
use DB;
use App\Metier\Commande;
use Auth;


class CommandeDAO
{
    public function getLesCommandes()
    {
        $lesCommandes=array();
        $commande=DB::table('commande')->get();
        if($commande)
        {
            $i = 0;
            foreach ($commande as $laCommande){
                $lesCommandes[$i] = $this->creerObjetMetier($laCommande);
                $i++;
            }
        }
        return $lesCommandes;
    }



    public function getProduitIdByUserId($userId)
    {
        //On sélectionne une conference par son id.
        //La requête ne retournant qu'une seule occurrence, on utilise la méthode first de Querybuilder
        $produitId = DB::table('commande')->select('produitId')->where('userId', $userId)->first();
        return $produitId;
    }

    protected function creerObjetMetier(\stdClass $objet)
    {
        $laCommande = new Commande();
        $laCommande->setIdCommande($objet->id);
        $laCommande->setIdUser($objet->userId);
        $laCommande->setProduitId($objet->produitId);
        return $laCommande;
    }

    public function creationCommande(Commande $uneCommande)
    {
        DB::table('commande')->insert([
            'id'=>$uneCommande->getIdCommande(),
            'userId'=>$uneCommande->getIdUser(),
            'produitId'=>$uneCommande->getProduitId()
        ]);
    }


    public function getCommandeById($id)//quand tu l'appelles faut le faire avec {{ Auth::user()->name }}
    {
        $macommande = DB::table('commande')->where('userId', '=', $id)->first();
        $commande = $this->creerObjetMetier($macommande);
        return $commande;
    }

    public function getCommandesById($id)//quand tu l'appelles faut le faire avec {{ Auth::user()->name }}
    {
        $lesCommandes=array();
        $commande=DB::table('commande')->where('userId', '=', $id)->get();
        if($commande)
        {
            $i = 0;
            foreach ($commande as $laCommande){
                $lesCommandes[$i] = $this->creerObjetMetier($laCommande);
                $i++;
            }
        }
        return $lesCommandes;
    }

    public function delete($id){
        DB::Table('commande')->where('userId', Auth::id())->where('produitId', $id)->delete();
    }

}