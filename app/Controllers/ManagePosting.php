<?php
namespace App\Controllers;
use App\Models\JobPostingModel;
use App\Models\SearchModel;
class ManagePosting extends BaseController
{
public function index()
    {
    $data=[];
    helper(['url', 'form']);
    $request =\Config\Services::request();
    $session= session();
    $id= $session->get('id');
    $pager = \Config\Services::pager();
    $page=  $request->getGet('page');
    // $request = service('request'); 
    //skills
    $model= new JobPostingModel();
     $model->where(['session_id'=> $id, 'status'=> 0]);
    $data = [
        'jobposting' => $model->paginate(10),
        'pager' => $model->pager,
        'currentPage' => $model->currentPage,
        ];    
     //skill
     $search= New SearchModel();
     $data['skill']= $search->get()->getResultArray();
     //education
     $edu= New JobPostingModel();
     $data['graducate']= $edu->education();

     if(!empty($data['jobposting'])){
     foreach($data['jobposting'] as $key=> $val) {
        //maximum experience       
        if($val['max_experience']== 1){
            $data['jobposting'][$key]['maxexp']='1Y Experience'; 
        }
        if($val['max_experience']== 2){
            $data['jobposting'][$key]['maxexp']='2Y Experience'; 
        }
        if($val['max_experience']== 3){
            $data['jobposting'][$key]['maxexp']='3Y Experience'; 
        }
        if($val['max_experience']== 4){
            $data['jobposting'][$key]['maxexp']='4Y Experience'; 
        }
         if($val['max_experience']== 5){
            $data['jobposting'][$key]['maxexp']='5Y Experience'; 
        }
        if($val['max_experience']== 6){
            $data['jobposting'][$key]['maxexp']='6Y Experience'; 
        }
        if($val['max_experience']== 7){
            $data['jobposting'][$key]['maxexp']='7Y Experience'; 
        }
        if($val['max_experience']== 8){
            $data['jobposting'][$key]['maxexp']='8Y Experience'; 
        }
         if($val['max_experience']== 9){
            $data['jobposting'][$key]['maxexp']='9Y Experience'; 
        }
        if($val['max_experience']== 10){
            $data['jobposting'][$key]['maxexp']='10Y Experience'; 
        }
        if($val['max_experience']== 11){
            $data['jobposting'][$key]['maxexp']='10Y+ Experience'; 
        }

     }
    }
     // echo "<pre>"; print_r($data);
     return view('manage-jobs', $data);
    }
   //edit posting
public function EditPosting(){
        $data=[];
        $session = session();
        $session_id= $session->get('id');
        $currentTime= date("y-m-d H:i:s");
        $id= $this->request->getVar('id');
        $status=0;
        $data=[
            'session_id'=>$session_id,
            'job_title'=>$this->request->getVar('job_title'),
            'key_skills'=>$this->request->getVar('key_skill'),
            'min_experience'=>$this->request->getVar('min_experience'),
            'max_experience'=>$this->request->getVar('max_experience'),
            'min_salary'=>$this->request->getVar('min_salary'),
            'max_salary'=>$this->request->getVar('max_salary'),
            'location'=>$this->request->getVar('location'),
            'desired_profile'=>$this->request->getVar('desired_profile'),
            'job_function'=>$this->request->getVar('job_function'),
            'specialization'=>$this->request->getVar('specialization'),
            'job_description'=>$this->request->getVar('job_description'),
            'graduation'=>$this->request->getVar('graduation'),
            'post_graducation'=>$this->request->getVar('postgraducation'),
            'super_specialty'=>$this->request->getVar('superspecial'),
            'company_name'=>$this->request->getVar('company_name'),
            'executive_name'=>$this->request->getVar('executive_name'),
            'contact_name'=>$this->request->getVar('contact_number'),
            'email'=>$this->request->getVar('email'),
            'status'=>$status,
            'update_at'=>$currentTime,   
            ];
        $model= New JobPostingModel();
        $res= $model->Updatdata($id,$session_id,$data);
            $session = session();
            $session->setFlashdata('success', 'Successful Save!'); 
        echo json_encode($data);
    }
    //get posting
public function Getjobposting(){
    $session= session();
    $session_id= $session->get('id');
    $db      = \Config\Database::connect();
    $id= $_POST['id'];
    $model= New JobPostingModel();
    $model->where(['session_id'=> $session_id, 'id'=> $id]);
    $getjob=$model->get()->getRowArray();
    if(!empty($getjob)){
    //graducate
    // $model= new JobPostingModel();
    $studyupdate= $model->education();
        foreach($studyupdate['education'] as $key=> $val){
            if($key== $getjob['graduation']){
                $getjob['edu_name']= $val; 
            }        
        }
        foreach($studyupdate['postgarduate'] as $keys=> $edu){
           if($keys== $getjob['post_graducation']){
            $getjob['posteducation_name']= $edu;
           }
        }
        // specialty
        foreach($studyupdate['specialty'] as $key=> $special){
        if($key== $getjob['super_specialty']){
            $getjob['specialty_name']= $special;
        }
    }
        if($getjob['min_experience']== 0){
            $getjob['minexperience']='Fresher'; 
        }
        if($getjob['min_experience']== 1){
            $getjob['minexperience']='1Y Experience'; 
        }
        if($getjob['min_experience']== 2){
            $getjob['minexperience']='2Y Experience'; 
        }
        if($getjob['min_experience']== 3){
            $getjob['minexperience']='3Y Experience'; 
        }
        if($getjob['min_experience']== 4){
            $getjob['minexperience']='4Y Experience'; 
        }
        if($getjob['min_experience']== 5){
            $getjob['minexperience']='5Y Experience'; 
        }
        if($getjob['min_experience']== 6){
            $getjob['minexperience']='6Y Experience'; 
        }
        if($getjob['min_experience']== 7){
            $getjob['minexperience']='2Y Experience'; 
        }
        if($getjob['min_experience']== 8){
            $getjob['minexperience']='8Y Experience'; 
        }
         if($getjob['min_experience']== 9){
            $getjob['minexperience']='9Y Experience'; 
        }
        
         if($getjob['max_experience']== 10){
            $getjob['minexperience']='10Y Experience'; 
        }
        
         if($getjob['max_experience']== 11){
            $getjob['minexperience']='10Y+ Experience'; 
        }
        
        // max experience
         if($getjob['max_experience']== 1){
            $getjob['maxexperience']='1Y Experience'; 
        }
        if($getjob['max_experience']== 2){
           $getjob['maxexperience']='2Y Experience'; 
        }
        if($getjob['max_experience']== 3){
            $getjob['maxexperience']='3Y Experience'; 
        }
        if($getjob['max_experience']== 4){
            $getjob['maxexperience']='4Y Experience'; 
        }
         if($getjob['max_experience']== 5){
            $getjob['maxexperience']='5Y Experience'; 
        }
        if($getjob['max_experience']== 6){
            $getjob['maxexperience']='6Y Experience'; 
        }
        if($getjob['max_experience']== 7){
            $getjob['maxexperience']='7Y Experience'; 
        }
        if($getjob['max_experience']== 8){
           $getjob['maxexperience']='8Y Experience'; 
        }
         if($getjob['max_experience']== 9){
            $getjob['maxexperience']='9Y Experience'; 
        }
        if($getjob['max_experience']== 10){
            $getjob['maxexperience']='10Y Experience'; 
        }
        if($getjob['max_experience']== 11){
            $getjob['maxexperience']='10Y+ Experience'; 
        }
        
        
        
        //designation     
        $search= New SearchModel();
        $designation= $search->get()->getResultArray();
            if(!empty($designation)){
            foreach($designation as $sk){
            if($getjob['job_function']==$sk['designation_id']){
            $getjob['skills_name']= $sk['designation']; 
            }
            }
        }        
        // special
        $builder = $db->table('skills');
        $builder->where('designation_id',$getjob['job_function']);
       $build= $builder->get()->getResultArray();
        if(!empty($build)){
            foreach($build as $vals){
            if($getjob['specialization']==$vals['id']){
            $getjob['specialization_name']= $vals['skills']; 
            }
            }
        }  
    }
          $data=[];
          if(!empty($getjob)){
              $data= $getjob;
          }else{
              $data= true;
          }
          $data['edu']= $studyupdate;
          //skill
        $data['designation']= $designation;
        $data['skills']=$build;

          echo json_encode($data);  
    }
    //single delete data
public function deleteposting(){
    $session= session();
    $session_id= $session->get('id');
    $id= $_POST['id'];
    $model= New JobPostingModel();
            $model->where(['session_id'=> $session_id, 'id'=> $id]);
            $del= $model->delete();
            echo json_encode($del);  
    }
    // select all multipal data
public function multidelete(){
    $uid= $_POST['id'];
    $session_id= session()->get('id');
        $model= New JobPostingModel();
        $model->where('session_id', $session_id);
        $model->whereIn('id', $uid);
    $delete= $model->delete(); 
    $res=[];
    if($delete){
            $res = 'Selected users have been deleted successfully.';
        }else{
            $res = 'Some problem occurred, please try again.';
        }
    echo json_encode($res);
    }
    }
      
    