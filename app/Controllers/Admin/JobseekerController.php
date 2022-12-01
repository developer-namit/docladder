<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JobSeekerModel;
use App\Models\UserLocationModel;
use App\Models\SearchModel;
use App\Models\JobPostingModel;
use App\Models\Visitor;

class JobseekerController extends BaseController
{

    public function index()
    {
        $db = \Config\Database::connect();
        $JobSeekerModel  = new  JobSeekerModel();
        $users = $JobSeekerModel->select('*');
        
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

        if(!empty($users)){
            foreach ($users as $key => $value) {
                $users[$key]['specialization_data'] = "";
                if(!empty($value['specialization'])){
                    $builder = $db->table('skills');
                    $builder->where('designation_id', $value['specialization']);
                    $data = $builder->get()->getRowArray();
                    if(!empty($data)){
                        $users[$key]['specialization_data'] = $data['skills'];
                    }
                } 
            }
        }

        $data = [
            'users' => $users,
            'pager' => $JobSeekerModel->pager
        ];
        
        return view('admin/jobseeker/list',$data);
    }

    public function export_pdf(){
        
        $JobSeekerModel  = new  JobSeekerModel();
        $users = $JobSeekerModel->select('id, first_name, email_id, contact_no, dob, gender, min_experience,max_experience, current_ctc, expected_ctc, maximum_experience');
        
        if( isset($_GET['from']) && !empty($_GET['from']) ){
            $from_date = date("Y-m-d", strtotime($_GET['from']));
            $users = $users->where('created_at >=', $from_date);
        }

        if( isset($_GET['to']) && !empty($_GET['to']) ){
            $to_date = date("Y-m-d", strtotime($_GET['to']));
            $users = $users->where('created_at <=', $to_date);
        }

        //$users = $users->where('status', 0);
        $users =  $users->findAll();
        // file name 
        $filename = 'users_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");


        // file creation 
        $file = fopen('php://output', 'w');
    
        $header = array("ID","Name","Email Address","Contact no", "DOB","Gender", "Min. Exp", "Max. Exp","Current CTC", "Expected CTC","Maximum Experience"); 
        fputcsv($file, $header);
        foreach ($users as $key=>$line){ 
            fputcsv($file,$line); 
        }
        fclose($file); 
        exit; 
    }

    public function add()
    {
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
                    "rules" => "required|valid_email|is_unique[jobseeker_register.email_id]"
                ],
                "phone" => [
                    "label" => "Contact No", 
                    "rules" => "required|is_unique[jobseeker_register.contact_no]|numeric|min_length[10]|max_length[10]"
                ],
                "dob" => [
                    "label" => "DOB", 
                    "rules" => "required"
                ],
                "gender" => [
                    "label" => "Gender", 
                    "rules" => "required"
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
                    "label" => "Current Location", 
                    "rules" => "required"
                ],
                "location" => [
                    "label" => "Preffered Location", 
                    "rules" => "required"
                ],

            ];

            if ($this->validate($rules)) { 

                $resume = "";
                if (!empty($this->request->getFile('file'))) {
                    $file = $this->request->getFile('file');
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getName();
                        $name = str_replace(' ', '', $newName);
                        $file->move('./public/uploads/uploadResume', $name);
                        $resume =  $file->getName();
                    } else {
                        $resume =  "";
                    }
                }

                $image = "";
                if (!empty($this->request->getFile('image'))) {
                    $file = $this->request->getFile('image');
                    if ($file->isValid() && !$file->hasMoved()) {

                        $current_timestamp = strtotime("now");
                        $newName = $file->getName();
                        $name = str_replace(' ', '', $newName);
                        $file->move('./public/uploads/uploadImage', $name);
                        $image =  $file->getName();

                    } 
                }

                if(!empty($this->request->getvar('min_experience'))){
                    $minimum= $this->request->getvar('min_experience');
                }else{
                  $minimum=0;  
                }
                if(!empty($this->request->getvar('max_experience'))){
                    $maximum= $this->request->getvar('max_experience');
                }else{
                
                    $maximum=0;
                }
               $check = array($minimum, $maximum);
               $maximum = implode(".",$check);

                $currentTime = date("y-m-d H:i:s");

                $data = [
                    'first_name' => $this->request->getVar('name'),
                    'email_id' => $this->request->getVar('email'),
                    'state' => '',
                    'city' => '',
                    'dob' => $this->request->getvar('dob'),
                    'gender' => $this->request->getvar('gender'),
                    'contact_no' => $this->request->getvar('phone'),
                    'password' => md5($this->request->getvar('password')),
                    'role' => 'editor',
                    'job_title'=>$this->request->getvar('job_title'),
                    'key_skills'=> !empty($this->request->getvar('key_skills')) ? implode(',',$this->request->getvar('key_skills')) : '',
                    'job_function'=>$this->request->getvar('job_function'),
                    'specialization'=>$this->request->getvar('specialization'),
                    'min_experience'=>$this->request->getvar('exp_year'),
                    'max_experience'=>$this->request->getvar('exp_month'),
                    'current_employer'=>$this->request->getvar('current_employer'),
                    'current_designation'=>$this->request->getvar('current_designation'),
                    'current_ctc'=>$this->request->getvar('current_ctc'),
                    'expected_ctc'=>$this->request->getvar('expected_ctc'),
                    'highest_qualification'=>$this->request->getvar('higher_education'),
                    'graduation'=>$this->request->getvar('graduation'),
                    'institute'=>$this->request->getvar('institute'),
                    'year_of_passing'=>$this->request->getvar('year_of_passing'),
                    'post_graducation'=>$this->request->getvar('post_graducation'),
                    'post_institute'=>$this->request->getvar('post_instittute'),
                    'post_passing_year'=>$this->request->getvar('post_passing_year'),
                    'super_specialty'=>$this->request->getvar('super_specialty'),
                    'specialty_institute'=>$this->request->getvar('specialty_graducation'),
                    'specialty_passing_year'=>$this->request->getvar('specialty_passing_year'),
                    'maximum_experience'=> $maximum,
                    'upload_resume' => $resume,
                    'upload_image' => $image,
                    'updated_at'=>$currentTime,
                    'created_at' => $currentTime
                ];

                $model = new JobSeekerModel();
                $userdata = $model->insert($data);
                $inserted_id = $model->insertID();

                if($inserted_id){

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


                    // send email 

                    $this->sendemail([ 'first_name' => $this->request->getVar('name'), 'email_id' => $this->request->getVar('email')]);


                    $response = array('status'=>1,'message'=> 'Jobseeker added successfully!');

                }else{
                    $response = array('status'=>0,'message'=> 'Something went wrong, Please try again!');
                }
            }else{
                $response = array('status'=>2,'errors'=>$validation->getErrors());
            }
            
            echo json_encode($response); die();
        }

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

        $search= New SearchModel();
        $data['job_function'] = $search->get()->getResultArray();

        $model = $db->table('skills');
        $model->orderBy('skills','ASC');
        $data['skill'] = $model->get()->getResultArray();

        $build= new JobPostingModel();
        $data['graduate']= $build->education();

        return view('admin/jobseeker/add',$data);
    }

    public function detail($id)
    {
        $db = \Config\Database::connect();

        $JobSeekerModel  = new  JobSeekerModel();
        $user = $JobSeekerModel->find($id);

        if(empty($user)){ 
            return redirect()->to('admin/jobseeker/list'); 
        }
        

        if($this->request->getMethod() == 'post'){

            helper(['form', 'url']);
            
            $validation =  \Config\Services::validation();
            $rules = [
                "name" => [
                    "label" => "Name", 
                    "rules" => "required"
                ],
                
                "dob" => [
                    "label" => "DOB", 
                    "rules" => "required"
                ],
                "gender" => [
                    "label" => "Gender", 
                    "rules" => "required"
                ],
                
                "state" => [
                    "label" => "Current Location", 
                    "rules" => "required"
                ],
                "location" => [
                    "label" => "Preffered Location", 
                    "rules" => "required"
                ],

            ];

            if ($this->validate($rules)) {
                
                $resume = "";
                if (!empty($this->request->getFile('file'))) {
                    $file = $this->request->getFile('file');
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getName();
                        $name = str_replace(' ', '', $newName);
                        $file->move('./public/uploads/uploadResume', $name);
                        $resume =  $file->getName();
                    } else {
                        $resume = $user['upload_resume'];
                    }
                }else{
                    $resume = $user['upload_resume'];
                }

                $image = "";
                if (!empty($this->request->getFile('image'))) {
                    $file = $this->request->getFile('image');
                    if ($file->isValid() && !$file->hasMoved()) {

                        $current_timestamp = strtotime("now");
                        $newName = $file->getName();
                        $name = str_replace(' ', '', $newName);
                        $file->move('./public/uploads/uploadImage', $name);
                        $image =  $file->getName();

                    } else {
                        $image = $user['upload_image'];
                    }
                }else{
                    $image = $user['upload_image'];
                }

                if(!empty($this->request->getvar('min_experience'))){
                    $minimum= $this->request->getvar('min_experience');
                }else{
                  $minimum=0;  
                }
                if(!empty($this->request->getvar('max_experience'))){
                    $maximum= $this->request->getvar('max_experience');
                }else{
                
                    $maximum=0;
                }
               $check = array($minimum, $maximum);
               $maximum = implode(".",$check);

                $currentTime = date("y-m-d H:i:s");
                    

                $data = [
                    'first_name' => $this->request->getVar('name'),
                    'email_id' => $this->request->getVar('email'),
                    'state' => '',
                    'city' => '',
                    'dob' => $this->request->getvar('dob'),
                    'gender' => $this->request->getvar('gender'),
                    'job_title'=>$this->request->getvar('job_title'),
                    'key_skills'=> !empty($this->request->getvar('key_skills')) ? implode(',',$this->request->getvar('key_skills')) : '',
                    'job_function'=>$this->request->getvar('job_function'),
                    'specialization'=>$this->request->getvar('specialization'),
                    'min_experience'=>$this->request->getvar('exp_year'),
                    'max_experience'=>$this->request->getvar('exp_month'),
                    'current_employer'=>$this->request->getvar('current_employer'),
                    'current_designation'=>$this->request->getvar('current_designation'),
                    'current_ctc'=>$this->request->getvar('current_ctc'),
                    'expected_ctc'=>$this->request->getvar('expected_ctc'),
                    'highest_qualification'=>$this->request->getvar('higher_education'),
                    'graduation'=>$this->request->getvar('graduation'),
                    'institute'=>$this->request->getvar('institute'),
                    'year_of_passing'=>$this->request->getvar('year_of_passing'),
                    'post_graducation'=>$this->request->getvar('post_graducation'),
                    'post_institute'=>$this->request->getvar('post_instittute'),
                    'post_passing_year'=>$this->request->getvar('post_passing_year'),
                    'super_specialty'=>$this->request->getvar('super_specialty'),
                    'specialty_institute'=>$this->request->getvar('specialty_graducation'),
                    'specialty_passing_year'=>$this->request->getvar('specialty_passing_year'),
                    'status'=>$this->request->getvar('status'),
                    'maximum_experience'=> $maximum,
                    'upload_resume' => $resume,
                    'upload_image' => $image,
                    'updated_at'=>$currentTime
                ];

                $model = new JobSeekerModel();
                $model->updateprofiledata($id, $data);

                // Delete all old location data
                $UserLocationTable = new UserLocationModel();
                $UserLocationTable->where('user_id', $id)->delete();

                //insert Current location data
                $insert_location = [];
                $selected_states = [];
                
                $mainGroupSates = ["NI","EI","WI","SI"];
                if(isset($_POST['state']) && !empty($_POST['state'])){
                    foreach($_POST['state'] as $keys => $stateData){
                        if(!empty($stateData)){
                            if(in_array($stateData, $mainGroupSates)){
                                $insert_location[] = array(
                                    "user_id" => $id,
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
                                        "user_id" => $id,
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
                                        "user_id" => $id,
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
                                    "user_id" => $id,
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
                                    "user_id" => $id,
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
                                        "user_id" => $id,
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
                                        "user_id" => $id,
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
                                    "user_id" => $id,
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


                $response = array('status'=>1,'message'=> 'Jobseeker updated successfully!');

               
            }else{
                $response = array('status'=>2,'errors'=>$validation->getErrors());
            }
            
            echo json_encode($response); die();
        }

        $getstates = $db->table('states');
        $result = $getstates->get()->getResultArray();
        // get state
        if(!empty($result)){
            foreach ($result as $key => $value) {
                $state = $db->table('cities');
                $state->where('state_id', $value['id']);
                $state->groupBy('name');
                $getstate = $state->get()->getResultArray();
                foreach ($getstate as $states) {
                    $result[$key]['city'][] = $states;
                }
            }
        }
        $data['margedata'] = $result;

        $search= New SearchModel();
        $data['job_function'] = $search->get()->getResultArray();

        $model = $db->table('skills');
        $model->orderBy('skills','ASC');
        $data['skill'] = $model->get()->getResultArray();

        $build= new JobPostingModel();
        $data['graduate']= $build->education();
        
        $data['locationp'] = $this->get_user_location_details($id);
        $data['user'] = $user;
        
             
        return view('admin/jobseeker/edit',$data);

    }

    function get_user_location_details($user_id){
        $db = \Config\Database::connect();  
        $locationp = [];    
        $locationp['current_data_group'] =  $db->table('user_location')->where(['user_id' => $user_id, 'main_id' => 0, 'requst_type' => 'current' ,'location_type' => '' ])->get()->getResultArray();
        $locationp['current_data_state'] =  $db->table('user_location')->where(['user_id' => $user_id, 'requst_type' => 'current' ,'location_type' => 'state' ])->get()->getResultArray();
        $locationp['current_data_city'] = $db->table('user_location')->where(['user_id' => $user_id, 'requst_type' => 'current' ,'location_type' => 'city' ])->get()->getResultArray();
        $locationp['current_other'] = $db->table('user_location')->where(['user_id' => $user_id, 'requst_type' => 'current' ,'other !=' => '' ])->get()->getResultArray();
        $locationp['current_data_group_ids'] = [];
        $locationp['current_data_state_ids'] = [];
        $locationp['current_data_city_ids'] = [];
        $locationp['current_other_ids'] = [];
        
        
        $locationp['preffered_data_group'] =  $db->table('user_location')->where(['user_id' => $user_id, 'main_id' => 0, 'requst_type' => 'preffered' ,'location_type' => '' ])->get()->getResultArray();
        $locationp['preffered_data_state'] = $db->table('user_location')->where(['user_id' => $user_id, 'requst_type' => 'preffered' ,'location_type' => 'state' ])->get()->getResultArray();
        $locationp['preffered_data_city'] = $db->table('user_location')->where(['user_id' => $user_id, 'requst_type' => 'preffered' ,'location_type' => 'city' ])->get()->getResultArray();
        $locationp['preffered_other'] = $db->table('user_location')->where(['user_id' => $user_id, 'requst_type' => 'preffered' ,'other !=' => '' ])->get()->getResultArray(); 
        $locationp['preffered_data_group_ids'] = [];
        $locationp['preffered_data_state_ids'] = [];
        $locationp['preffered_data_city_ids'] = [];
        $locationp['preffered_other_ids'] = [];
        
        if(!empty($locationp['current_data_group'])){
            foreach($locationp['current_data_group'] as $cdg){
                $locationp['current_data_group_ids'][] = $cdg['name'];
            }
        }
        
        if(!empty($locationp['current_data_state'])){
            foreach($locationp['current_data_state'] as $ccs){
                $locationp['current_data_state_ids'][] = $ccs['main_id'];
            }
        }
        
        if(!empty($locationp['current_other'])){
            foreach($locationp['current_other'] as $current_other){
                 $locationp['current_other_ids'][] = "other_".$current_other['main_id'];
            }
        }
        
        if(!empty($locationp['current_data_city'])){
            foreach($locationp['current_data_city'] as $cdc){
                $locationp['current_data_city_ids'][] = $cdc['main_id'];
            }
        }
        
        if(!empty($locationp['preffered_data_group'])){
            foreach($locationp['preffered_data_group'] as $pdg){
                $locationp['preffered_data_group_ids'][] = $pdg['name'];
            }
        }
        
        if(!empty($locationp['preffered_data_state'])){
            foreach($locationp['preffered_data_state'] as $pds){
                $locationp['preffered_data_state_ids'][] = $pds['main_id'];
            }
        }
        
        if(!empty($locationp['preffered_other'])){
            foreach($locationp['preffered_other'] as $preffered_other){
                 $locationp['preffered_other_ids'][] = "other_".$preffered_other['main_id'];
            }
        }
        
        if(!empty($locationp['preffered_data_city'])){
            foreach($locationp['preffered_data_city'] as $pdc){
                $locationp['preffered_data_city_ids'][] = $pdc['main_id'];
            }
        }

        return $locationp;
    }


    public function getdata(){

        $db      = \Config\Database::connect();

        $designation_id = $this->request->getVar('designation_id');

        $model= New SearchModel();
        $builder = $db->table('skills');
        $builder->where('designation_id', $designation_id);
        $builder->orderBy('skills', 'ASC');
        $data = $builder->get()->getResultArray();    

        if(!empty($data)){
            $response = [
                'status' => 1,
                'message' => 'success',
                'data' => $data
            ];
        }else{
            $response = [
                'status' => 0,
                'message' => 'No data found',
            ];
        }

        echo json_encode($response);
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
            $response['status'] = 1;
            $resposne['message'] = "Email successfully sent.";
        } else {
            $response['status'] = 0;
            $resposne['message'] = $email->printDebugger(['headers']);
        }
        return $resposne;
    }

    public function delete($id){
        $model = new JobSeekerModel();
        $model->delete($id);

        // Delete all old location data
        $UserLocationTable = new UserLocationModel();
        $UserLocationTable->where('user_id', $id)->delete();

        session()->setFlashdata('success','Jobseeker deleted successfully!');

        return redirect()->to('admin/jobseeker/list'); 
    }

    public function importcsv(){

        $db      = \Config\Database::connect();
        $file = $this->request->getFile('file_upload');
        $handle = fopen($file,"r");
        $row = fgetcsv($handle, 10000, ",");

        $success = 0;
        $fail = 0;
        
        while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
        {
            $job_function = 0;
            $specialization = 0;
            
            if(isset($row[7]) && !empty($row[7])){
                $search= New SearchModel();
                $job_function_data = $search->where('designation',$row[7])->get()->getRowArray();
                if(!empty($job_function_data)){
                    $job_function = $job_function_data['designation_id'];

                    if(isset($row[8]) && !empty($row[8])){

                        $builder = $db->table('skills');
                        $builder->where('designation_id', $job_function_data['designation_id']);
                        $builder->where('skills', $row[8]);
                        $data = $builder->get()->getRowArray();

                        if(!empty($data)){
                            $specialization = $data['id'];
                        }
                    }
                }
            }

            $resume = '';
            if(isset($row[15]) && !empty($row[15])){
                $resume = $this->download_Resume($row[15]);
            }

            $currentTime = date("y-m-d H:i:s");
            $data = [
                'first_name' => (isset($row[1]) && !empty($row[1])) ? $row[1] : "",
                'email_id' => (isset($row[2]) && !empty($row[2])) ? $row[2] : "",
                'state' => '',
                'city' => '',
                'dob' => (isset($row[5]) && !empty($row[5])) ? date("Y-m-d", strtotime($row[5])) : "",
                'gender' => (isset($row[6]) && !empty($row[6])) ? $row[6] : "",
                'contact_no' => (isset($row[4]) && !empty($row[4])) ? $row[4] : "",
                'password' =>(isset($row[3]) && !empty($row[3])) ? md5($row[3]) : "",
                'role' => 'editor',
                'job_function'=> $job_function,
                'specialization'=> $specialization,
                'job_title'=> (isset($row[11]) && !empty($row[11])) ? $row[11] : "",
                'key_skills'=> (isset($row[12]) && !empty($row[12])) ? $row[12] : "",
                'current_ctc'=> (isset($row[13]) && !empty($row[13])) ? $row[13] : "",
                'expected_ctc'=> (isset($row[14]) && !empty($row[14])) ? $row[14] : "",
                'updated_at'=>$currentTime,
                'created_at' => $currentTime
            ];

            $email = $data['email_id'];
            $contact_no = $data['contact_no'];
            $model = new JobSeekerModel();
            
            $user = $db->table('jobseeker_register');
            $user_data = $model->where('email_id',$email)->orWhere('contact_no',$contact_no)->get()->getRowArray();
           
            if(empty($user_data)){

                $model = new JobSeekerModel();
                $userdata = $model->insert($data);
                $inserted_id = $model->insertID();
                $success++;

                $insert_location = [];
                $current_location = (isset($row[9]) && !empty($row[9])) ? $row[9] : "";
                $preferred_location = (isset($row[10]) && !empty($row[10])) ? $row[10] : "";
                
                $mainGroupSates = ["NI","EI","WI","SI"];

                if($current_location){
                    if(in_array($current_location,$mainGroupSates)){
                        // found Main group location

                        $insert_location[] = array(
                            "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                            "main_id" => 0,
                            "name" => $current_location,
                            "other" => "",
                            "location_type" => "",
                            "requst_type" => "current",
                            "page_type" => "register",
                            "created_date" => date('Y-m-d H:i:s'),
                        );
        
                    }else{
        
                        $city_data = $db->query("SELECT * from cities Where name = '$current_location' ")->getRowArray();
                        if(!empty($city_data)){
                            $insert_location[] = array(
                                "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                                "main_id" => $city_data['id'],
                                "name" => $city_data['name'],
                                "other" => "",
                                "location_type" => "city",
                                "requst_type" => "current",
                                "page_type" => "register",
                                "created_date" => date('Y-m-d H:i:s'),
                            );
                        }
        
                        $state_data = $db->query("SELECT * from states Where name = '$current_location' ")->getRowArray();
                        if(!empty($state_data)){
                            $insert_location[] = array(
                                "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                                "main_id" => $state_data['id'],
                                "name" => $state_data['name'],
                                "other" => '',
                                "location_type" => "state",
                                "requst_type" => "current",
                                "page_type" => "register",
                                "created_date" => date('Y-m-d H:i:s'),
                            );
                        }  
                    }
                }


                if($preferred_location){
                    if(in_array($preferred_location,$mainGroupSates)){
                        // found Main group location
                        $insert_location[] = array(
                            "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                            "main_id" => 0,
                            "name" => $preferred_location,
                            "other" => "",
                            "location_type" => "",
                            "requst_type" => "current",
                            "page_type" => "register",
                            "created_date" => date('Y-m-d H:i:s'),
                        );
                    }else{
        
                        $city_data = $db->query("SELECT * from cities Where name = '$preferred_location' ")->getRowArray();
                        if(!empty($city_data)){
                            $insert_location[] = array(
                                "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                                "main_id" => $city_data['id'],
                                "name" => $city_data['name'],
                                "other" => "",
                                "location_type" => "city",
                                "requst_type" => "current",
                                "page_type" => "register",
                                "created_date" => date('Y-m-d H:i:s'),
                            );
                        }
        
                        $state_data = $db->query("SELECT * from states Where name = '$preferred_location' ")->getRowArray();
                        if(!empty($state_data)){
                            $insert_location[] = array(
                                "user_id" => (isset($inserted_id)) ? $inserted_id : 0,
                                "main_id" => $state_data['id'],
                                "name" => $state_data['name'],
                                "other" => '',
                                "location_type" => "state",
                                "requst_type" => "current",
                                "page_type" => "register",
                                "created_date" => date('Y-m-d H:i:s'),
                            );
                        }  
                    }
                }
        
                $UserLocationTable = new UserLocationModel();
                $locationInsert = $UserLocationTable->insertBatch($insert_location);

            }else{
                $fail++;
            }  
        }
       
        $message = "";
        if($success){
            $message .= "$success record(s) imported successfully! ";
        }

        if($fail){
            $message .= " $fail record(s) Failed!";
        }

        session()->setFlashdata('success', $message);
        return redirect()->to('admin/jobseeker/list'); 
    }

    public function download_Resume($url){

        $ch = curl_init($url);

        $dir = './public/uploads/uploadResume/';

        // Use basename() function to return
        // the base name of file
        $file_name =  date('YmdHis') . basename($url);

        // Save file into file location
        $save_file_loc = $dir . $file_name;

        // Open file
        $fp = fopen($save_file_loc, 'wb');

        // It set an option for a cURL transfer
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Perform a cURL session
        curl_exec($ch);

        // Closes a cURL session and frees all resources
        curl_close($ch);

        // Close file
        fclose($fp);

        return $file_name;
    }

    public function visitor_list(){
        $db = \Config\Database::connect();
        $Visitor  = new  Visitor();
        $users = $Visitor->select('*')
                ->where('status',1)
                ->orderBy('id', 'DESC')
                ->paginate(10);

        $data = [
            'users' => $users,
            'pager' => $Visitor->pager
        ];
        
        return view('admin/jobseeker/visitor_list',$data);
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

        $JobSeekerModel  = new  JobSeekerModel();
        $data['users'] = $JobSeekerModel->select('id, first_name, email_id, contact_no')
                ->where('status',0)
                ->get()->getResultArray();
        return view('admin/jobseeker/bulk_email',$data);
    }
    
}
