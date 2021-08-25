<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of Announcements
 * klasa  Announcements kontrolise prikaz obavestenja u zavisnosti od toga da li je
 * korisnik prijavljen
 * @author vd180005d
 */
class Announcements extends BaseController {
    //put your code here
    protected function prikazU(){
        echo view('Headernotsignedup');
        echo view('Announcements');
    }
    protected function prikazL(){
        echo view('Headersignedup');
        echo view('Announcements');
    }
    public function index(){
        if($this->session->get('korisnik')!=null)
            $this->prikazL();
        else
            $this->prikazU();
    }
}
