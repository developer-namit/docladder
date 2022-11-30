<?php
namespace App\Controllers;
use App\Models\StateModel;
use App\Models\JobSeekerModel;
use App\Models\JobPostingModel;
use App\Models\SearchModel;
use App\Models\RecruiterSearchModel;
use App\Models\EmailModel;


class RecruiterSimpleSearch extends BaseController
{
    public function index()
    {
    $data=[];
        helper(['url', 'form']);
        $request = service('request');
        $db = \Config\Database::connect();
        $data['skills']= $db->table('skills')->get()->getResultArray();
        //state
        $state= new StateModel();
          $state->groupBy('name');
        $data['states']= $state->get()->getResultArray();
        //city
        // $data['cities']= $db->table('cities')->groupBy('name')->get()->getResultArray(); 
        $search= New SearchModel();
        $data['designation']= $search->get()->getResultArray();
            $getstates = $db->table('states');
             $getstates->select('* ,states.name as Sname');
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
            //print "<pre>"; print_r($data['margedata']); die();
         $data['cities']= $db->table('cities')->groupBy('name')->get()->getResultArray(); 
        return view('recruiter-simple-search', $data);
    }
    
    
    // Simple search result(view page recruiter-simple-results)
    public function SimpleSearching(){
         helper(['url', 'form']);
            $data=[];
            $db = \Config\Database::connect();
            //pagination      
            $data['skills']= $db->table('skills')->get()->getResultArray();
            //state
            $state= new StateModel();
            $data['states']= $state->get()->getResultArray();
            //city
            $data['cities']= $db->table('cities')->groupBy('name')->get()->getResultArray(); 
            // designation
             $search= New SearchModel();
             $data['designation']= $search->get()->getResultArray();   
            $inputs = $this->validate([
                'min_experience' => ['label' => 'Minimum Experience', 'rules' => 'required'],
                'max_experience' => ['label' => 'Maximum Experience', 'rules' => 'required'],
                'min_salary' => ['label' => 'Minimum Salary', 'rules' => 'required'],
                'max_salary' => ['label' => 'Maximum Salary', 'rules' => 'required'],
                'designation' => ['label' => 'Job posting', 'rules' => 'required'],
                'specialization' => ['label' => 'Specialization', 'rules' => 'required'],
            ]);
            $data['validation']= $this->validator;
            if (!$inputs) {
                return view('recruiter-simple-search', $data);
            }else{ 
                if(!empty($this->request->getVar('preferlocation'))){
                $plocation= implode(",", $this->request->getVar('preferlocation'));
                } else{
                $plocation=0;
                }
             if(!empty($this->request->getVar('location'))){
                  $location= implode(",", $this->request->getVar('location'));
             } else{
                $location=0;
             } 
             $currentTime= date("y-m-d H:i:s");
            $data=[
                'session_id'=>session()->get('id'),
                'key_skills'=> $this->request->getVar('key_skills'),
                'current_location'=> $location,
                'preferred_location'=> $plocation,
                'minexperience'=> $this->request->getVar('min_experience'),
                'maxexperience'=> $this->request->getVar('max_experience'),
                'minsalary'=> $this->request->getVar('min_salary'),
                'maxsalary'=> $this->request->getVar('max_salary'),
                'jobfunction'=> $this->request->getVar('designation'),
                'specialization'=> $this->request->getVar('specialization'),
                'search'=>'simple',
                'created_at'=>$currentTime,           
            ];
           $model= new RecruiterSearchModel();
         if($model->isAvailabedata($data,session()->get('id'))){
         }else{
          $model->insert($data);
         }
        $pages= $this->request->getVar('pages');
         $pager = service('pager');
        $page    = (int) ($this->request->getVar('page') ?? 1);
        if(isset($pages) && !empty($pages)){
            $perPage=$pages;  
        }else {
            $perPage = 10;
        }
        $start = ($page - 1) * $perPage;
        $data['total']   = $model->count_all($page, $perPage,$data);
        // Call makeLinks() to make pagination links.
        $pager_links = $pager->makeLinks($page, $perPage, $data['total']);
            $data['simpleform']= $model->searching($perPage,$start,$data);
            if(!empty($data['simpleform'])){
                foreach($data['simpleform'] as $key=> $val) {
                // specialization
                $builder = $db->table('skills');
                $builder->where('id',$val['specialization']);
                $build= $builder->get()->getRowArray();
                $data['simpleform'][$key]['specialization_name']= $build['skills']; 
            //total dates
        $date1 =   date("y-m-d H:i:s");
        $date2 = $val['created_at'];
        $diff = abs(strtotime($date2)-strtotime($date1));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        
        if($years > 0){
        $year=$years.'&nbsp'.'Year'.'&nbsp'; 
        }else if($months > 0){
        $year=$months.'&nbsp'.'Months'.'&nbsp'; 
        }else if($days > 0){
        $year=$days.'&nbsp'.'Day'; 
        }else{
            $year='';
        }
         if(!empty($year)){
           $data['simpleform'][$key]['totaldays']=$year;   
            }else{
              $data['simpleform'][$key]['totaldays']= 'One Day'; 
            }
        // end foreach data
        
        $payment = $db->table('jobseeker_payment');
        $payment->where('session_id',$val['id']);
        $payments= $payment->get()->getRowArray();
        if(!empty($payments)){
        $data['simpleform'][$key]['payment']= 'Premium';
        } else{
       $data['simpleform'][$key]['payment']= '';
        }
    }
    }   
        }

         //echo "QUERY_STRING ".$_SERVER['QUERY_STRING'];
         $QUERY = $_SERVER['QUERY_STRING'];
         parse_str($QUERY,$query_arr_1);
         //$query_arr_1 = array_unique($query_arr);
         if(isset($query_arr_1['pages'])){
             unset($query_arr_1['pages']);
         }
         $new_query_param = http_build_query($query_arr_1);
         $data['url'] = base_url().$_SERVER['PATH_INFO'].substr($_SERVER['PATH_INFO'], 0, strrpos( $_SERVER['PATH_INFO'], "?"))."?".$new_query_param;
        $data['pagination']=$pager_links;
            if(!empty($_SERVER['HTTP_REFERER'])){
            $data['previous_url']=  $_SERVER['HTTP_REFERER'];
            }
            
    $db = \Config\Database::connect();
    $data['skills']= $db->table('skills')->get()->getResultArray();
    //state
    $state= new StateModel();
    $state->groupBy('name');
    $data['states']= $state->get()->getResultArray();
    //city
    $data['cities']= $db->table('cities')->groupBy('name')->get()->getResultArray(); 
    $search= New SearchModel();
    $data['designation']= $search->get()->getResultArray();
    // echo "<pre>"; print_r($data);
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
            
    if(isset($data['simpleform']) && !empty($data['simpleform'])){
        
        $current_location = [];
        $preffered_location = [];
            
        foreach($data['simpleform'] as  $s => $simpleForm){
            
            $mainGroupSates = ["NI","EI","WI","SI"];
            
            $current_data_group =  $db->table('user_location')->where(['user_id' => $simpleForm['id'], 'main_id' => 0, 'requst_type' => 'current' ,'location_type' => '' ])->get()->getResultArray();
            $current_data_state =  $db->table('user_location')->where(['user_id' => $simpleForm['id'], 'requst_type' => 'current' ,'location_type' => 'state' ])->get()->getResultArray();
            $current_data_city = $db->table('user_location')->where(['user_id' => $simpleForm['id'], 'requst_type' => 'current' ,'location_type' => 'city' ])->get()->getResultArray();
            $current_other = $db->table('user_location')->where(['user_id' => $simpleForm['id'], 'requst_type' => 'current' ,'other !=' => '' ])->get()->getResultArray();
            
            if(!empty($current_data_group)){
                foreach($current_data_group as $cdg){
                    if($cdg['name'] == "NI"){
                        $current_location[] = "Anywhere in North India";
                    }else if($cdg['name'] == "EI"){
                        $current_location[] = "Anywhere in East India";
                    }else if($cdg['name'] == "WI"){
                        $current_location[] = "Anywhere in West India";
                    }else if($cdg['name'] == "SI"){
                        $current_location[] = "Anywhere in South India";
                    }   
                }
            }
            
            if(!empty($current_data_state)){
                foreach($current_data_state as $cds){
                    $current_location[] = $cds['name'];
                }
            }
            
            if(!empty($current_data_state)){
                foreach($current_data_city as $cdc){
                    $current_location[] = $cdc['name'];
                }
            }
            
            if(!empty($current_other)){
                foreach($current_other as $co){
                    $current_location[] = $co['other'];
                }
            }
            
            $preffered_data_group =  $db->table('user_location')->where(['user_id' => session()->get('id'), 'main_id' => 0, 'requst_type' => 'preffered' ,'location_type' => '' ])->get()->getResultArray();
            $preffered_data_state = $db->table('user_location')->where(['user_id' => session()->get('id'), 'requst_type' => 'preffered' ,'location_type' => 'state' ])->get()->getResultArray();
            $preffered_data_city = $db->table('user_location')->where(['user_id' => session()->get('id'), 'requst_type' => 'preffered' ,'location_type' => 'city' ])->get()->getResultArray();
            $preffered_other = $db->table('user_location')->where(['user_id' => session()->get('id'), 'requst_type' => 'preffered' ,'other !=' => '' ])->get()->getResultArray(); 
            
            if(!empty($preffered_data_group)){
                foreach($preffered_data_group as $pdg){
                    if($pdg['name'] == "NI"){
                        $preffered_location[] = "Anywhere in North India";
                    }else if($pdg['name'] == "EI"){
                        $preffered_location[] = "Anywhere in East India";
                    }else if($pdg['name'] == "WI"){
                        $preffered_location[] = "Anywhere in West India";
                    }else if($pdg['name'] == "SI"){
                        $preffered_location[] = "Anywhere in South India";
                    }
                }
            }
            
            if(!empty($preffered_data_state)){
                foreach($preffered_data_state as $pds){
                    $preffered_location[] = $pds['name'];
                }
            }
            
            if(!empty($preffered_data_city)){
                foreach($preffered_data_city as $pdc){
                    $preffered_location[] = $pdc['name'];
                }
            }
            
            if(!empty($preffered_other)){
                foreach($preffered_other as $po){
                    $preffered_location[] = $po['other'];
                }
            }  
        }
        
        $data['simpleform'][$s]['current_location'] = !empty($current_location) ? implode(", ",$current_location) : '';
        $data['simpleform'][$s]['preffered_location'] = !empty($preffered_location) ? implode(", ",$preffered_location) : '';
        
    }
    
    // print "<pre>"; print_r($data['simpleform']); die();
    return view('recruiter-simple-results',$data);
}
        
   // candiate profile get data
   public function candidateprofile($id=''){
    $db = \Config\Database::connect();
    $uri = service('uri');
    $id=$this->request->uri->getSegment(3);
    $model=new JobSeekerModel();
   $users= $model->where('id', $id)->first();
   if(!empty($users)){
   
       //maximum experience
                 if(!empty($users['max_experience']==1)){
                $users['maxexp']= $users['max_experience'].'Year'; 
                }else if(!empty($users['max_experience'])){
                $users['maxexp']=$users['max_experience'].'Years';  
                }    

       //education
        $edu= new JobPostingModel();
        $asd= $edu->education();

        foreach($asd['education'] as $akey=> $edu){
        if($users['graduation']== $akey){
        $users['education_name']=$edu;
        }
        }     
        // post education
        foreach($asd['postgarduate'] as $bkey=> $pedu){
        if($users['post_graducation']== $bkey){
        $users['posteducation_name']=$pedu;
        }
        }    
        // specila
        foreach($asd['education'] as $ckey=> $sedu){
        if($users['super_specialty']== $ckey){
        $users['specialeducation_name']=$sedu;
        }
        }
    }

    return view('candidate-profile', array('user'=>$users));
   } 

   // save searching get monthly data
   public function savesearching(){
    $data=[];
    $db = \Config\Database::connect();
    $months= $this->request->getVar('months');
     $model= new RecruiterSearchModel();
     $pages= $this->request->getVar('pages');
     $pager = service('pager');
    $page    = (int) ($this->request->getVar('page') ?? 1);
    $perPage = 10;
    $total   = $model->simplecountall($perPage,$page,$months);
    // Call makeLinks() to make pagination links.
    $pager_links = $pager->makeLinks($page, $perPage, $total);
   
    $start = ($page - 1) * $perPage;
 
     $data['savedata']=$model->getmonthlydata($perPage,$start,$months);
     if(!empty($data['savedata'])){
        foreach($data['savedata'] as $key=> $val){
            if($val['jobfunction'] >0 ){
            $builder = $db->table('designation');
            $builder->where('designation_id ',$val['jobfunction']);
            $build= $builder->get()->getRowArray();
            $data['savedata'][$key]['title_name']= $build['designation']; 
        }
         //maximum experience  
          if(!empty($val['maxexperience']==1)){
                $data['savedata'][$key]['maxexp']= $val['maxexperience'].'Year'; 
                }else if(!empty($val['maxexperience'])){
               $data['savedata'][$key]['maxexp']=$val['maxexperience'].'Years';  
                }  
    //location
      //citites
      $buildercity = $db->table('cities');
      if($val['current_location'] >0 ){
      $buildercity->where('id',$val['current_location']);
      $city= $buildercity->get()->getRowArray();
      $data['savedata'][$key]['location']= $city['name'];
      }
    }
    } 
     $data['paginaton']=$pager_links;
        return view('recruiter-saved-search', $data);  
     } 

// get all save search  data
     public function savesearch(){
        $data=[];
        $db = \Config\Database::connect();
     $model= new RecruiterSearchModel();
     $model->where(['session_id'=> session()->get('id')]);
      $saveinfo= $model->findAll();
       if(!empty($saveinfo)){
       $var =    array_column($saveinfo, 'search');
       $var_unique = array_unique($var);
      // print_r($var_unique);
       $var1 =    array_column($saveinfo, 'jobfunction');
       $var_unique1 = array_unique($var1);
        //print_r($var_unique1);
       $arr_keys = [];
       if(!empty($var_unique)){
            foreach($var_unique as $key => $row){
                if(!array_key_exists($key,$arr_keys)){
                    $arr_keys[] = $key;
                }
            }
       }
       if(!empty($var_unique1)){
        foreach($var_unique1 as $key => $row){
            if(!array_key_exists($key,$arr_keys)){
                $arr_keys[] = $key;
            }
        }
   }
       $res_arry = [];
       foreach($saveinfo as $key => $row){
            if(in_array($key,$arr_keys)){
                $res_arry[$key] = $row;
            }
       }
}    
            if(!empty( $res_arry)){
        foreach( $res_arry as $key=> $val){
          // simple search form
            if($val['jobfunction'] >0 ){
            $builder = $db->table('designation');
            $builder->where('designation_id ',$val['jobfunction']);
            $build= $builder->get()->getRowArray();
             $res_arry[$key]['title_name']= $build['designation']; 
        }
         //maximum experience 
         
           if(!empty($val['maxexperience']==1)){
                 $res_arry[$key]['maxexp']= $val['maxexperience'].'Year'; 
                }else if(!empty($val['maxexperience'])){
                $res_arry[$key]['maxexp']=$val['maxexperience'].'Years';  
                }  
 
    //location
      //citites
      $buildercity = $db->table('cities');
      if($val['current_location'] >0 ){
      $buildercity->where('id',$val['current_location']);
      $city= $buildercity->get()->getRowArray();
       $res_arry[$key]['location']= $city['name'];
      }
    }
    $data['savedata']=$res_arry;
}
    return view('recruiter-saved-search', $data);  
     }
//searching save data by run 
public function savesearchform(){
    $uri = service('uri');
     $data=[];
    $id=$this->request->uri->getSegment(2);
    $search=$this->request->uri->getSegment(3);
    $db = \Config\Database::connect();
    $model= new RecruiterSearchModel();
    $model->where(['session_id'=> session()->get('id'), 'jobfunction'=> $id, 'search'=>$search]);
      $user= $model->findAll();
    $dummy = [];
       if(!empty($user)){
        foreach($user as $key=> $val){
            $build=new JobSeekerModel();
        $build->where(['max_experience <='=> $val['maxexperience'],'job_function'=>$val['jobfunction'], 'specialization'=>$val['specialization']]);
             $build->orderBy('created_at', 'DESC');
            $records = $build->findAll();
                if(!empty($records)){
                    $dummy[] = $records;
                }
        }
       }
        if(!empty($user)){
        foreach($user as $key=> $val){
     
            $build=new JobSeekerModel();
           $build->selectCount('id');
        $build->where(['max_experience <='=> $val['maxexperience'],'job_function'=>$val['jobfunction'], 'specialization'=>$val['specialization']]);
            $totalrecord = $build->first();
                if(!empty($totalrecord)){
                    $totals[] = $totalrecord;
                }
        }
         $data['total']=  array_sum(array_column($totals, 'id'));
       }
  
        if(!empty($dummy)){
        foreach($dummy as $keys=> $raw) {
            foreach($raw as $key=> $row) {
         // specialization
         if(!empty($row['specialization'])){
         $builder = $db->table('skills');
         $builder->where('id',$row['specialization']);
         $build= $builder->get()->getRowArray();
        $dummy[$keys][$key]['specialization_name']= $build['skills']; 
         }else{
            $dummy[$keys][$key]['specialization_name']='Null';  
         }
   
             if(!empty($row['max_experience']==1)){
                $dummy[$keys][$key]['maxexp']= $row['max_experience'].'Year'; 
                }else if(!empty($row['max_experience'])){
               $dummy[$keys][$key]['maxexp']=$row['max_experience'].'Years';  
                }  
    
   // total year months date 
          $date1 =   date("y-m-d H:i:s");
           $date2 = $row['created_at'];
            $diff = abs(strtotime($date2)-strtotime($date1));
          $years = floor($diff / (365*60*60*24));
          $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            
            if($years > 0){
             $year=$years.'&nbsp'.'Year'.'&nbsp'; 
            }else if($months > 0){
             $year=$months.'&nbsp'.'Months'.'&nbsp'; 
            }else if($days > 0){
             $year=$days.'&nbsp'.'Day'; 
            } 
            if(!empty($year)){
            $dummy[$keys][$key]['months']=$year;   
            }else{
              $dummy[$keys][$key]['months']='One Day';
            }
         $payment = $db->table('jobseeker_payment');
         $payment->where('session_id',$row['id']);
         $payments= $payment->get()->getRowArray();
          if(!empty($payments)){
             $dummy[$keys][$key]['payment']= 'Premium';
          } else{
              $dummy[$keys][$key]['payment']= '';
          }
        }
    }
}  
 
if(!empty($dummy)){
    $data['simpleform']= $dummy;
}else{
    $data['simpleform']='';
}    

         
    $QUERY = $_SERVER['QUERY_STRING'];
    parse_str($QUERY,$query_arr_1);
    //$query_arr_1 = array_unique($query_arr);
    if(!empty($query_arr_1)){
    if(isset($query_arr_1['pages'])){
    unset($query_arr_1['pages']);
    }
    $new_query_param = http_build_query($query_arr_1);
    $data['url'] = base_url().$_SERVER['PATH_INFO'].$new_query_param;
    }else{
    $data['url'] = 'https://tryyourwork.com'.$_SERVER['REQUEST_URI'];
    }
    if(!empty($_SERVER['HTTP_REFERER'])){
        $data['previous_url']=  $_SERVER['HTTP_REFERER'];
    }
    
    if(!empty($this->request->getVar('pages'))) {
        $data['perpageResule']=$this->request->getVar('pages');
       }else{
        $data['perpageResule'] = 10;
       } 
        return view('recruiter-simple-run',$data); 
 
}

// advance searching data
public function advancesearch(){
    $data=[];
    helper(['url', 'form']);
    $request = service('request');
    $db = \Config\Database::connect();
    $data['cities']=$db->table('cities')->groupBy('name')->get()->getResultArray();
    $data['skills']= $db->table('skills')->get()->getResultArray();
    //state
    $search= New SearchModel();
    $data['designation']= $search->get()->getResultArray();
    //education
    $build= new JobPostingModel();
    $data['graduate']= $build->education();
 //location
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

    return view('recruiter-advance-search',$data);  
}
// advance  save search 
public function advance(){
    helper(['url', 'form']);
    $data=[];
    $db = \Config\Database::connect();
        $search= New SearchModel();
        $data['designation']= $search->get()->getResultArray();
        $build= new JobPostingModel();
        $data['graduate']= $build->education();
   
         $inputs = $this->validate([
        'min_experience' => ['label' => 'Minimum Experience', 'rules' => 'required'],
        'max_experience' => ['label' => 'Maximum Experience', 'rules' => 'required'],
        'min_salary' => ['label' => 'Minimum Salary', 'rules' => 'required'],
        'max_salary' => ['label' => 'Maximum Salary', 'rules' => 'required'],
        'designation' => ['label' => 'Job posting', 'rules' => 'required'],
        'specialization' => ['label' => 'Specialization', 'rules' => 'required'],
        ]);
        $data['validation']= $this->validator;
    if (!$inputs) {
        return view('recruiter-advance-search', $data);
    }else{ 
     if(!empty($this->request->getVar('preferlocation'))){
        $plocation= implode(",", $this->request->getVar('preferlocation'));
     } else{
        $plocation=0;
     } 
     if(!empty($this->request->getVar('location'))){
       $location= implode(",", $this->request->getVar('location'));
     } else{
        $location=0;
     } 
         $currentTime= date("y-m-d H:i:s");
        $data=[
        'session_id'=>session()->get('id'),
        'key_skills'=> $this->request->getVar('key_skills'),
        'current_location'=> $location,
        'preferred_location'=> $plocation,
        'minexperience'=> $this->request->getVar('min_experience'),
        'maxexperience'=> $this->request->getVar('max_experience'),
        'minsalary'=> $this->request->getVar('min_salary'),
        'maxsalary'=> $this->request->getVar('max_salary'),
        'jobfunction'=> $this->request->getVar('designation'),
        'specialization'=> $this->request->getVar('specialization'),
        'search'=>'advance',
        'gender'=> $this->request->getVar('gender'),
        'graduate'=> $this->request->getVar('graduate'),
        'postgraduate'=> $this->request->getVar('postgraduate'),
        'speciality'=> $this->request->getVar('speciality'),
        'created_at'=>$currentTime,           
         ];
        $model= new RecruiterSearchModel();
         if($model->isAvailableadvance($data,session()->get('id'))){
         }else{
          $model->insert($data);
         }
        // $model->insert($data);         
        $pages= $this->request->getVar('pages');
        $pager = service('pager');
        $page    = (int) ($this->request->getVar('page') ?? 1);

    if(isset($pages) && !empty($pages)){
        $perPage=$pages;  
    }else {
        $perPage = 10;
    }
    $start = ($page - 1) * $perPage;
    $data['total']   = $model->count_all($page, $perPage,$data);
// Call makeLinks() to make pagination links.
    $pager_links = $pager->makeLinks($page, $perPage, $data['total']);
        $data['simpleform']= $model->advancesearching($perPage,$start,$data);
        if(!empty($data['simpleform'])){
            foreach($data['simpleform'] as $key=> $val) {
           //maximum experience  
             if(!empty($val['max_experience']==1)){
                $data['simpleform'][$key]['maxexp']= $val['max_experience'].'Year'; 
                }else if(!empty($row['max_experience'])){
               $data['simpleform'][$key]['maxexp']=$val['max_experience'].'Years';  
                }  
    
        // specialization
        $builder = $db->table('skills');
        $builder->where('id',$val['specialization']);
        $build= $builder->get()->getRowArray();
        $data['simpleform'][$key]['specialization_name']= $build['skills']; 

    
       
        //total dates
        $date1 =   date("y-m-d H:i:s");
        $date2 = $val['created_at'];
        $diff = abs(strtotime($date2)-strtotime($date1));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        
        if($years > 0){
        $year=$years.'&nbsp'.'Year'.'&nbsp'; 
        }else if($months > 0){
        $year=$months.'&nbsp'.'Months'.'&nbsp'; 
        }else if($days > 0){
        $year=$days.'&nbsp'.'Day'; 
        }
        
         if(!empty($year)){
           $data['simpleform'][$key]['totaldays']=$year;   
            }else{
              $data['simpleform'][$key]['totaldays']="One Day"; 
            }
    $payment = $db->table('jobseeker_payment');
    $payment->where('session_id',$val['id']);
    $payments= $payment->get()->getRowArray();
    if(!empty($payments)){
    $data['simpleform'][$key]['payment']= 'Premium';
    } else{
    $data['simpleform'][$key]['payment']= '';
    }
    
    // end foreach data
    
    }
}   
}
    // echo "<pre>"; print_r($_SERVER);
         //echo "QUERY_STRING ".$_SERVER['QUERY_STRING'];
         $QUERY = $_SERVER['QUERY_STRING'];
         parse_str($QUERY,$query_arr_1);
         //$query_arr_1 = array_unique($query_arr);
         if(isset($query_arr_1['pages'])){
             unset($query_arr_1['pages']);
         }
         $new_query_param = http_build_query($query_arr_1);
         $data['url'] = base_url().$_SERVER['PATH_INFO'].substr($_SERVER['PATH_INFO'], 0, strrpos( $_SERVER['PATH_INFO'], "?"))."?".$new_query_param;
        //  print_r($data['url']);
        $data['pagination']=$pager_links;
    
            if(!empty($_SERVER['HTTP_REFERER'])){
             $data['previous_url']=  $_SERVER['HTTP_REFERER'];
        }
        
         //graduate
    $build= new JobPostingModel();
    $data['graduate']= $build->education();
     $data['skills']= $db->table('skills')->get()->getResultArray();
    //city
    
    // SEARCH MODEL
     $search= New SearchModel();
     $data['designation']= $search->get()->getResultArray();  
 
        $data['cities']= $db->table('cities')->groupBy('name')->get()->getResultArray(); 
    //location
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
   
       if(isset($data['simpleform']) && !empty($data['simpleform'])){
            
    	$current_location = [];
    	$preffered_location = [];
    		
    	foreach($data['simpleform'] as  $s => $simpleForm){
    		
    		$mainGroupSates = ["NI","EI","WI","SI"];
    		
    		$current_data_group =  $db->table('user_location')->where(['user_id' => $simpleForm['id'], 'main_id' => 0, 'requst_type' => 'current' ,'location_type' => '' ])->get()->getResultArray();
    		$current_data_state =  $db->table('user_location')->where(['user_id' => $simpleForm['id'], 'requst_type' => 'current' ,'location_type' => 'state' ])->get()->getResultArray();
    		$current_data_city = $db->table('user_location')->where(['user_id' => $simpleForm['id'], 'requst_type' => 'current' ,'location_type' => 'city' ])->get()->getResultArray();
    		$current_other = $db->table('user_location')->where(['user_id' => $simpleForm['id'], 'requst_type' => 'current' ,'other !=' => '' ])->get()->getResultArray();
    		
    		if(!empty($current_data_group)){
    			foreach($current_data_group as $cdg){
    				if($cdg['name'] == "NI"){
    					$current_location[] = "Anywhere in North India";
    				}else if($cdg['name'] == "EI"){
    					$current_location[] = "Anywhere in East India";
    				}else if($cdg['name'] == "WI"){
    					$current_location[] = "Anywhere in West India";
    				}else if($cdg['name'] == "SI"){
    					$current_location[] = "Anywhere in South India";
    				}   
    			}
    		}
    		
    		if(!empty($current_data_state)){
    			foreach($current_data_state as $cds){
    				$current_location[] = $cds['name'];
    			}
    		}
    		
    		if(!empty($current_data_state)){
    			foreach($current_data_city as $cdc){
    				$current_location[] = $cdc['name'];
    			}
    		}
    		
    		if(!empty($current_other)){
    			foreach($current_other as $co){
    				$current_location[] = $co['other'];
    			}
    		}
    		
    		$preffered_data_group =  $db->table('user_location')->where(['user_id' => session()->get('id'), 'main_id' => 0, 'requst_type' => 'preffered' ,'location_type' => '' ])->get()->getResultArray();
    		$preffered_data_state = $db->table('user_location')->where(['user_id' => session()->get('id'), 'requst_type' => 'preffered' ,'location_type' => 'state' ])->get()->getResultArray();
    		$preffered_data_city = $db->table('user_location')->where(['user_id' => session()->get('id'), 'requst_type' => 'preffered' ,'location_type' => 'city' ])->get()->getResultArray();
    		$preffered_other = $db->table('user_location')->where(['user_id' => session()->get('id'), 'requst_type' => 'preffered' ,'other !=' => '' ])->get()->getResultArray(); 
    		
    		if(!empty($preffered_data_group)){
    			foreach($preffered_data_group as $pdg){
    				if($pdg['name'] == "NI"){
    					$preffered_location[] = "Anywhere in North India";
    				}else if($pdg['name'] == "EI"){
    					$preffered_location[] = "Anywhere in East India";
    				}else if($pdg['name'] == "WI"){
    					$preffered_location[] = "Anywhere in West India";
    				}else if($pdg['name'] == "SI"){
    					$preffered_location[] = "Anywhere in South India";
    				}
    			}
    		}
    		
    		if(!empty($preffered_data_state)){
    			foreach($preffered_data_state as $pds){
    				$preffered_location[] = $pds['name'];
    			}
    		}
    		
    		if(!empty($preffered_data_city)){
    			foreach($preffered_data_city as $pdc){
    				$preffered_location[] = $pdc['name'];
    			}
    		}
    		
    		if(!empty($preffered_other)){
    			foreach($preffered_other as $po){
    				$preffered_location[] = $po['other'];
    			}
    		}  
    	}
    	
    	$data['simpleform'][$s]['current_location'] = !empty($current_location) ? implode(", ",$current_location) : '';
    	$data['simpleform'][$s]['preffered_location'] = !empty($preffered_location) ? implode(", ",$preffered_location) : '';
    	
    }

   return view('recruiter-advance-result',$data);  
}

// send gmail data

public function sendemail(){
    return view('sendmail');
   }
   public function email(){
   $id= $this->request->getVar('id');
   $array_unique=array_unique($id); 
   $getid= array_filter($array_unique);
   $model= new JobSeekerModel();
   $vars=[];
   $data=[];
   if(!empty($getid)){
   foreach($getid as $val){
    $user= $model->where('id',$val)->findAll();
      foreach($user as $raw){
       $vars[]= $raw['email_id'];
       $data=[
           'session_id'=>session()->get('id'),
           'email_id'=>$raw['email_id']
           ];
       $build= new EmailModel();
       $build->insert($data);
      } 
      session()->set(['get_email'=>$vars]);
      if(!empty($_SERVER['HTTP_REFERER'])){
        $url=  $_SERVER['HTTP_REFERER'];
        session()->set('url', $url);
        }
}
$response = [
    'success' => true,
    'msg' => "Sent Successfully!",
    ]; 
    return $this->response->setJSON($response);
}else{
    $response = [
        'success' => false,
        'msg' => "Not found data!",
        ]; 
        return $this->response->setJSON($response);
}
   
     }
     public function  sendmail(){
        $emailid=session()->get('email_id');
        $formto= $this->request->getVar('formto');
        $formtext= $this->request->getVar('formtext');
         // send email by recruiter
        if(!empty($formto)){
           
                 $mail_message = 'Dear ' . ',' . "<br>\r\n";
                $mail_message .= $formtext."\r\n";
                $mail_message .= '<br>Thanks & Regards';
                $email = \Config\Services::email();                         
                $email->setFrom($emailid);
                $email->setTo($formto, 'testing');
                $email->setSubject('Docladder');
                $email->setMessage($mail_message);             
                $email->send();
                if ($email->send()) 
                {
                echo 'Email successfully sent';
                } 
                else 
                {
                $emaidata = $email->printDebugger(['headers']);
                 //print_r($emaildata);
                 } 
             $response = [
                'success' => true,
                'msg' => "Sent Successfully!",
                ]; 
                return $this->response->setJSON($response); 
        }else{
            $response = [
                'success' => false,
                'msg' => "failed send mail!",
                ]; 
                return $this->response->setJSON($response); 
        }
        }
     }

