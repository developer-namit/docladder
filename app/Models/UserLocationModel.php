<?php

namespace App\Models;

use CodeIgniter\Model;

class UserLocationModel extends Model
{

	protected $table                = 'user_location';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $returnType           = 'array';
	protected $allowedFields        = [
                                	    "user_id",
                                        "main_id",
                                        "name",
                                        "other",
                                        "location_type",
                                        "requst_type",
                                        "page_type",
									 ];
	
	
	
	function insert_data($data){
        $this->db->table("user_location")->insert($data);
    }
    
}
