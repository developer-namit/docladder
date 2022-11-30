<?php
namespace App\Controllers;
use App\Models\SpaceModel;
use App\Models\JobSpace;
use App\Models\StateModel;
use App\Models\InfrastructureSellModel;
use App\Models\InfrastructureModel;
class InfrastructureBuy extends BaseController
{
    public function index()
    {
    $data=[];
    $db      = \Config\Database::connect();
    helper(['url', 'form']);
    $request = service('request');  
    $state= $db->table('states');
    $data['states']=$state->get()->getResultArray(); 
     return view('infrastructure-buy', $data);
    }
    
    public function product_filter(){
       
        $db      = \Config\Database::connect();
       $data=[];
       $state= $this->request->getVar('state');
       $country= $this->request->getVar('country');
       $brand=$this->request->getVar('brand');
       $maximum=$this->request->getVar('maximum');
       $minimum=$this->request->getVar('minimum');
        $product= new InfrastructureModel();
       $data= $product->fetch_data($state,$country,$brand, $maximum, $minimum);
        
       echo json_encode($data);
   
    }
    // recruiter
     public function Spaceseeker($id = ""){
         $db      = \Config\Database::connect();
        $session=session();
        if (!$session->get('isLoggedIn')== true) {
            return redirect()->to(site_url('Register'));          
        }
        $data=[];
        $uri = service('uri');
        $id= $uri->getSegment(2);
        $build2= new JobSpace();
       $data['space']= $build2->where('id', $id)->first();
       
         // multipla images
         
    if(!empty($data['space']['session_id'])){ 
        $builder = $db->table('jobseeker_space_images')->select('*');
        $builder->where(['session_id'=> $data['space']['session_id'],'space_id'=>$id]);
        $img= $builder->get()->getResultArray(); 
        if(!empty($img)){
             foreach($img as $imgdata){ 
             $data['space']['images'][]= $imgdata['images'];
             }
             }else{
            $data['space']['images']= '';
        }
}
      
        return view('infrastructure-product-details', $data);

}
    // seeeker
    public function Spacerequiter($id = ""){
        $data=[];
          $db      = \Config\Database::connect();
        $uri = service('uri');
        $id= $uri->getSegment(2);
        $build2= new SpaceModel();
       $data['space']= $build2->where('id', $id)->first();
           // multipla images
    if( $data['space']['session_id']){ 
        $builder = $db->table('recruiter_space_image')->select('*');
        $builder->where(['session_id'=> $data['space']['session_id'],'space_id'=>$id]);
        $img= $builder->get()->getResultArray();
        
         if(!empty($img)){
             foreach($img as $imgdata){ 
             $data['space']['images'][]= $imgdata['images'];
             }
             }else{
            $data['space']['images']= '';
        }
}
   
        return view('infrastructure-product-details', $data);

}
//sell
public function Spacesell($id = ""){
    $session=session();
        if (!$session->get('isLoggedIn')== true) {
            return redirect()->to(site_url('Register'));          
        }
     $data=[];
        $uri = service('uri');
        $id= $uri->getSegment(2);
         $db      = \Config\Database::connect();
        $build2= new InfrastructureSellModel();
      $data['space']= $build2->where('id', $id)->first();
    // multiple images
 if( $data['space']['session_id']){ 
        $builder = $db->table('infrastructuresell_img')->select('*');
        $builder->where(['session_id'=> $data['space']['session_id'],'space_id'=>$id]);
        $img= $builder->get()->getResultArray(); 
        if(!empty($img)){
        foreach($img as $images){
            $data['space']['images'][]= $images['images'];
        }
        }else{
            $data['space']['images']= '';
        }        
}
        return view('infrastructure-product-details', $data);
}





      // send query
      public function sendquery(){
        $id= $this->request->getVar('id');
       $email= $this->request->getVar('email');
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
         <title>GREAT DEALS ON SPACE FROM BEST BRANDS</title>
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
       $email->setTo($email);
       $email->setSubject('Docladder');
       $email->setMessage($mail_message);             
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