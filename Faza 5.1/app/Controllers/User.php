<?php

namespace App\Controllers;

use App\Models\AdModel;
use App\Models\AnnouncementModel;
use App\Models\ChatModel;
use App\Models\UserModel;
use App\Models\RatingModel;

/**
 * Autori: Lazar Gospavić 2018/0677 i Dušan Gradojević 2018/0310
 */

/**
 * User - klasa koja sadrzi funkcionalnosti koje su dostupne korisniku sa nalogom
 * 
 * @version 1.0
 */

class User extends BaseController
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
                $data['controller'] = 'User';
		$data['sessionId'] = $this->session->get('user')->idK;
                echo view('common/header-user', $data);
                echo view('common/menu', $data);
                echo view("common/$page", $data);
                echo view('common/footer-user');
	}
        
        
        
        /**
         * Prikaz početnog stanja aplikacije u režimu korisnika.
         * 
         * @return void
         */     
	public function index()
	{
		$this->show('home', []);
	}
        
        
        
        
        
        /**
         * Izlistavanje svih obaveštenja.
         * 
         * 
         * @return void
         */     
        public function announcements() 
        {
                $this->show('announcements',[]);
        }
        
        
        
        
        /**
         * Prikaz stranice za korisničku podršku.
         * 
         * @return void
         */     
        public function support() 
        {
                $this->show('support', []);
        }
        
        
        
        
        
        /**
         * Prikaz stranice za slanje korsničkih sugestija ili žalbi.
         * 
         * @return void
         */     
        public function supportForm()
        {
                $this->show('support-form', []);
        }
      
        
        
        
        /**
         * Prikazivanje forme za postavljanje oglasa
         * 
         * @return void
         */     
        public function postAd()
        {
                $this->show('post-upload', []);
        }
        
        
        
        
        /**
         * Funkcija koja upisuje oglas u bazu ukoliko je forma adekvatno popunjena.
         * 
         * @return void
         */     
        public function adSubmit() 
        {
                if($this->session->get('user')==null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                
                $date = date('Y-m-d');
                $adModel = new AdModel();
                
                
                if (isset($_POST['submit']))
                {
                    $file = $_FILES['file'];
                    $fileName = $file['name'];
                    $fileTmpName = $file['tmp_name'];
                    $fileSize = $file['size'];
                    $fileError = $file['error'];
                    
                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));
                    
                    $allowed = array('jpg', 'jpeg', 'png');
                    $fileNameNew = "";
                    
                    if (in_array($fileActualExt, $allowed))
                    {
                        if ($fileError === 0)
                        {
                            if ($fileSize < 500000)
                            {
                                $fileNameNew = uniqid('', true).".".$fileActualExt;
                                $fileDestination = 'C:/xampp/htdocs/stasenudi/public/assets/imgAds/'.$fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                            }
                        }
                    }
                }
                
                
                $adModel->save([
                    'title'=>$this->request->getVar('name'),
                    'isValid'=>false,
                    'type'=>$this->request->getVar('tip'),
                    'state'=>$this->request->getVar('stanje'),
                    'text'=>$this->request->getVar('description'),
                    'category'=>$this->request->getVar('category'),
                    'date'=>$date,
                    'idK'=>$this->session->get('user')->idK,
                    'country'=>$this->session->get('user')->country,
                    'img'=>$fileNameNew
                ]);
                
                $this->successMsg('Uspešno ste postavili oglas!');  
        }
        
        
        
        
        
        /**
         * Funkcija koja daje ocenu korisniku čiji je id prosleđen kao parametar.
         * 
         * @param int $userId
         * 
         * @return void
         */     
        public function gradeUser($userId)
        {
                if($this->session->get('user')==null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                
                $rate = $this->request->getVar('rate');
                
                if ($rate == 'Ocenite korisnika')
                {
                    return redirect()->to(site_url("User/userProfile/$userId"));
                }
                
                $ratingModel = new RatingModel();
                $rating = $ratingModel->where('user_rater', $this->session->get('user')->idK)->where('user_rated', $userId)->first();
                if ($rating != null)
                {
                    $ratingModel->set('rate', $rate)->where('IdR', $rating->IdR)->update();
                }
                else
                {
                    $ratingModel->save([
                        'rate' => $rate,
                        'user_rater' => $this->session->get('user')->idK,
                        'user_rated' => $userId                        
                    ]);
                }
                
                return redirect()->to(site_url("User/userProfile/$userId"));
        }

        
        
        /**
         * Izmena oglasa čiji je id prosleđen kao parametar.
         * 
         * @param int $adId
         * 
         * @return void
         */       
        public function adChange($adId) 
        {
                $adModel = new AdModel();
                $ad = $adModel->find($adId);
                $this->show('ad-change', ['adId' => $adId, 'title' => $ad->title, 'category' => $ad->category]);
        }
        
        
        
        /**
         * Potvrda izmene oglasa čiji je id prosleđen kao parametar.
         * 
         * @param int $adId
         * 
         * @return void
         */   
        public function adChangeSubmit($adId) 
        {
                $type = $this->request->getVar('tip');
                $state = $this->request->getVar('stanje');
                $text = $this->request->getVar('description');
                $img = $this->request->getVar('file');
                
                if (isset($_POST['submit']))
                {
                    $file = $_FILES['file'];
                    $fileName = $file['name'];
                    $fileTmpName = $file['tmp_name'];
                    $fileSize = $file['size'];
                    $fileError = $file['error'];
                    
                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));
                    
                    $allowed = array('jpg', 'jpeg', 'png');
                    $fileNameNew = "";
                    
                    if (in_array($fileActualExt, $allowed))
                    {
                        if ($fileError === 0)
                        {
                            if ($fileSize < 500000)
                            {
                                $fileNameNew = uniqid('', true).".".$fileActualExt;
                                $fileDestination = 'C:/xampp/htdocs/stasenudi/public/assets/imgAds/'.$fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                            }
                        }
                    }
                }
                
                
                if (empty($text)) 
                {
                    $text = "";
                }
                
                $adModel = new AdModel();
                $adModel->set('type', $type)->where('idO', $adId)->update();
                $adModel->set('state', $state)->where('idO', $adId)->update();
                $adModel->set('text', $text)->where('idO', $adId)->update();
                if (!empty($fileNameNew)) 
                {
                    $adModel->set('img', $fileNameNew)->where('idO', $adId)->update();
                }
                else
                {
                    $adModel->set('img', null)->where('idO', $adId)->update();
                }
                    
                
                $this->successMsg("Uspešno ste izmenili oglas!");
        }       
        
        
        
        
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
        
        
        
        
        /**
         * Funkcija koja salje na formu za potvrdu brisanja oglasa
         * 
         * @return void
         */     
//        public function deleteAdForm($adId)
//        {       
//                if($this->session->get('user') == null)
//                {
//                    return redirect()->to(site_url("Guest")); 
//                }
//                
//                $title = 'Brisanje oglasa';
//                $msg = 'Da li ste sigurni da želite da obrišete oglas?';
//                $pageSubmit = "deleteAd/$adId";
//                $pageReturn = "getAd/$adId";
//                
//                $this->show('confirmation-message', ['title' => $title, 'msg' => $msg, 'pageSubmit' => $pageSubmit, 'pageReturn' => $pageReturn]);
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
         * Prikaz stranice za promenu lozinke.
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
         * Funkcija za odjavljivanje korisnika.
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
        
}