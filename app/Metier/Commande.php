<?php


namespace App\Metier;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    private $idCommande;
    private $idUser;
    private $produitId;

    public function getCommandes(){
        $lesCommandes = DB::table('commande')->get();
        return $lesCommandes;
    }


    public function getIdCommande()
    {
        return $this->idCommande;
    }

    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getProduitId()
    {
        return $this->produitId;
    }

    public function setProduitId($produitId)
    {
        $this->produitId = $produitId;
    }


}