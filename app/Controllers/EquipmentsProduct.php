<?php
namespace App\Controllers;
use App\Models\EquipmentModel;
use App\Models\JobEquipment;
use App\Models\StateModel;
use App\Models\EquipmentSell;
use App\Models\ProductEquipment;

class EquipmentsProduct extends BaseController
{
   

    public function index()
    {
    $data=[];
    $db      = \Config\Database::connect();
    helper(['url', 'form']);
    $request = service('request');  
    
      $counry= $db->table('countries');
      $data['countries']=$counry->get()->getResultArray();

      $state= $db->table('states');
      $data['states']=$state->get()->getResultArray();

     return view('equipments-buy', $data);
    }
    
    public function product_filter(){
        
        $db      = \Config\Database::connect();
       $data=[];
       $state= $this->request->getVar('state');
       $country= $this->request->getVar('country');
       $brand=$this->request->getVar('brand');
       $maximum=$this->request->getVar('maximum');
       $minimum=$this->request->getVar('minimum');
        $product= new ProductEquipment();
        
        // $pages= $this->request->getVar('page');
        //  $pager = service('pager');

        // $page    = (int) ($this->request->getVar('page') ?? 1);
        // $perPage = 4;
        $total   = $product->count_all($state,$country,$brand, $maximum, $minimum);
       
     
        // Call makeLinks() to make pagination links.
        //  $pager_links = $pager->makeLinks($page, $perPage, $total);
        
        $data= 
       $data=array(
    'product_list'=> $product->fetch_data($state,$country,$brand, $maximum, $minimum),
    'current_page'=>$product->countall($state,$country,$brand, $maximum, $minimum),
    'total'=>$total
        );
        
       echo json_encode($data);
   
    }
    
     // recruiter
     public function Productseeker($id = ""){
        $session=session();
        if (!$session->get('isLoggedIn')== true) {
            return redirect()->to(site_url('Register'));          
        }
        $data=[];
        $uri = service('uri');
        $id= $uri->getSegment(2);
         $db      = \Config\Database::connect();
        $build2= new JobEquipment();
       $data['equipment']= $build2->where('id', $id)->first();
       if( $data['equipment']['country']> 0){ 
        // all state
       
        $builder = $db->table('countries')->select('*');
        $builder->where('id', $data['equipment']['country']);
        $country= $builder->get()->getRowArray(); 
        if(!empty($country)){
            $data['equipment']['country_name']= $country['name'];
        }else{
            $data['equipment']['country_name']= 'Not found';
        }
    }
    // multipla images
    if( $data['equipment']['session_id']){ 
        $builder = $db->table('jobseeker_equipment_images')->select('*');
        $builder->where(['session_id'=> $data['equipment']['session_id'],'equipment_id'=>$id]);
        $img= $builder->get()->getResultArray(); 
       if(!empty($img)){
             foreach($img as $imgdata){ 
             $data['equipment']['images'][]= $imgdata['images'];
             }
             }else{
            $data['equipment']['images']= '';
        }
}
    // echo "<pre>"; print_r($data);

        return view('equipment-product-details', $data);

}
    // seeeker
    public function Productrequiter($id = ""){
        $session=session();
        if (!$session->get('isLoggedIn')== true) {
            return redirect()->to(site_url('Register'));          
        }
        $data=[];
        $uri = service('uri');
        $id= $uri->getSegment(2);
         $db      = \Config\Database::connect();
        $build2= new EquipmentModel();
       $data['equipment']= $build2->where('id', $id)->first();
       if( $data['equipment']['country']> 0){ 
        // all state
       
        $builder = $db->table('countries')->select('*');
        $builder->where('id', $data['equipment']['country']);
        $country= $builder->get()->getRowArray(); 
        if(!empty($country)){
            $data['equipment']['country_name']= $country['name'];
        }else{
            $data['equipment']['country_name']= 'Not found';
        }
    }
    // multipla images
    if( $data['equipment']['session_id']){ 
        $builder = $db->table('recruiter_equipment_images')->select('*');
       $builder->where(['session_id'=> $data['equipment']['session_id'],'equipment_id'=>$id]);
        $img= $builder->get()->getResultArray(); 
         if(!empty($img)){
             foreach($img as $imgdata){ 
             $data['equipment']['images'][]= $imgdata['images'];
             }
             }else{
            $data['equipment']['images']= '';
        }
}
        // echo "<pre>"; print_r($data);
        return view('equipment-product-details', $data);

}

// sell
public function Productsell($id = ""){
    $session=session();
        if (!$session->get('isLoggedIn')== true) {
            return redirect()->to(site_url('Register'));          
        }
     $data=[];
        $uri = service('uri');
        $id= $uri->getSegment(2);
         $db      = \Config\Database::connect();
        $build2= new EquipmentSell();
       $data['equipment']= $build2->where('id', $id)->first();
       if( $data['equipment']['country']> 0){ 
        // all state
        $builder = $db->table('countries')->select('*');
        $builder->where('id', $data['equipment']['country']);
        $country= $builder->get()->getRowArray(); 
        if(!empty($country)){
            $data['equipment']['country_name']= $country['name'];
        }else{
            $data['equipment']['country_name']= 'Not found';
        }
    }
   
    // multiple images
 if( $data['equipment']['session_id']){ 
        $builder = $db->table('equipmentsell_images')->select('*');
        $builder->where(['session_id'=> $data['equipment']['session_id'],'equipment_id'=>$id]);
        $img= $builder->get()->getResultArray(); 
        if(!empty($img)){
        foreach($img as $images){
            $data['equipment']['images'][]= $images['images'];
        }
        }else{
            $data['equipment']['images']= '';
        }        
}
        return view('equipment-product-details', $data);
}

      // send query
      public function sendquery(){
        $id= $this->request->getVar('id');
       $getemail= $this->request->getVar('email');
       $product_name=$this->request->getVar('productname');
       $price=$this->request->getVar('price');
       $person_name=$this->request->getVar('personame');
       $description=$this->request->getVar('description');
       $contact=$this->request->getVar('contact');  
       $session_id= session()->get('id');
       $session_name=session()->get('firstname');
       $session_email=session()->get('email_id');
      
       // send a mail recruiter admin
       $mail_message='<html>
       <head>
         <title>GREAT DEALS ON EQUIPMENT FROM BEST BRANDS</title>
       </head>
       <body>
          <table style="border-bottom: 1px solid #ddd;">
           <tr>
             <th>Product Name</th>
             <th>Price</th>
             <th>description</th>
           </tr>
           <tr>';
           $mail_message.='<td>'.$product_name.'</td>';
           $mail_message.='<td>'.$price.'</td>';
           $mail_message.='<td>'.$description.'     
           </tr>
         </table>
       </body>
       </html>
       ';
       $mail_message .= '<br>Thanks & Regards';
       $email = \Config\Services::email();                         
       $email->setFrom($session_email,  $session_name);
       $email->setTo($getemail);
       $email->setSubject('Docladder');
       $email->setMessage($mail_message);
       $email->setCC('shilpa.dhiman31@gmail.com');//CC
       $email->send();
       if ($email->send()) 
       {
       $emaidata= 'Email successfully sent';
       } 
       else 
       {
       $emaidata = $email->printDebugger(['headers']);
        //print_r($emaildata);
        }
     
        $response = [
            'success' => false,
            'msg' => "Sent Successfully!",
            ]; 
            return $this->response->setJSON($response);
    
    }
 
}