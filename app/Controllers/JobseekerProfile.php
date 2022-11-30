<?php
namespace App\Controllers;
use App\Models\JobSeekerModel;
use App\Models\StateModel;
use App\Models\CitiesModel;
use App\Models\SearchModel;
use App\Models\JobPostingModel;
use App\Models\UserLocationModel;

class JobseekerProfile extends BaseController
{
    public function index()
    {
    $data=[];
    helper(['url', 'form']);
    $db      = \Config\Database::connect();
    $request = service('request'); 
    $data=[
        'title_name'=>'Job Seeker Profile',
        'heading'=>'Personal Details',
        'firstname'=>'User Name',
        //'lastname'=>'Last Name',
        'email'=>'Email Address',
        'Contact'=>'Contact',
        'location'=>'Current Location',
        'Plocation'=>'Preferred Location',
        'dOB'=>'DOB',
        'gender'=>'Gender',
        //skills Career Profile
        'career_profile'=>'Career Profile',
        'job_title'=>'Job Title',
        'key_skills'=>'Key Skills',
        'job_function'=>'Job Function',
        'area_of_specialization'=>'Area of Specialization',
        'min_experience'=>'Min Experience',
        'max_experience'=>'Max Experience',
        'current_employer'=>'Current Employer',
        'current_designation'=>'Current Designation',
        'in_lacs'=>'in Lacs',
        'current_ctc'=>'Current Annual CTC',
        'expected_ctc'=>'Expected Annual CTC',
        //education
        'education'=>'Education',
        'highest_qualification'=>'Highest Qualification',
        'graduation'=>'Graduation',
        'institute'=>'Institute',
        'yearofpassing'=>'Year Of Passing',
        'postgraduation'=>'Post Graduation',
        'superspecialty'=>'Super Specialty',
        'resume'=>'Upload Resume File size is 3 MB',
        'add_photo'=>'Add Photo',
        'file'=>'Choose file',
        'getpremium'=>'Get Premium',
        'upload'=>'Upload Photo',
        'editupload'=>'Edit Photo',
        'editresume'=>'Edit Resume',
        'uploadresume'=>'Upload Resume'
    ]; 
    $model= new JobSeekerModel();
    $data['profile']=$model->where('id', session()->get('id'))->first();
    if(!empty($data['profile'])){
        
       // birthday format 
     if(!empty($data['profile']['dob'])){
        $date=$data['profile']['dob'];
     }else{
        $date= '1999/12/31'; 
     }   
    $date2=date_create($date);
    $birthday= date_format($date2,"m/d/Y");
    $data['profile']['birthday']=$birthday;
     // states
    
        // job function
        $search= New SearchModel();
        $data['skill']= $search->get()->getResultArray();
        
        // specialization_name

        // special
        $builder = $db->table('skills');
        $builder->where('designation_id',$data['profile']['job_function']);
       $build= $builder->get()->getResultArray();

        if(!empty($build)){
            foreach($build as $vals){    
            if($data['profile']['specialization']==$vals['id']){
            $data['profile']['specialization_name']= $vals['skills'];    
            } 
            }    
        }
        // cities
         $cities = $db->table('cities');
       $data['build_cities']= $cities->get()->getResultArray();
       
        //Graduation post graduation data 
        $build= new JobPostingModel();
        $data['graducate']= $build->education();
        
        // other cities
    //     $othercities = $db->table('other_cities');
    //     $othercities->where('session_id',session()->get('id'));
    //   $build_city= $othercities->get()->getRowArray();
    //     if(!empty($build_city)){
    //   $data['profile']['other_city_id']= $build_city['state_id'];
    //   $data['profile']['other_city_name']= $build_city['city_name'];
            
    //     } 
        
          // other states
    //     $otherstates = $db->table('other_states');
    //     $otherstates->where('session_id',session()->get('id'));
    //   $build_state= $otherstates->get()->getRowArray();
    //     if(!empty($build_state)){
    //   $data['profile']['other_state_id']= $build_state['state_id'];
    //   $data['profile']['other_state_name']= $build_state['current_city_name'];
    //     }    
    
}
  
    $getstates = $db->table('states');
            $result = $getstates->get()->getResultArray();                                   
        // get state
           foreach($result as $key=> $value){
            $state= $db->table('cities');
            $state->where('state_id', $value['id']);
             $state->groupBy('name');
            $getstate = $state->get()->getResultArray(); 
            foreach($getstate as $states){ 
            $result[$key]['city'][]= $states;    
              }
             }
            $data['margedata']= $result;
            
        $data['locationp'] = [];    
        $data['locationp']['current_data_group'] =  $db->table('user_location')->where(['user_id' => session()->get('id'), 'main_id' => 0, 'requst_type' => 'current' ,'location_type' => '' ])->get()->getResultArray();
        $data['locationp']['current_data_state'] =  $db->table('user_location')->where(['user_id' => session()->get('id'), 'requst_type' => 'current' ,'location_type' => 'state' ])->get()->getResultArray();
        $data['locationp']['current_data_city'] = $db->table('user_location')->where(['user_id' => session()->get('id'), 'requst_type' => 'current' ,'location_type' => 'city' ])->get()->getResultArray();
        $data['locationp']['current_other'] = $db->table('user_location')->where(['user_id' => session()->get('id'), 'requst_type' => 'current' ,'other !=' => '' ])->get()->getResultArray();
        $data['locationp']['current_data_group_ids'] = [];
        $data['locationp']['current_data_state_ids'] = [];
        $data['locationp']['current_data_city_ids'] = [];
        $data['locationp']['current_other_ids'] = [];
        
        
        $data['locationp']['preffered_data_group'] =  $db->table('user_location')->where(['user_id' => session()->get('id'), 'main_id' => 0, 'requst_type' => 'preffered' ,'location_type' => '' ])->get()->getResultArray();
        $data['locationp']['preffered_data_state'] = $db->table('user_location')->where(['user_id' => session()->get('id'), 'requst_type' => 'preffered' ,'location_type' => 'state' ])->get()->getResultArray();
        $data['locationp']['preffered_data_city'] = $db->table('user_location')->where(['user_id' => session()->get('id'), 'requst_type' => 'preffered' ,'location_type' => 'city' ])->get()->getResultArray();
        $data['locationp']['preffered_other'] = $db->table('user_location')->where(['user_id' => session()->get('id'), 'requst_type' => 'preffered' ,'other !=' => '' ])->get()->getResultArray(); 
        $data['locationp']['preffered_data_group_ids'] = [];
        $data['locationp']['preffered_data_state_ids'] = [];
        $data['locationp']['preffered_data_city_ids'] = [];
        $data['locationp']['preffered_other_ids'] = [];
        
        if(!empty($data['locationp']['current_data_group'])){
            foreach($data['locationp']['current_data_group'] as $cdg){
                $data['locationp']['current_data_group_ids'][] = $cdg['name'];
            }
        }
        
        if(!empty($data['locationp']['current_data_state'])){
            foreach($data['locationp']['current_data_state'] as $ccs){
                $data['locationp']['current_data_state_ids'][] = $ccs['main_id'];
                
                // if(!empty($ccs['other'])){
                   
                //     $data['locationp']['current_other_ids'][] = "other_".$ccs['main_id'];
                // }
            }
        }
        
        if(!empty($data['locationp']['current_other'])){
            foreach($data['locationp']['current_other'] as $current_other){
                 $data['locationp']['current_other_ids'][] = "other_".$current_other['main_id'];
            }
        }
        
        if(!empty($data['locationp']['current_data_city'])){
            foreach($data['locationp']['current_data_city'] as $cdc){
                $data['locationp']['current_data_city_ids'][] = $cdc['main_id'];
            }
        }
        
        if(!empty($data['locationp']['preffered_data_group'])){
            foreach($data['locationp']['preffered_data_group'] as $pdg){
                $data['locationp']['preffered_data_group_ids'][] = $pdg['name'];
            }
        }
        
        if(!empty($data['locationp']['preffered_data_state'])){
            foreach($data['locationp']['preffered_data_state'] as $pds){
                $data['locationp']['preffered_data_state_ids'][] = $pds['main_id'];
                
                // if(!empty($pds['other'])){
                //     $data['locationp']['preffered_other_ids'][] = "other_".$pds['main_id'];
                // }
                
            }
        }
        
        if(!empty($data['locationp']['preffered_other'])){
            foreach($data['locationp']['preffered_other'] as $preffered_other){
                 $data['locationp']['preffered_other_ids'][] = "other_".$preffered_other['main_id'];
            }
        }
        
        if(!empty($data['locationp']['preffered_data_city'])){
            foreach($data['locationp']['preffered_data_city'] as $pdc){
                $data['locationp']['preffered_data_city_ids'][] = $pdc['main_id'];
            }
        }
 
    //print "<pre>"; print_r($data['locationp']['current_other_ids']); die();
     return view('job-seeker-profile', $data);
    }

    public function updateprofile(){

        $data=[];
        helper(['url', 'form']);
        $db      = \Config\Database::connect();
//         if(!empty($this->request->getvar('location'))){//start
//         $cities =$this->request->getvar('location');
//         foreach ($cities as $i) {
//             if (is_numeric($i)) {
//           $statesid = $db->table('states');
//           $statesid->where('id', $i);
//             $result = $statesid->get()->getRowArray();
//               $model= new CitiesModel(); 
//                 $getdata=[];
//                     if($model->isAlreadycities(session()->get('id'))) {
//                     if(!empty($this->request->getvar('other_cities'))){
//                     $name= $this->request->getvar('other_cities');
//                     }else{
//                     $name= '';
//                     }
//                   $getdata=[
//                     'city_name'=>$this->request->getvar('other_cities'),
//                     'location_id'=>$result['location_id'],
//                     'state_id'=>$i
//                     ];
//                 $model->updatecities(session()->get('id'),$getdata);  
//                 }else{
//                     if(!empty($this->request->getvar('other_cities'))){
//                     $name= $this->request->getvar('other_cities');
//                     }else{
//                     $name= '';
//                     }
//                     $getdata=[
//                     'session_id'=>session()->get('id'),
//                     'city_name'=>$this->request->getvar('other_cities'),
//                     'location_id'=>$result['location_id'],
//                     'state_id'=>$i
//                     ]; 
//                  $model->insertcities($getdata);      
//                 }
//     } 
// }
          
//   }//end
  //current other location
//   $locate=array();
//   if(!empty($this->request->getvar('state'))){//start
//         $states =$this->request->getvar('state');
//         foreach ($states as $i) {
//             if (is_numeric($i)) {
//           $stateid = $db->table('states');
//           $stateid->where('id', $i);
//             $result = $stateid->get()->getRowArray();
//               $model= new CitiesModel(); 
//                 $locate=[];
//                     if($model->isAlreadycurrent(session()->get('id'))) {
//                      $locate=[
//                     'current_city_name'=>$this->request->getvar('other_state_name'),
//                     'location_id'=>$result['location_id'],
//                     'state_id'=>$i
//                     ];
//                 $model->updatestates(session()->get('id'),$locate);  
//                 }else{
//                     $locate=[
//                     'session_id'=>session()->get('id'),
//                     'current_city_name'=>$this->request->getvar('other_state_name'),
//                     'location_id'=>$result['location_id'],
//                     'state_id'=>$i
//                     ]; 
//                  $model->insertstates($locate);      
//                 }
//     } 
// }
          
//   }//end
  
        // $citiesdata=[];
        // if(!empty($this->request->getvar('location'))){
        // foreach($this->request->getvar('location') as $value){
        //     if(is_numeric($value)){
        //     }else{
        //         $citiesdata[]=$value;
        //     }
        //   $city= implode(',', $citiesdata); 
        // }
        // } else {
        //     $city=0;
        // }  
    
    
        //  if(!empty($this->request->getvar('location'))){
        // foreach($this->request->getvar('location') as $value){
        //     if(is_numeric($value)){
        //         $othercity= $value;
        //     }else{
        //       $othercity=0; 
        //     }
        // }
        // } 

    //state
    //  $statesdata=[];
    //     if(!empty($this->request->getvar('state'))){
    //     foreach($this->request->getvar('state') as $value){
    //         if(is_numeric($value)){
    //         }else{
    //             $statesdata[]=$value;
    //         }
    //       $state= implode(',', $statesdata); 
    //     }
    //     } else {
    //         $state=0;
    //     }  
       
        //  if(!empty($this->request->getvar('state'))){
        // foreach($this->request->getvar('state') as $value){
        //     if(is_numeric($value)){
        //         $otherstate= $value;
        //     }else{
        //       $otherstate=0; 
        //     }
        // }
        // } 
       
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
      $check= array($minimum, $maximum);
      $maximum=implode(".",$check);
      
        // upload resume
      $uploadresume= $this->request->getVar('fileresume');
  // submit data
        if($this->request->getMethod()== 'post'){
            $currentTime= date("y-m-d H:i:s");
        $data=[
            'first_name'=> $this->request->getVar('first_name'),
            //'last_name'=>$this->request->getVar('last_name'),
            'state'=>'',
            'city'=> '',
            'email_id'=>$this->request->getvar('email_id'),
            'contact_no'=>$this->request->getvar('contact_number'),
            'dob'=>$this->request->getvar('dob'),
            'gender'=>$this->request->getvar('gender'),
            //career
            'job_title'=>$this->request->getvar('job_title'),
            'key_skills'=>$this->request->getvar('key_skills'),
            'job_function'=>$this->request->getvar('job_function'),
            'specialization'=>$this->request->getvar('specialization'),
            'min_experience'=>$this->request->getvar('min_experience'),
            'max_experience'=>$this->request->getvar('max_experience'),
            'current_employer'=>$this->request->getvar('current_employer'),
            'current_designation'=>$this->request->getvar('current_designation'),
            'current_ctc'=>$this->request->getvar('current_ctc'),
            'expected_ctc'=>$this->request->getvar('expected_ctc'),
            //education
            'highest_qualification'=>$this->request->getvar('highest_qualification'),
            'graduation'=>$this->request->getvar('graduation'),
            'institute'=>$this->request->getvar('institute'),
            'year_of_passing'=>$this->request->getvar('year_of_passing'),
            'post_graducation'=>$this->request->getvar('post_graducation'),
            'post_institute'=>$this->request->getvar('post_institute'),
            'post_passing_year'=>$this->request->getvar('post_passing_year'),
            'super_specialty'=>$this->request->getvar('super_specialty'),
            'specialty_institute'=>$this->request->getvar('specialty_institute'),
            'specialty_passing_year'=>$this->request->getvar('specialty_passing_year'),
            'other_city'=> '',
            'other_state'=> '',
            'maximum_experience'=>$maximum,
            //image resume
            'upload_resume'=>$uploadresume,
            'updated_at'=>$currentTime
        ];
  
        $session_id= session()->get('id');
        $model= new JobSeekerModel();
        $model->updateprofiledata($session_id, $data);
        
        
        // Delete all old data
        $UserLocationTable = new UserLocationModel();
        $UserLocationTable->where('user_id', session()->get('id'))->delete();
        
        
        //insert Current location data
        $insert_location = [];
        $selected_states = [];
        
        $mainGroupSates = ["NI","EI","WI","SI"];
        if(isset($_POST['state']) && !empty($_POST['state'])){
            foreach($_POST['state'] as $keys => $stateData){
                if(!empty($stateData)){
                    if(in_array($stateData, $mainGroupSates)){
                        $insert_location[] = array(
                            "user_id" => session()->get('id'),
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
                                "user_id" => session()->get('id'),
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
                                "user_id" => session()->get('id'),
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
                            "user_id" => session()->get('id'),
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
                            "user_id" => session()->get('id'),
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
                                "user_id" => session()->get('id'),
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
                                "user_id" => session()->get('id'),
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
                            "user_id" => session()->get('id'),
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
                
        $session = session();
        $session->setFlashdata('success', 'Successful Save!');
        $response=[];
        $response=[
            'status'=>true,
            'msg'=>'successfuly Update',
            ];
         echo json_encode($response);
    }

    }

    // upload image
   

    public function uploadImages()
    {  
        helper(['form', 'url']);   
        $builder = new JobSeekerModel();
        $validateImage = $this->validate([
            'file' => [
                'uploaded[file]',
                // 'mime_in[file, image/png, image/jpg,image/jpeg, image/gif]',
                // 'max_size[file, 14096]',
            ],
        ]);
    
        $response = [
            'success' => false,
            'data' => '',
            'msg' => "Image could not upload"
        ];
        if ($validateImage) {
            $imageFile = $this->request->getFile('file');
              
            if($imageFile->isValid() && !$imageFile->hasMoved()){
                // upload imagess
                $current_timestamp = strtotime("now");
                $newName=$imageFile->getName().$current_timestamp;
                $name= str_replace('','', $newName);
                $imageFile->move('./public/uploads/uploadImage', $name);                 
                $data = [
                    'upload_image' => $name
                    // 'file'  => $imageFile->getClientMimeType()
                ];
            }

            $save = $builder->Updateimage(session()->get('id'), $data);
            // $save = $builder->insert($data);
            $response = [
                'success' => true,
                'data' => $save,
                'msg' => "Image successfully uploaded"
            ];
        }
        return $this->response->setJSON($response);
    }
    //  upload resume
    public function uploadResume()
    {  
        helper(['form', 'url']);   
        $builder = new JobSeekerModel();
        $validateImage = $this->validate([
            'file' => [
                'uploaded[file]',
                // 'max_size[file, 14096]',
            ],
        ]);
    
        $response = [
            'success' => false,
            'data' => '',
            'msg' => "Image could not upload"
        ];
        if ($validateImage) {
            $resumedata = $this->request->getFile('file');
            if($resumedata->isValid() && !$resumedata->hasMoved()){
                $current_timestamp = strtotime("now");
                $newName=$resumedata->getName().$current_timestamp;
                $name= str_replace('', '', $newName);
                $resumedata->move('./public/uploads/uploadResume', $name);                 
                $data = [
                    'upload_resume' => $name
                    // 'file'  => $resumedata->getClientMimeType()
                ];
            }

            $save = $builder->Updateimage(session()->get('id'), $data);
            // $save = $builder->insert($data);
            $response = [
                'success' => true,
                'data' => $save,
                'msg' => "File successfully uploaded"
            ];
        }
        return $this->response->setJSON($response);
    }
    // edit images
    public function editImages()
    {  
        helper(['form', 'url']);   
    
        $builder = new JobSeekerModel();
        $validateImage = $this->validate([
            'file' => [
                'uploaded[file]',
               // 'mime_in[file, image/png, image/PNG, image/jpg,image/jpeg, image/gif]',
                // 'max_size[file, 14096]',
            ],
        ]);
    
        $response = [
            'success' => false,
            'data' => '',
            'msg' => "Image could not upload"
        ];
        if ($validateImage) {
            $imageFile = $this->request->getFile('file');
           
            if($imageFile->isValid() && !$imageFile->hasMoved()){
                  $current_timestamp = strtotime("now");
                $model= new JobSeekerModel();
                $model->where('id', session()->get('id'));
                $images=$model->first();
                $img=$images['upload_image'];
                 unlink(FCPATH.'public/uploads/uploadImage'.'/'.$img);
                $newName=$imageFile->getName().$current_timestamp;
                $name= str_replace('','', $newName);
                $imageFile->move('./public/uploads/uploadImage', $name);                 
                $data = [
                    'upload_image' => $name
                    // 'file'  => $imageFile->getClientMimeType()
                ];
            }

            $save = $builder->Updateimage(session()->get('id'), $data);
            // $save = $builder->insert($data);
            $response = [
                'success' => true,
                'data' => $save,
                'msg' => "Image successfully uploaded"
            ];
        }
        return $this->response->setJSON($response);
    }
   // edit  resume
    public function editResume()
    {  
        helper(['form', 'url']);   
        $validateImage = $this->validate([
            'file' => [
                'uploaded[file]',
                // 'max_size[file, 4096]',
            ],
        ]);
    
        $response = [
            'success' => false,
            'data' => '',
            'msg' => "Image could not upload"
        ];
        if ($validateImage) {
            $resumedata = $this->request->getFile('file');
             $current_timestamp = strtotime("now");
            if($resumedata->isValid() && !$resumedata->hasMoved()){
                 $model= new JobSeekerModel();
                $model->where('id', session()->get('id'));
                $res=$model->first();
                $resume=$res['upload_resume'];
                 unlink(FCPATH.'public/uploads/uploadResume'.'/'.$resume);
                $newName=$resumedata->getName().$current_timestamp;
                $name= str_replace('', '', $newName);
                $resumedata->move('./public/uploads/uploadResume', $name);                 
                $data = [
                    'upload_resume' => $name
                    // 'file'  => $resumedata->getClientMimeType()
                ];
            }
            $builder = new JobSeekerModel();
            $save = $builder->Updateimage(session()->get('id'), $data);
            // $save = $builder->insert($data);
            $response = [
                'success' => true,
                'data' => $save,
                'msg' => "File successfully uploaded"
            ];
        }
        return $this->response->setJSON($response);
    }

}