<?php
namespace App\Models;
use CodeIgniter\Model;
class JobseekerSearchModel extends Model
{
 
 public function fetch_jobposting($data){
  $query ="SELECT * FROM jobposting WHERE status = '0'";     
        // skill_filter
    $db = \Config\Database::connect();
    
    if(isset($data['hospital']) && !empty($data['hospital']))
    {
    $query .= "
    AND  company_name LIKE('%".$data['hospital']."%')
    ";
    }else{
    $query.="";
    }
    
    if(isset($data['designation']) && !empty($data['designation']))
    {
    $query .= "
    AND  job_function IN('".$data['designation']."')
    ";
    }else{
    $query.="";
    }
    
     if(isset($data['specialization']) && !empty($data['specialization']))
    {
    $query .= "
    AND  specialization IN('".$data['specialization']."')
    ";
    }else{
    $query.="";
    }
        // location
         if(isset($data['location']) && !empty($data['location'])){
        $query .= " AND (";   
      foreach($data['location'] as $val){
        if($val=='NI' || $val=='SI' || $val=='EI' || $val=='WI'){    
         $state = $db->table('states');
         $state->where('location_id', $val);
         $states = $state->get()->getResultArray();
         foreach($states as $st){
            $query .= "location LIKE('%".$st['name']."%')  OR " ;
         }
        }else if(!empty($val)) {
        $query .= "location LIKE('%".$val."%')  OR " ;
         
     }else{
         $query .= "location LIKE('%".$val."%')  OR " ;
     }
     } 
     $query= rtrim($query, "OR ");
          $query .= ")";   
     }
    $query.='ORDER BY ID DESC';  
  return $query;
    }
	
//fetch data
public function jobsearching($data){
$query= $this->fetch_jobposting($data);
$data= $this->db->query($query)->getResultArray();
return $data;
}

// recent searching
public function RecentSearch($limit, $start, $data){
 $sql= $this->Recent_searching($data);
 $sql.=' LIMIT '.$start.', ' . $limit;
$data= $this->db->query($sql)->getResultArray();
return $data; 
    
}
// count all
function count_all($limit, $start,$data)
 {
    $count = $this->Recent_searching($data);
 $total = $this->db->query($count)->getNumRows();
 return $total;
 }


// recent searching
public function Recent_searching($data){
     $db = \Config\Database::connect();
   $sql ="SELECT * FROM jobposting WHERE status = '0'";
    if(isset($data['specialization']) && !empty($data['specialization']))
    {
   $special= implode(", ",$data['specialization']); 
    $sql .= "
    AND  specialization IN('".$special."')
    ";
    }else{
    $sql.="";
    }
    // location
        if(isset($data['location']) && !empty($data['location'])){
        $sql .= " AND (";   
      foreach($data['location'] as $val){
        if($val=='NI' || $val=='SI' || $val=='EI' || $val=='WI' || $val==''){
        $builder = $db->table('states');
        $builder->select('*');
        $builder->join('cities', 'cities.state_id = states.id');
        $builder->where('location_id', $val);
        $states = $builder->get()->getResultArray();
            foreach($states as $location){
            $sql .= "location LIKE('%".$location['name']."%')  OR " ;
            }
             $sql .= " location LIKE('%".$val."%') OR "; 
             }else if(is_string($val)){
                $builder = $db->table('states');
                $builder->select('*');
                $builder->join('cities', 'cities.state_id = states.id');
                $builder->where('states.name', $val);
                $statess = $builder->get()->getResultArray();
                    foreach($statess as $locations){
                    $sql .= "location LIKE('%".$locations['name']."%')  OR " ;
                    }
              $sql .= " location LIKE('%".$val."%') OR "; 
             }else if(!empty($val)){
                  $sql .= " location LIKE('%".$val."%') OR "; 
             }
          }
          $sql= rtrim($sql, "OR ");
          $sql .= ")";
     }
    $sql.='ORDER BY ID DESC';
    return $sql;
}

public function FeaturedSearch($limit, $start, $data){
$sql= $this->featrued_searching($data);
 $sql.=' LIMIT '.$start.', ' . $limit;
$data= $this->db->query($sql)->getResultArray();
return $data;  
    
}

function countall($limit, $start,$data)
 {
    $count = $this->featrued_searching($data);
 $total = $this->db->query($count)->getNumRows();
 return $total;
 }
 
 public function featrued_searching($data){
   $db = \Config\Database::connect();   
$sql= "SELECT * FROM jobposting INNER JOIN recruiter_payment ON jobposting.session_id = recruiter_payment.session_id WHERE jobposting.status = 0";
    if(isset($data['specialization']) && !empty($data['specialization']))
    {
   $special= implode(", ",$data['specialization']); 
    $sql .= "
    AND  specialization IN('".$special."')
    ";
    }else{
    $sql.="";
    }
    // location
         if(isset($data['location']) && !empty($data['location'])){
        $sql .= " AND (";   
      foreach($data['location'] as $val){
        if($val=='NI' || $val=='SI' || $val=='EI' || $val=='WI' || $val==''){
        $builder = $db->table('states');
        $builder->select('*');
        $builder->join('cities', 'cities.state_id = states.id');
        $builder->where('location_id', $val);
        $states = $builder->get()->getResultArray();
            foreach($states as $location){
            $sql .= "location LIKE('%".$location['name']."%')  OR " ;
            }
             $sql .= " location LIKE('%".$val."%') OR "; 
             }else if(is_string($val)){
                $builder = $db->table('states');
                $builder->select('*');
                $builder->join('cities', 'cities.state_id = states.id');
                $builder->where('states.name', $val);
                $statess = $builder->get()->getResultArray();
                    foreach($statess as $locations){
                    $sql .= "location LIKE('%".$locations['name']."%')  OR " ;
                    }
              $sql .= " location LIKE('%".$val."%') OR "; 
             }else if(!empty($val)){
                  $sql .= " location LIKE('%".$val."%') OR "; 
             }
          }
          $sql= rtrim($sql, "OR ");
          $sql .= ")";
     }
    $sql.='ORDER BY jobposting.id DESC';
    return $sql;
     
 }


}