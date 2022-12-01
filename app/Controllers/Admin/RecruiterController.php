<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RecruiterModel;
use App\Models\CitiesModel;
use App\Models\StateModel;

class RecruiterController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $RecruiterModel  = new  RecruiterModel();
        $users = $RecruiterModel->select('*')
                ->where('role','users');
        
        if( isset($_GET['name']) && !empty($_GET['name']) ){
            $users = $users->like('first_name', $_GET['name']);
        }

        if( isset($_GET['email']) && !empty($_GET['email']) ){
            $users = $users->like('email_id', $_GET['email']);
        }

        if( isset($_GET['phone']) && !empty($_GET['phone']) ){
            $users = $users->like('contact_no', $_GET['phone']);
        }

        if( isset($_GET['order_by']) && !empty($_GET['order_by']) ){
            $users = $users->orderBy('id', $_GET['order_by']);
        }else{
            $users->orderBy('id', 'DESC');
        }

        $users = $users->paginate(10);


        $data = [
            'users' => $users,
            'pager' => $RecruiterModel->pager
        ];
        
        return view('admin/recuiter/list',$data);
    }

    public function add()
    {
        $data = [];
        $db = \Config\Database::connect();

        if($this->request->getMethod() == 'post'){

            helper(['form', 'url']);
            
            $validation =  \Config\Services::validation();
            $rules = [
                "name" => [
                    "label" => "Name", 
                    "rules" => "required"
                ],
                
                "email" => [
                    "label" => "Email", 
                    "rules" => "required|valid_email|is_unique[recruiter_register.email_address]"
                ],
                "phone" => [
                    "label" => "Contact No", 
                    "rules" => "required|is_unique[recruiter_register.contact_no]|numeric|min_length[10]|max_length[10]"
                ],
                "password" => [
                    "label" => "Password", 
                    "rules" => "required"
                ],
                "cpassword" => [
                    "label" => "Confirm Password", 
                    "rules" => "required|matches[password]"
                ],
                "state" => [
                    "label" => "State", 
                    "rules" => "required"
                ],
                "city" => [
                    "label" => "City", 
                    "rules" => "required"
                ],

            ];

            if ($this->validate($rules)) {

                $currentTime = date("y-m-d H:i:s");

                $data=[
                    'client_type'=> $this->request->getVar('client_type'),
                    'client_first_name'=> $this->request->getVar('name'),
                    'contact_person_name'=> $this->request->getVar('person_name'),
                    'State'=>   $this->request->getVar('state'),
                    'City'=>    $this->request->getVar('city'),
                    'pincode'=> $this->request->getvar('pincode'),
                    'website_address'=>$this->request->getvar('website_address'),
                    'contact_no'=>$this->request->getvar('phone'),
                    'alternate_no'=>$this->request->getvar('aleternative_no'),
                    'designation'=>$this->request->getvar('designation'),
                    'email_address'=>$this->request->getvar('email'),
                    'password'=>md5($this->request->getvar('password')),
                    'role'=>'users',
                    'created_at'=>$currentTime
                ];
                
                $model= new RecruiterModel();
                $model->insert($data);
                $inserted_id= $model->insertID();

                if($inserted_id){

                    // send email
                    //  $message='Thanks your account created successfuly.Please click the beow link to activate account <br>'.'<a href="">Activate account Now</a><br><br>Thanks<br>Tearm:';
                    $view = \Config\Services::renderer();
                    $message= $view->render('email-template.php');   
                    $email = \Config\Services::email();                         
                    $email->setFrom('docladder@vertosys.com');
                    $email->setTo($data['email_address'], $data['client_first_name']);
                    $email->setSubject('Docladder');
                    $email->setMessage($message);             
                    $email->send();
                    
                    $response = array('status'=>1,'message'=> 'Recruiter added successfully!');

                }else{
                    $response = array('status'=>0,'message'=> 'Something went wrong, Please try again!');
                }
            }else{
                $response = array('status'=>2,'errors'=>$validation->getErrors());
            }
            
            echo json_encode($response); die();
        }

        

        $model= New StateModel();
        $data['state']= $model->get()->getResultArray();    

        return view('admin/recuiter/add',$data);
    }

    public function detail($id)
    {
        $db = \Config\Database::connect();

        $RecruiterModel  = new  RecruiterModel();
        $user = $RecruiterModel->find($id);

        if(empty($user)){ 
            return redirect()->to('admin/recruiter/list'); 
        }

        if($this->request->getMethod() == 'post'){

            helper(['form', 'url']);
            
            $validation =  \Config\Services::validation();
            $rules = [
                "name" => [
                    "label" => "Name", 
                    "rules" => "required"
                ],
                "state" => [
                    "label" => "State", 
                    "rules" => "required"
                ],
                "city" => [
                    "label" => "City", 
                    "rules" => "required"
                ],

            ];

            if ($this->validate($rules)) {
                
                $currentTime = date("y-m-d H:i:s");
                
                $data=[
                    'client_type'=> $this->request->getVar('client_type'),
                    'client_first_name'=> $this->request->getVar('name'),
                    'contact_person_name'=> $this->request->getVar('person_name'),
                    'State'=>   $this->request->getVar('state'),
                    'City'=>    $this->request->getVar('city'),
                    'pincode'=> $this->request->getvar('pincode'),
                    'website_address'=>$this->request->getvar('website_address'),
                    'alternate_no'=>$this->request->getvar('aleternative_no'),
                    'designation'=>$this->request->getvar('designation'),
                    'updated_at'=>$currentTime
                ];

                $model= new RecruiterModel();
                $model->updatejobprofile($data, $id);

                $response = array('status'=>1,'message'=> 'Recruiter updated successfully!');

               
            }else{
                $response = array('status'=>2,'errors'=>$validation->getErrors());
            }
            
            echo json_encode($response); die();
        }

        $model= New RecruiterModel();
        $model->where('parent_id', $id);
        $model->where('role', 'editor');
        $model->orderBy('id', 'DESC');
        $data['sub_users'] = $model->get()->getResultArray();

        $model= New StateModel();
        $data['state']= $model->get()->getResultArray();
        $data['user'] = $user;
        
             
        return view('admin/recuiter/edit',$data);
    }

    public function delete($id){

        $model = new RecruiterModel();
        $model->delete($id);

        // Delete sub users
        $model= New RecruiterModel();
        $model->where('parent_id', $id);
        $model->where('role', 'editor');
        $model->delete();

        session()->setFlashdata('success','Recruiter deleted successfully!');

        return redirect()->to('admin/recruiter/list'); 
    }

    public function update_password($id){

        $validation =  \Config\Services::validation();
        $rules = [
            "password" => [
                "label" => "Password", 
                "rules" => "required"
            ],
            "cpassword" => [
                "label" => "Confirm Password", 
                "rules" => "required|matches[password]"
            ],
        ];

        if ($this->validate($rules)) {
            $data = [
                'password'=>md5($this->request->getvar('password')),
            ];
            $model= new RecruiterModel();
            $model->updatejobprofile($data, $id);
            $response = array('status'=>1,'message'=> 'Password changed successfully!');
        }else{
            $response = array('status'=>2,'errors'=>$validation->getErrors());
        }
        
        echo json_encode($response); die();
    }

    public function add_sub_user($id){

        $validation =  \Config\Services::validation();
        $rules = [
            "first_name" => [
                "label" => "First Name", 
                "rules" => "required"
            ],
            "last_name" => [
                "label" => "Last Name", 
                "rules" => "required"
            ],
            "email_address" => [
                "label" => "Email", 
                "rules" => "required|valid_email|is_unique[recruiter_register.email_address]"
            ],
            "contact_num" => [
                "label" => "Contact No", 
                "rules" => "required|is_unique[recruiter_register.contact_no]|numeric|min_length[10]|max_length[10]"
            ],
            "passwordData" => [
                "label" => "Password", 
                "rules" => "required"
            ],
            "c_passwordData" => [
                "label" => "Confirm Password", 
                "rules" => "required|matches[passwordData]"
            ],
        ];

        if ($this->validate($rules)) {

            $currentTime= date("y-m-d H:i:s");

            if(!empty($this->request->getvar('service_resume'))){
                $service_resume=$this->request->getvar('service_resume');
            }else{
                $service_resume=0;
            }
             if(!empty($this->request->getvar('service_whatsapp'))){
                $service_whatsapp=$this->request->getvar('service_whatsapp');
            }else{
                $service_whatsapp=0;
            }

            $data=[
                'client_first_name'=> $this->request->getVar('first_name'),
                'client_last_name'=> $this->request->getVar('last_name'),
                'email_address'=>$this->request->getVar('email_address'),
                'designation'=>$this->request->getVar('designationData'),
                'status'=>$this->request->getVar('statusData'),
                'service_resume'=>$service_resume,
                'service_whatsapp'=>$service_whatsapp,
                'service_email'=> 0,
                'service_sms'=> 0,
                'contact_no'=>$this->request->getvar('contact_num'),
                'password'=>md5(trim($this->request->getvar('passwordData'))),
                'role'=>'editor',
                'parent_id'=> $id,
                'created_at'=>$currentTime
            ];
     
            $model= new RecruiterModel();
            $model->insertsubusers($data);
           
            $message='Thanks your account created successfuly.You have been added as a sub user for '; 
            $message.='<b></a></b>'.$data['client_first_name']."\r\n";
            $message.= 'to manage their portal <br>';
            $message.='Activate Now</a><br>Thanks<br>Tearm:';
            $email = \Config\Services::email();                         
            $email->setFrom('docladder@vertosys.com');
            $email->setTo($data['email_address'], $data['client_first_name']);
            $email->setSubject('Docladder');
            $email->setMessage($message);             
            $email->send();
            $response = array('status'=>1,'message'=> 'Sub user added successfully!');
                
           
            
        }else{
            $response = array('status'=>2,'errors'=>$validation->getErrors());
        }
        
        echo json_encode($response); die();
    }

    public function bulk_email(){

        if($this->request->getMethod() == 'post'){

            helper(['form', 'url']);

            $validation =  \Config\Services::validation();
            $rules = [
                "emails" => [
                    "label" => "Email", 
                    "rules" => "required"
                ],
                "description" => [
                    "label" => "Description", 
                    "rules" => "required"
                ]
            ];

            if ($this->validate($rules)) {
                $data['message'] = $this->request->getVar('description');
                
                $view = \Config\Services::renderer();
                $message = $view->render('job-seeker-bulk-email.php',$data);
                $email = \Config\Services::email();
                $email->setFrom('docladder@vertosys.com');
                $email->setTo(['namit.soften@gmail.com']);
                //$email->setTo($_POST['emails']);
                $email->setSubject('Docladder');
                $email->setMessage($message);
                if ($email->send()) {
                    $response['status'] = 1;
                    $response['message'] = "Email successfully sent.";
                } else {
                    $response['status'] = 0;
                    $response['message'] = $email->printDebugger(['headers']);
                }
              
                
            }else{
                $response = array('status'=>2,'errors'=>$validation->getErrors());
            }
            
            echo json_encode($response); die();

        }

        $RecruiterModel  = new  RecruiterModel();
        $data['users'] = $RecruiterModel->select('id, client_first_name, email_address, contact_no')
                //->where('status',0)
                ->where('role','users')
                ->get()->getResultArray();
        return view('admin/recuiter/bulk_email',$data);
    }
}
