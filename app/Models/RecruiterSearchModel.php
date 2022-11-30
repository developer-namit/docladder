<?php
namespace App\Models;
use CodeIgniter\Model;
class RecruiterSearchModel extends Model
{
    protected $DBGroup              = 'default';
	protected $table                = 'recruiter_searching';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['session_id','key_skills','current_location','preferred_location','minexperience','maxexperience','minsalary','maxsalary','jobfunction','specialization','search','gender','graduate','postgraduate','speciality','created_at'];


    public function fetch_states_by_group($group_id){
        $db      = \Config\Database::connect();
        return $db->query("SELECT * from states Where location_id = '$group_id' ")->getResultArray();
    }
    
    public function fetch_cities_by_state($state_id){
        $db      = \Config\Database::connect();
        return  $db->query("SELECT * from cities Where state_id = '$state_id' ")->getResultArray();
    }
    
    public function fetch_all_location_user_ids(){
        
        $db = \Config\Database::connect();
        
        $locationArr = [];
        $groupStateArr = [];
        $statesArr = [];
        $citiesArr = [];
        $otherArr = [];
        $selected_states = [];
        $currentAllUserIds = [];
        $prefferedAllUserIds = [];
        $all_user_ids = [];
                
        /*
        *  CURRENT LOCATION
        */

        $mainGroupSates = ["NI","EI","WI","SI"];
        if(isset($_GET['state']) && !empty($_GET['state'])){
            foreach($_GET['state'] as $keys => $stateData){
                if(!empty($stateData)){
                    if(in_array($stateData, $mainGroupSates)){
                        $groupStateArr[] = $stateData;
                        
                        // get all group states
                        $AllGroupStates = $this->fetch_states_by_group($stateData);
                        
                        if(!empty($AllGroupStates)){
                            foreach($AllGroupStates as $stateData){
                                $statesArr[] = $stateData['name'];
                                
                                // get all group states cities
                                $cities_data = $this->fetch_cities_by_state($stateData['id']);
                                
                                if(!empty($cities_data)){
                                    foreach($cities_data as $city){
                                        $citiesArr[] = trim($city['name']);
                                    }
                                }
                                
                            }
                        }
                    }else{
                        $explode_data = explode("_",$stateData);
                       
                        if(isset($explode_data[0]) && isset($explode_data[1])){
                             
                          if($explode_data[0] == "city"){
                              
                              $city_data = $db->query("SELECT * from cities Where id = '" . $explode_data[1]. "' ")->getRowArray();
                              if(!empty($city_data)){
                                $citiesArr[] = trim($city_data['name']);
                                
                                 $state_data = $db->query("SELECT * from states Where id = '" . $city_data['state_id']. "' ")->getRowArray();
                                 $statesArr[] = $state_data['name'];
                              }
                              
                               
                          }else if($explode_data[0] == "state"){
                              
                            $selected_states[] = $explode_data[1];
                            
                            $state_data = $db->query("SELECT * from states Where id = '" . $explode_data[1]. "' ")->getRowArray();
                            $other = "";
                            if(isset($_GET['other']['states'][$explode_data[1]]) && !empty($_GET['other']['states'][$explode_data[1]])){
                                $other = $_GET['other']['states'][$explode_data[1]];
                            }
                            
                            $statesArr[] = $state_data['name'];
                            
                            // get all group states cities
                            $cities_data = $this->fetch_cities_by_state($state_data['id']);
                            
                            if(!empty($cities_data)){
                                foreach($cities_data as $city){
                                    $citiesArr[] = trim($city['name']);
                                }
                            }
                            
                            if($other != ''){
                                $otherArr[] = [
                                    'state' => $state_data['id'],
                                    'city' => $other,
                                ];
                            }
                            
                          }
                          
                        } 
                    }
                }
            }
        }
        
        
        
        if(isset($_GET['other']['states']) && !empty($_GET['other']['states'])){
            foreach($_GET['other']['states'] as $stateId => $otherSates){
                // check not empty condition
                if(!empty($otherSates)){
                
                    // Check If state is not selected but select in other state
                    if(!in_array($stateId,$selected_states) || empty($selected_states)){
                        
                        $state_data = $db->query("SELECT * from states Where id = '" . $stateId. "' ")->getRowArray();
                         $otherArr[] = [
                            'state' => $state_data['id'],
                            'city' => $otherSates,
                        ];
                    }
                }
            }
        }
        
        $statesArr = array_unique($statesArr);
        $citiesArr = array_unique($citiesArr);
           
        if(!empty($statesArr) || !empty($citiesArr) || !empty($otherArr)){
            $statesUserIds = [];
            $cityUserIds = [];
            $otherUserIds = [];
            if(!empty($statesArr)){
                $statesUserIds = $db->table('user_location')
                ->select('DISTINCT(user_id)')
    		    ->where(['requst_type' => 'current', 'location_type' => 'state'])
    		    ->whereIn('name', $statesArr)
    		    ->get()->getResultArray();
                
            }
            
            if(!empty($citiesArr)){
                $cityUserIds = $db->table('user_location')
                ->select('DISTINCT(user_id)')
    		    ->where(['requst_type' => 'current', 'location_type' => 'city'])
    		    ->whereIn('name', $citiesArr)
    		    ->get()->getResultArray();
            }
            
            if(!empty($otherArr)){
                foreach($otherArr as $other_data){
                    
                    $otherRes = $db->table('user_location')
                        ->select('DISTINCT(user_id)')
            		    ->where(['requst_type' => 'current', 'main_id' => $other_data['state']])
            		    ->like('other', $other_data['city'])
            		    ->get()->getResultArray();
            		    
            		if(!empty($otherRes)){
            		    foreach($otherRes as $resother){
            		         $otherUserIds[]['user_id'] = $resother['user_id'];
            		    }
            		}
                }
            }
            
            $currentAllUserIds = array_merge($statesUserIds,$cityUserIds,$otherUserIds);
        }
        
        /*
        *  PREFFERED LOCATION
        */
        
        
        $locationArr = [];
        $groupStateArr = [];
        $statesArr = [];
        $citiesArr = [];
        $otherArr = [];
        $selected_states = [];
        
        $mainGroupSates = ["NI","EI","WI","SI"];
        
         if(isset($_GET['location']) && !empty($_GET['location'])){
            foreach($_GET['location'] as $keys => $stateData){
                
                if(!empty($stateData)){
                    if(in_array($stateData, $mainGroupSates)){
                        $groupStateArr[] = $stateData;
                        
                        // get all group states
                        $AllGroupStates = $this->fetch_states_by_group($stateData);
                        
                        if(!empty($AllGroupStates)){
                            foreach($AllGroupStates as $stateData){
                                $statesArr[] = $stateData['name'];
                                
                                // get all group states cities
                                $cities_data = $this->fetch_cities_by_state($stateData['id']);
                                
                                if(!empty($cities_data)){
                                    foreach($cities_data as $city){
                                        $citiesArr[] = trim($city['name']);
                                    }
                                }
                                
                            }
                        }
                    }else{
                        
                        $explode_data = explode("_",$stateData);
                       
                        if(isset($explode_data[0]) && isset($explode_data[1])){
                             
                          if($explode_data[0] == "city"){
                              
                              $city_data = $db->query("SELECT * from cities Where id = '" . $explode_data[1]. "' ")->getRowArray();
                              if(!empty($city_data)){
                                $citiesArr[] = trim($city_data['name']);
                                
                                $state_data = $db->query("SELECT * from states Where id = '" . $city_data['state_id']. "' ")->getRowArray();
                                $statesArr[] = $state_data['name'];
                              }
                              
                               
                          }else if($explode_data[0] == "state"){
                              
                            $selected_states[] = $explode_data[1];
                            
                            $state_data = $db->query("SELECT * from states Where id = '" . $explode_data[1]. "' ")->getRowArray();
                            $other = "";
                            if(isset($_GET['other']['location'][$explode_data[1]]) && !empty($_GET['other']['location'][$explode_data[1]])){
                                $other = $_GET['other']['location'][$explode_data[1]];
                            }
                            
                            $statesArr[] = $state_data['name'];
                            
                            // get all group states cities
                            $cities_data = $this->fetch_cities_by_state($state_data['id']);
                            
                            if(!empty($cities_data)){
                                foreach($cities_data as $city){
                                    $citiesArr[] = trim($city['name']);
                                }
                            }
                             
                            if($other != ''){
                                $otherArr[] = [
                                    'state' => $state_data['id'],
                                    'city' => $other,
                                ];
                            }
                          }
                          
                        } 
                    }
                }
            }
        }
        
        if(isset($_GET['other']['location']) && !empty($_GET['other']['location'])){
            foreach($_GET['other']['location'] as $stateId => $otherSates){
                
                // check not empty condition
                if(!empty($otherSates)){
                
                    // Check If state is not selected but select in other state
                    if(!in_array($stateId,$selected_states) || empty($selected_states)){
                        
                        $state_data = $db->query("SELECT * from states Where id = '" . $stateId. "' ")->getRowArray();
                        
                         $otherArr[] = [
                            'state' => $state_data['id'],
                            'city' => $otherSates,
                        ];
                    }
                }
            }
        }
        
        $statesArr = array_unique($statesArr);
        $citiesArr = array_unique($citiesArr);
        
         
        if(!empty($statesArr) || !empty($citiesArr) || !empty($otherArr)){
            $statesUserIds = [];
            $cityUserIds = [];
            $otherUserIds = [];
            if(!empty($statesArr)){
                $statesUserIds = $db->table('user_location')
                ->select('DISTINCT(user_id)')
    		    ->where(['requst_type' => 'preffered', 'location_type' => 'state'])
    		    ->whereIn('name', $statesArr)
    		    ->get()->getResultArray();
            }
            
            if(!empty($citiesArr)){
                $cityUserIds = $db->table('user_location')
                ->select('DISTINCT(user_id)')
    		    ->where(['requst_type' => 'preffered', 'location_type' => 'city'])
    		    ->whereIn('name', $citiesArr)
    		    ->get()->getResultArray();
            }
            
            if(!empty($otherArr)){
                foreach($otherArr as $other_data){
                    
                    $otherRes = $db->table('user_location')
                        ->select('DISTINCT(user_id)')
            		    ->where(['requst_type' => 'preffered', 'main_id' => $other_data['state']])
            		    ->like('other', $other_data['city'])
            		    ->get()->getResultArray();
            		    
            		if(!empty($otherRes)){
            		    foreach($otherRes as $resother){
            		         $otherUserIds[]['user_id'] = $resother['user_id'];
            		    }
            		}
                }
            }
            
            $prefferedAllUserIds = array_merge($statesUserIds,$cityUserIds,$otherUserIds);
            
        }
        
        // GET USER IDS
             
        // if user enter both current an preffered location, check both validations
        if(isset($_GET['state']) && !empty($_GET['state']) && isset($_GET['location']) && !empty($_GET['location']) ){
            
            if(!empty($currentAllUserIds) && !empty($prefferedAllUserIds)){
                
                $currentUid = [];
                $prefferedUid = [];
                
                
                foreach($currentAllUserIds as $cuid){
                    $currentUid[] = $cuid['user_id'];
                }
                
                foreach($prefferedAllUserIds as $puid){
                    $prefferedUid[] = $puid['user_id'];
                }
                
                $total_all_user_ids = array_intersect($currentUid,$prefferedUid);
                $all_user_ids = array_unique($total_all_user_ids);
               
            }else{
                $all_user_ids = [];
            } 
        }else{
            $total_all_user_ids = array_merge($currentAllUserIds,$prefferedAllUserIds);
            if(!empty($total_all_user_ids)){
                foreach($total_all_user_ids as $alluid){
    		        $all_user_ids[] = $alluid['user_id'];
    		    } 
    		    $all_user_ids = array_unique($all_user_ids);
            }
        }

        return $all_user_ids;
    }

    public function fetch_data($data){
        
   $query ="SELECT * FROM jobseeker_register WHERE status = '0'";     
        // skill_filter
        
    // Location conditions
    $location_userIds = $this->fetch_all_location_user_ids();
    if(!empty($location_userIds)){
        $loc_user_ids = implode(',',$location_userIds);
        $query .= " AND id IN ($loc_user_ids) ";
    }

    if( isset($data['key_skills']) && !empty($data['key_skills']))
    {
    $query .= "
    AND  key_skills Like('%".$data['key_skills']."%')
    ";
    }else{
    $query.="";
    }

    if(isset($data['maxsalary'], $data['minsalary'])){
    $query .= "
    AND expected_ctc BETWEEN '".$data['minsalary']."' AND '".$data['maxsalary']."'
    ";
    }else {
    $query.="";
    }

   
 if(isset($data['minexperience'], $data['maxexperience'])){
    $query .= "
    AND maximum_experience BETWEEN  '".$data['minexperience']."' AND '".FLOOR($data['maxexperience'])."'";
}

    
    //designation
    if(isset($data['jobfunction']) && !empty($data['jobfunction']))
    {
    $query .= "
    AND  job_function IN('".$data['jobfunction']."')
    ";
    }else {
    $query.="";
    }
    //skills
    if(isset($data['specialization']) && !empty($data['specialization']))
    {
    $query .= "
    AND  specialization IN('".$data['specialization']."')
    ";
    }
    // graducation
    if(isset($data['graduate']) && !empty($data['graduate']))
    {
    $query .= "
    AND  graduation IN('".$data['graduate']."')
    ";
    }else {
    $query.="";
    }
    
    if(isset($data['postgraduate']) && !empty($data['postgraduate']))
    {
    $query .= "
    AND  post_graducation IN('".$data['postgraduate']."')
    ";
    }else{
    $query.="";
    }
    
    if(isset($data['speciality']) && !empty($data['speciality']))
    {
    $query .= "
    AND  super_specialty IN('".$data['speciality']."')
    ";
    }else{
    $query.="";
    }
    
    if(isset($data['gender']) && !empty($data['gender']))
    {
    $query .= "
    AND  gender IN('".$data['gender']."')
    ";
    }else{
    $query.="";
    }
    
        return $query;
    }
	
    //fetch data
	public function searching($limit, $start,$data){
        $query= $this->fetch_data($data);
        $query.=' ORDER BY id desc ';
        $query.=' LIMIT '.$start.', ' . $limit;
        $data= $this->db->query($query)->getResultArray();
        return $data;
    }

// count
function count_all($limit, $start,$data)
 {
    $count = $this->fetch_data($data);
 $total = $this->db->query($count)->getNumRows();
 return $total;
 }

//date months

function make_query($date){
    $datequery='select * from recruiter_searching where  `created_at` <= DATE_SUB(CURDATE(), INTERVAL '.$date.' MONTH)';
    return $datequery;
}


function getmonthlydata($limit, $start, $date){
    $query=$this->make_query($date);
     $query.='GROUP BY jobfunction';
     $query .= ' LIMIT '.$start.', ' . $limit;
    $data = $this->db->query($query)->getResultArray();
 return $data;
}

function simplecountall($limit, $start, $date){
    $query=$this->make_query($date);
    $data = $this->db->query($query)->getNumRows();
    return $data;
}

public function advancesearching($limit, $start,$data){
    $query= $this->fetch_data($data);
    $query.=' ORDER BY id desc ';
    $query.=' LIMIT '.$start.', ' . $limit;
    $data= $this->db->query($query)->getResultArray();
    return $data;
   
}

//simple searching
public function isAvailabedata($data,$id){
      $array=['session_id'=>$id, 'minexperience'=>$data['minexperience'], 'maxexperience'=>$data['maxexperience'], 'minsalary'=>$data['minsalary'], 'maxsalary'=>$data['maxsalary'], 'jobfunction'=>$data['jobfunction'],'specialization'=>$data['specialization'],'search'=>'simple'];	
	return $this->db->table('recruiter_searching')->getWhere($array)->getRowArray();
	
}

//advance
public function isAvailableadvance($data,$id){
      $array=['session_id'=>$id, 'minexperience'=>$data['minexperience'], 'maxexperience'=>$data['maxexperience'], 'minsalary'=>$data['minsalary'], 'maxsalary'=>$data['maxsalary'], 'jobfunction'=>$data['jobfunction'],'specialization'=>$data['specialization'],'search'=>'advance'];	
	return $this->db->table('recruiter_searching')->getWhere($array)->getRowArray();
	
}

}