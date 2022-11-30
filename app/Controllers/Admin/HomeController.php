<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class HomeController extends BaseController
{

    protected $session;
    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {   
        if($this->request->getMethod() == 'post'){
            helper(['form', 'url']);
            $db = \Config\Database::connect();
            $validation =  \Config\Services::validation();
            $rules = [
                "email" => [
                    "label" => "Email", 
                    "rules" => "required|valid_email"
                ],
                "password" => [
                    "label" => "Password", 
                    "rules" => "required"
                ]
            ];
            
            if ($this->validate($rules)) { 
                $email = $this->request->getVar('email');
                $password = md5($this->request->getVar('password'));
                $admin_data = $db->table('admin')->where(['email' => $email, 'password' => $password,'status' => 1])->get()->getRowArray();
                if(!empty($admin_data)){

                    $newdata = [
                        'name'  => $admin_data['name'],
                        'email'     =>  $admin_data['email'],
                    ];
                    $this->session->set('admin',$newdata); 

                    $response = array('status'=>1,'message'=> 'Successfully login!');
                }else{
                    $response = array('status'=>0,'message'=> 'Invalid email or password details!');
                }
            }else{
                $response = array('status'=>2,'errors'=>$validation->getErrors());
            }
            
            echo json_encode($response); die();
            
        }
        
        return view('admin/auth/login');
    }

    public function dashboard()
    {  
        return view('admin/dashboard');
    }

    public function logout(){
        $this->session->remove('admin');
        return redirect()->to('admin/login'); 
    }
}
