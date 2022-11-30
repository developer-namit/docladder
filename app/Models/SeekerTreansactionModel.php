<?php
namespace App\Models;
use CodeIgniter\Model;
class SeekerTreansactionModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'jobseeker_payment';
	protected $primaryKey           = 'id ';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['session_id','razorpay_payment_id','username','amount','created_at'];
	
	

}