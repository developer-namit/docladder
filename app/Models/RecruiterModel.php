<?php
namespace App\Models;
use CodeIgniter\Model;
use App\Models\CitiesModel;
class RecruiterModel extends Model
{
    protected $table      = 'recruiter_register';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['client_type',
    'client_first_name',
    'contact_person_name',
    'State',
    'City',
    'pincode',
    'website_address',
    'contact_no',
    'alternate_no',
    'designation',
    'email_address',
    'password',
    'role',
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

    // CHECK
    function isAlreadyRegister($authid){	
	return $this->db->table('recruiter_register')->getWhere(['oauth_id'=>$authid])->getRowArray();
	}

    //UPDATE
    function updateuserdata($userdata, $authid){
	$this->db->table('recruiter_register')->where(['oauth_id'=> $authid])->update($userdata);
	}
	
	function insertuserdata($userdata){
	$this->db->table("recruiter_register")->insert($userdata);
	}    
        
        
//change the password recruiter
    function ChangePassword($password, $id){
            $this->db->table('recruiter_register')->where(['id'=> $id])->update($password);
          }

          public function jobprofile(){
            $user=[];
            $session= session();
            $id= $session->get('id');
            $db = \Config\Database::connect();
            $model = $db->table('recruiter_register');
            $model->where('id', $session->get('id'));
            $user = $model->get()->getRowArray();
           if(!empty($user)){
            $city_id= $user['City'];
            if($city_id >0){
              $city= new CitiesModel();
              $city->where('id', $city_id);
              $getcity= $city->get()->getRowArray();
               $user['city_name']= $getcity['name'];   
          }else{
            $user['city_name']= 0;
          }    
}   
            return !empty($user)? $user: false;
        }
        
         function updatejobprofile($data, $id){
        $this->db->table('recruiter_register')->where(['id'=> $id])->update($data);
        }
        
        
          function Updatetoken($data, $email, $session_id){
        $this->db->table('recruiter_register')->where(['email_address'=>$email, 'id'=> $session_id])->update($data);
        }
        
      public function check_token($token){
    return $this->db->table('recruiter_register')->getWhere(['uid'=>$token])->getRowArray();  
  }
  
  public function UpdatePassword($password, $token){
      $this->db->table('recruiter_register')->where(['uid'=> $token])->update($password);
    } 
    
	public function UpdatePasswordbytoken($data, $token){
        $this->db->table('recruiter_register')->where(['uid'=> $token])->update($data);
        }
        
        public function check_password($id, $password){
    return $this->db->table('recruiter_register')->getWhere(['id'=> $id, 'password'=> $password])->getRowArray();  
  } 
  
  // subuserdata 
  function insertsubusers($data){
	$this->db->table("recruiter_register")->insert($data);
	} 
    //update sub user data
    public function Updatesubuser($id,$parent_id,$data){
    $this->db->table('recruiter_register')->where(['id'=> $id, 'parent_id'=> $parent_id])->update($data);
    }
    
    public function is_email_available($email){
       return $this->db->table('recruiter_register')->getWhere(['email_address'=>$email])->getRowArray();  
    }
        
}
	



?>