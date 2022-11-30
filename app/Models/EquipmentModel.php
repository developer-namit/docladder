<?php
namespace App\Models;
use CodeIgniter\Model;
class EquipmentModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'recruiter_equipment';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['session_id','file_image','file_video','product_name','product_price','state','city','product_description','year_of_manufacturing','contact_details','concerned_person_name','contact','e-mail_address','country','sku','product_brand','created_at'];


	function Updatdata($id,$session_id,$data){
		$this->db->table('recruiter_equipment')->where(['id'=> $id,'session_id'=>$session_id])->update($data);
		}
	

}
