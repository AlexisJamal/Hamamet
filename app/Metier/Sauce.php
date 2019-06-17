<?php

namespace App\Metier;

use DB;
use Illuminate\Database\Eloquent\Model;

class Sauce extends Model
{

    private $idSauce;
    private $nomSauce;

    public function getSauces(){
        $lesSauces = DB::table('sauces')->get();
        return $lesSauces;
    }


    public function getIdSauce()
    {
        return $this->idSauce;
    }
    public function setIdSauce($idSauce)
    {
        $this->idSauce = $idSauce;
    }

    public function getNomSauce()
    {
        return $this->nomSauce;
    }
    public function setNomSauce($nomSauce)
    {
        $this->nomSauce = $nomSauce;
    }
}
