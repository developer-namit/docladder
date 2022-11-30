<?php
namespace App\Models;
use CodeIgniter\Model;
class InfrastructureModel extends Model
{
	function make_query($state, $country, $brand, $maximum, $minimum)
 {
  $query = "
  SELECT * FROM jobseeker_space 
  WHERE status = '0' 
  ";

  if(isset($minimum, $maximum) && !empty($minimum) &&  !empty($maximum))
  {
   $query .= "
    AND product_price BETWEEN '".$minimum."' AND '".$maximum."'
   ";
  }

 
//state
  if(isset($state))
  {
   $state_filter = implode("','", $state);
   $query .= "
   AND  state IN('".$state_filter."')
   ";
  }
//country
  if(isset($country))
  {
   $country_filter = implode("','", $country);
   $query .= "
   AND  country IN('".$country_filter."')
   ";
  }
  //brand
  if(isset($brand))
  {
   $brand_filter = implode("','", $brand);
   $query .= "
    AND product_brand IN('".$brand_filter."')
   ";
  }
  
  return $query;
 }
// job seeeker 
function make_query_seeker($state, $country, $brand, $maximum, $minimum)
 {
  $query = "
  SELECT * FROM space_equipment 
  WHERE status = '0' 
  ";

  if(isset($minimum, $maximum) && !empty($minimum) &&  !empty($maximum))
  {
   $query .= "
    AND product_price BETWEEN '".$minimum."' AND '".$maximum."'
   ";
  }

 
//state
  if(isset($state))
  {
   $state_filter = implode("','", $state);
   $query .= "
   AND  state IN('".$state_filter."')
   ";
  }
//country
  if(isset($country))
  {
   $country_filter = implode("','", $country);
   $query .= "
   AND  country IN('".$country_filter."')
   ";
  }
  //brand
  if(isset($brand))
  {
   $brand_filter = implode("','", $brand);
   $query .= "
    AND product_brand IN('".$brand_filter."')
   ";
  }
  
  return $query;
 }

// sell
function make_query_sell($state, $country, $brand, $maximum, $minimum)
 {
  $query = "
  SELECT * FROM infrastructuresell 
  WHERE status = '0' 
  ";

  if(isset($minimum, $maximum) && !empty($minimum) &&  !empty($maximum))
  {
   $query .= "
    AND product_price BETWEEN '".$minimum."' AND '".$maximum."'
   ";
  }

 
//state
  if(isset($state))
  {
   $state_filter = implode("','", $state);
   $query .= "
   AND  state IN('".$state_filter."')
   ";
  }
//country
  if(isset($country))
  {
   $country_filter = implode("','", $country);
   $query .= "
   AND  country IN('".$country_filter."')
   ";
  }
  //brand
  if(isset($brand))
  {
   $brand_filter = implode("','", $brand);
   $query .= "
    AND product_brand IN('".$brand_filter."')
   ";
  }
  
  return $query;
 }



 function fetch_data($state, $country, $brand,  $maximum, $minimum)
 {
  $query = $this->make_query($state, $country, $brand,  $maximum, $minimum);
  $query_seeker = $this->make_query_seeker($state, $country, $brand,  $maximum, $minimum);
  $query_sell = $this->make_query_sell($state, $country, $brand,  $maximum, $minimum);
  $data = $this->db->query($query);
  $data2= $this->db->query($query_seeker);
 $data3= $this->db->query($query_sell);
 
 $seeker= $data->getResultArray();
 $recruiter= $data2->getResultArray();
 $sell= $data3->getResultArray();


  $output = '';
  //seeker
 if(isset($seeker) && !empty($seeker) || isset($recruiter) && !empty($recruiter) || isset($sell) &&!empty($sell)){
   foreach($seeker as $row)
   {
    $output .= '
  <div class="col-lg-4 col-sm-6 mb-4 list-item">
  <div class="employers-grid text-center bg-white">
          <div class="employers-list-logo">
          <img src="'.base_url('/public/uploads/spaceimages').'/'.$row['file_image'].'" alt="" class="img-responsive" >
          </div>
    <div class="employers-list-details">
    <div class="employers-list-info">
          <div class="employers-list-title">
          <h5 class="mb-0">    
          <a href="'.base_url('Spacedetail').'/'.$row['id'].'">'. $row['product_name'] .'</a></h5>
          </div>
          <div class="employers-list-option">
          <ul class="list-unstyled">
          <li><i class="fas fa-rupee-sign pe-1"></i>'. $row['product_price'] .'</li>
          </ul>
          </div>
    </div>
    </div>
    </div>
    </div> 
    ';
   }
  
  //recruiter
  foreach($recruiter as $row)
   {
    $output .= '
  <div class="col-lg-4 col-sm-6 mb-4 list-item">
  <div class="employers-grid text-center bg-white">
          <div class="employers-list-logo">
         <img src="'.base_url('/public/uploads/spaceimages').'/'.$row['file_image'].'" alt="" class="img-responsive" >
          </div>
    <div class="employers-list-details">
    <div class="employers-list-info">
          <div class="employers-list-title">
          <h5 class="mb-0">    
          <a href="'.base_url('Spacedetails').'/'.$row['id'].'">'. $row['product_name'] .'</a></h5>
          </div>
          <div class="employers-list-option">
          <ul class="list-unstyled">
          <li><i class="fas fa-rupee-sign pe-1"></i>'. $row['product_price'] .'</li>
          </ul>
          </div>
    </div>
    </div>
    </div>
    </div> 
    ';
   }
  // sell
   foreach($sell as $sells)
   {
    $output .= '
  <div class="col-lg-4 col-sm-6 mb-4 list-item">
  <div class="employers-grid text-center bg-white">
          <div class="employers-list-logo">
          <img src="'.base_url('/public/uploads/spaceimages').'/'.$sells['file_image'].'" alt="" class="img-responsive" >
          </div>
    <div class="employers-list-details">
    <div class="employers-list-info">
          <div class="employers-list-title">
          <h5 class="mb-0">    
          <a href="'.base_url('spacedetails').'/'.$sells['id'].'">'. $sells['product_name'] .'</a></h5>
          </div>
          <div class="employers-list-option">
          <ul class="list-unstyled">
          <li><i class="fas fa-rupee-sign pe-1"></i>'. $sells['product_price'] .'</li>
          </ul>
          </div>
    </div>
    </div>
    </div>
    </div> 
    ';
   }
  }
  
  return $output;
 }

// send query

}

?>

