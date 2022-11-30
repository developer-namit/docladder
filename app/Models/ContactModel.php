<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'contact_us';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['name','email_id','message','contact_no'];
	
	
public function newsletter($data){
	$this->db->table("newsletter")->insert($data);
}

 function check_newsletter($email){
     return $this->db->table('newsletter')->getWhere(['email_id'=> $email])->getRowArray(); 
    }
}