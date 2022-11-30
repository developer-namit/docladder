<?php
namespace App\Models;
use CodeIgniter\Model;
class SpaceImgModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'jobseeker_space_images';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['session_id','space_id','images','images_type'];
	


}