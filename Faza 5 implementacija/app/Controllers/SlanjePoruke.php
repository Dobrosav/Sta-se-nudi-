<?php


namespace App\Controllers;
use App\Models\Entities\Korisnici;

/**
 * Class SlanjePoruke
 * Sluzi za slanje mejloova
 * @author  vd180005d
 */
class SlanjePoruke extends BaseController
{
    protected function prikazU() {
        echo view('Headernotsignedup');
        echo view('support-form');
    }
    protected function prikazL() {
        echo view('Headersignedup');
        echo view('support-form');
    }
    protected function prikaz($data) {
        $data['controller']='Korisnik';
        echo view ("Sign-in", $data);
    }
    public function login($poruka=null){
        $this->prikaz(['poruka'=>$poruka]);
    }
    public function index(){
        if($this->session->get('korisnik')!=null)
            $this->prikazL();
        else
            $this->prikazU();
    }
    public function posalji(){
        $korisnik=$this->session->get('korisnik');
        if($korisnik==null)
            return $this->login('ne mozete poslati poruku, niste registrovani');
        $mail=$korisnik->getMail();
        $text=$this->request->getVar('msg');
        $email=\Config\Services::email();
        $email->setFrom($mail);
        $email->setTo('vlaskovic.dodo@gmail.com');
        $email->setSubject('Podrska');
        $email->setMessage($text);
        $email->send();
        return redirect()->to(site_url('SlanjePoruke'));
    }
}