<?php


namespace App\Controllers;


use App\Models\Entities\Oglasi;
use App\Models\Repositories\OglasiRepository;
/**
 * Description of Pretraga
 * Pretraga sluzi pretragu oglasu u bazi podataka
 * Takodje vodi racuna o tome da li je korisnik ylogovan
 *
 * @author vd180005d
 */

class Pretraga extends BaseController{
    protected function prikazU($tekst){
        $pets=$this->doctrine->em->getRepository(Oglasi::class)->pretragadql($tekst);
        echo view('Headernotsignedup');
        echo view('Pretraga',['pets'=>$pets]);
    }
    protected function prikazL($tekst){
        $pets=$this->doctrine->em->getRepository(Oglasi::class)->pretragadql($tekst);
        echo view('Headersignedup');
        echo view('Pretraga',['pets'=>$pets]);
    }
    public function index(){
        if($this->session->get('korisnik')!=null)
            $this->prikazL($this->request->getVar('pretraga'));
        else
            $this->prikazU($this->request->getVar('pretraga'));
    }
}