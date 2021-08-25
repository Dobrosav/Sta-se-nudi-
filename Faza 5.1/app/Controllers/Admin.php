<?php

namespace App\Controllers;

use App\Models\AdModel;
use App\Models\AnnouncementModel;
use App\Models\ChatModel;
use App\Models\UserModel;
use App\Models\RatingModel;

/**
 * Autori: Aleksandra Milović 2018/0126 i Dobrosav Vlašković 2018/0005
 */

/**
 * Admin - klasa koja sadrzi funkcionalnosti koje su dostupne adminu
 * 
 * @version 1.0
 */

class Admin extends BaseController
{
    
        /**
         * Prikazuje izgled stranice koja je prosleđena sa dodatnim argumentima
         * 
         * @param String $page, Array $data
         * 
         * @return void
         */       
        protected function show($page,$data)
	{       
                $data['controller'] = 'Admin';
		$data['sessionId'] = $this->session->get('user')->idK;
                echo view('common/header-user', $data);
                echo view('common/menu', $data);
                echo view("common/$page", $data);
                echo view('common/footer-admin');
	}
    
        
        /**
         * Prikaz početnog stanja aplikacije u režimu administratora.
         * 
         * @return void
         */ 
	public function index()
	{       
		$this->show('home', []);
	}
        
        
        /**
         * Izlistavanje svih oglasa koji čekaju da budu odobreni.
         * 
         * @return void
         */ 
        public function pendingPosts()
        {
                $adModel = new AdModel();
                $ads = $adModel->getAds('isValid', false, false);
                
                $this->show('ads-user', ['userId' => 'admin', 'ads' => $ads]);
        }       
        
        
        

        
        
        
        
        
        /**
         * Funkcija koja odobrava oglasa čiji je id prosleđen kao parametar.
         * 
         * @param int $adId
         * 
         * @return void
         */ 
        public function approveAd($adId)
        {
                $adModel = new AdModel();
                $adModel->set('isValid', true)->where('idO', $adId)->update();
                
                //$this->show('ad', ['userId' => 'admin', 'ads' => $ads]);
                return redirect()->to(site_url("Admin/pendingPosts"));
        }
        
        
        
        /**
         * Prikaz forme za postavljanje obaveštenja.
         * 
         * @return void
         */ 
        public function postAnnouncement()
        {
                $this->show('post-announcement', []);
        }
        
        
        
        
        /**
         * Potvrda za postavljanje oglasa.
         * 
         * @return void
         */ 
        public function announcementSubmit()
        {
                if($this->session->get('user')==null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                
                $annModel = new AnnouncementModel();
                
                $annModel->save([
                    'title' => $this->request->getVar('name'),
                    'text' => $this->request->getVar('description'),
                    'idAd' => $this->session->get('user')->idK,
                    'date'=>date('Y-m-d')
                ]);
                
                
                return redirect()->to(site_url('Admin'));
        }
        
        
        /**
         * Funkcija za odjavljivanje sa sistema.
         * 
         * @return void
         */ 
//        public function logout()
//        {
//                if($this->session->get('user')==null)
//                {
//                    return redirect()->to(site_url("Guest")); 
//                }
//                
//                $this->session->destroy();
//                return redirect()->to(site_url(''));
//        }
        
        
        
        /**
         * Prikaz profila korisnika čiji je id prosleđen kao parametar
         * 
         * @param int $userVisitId
         * 
         * @return void
         */   
//        public function userProfile($userVisitId)
//        {       
//                $userModel = new UserModel();
//                $profile = $userModel->find($userVisitId);
//                
//                $ratingModel = new RatingModel();
//                $rates = $ratingModel->where('user_rated', $userVisitId)->findAll();
//                $sum = 0;
//                $cnt = 0;                
//                foreach ($rates as $rate)
//                {
//                    $sum = $sum + $rate->rate;
//                    $cnt = $cnt + 1;
//                }
//                $rating = $cnt == 0 ? 0 : $sum / $cnt;
//                
//                
//                
//                $page = 'profile-user';
//                
//                if($this->session->get('user')==null)
//                {
//                    return redirect()->to(site_url("Guest")); 
//                }
//                
//                
//                if ($this->session->get('user')->idK == $userVisitId)
//                {
//                    $page = 'profile-session-user';
//                }
//                $this->show($page, ['userVisitId' => $userVisitId, 'name' => $profile->name, 'surname' => $profile->surname ,'username' => $profile->username, 'country' => $profile->country, 
//                                'num' => $profile->num, 'rating' => $rating, 'date' => $profile->date]);
//        }
        
        
        /**
         * Prikaz forme za promenu lozinke
         * 
         * @return void
         */   
//        public function changePassword() 
//        {
//                $this->show('password-change', []);
//        }
        
        
        
        /**
         * Potvrđivanje zahteva za promenu lozinke.
         * 
         * @return void
         */     
//        public function passwordChangeSubmit()
//        {       
//                if($this->session->get('user')==null)
//                {
//                    return redirect()->to(site_url("Guest")); 
//                }
//                
//                $oldPass = $this->request->getVar('old-pass');
//                $newPass = $this->request->getVar('new-pass');
//                $newPassConf = $this->request->getVar('new-pass-conf');
//                $oldPassDatabase = $this->session->get('user')->password;
//                
//                if($newPass != $newPassConf)
//                {
//                    return $this->show('password-change', ['poruka'=>"Polja za novu lozinku nisu identična"]);
//                }
//                
//                if($oldPass != $oldPassDatabase)
//                {
//                    return $this->show('password-change', ['poruka'=>"Stara lozinka je pogrešna"]);
//                }
//                
//                $userModel = new UserModel();                
//                $userId = $userModel->find($this->session->get('user')->idK)->idK;
//                
//                $userModel->set('password', $newPass)->where('idK', $userId)->update();
//                $this->session->get('user')->password = $newPass;
//                
//                $this->successMsg('Uspešno ste promenili lozinku!');
//        }
        
        
        
        
        
        /**
         * Prikazuje formu za slanje poruke korisniku koji je prosleđen kao parametar.
         * 
         * @param int $userId
         * 
         * @return void
         */     
//        public function sendMessage($userId)
//        {       
//                $userModel = new UserModel();
//                $name = $userModel->find($userId)->name;
//                $surname = $userModel->find($userId)->surname;
//                $this->show('send-message', ['userId' => $userId, 'name' => $name, 'surname' => $surname]);
//        }
        
        
        
        /**
         * Potvrđivanje slanja poruke korisniku čiji je id prosleđen kao parametar.
         * 
         * @param int $userId
         * 
         * @return void
         */   
//        public function sendMessageSubmit($userId)
//        {       
//                if($this->session->get('user')==null)
//                {
//                    return redirect()->to(site_url("Guest")); 
//                }
//                
//                $msg = $this->request->getVar('message-body');
//                
//                $userModel = new UserModel();
//                $name = $userModel->find($userId)->name;
//                $surname = $userModel->find($userId)->surname;
//                
//                if (empty($msg))
//                {
//                    $this->show('send-message', ['userId' => $userId, 'name' => $name, 'surname' => $surname]);
//                }
//                
//                $chatModel = new ChatModel();
//                
//                $chatModel->save([
//                    'user_to'=>$userId,
//                    'user_from'=>$this->session->get('user')->idK,
//                    'message'=>$msg,
//                    'datetime'=>date('Y-m-d'),
//                ]);
//                
//                $this->show('send-message', ['userId' => $userId, 'name' => $name, 'surname' => $surname]);
//        }
        
        
        /**
         * Prikazivanje prepiske sa korisnikom čiji je id prosleđen kao parametar.
         * 
         * @param int $userId
         * 
         * @return void
         */     
//        public function chat($userId)
//        {
//                if($this->session->get('user')==null)
//                {
//                    return redirect()->to(site_url("Guest")); 
//                }
//                
//                $chatModel = new ChatModel();
//                $chat = $chatModel->getChat($this->session->get('user')->idK, $userId);
//                $userModel = new UserModel();
//                $user = $userModel->find($userId);
//                $nameSession = $userModel->find($this->session->get('user')->idK)->name;
//                $surnameSession = $userModel->find($this->session->get('user')->idK)->surname;
//                $this->show('chat', ['chat' => $chat, 'userId' => $userId, 'name' => $user->name, 'surname' => $user->surname, 
//                                    'nameSession' => $nameSession, 'surnameSession' => $surnameSession]);
//        }
        
        
        
        /**
         * Brisanje oglasa iz baze čiji je id prosleđen kao parametar.
         * 
         * @param int $adId
         * 
         * @return void
         */ 
//        public function deleteAd($adId)
//        {
//                $adModel = new AdModel();
//                $adModel->where('idO', $adId)->delete();
//                
//                $this->successMsg("Uspešno ste obrisali oglas!");
//        }
        
        
        
         /**
         * Otvara prijemnno sanduče korisnika.
         * 
         * @return void
         */   
//        public function inbox()
//        {       
//                //lista korisnika sa kojima se dopisivao
//                if($this->session->get('user')==null)
//                {
//                    return redirect()->to(site_url("Guest")); 
//                }
//                            
//                $chatModel = new ChatModel();
//                $friends = $chatModel->getFriends($this->session->get('user')->idK);
//                
//                $this->show('inbox', ['friends' => $friends]);
//        }
        
        
        
        
        
}
