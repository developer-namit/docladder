<?php
namespace App\Controllers;
use App\Models\JobPostingModel;
use App\Models\SearchModel;
use App\Models\CitiesModel;
use App\Models\StateModel;
use App\Models\JobSeekerModel;
use App\Models\JobseekerSearchModel;
class RecruiterSearch extends BaseController
{
public function index()
    {
             $data=[];
            helper(['url', 'form']);
            $db = \Config\Database::connect();
            $request = service('request'); 
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
      return view('job-seeker-search-recruiter', $data);
}

    // views details 
    public function jobdescription(){
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
            'jobdescription'=>'Job Description'


        ];
        $uri = service('uri');
        $id=$this->request->uri->getSegment(2);
        $data['searchsimilar']= $this->searchsimilar($id);
        $model= new JobPostingModel();
       $model->orderBy('created_at', 'DESC');
       $data['getuser']= $model->first();
       if(!empty($data['getuser'])){
        
            //maximum experience       
            if($data['getuser']['max_experience']== 1){
                $data['getuser']['maxexp']='9 Months'; 
            }
            if($data['getuser']['max_experience']== 2){
                $data['getuser']['maxexp']='1 Year'; 
            }
            if($data['getuser']['max_experience']== 3){
                $data['getuser']['maxexp']='2 Years'; 
            }
            if($data['getuser']['max_experience']== 4){
                $data['getuser']['maxexp']='5 Years'; 
            }

            //minimum experience
            if($data['getuser']['min_experience']== 0){
                $data['getuser']['minexp']='0'; 
            }
            if($data['getuser']['min_experience']== 1){
                $data['getuser']['minexp']='9 Months'; 
            }
            if($data['getuser']['min_experience']== 2){
                $data['getuser']['minexp']='1 Years'; 
            }
            if($data['getuser']['min_experience']== 3){
                $data['getuser']['minexp']='2 Years'; 
            }
            if($data['getuser']['min_experience']== 4){
                $data['getuser']['minexp']='5 Years'; 
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
    }
    

        return view('job-description', $data);
}

public function searchsimilar($id){
    $model= new JobPostingModel();
    $model->where('id', $id);
    $getuser= $model->get()->getRowArray();
    if(!empty($getuser)){
    $db      = \Config\Database::connect();
    $builder = $db->table('jobposting');
    $builder->where(['job_function'=> $getuser['job_function'], 'specialization'=>$getuser['specialization'], 'status'=>0]);
    $data= $builder->get()->getResultArray();
}
return $data;
}

// apply jobs
public function applyJobs(){
    $response=[];
    $id= $_POST['id'];
    $model= new JobPostingModel();
    $model->where('id', $id);
    $applyjob= $model->get()->getRowArray();
    // get user data
    $session_id= session()->get('id');
    $builder=  new JobSeekerModel();
    $builder->where('id', $session_id);
    $user= $builder->get()->getRowArray();
    // send a mail recruiter admin
                $message = '<h1></h1>' . $applyjob['job_title'] . ',' . "<br>\r\n";
                $message.='<html>
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
                    $message.='<td>'.$applyjob['job_title'].'</td>';
                    $message.='<td>'.$applyjob['max_exp'].'</td>';
                    $message.='<td>'.$applyjob['max_salary'].'</td>';
                    $message.='<td>'.$applyjob['location'].'
                    </tr>
                  </table>
                </body>
                </html>
                ';
                $email = \Config\Services::email();                         
                $email->setFrom('docladder@vertosys.com');
                $email->setTo($user['email_id'], $user['first_name']);
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



    echo json_encode($response);
}
 

// get searching data 
public function getcities(){
    $data=[];
    $model= new JobseekerSearchModel();
    $db = \Config\Database::connect();
    $hospital= $this->request->getvar('job_title');
    $location=  $this->request->getvar('location');
    if(!empty($this->request->getvar('designation'))){
      $designation=  $this->request->getvar('designation');   
    }else{
        $designation= '';  
    }
   
    $specialization=  $this->request->getvar('specialization');
    $data=[
        'hospital'=>$hospital,
        'location'=>$location,
        'designation'=>$designation,
        'specialization'=>$specialization
        ];
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
            
    return view('recruiter-searching', $data);

}

}
      
    