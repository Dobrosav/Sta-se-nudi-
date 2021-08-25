<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use App\Models\Entities\Korisnici;

/**
 * Description of Register
 * Klasa za registraciju novog korisnika
 * napravili smo novu pristupnu tacku register
 * u slucaju uspesne registracije preusmeravamo korisnika na pocetnu stranu
 * @author vd180005d
 */
class Register extends BaseController{
    public function index(){
        return view('Register');
    }
    protected function prikaz($data) {
        $data['controller']='Register';
        echo view ('Register', $data);
    }
    public function login($poruka=null){
        $this->prikaz(['poruka'=>$poruka]);
    }
    public function register(){
        $korisnik=new Korisnici();
        $korisnik->setIsvalid(false);
        $korisnik->setMail($this->request->getVar('email'));
        $korisnik->setName($this->request->getVar('ime'));
        $korisnik->setSurname($this->request->getVar('prezime'));
        $korisnik->setPassword(md5($this->request->getVar('pass')));
        $korisnik->setUsername($this->request->getVar('username'));
        $this->doctrine->em->persist($korisnik);
        $this->doctrine->em->flush();
        $this->login('Uspeno ste se registrovali cekajte potvrdu administratora bicete preusmereni na pocetnu stranu');
        return redirect()->to(site_url('Home'));
    }
}