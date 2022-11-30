<?php
namespace App\Models;
use CodeIgniter\Model;
class TransactionModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'recruiter_payment';
	protected $primaryKey           = 'pay_id ';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['session_id','username','razorpay_payment_id','year','email','resume','posting','created_at'];
	
	

}