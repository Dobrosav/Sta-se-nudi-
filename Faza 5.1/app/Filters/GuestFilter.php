<?php
    namespace App\Filters;

    use CodeIgniter\HTTP\RequestInterface;
    use CodeIgniter\HTTP\ResponseInterface;
    use CodeIgniter\Filters\FilterInterface;

    /**
    * Pri pristupu starnici sa terminom Guest proverava se da li joj se moze pristupiti
    * 
    * @return void
    */ 
    class GuestFilter implements FilterInterface
    {
        public function before(RequestInterface $request, $arguments = null)
        {
            $session = session();
            if($session->has('user')&& $session->get('user')->idK != 1)
            {
                return redirect()->to(site_url("User"));
            }
            elseif($session->has('user')&& $session->get('user')->idK == 1)
            {
                return redirect()->to(site_url("Admin"));
            }
        }

        public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
        {
            // Do something here
        }
    }