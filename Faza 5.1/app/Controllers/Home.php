<?php

namespace App\Controllers;

/**
 * Home - klasa za preusmeravanje na početnu stranicu Home.
 * 
 * @version 1.0
 */

class Home extends BaseController
{
        /**
         * Prikazivanje početnog sadržaja stranice. Daje kontrolu gostu.
         * 
         * @return void
         */
    
	public function index()
	{
                $data['controller']='Guest';
		echo view('common/header-guest');
                echo view('common/menu', $data);
                echo view('common/home', $data);
                echo view('common/footer-guest');
               // site_url("Guest/index");
	}
}
