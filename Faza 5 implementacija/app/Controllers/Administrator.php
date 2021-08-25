<?php


namespace App\Controllers;


use App\Models\Entities\Admin;
use App\Models\Entities\Korisnici;
use App\Models\Entities\Oglasi;

/**
 * Class Administrator
 * Administrator sluzi za prijavu admina
 * ima mogucnost brisanje i potvrde korisnika i oglasa
 * @author vd180005d
 */
class Administrator extends BaseController{
    public function index(){
        return view('AdminSignin');
    }
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }
    public function loginSubmit() {
        $korisnik=$this->doctrine->em->getRepository(Admin::class)->findOneBy(array('username' => $this->request->getVar('username')));
        if($korisnik==null)
            return $this->login('Korisnik ne postoji');
        if($korisnik->getPassword()!=md5($this->request->getVar('pass')))
            return $this->login('Pogresna lozinka ili nije potvrdjen nalog');
        $this->session->set('Admin', $korisnik);
        return redirect()->to(site_url('Administrator/Potvrde'));
    }
    public function Potvrde(){
        if($this->session->get('Admin')!=null)
            $this->prikazK();
        else
            return 'Greska';
    }
    public function PotvrdaK($id)
    {
        if ($this->session->get('Admin') != null) {
            $korisnik = $this->doctrine->em->getRepository(Korisnici::class)->find($id);
            $korisnik->setIsValid(true);
            $this->doctrine->em->flush();
            return redirect()->to(site_url('Administrator/Potvrde'));
        }
        else
            return 'Greska';
    }
    public function PotvrdaO($id)
    {
        if ($this->session->get('Admin') != null) {
            $oglasi = $this->doctrine->em->getRepository(Oglasi::class)->find($id);
            $oglasi->setIsValid(true);
            $this->doctrine->em->flush();
            return redirect()->to(site_url('Administrator/Potvrde'));
        }
        else
            return 'Greska';
    }
    public function brisiK($id)
    {
        if ($this->session->get('Admin') != null) {
            $korisnik = $this->doctrine->em->getRepository(Korisnici::class)->find($id);
            $this->doctrine->em->remove($korisnik);
            $this->doctrine->em->flush();
            return redirect()->to(site_url('Administrator/Potvrde'));
        }
        else
            return 'Greska';
    }
    public function brisiO($id)
    {
        if ($this->session->get('Admin') != null) {
            $oglasi = $this->doctrine->em->getRepository(Oglasi::class)->find($id);
            $this->doctrine->em->remove($oglasi);
            $this->doctrine->em->flush();
            return redirect()->to(site_url('Administrator/Potvrde'));
        }
        else
            return 'Greska';
    }
    protected function prikazK(){
        $korisnici=$this->doctrine->em->getRepository(Korisnici::class)->findBy(array('isvalid' => false));
        $oglasi=$this->doctrine->em->getRepository(Oglasi::class)->findBy(array('isvalid' => false));
        $korisnicip=$this->doctrine->em->getRepository(Korisnici::class)->findBy(array('isvalid' => true));
        $oglasip=$this->doctrine->em->getRepository(Oglasi::class)->findBy(array('isvalid' => true));
        echo view('Prikaz',['korisnici'=>$korisnici,'oglasi'=>$oglasi,'korisnicip'=>$korisnicip,'oglasip'=>$oglasip]);
    }


}