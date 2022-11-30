<?php

namespace App\Controllers;

use App\Models\CitiesModel;
use App\Models\StateModel;
use App\Models\JobSeekerModel;
use App\Models\UserLocationModel; 
use App\Models\FileModel;
use CodeIgniter\HTTP\RequestInterface;
use Google\Client as client;
use Google_Service_Oauth2;
use App\Libraries\vendor\facebook\Facebook;
use App\Http\Requests;
use App\Libraries\vendor\facebook\Facebook\FacebookRequest;
use App\Libraries\vendor\facebook\Facebook\GraphObject;
use App\Libraries\vendor\facebook\Facebook\FacebookRequestException;

class JobseekerRegister extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['url', 'form']);
        $request = service('request');
        if (!empty($_SERVER['HTTP_REFERER'])) {
            $url =  $_SERVER['HTTP_REFERER'];
            session()->set('url', $url);
        }
        $db      = \Config\Database::connect();
        // city
        $cities = $db->table('cities');
        $data['build_cities'] = $cities->groupBy('name')->get()->getResultArray();

        $getstates = $db->table('states');
        $result = $getstates->get()->getResultArray();
        // get state
        foreach ($result as $key => $value) {
            $state = $db->table('cities');
            $state->where('state_id', $value['id']);
            $state->groupBy('name');
            $getstate = $state->get()->getResultArray();
            foreach ($getstate as $states) {
                $result[$key]['city'][] = $states;
            }
        }
       
        $data['margedata'] = $result;

        $request = service('request');
        require_once APPPATH . 'Libraries/vendor/autoload.php';
        // google api
        $client = new \Google_Client();
        $client->setClientId("69894221133-s6icill3cviuk7a513tfn5fmubj68l55.apps.googleusercontent.com");
        $client->setClientSecret("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");
        $client->setRedirectUri('https://tryyourwork.com/docladder/Jobseeker');
        $client->addScope('email');
        $client->addScope('profile');
        $tokenid = $this->request->getVar('code');
        $session = session();
        if (isset($tokenid)) {
            $token = $client->fetchAccessTokenWithAuthCode($tokenid);
            if (!isset($token['error'])) {
                $client->setAccessToken($token['access_token']);
                $session->set('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($client);
                $gdata = $google_service->userinfo->get();
                $currentTime = date('Y-m-d H:i:s');
                $model = new JobSeekerModel();
                $userdata = [];
                if ($model->isAlreadyJobRegister($gdata['id'])) {
                    $userdata = [
                        'oauth_id' => $gdata['id'],
                        'first_name' => $gdata['name'],
                        // 'gender'=> $gdata['gender'],
                        // 'dob'=> $gdata['dob'],
                        'email_id' => $gdata['email'],
                        'role' => 'editor',
                        //'JobProfile_image'=>$gdata['picture'],
                        'updated_at' => $currentTime
                    ];
                    $model->updateJobSeeking($userdata, $gdata['id']);
                    $user = $model->where('email_id', $userdata['email_id'])->first();
                    $this->setRecSession($user);
                    return redirect()->to(base_url('Home'));
                } else {
                    $currentTime = date('Y-m-d H:i:s');
                    $userdata = [
                        'oauth_id' => $gdata['id'],
                        'first_name' => $gdata['name'],
                        // 'gender'=> $gdata['gender'],
                        // 'dob'=> $gdata['dob'],
                        'role' => 'editor',
                        'email_id' => $gdata['email'],
                        //'JobProfile_image'=>$gdata['picture'],
                        'created_at' => $currentTime
                    ];
                    $model->insertJobSeeking($userdata);
                    $user = $model->where('email_id', $userdata['email_id'])->first();
                    $this->sendemail($userdata);
                    $this->setRecSession($user);

                    return redirect()->to('JobProfile');
                }
            }
        }
        $loginin = $session->get('isLoggedIn');

        if (!$session->get('access_token')) {
            $data['googleApi'] = $client->createAuthurl();
        }
        $loginin = $session->get('isLoggedIn');
        if ($loginin == false) {
            require_once APPPATH . 'Libraries/vendor/autoload.php';
            // facebook api
            $facebook = new \Facebook\Facebook([
                'app_id' => '447746490536883',
                'app_secret' => '5897559cfb98716fca1194f0eff61a3b',
                'default_graph_version' => 'v2.10',
            ]);
            $fb_helper = $facebook->getRedirectLoginHelper();
            if (isset($_GET['state'])) {
                $fb_helper->getPersistentDataHandler()->set('state', $_GET['state']);
            }
            if ($this->request->getVar('code')) {
                if (session()->get('access_token')) {
                    $access_token = session()->get('access_token');
                } else {
                    $access_token = $fb_helper->getAccessToken();
                    session()->set('access_token', $access_token);
                    $facebook->setDefaultAccessToken(session()->get('access_token'));
                }
                $graph_response = $facebook->get('/me?fields=id,name,email', $access_token);
                $fb_user_info = $graph_response->getGraphUser();
                if (!empty($fb_user_info['id'])) {
                    $model = new JobSeekerModel();
                    $currentTime = date('Y-m-d H:i:s');
                    if ($model->isAlreadyJobRegister($fb_user_info['id'])) {
                        $userdata = [
                            'oauth_id' => $fb_user_info['id'],
                            'first_name' => $fb_user_info['name'],
                            // 'gender'=> $fb_user_info['gender'],
                            // 'dob'=> $fb_user_info['dob'],
                            'email_id' => $fb_user_info['email'],
                            'role' => 'editor',
                            //'profile_image'=>'http://graph.facebook.com/'.$fb_user_info['id'].'picture',
                            'updated_at' => $currentTime
                        ];
                        $model->updateJobSeeking($userdata, $fb_user_info['id']);
                        $user = $model->where('email_id', $userdata['email_id'])->first();
                        $this->setRecSession($user);
                        return redirect()->to('Home');
                    } else {
                        $currentTime = date('Y-m-d H:i:s');
                        $userdata = [
                            'oauth_id' => $fb_user_info['id'],
                            'first_name' => $fb_user_info['name'],
                            // 'gender'=> $fb_user_info['gender'],
                            // 'dob'=> $fb_user_info['dob'],
                            'email_id' => $fb_user_info['email'],
                            'role' => 'editor',
                            //'profile_image'=>'http://graph.facebook.com/'.$fb_user_info['id'].'picture',
                            'created_at' => $currentTime
                        ];
                        $model->insertJobSeeking($userdata);
                        $this->sendemail($userdata);
                        $user = $model->where('email_id', $userdata['email_id'])->first();
                        $this->setRecSession($user);
                        return redirect()->to(base_url('JobProfile'));
                    }
                }
            } else {
                $fb_permissions = ['email'];
                $data['fbApi'] = $fb_helper->getLoginUrl('https://tryyourwork.com/docladder/Jobseeker', $fb_permissions);
            }
        }


        return view('job-seeker', $data);
    }
    // submit page
    public function Registerjobseeker()
    {
        $db      = \Config\Database::connect();
                
        helper(['url', 'form']);
        $data = [];
        $db      = \Config\Database::connect();
        $this->index();
        // city
        $cities = $db->table('cities');
        $data['build_cities'] = $cities->get()->getResultArray();

        $getstates = $db->table('states');
        $result = $getstates->get()->getResultArray();
        // get state
        foreach ($result as $key => $value) {
            $state = $db->table('cities');
            $state->where('state_id', $value['id']);
            $state->groupBy('name');
            $getstate = $state->get()->getResultArray();
            foreach ($getstate as $states) {
                $result[$key]['city'][] = $states;
            }
        }
        $data['margedata'] = $result;
        $request = service('request');
        $view = \Config\Services::renderer();
        $model = new StateModel();
        $data['state'] = $model->get()->getResultArray();

        $session = session();
        if (!empty($this->request->getvar('location'))) {
            $city = implode(",", $this->request->getvar('location'));
        } else {
            $city = 0;
        }

        if (!empty($this->request->getvar('state'))) {
            $state = implode(",", $this->request->getvar('state'));
        } else {
            $state = 0;
        }

        $res = [];
        if (!empty($this->request->getFile('file'))) {
            $file = $this->request->getFile('file');
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getName();
                $name = str_replace(' ', '', $newName);
                $file->move('./public/uploads/uploadResume', $name);
                $res = [
                    'name' =>  $file->getName(),
                    'type'  => $file->getClientMimeType()
                ];
            } else {
                $res = [
                    'name' =>  '',
                ];
            }
        }

        $inputs = [
            'firstname' => ['label' => 'Name', 'rules' => 'required|min_length[5]'],
            'emailid' => ['label' => 'Email', 'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[jobseeker_register.email_id]'],
            'passwordto' => ['label' => 'Password', 'rules' => 'required|min_length[5]'],
            'confirm_password' => ['label' => 'Confirm Password', 'rules' => 'required|matches[passwordto]'],
            'contactno' => ['label' => 'Mobile number', 'rules' => 'required|numeric|regex_match[/^[0-9]{10}$/]'],
            'dob' => ['label' => 'dob', 'rules' => 'required'],
            'location' => ['label' => 'Preferred Location', 'rules' => 'required'],
        ];
        $errors = [
            'emailid' => [
                'is_unique' => '‘Email already exist'
            ]
        ];

        if (!$this->validate($inputs, $errors)) {
            $data['validation'] = $this->validator;
            return view('job-seeker', $data);
        } else {

            if ($this->request->getMethod() == 'post') {
                $currentTime = date("y-m-d H:i:s");
                $data = [
                    'first_name' => $this->request->getVar('firstname'),
                    'email_id' => $this->request->getVar('emailid'),
                    'state' => $state,
                    'city' => $city,
                    'dob' => $this->request->getvar('dob'),
                    'gender' => $this->request->getvar('gender'),
                    'contact_no' => $this->request->getvar('contactno'),
                    'password' => md5($this->request->getvar('passwordto')),
                    'upload_resume' => $res['name'],
                    'role' => 'editor',
                    'created_at' => $currentTime
                ];

                $this->sendemail($data);
                $model = new JobSeekerModel();
                $userdata = $model->insert($data);
                $inserted_id = $model->insertID();
                
                //insert Current location data
                $insert_location = [];
                $selected_states = [];
                
                $mainGroupSates = ["NI","EI","WI","SI"];
                if(isset($_POST['state']) && !empty($_POST['state'])){
                    foreach($_POST['state'] as $keys => $stateData){
                        if(!empty($stateData)){
                            if(in_array($stateData, $mainGroupSates)){
                                $insert_location[] = array(
                                    "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                                    "main_id" => 0,
                                    "name" => $stateData,
                                    "other" => "",
                                    "location_type" => "",
                                    "requst_type" => "current",
                                    "page_type" => "register",
                                    "created_date" => date('Y-m-d H:i:s'),
                                );
                            }else{
                                $explode_data = explode("_",$stateData);
                               
                                if(isset($explode_data[0]) && isset($explode_data[1])){
                                     
                                  if($explode_data[0] == "city"){
                                      
                                      $city_data = $db->query("SELECT * from cities Where id = '" . $explode_data[1]. "' ")->getRowArray();
           
                                      $insert_location[] = array(
                                        "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                                        "main_id" => $explode_data[1],
                                        "name" => $city_data['name'],
                                        "other" => "",
                                        "location_type" => "city",
                                        "requst_type" => "current",
                                        "page_type" => "register",
                                        "created_date" => date('Y-m-d H:i:s'),
                                     );
                                       
                                  }else if($explode_data[0] == "state"){
                                      
                                    $selected_states[] = $explode_data[1];
                                  
                                    $state_data = $db->query("SELECT * from states Where id = '" . $explode_data[1]. "' ")->getRowArray();
                                    $other = "";
                                    if(isset($_POST['other']['states'][$explode_data[1]]) && !empty($_POST['other']['states'][$explode_data[1]])){
                                        $other = $_POST['other']['states'][$explode_data[1]];
                                    }
                                    
                                    $insert_location[] = array(
                                        "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                                        "main_id" => $explode_data[1],
                                        "name" => $state_data['name'],
                                        "other" => $other,
                                        "location_type" => "state",
                                        "requst_type" => "current",
                                        "page_type" => "register",
                                        "created_date" => date('Y-m-d H:i:s'),
                                    );
                                  }
                                  
                                } 
                            }
                        }
                    }
                }
                
                if(isset($_POST['other']['states']) && !empty($_POST['other']['states'])){
                    foreach($_POST['other']['states'] as $stateId => $otherSates){
                        
                        // check not empty condition
                        if(!empty($otherSates)){
                        
                            // Check If state is not selected but select in other state
                            if(!in_array($stateId,$selected_states) || empty($selected_states)){
                                
                                $state_data = $db->query("SELECT * from states Where id = '" . $stateId. "' ")->getRowArray();
                                 
                                $insert_location[] = array(
                                    "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                                    "main_id" => $stateId,
                                    "name" => $state_data['name'],
                                    "other" => $otherSates,
                                    "location_type" => "other",
                                    "requst_type" => "current",
                                    "page_type" => "register",
                                    "created_date" => date('Y-m-d H:i:s'),
                                );
                            }
                        }
                    }
                }
        
                $UserLocationTable = new UserLocationModel();
                $locationInsert = $UserLocationTable->insertBatch($insert_location);
                
                
                //insert preffered location data
                $insert_location = [];
                $selected_states = [];
                
                $mainGroupSates = ["NI","EI","WI","SI"];
                if(isset($_POST['location']) && !empty($_POST['location'])){
                    foreach($_POST['location'] as $keys => $stateData){
                        if(!empty($stateData)){
                            if(in_array($stateData, $mainGroupSates)){
                                $insert_location[] = array(
                                    "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                                    "main_id" => 0,
                                    "name" => $stateData,
                                    "other" => "",
                                    "location_type" => "",
                                    "requst_type" => "preffered",
                                    "page_type" => "register",
                                    "created_date" => date('Y-m-d H:i:s'),
                                );
                            }else{
                                $explode_data = explode("_",$stateData);
                               
                                if(isset($explode_data[0]) && isset($explode_data[1])){
                                     
                                  if($explode_data[0] == "city"){
                                      
                                      $city_data = $db->query("SELECT * from cities Where id = '" . $explode_data[1]. "' ")->getRowArray();
           
                                      $insert_location[] = array(
                                        "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                                        "main_id" => $explode_data[1],
                                        "name" => $city_data['name'],
                                        "other" => "",
                                        "location_type" => "city",
                                        "requst_type" => "preffered",
                                        "page_type" => "register",
                                        "created_date" => date('Y-m-d H:i:s'),
                                     );
                                       
                                  }else if($explode_data[0] == "state"){
                                      
                                    $selected_states[] = $explode_data[1];
                                  
                                    $state_data = $db->query("SELECT * from states Where id = '" . $explode_data[1]. "' ")->getRowArray();
                                    $other = "";
                                    if(isset($_POST['other']['location'][$explode_data[1]]) && !empty($_POST['other']['location'][$explode_data[1]])){
                                        $other = $_POST['other']['location'][$explode_data[1]];
                                    }
                                    
                                    $insert_location[] = array(
                                        "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                                        "main_id" => $explode_data[1],
                                        "name" => $state_data['name'],
                                        "other" => $other,
                                        "location_type" => "state",
                                        "requst_type" => "preffered",
                                        "page_type" => "register",
                                        "created_date" => date('Y-m-d H:i:s'),
                                    );
                                  }
                                  
                                } 
                            }
                        }
                    }
                }
                
                if(isset($_POST['other']['location']) && !empty($_POST['other']['location'])){
                    foreach($_POST['other']['location'] as $stateId => $otherSates){
                        
                        // check not empty condition
                        if(!empty($otherSates)){
                        
                            // Check If state is not selected but select in other state
                            if(!in_array($stateId,$selected_states) || empty($selected_states)){
                                
                                $state_data = $db->query("SELECT * from states Where id = '" . $stateId. "' ")->getRowArray();
                                 
                                $insert_location[] = array(
                                    "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                                    "main_id" => $stateId,
                                    "name" => $state_data['name'],
                                    "other" => $otherSates,
                                    "location_type" => "other",
                                    "requst_type" => "preffered",
                                    "page_type" => "register",
                                    "created_date" => date('Y-m-d H:i:s'),
                                );
                            }
                        }
                    }
                }
        

                $UserLocationTable = new UserLocationModel();
                $locationInsert = $UserLocationTable->insertBatch($insert_location);
        
                $user = $model->where('id', $inserted_id)->first();
                $this->setRecSession($user);
                return redirect()->to(base_url('JobProfile'));
            }
        }
    }
    //create session 
    private function setRecSession($user)
    {
        $data = [
            'id' => $user['id'],
            'email_id' => $user['email_id'],
            'firstname' => $user['first_name'],
            'role' => $user['role'],
            'status' => 1,
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return false;
    }
    //logout
    public function logout()
    {
        if (session()->has('data')) {
            session()->remove('data');
            session()->destroy();
            return redirect()->to('Home');
        } else {
            session()->destroy();
            return redirect()->to('Home');
        }
    }

    // login page 
    public function JobSeekingLogin()
    {
        helper(['url', 'form']);
        $data = [];
        $this->index();
        $request = service('request');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => ['label' => 'Email', 'rules' => 'required|min_length[5]', 'required|min_length[6]|max_length[50]|valid_email|validateJobUser[email,password]'],
                'password' => 'required|min_length[3]|max_length[255]|validateJobUser[email,password]',
            ];
            $errors = [
                'password' => [
                    'validateJobUser' => 'Password record not found'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                // $datalogin['validation'] = $this->validator;
                return view('job-seeker', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new JobSeekerModel();
                $user = $model->where('email_id', $this->request->getVar('email'))->first();
                $this->setRecSession($user);

                return redirect()->to('Home');
            }
        }
    }
    // upload resume

    public function uploadresume()
    {
        $file = $this->request->getFile('file');
        $res = [];
        $res = [
            'success' => 'Update Successfuly',
        ];
        echo json_encode($res);
    }

    protected function sendemail($data)
    {
        $view = \Config\Services::renderer();
        $message = $view->render('email-template.php');
        $email = \Config\Services::email();
        $email->setFrom('docladder@vertosys.com');
        $email->setTo($data['email_id'], $data['first_name']);
        $email->setSubject('Docladder');
        $email->setMessage($message);
        $email->send();
        if ($email->send()) {
            echo 'Email successfully sent';
        } else {
            $emaidata = $email->printDebugger(['headers']);
            //print_r($emaildata);
        }
        return $email;
    }

    public function addVisitorList(){
        $db = \Config\Database::connect();
        helper(['form', 'url']);
        
        $response = [
            'status' => 0,
            'message' => 'Something went wrong',
        ];

        
        
        $validation =  \Config\Services::validation();
        $rules = [
            "firstname" => [
                "label" => "Name", 
                "rules" => "required"
            ],
            "emailid" => [
                "label" => "Email", 
                "rules" => "required|valid_email|is_unique[jobseeker_register.email_id]"
            ],
            "contactno" => [
                "label" => "Contact No", 
                "rules" => "required|is_unique[jobseeker_register.contact_no]|numeric|min_length[10]|max_length[10]"
            ],
        ];

        if ($this->validate($rules)) { 

            $email = $this->request->getvar('emailid');
            $phone = $this->request->getvar('contactno');

            $builder = $db->table('visitors');
            $user = $builder->where('phone', $phone)
                            ->orWhere('email', $email)
                            ->get()->getRowArray();

            if(empty($user)){
                $data = [
                    'name' => $this->request->getvar('firstname'),
                    'email'  => $email,
                    'phone'  => $phone,
                    'postdata'  => json_encode($_POST),
                    'status'  => 0,
                ];
            
                $builder = $db->table('visitors');
                if($builder->insert($data)){
                    $response = [
                        'status' => 1,
                        'message' => 'Success',
                    ];
                }else{
                    $response = [
                        'status' => 1,
                        'message' => 'Already Available!',
                    ];
                }
            }
        }else{
            $response = array('status'=>2,'errors'=>$validation->getErrors());
        }

        echo json_encode($response); die();
    }
}
