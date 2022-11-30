<?php
namespace App\Controllers;
use App\Models\RecruiterModel;
use App\Models\StateModel;
use App\Models\ManageSubModel;

class RecruiterProfile extends BaseController
{
   public function index()
    {       helper(['url', 'form']);
            $session= session();
            if (!$session->get('isLoggedIn')== true) {
            return redirect()->to(base_url('Home'));          
            }
        $data=[];
  
        $model= New RecruiterModel();
        $model->where('parent_id', session()->get('id'));
        $model->orderBy('id', 'DESC');
        $data = [
            'managejob' => $model->paginate(10),
            'pager' => $model->pager,
            'currentPage' => $model->currentPage,
            ]; 
         $model= New StateModel();
        $data['state']= $model->get()->getResultArray();
        $model= new RecruiterModel();
        $data['user']= $model->jobprofile();
        return view('edit-profile', $data);
    }
//edit Recruiter profile page
    public function updateprofile(){
        helper(['url', 'form']);
        $data=[];
       $request= service('request');
       $session= session();
        $inputs = $this->validate([
            'pincode' => ['label' => 'Pincode', 'rules' => 'required'],
            'email_address' => ['label' => 'Email', 'rules' => 'required'],
        ]);

        $data['validation']= $this->validator;
        if (!$inputs) {
            return redirect()->to(base_url('profile'));
        }else{
       
       
       if($this->request->getMethod()== 'post'){
         $currentTime= date("y-m-d H:i:s");
         $data=[
             'client_first_name'=> $this->request->getVar('first_name'),
             'client_last_name'=>$this->request->getVar('last_name'),
             'State'=>$this->request->getVar('state'),
             'City'=>$this->request->getvar('city'),
             'pincode'=>$this->request->getvar('pincode'),
             'website_address'=>$this->request->getvar('website_address'),
             'contact_no'=>$this->request->getvar('contact_no'),
             'alternate_no'=>$this->request->getvar('alternate_no'),
             'designation'=>$this->request->getvar('designation'),
             'email_address'=>$this->request->getvar('email_address'),
             'created_at'=>$currentTime
         ];
         $id= $session->get('id');
         $model= new RecruiterModel();
         $model->updatejobprofile($data, $id);
         session()->setFlashdata('success', 'Success! Profile has been updated.');
         return redirect()->to(base_url('profile'));
     }
}
    }
//change the password
    public function changepassword(){
         helper(['url', 'form']);
        $session= session();
            $data=[];
            $validation =  \Config\Services::validation();
             $id= $session->get('id');
             $request= service('request');
             if($this->request->getMethod()== 'post'){
                $model= new RecruiterModel();
                if($model->check_password($id, md5($this->request->getVar('oldpassword')))) {
                  $data=[
                    'password'=>md5($this->request->getVar('password'))
                  ];      
                    $model->ChangePassword($data, $id);  
                    $response=[];
                      $response = [
                            'success' => false,
                            'msg' => "Password Changed Successfully!",
                            'data'=> $data
                            ]; 
                            
                            return $this->response->setJSON($response);
             }
                 
        }
}

//check old password
    public function old_password(){
         helper(['url', 'form']);
        $session= session();
       $id= $session->get('id');
        $request= service('request');
       $password=  $this->request->getVar('oldpassword');
       $old_pass= md5($password);
       $model= new RecruiterModel();
        if($model->check_password($id, $old_pass)) {
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
        
        return $this->response->setJSON($response);
   }  

//   Add manage sub users data

 public function ManageUsers(){
        helper(['url', 'form']);
        $data=[];
       $request= service('request');
       $session= session();
          $inputs = $this->validate([
            'email_id' => ['label' => 'Email', 'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[recruiter_register.email_address]'],
        ]);
        $response = [
            'success' => false,
            'data' => '',
            'msg' => "Email already exit",
        ];
        
         if ($inputs) {
       if($this->request->getMethod()== 'post'){
         $currentTime= date("y-m-d H:i:s");
         if(!empty($this->request->getvar('service_resume'))){
            $service_resume=$this->request->getvar('service_resume');
        }else{
            $service_resume=0;
        }
         if(!empty($this->request->getvar('service_whatsapp'))){
            $service_whatsapp=$this->request->getvar('service_whatsapp');
        }else{
            $service_whatsapp=0;
        }
         if(!empty($this->request->getvar('service_email'))){
            $service_email=$this->request->getvar('service_email');
        }else{
            $service_email=0;
        }
         if(!empty($this->request->getvar('service_sms'))){
            $service_sms=$this->request->getvar('service_sms');
        }else{
            $service_sms=0;
        }
        
         $data=[
             'client_first_name'=> $this->request->getVar('first_name'),
             'client_last_name'=> $this->request->getVar('last_name'),
             'email_address'=>$this->request->getVar('email_id'),
             'designation'=>$this->request->getVar('designation'),
             'status'=>$this->request->getVar('status'),
             'service_resume'=>$service_resume,
             'service_whatsapp'=>$service_whatsapp,
             'service_email'=>$service_email,
             'service_sms'=>$service_sms,
             'contact_no'=>$this->request->getvar('contact_no'),
             'password'=>md5(trim($this->request->getvar('password'))),
             'role'=>'editor',
             'parent_id'=>session()->get('id'),
             'created_at'=>$currentTime
         ];
                $message='Thanks your account created successfuly.You have been added as a sub user for '; 
                 $message.='<b></a></b>'.$data['client_first_name']."\r\n";
                 $message.= 'to manage their portal <br>';
                  $message.='Activate Now</a><br>Thanks<br>Tearm:';
                $email = \Config\Services::email();                         
                $email->setFrom('docladder@vertosys.com');
                $email->setTo($data['email_address'], $data['client_first_name']);
                $email->setSubject('Docladder');
                $email->setMessage($message);             
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
                 
         $model= new RecruiterModel();
        $userdata= $model->insertsubusers($data);
       
          $res=[];
           $response = [
                'success' => true,
                'data' => $userdata,
                'msg' => "Manage User successfully uploaded"
            ];
    //  return $this->response->setJSON($response);
     }
         }
          
           echo json_encode($response);
     }
     // get sub users by ajex
     public function GetManageUsers(){
         $data=[];
        $db      = \Config\Database::connect();
       $request= service('request');
       $session= session();
        $session_id= $session->get('id');
        $id= $_POST['id'];
        $model= new RecruiterModel();
        $model->where(['parent_id'=> $session_id, 'id'=> $id]);
        $data['manage']=$model->get()->getRowArray();
        echo json_encode($data);
 }
 // Update manage users
 public function UpdateManageUsers(){
   
      $request= service('request');
       $session= session();
        $parent_id= $session->get('id');
        $id= $_POST['id'];
        $model= new RecruiterModel();
        $model->where(['parent_id'=> $parent_id, 'id'=> $id]);
        $getpassword=$model->get()->getRowArray();
        if(!empty($getpassword)){
        if(empty($this->request->getvar('password'))){
            $password= $getpassword['password'];
        }else{
            $password=md5($this->request->getvar('password'));
        }
        }
        
        $currentTime= date("y-m-d H:i:s");
        if(!empty($this->request->getvar('service_resume'))){
            $service_resume=$this->request->getvar('service_resume');
        }else{
            $service_resume=0;
        }
         if(!empty($this->request->getvar('service_whatsapp'))){
            $service_whatsapp=$this->request->getvar('service_whatsapp');
        }else{
            $service_whatsapp=0;
        }
         if(!empty($this->request->getvar('service_email'))){
            $service_email=$this->request->getvar('service_email');
        }else{
            $service_email=0;
        }
         if(!empty($this->request->getvar('service_sms'))){
            $service_sms=$this->request->getvar('service_sms');
        }else{
            $service_sms=0;
        }
    
     $data=[
             'client_first_name'=> $this->request->getVar('first_name'),
             'client_last_name'=> $this->request->getVar('last_name'),
             'email_address'=>$this->request->getVar('email_id'),
             'designation'=>$this->request->getVar('designation'),
             'status'=>$this->request->getVar('status'),
             'service_resume'=>$service_resume,
             'service_whatsapp'=>$service_whatsapp,
             'service_email'=>$service_email,
             'service_sms'=>$service_sms,
             'contact_no'=>$this->request->getvar('contact_no'),
             'password'=>$password,
             'created_at'=>$currentTime
         ];
         $model= new RecruiterModel();
         $userdata= $model->Updatesubuser($id,$parent_id,$data);
        $res=[];
        if($userdata){
            $res= 'successfuly update';
        }else{
           $res= 'failed data'; 
        }
        
      echo json_encode($res);
        
 }
 // delete data
  public function DeleteManagedata(){
        $session= session();
        $session_id= $session->get('id');
        $id= $_POST['id'];
        $model= new RecruiterModel();
                $model->where(['parent_id'=> $session_id, 'id'=> $id]);
                $del= $model->delete();
                echo json_encode($del);  
        }
// check email from database
 function check_email_avalibility()  
      {  
          $response=[];
          $session_id=session()->get('id');
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                 $response = [
                'success' => false,
                'msg' => " Invalid Email"
            ];
               
           }  
           else  
           {  
                $model= new RecruiterModel();
                if($model->is_email_available($_POST["email"]))  
                {  
                    $response = [
                'success' => false,
                'msg' => " Email Already register"
                ];
                   }  
                else  
                {  
                   $response = [
                'success' => true,
                'msg' => "Email Available"
                ];
                }  
           }
           
           return $this->response->setJSON($response);
      }
        
        
}