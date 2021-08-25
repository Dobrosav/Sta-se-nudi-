<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    
    /**
    * Pri pristupu starnici sa terminom Admin proverava se da li joj se moze pristupiti
    * 
    * @return void
    */ 
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if(!$session->has('user')){
            return redirect()->to(site_url("Guest"));
        }
        elseif($session->has('user')&& $session->get('user')->idK != 1)
        {
            return redirect()->to(site_url("User"));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}