<?php
namespace App\Controllers;
use App\Models\FileModel;
use App\Models\RecruiterModel;
use App\Models\ManageSubModel;
use App\Models\CitiesModel;
use App\Models\StateModel;
use CodeIgniter\HTTP\RequestInterface;
use Google\Client as client;
use Google_Service_Oauth2;
use App\Libraries\vendor\facebook\Facebook;
use App\Http\Requests;
use App\Libraries\vendor\facebook\Facebook\FacebookRequest;
use App\Libraries\vendor\facebook\Facebook\GraphObject;
use App\Libraries\vendor\facebook\Facebook\FacebookRequestException;
class RecruiterPost extends BaseController
{
   public function Recruiter()
    {
        $data=[];
        helper(['url', 'form']);
        $session = session();
        $model= New StateModel();
        $data['state']= $model->get()->getResultArray();        
        $request = service('request');  
    require_once APPPATH . 'Libraries/vendor/autoload.php';
        $client = new \Google_Client();
        $client->setClientId("816589748703-9uac02forpsuekft5k233n6hbd6m9hdu.apps.googleusercontent.com");
        $client->setClientSecret("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");
        $client->setRedirectUri('https://tryyourwork.com/docladder/Recruiter');
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
                $model= new RecruiterModel();
                $userdata=[];
                 if($model->isAlreadyRegister($gdata['id'])){
                $userdata=[
                    'oauth_id'=>$gdata['id'],
                    'client_first_name'=> $gdata['name'],
                    // 'gender'=> $gdata['gender'],
                    // 'dob'=> $gdata['dob'],
                    'email_address'=> $gdata['email'],
                    //'profile_image'=>$gdata['picture'],
                    'updated_at'=>$currentTime
                ];
             $model->updateuserdata($userdata, $gdata['id']);
             $user = $model->where('email_address', $userdata['email_address'])->first();
             $this->setRecSession($user);
             return redirect()->to('RecruiterDashboard');          
             }else{
                  $currentTime = date('Y-m-d H:i:s');
                 $userdata=[
                    'oauth_id'=>$gdata['id'],
                    'client_first_name'=> $gdata['name'],
                    // 'gender'=> $gdata['gender'],
                    // 'dob'=> $gdata['dob'],
                    'email_address'=> $gdata['email'],
                    //'profile_image'=>$gdata['picture'],
                       'role'=>'users',
                    'created_at'=>$currentTime
                ];
                $model->insertuserdata($userdata);
                 $user = $model->where('email_address', $userdata['email_address'])->first();
                 $this->setRecSession($user);        
               return redirect()->to('profile');
            }
            }
        }       
                $loginin= $session->get('isLoggedIn');
                
                 if(!$session->get('access_token')){   
                 $data['googleApi']=$client->createAuthurl();
                }                   
      
                 // facebook api                
                 $loginin= $session->get('isLoggedIn');
             if($loginin==false){
              require_once APPPATH . 'Libraries/vendor/autoload.php';
            $facebook = new \Facebook\Facebook([
                'app_id' => '4874390339353113',
                'app_secret' => 'e62eb9d01ccc7f229743a449fc5c1d21',
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
         $model= new RecruiterModel();
          $currentTime = date('Y-m-d H:i:s');
                 if($model->isAlreadyRegister($fb_user_info['id'])){
                        $userdata=[
                            'oauth_id'=>$fb_user_info['id'],
                            'client_first_name'=> $fb_user_info['name'],
                            // 'gender'=> $fb_user_info['gender'],
                            // 'dob'=> $fb_user_info['dob'],
                            'email_address'=> $fb_user_info['email'],
                            //'profile_image'=>'http://graph.facebook.com/'.$fb_user_info['id'].'picture',
                            'updated_at'=>$currentTime       
                        ];
                     $model->updateuserdata($userdata, $fb_user_info['id']);
                     $user = $model->where('email_address', $userdata['email_address'])->first();
                     $this->setRecSession($user);
                      return redirect()->to('RecruiterDashboard');
                     }else{
                          $currentTime = date('Y-m-d H:i:s');
                         $userdata=[
                            'oauth_id'=>$fb_user_info['id'],
                            'client_first_name'=> $fb_user_info['name'],
                            // 'gender'=> $fb_user_info['gender'],
                            // 'dob'=> $fb_user_info['dob'],
                            'email_address'=> $fb_user_info['email'],
                            //'profile_image'=>'http://graph.facebook.com/'.$fb_user_info['id'].'picture',
                             'role'=>'users',
                           'created_at'=>$currentTime        
                        ];
                        $model->insertuserdata($userdata);
                         $user = $model->where('email_address', $userdata['email_address'])->first();
                         $this->setRecSession($user);
                         return redirect()->to('profile');
                    }
                }
    }
    else{
        $fb_permissions = ['email'];
        $data ['fbApi'] = $fb_helper->getLoginUrl('https://tryyourwork.com/docladder/Recruiter',$fb_permissions);
    }   
             }        
        return view('recruiter-signup', $data);
    }
//Register recruiter page 
    public function recruiterpost(){
        helper(['url', 'form']);
         $this->Recruiter();
          $view = \Config\Services::renderer();
        $data=[];
       $request= service('request');
       $session= session();
       $model= New StateModel();
       $data['state']= $model->get()->getResultArray();
        if(!empty($this->request->getVar('states'))){
            $state= $this->request->getVar('states');
        }else{
            $state=0;
        }      
        if(!empty( $this->request->getvar('city'))){
            $city=  $this->request->getvar('city');
        }else{
            $city=0;
        }
      
       $inputs =[
            'pincode' => ['label' => 'Pincode', 'rules' => 'required|min_length[6]'],
            'emailid' => ['label' => 'Email', 'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[recruiter_register.email_address]'],
            'passwordto' => ['label' => 'Password', 'rules' => 'required|min_length[5]'],
            'confirm_password' => ['label' => 'Confirm Password', 'rules' => 'required|matches[passwordto]'],
            'contact' => ['label' => 'Mobile number', 'rules' => 'required|numeric|regex_match[/^[0-9]{10}$/]'],
        ];
          $errors = [
        'emailid' => [
        'is_unique' => '‘Email already exist'
        ]
        ];
        
        if (!$this->validate($inputs,$errors)) {
        $data['validation']= $this->validator;
            return view('recruiter-signup', $data);
        } else{
       if($this->request->getMethod()== 'post'){
         $currentTime= date("y-m-d H:i:s");
         $data=[
             'client_type'=> $this->request->getVar('client_type'),
             'client_first_name'=> $this->request->getVar('client_firstname'),
             'contact_person_name'=>$this->request->getVar('client_lastname'),
             'State'=>$state,
             'City'=>$city,
             'pincode'=>$this->request->getvar('pincode'),
             'website_address'=>$this->request->getvar('website'),
             'contact_no'=>$this->request->getvar('contact'),
             'alternate_no'=>$this->request->getvar('alt_number'),
             'designation'=>$this->request->getvar('designation'),
             'email_address'=>$this->request->getvar('emailid'),
             'password'=>md5($this->request->getvar('passwordto')),
              'role'=>'users',
             'created_at'=>$currentTime
         ];
            //  $message='Thanks your account created successfuly.Please click the beow link to activate account <br>'.'<a href="">Activate account Now</a><br><br>Thanks<br>Tearm:';
                $message= $view->render('email-template.php');   
                $email = \Config\Services::email();                         
                $email->setFrom('docladder@vertosys.com');
                $email->setTo($data['email_address'], $data['client_first_name']);
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
         $model= new RecruiterModel();
         $model->insert($data);
         $inserted_id= $model->insertID();
        $user = $model->where('id',$inserted_id )->first();
         $this->setRecSession($user);
       return redirect()->to(base_url('profile'));
     }
    }    
     }
     //create session 
     private function setRecSession($user){
        $data = [
        'id' => $user['id'],
        'email_id'=>$user['email_address'],
        'firstname'=>$user['client_first_name'],
        'contactpersonname'=>$user['contact_person_name'],
        'contactno'=>$user['contact_no'],
        'role'=>$user['role'],
        'post'=>$user['service_whatsapp'],
        'search'=>$user['service_resume'],
        'status'=>0,
        'account'=>$user['status'],
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
        }else{
            session()->destroy();
           return redirect()->to('Home');  
        }
        }
//Get city data from database
  public function getcities(){
        $data=[];
        $request = \Config\Services::request();
        $db      = \Config\Database::connect();
        $name= $this->request->getVar('state');
        $model= New CitiesModel();
        $model->where('state_id', $name);
        $city= $model->get()->getResultArray();
        $res=[];
        if(!empty($city)){
            $res= $city;
        }else{
            $res= false;
        }
        echo json_encode($res);
    }
//check the email and validation 
    public function check_emailavalibility(){
        $request = service('request');
        $email=  $this->request->getVar('email');   
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           echo "<label class= 'text-danger'><span>Invalid email</span></lable>";
       }else{
           $model= new RecruiterModel(); 
            $user = $model->where('email_address', $email)->first();
            if($user){
               echo "<label class= 'text-danger'><span>Email already register</span></lable>";
               return false;
            }else{
               echo "<label class= 'text-success'><span>Email Available</span></lable>";
               return true;
            }
       }          
    }
//recuirter login page
    public function RecruiterLogin()
    {
        helper(['url', 'form']);
         $this->Recruiter();
        $data = [];
        $request = service('request');
        $rules = [
        'email' => ['label' => 'Email', 'rules' => 'required|min_length[5]','required|min_length[6]|max_length[50]|valid_email|validateUser[email,password]'],
        'password' => 'required|min_length[3]|max_length[255]|validateUser[email,password]',
        ];   
        $errors = [
        'password' => [
        'validateUser' => 'Password record not found'
        ]
        ];

        if (!$this->validate($rules,$errors)) {
            return view('recruiter-signup', ["validation" => $this->validator,
                 ]);
     
        }else{
        $model = new RecruiterModel();
        $user = $model->where('email_address', $this->request->getVar('email'))->first();
         $this->setRecSession($user);
        if($user['role']=='users'){
             return redirect()->to(base_url('RecruiterDashboard'));
        }else if($user['role']=='editor' && $user['status']=='active' && $user['service_resume']==1 && $user['service_whatsapp']==0){
            return redirect()->to(base_url('Search/Simple')); 
        }else if($user['role']=='editor' && $user['status']=='active' && $user['service_whatsapp']==1 && $user['service_resume']==0 ){
            return redirect()->to(base_url('jobposting'));
            
        }else if($user['role']=='editor' && $user['status']=='active' && $user['service_whatsapp']==1 && $user['service_resume']==1){
            return redirect()->to(base_url('header'));

        }else if($user['role']=='editor' && $user['status']=='deactive'){
             session()->setFlashdata('wrong', 'Your account has been deactivated.');
              return redirect()->to('logout');
        }
       
        }
        return view('recruiter-signup');
    }
//check email validation
       public function checkemail(){
        $request = service('request');
        $email=  $this->request->getVar('email'); 
        $model = new RecruiterModel();
        $user = $model->where('email_address', $email)->first();
            if(!$user){
                echo "<label class= 'text-danger'><span>Invalid Email</span></lable>";
            }else{
            }
       }
    }
