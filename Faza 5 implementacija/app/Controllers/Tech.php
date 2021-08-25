<?php


namespace App\Controllers;

use App\Models\Entities\Oglasi;
/**
 * Description of Tech
 *
 * @author Dobrosav Vlaskovic
 */
class Tech extends BaseController{
    protected function prikazU(){
        $pets=$this->doctrine->em->getRepository(Oglasi::class)->findBy(array('isvalid' => true, 'category' => 'Tehnika'));
        echo view('Headernotsignedup');
        echo view('Tech',['pets'=>$pets]);
    }
    protected function prikazL(){
        $pets=$this->doctrine->em->getRepository(Oglasi::class)->findBy(array('isvalid' => true, 'category' => 'Tehnika'));
        echo view('Headersignedup');
        echo view('Tech',['pets'=>$pets]);
    }
    public function index(){
        if($this->session->get('korisnik')!=null)
            $this->prikazL();
        else
            $this->prikazU();
    }
}
