<?php 
namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Noauth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('isLoggedIn') && session()->get('status')==0) {
            return redirect()->to(base_url('RecruiterDashboard'));
        }
        
         if (session()->get('isLoggedIn') && session()->get('status')==1) {
            return redirect()->to(base_url('SearchRecruiter'));
        }
        
        
        if (session()->get('isLoggedIn') && session()->get('status')==2) {
            return redirect()->to(base_url('Home'));
        }
        
         

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}