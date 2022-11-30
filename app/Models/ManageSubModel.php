<?php

namespace App\Models;

use CodeIgniter\Model;

class ManageSubModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'manage_subuser';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['session_id','first_name','last_name','designation','email_id','contact_no','status','service_resume','service_whatsapp','service_email','service_sms','password','created_at'];
	
	
}