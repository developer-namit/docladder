<?php
namespace App\Controllers;
use App\Models\JobPostingModel;
use App\Models\SearchModel;
use App\Models\CitiesModel;
use App\Models\StateModel;
use App\Models\TransactionModel;
use App\Models\JobSeekerModel;
use App\Models\JobseekerSearchModel;
class FeaturedJob extends BaseController
{
     public function index($var1 = "",$var2 ="")
    {
     $session=session();
        if (!$session->get('isLoggedIn')== true ) {
        return redirect()->to(base_url('Jobseeker'));          
        }
    
     $data=[];
    helper(['url', 'form']);    
      $model= new JobPostingModel();
    $db = \Config\Database::connect();
    $request = service('request'); 
    $jobposting = new JobPostingModel();
    $locate= explode("," ,$var2);
   if(!empty($locate)){
    $location= $locate;
   }else{
    $location='';
   }

$specialization= [];
    if(!empty($var1)){
    $skills= explode(',-',$var1,-1);
    foreach($skills as $val){
    $skls = $db->table('skills');
    $skls->Like('skills',$val);
    $sk = $skls->get()->getResultArray();
    foreach($sk as $val){
      $specialization[]= $val['id'];
    }
    }
}else{
    $skills="";     
}
$data=[
    'location'=>$location,
    'specialization'=> $specialization
    ];
 $searching= new JobseekerSearchModel();
  $pages= $this->request->getVar('pages');
     $pager = service('pager');
    $page    = (int) ($this->request->getVar('page') ?? 1);
    $perPage = 9;
    $total   = $searching->countall($perPage,$page,$data);
    // Call makeLinks() to make pagination links.
    $pager_links = $pager->makeLinks($page, $perPage, $total);
    $start = ($page - 1) * $perPage;
    $data['featuredjob']= $searching->FeaturedSearch($perPage,$start,$data);
    if(!empty($data['featuredjob'])){
    foreach($data['featuredjob'] as $key=> $val){
    $special = $db->table('skills');
    $special->where(['designation_id'=> $val['job_function'], 'id'=>$val['specialization']]);
    $special= $special->get()->getRowArray();
    $data['featuredjob'][$key]['skills']=$special['skills'];
    }
    } 
    $data['pagination']=$pager_links;
    // doctor designtion skills  
    $skills = $db->table('skills');
   $data['sk']= $skills->get()->getResultArray();
   
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
 
       return view('featured-jobs', $data);
        }
        
       
    
}