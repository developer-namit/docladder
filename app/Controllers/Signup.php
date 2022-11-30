<?php
namespace App\Controllers;
use App\Models\CitiesModel;
use App\Models\StateModel;
use App\Models\SignupModel;
use App\Models\FileModel;
use CodeIgniter\HTTP\RequestInterface;
use Google\Client as client;
use Google_Service_Oauth2;
use App\Libraries\vendor\facebook\Facebook;
use App\Http\Requests;
use App\Libraries\vendor\facebook\Facebook\FacebookRequest;
use App\Libraries\vendor\facebook\Facebook\GraphObject;
use App\Libraries\vendor\facebook\Facebook\FacebookRequestException;
class Signup extends BaseController
{
    public function index()
    {
        $data=[];
        helper(['url', 'form']);
        $request = service('request'); 
        if(!empty($_SERVER['HTTP_REFERER'])){
        $url=  $_SERVER['HTTP_REFERER'];
        session()->set('url', $url);
        }
        $db      = \Config\Database::connect();
        // state
        $model= New StateModel();
        $data['state']= $model->get()->getResultArray(); 
        $request = service('request');  
        require_once APPPATH . 'Libraries/vendor/autoload.php';
        // google api
        $client = new \Google_Client();
        $client->setClientId("69894221133-s6icill3cviuk7a513tfn5fmubj68l55.apps.googleusercontent.com");
        $client->setClientSecret("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");
        $client->setRedirectUri('https://tryyourwork.com/docladder/Jobseeker');
        $client->addScope('email');
        $client->addScope('profile');
        $tokenid=$this->request->getVar('code');
        $session = session();
        if(isset($tokenid)){
            $token= $client->fetchAccessTokenWithAuthCode($tokenid);       
         if(!isset($token['error'])) {
                $client->setAccessToken($token['access_token']);               
                $session->set('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($client);
                $gdata = $google_service->userinfo->get();
                $currentTime = date('Y-m-d H:i:s');
                $model= new SignupModel();
                $userdata=[];
                 if($model->isAlreadyJobRegister($gdata['id'])){
                $userdata=[
                    'oauth_id'=>$gdata['id'],
                    'first_name'=> $gdata['name'],
                    // 'gender'=> $gdata['gender'],
                    // 'dob'=> $gdata['dob'],
                    'email_id'=> $gdata['email'],
                    'role'=>'other',
                    //'JobProfile_image'=>$gdata['picture'],
                    'updated_at'=>$currentTime
                ];
             $model->updateJobSeeking($userdata, $gdata['id']);
             $user = $model->where('email_id', $userdata['email_id'])->first();
             $this->setRecSession($user);
             return redirect()->to('Home');          
             }else{
                  $currentTime = date('Y-m-d H:i:s');
                 $userdata=[
                    'oauth_id'=>$gdata['id'],
                    'first_name'=> $gdata['name'],
                    // 'gender'=> $gdata['gender'],
                    // 'dob'=> $gdata['dob'],
                    'role'=>'other',
                    'email_id'=> $gdata['email'],
                    //'JobProfile_image'=>$gdata['picture'],
                    'created_at'=>$currentTime
                ];
                $model->insertJobSeeking($userdata);
                 $user = $model->where('email_id', $userdata['email_id'])->first();
                 $this->setRecSession($user); 
                    $url=  $_SERVER['HTTP_REFERER'];
                    session()->set('url', $url);
                 return redirect()->to('Home');   
            }
            }
        }       
                $loginin= $session->get('isLoggedIn');
                
                 if(!$session->get('access_token')){   
                 $data['googleApi']=$client->createAuthurl();
                }                   
            $loginin= $session->get('isLoggedIn');
            if($loginin==false){
            require_once APPPATH . 'Libraries/vendor/autoload.php';
                 // facebook api
            $facebook = new \Facebook\Facebook([
                'app_id' => '1254534061959098',
                'app_secret' => '6baa50af8df7602b47cce5de81cc2bee',
                'default_graph_version' => 'v2.10',
             ]);
                $fb_helper = $facebook->getRedirectLoginHelper();
                if (isset($_GET['state'])) {
                $fb_helper->getPersistentDataHandler()->set('state', $_GET['state']);
            }   
                if($this->request->getVar('code')){
                if(session()->get('access_token')){
                $access_token = session()->get('access_token');
                }
                else{
                $access_token= $fb_helper->getAccessToken();
                session()->set('access_token',$access_token);
                $facebook->setDefaultAccessToken(session()->get('access_token'));
            }
        $graph_response = $facebook->get('/me?fields=id,name,email',$access_token);
        $fb_user_info = $graph_response->getGraphUser();
                if(!empty($fb_user_info['id'])){
         $model= new SignupModel();
          $currentTime = date('Y-m-d H:i:s');
                 if($model->isAlreadyJobRegister($fb_user_info['id'])){
                        $userdata=[
                            'oauth_id'=>$fb_user_info['id'],
                            'first_name'=> $fb_user_info['name'],
                            // 'gender'=> $fb_user_info['gender'],
                            // 'dob'=> $fb_user_info['dob'],
                            'email_id'=> $fb_user_info['email'],
                            'role'=>'other',
                            //'profile_image'=>'http://graph.facebook.com/'.$fb_user_info['id'].'picture',
                            'updated_at'=>$currentTime       
                        ];
                     $model->updateJobSeeking($userdata, $fb_user_info['id']);
                     $user = $model->where('email_id', $userdata['email_id'])->first();
                     $this->setRecSession($user);
                     return redirect()->to('Home');  
                     }else{
                          $currentTime = date('Y-m-d H:i:s');
                         $userdata=[
                            'oauth_id'=>$fb_user_info['id'],
                            'first_name'=> $fb_user_info['name'],
                            // 'gender'=> $fb_user_info['gender'],
                            // 'dob'=> $fb_user_info['dob'],
                            'email_id'=> $fb_user_info['email'],
                            'role'=>'other',
                            //'profile_image'=>'http://graph.facebook.com/'.$fb_user_info['id'].'picture',
                           'created_at'=>$currentTime        
                        ];
                        $model->insertJobSeeking($userdata);
                         $user = $model->where('email_id', $userdata['email_id'])->first();
                         $this->setRecSession($user);
                         return redirect()->to('Home');
                    }
                }
    }
    else{
        $fb_permissions = ['email'];
        $data ['fbApi'] = $fb_helper->getLoginUrl('https://tryyourwork.com/docladder/Register',$fb_permissions);
    }   
} 

     return view('SignUp', $data);
    }
    // submit register  page
     public function register(){
        helper(['url', 'form']);
          $db      = \Config\Database::connect();
        $data=[];
       $request= service('request');
        $model= New StateModel();
        $data['state']= $model->get()->getResultArray(); 
       
       $session= session();
        if(!empty($this->request->getVar('state'))){
            $state= $this->request->getVar('state');
        }else{
            $state=0;
        }      
        if(!empty( $this->request->getvar('city'))){
            $city=  $this->request->getvar('city');
        }else{
            $city=0;
        }
        if(!empty($this->request->getvar('file'))){
            $files=$this->request->getvar('file');
        }else{
            $files= 0;
        }
     
         $inputs = $this->validate([
            'firstname' => ['label' => 'Name', 'rules' => 'required|min_length[5]'],
            'emailid' => ['label' => 'Email', 'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[signup.email_id]'],
            'passwordto' => ['label' => 'Password', 'rules' => 'required|min_length[5]'],
            'confirm_password' => ['label' => 'Confirm Password', 'rules' => 'required|matches[passwordto]'],
            'contactno' => ['label' => 'Mobile number', 'rules' => 'required|numeric|regex_match[/^[0-9]{10}$/]'],
            'dob' => ['label' => 'dob', 'rules' => 'required'],
        ]);

        $data['validation']= $this->validator;
        if (!$inputs) {
            return view('SignUp', $data);
        }else{
     
       if($this->request->getMethod()== 'post'){
         $currentTime= date("y-m-d H:i:s");
         $data=[
             'first_name'=> $this->request->getVar('firstname'),
             'email_id'=>$this->request->getVar('emailid'),
             'state'=>$state,
             'city'=>$city,
             'dob'=>$this->request->getvar('dob'),
             'gender'=>$this->request->getvar('gender'),
             'contact_no'=>$this->request->getvar('contactno'),
             'password'=>md5($this->request->getvar('passwordto')),
             'upload_resume'=>$files,
             'role'=>'other',
             'created_at'=>$currentTime
         ];
             $message='Thanks your account created successfuly.Please click the beow link to activate account <br>'.'<a href="">Activate account Now</a><br><br>Thanks<br>Tearm:';
                $email = \Config\Services::email();                         
                $email->setFrom('docladder@vertosys.com');
                $email->setTo($data['email_id'], $data['first_name']);
                $email->setSubject('Docladder');
                $email->setMessage($message);             
                $email->send();
                if ($email->send()) 
                {
                echo 'Email successfully sent';
                } 
                else 
                {
                $emaidata = $email->printDebugger(['headers']);
                 //print_r($emaildata);
                 }       
        
         $model= new SignupModel();
        $userdata= $model->insert($data);
         $inserted_id= $model->insertID();
        $user = $model->where('id',$inserted_id )->first();
         $this->setRecSession($user);
         return redirect()->to(session()->get('url'));
       }
     }
     
     }
     //create session 
     private function setRecSession($user){
        $data = [
        'id' => $user['id'],
        'email_id'=>$user['email_id'],
        'firstname'=>$user['first_name'],
        'role'=>$user['role'],
        'status'=>2,
        'isLoggedIn' => true,
        ];
        session()->set($data);
        return false;
        }       
        //logout
        public function logout(){
        if(session()->has('data')){
        session()->remove('data');
         session()->destroy();
        return redirect()->to('Home');
        }
        }
   
// login page 
    public function login(){
        helper(['url', 'form']);
        $data = [];
          $db      = \Config\Database::connect();
        $request = service('request');
        if ($this->request->getMethod() == 'post') {
        $rules = [
        'email' => ['label' => 'Email', 'rules' => 'required|min_length[5]','required|min_length[6]|max_length[50]|valid_email|validatesign[email,password]'],
        'password' => 'required|min_length[3]|max_length[255]|validatesign[email,password]',
        ];   
        $errors = [
        'password' => [
        'validatesign' => 'Password record not found'
        ]
        ];

        if (!$this->validate($rules,$errors)) {
       // $datalogin['validation'] = $this->validator;
            return view('SignUp', ["validation" => $this->validator,
                 ]);
        }else{
        $model = new SignupModel();
        $user = $model->where('email_id', $this->request->getVar('email'))->first();
         $this->setRecSession($user);
        
         return redirect()->to(session()->get('url'));
       
        }
        }
    }


 
}