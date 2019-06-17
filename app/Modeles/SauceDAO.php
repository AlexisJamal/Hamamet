<?php


namespace App\Modeles;
use DB;
use App\Metier\Sauce ;


class SauceDAO extends DAO
{

    public function getLesSauces()
    {
        $lesSauces=array();
        $sauces=DB::table('sauces')->get();
        if($sauces)
        {
            $i = 0;
            foreach ($sauces as $laSauce){
                $lesSauces[$i] = $this->creerObjetMetier($laSauce);
                $i++;
            }
        }
        return $lesSauces;
    }


    protected function creerObjetMetier(\stdClass $objet)
    {
        $laSauce= new Sauce();
        $laSauce->setIdSauce($objet->id);
        $laSauce->setNomSauce($objet->name);
        return $laSauce;
    }
}