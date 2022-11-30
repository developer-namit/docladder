<?php

namespace App\Models;

use CodeIgniter\Model;

class SearchModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'designation';
	protected $primaryKey           = 'designation_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['designation'];
	
	

}
