<?php


namespace App\Http\Controllers;
use App\Modeles\ProduitDAO;
use App\Modeles\CommandeDAO;
use App\Metier\Commande;
use App\Metier\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;


class CommandeController extends Controller
{
    public function getCommandes(){
        $commande = new commandeDAO();
        $let = $commande->getCommandesById(Auth::id());
        $lesCommandes=array();
        $i = 0;
        foreach ($let as $item){
            $idProd = $item->getProduitId();
            $produit = new ProduitDAO();
            $lesCommandes[$i] = $produit->getProduitById($idProd);
            $i++;
        }
        return view('panier', compact('lesCommandes'));
    }



    public function panier($id){
        $produit1 = new ProduitDAO();
        $produit1 ->creationProduit($id);
        $commande = new commandeDAO();
        $let = $commande->getCommandesById(Auth::id());
        $lesCommandes=array();
        $i = 0;
        foreach ($let as $item){
            $idProd = $item->getProduitId();
            $produit = new ProduitDAO();
            $lesCommandes[$i] = $produit->getProduitById($idProd);
            $i++;
        }
        return view('panier', compact('lesCommandes'));
    }




    public function supprimer($id){
        $commande = new commandeDAO();
        $commande->delete($id);
        $commande = new commandeDAO();
        $let = $commande->getCommandesById(Auth::id());
        $lesCommandes=array();
        $i = 0;
        foreach ($let as $item){
            $idProd = $item->getProduitId();
            $produit = new ProduitDAO();
            $lesCommandes[$i] = $produit->getProduitById($idProd);
            $i++;
        }
        return view('panier', compact('lesCommandes'));
    }



    public function getAllCommandes(){

        $commandes = new CommandeDAO();
        $lesCommandes = $commandes->getLesCommandes();
        return view('listeCommandes', compact('lesCommandes'));

    }


    /*
    public function getCommandeById($id)
    {
        $commande = new ConferenceDAO();
        $laCommande = $commande->getConferenceById($id);
        //pour simplifier l'accès aux données dans la vue "ListerCommentaire', on passe deux objets
        //laConference représente la conférence qui a été sélectionnée
        //lesCommentaires représente la liste des commentaires associés à cette conférence
        return view('listeCommandes',compact('laCommande'));
    }
    */



    public function creerCommande(InsertionCommandeRequest $request, $id){
        $produitDAO = getProduitById($id);

        $maCommande = new Commande();
        $maCommande->setIdCommande($request->input('id'));
        $maCommande->setIdUser($request->input('descriptionConf'));
        $maCommande->setProduitId($request->input('id'));
        $maCommandeDAO = new CommandeDAO();
        $maCommandeDAO->creationCommande($maCommande);
        return view('insertionOK');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:posts|max:255',
            'userId' => 'required',
            'produitId' => 'required',
        ]);

        // The blog post is valid...
    }
}