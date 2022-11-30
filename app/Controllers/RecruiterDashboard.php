<?php
namespace App\Controllers;
use App\Models\TransactionModel;
use App\Models\RecruiterModel;
use App\Models\RecruiterSearchModel;
use App\Models\EmailModel;
class RecruiterDashboard extends BaseController
{
    public function index()
    {
    $data=[];
    helper(['url', 'form']);
    $request = service('request');
     $db      = \Config\Database::connect();
    //listing
    $builder= new RecruiterModel();
    $builder->where('parent_id', session()->get('id'));
     $data['posting'] =$builder->get()->getResultArray();
     
    if(!empty($data['posting'])){
        foreach($data['posting'] as $key=> $val){
            $total=0;
            $total= $val['service_resume']+$val['service_whatsapp']+$val['service_email']+$val['service_sms'];
            $data['posting'][$key]['total_allocated']= $total;
            $totalpoints=4;
            $val= $totalpoints-$total;
            $data['posting'][$key]['pending_allocated']= $val;
        }
    }

 
   
   
    $build= new TransactionModel();
    $build->where('session_id', session()->get('id'));
   $data['transaction']= $build->get()->getLastRow('array');
   
   
   // date
    if(!empty($data['transaction'])){
        
    if($data['transaction']['year']==12){
    $start_date= $data['transaction']['created_at'];
    $expires = strtotime('+ 12 months', strtotime($start_date));
    //$expires = date($expires);
    $date_diff=($expires-strtotime($start_date)) / 86400;
    $Expire= date('Y-m-d H:i:s', $expires);
    $data['transaction']['start_date']= $start_date;
    $data['transaction']['expired_date']= $Expire;
    }elseif($data['transaction']['year']==6){
       $start_date= $data['transaction']['created_at'];
    $expires = strtotime('+ 6 months', strtotime($start_date));
    //$expires = date($expires);
    $date_diff=($expires-strtotime($start_date)) / 86400;
    $Expire= date('Y-m-d H:i:s', $expires);
    $data['transaction']['start_date']= $start_date;
    $data['transaction']['expired_date']= $Expire; 
    }elseif($data['transaction']['year']==3){
       $start_date= $data['transaction']['created_at'];
    $expires = strtotime('+ 3 months', strtotime($start_date));
    //$expires = date($expires);
    $date_diff=($expires-strtotime($start_date)) / 86400;
    $Expire= date('Y-m-d H:i:s', $expires);
    $data['transaction']['start_date']= $start_date;
    $data['transaction']['expired_date']= $Expire; 
    }elseif($data['transaction']['year']==1){
       $start_date= $data['transaction']['created_at'];
    $expires = strtotime('+ 1 months', strtotime($start_date));
    //$expires = date($expires);
    $date_diff=($expires-strtotime($start_date)) / 86400;
    $Expire= date('Y-m-d H:i:s', $expires);
    $data['transaction']['start_date']= $start_date;
    $data['transaction']['expired_date']= $Expire; 
    }else{
        echo "not found";
         // echo round($date_diff, 0)." days left";
    }
    
    $total=0;
    if(!empty($data['transaction']['resume'])){
        $builder=new EmailModel();
        $builder->selectCount('email_id');
        $builder->where('session_id', session()->get('id'));
        $query = $builder->get()->getRowArray();
       
     $model= new TransactionModel();
    $model->where('session_id', session()->get('id'));
  $model->orderBy('created_at', 'DESC');
  $totaltransaction= $model->get()->getResultArray();
  $total_resume=  array_sum(array_column($totaltransaction, 'email'));
    $data['transaction']['totalemail']=$total_resume;
      $total= (int)$total_resume-(int)$query['email_id'];
      $data['transaction']['less_email']=$total; 
    }
    
    
    
  // email
    if(!empty($data['transaction']['email'])){
        $build= $db->table('recruiter_searching');
        $build->selectCount('id');
        $build->where('session_id', session()->get('id'));
        $query = $build->get()->getRowArray();
       
     $model= new TransactionModel();
    $model->where('session_id', session()->get('id'));
  $model->orderBy('created_at', 'DESC');
  $totaltransaction= $model->get()->getResultArray();
  $total_resume=  array_sum(array_column($totaltransaction, 'resume'));
    $data['transaction']['totalresume']=$total_resume;
      $total= (int)$total_resume-(int)$query['id'];
      $data['transaction']['less_resume']=$total; 
    }

    }
    $data['post']= $this->postjobs();
    $data['jobpost']= $this->getjobs();
    
     return view('recruiter-dashboard', $data);
    }
    
    public function recruiterhomepage(){
        $data=[]; 
    $data['simple']= $this->simplesearch();
    $data['advance']= $this->advancesearch();
        return view('recruiter-homepage', $data);
    }

   // simple search
   protected function simplesearch(){
    $db = \Config\Database::connect();
    $model= new RecruiterSearchModel();
    $model->where(['session_id'=> session()->get('id'),'search'=>'simple' ]);
    $model->groupBy('jobfunction');
   
          $data = [
           'savedata' => $model->paginate(10),
           'pager' => $model->pager,
           'currentPage' => $model->currentPage,
           ];

    if(!empty($data['savedata'])){
       foreach($data['savedata'] as $key=> $val){
           if($val['jobfunction'] >0 ){
           $builder = $db->table('designation');
           $builder->where('designation_id ',$val['jobfunction']);
           $build= $builder->get()->getRowArray();
           $data['savedata'][$key]['title_name']= $build['designation']; 
       }
       
       //experience
        //maximum experience       
      if($val['maxexperience']== 1){
       $data['savedata'][$key]['maxexp']='9M Experience'; 
   }
   if($val['maxexperience']== 2){
       $data['savedata'][$key]['maxexp']='1Y Experience'; 
   }
   if($val['maxexperience']== 3){
       $data['savedata'][$key]['maxexp']='2Y Experience'; 
   }
   if($val['maxexperience']== 4){
       $data['savedata'][$key]['maxexp']='5Y Experience'; 
   }

   //location
     //citites
     $buildercity = $db->table('cities');
     if($val['current_location'] >0 ){
     $buildercity->where('id',$val['current_location']);
     $city= $buildercity->get()->getRowArray();
     $data['savedata'][$key]['location']= $city['name'];
     }

     // date time
    
   $input =  $val['created_at'];
   $date = strtotime($input);
   $datedata= date('d-M-Y', $date);
   $datetime= date('h:i:s', $date);
   $data['savedata'][$key]['date']= $datedata;
   $data['savedata'][$key]['time']= $datetime;

   }
   }

   return $data;
   } 
 // advance search
protected function advancesearch(){
    $db = \Config\Database::connect();
    $model= new RecruiterSearchModel();
    $model->where(['session_id'=> session()->get('id'),'search'=>'advance' ]);
    $model->groupBy('jobfunction');
   
          $data = [
           'savedata' => $model->paginate(10),
           'pager' => $model->pager,
           'currentPage' => $model->currentPage,
           ];

    if(!empty($data['savedata'])){
       foreach($data['savedata'] as $key=> $val){
           if($val['jobfunction'] >0 ){
           $builder = $db->table('designation');
           $builder->where('designation_id ',$val['jobfunction']);
           $build= $builder->get()->getRowArray();
           $data['savedata'][$key]['title_name']= $build['designation']; 
       }
       
       //experience
        //maximum experience       
      if($val['maxexperience']== 1){
       $data['savedata'][$key]['maxexp']='9M Experience'; 
   }
   if($val['maxexperience']== 2){
       $data['savedata'][$key]['maxexp']='1Y Experience'; 
   }
   if($val['maxexperience']== 3){
       $data['savedata'][$key]['maxexp']='2Y Experience'; 
   }
   if($val['maxexperience']== 4){
       $data['savedata'][$key]['maxexp']='5Y Experience'; 
   }

   //location
     //citites
     $buildercity = $db->table('cities');
     if($val['current_location'] >0 ){
     $buildercity->where('id',$val['current_location']);
     $city= $buildercity->get()->getRowArray();
     $data['savedata'][$key]['location']= $city['name'];
     }

     // date time
    
   $input =  $val['created_at'];
   $date = strtotime($input);
   $datedata= date('d-M-Y', $date);
   $datetime= date('h:i:s', $date);
   $data['savedata'][$key]['date']= $datedata;
   $data['savedata'][$key]['time']= $datetime;

   }
   }

   return $data;
   } 

// total post data
protected function postjobs(){
     $db = \Config\Database::connect();
        $model = $db->table('jobposting');
        $model->selectCount('id');
        $total=$model->get()->getRowArray();
        return $total;
}

// job posting
protected function getjobs(){
     $db = \Config\Database::connect();
        $model = $db->table('jobposting');
        $model->selectCount('id');
        $model->where(['session_id'=>session()->get('id'), 'status'=> 0]);
        $post=$model->get()->getRowArray();
        return $post;
}


}
      
    