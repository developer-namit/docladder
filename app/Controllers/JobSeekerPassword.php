<?php
namespace App\Controllers;
use App\Models\JobSeekerModel;

class JobSeekerPassword extends BaseController
{
    public function index()
    {
    $data=[];
    helper(['url', 'form']);
    
    $data=[
        'myprofile'=>'MY Profile',
        'changepassword'=>'Change Password',
        'oldpassword'=>'Old Password',
        'newpassword'=>'New Password',
        'confirmpassword'=>'Confirm Password'
        
        ];
    
    
        return view('job-seeker-change-password', $data);
        
    }

    //change the password
         public function oldpassword()
    {  
        helper(['form', 'url']);   
        $session= session();
         $id= $session->get('id');
        $oldpassword=  md5($this->request->getVar('oldpassword'));
           
            if($this->request->getMethod()== 'post'){
                 $model = new JobSeekerModel();
                if($model->checkpassword($id, $oldpassword)) {
                      $response = [
                            'success' => true,
                            'msg' => "Okay"
                            ]; 
                }else{
                    $response = [
                            'success' => false,
                            'msg' => "Wrong! password"
                            ]; 
                } 
                
                
             }
                
            
        return $this->response->setJSON($response);
    }


//check old password
    public function updatepassword(){
         helper(['url', 'form']);
        $session= session();
       $id= $session->get('id');
       $password=  $this->request->getVar('newpassword');
        if($this->request->getMethod()== 'post'){
            $model = new JobSeekerModel();
            $data=[];
            $data=[
                    'password'=>md5($this->request->getVar('newpassword'))
                  ];      
                $save= $model->Updatepassword($id, $data);  
                
                  $response = [
                            'success' => false,
                            'msg' => "Password Changed Successfully!",
                            'data'=> $save
                            ]; 
        }
        return $this->response->setJSON($response);
     
   }  
    
    
}