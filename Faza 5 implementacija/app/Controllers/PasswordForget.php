<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use App\Models\Entities\Korisnici;

/**
 * Description of PasswordForget
 * Za promeny lozinke
 * @author vd180005d
 */
class PasswordForget extends BaseController {
    public  function index(){
        return view('Password-forget');
    }
    protected function prikaz($data) {
        $data['controller']='Korisnik';
        echo view ('Password-forget', $data);
    }
    public function login($poruka=null){
        $this->prikaz(['poruka'=>$poruka]);
    }
    public function Obrada(){
        $korisnik=$this->doctrine->em->getRepository(Korisnici::class)->findOneBy(array('mail' => $this->request->getVar('mail')));
        if ($korisnik==null){
            $poruka='Ne postoji korisnik';
            echo view('Password-forget',['poruka'=>$poruka]);
        }
        else{
            $this->session->set('mail',$this->request->getVar('mail'));
            return redirect()->to('/PasswordForget/change');
        }
    }
    public function change(){
        if($this->session->get('mail')!=null)
            return view('Password-change');
        else
            return "greska";
    }
    public function changePassword(){
        $korisnik=$this->doctrine->em->getRepository(Korisnici::class)->findOneBy(array('mail' => $this->session->get('mail')));
        $korisnik->setPassword(md5($this->request->getVar('pass')));
        $this->doctrine->em->flush();
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }
}
