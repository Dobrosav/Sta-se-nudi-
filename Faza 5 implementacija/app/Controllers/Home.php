<?php
/**
 *
 * Dobrosav Vlaskovic 
 */
namespace App\Controllers;

class Home extends BaseController
{
    protected function prikazU(){
        echo view('Headernotsignedup');
        echo view('welcome_message');
    }
    protected function prikazL(){
        echo view('Headersignedup');
        echo view('welcome_message');
    }

    public function index(){
        if($this->session->get('korisnik')!=null)
            $this->prikazL();
        else
            $this->prikazU();
    }
}
