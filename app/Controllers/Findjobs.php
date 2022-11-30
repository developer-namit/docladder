<?php
namespace App\Controllers;
use App\Models\JobPostingModel;
use App\Models\SearchModel;
use App\Models\CitiesModel;
use App\Models\StateModel;
use App\Models\JobSeekerModel;
use App\Models\JobseekerSearchModel;
class Findjobs extends BaseController
{
    public function index(){
         helper(['url', 'form']);
        $data=[];
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
        $spacial = $db->table('skills');
        $data['special']= $spacial->get()->getResultArray();
        
        $rules = [
        'designation' => ['label' => 'Job Function', 'rules' => 'required'],
        'specialization' => ['label' => 'Specialization', 'rules' => 'required'],
        'location' => ['label' => 'Location', 'rules' => 'required'],

        ];   
        
        if (!$this->validate($rules)) {
       $data['validation'] = $this->validator;
            return view('recruiter-findjobs', $data);
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
        $spacial = $db->table('skills');
        $data['special']= $spacial->get()->getResultArray();
        
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
    
    
}