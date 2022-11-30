<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JobSeekerModel;
use App\Models\UserLocationModel;

class Jobseeker extends BaseController
{

    public function index()
    {
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
        }

        $users = $users->paginate(10);

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
                    'upload_resume' => $resume,
                    'role' => 'editor',
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
        return view('admin/jobseeker/add',$data);
    }

    public function detail($i='')
    {
        
        echo "namit"; die();
        // $data = [];
        // $JobSeekerModel  = new  JobSeekerModel();
        // $user = $JobSeekerModel->select('*')->where('id',$id)->find();
        // print'<pre>';print_r($user);die();
        
        // return view('admin/jobseeker/edit',$data);
    }
}
