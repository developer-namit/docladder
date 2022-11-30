<?php
namespace App\Controllers;
use App\Models\JobPostingModel;
use App\Models\SearchModel;
use App\Models\TransactionModel;
use App\Models\JobseekerSearchModel;
class Home extends BaseController
{
    public function index()
    {

    $data=[];
    helper(['url', 'form']);
    $request = service('request');
    $db      = \Config\Database::connect();

    // featured jobs
    $trans= new TransactionModel();
    $trans->join('jobposting', 'jobposting.session_id = recruiter_payment.session_id');
    $trans->where('jobposting.status', 0);
    $trans->orderBy('jobposting.id', 'DESC');
    $transuser=$trans->paginate(6);
    
    //recent jobs
    $model= new JobPostingModel();
    $model->where('status', 0);
    $model->orderBy('id', 'DESC');
    $recentjob= $model->paginate(6);
    $data = [
    'recentjob'=>$recentjob,
    'freaturedjobs'=>$transuser,
    'pager' => $trans->pager,
    'currentPage' => $trans->currentPage,
    ];
    
    if(!empty($data['recentjob'])){
    foreach($data['recentjob'] as $key=> $val){
    $special = $db->table('skills');
    $special->where(['designation_id'=> $val['job_function'], 'id'=>$val['specialization']]);
    $special= $special->get()->getRowArray();
    $data['recentjob'][$key]['skills']=$special['skills'];
    }
    }  
    // featured jobs
    if(!empty($data['freaturedjobs'])){
    foreach($data['freaturedjobs'] as $key=> $val){
    $special = $db->table('skills');
    $special->where(['designation_id'=> $val['job_function'], 'id'=>$val['specialization']]);
    $special= $special->get()->getRowArray();
    $data['freaturedjobs'][$key]['skills']=$special['skills'];
    }
    }  
    

    $builder = $db->table('designation');
    $data['designation']=$builder->get()->getResultArray();
    $builder = $db->table('designation');
    $data['designation']=$builder->get()->getResultArray();

        if(!empty($data['designation'])){
            foreach($data['designation'] as $key=> $val){
                $jobposting = $db->table('jobseeker_register');
                $jobposting->selectCount('id');
                $jobposting->where('job_function', $val['designation_id']);
                $jobregister = $jobposting->get()->getRowArray();
                $data['designation'][$key]['total']= $jobregister['id'];                   
                    
                }
      
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
            
        // total job posting
        $posting = $db->table('jobseeker_register');
        $posting->selectCount('id');
         $total =$posting->get()->getRowArray();
        if(!empty($total)){
            $data['total_jobposting']=$total['id'];
        }else{
            $data['total_jobposting']='';
        }
    
    //Total recuiter
     $recuiter = $db->table('recruiter_register');
        $recuiter->selectCount('id');
         $totalrecuiter =$recuiter->get()->getRowArray();
        if(!empty($totalrecuiter)){
            $data['total_recuiter']=$totalrecuiter['id'];
        }else{
            $data['total_recuiter']='';
        }
       
    //   echo "<pre>"; print_r($data); 
     return view('index', $data);
    }
    
    
    // about
    public function about(){
        return view('about');
    }
    // contact
    
      public function contact(){
        return view('contact-us');
    }
    
    public function searchrecruiter(){
         return view('search-recruiter'); 
    }
    
    // view job posting on home page
    public function Getjobposting(){
    $session= session();
    $session_id= $session->get('id');
    $db      = \Config\Database::connect();
    $id= $this->request->getVar('id');
  $data=[];
    $model= New JobPostingModel();
    $model->where('id', $id);
    $getjob=$model->get()->getRowArray();
    if(!empty($getjob)){
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
    if(!empty($getjob['min_experience']==0)){
      $getjob['minexperience']= $getjob['min_experience'].'Fresher';   
    }else if(!empty($getjob['min_experience'])==1){
     $getjob['minexperience']= $getjob['min_experience'].'Year';    
    }else if(!empty($getjob['min_experience'])){
      $getjob['minexperience']= $getjob['min_experience'].'Years'; 
    }
    
     if(!empty($getjob['max_experience']==1)){
      $getjob['maxexperience']= $getjob['max_experience'].'Year';   
    }else if(!empty($getjob['max_experience'])){
     $getjob['maxexperience']= $getjob['max_experience'].'Years';    
    }else{
      $getjob['maxexperience']='Fresher';  
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
     $apjob = $db->table('applied_jobs');
        $apjob->where(['jobposting_id'=>$getjob['id'], 'session_id'=> session()->get('id')]);
        $apjobs= $apjob->get()->getRowArray();
      if(!empty($apjobs)){
          $getjob['applied_job']=$apjobs['status'];
      }else{
          $getjob['applied_job']=''; 
      }
        
      $data=[];
          if(!empty($getjob)){
              $data= $getjob;
          }else{
              $data= true;
          }
        $data['appliedjob']= $apjobs;      
    
         echo json_encode($data);  
    }
    
    public function getallcategory(){
    $response=[];
    $db      = \Config\Database::connect();
    $id= $this->request->getVar('id');
    $builder = $db->table('skills');
    $builder->where('designation_id', $id);
    $response['skill']=$builder->get()->getResultArray();
    // category name
    $build=$db->table('designation');
    $build->where('designation_id', $id);
    $response['title']=$build->get()->getRowArray();
    echo json_encode($response);
 }
 
// Browse By Category
 public function categorylist(){
    $data=[];
    $session=session();
    if (!$session->get('isLoggedIn')== true) {
    return redirect()->to(base_url('Jobseeker'));          
    }
    $session_id= session()->get('id');
    $uri = service('uri');
    $db      = \Config\Database::connect();
    $id=urldecode($this->request->uri->getSegment(2));
    $builder = $db->table('skills');
    $builder->where('skills',$id);
    $getskills=  $builder->get()->getRowArray();
    $skid=$getskills['id'];
 // model
 
// joins
$build= new JobPostingModel();
$build->join('recruiter_payment', 'recruiter_payment.session_id = jobposting.session_id');
$build->where(['specialization'=>$skid ,'status'=>0]);


// all data
 $model= new JobPostingModel(); 
 $model->where(['specialization'=>$skid ,'status'=>0]);
 
   $data = [
    'cat' => $model->paginate(10),
    'catfeatured'=>$build->paginate(10),
    'pager' => $model->pager,
    'currentPage' => $model->currentPage,
    'pager' => $build->pager,
    'currentPage' => $build->currentPage,
    ];
if(!empty($data['cat'])){
    foreach($data['cat'] as $key=> $val){
        $apjobs = $db->table('applied_jobs');
        $apjobs->where(['jobposting_id'=>$val['id'],'session_id'=>$session_id]);
        $applied=  $apjobs->get()->getRowArray();
        if(!empty($applied['status'])){
            $data['cat'][$key]['apply_job']=$applied['status'];
        }else{
            $data['cat'][$key]['apply_job']=0;
        }
        $special = $db->table('skills');
        $special->where(['designation_id'=> $val['job_function'], 'id'=>$val['specialization']]);
       $special= $special->get()->getRowArray();
        $data['cat'][$key]['skills']=$special['skills'];
    }
}
// featured
if(!empty($data['catfeatured'])){
    foreach($data['catfeatured'] as $key=> $val){
        $apjobs = $db->table('applied_jobs');
        $apjobs->where(['jobposting_id'=>$val['id'],'session_id'=>$session_id]);
        $applied=  $apjobs->get()->getRowArray();
        if(!empty($applied['status'])){
            $data['catfeatured'][$key]['apply_job']=$applied['status'];
        }else{
            $data['catfeatured'][$key]['apply_job']=0;
        }
        $special = $db->table('skills');
        $special->where(['designation_id'=> $val['job_function'], 'id'=>$val['specialization']]);
        $special= $special->get()->getRowArray();
        $data['cat'][$key]['skills']=$special['skills'];  
    }
}
   return view('category-listing', $data);
 }
   
 // find searchiing
 
 
 public function jobseekersearch(){
    $db = \Config\Database::connect();
        // get state
        $getstates = $db->table('states');
        $result = $getstates->get()->getResultArray();
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
        $search= New SearchModel();
        $data['designation']= $search->get()->getResultArray();
        
        $rules = [
        'designation' => ['label' => 'Job Function', 'rules' => 'required'],
        'specialization' => ['label' => 'Specialization', 'rules' => 'required'],
        'location' => ['label' => 'Location', 'rules' => 'required'],

        ];   
        
        if (!$this->validate($rules)) {
       $data['validation'] = $this->validator;
            return view('index', $data);
        }else{
    $hospital= $this->request->getvar('job_title');
    $location=  $this->request->getvar('location');
    $designation=  $this->request->getvar('designation');
    $specialization  =  $this->request->getvar('specialization');        
    $data=[
    'hospital'=>$hospital,
    'location'=>$location,
    'designation'=>$designation,
    'specialization'=>$specialization
    ];
    $model= new JobseekerSearchModel();
    $data['jobposting']=$model->jobsearching($data);
    
    if(!empty($data['jobposting'])){
    foreach($data['jobposting'] as $key => $value){
    $spacial = $db->table('skills');
    $spacial->where(['designation_id'=> $value['job_function'],'id'=> $value['specialization']]);
    $sk= $spacial->get()->getResultArray();
    foreach($sk as $val){
        $data['jobposting'][$key]['skill']= $val['skills'];
    }
    }
    }
        $search= New SearchModel();
        $data['designation']= $search->get()->getResultArray();
          // get state
        $getstates = $db->table('states');
        $result = $getstates->get()->getResultArray();
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
        }          
              
        return view('recruiter-findjobs', $data); 
     
     
 }
   public function doctor_list(){
       $data = array();
        return view('doctor_list', $data); 
   }
    public function anatomy_list(){
        $data = array();
        return view('anatomy_list', $data); 
    }
    public function indexPage(){
      

    $data=[];
    helper(['url', 'form']);
    $request = service('request');
    $db      = \Config\Database::connect();

    // featured jobs
    $trans= new TransactionModel();
    $trans->join('jobposting', 'jobposting.session_id = recruiter_payment.session_id');
    $trans->where('jobposting.status', 0);
    $trans->orderBy('jobposting.id', 'DESC');
    $transuser=$trans->paginate(6);
    
    //recent jobs
    $model= new JobPostingModel();
    $model->where('status', 0);
    $model->orderBy('id', 'DESC');
    $recentjob= $model->paginate(6);
    $data = [
    'recentjob'=>$recentjob,
    'freaturedjobs'=>$transuser,
    'pager' => $trans->pager,
    'currentPage' => $trans->currentPage,
    ];
    
    if(!empty($data['recentjob'])){
    foreach($data['recentjob'] as $key=> $val){
    $special = $db->table('skills');
    $special->where(['designation_id'=> $val['job_function'], 'id'=>$val['specialization']]);
    $special= $special->get()->getRowArray();
    $data['recentjob'][$key]['skills']=$special['skills'];
    }
    }  
    // featured jobs
    if(!empty($data['freaturedjobs'])){
    foreach($data['freaturedjobs'] as $key=> $val){
    $special = $db->table('skills');
    $special->where(['designation_id'=> $val['job_function'], 'id'=>$val['specialization']]);
    $special= $special->get()->getRowArray();
    $data['freaturedjobs'][$key]['skills']=$special['skills'];
    }
    }  
    

    $builder = $db->table('designation');
    $data['designation']=$builder->get()->getResultArray();
    $builder = $db->table('designation');
    $data['designation']=$builder->get()->getResultArray();

        if(!empty($data['designation'])){
            foreach($data['designation'] as $key=> $val){
                $jobposting = $db->table('jobseeker_register');
                $jobposting->selectCount('id');
                $jobposting->where('job_function', $val['designation_id']);
                $jobregister = $jobposting->get()->getRowArray();
                $data['designation'][$key]['total']= $jobregister['id'];                   
                    
                }
      
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
            
        // total job posting
        $posting = $db->table('jobseeker_register');
        $posting->selectCount('id');
         $total =$posting->get()->getRowArray();
        if(!empty($total)){
            $data['total_jobposting']=$total['id'];
        }else{
            $data['total_jobposting']='';
        }
    
    //Total recuiter
     $recuiter = $db->table('recruiter_register');
        $recuiter->selectCount('id');
         $totalrecuiter =$recuiter->get()->getRowArray();
        if(!empty($totalrecuiter)){
            $data['total_recuiter']=$totalrecuiter['id'];
        }else{
            $data['total_recuiter']='';
        }
        return view('Job_Seekers_a', $data); 
    }
    public function findOurPremiumJobSeekers(){
        $data=[];
    helper(['url', 'form']);
    $request = service('request');
    $db      = \Config\Database::connect();

    // featured jobs
    $trans= new TransactionModel();
    $trans->join('jobposting', 'jobposting.session_id = recruiter_payment.session_id');
    $trans->where('jobposting.status', 0);
    $trans->orderBy('jobposting.id', 'DESC');
    $transuser=$trans->paginate(6);
    
    //recent jobs
    $model= new JobPostingModel();
    $model->where('status', 0);
    $model->orderBy('id', 'DESC');
    $recentjob= $model->paginate(6);
    $data = [
    'recentjob'=>$recentjob,
    'freaturedjobs'=>$transuser,
    'pager' => $trans->pager,
    'currentPage' => $trans->currentPage,
    ];
    
    if(!empty($data['recentjob'])){
    foreach($data['recentjob'] as $key=> $val){
    $special = $db->table('skills');
    $special->where(['designation_id'=> $val['job_function'], 'id'=>$val['specialization']]);
    $special= $special->get()->getRowArray();
    $data['recentjob'][$key]['skills']=$special['skills'];
    }
    }  
    // featured jobs
    if(!empty($data['freaturedjobs'])){
    foreach($data['freaturedjobs'] as $key=> $val){
    $special = $db->table('skills');
    $special->where(['designation_id'=> $val['job_function'], 'id'=>$val['specialization']]);
    $special= $special->get()->getRowArray();
    $data['freaturedjobs'][$key]['skills']=$special['skills'];
    }
    }  
    

    $builder = $db->table('designation');
    $data['designation']=$builder->get()->getResultArray();
    $builder = $db->table('designation');
    $data['designation']=$builder->get()->getResultArray();

        if(!empty($data['designation'])){
            foreach($data['designation'] as $key=> $val){
                $jobposting = $db->table('jobseeker_register');
                $jobposting->selectCount('id');
                $jobposting->where('job_function', $val['designation_id']);
                $jobregister = $jobposting->get()->getRowArray();
                $data['designation'][$key]['total']= $jobregister['id'];                   
                    
                }
      
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
            
        // total job posting
        $posting = $db->table('jobseeker_register');
        $posting->selectCount('id');
         $total =$posting->get()->getRowArray();
        if(!empty($total)){
            $data['total_jobposting']=$total['id'];
        }else{
            $data['total_jobposting']='';
        }
    
    //Total recuiter
     $recuiter = $db->table('recruiter_register');
        $recuiter->selectCount('id');
         $totalrecuiter =$recuiter->get()->getRowArray();
        if(!empty($totalrecuiter)){
            $data['total_recuiter']=$totalrecuiter['id'];
        }else{
            $data['total_recuiter']='';
        }
       
        return view('find-our-premium-job-seekers', $data); 
    }
    
 
}
      
    