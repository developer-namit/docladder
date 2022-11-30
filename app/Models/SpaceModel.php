<?php
namespace App\Models;
use CodeIgniter\Model;
class SpaceModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'space_equipment';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['session_id','file_image','file_video','product_name','product_price','state','city','product_description','year_of_manufacturing','area_sq_ft','concerned_person_name','contact','e-mail_address','offer_price','created_at'];

	function Updatspace($id,$session_id,$data){
		$this->db->table('space_equipment')->where(['id'=> $id,'session_id'=>$session_id])->update($data);
		}	

}