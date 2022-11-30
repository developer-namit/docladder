<?php

namespace App\Models;

use CodeIgniter\Model;

class StateModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'states';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['name','location_id'];
	
	

}
