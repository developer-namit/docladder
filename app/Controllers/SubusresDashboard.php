<?php
namespace App\Controllers;
use App\Models\TransactionModel;
use App\Models\RecruiterModel;
class SubusresDashboard extends BaseController
{
    public function index()
    {
    $data=[];
    helper(['url', 'form']);
    $request = service('request');
     $db      = \Config\Database::connect();
    //listing
    $builder= new RecruiterModel();
    $builder->where('id', session()->get('id'));
     $data['posting'] =$builder->get()->getRowArray();
   if(!empty($data['posting'])){
  // tranaction   
    $model= new TransactionModel();
    $model->where('session_id', $data['posting']['parent_id']);
   $data['transaction']= $model->get()->getLastRow('array');
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
    
   
    if($data['posting']['service_resume']==1){
      $data['transaction']['service_resumes']= $data['transaction']['resume'];  
    }else{
        $data['transaction']['service_resumes']= 0;
    }
    
    if($data['posting']['service_whatsapp']==1){
      $data['transaction']['service_whatsapps']= $data['transaction']['whatsapp'];  
    }else{
        $data['transaction']['service_whatsapps']= 0;
    }
    
    if($data['posting']['service_email']==1){
      $data['transaction']['service_emails']= $data['transaction']['email'];  
    }else{
        $data['transaction']['service_emails']= 0;
    }
    
    
    if($data['posting']['service_sms']==1){
      $data['transaction']['service_smss']= $data['transaction']['sms'];  
    }else{
        $data['transaction']['service_smss']= 0;
    }
    
    }
    }
     return view('subusers-dashboard', $data);
    }
 
}
      
    