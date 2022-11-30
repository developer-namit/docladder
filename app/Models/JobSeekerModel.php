<?php
namespace App\Models;
use CodeIgniter\Model;
class JobSeekerModel extends Model
{
    protected $table      = 'jobseeker_register';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['first_name',
    'email_id',
    'contact_no',
    'state',
    'city',
    'dob',
    'gender',
    'password',
    'role',
    'upload_resume',
    'job_title',
    'key_skills',
    'job_function',
    'specialization',
    'min_experience',
    'max_experience',
    'current_employer',
    'current_designation',
    'current_ctc',
    'expected_ctc',
    'highest_qualification',
    'graduation',
    'institute',
    'year_of_passing',
    'post_graducation',
    'post_institute',
    'post_passing_year',
    'super_specialty',
    'specialty_institute',
    'specialty_passing_year',
    'maximum_experience',
    'upload_image',
    'created_at'
    ];  
    protected function beforeInsert(array $data)
	{
		$data = $this->passwordHash($data);
		return $data;
	}

	protected function passwordHash(array $data)
	{
		if (isset($data['data']['password'])) {
			$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		}
		return $data;
	}

    // CHECK Auith ID
    function isAlreadyJobRegister($authid){	
	return $this->db->table('jobseeker_register')->getWhere(['oauth_id'=>$authid])->getRowArray();
	}

    //UPDATE auth id
    function updateJobSeeking($userdata, $authid){
	$this->db->table('jobseeker_register')->where(['oauth_id'=> $authid])->update($userdata);
	}
	// Save auth id
	function insertJobSeeking($userdata){
	$this->db->table("jobseeker_register")->insert($userdata);
	}  
    // update profile data
    public function updateprofiledata($id, $data){
        $this->db->table('jobseeker_register')->where(['id'=> $id])->update($data);
	} 
    // upload resume
    public function Updateimage($id, $data){
        $this->db->table('jobseeker_register')->where(['id'=> $id])->update($data);

    }
    
    // check password
    
   public function checkpassword($id, $password){
    return $this->db->table('jobseeker_register')->getWhere(['id'=> $id, 'password'=> $password])->getRowArray();
  } 

    // update password
    
     public function Updatepassword($id, $data){
        $this->db->table('jobseeker_register')->where(['id'=> $id])->update($data);

    }
    
    // update token
       function Updatetoken($data, $email, $session_id){
        $this->db->table('jobseeker_register')->where(['id'=>$session_id ,'email_id'=>$email])->update($data);
        }
        
    // check token
    public function check_token($token){
    return $this->db->table('jobseeker_register')->getWhere(['uid'=>$token])->getRowArray();  
  }
  
  public function UpdatePasswordbytoken($data, $token){
        $this->db->table('jobseeker_register')->where(['uid'=> $token])->update($data);
        }
}