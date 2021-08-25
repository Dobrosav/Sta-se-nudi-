<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use App\Models\Entities\Oglasi;

/**
 * Description of Clothes
 * Clothes kontrolise prikaz obavestenja u zavisnosti od toga da li je
 * korisnik prijavljen
 * @author vd180005d
 */
class Clothes extends BaseController{
    protected function prikazU(){
        $pets=$this->doctrine->em->getRepository(Oglasi::class)->findBy(array('isvalid' => true, 'category' => 'Odeca'));
        echo view('Headernotsignedup');
        echo view('clothes',['pets'=>$pets]);
    }
    protected function prikazL(){
        $pets=$this->doctrine->em->getRepository(Oglasi::class)->findBy(array('isvalid' => true, 'category' => 'Odeca'));
        echo view('Headersignedup');
        echo view('clothes',['pets'=>$pets]);
    }
    public function index(){
        if($this->session->get('korisnik')!=null)
            $this->prikazL();
        else
            $this->prikazU();
    }
}
