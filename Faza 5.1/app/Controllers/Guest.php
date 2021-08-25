<?php

namespace App\Controllers;

use App\Models\AdModel;
use App\Models\AnnouncementModel;
use App\Models\UserModel;

/**
 * Autori: Aleksandra Milović 2018/0126 i Dušan Gradojević 2018/0310
 */

/**
 * Guest - klasa koja sadrzi funkcionalnosti koje su dostupne gostu
 * 
 * @version 1.0
 */

class Guest extends BaseController
{       /**
         * Prikazuje izgled stranice koja je prosleđena sa dodatnim argumentima
         * 
         * @param String $page, Array $data
         * 
         * @return void
         */ 
	protected function show($page,$data)
	{
            
                $data['controller']='Guest';
                $data['sessionId'] = '';
		echo view('common/header-guest');
                echo view('common/menu', $data);
                echo view("common/$page", $data);
                echo view('common/footer-guest');
	}
        
        
        /**
         * Prikaz početnog stanja aplikacije u režimu gosta.
         * 
         * @return void
         */ 
        public function index()
	{       
		$this->show('home', []);
	}
        
        
        /**
         * Prikaz stranice za korisničku podršku.
         * 
         * @return void
         */  
        public function support() 
        {
                $this->show('sign-in', []);
        }
        
        
        /**
         * Unosi korisnika u bazu ako su mu podaci validni i prosleđuje ga na poruku dobrodošlice.
         * 
         * @return void
         */  
        public function registerSubmit()
	{
		if(!$this->validate(['name'=>'required', 'surname'=>'required', 'username' =>'required', 'email'=>'required', 'password'=>'required', 'confirmpassword'=>'required|matches[password]','country'=>'required','phone'=>'required',]))
                {
                    return $this->show('register', ['errors'=>$this->validator->getErrors()]);
                }    
                
                $userModel=new UserModel();
                
                $date = date('Y-m-d');
                $mail = $this->request->getVar('email');
                $username = $this->request->getVar('username');
                
                $allUsers = $userModel->findAll();
                
                foreach ($allUsers as $user)
                {
                    if($user->mail == $mail)
                    {
                        return $this->show('register', ['poruka'=>"Već postoji korisnik sa zadatim mejlom."]);
                    }
                    elseif($user->username == $username)
                    {
                        return $this->show('register', ['poruka'=>"Već postoji korisnik sa zadatim korisničkim imenom."]);
                    }
                }
                
                
                $userModel->save([
                    'username'=>$this->request->getVar('username'),
                    'name'=>$this->request->getVar('name'),
                    'mail'=>$this->request->getVar('email'),
                    'password'=>md5($this->request->getVar('password')),
                    'surname'=>$this->request->getVar('surname'),
                    'country'=>$this->request->getVar('country'),
                    'num'=>$this->request->getVar('phone'),
                    'date'=>$date
                ]);
                
         
                
                $user = $userModel->where("username",$this->request->getVar('username'))->first();
                $this->session->set('user', $user);
                
                $this->successMsg('Čestitamo! Uspešno ste se registrovali na platformu!');   
	}
        
        
        
        /**
         * Prosleđuje gosta na formu za registraciju
         * 
         * @return void
         */  
        public function register()
        {
                $this->show('register', []);
        }
        
        
        /**
         * Otvara profil korisnika čiji je id prosleđen kao argument
         * 
         * @param int $userId
         * 
         * @return void
         */  
        public function userProfile($userId)
        {
                $userModel = new UserModel();
                $profile = $userModel->find($userId);
                $this->show('profile-guest', ['userId' => $userId, 'name' => $profile->name, 'surname' => $profile->surname ,'username' => $profile->username, 'country' => $profile->country, 
                                'num' => $profile->num, 'rating' => $profile->rating, 'date' => $profile->date]);
        }
        
        
        
        /**
         * Šalje gosta na stranicu za logovanje ako pokuša da pošalje poruku
         * 
         * @param int $userId
         * 
         * @return void
         */  
        public function sendMessage($userId)
        {
                $this->show('sign-in', []);
        }
        
        
        /**
         * Šalje gosta na stranicu za popunjavanje forme za zaboravljenu lozinku
         * 
         * @param string $poruka
         * 
         * @return void
         */  
        public function passwordForget($poruka = null)
        {
                $this->show('password-forget', ['poruka' => $poruka]);
        }
        
        
        
        /**
         * Šalje korisniku na mejl zaboravljenu lozinku
         * 
         * @return void
         */  
        public function mailForgetPassword()
        {
                $username = $this->request->getVar('username');
                $userModel = new UserModel();
                $user = $userModel->where('username', $username)->first();
                
                if ($user == null)
                {
                    return $this->passwordForget('Korisnik ne postoji');
                }
                
                $msg = "Vaša lozinka je $user->password.";
                        
                // use wordwrap() if lines are longer than 70 characters
                //$msg = wordwrap($msg,70);

                mail($user->mail,"Šta se nudi - zaboravljena lozinka", $msg);
                return redirect()->to(site_url("Guest")); 
        }
        
        
        
        /**
         * Šalje gosta na stranicu za logovanje
         * 
         * @param string $poruka
         * 
         * @return void
         */  
        public function login($poruka = null)
	{
		$this->show('sign-in', ['poruka'=>$poruka]);
	}
        
        
        
        /**
         * Loguje korisnika na sistem
         * 
         * @return void
         */  
        public function loginSubmit()
        {
                if(!$this->validate(['username'=>'required', 'password'=>'required']))
                {
                    return $this->show('sign-in', ['errors'=>$this->validator->getErrors()]);
                }
                
                $userModel=new UserModel();
                $user = $userModel->where("username",$this->request->getVar('username'))->first();
                
                if($user == null)
                {
                    return $this->login('Korisnik ne postoji');
                }
                
                if($user->password != md5($this->request->getVar('password')))   //Promenjeno u user->password umesto user->lozinka
                {
                    return $this->login('Pogresna lozinka');
                }
                
                
                $this->session->set('user', $user);
                
                if ($user->username == 'admin')
                {
                    return redirect()->to(site_url("Admin"));  
                }
                
                
                return redirect()->to(site_url("User"));  
        }
      
}
