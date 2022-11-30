<?php
namespace App\Controllers;
use App\Models\JobPostingModel;
use App\Models\SearchModel;
use App\Models\JobSeekerModel;
use App\Models\RecruiterModel;
class JobSeekerSearch extends BaseController
{
    public function index()
    {
    $data=[];
    helper(['url', 'form']);
    $request = service('request');
     $db = \Config\Database::connect();
     $model= new JobPostingModel();
     $model->where('status',0);
     $model->orderBy('created_at', 'DESC');
     $data = [
        'jobposting' => $model->paginate(10),
        'pager' => $model->pager,
        'currentPage' => $model->currentPage,
        ]; 
        if(!empty($data['jobposting'])){
            foreach($data['jobposting'] as $key=> $val) {
                //maximum experience
                if(!empty($val['min_experience']==0)){
                $data['jobposting'][$key]['minexp']= 'Fresher';  
                }else if(!empty($data['min_experience']==1)){
                $data['jobposting'][$key]['minexp']= $val['min_experience'].'Year';    
                }else if(!empty($data['min_experience'])){
                $data['jobposting'][$key]['minexp']=$val['min_experience'].'Years';  
                }else{
                  $data['jobposting'][$key]['minexp']= 'Fresher';   
                }
                
                
                if(!empty($val['max_experience']==1)){
                 $data['jobposting'][$key]['maxexp']= $val['max_experience'].'Year';  
                }else if(!empty($data['max_experience'])){
                $data['jobposting'][$key]['maxexp']= $val['max_experience'].'Year';    
                }else{
                  $data['jobposting'][$key]['maxexp']= 'Fresher';   
                }

               
                 //designation     
                $search= New SearchModel();
                 $designation= $search->get()->getResultArray();
                    if(!empty($designation)){
                        foreach($designation as $sk){
                    if($val['job_function']==$sk['designation_id']){
                        $data['jobposting'][$key]['skills_name']= $sk['designation']; 
                    }
                        }
                    }
                 // graduation 
                 $studyupdate= $model->education();
                 foreach($studyupdate['education'] as $keys=> $edu){
                    if($keys== $val['graduation']){
                        $data['jobposting'][$key]['education_name']= $edu; 
                    }        
                }
                foreach($studyupdate['postgarduate'] as $keys=> $postedu){
                   if($keys== $val['post_graducation']){
                    $data['jobposting'][$key]['posteducation_name']= $postedu;
                   }
                }
                // specialty
                foreach($studyupdate['specialty'] as $keys=> $special){
                if($keys== $val['super_specialty']){
                    $data['jobposting'][$key]['specialty_name']= $special;
                }
            }

                $spacial = $db->table('skills');
                $spacial->where(['designation_id'=> $val['job_function'],'id'=> $val['specialization']]);
                $sk= $spacial->get()->getResultArray();
                foreach($sk as $value){
                    $data['jobposting'][$key]['skill']= $value['skills'];
                }
  }
     } 
     
      return view('job-seeker-searching', $data);
    }

    // views details job description
    
    public function jobdescription(){
        $db      = \Config\Database::connect();
        $data=[];
        $data=[
            'heading'=>'Job Description',
            'month'=>'2W ago',
            'Offered_Salary'=>'Offered Salary',
            'gender'=>'Gender',
            'career_level'=>'Career Level',
            'industry'=>'Industry',
            'Experience'=>'Experience',
            'qualification'=>'Qualification',
            'jobdescription'=>'Job Description',
            'knowledge'=>'Required Knowledge, Skills, and Abilities',
            'education'=>'Education + Experience',
            'button'=>'Applied',
            'buttonfor'=>'Apply for job',
            'similar'=>'Similar Jobs',
            'maxexp'=>'Max.Experience'
        ];
        $uri = service('uri');
        $id=$this->request->uri->getSegment(2);
        $data['searchsimilar']= $this->searchsimilar($id);
        $model= new JobPostingModel();
        $model->where('id', $id);
        $model->orderBy('created_at', 'DESC');
       $data['getuser']= $model->first();
       if(!empty($data['getuser'])){
         if(!empty($data['getuser']['min_experience']==0)){
                $data['getuser']['minexp']= 'Fresher';  
                }else if(!empty($data['getuser']['min_experience']==1)){
                $data['getuser']['minexp']= $data['getuser']['min_experience'].'Year';    
                }else if(!empty($data['getuser']['max_experience'])){
                $data['getuser']['minexp']=$data['getuser']['min_experience'].'Years';  
                }
                
                
                 if(!empty($data['getuser']['max_experience']==0)){
                $data['getuser']['maxexp']= 'Fresher';    
                }else if(!empty($data['getuser']['max_experience']==1)){
                $data['getuser']['maxexp']= $data['getuser']['max_experience'].'Year'; 
                }else if(!empty($data['getuser']['min_experience'])){
                $data['getuser']['maxexp']=$data['getuser']['max_experience'].'Years';  
                }
                
     
             //designation     
            $search= New SearchModel();
             $designation= $search->get()->getResultArray();
                if(!empty($designation)){
                    foreach($designation as $sk){
                if($data['getuser']['job_function']==$sk['designation_id']){
                    $data['getuser']['skills_name']= $sk['designation']; 
                }
                    }
                }
             // graduation 
             $studyupdate= $model->education();
             foreach($studyupdate['education'] as $keys=> $edu){
                if($keys== $data['getuser']['graduation']){
                    $data['getuser']['education_name']= $edu; 
                }        
            }
            foreach($studyupdate['postgarduate'] as $keys=> $postedu){
               if($keys== $data['getuser']['post_graducation']){
                $data['getuser']['posteducation_name']= $postedu;
               }
            }
            // specialty
            foreach($studyupdate['specialty'] as $keys=> $special){
            if($keys== $data['getuser']['super_specialty']){
                $data['getuser']['specialty_name']= $special;
            }
        }
        
        // status
         // status 
            $session_id= session()->get('id');
            $builder = $db->table('applied_jobs')->select('*');
            $builder->where(['jobposting_id'=>$id, 'session_id'=>$session_id]);
            $jobs= $builder->get()->getRowArray();
            if(!empty($jobs)){
            $data['getuser']['jobs_status']= $jobs['status'];
            }else{
              $data['getuser']['jobs_status']=0;  
            }
    }
    //total dates
        $date1 =   date("y-m-d H:i:s");
        $date2 = $data['getuser']['created_at'];
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
           $data['getuser']['totaldays']=$year;   
            }else{
              $data['getuser']['totaldays']= 'One Day'; 
            }
        // end foreach data  

  return view('job-description', $data);
    }

public function searchsimilar($id){
    $model= new JobPostingModel();
     $db      = \Config\Database::connect();
    $model->where('id', $id);
    $getuser= $model->get()->getRowArray();
    if(!empty($getuser)){
   
    $builder = $db->table('jobposting');
    $builder->where(['job_function'=> $getuser['job_function'], 'specialization'=>$getuser['specialization'], 'status'=>0]);
     $builder->orderBy('job_title', 'DESC');
    $searching= $builder->get()->getResultArray();
    if(!empty($searching)){
    foreach($searching as $key => $value){
      $spacial = $db->table('skills');
      $spacial->where(['designation_id'=> $value['job_function'],'id'=> $value['specialization']]);
        $sk= $spacial->get()->getResultArray();
        foreach($sk as $val){
           $searching[$key]['skill']= $val['skills'];
        }
    }
}

}
return $searching;
}

// apply jobs
public function applyJobs(){
   
    $id= $_POST['id'];
    $model= new JobPostingModel();
    $model->where('id', $id);
    $applyjob= $model->get()->getRowArray();
    if(!empty($applyjob)){
    if(!empty($applyjob['max_experience'])){
            $applyjob['maxexp']=$applyjob['max_experience']; 
        }else{
            $applyjob['maxexp']='0';
        }
        
    }

// get email id from recruiter register
$getemail= new RecruiterModel();
$jobdata=$getemail->where('id', $applyjob['session_id'])->first();
if(!empty($jobdata)){
   $applyjob['recruiter_mail']= $jobdata['email_address']; 
}else{
   $applyjob['recruiter_mail']='shilpa.dhiman762@gmail.com'; 
}

    // get user data
    $session_id= session()->get('id');
    $builder=  new JobSeekerModel();
    $builder->where('id', $session_id);
    $user= $builder->get()->getRowArray();
    // send a mail recruiter admin
                $mail_message='<html>
                <head>
                  <title>Apply Job Posting</title>
                </head>
                <body>
                   <table style="border-bottom: 1px solid #ddd;">
                    <tr>
                      <th>Job Category</th>
                      <th>Experience</th>
                      <th>Salary</th>
                      <th>Location</th>
                    </tr>
                    <tr>';
                    $mail_message.='<td>'.$applyjob['job_title'].'</td>';
                    $mail_message.='<td>'.$applyjob['maxexp'].'Year'. '</td>';
                    $mail_message.='<td>'.$applyjob['max_salary'].'</td>';
                    $mail_message.='<td>'.$applyjob['location'].'
                    </tr>
                  </table>
                </body>
                </html>
                ';
                $mail_message .= '<br>Thanks & Regards';
                $email = \Config\Services::email();                         
                $email->setFrom($user['email_id'], $user['first_name']);
                $email->setTo($applyjob['recruiter_mail']);
                $email->setSubject('Docladder');
                $email->setMessage($mail_message);             
                $email->send();
                if ($email->send()) 
                {
                $emaidata= 'Email successfully sent';
                } 
                else 
                {
                $emaidata = $email->printDebugger(['headers']);
                 //print_r($emaildata);
                 }
                 $data=[];
                 $data=[
                     'jobposting_id'=> $id,
                     'session_id'=>$session_id,
                     'status'=>1
                     ];
             $model= new JobPostingModel();
             
             if($model->check_jobs($id, $session_id)){
                 $applyjob=  $model->check_Update($id, $session_id, $data);
             }else{
            $applyjob=  $model->appliedjobs($data);
             }
            $res=[];
            if($applyjob){
              $res= false;
            } else {
               $res= true;
            }
            echo json_encode($res);
}
 
}
      
    