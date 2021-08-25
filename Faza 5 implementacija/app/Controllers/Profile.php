<?php


namespace App\Controllers;
use App\Models\Entities\Korisnici;
use App\Models\Entities\Oglasi;
use http\Env\Request;
use phpDocumentor\Reflection\Types\This;

/**
 * Description of Profile
 * Profile kontrolise sve mogucnosti profila
 * @author vd180005d
 */

class Profile extends BaseController
{
    protected function prikaz($data) {
        $data['controller']='Korisnik';
        echo view ('profile', $data);
    }
    protected function login($poruka=null){
        $this->prikaz(['user'=>$poruka]);
    }
    public function index(){
        $korisnik=$this->session->get('korisnik');
        echo view('Headersignedup');
        $this->login($korisnik);

    }
    public function deleteRequest($id){
        if ($this->session->get('korisnik')!=null) {
            echo view('Headersignedup');
            echo view('Acc-delete',['id'=>$id]);
        }
        else
            return "Greska";
    }
    public function delete($id){
        if ($this->session->get('korisnik')) {
            $this->session->destroy();
            $korisnik = $this->doctrine->em->getRepository(Korisnici::class)->find($id);
            $this->doctrine->em->remove($korisnik);
            $this->doctrine->em->flush();
            return redirect()->to(site_url('/'));
        }
        else
            return "Greska";
    }
    protected function prikazL(){
        $pets=$this->doctrine->em->getRepository(Oglasi::class)->findBy(array('isvalid' => true, 'idk' => $this->session->get('korisnik')));
        echo view('Headersignedup');
        echo view('Adds',['pets'=>$pets]);
    }
    public function allads(){
        $this->prikazL();
    }
    public function insertAd(){
        echo view('Headersignedup');
        echo view('Post-upload');
    }
    public function insertNewAd(){
        $file=$this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()){
            $newname=$file->getRandomName();
            $file->move('uploads/',$newname);
        }
        $oglas=new Oglasi();
        $oglas->setIsvalid(false);
        $oglas->setCategory($this->request->getVar('category'));
        $oglas->setType($this->request->getVar('radiob'));
        $oglas->setText($this->request->getVar('opis'));
        $oglas->setIdk($this->session->get('korisnik'));
        $oglas->setTitle($this->request->getVar('naziv'));
        $oglas->setImgurl('http://localhost:8080/'. 'uploads/'.$newname);
        $this->doctrine->em->merge($oglas);
        $this->doctrine->em->flush();
        return redirect()->to(site_url('Profile'));
    }
    public function remove($id){
        $oglasi = $this->doctrine->em->getRepository(Oglasi::class)->find($id);
        $this->doctrine->em->remove($oglasi);
        $this->doctrine->em->flush();
        return redirect()->to(site_url('Profile/allads'));
    }
    public function editRequest($id){
        $oglasi = $this->doctrine->em->getRepository(Oglasi::class)->find($id);
        echo view('Headersignedup');
        echo view('edit',['oglas'=>$oglasi]);
    }
    public function edit($id){
        $oglasi = $this->doctrine->em->getRepository(Oglasi::class)->find($id);
        $oglasi->setText($this->request->getVar('text'));
        $this->doctrine->em->flush();
        return redirect()->to(site_url('Profile/allads'));
    }
}