<?php
namespace App\Controllers;
use App\Models\CitiesModel;
use App\Models\StateModel;
use App\Models\RecruiterModel;
use App\Models\JobSeekerModel;
use App\Models\JobPostingModel;
class AjexCallback extends BaseController
{
    //get location
    public function getlocation(){
        $db = \Config\Database::connect();
        if (isset($_POST['search'])) {
          $cname= $_POST['search'];
          $model = $db->table('cities');
          $model->orLike('name', $cname,'after');
          $model->orderBy('name ASC');
          $model->groupBy('name');
          $result = $model->get()->getResultArray();
          $arr_result=[];
           // get state
            foreach($result as $key=> $value){
            $state= $db->table('states');
            $state->where('id', $value['state_id']); 
           $getstate = $state->get()->getResultArray(); 
         foreach($getstate as $value){
         $state_name= $value['name'];    
         }
         $result[$key]['state']=$state_name;
      }
      
      if (count($result) > 0) {
        foreach($result as $val){
       $arr_result[] = array(
          'label' => $val['name'].','.$val['state']
       );
      }
          }
          echo json_encode($arr_result);  
      } 
    }

    //get cities
    public function getcities(){
        $data=[];
        $request = \Config\Services::request();
        $db      = \Config\Database::connect();
        $name= $this->request->getVar('state');

        $model= New CitiesModel();
        $model->where('state_id', $name);
        $skills= $model->get()->getResultArray();
        $res=[];
        if(!empty($skills)){
            $res= $skills;
        }else{
            $res= true;
        }
        echo json_encode($res);

    }
    // forgot password check the email is valid or not 
    
    //check the email and validation 
    public function check_email(){
        $request = service('request');
        $email=  $this->request->getVar('email');
         $token = md5($email).rand(10,9999);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           echo "<label class= 'text-danger'><span>Invalid email</span></lable>";
       }else{
           $session_id= session()->get('id');
           $model= new RecruiterModel(); 
            $user = $model->where(['email_address'=> $email, 'id'=>$session_id])->first();
           $url= '<?php echo base_url();?>';
            if($user){
                 
                $mail_message = 'Dear ' . $user['client_first_name'] . ',' . "<br>\r\n";
                $mail_message .= 'Thanks for contacting regarding to forgot password,<br> Click On Link And Reset Password:<b></a></b>'.anchor('updatepassword/'.$token,'Reset Password','')."\r\n";
                $mail_message .= '<br>Please Update your password.';
                $mail_message .= '<br>Thanks & Regards';
                $email = \Config\Services::email();                         
                $email->setFrom('docladder@vertosys.com');
                $email->setTo($user['email_address'], $user['client_first_name']);
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
                    $data=[];
                    $data=[
                        'uid'=>$token
                        ];
                    $model= new RecruiterModel();
                     $model->Updatetoken($data,$user['email_address'], $session_id);   
                  $msg= "<label class= 'text-success'><span> An Email with instructions on how to reset your password has been sent to</span></lable>";
                  $msg.= "&nbsp";
                  $msg.= "<b>".$user['email_address']."</b>";
                  
              $response=[];
                  $response = [
                'success' => true,
                'msg' => $msg
            ];
         return $this->response->setJSON($response);
            }else{
               $msg= "<label class= 'text-danger'><span>Email Invalid</span></lable>";
                 $response=[];
                 $response = [
                'success' => false,
                'msg' => $msg
            ];
            return $this->response->setJSON($response);
            }    
       }          
    }
    
    public function updatepassword(){
         helper(['url', 'form']);
            $data=[];
              $uri = service('uri');
           $token= $uri->getSegment(2);
             $request= service('request');
             if($this->request->getMethod()== 'post'){
                $model= new RecruiterModel();
                if($model->check_token($token)) {
                  $data=[
                    'password'=>md5($this->request->getVar('password'))
                  ];      
                    $model->UpdatePasswordbytoken($data, $token); 
                     return redirect()->to(base_url('profile'));
                   
                }else{
                    echo 'Unable to find user account.';
                }     
             }
        return view('forget-password');
    }
    
    // jobseeker forget password
     public function checkemail(){
        $request = service('request');
        $email=  $this->request->getVar('email');
         $token = md5($email).rand(10,9999);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           echo "<label class= 'text-danger'><span>Invalid email</span></lable>";
       }else{
           $session_id= session()->get('id'); 
           $model= new JobSeekerModel(); 
            $user = $model->where(['email_id'=>$email, 'id'=>$session_id])->first();
           $url= '<?php echo base_url();?>';
            if($user){
                 
                $mail_message = 'Dear ' . $user['first_name'] . ',' . "<br>\r\n";
                $mail_message .= 'Thanks for contacting regarding to forgot password,<br> Click On Link And Reset Password:<b></a></b>'.anchor('forgetpassword/'.$token,'Reset Password','')."\r\n";
                $mail_message .= '<br>Please Update your password.';
                $mail_message .= '<br>Thanks & Regards';
                $email = \Config\Services::email();                         
                $email->setFrom('docladder@vertosys.com');
                $email->setTo($user['email_id'], $user['first_name']);
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
                    $data=[];
                    $data=[
                        'uid'=>$token
                        ];
                       
                    $model= new JobSeekerModel();
                     $model->Updatetoken($data,$user['email_id'], $session_id);   
                  $msg= "<label class= 'text-success'><span>An Email with instructions on how to reset your password has been sent to</span></lable>";
                  $msg.= "&nbsp";
                  $msg.= "<b>" .$user['email_id']." </b>";
                //   return false;
                  $response=[];
                  $response = [
                'success' => true,
                'msg' => $msg
            ];
         return $this->response->setJSON($response);
            }else{
               $msg= "<label class= 'text-danger'><span>Email Invalid</span></lable>";
                 $response=[];
                 $response = [
                'success' => false,
                'msg' => $msg
            ];
            return $this->response->setJSON($response);
            }
       }          
    }
    
    // change the password 
    public function forgetpassword(){
         helper(['url', 'form']);
            $data=[];
              $uri = service('uri');
           $token= $uri->getSegment(2);
             $request= service('request');
             if($this->request->getMethod()== 'post'){
                $model= new JobSeekerModel();
                if($model->check_token($token)) {
                  $data=[
                    'password'=>md5($this->request->getVar('password'))
                  ];      
                    $model->UpdatePasswordbytoken($data, $token); 
                     return redirect()->to(base_url('Jobseeker'));
                   
                }else{
                    echo 'Unable to find user account.';
                }     
             }
        return view('job-seeker-forgetpassword');
    }
    // get all city
    public function getAllCity(){
   $db = \Config\Database::connect();
        if (isset($_REQUEST['search'])) {
          $cname= $_REQUEST['search'];
          $model = $db->table('cities');
          $model->orLike('name', $cname,'after');
          $model->orderBy('name ASC');
          $model->groupBy('name');
          $result = $model->get()->getResultArray();
          $arr_result=[];
           // get state
            foreach($result as $key=> $value){
            $state= $db->table('states');
            $state->where('id', $value['state_id']); 
           $getstate = $state->get()->getResultArray(); 
         foreach($getstate as $value){
         $state_name= $value['name'];    
         }
         $result[$key]['state']=$state_name;
      }
      
      if (count($result) > 0) {
        foreach($result as $val){
       $arr_result[] = array(
          'label' => $val['name'].','.$val['state']
       );
      }
          }
          echo json_encode($arr_result);  
      }  
}
//seeker applied to all jobs 


public function appliedjobs(){
   $data=[];
$db = \Config\Database::connect();
$session_id= session()->get('id');
    $jobpost=  new JobPostingModel();
    $jobpost->join('applied_jobs', 'applied_jobs.jobposting_id = jobposting.id');
    $jobpost->where('applied_jobs.session_id', $session_id);
    $jobpost->orderBy('applied_jobs.id', 'DESC');
$data = [
        'jobposting' => $jobpost->paginate(10),
        'pager' => $jobpost->pager,
        'currentPage' => $jobpost->currentPage,
        ];
        
  if(!empty($data['jobposting'])){
    foreach($data['jobposting'] as $key=> $val){
    $special = $db->table('skills');
    $special->where(['designation_id'=> $val['job_function'], 'id'=>$val['specialization']]);
    $special= $special->get()->getRowArray();
    $data['jobposting'][$key]['skills']=$special['skills'];
    }
    }          

 return view('jobseeker-applied-jobs', $data);   
}

 
}
      
    