<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


use App\Models\AdModel;
use App\Models\AnnouncementModel;
use App\Models\ChatModel;
use App\Models\UserModel;
use App\Models\RatingModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

/**
 * Autori: Dobrosav Vlašković 2018/0005 i Lazar Gospavić 2018/0677 
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
            $this->session = session();
	}
        
        protected function show($page, $data) 
        {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        /**
         * Izlistavanje svih obaveštenja.
         * 
         * @return void
         */        
        public function showAnnouncements()
        {
                $annModel = new AnnouncementModel();
                $ann = $annModel->orderBy('idA', 'DESC')->findAll();
                $this->show('announcements', ['announcements' => $ann]);
        }
        
        /**
         * Izlistava sve oglase koji pripadaju prosleđenoj kategoriji kao parametar
         * 
         * @param String $category
         * 
         * @return void
         */     
        public function searchCategory($category)
        {
                $adModel = new AdModel();
                $ads = $adModel->getAds("category", $category);
                
                $this->show('search', ['ads' => $ads, 'searched' => $category]);
        }
        
        /**
         * Izlistavanje svih oglasa zadatog korisnika.
         * 
         * @param int $userId
         * 
         * @return void
         */      
        public function showUserAds($userId) 
        {
                $userModel = new UserModel();
                $user = $userModel->find($userId);
                $adModel = new AdModel();
                $ads = $adModel->getAds("idK", $userId);
                $i = 0;
                foreach ($ads as $ad)
                {
                    if ($ad->isValid != 1)
                    {
                        unset($ads[$i]);
                    }
                    $i++;
                }
                $this->show('ads-user', ['userId' => $userId, 'username' => $user->username, 'ads' => $ads]);
        }
        
        
        /**
         * Dohvatanje oglasa po id-u
         * 
         * @param int $adId
         * 
         * @return void
         */     
        public function getAd($adId)   
        {
                $adModel = new AdModel();
                $ad = $adModel->find($adId);
                
//                if($this->session->get('user') == null)
//                {
//                    return redirect()->to(site_url("Guest")); 
//                }
                
                if ($ad == null)
                {
                    if ($this->session->get('user') == null)
                    {
                        return redirect()->to(site_url("Guest")); 
                    }
                    elseif ($this->session->get('user')->idK == 1)
                    {
                        return redirect()->to(site_url("Admin")); 
                    }
                    else
                    {
                        return redirect()->to(site_url("User")); 
                    }
                }
                
                
                $userModel = new UserModel();
                
                if($ad == null)
                {
                    if($this->session->get('user')->idK == 1)
                    {
                        return redirect()->to(site_url("Admin")); 
                    }
                    return redirect()->to(site_url("Guest")); 
                }
                $user = $userModel->where('idK', $ad->idK)->first();
                $this->show('ad', ['adId' => $adId, 'title' => $ad->title, 'country' => $ad->country ,'username' => $user->username, 'userId' => $user->idK, 
                                'category' => $ad->category, 'type' => $ad->type, 'state' => $ad->state, 'description' => $ad->text, 'img' => $ad->img,
                                'isValid' => $ad->isValid]);
        }
        
        /**
         * Funkcija za pretragu i filtriranje oglasa.
         * 
         * @return void
         */     
        public function search()
        {
                $adModel = new AdModel();
                $searched = $this->request->getVar('search-bar');
                
                $category = $this->request->getVar('search-category');
                $type = $this->request->getVar('search-type');
                $country = $this->request->getVar('search-country');
//                $ads = $adModel->search($searched);   
                
//                if ($category != 'Sve kategorije' || $type != 'Svi tipovi' || $country != 'Sve države')
//                {
//                    $i = 0;
//                    foreach ($ads as $ad)
//                    {
//                        if ($category != 'Sve kategorije' && $ad->category != $category)
//                        {
//                            unset($ads[$i]);
//                        }
//                        elseif($type != 'Svi tipovi' && $ad->type != $type)
//                        {
//                            unset($ads[$i]);
//                        }
//                        elseif($country != 'Sve države' && $ad->country != $country)
//                        {
//                            unset($ads[$i]);
//                        }
//                        $i++;
//                    }
//                }
                
                if ($category != 'Sve kategorije' && $type != 'Svi tipovi' && $country != 'Sve države')
                {
                    $ads = $adModel->where('category', $category)->where('type', $type)->where('country', $country)->where('isValid', true)->groupStart()
                                                                 ->like('title', $searched)->groupEnd()->groupStart()
                                                                 ->orLike('text', $searched)->groupEnd()->findAll();
                }
                elseif ($category != 'Sve kategorije' && $type != 'Svi tipovi')
                {
                    $ads = $adModel->where('category', $category)->where('type', $type)->where('isValid', true)->groupStart()
                                                                 ->like('title', $searched)->groupEnd()->groupStart()
                                                                 ->orLike('text', $searched)->groupEnd()->findAll();
                }
                elseif ($type != 'Svi tipovi' && $country != 'Sve države')
                {
                    $ads = $adModel->where('type', $type)->where('country', $country)->where('isValid', true)->groupStart()
                                                                 ->like('title', $searched)->groupEnd()->groupStart()
                                                                 ->orLike('text', $searched)->groupEnd()->findAll();
                }
                elseif ($category != 'Sve kategorije' && $country != 'Sve države')
                {
                    $ads = $adModel->where('category', $category)->where('country', $country)->where('isValid', true)->groupStart()
                                                                 ->like('title', $searched)->groupEnd()->groupStart()
                                                                 ->orLike('text', $searched)->groupEnd()->findAll();
                }
                elseif ($category != 'Sve kategorije')
                {
                    $ads = $adModel->where('category', $category)->where('isValid', true)->groupStart()
                                                                 ->like('title', $searched)->groupEnd()->groupStart()
                                                                 ->orLike('text', $searched)->groupEnd()->findAll();
                }
                elseif ($type != 'Svi tipovi')
                {
                    $ads = $adModel->where('type', $type)->where('isValid', true)->groupStart()
                                                                 ->like('title', $searched)->groupEnd()->groupStart()
                                                                 ->orLike('text', $searched)->groupEnd()->findAll();
                }
                elseif ($country != 'Sve države')
                {
                    $ads = $adModel->where('country', $country)->where('isValid', true)->groupStart()
                                                                 ->like('title', $searched)->groupEnd()->groupStart()
                                                                 ->orLike('text', $searched)->groupEnd()->findAll();
                }
                else
                {
                    $ads = $adModel->search($searched); 
                }
                
                $this->show('search', ['ads'=>$ads, 'searched' => $searched]);
        }
        
        
        
        /**
         * Funkcija za prikazivanje poruke o uspehu
         * 
         * @return void
         */   
        public function successMsg($msg)
        {
                $this->show('success-message', ['msg' => $msg]);
        }
        
        
        
        /**
         * Otvara prijemnno sanduče korisnika.
         * 
         * @return void
         */     
        public function inbox()
        {       
                //lista korisnika sa kojima se dopisivao
                if($this->session->get('user') == null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                
                $chatModel = new ChatModel();
                $friends = $chatModel->getFriends($this->session->get('user')->idK);
                
                $this->show('inbox', ['friends' => $friends]);
        }
        
        
        
        
        
        
        /**
         * Prikazivanje prepiske sa korisnikom čiji je id prosleđen kao parametar.
         * 
         * @param int $userId
         * 
         * @return void
         */     
        public function chat($userId)
        {
                if($this->session->get('user')==null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                
                $chatModel = new ChatModel();
                $chat = $chatModel->getChat($this->session->get('user')->idK, $userId);
                $userModel = new UserModel();
                $user = $userModel->find($userId);
                $nameSession = $userModel->find($this->session->get('user')->idK)->name;
                $surnameSession = $userModel->find($this->session->get('user')->idK)->surname;
                $this->show('chat', ['chat' => $chat, 'userId' => $userId, 'name' => $user->name, 'surname' => $user->surname, 
                                    'nameSession' => $nameSession, 'surnameSession' => $surnameSession]);
        }
        
        
        
        
        
        
        /**
         * Funkcija za odjavljivanje sa sistema.
         * 
         * @return void
         */ 
        public function logout()
        {
                if($this->session->get('user')==null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                
                $this->session->destroy();
                return redirect()->to(site_url(''));
        }
        
        
        
        /**
         * Prikaz profila korisnika čiji je id prosleđen kao parametar
         * 
         * @param int $userVisitId
         * 
         * @return void
         */     
        public function userProfile($userVisitId)
        {       
                $userModel = new UserModel();
                $profile = $userModel->find($userVisitId);
                
                if ($profile == null)
                {
                    if ($this->session->get('user') == null)
                    {
                        return redirect()->to(site_url("Guest")); 
                    }
                    elseif ($this->session->get('user')->idK == 1)
                    {
                        return redirect()->to(site_url("Admin")); 
                    }
                    else
                    {
                        return redirect()->to(site_url("User")); 
                    }
                }
                
                
                $ratingModel = new RatingModel();
                $rates = $ratingModel->where('user_rated', $userVisitId)->findAll();
                $sum = 0;
                $cnt = 0;                
                foreach ($rates as $rate)
                {
                    $sum = $sum + $rate->rate;
                    $cnt = $cnt + 1;
                }
                $rating = $cnt == 0 ? 0 : $sum / $cnt;
                
                
                $page = 'profile-user';
                
                if($this->session->get('user')==null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                
                
                if ($this->session->get('user')->idK == $userVisitId)
                {
                    $page = 'profile-session-user';
                }
                
                $this->show($page, ['userVisitId' => $userVisitId, 'name' => $profile->name, 'surname' => $profile->surname ,'username' => $profile->username, 'country' => $profile->country, 
                                'num' => $profile->num, 'rating' => $rating, 'date' => $profile->date]);
        }
        
        
        /**
         * Funkcija koja salje na formu za potvrdu brisanja naloga korisnika čiji je id prosleđen kao parametar
         * 
         * @param int $userId
         * 
         * @return void
         */     
        public function accountDeleteForm($userId)
        {       
                if($this->session->get('user') == null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                
                $title = 'Brisanje naloga';
                $msg = 'Da li ste sigurni da želite da obrišete nalog? Ukoliko nastavite, sve objave i aktivnosti vezane za ovaj nalog će biti obrisane i nećete biti u mogućnosti da ih povratite.';
                $pageSubmit = "accountDelete/$userId";
                $pageReturn = "userProfile/$userId";
                
                $this->show('confirmation-message', ['title' => $title, 'msg' => $msg, 'pageSubmit' => $pageSubmit, 'pageReturn' => $pageReturn]);
        }
        
        
        
        /**
         * Funkcija za brisanje korisnika iz baze.
         * 
         * @return void
         */     
        public function accountDelete($userId = null)
        {       
                if($this->session->get('user')==null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                
                $id = $userId == null ? $this->session->get('user')->idK : $userId; //User mode : Admin mode            
                
                $adModel = new AdModel();
                $adModel->where('idK', $id)->delete();
                
                $chatModel = new ChatModel();               
                $chatModel->where('user_from', $id)->delete();
                $chatModel->where('user_to', $id)->delete();
                
                $ratingModel = new RatingModel();               
                $ratingModel->where('user_rater', $id)->delete();
                $ratingModel->where('user_rated', $id)->delete();
                
                $userModel = new UserModel();               
                $userModel->where('idK', $id)->delete();
                               
                if ($this->session->get('user')->idK == 1)  //Admin
                {
                    $this->successMsg("Uspešno ste obrisali nalog!");
                }
                else    //User
                {
                    $this->session->destroy();
                    return redirect()->to(site_url("/"));
                }
                
        }
        
        
        
        
        /**
         * Prikaz forme za promenu lozinke
         * 
         * @return void
         */   
        public function changePassword() 
        {
                $this->show('password-change', []);
        }
        
        
        /**
         * Potvrđivanje zahteva za promenu lozinke.
         * 
         * @return void
         */     
        public function passwordChangeSubmit()
        {                       
                if($this->session->get('user')==null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                
                $oldPass = md5($this->request->getVar('old-pass'));
                $newPass = md5($this->request->getVar('new-pass'));
                $newPassConf = md5($this->request->getVar('new-pass-conf'));
                $oldPassDatabase = $this->session->get('user')->password;
                
                if($newPass != $newPassConf)
                {
                    return $this->show('password-change', ['poruka'=>"Polja za novu lozinku nisu identična"]);
                }
                
                if($oldPass != $oldPassDatabase)
                {
                    return $this->show('password-change', ['poruka'=>"Stara lozinka je pogrešna"]);
                }
                
                if($oldPass == $newPass)
                {
                    return $this->show('password-change', ['poruka'=>"Nova lozinka ne može biti ista kao prethodna!"]);
                }
                
                $userModel = new UserModel();                
                $userId = $userModel->find($this->session->get('user')->idK)->idK;
                
                $userModel->set('password', $newPass)->where('idK', $userId)->update();
                $this->session->get('user')->password = $newPass;
                
                $this->successMsg('Uspešno ste promenili lozinku!');
        }
        
        
        
        
        
        /**
         * Prikazuje formu za slanje poruke korisniku koji je prosleđen kao parametar.
         * 
         * @param int $userId
         * 
         * @return void
         */     
        public function sendMessage($userId)
        {       
                $userModel = new UserModel();
                $name = $userModel->find($userId)->name;
                $surname = $userModel->find($userId)->surname;
                $this->show('send-message', ['userId' => $userId, 'name' => $name, 'surname' => $surname]);
        }
        
        
        
        
        
        /**
         * Potvrđivanje slanja poruke korisniku čiji je id prosleđen kao parametar.
         * 
         * @param int $userId
         * 
         * @return void
         */     
        public function sendMessageSubmit($userId, $support = false)
        {       
                if($this->session->get('user')==null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                
                $msg = $this->request->getVar('message-body');
                
                $userModel = new UserModel();
                $name = $userModel->find($userId)->name;
                $surname = $userModel->find($userId)->surname;
                
                if (empty($msg))
                {
                    $this->show('send-message', ['userId' => $userId, 'name' => $name, 'surname' => $surname]);
                }
                
                $chatModel = new ChatModel();
                
                $chatModel->save([
                    'user_to'=>$userId,
                    'user_from'=>$this->session->get('user')->idK,
                    'message'=>$msg,
                    'datetime'=>date('Y-m-d'),
                ]);
                
                
                if ($support == true)
                {
                    $this->successMsg('Hvala Vam na podršci!');
                }
                else
                {
                    $this->show('send-message', ['userId' => $userId, 'name' => $name, 'surname' => $surname]);
                }
        }
        
        
        
        
        
        
        
        
        /**
         * Funkcija koja salje na formu za potvrdu brisanja oglasa
         * 
         * @return void
         */     
        public function deleteAdForm($adId)
        {       
                if($this->session->get('user') == null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                
                $title = 'Brisanje oglasa';
                $msg = 'Da li ste sigurni da želite da obrišete oglas?';
                $pageSubmit = "deleteAd/$adId";
                $pageReturn = "getAd/$adId";
                
                $this->show('confirmation-message', ['title' => $title, 'msg' => $msg, 'pageSubmit' => $pageSubmit, 'pageReturn' => $pageReturn]);
        }
        
        
        
        
        
        /**
         * Brisanje oglasa iz baze čiji je id prosleđen kao parametar.
         * 
         * @param int $adId
         * 
         * @return void
         */ 
        public function deleteAd($adId)
        {
                $adModel = new AdModel();
                $adModel->where('idO', $adId)->delete();
                
                $this->successMsg("Uspešno ste obrisali oglas!");
        }
}
