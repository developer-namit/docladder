<?php
namespace App\Models;
use CodeIgniter\Model;
class SignupModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'signup';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['oauth_id','first_name','last_name','email_id','contact_no','state','city','dob','gender','password','uid','role','upload_resume','updated_at','created_at'];



 // CHECK Auith ID
    function isAlreadyJobRegister($authid){	
	return $this->db->table('signup')->getWhere(['oauth_id'=>$authid])->getRowArray();
	}

    //UPDATE auth id
    function updateJobSeeking($userdata, $authid){
	$this->db->table('signup')->where(['oauth_id'=> $authid])->update($userdata);
	}
	// Save auth id
	function insertJobSeeking($userdata){
	$this->db->table("signup")->insert($userdata);
	}  
    // update profile data
    public function updateprofiledata($id, $data){
        $this->db->table('signup')->where(['id'=> $id])->update($data);
	} 
    // upload resume
    public function Updateimage($id, $data){
        $this->db->table('signup')->where(['id'=> $id])->update($data);

    }


}