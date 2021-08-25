<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;
use App\Models\Entities\Korisnici;
/**
 * Description of SignIn
 * sluzi za prijavu na sistem.
 * uz pomoc loginSubmit ide do baze
 * @author vd180005d
 */
class SignIn extends BaseController{


    protected function prikaz($data) {
        $data['controller']='Korisnik';
        echo view ("Sign-in", $data);
    }
    public function login($poruka=null){
        $this->prikaz(['poruka'=>$poruka]);
    }
    public function index() {
        return view("Sign-in");
    }
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }
    public function loginSubmit() {
        $korisnik=$this->doctrine->em->getRepository(Korisnici::class)->findOneBy(array('username' => $this->request->getVar('username')));
        if($korisnik==null)
            return $this->login('Korisnik ne postoji');
        echo $korisnik->getIsvalid();
        if($korisnik->getPassword()!=md5($this->request->getVar('pass')))
            return $this->login('Pogresna lozinka ili nije potvrdjen nalog');
        if ($korisnik->getIsvalid()==false)
            return $this->login('Nije potvrdjen nalog');
        $this->session->set('korisnik', $korisnik);
        return redirect()->to(site_url('Home'));
    }
}
