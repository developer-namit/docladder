<?php
namespace App\Controllers;
use App\Models\SearchModel;
use App\Models\JobPostingModel;
use App\Models\CitiesModel;
use App\Models\StateModel;
class RecruiterHome extends BaseController
{
    public function index()
    {
     return view('service-information');
    }
// get recruiter post data
    public function RecruiterPost(){
        $data=[];
        helper(['url', 'form']);
        $db      = \Config\Database::connect();
        $session= session();
        $id= $session->get('id');
        $request = service('request');
        $job_title= $this->request->getVar('template');
        //select template data
        $model= New JobPostingModel();
        $model->where('id',$job_title);
        $data['getemp']= $model->get()->getRowArray();
        
        // echo "<pre>"; print_r($data); die();
        //get template   
        $formdata= New JobPostingModel();
        $formdata->where(['session_id'=>$id,'status'=>1]);
        $data['getform']= $formdata->get()->getResultArray();
        //education
        $data['graducate']= $this->education();
         //skill
         $search= New SearchModel();
         $data['skill']= $search->get()->getResultArray();
        
        
         if(!empty($data['getemp'])){
         //designation     
        $search= New SearchModel();
        $designation= $search->get()->getResultArray();
            if(!empty($designation)){
            foreach($designation as $sk){
            if($data['getemp']['job_function']==$sk['designation_id']){
            $data['getemp']['skills_name']= $sk['designation']; 
            }
            }
        }        
        // special
        $builder = $db->table('skills');
        $builder->where('designation_id',$data['getemp']['job_function']);
       $build= $builder->get()->getResultArray();
        if(!empty($build)){
            foreach($build as $vals){
            if($data['getemp']['specialization']==$vals['id']){
            $data['getemp']['specialization_name']= $vals['skills']; 
            }
            }
        }  
    }
        return view('recruiter-job-posting', $data);
    }
//static edication data
public function education(){
    $data=[];
    $data['education']=[
      '0'=>'B.A.M.S',
      '1'=>'M.B.B.S',
      '2'=>'B.H.M.S',
      '3'=>'G.A.M.S',
      '4'=>'B.U.M.S',
      '5'=>'B.Sc',
      '6'=>'G.N.M',
      '7'=>'A.N.M',
      '8'=>'B-Pharm',
      '9'=>'D Pharmacy',
      '10'=>'M.A.H.E',
      '11'=>'MPT',
      '12'=>'BPT',
      '13'=>'B.Sc in Food & Nutrition',
      '14'=>'Others',
    ];
    $data['postgarduate']=[
        '0'=>'Not Required',
        '1'=>'DGO',
        '2'=>'DA',
        '3'=>'D-Ortho',
        '4'=>'DCH',
        '5'=>'DCP',
        '6'=>'DMRD',
        '7'=>'PGDCC',
        '8'=>'M.Sc',
        '9'=>'M-Pharm',
        '10'=>'PG Diploma in Food & Nutrition',
        '11'=>'M.Sc in Food & Nutrition',
        '12'=>'Diploma in Sonography',
        '13'=>'M.TECH',
        '13'=>'MA',
        '13'=>'MD',
        '13'=>'MS',
        '14'=>'Others',
    ];
    $data['specialty']=[
        '0'=>'Not Required',
        '1'=>'Mch',
        '2'=>'DM',
        '3'=>'DNB', 
        '4'=>'Fellowship',
        '5'=>'PDCC',
        '6'=>'Others'
    ];
   return $data; 
}
// get skills
    public function getdata(){
        $data=[];
        $request = \Config\Services::request();
        $db      = \Config\Database::connect();
        $name= $this->request->getVar('skill');
        $model= New SearchModel();
        $model->where('designation_id', $name);
        $skills= $model->get()->getResultArray();
        if(!empty($skills)){
            foreach($skills as $key=> $value){
                $builder = $db->table('skills');
                $builder->where('designation_id', $value['designation_id']);
                $builder->orderBy('skills', 'ASC');
                $data2=$builder->get()->getResultArray();                      
            }
        }
        $res=[];
        if(!empty($data2)){
            $res= $data2;
        }else{
            $res= false;
        }
        echo json_encode($res);

    }
   // get designation 
   public function getdesignation(){
    $db = \Config\Database::connect();
  if (isset($_GET['term'])) {
      $skills= $_GET['term'];
      $model = $db->table('skills');
      $model->like('skills', $skills,'after');
      $model->orderBy('skills ASC');
      $result = $model->get()->getResultArray();
      $arr_result=[];
      if (count($result) > 0) {
      foreach ($result as $row){
          $arr_result[] = array(
              'label' => $row['skills'],
          );
      }
      echo json_encode($arr_result);  
      }   
  } 
}
//show the preview data
public function previewdata(){
     $data=[];
     $session= session();
    $request = \Config\Services::request();
    $session_id=$session->get('id');
    $status=1;
    $currentTime= date("y-m-d H:i:s");
    $sessionId = $session->get('id');
    // After submit a form we need to cheek the data is availble in the session, if available then will remove old once
    if(isset($sessionId) && !empty($sessionId)){
        session()->remove([
            'session_id',
            'job_title',
            'key_skills',
            'min_experience',
            'max_experience',
            'min_salary',
            'max_salary',
            'location',
            'desired_profile',
            'job_function',
            'specialization	',
            'job_description',
            'graduation',
            'post_graducation',
            'super_specialty',
            'company_name',
            'executive_name',
            'contact_name',
            'email',
            'status',
            'update_at'
        ]);
    }
    $data['checkpost']=[
        // Why we are storing session id?
        'session_id'=>$session_id,
        'job_title'=>$this->request->getVar('job_title'),
        'key_skills'=>$this->request->getVar('key_skills'),
        'min_experience'=>$this->request->getVar('min_experience'),
        'max_experience'=>$this->request->getVar('max_experience'),
        'min_salary'=>$this->request->getVar('min_salary'),
        'max_salary'=>$this->request->getVar('max_salary'),
        'location'=>$this->request->getVar('location'),
        'desired_profile'=>$this->request->getVar('desired_profile'),
        'job_function'=>$this->request->getVar('job_function'),
        'specialization	'=>$this->request->getVar('specialization'),
        'job_description'=>$this->request->getVar('job_description'),
        'graduation'=>$this->request->getVar('graduation'),
        'post_graducation'=>$this->request->getVar('post_graducation'),
        'super_specialty'=>$this->request->getVar('super_specialty'),
        'company_name'=>$this->request->getVar('company_name'),
        'executive_name'=>$this->request->getVar('executive_name'),
        'contact_name'=>$this->request->getVar('contact_name'),
        'email'=>$this->request->getVar('email'),
        'status'=>$status,
        'update_at'=>$currentTime,     
        ]; 
            $studyupdate= $this->education();       
            foreach($studyupdate['education'] as $keys=> $edu){
               if($keys== $this->request->getVar('graduation')){
                   $data['checkpost']['edu_name']= $edu;
               }
            }
            //post graduation
            foreach($studyupdate['postgarduate'] as $key=> $edu){
            if($key== $this->request->getVar('post_graducation')){
            $data['checkpost']['posteducation_name']= $edu;
            }
            } 
            //specialty
            foreach($studyupdate['specialty'] as $key=> $edu){
            if($key== $this->request->getVar('super_specialty')){
            $data['checkpost']['specialty_name']= $edu;
            }
            }    
        echo  json_encode($data);  
        exit;
}
// submit job post data
 public function postdata(){
   $data=[];
   $session= session();
    $request = \Config\Services::request();
    if(!empty($_POST['id'])){
    $status=0;
    $session_id=$session->get('id');
    $id= $this->request->getVar('id');
    $currentTime= date("y-m-d H:i:s");
    $data=[
        'session_id'=>$session_id,
        'job_title'=>$this->request->getVar('job_title'),
        'key_skills'=>$this->request->getVar('key_skills'),
        'min_experience'=>$this->request->getVar('min_experience'),
        'max_experience'=>$this->request->getVar('max_experience'),
        'min_salary'=>$this->request->getVar('min_salary'),
        'max_salary'=>$this->request->getVar('max_salary'),
        'location'=>$this->request->getVar('location'),
        'desired_profile'=>$this->request->getVar('desired_profile'),
        'job_function'=>$this->request->getVar('job_function'),
        'specialization	'=>$this->request->getVar('specialization'),
        'job_description'=>$this->request->getVar('job_description'),
        'graduation'=>$this->request->getVar('graduation'),
        'post_graducation'=>$this->request->getVar('post_graducation'),
        'super_specialty'=>$this->request->getVar('super_specialty'),
        'company_name'=>$this->request->getVar('company_name'),
        'executive_name'=>$this->request->getVar('executive_name'),
        'contact_name'=>$this->request->getVar('contact_name'),
        'email'=>$this->request->getVar('email'),
        'status'=>$status,
        'created_at'=>$currentTime,   
        ];   
         $model= New JobPostingModel();
            $res= $model->insertedudata($data);
             $session = session();
               $session->setFlashdata('success', 'Successful Save!');
    }else{
         $status=0;
         $session_id=$session->get('id');
          $currentTime= date("y-m-d H:i:s");
    $data=[
        'session_id'=>$session_id,
        'job_title'=>$this->request->getVar('job_title'),
        'key_skills'=>$this->request->getVar('key_skills'),
        'min_experience'=>$this->request->getVar('min_experience'),
        'max_experience'=>$this->request->getVar('max_experience'),
        'min_salary'=>$this->request->getVar('min_salary'),
        'max_salary'=>$this->request->getVar('max_salary'),
        'location'=>$this->request->getVar('location'),
        'desired_profile'=>$this->request->getVar('desired_profile'),
        'job_function'=>$this->request->getVar('job_function'),
        'specialization	'=>$this->request->getVar('specialization'),
        'job_description'=>$this->request->getVar('job_description'),
        'graduation'=>$this->request->getVar('graduation'),
        'post_graducation'=>$this->request->getVar('post_graducation'),
        'super_specialty'=>$this->request->getVar('super_specialty'),
        'company_name'=>$this->request->getVar('company_name'),
        'executive_name'=>$this->request->getVar('executive_name'),
        'contact_name'=>$this->request->getVar('contact_name'),
        'email'=>$this->request->getVar('email'),
        'status'=>$status,
        'created_at'=>$currentTime,       
        ];
  $model= New JobPostingModel();
 $res= $model->insertedudata($data);
                 $session = session();
                 $session->setFlashdata('success', 'Successful Save!');              
    }
   echo json_encode($res);
}
// save tempplate update 
public function tempdata(){
   $data=[];
   $session= session();
    $request = \Config\Services::request();
    if(!empty($_POST['id'])){
    $status=1;
    $session_id=$session->get('id');
     $currentTime= date("y-m-d H:i:s");
    $id= $this->request->getVar('id');
    $data=[
        'session_id'=>$session_id,
        'job_title'=>$this->request->getVar('job_title'),
        'key_skills'=>$this->request->getVar('key_skills'),
        'min_experience'=>$this->request->getVar('min_experience'),
        'max_experience'=>$this->request->getVar('max_experience'),
        'min_salary'=>$this->request->getVar('min_salary'),
        'max_salary'=>$this->request->getVar('max_salary'),
        'location'=>$this->request->getVar('location'),
        'desired_profile'=>$this->request->getVar('desired_profile'),
        'job_function'=>$this->request->getVar('job_function'),
        'specialization	'=>$this->request->getVar('specialization'),
        'job_description'=>$this->request->getVar('job_description'),
        'graduation'=>$this->request->getVar('graduation'),
        'post_graducation'=>$this->request->getVar('post_graducation'),
        'super_specialty'=>$this->request->getVar('super_specialty'),
        'company_name'=>$this->request->getVar('company_name'),
        'executive_name'=>$this->request->getVar('executive_name'),
        'contact_name'=>$this->request->getVar('contact_name'),
        'email'=>$this->request->getVar('email'),
        'status'=>$status,
        'update_at'=>$currentTime,      
        ];
        
         $model= New JobPostingModel();
            $res= $model->Updatdata($id,$session_id,$data);
                $session = session();
                $session->setFlashdata('success', 'Successful Save!');
    }else{
         $status=1;
         $session_id=$session->get('id');
          $currentTime= date("y-m-d H:i:s");
    $data=[
        'session_id'=>$session_id,
        'job_title'=>$this->request->getVar('job_title'),
        'key_skills'=>$this->request->getVar('key_skills'),
        'min_experience'=>$this->request->getVar('min_experience'),
        'max_experience'=>$this->request->getVar('max_experience'),
        'min_salary'=>$this->request->getVar('min_salary'),
        'max_salary'=>$this->request->getVar('max_salary'),
        'location'=>$this->request->getVar('location'),
        'desired_profile'=>$this->request->getVar('desired_profile'),
        'job_function'=>$this->request->getVar('job_function'),
        'specialization	'=>$this->request->getVar('specialization'),
        'job_description'=>$this->request->getVar('job_description'),
        'graduation'=>$this->request->getVar('graduation'),
        'post_graducation'=>$this->request->getVar('post_graducation'),
        'super_specialty'=>$this->request->getVar('super_specialty'),
        'company_name'=>$this->request->getVar('company_name'),
        'executive_name'=>$this->request->getVar('executive_name'),
        'contact_name'=>$this->request->getVar('contact_name'),
        'email'=>$this->request->getVar('email'),
        'status'=>$status,
        'created_at'=>$currentTime,     
        ];
  $model= New JobPostingModel();
 $res= $model->insertedudata($data);
                $session = session();
                $session->setFlashdata('success', 'Successful Save!');
    }    
   echo json_encode($res);
}

//edit
public function DelRecruiter($id=''){
    $data=[];
    $session = session();
    $session_id= $session->get('id');
    $uri = service('uri');
      $id= $uri->getSegment(2);
      $model= New JobPostingModel();
        $model->where(['id'=>$id, 'session_id'=>$session_id])->delete();
      $session->setFlashdata('success', 'Successful Delete Template!');
      return redirect()->to('jobposting');
       
}
}