<?php

namespace App\Models;

use CodeIgniter\Model;

class CitiesModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cities';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['name','state_id'];
	
	
 function isAlreadycities($id){	
	return $this->db->table('other_cities')->getWhere(['session_id'=>$id])->getRowArray();
	}	
	
	
function updatecities($id,$getdata){
	$this->db->table('other_cities')->where(['session_id'=> $id])->update($getdata);
	}

function insertcities($getdata){
  $this->db->table('other_cities')->insert($getdata);  
}
    
    
// current location
function isAlreadycurrent($id){	
	return $this->db->table('other_states')->getWhere(['session_id'=>$id])->getRowArray();
	}	
	
	
function updatestates($id,$locate){
	$this->db->table('other_states')->where(['session_id'=> $id])->update($locate);
	}

function insertstates($locate){
  $this->db->table('other_states')->insert($locate);  
}
    
    
}
