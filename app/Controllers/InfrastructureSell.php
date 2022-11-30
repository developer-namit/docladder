<?php
namespace App\Controllers;
use App\Models\StateModel;
use App\Models\InfrastructureSellModel;

class InfrastructureSell extends BaseController
{
    public function index()
    {
    $session=session();  
    
     if (!$session->get('isLoggedIn')== true) {
        return redirect()->to(site_url('Register'));          
        } 
        
    $data=[];
    $db      = \Config\Database::connect();
     $id=$session->get('id');
    helper(['url', 'form']);
    $request = service('request');  
      $counry= $db->table('countries');
      $data['country']=$counry->get()->getResultArray();

      $state= $db->table('states');
      $data['state']=$state->get()->getResultArray();
      
       $users= $db->table('signup');
        $data['getform']= $users->where('id',$id)->get()->getRowArray();

     return view('infrastructure-sell', $data);
    }
    public function SellSpace(){
        $data=[];
        $session=session();
       if(!empty(session()->get('role'))){
           $role=session()->get('role');
       }else{
           $role='simpleuser';
       }
        $db      = \Config\Database::connect();
        $id=$session->get('id');
        //state
        $state= $db->table('states');
        $data['state']=$state->get()->getResultArray();

        $users= $db->table('jobseeker_register');
        $data['getform']= $users->where('id',$id)->get()->getRowArray();
        $current_timestamp = strtotime("now");
        helper(['url', 'form']);
        $db      = \Config\Database::connect();
        $model= New StateModel();
        $data['state']= $model->get()->getResultArray();
        
        $inputs =[
         'image' => ['uploaded[image]'],    
        'product_name' => ['label' => 'Product Name', 'rules' => 'required'],   
        'price' => ['label' => 'Price', 'rules' => 'required'],
        'offerprice' => ['label' => 'Offer Price', 'rules' => 'required'],
        'concerned_person_name' => ['label' => 'Name', 'rules' => 'required'],
        'contact_details' => ['label' => 'Contact', 'rules' => 'required'],
        'e-mail_address' => ['label' => 'Email', 'rules' => 'required'],
        
        
        ];

 if (!$this->validate($inputs)) {
        $data['validation']= $this->validator;
            return view('infrastructure-sell', $data);
        }else{
            $img=$this->request->getFile('image');
            if(!empty($img)){
            if($img->isValid() && !$img->hasMoved()){
            $newName=$img->getName().$current_timestamp;
            $img->move('./public/uploads/spaceimages', $newName);
            $image_name = $newName;
            $image_type  = $img->getClientMimeType();
            }else{
                $image_name = ''; 
            }
            }
            // videos
            
            $videos=$this->request->getFile('video');
            if(!empty($videos)){
            if($videos->isValid() && !$videos->hasMoved()){
            $VideoName=$videos->getName().$current_timestamp;
            $videos->move('./public/uploads/spacevideo', $VideoName);
            $video_name =  $VideoName;
            $video_type  = $videos->getClientMimeType();     
        }
        else{
            $video_name= '';
        }
        }
        
                if($this->request->getVar('country')){
                    $country=$this->request->getVar('country');
                }else{
                    $country=0;
                }
                if($this->request->getVar('state')){
                    $state=$this->request->getVar('state');
                }else{
                    $state=0;
                }
                if($this->request->getVar('city')){
                    $city=$this->request->getVar('city');
                }else{
                    $city=0;
                }
                 if($this->request->getVar('price')){
                    $product_price=$this->request->getVar('price');
                }else{
                    $product_price=0;
                }
                
                if($this->request->getVar('offerprice')){
                    $offerprice=$this->request->getVar('offerprice');
                }else{
                    $offerprice=0;
                }
                
                $currentTime= date("y-m-d H:i:s");
             $data=[
                 'session_id'=> $id,
                 'product_name'=>$this->request->getVar('product_name'),
                 'product_price'=>$product_price,
                 'file_image'=>$image_name,
                 'file_video'=>$video_name,  
                 'state'=>$state,
                 'city'=>$city,
                 'product_description'=>$this->request->getVar('product_description'),
                 'year_of_manufacturing'=>$this->request->getVar('year_of_manufacturing'),
                 'concerned_person_name'=>$this->request->getVar('concerned_person_name'),
                 'contact'=>$this->request->getVar('contact_details'),
                 'e-mail_address'=>$this->request->getVar('e-mail_address'),
                 'offer_price'=>$offerprice,
                 'product_brand'=>$this->request->getVar('product_brand'),
                 'sku'=>$this->request->getVar('sku'),
                 'role'=>$role,
                 'created_at'=>$currentTime                   
             ]; 
             
              $message='Your sell product data created successfuly.It will be live shortly. <br>';
                $message.='<html>
                <body>
                <table style="border-bottom: 1px solid #ddd;">
                <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>SKU</th>
                <th>description</th>
                </tr>
                <tr>';
                $message.='<td>'.$data['product_name'].'</td>';
                $message.='<td>'.$data['product_price'].'</td>';
                $message.='<td>'.$data['sku'].'</td>';
                $message.='<td>'.$data['product_description'].'     
                
                </tr>
                </table>
                </body>
                </html>
                ';
                $message.='<br><br>Thanks<br>Tearm:';
                $email = \Config\Services::email();                         
                $email->setFrom('docladder@vertosys.com');
                $email->setTo($data['e-mail_address'], $data['concerned_person_name']);
                $email->setSubject('Docladder');
                $email->setMessage($message);             
                $email->send();
                if ($email->send()) 
                {
                echo 'Email successfully sent';
                } 
                else 
                {
                $emaidata = $email->printDebugger(['headers']);
                 //print_r($emaildata);
                 } 
             $model= new InfrastructureSellModel();
             $model->insert($data);
             $session->setFlashdata('success', 'Your product will be live shortly.');
             $inserted_id= $model->insertID();
             
             // images
              if (!empty($this->request->getFileMultiple('images'))) {
                           foreach($this->request->getFileMultiple('images') as $file)
                           {   
                           $newName=$file->getName().$current_timestamp;
                           $file->move('./public/uploads/Spaceimages', $newName);
   
                           $data = [
                            'space_id'=>$inserted_id,  
                           'session_id'=> $id,
                           'images' => $newName,
                           'images_type'  => $file->getClientMimeType()
                           ];
   
                           $uploadimage=$db->table('infrastructuresell_img');
                           $save = $uploadimage->insert($data);
                           $msg = 'Your product will be live shortly.';
                           }
   
                           }
                // videos
                  if (!empty($this->request->getFileMultiple('video_name'))) {
                           foreach($this->request->getFileMultiple('video_name') as $file)
                           {   
                           $newName=$file->getName().$current_timestamp;
                           $file->move('./public/uploads/Spacevideos', $newName);
   
                           $data = [
                           'space_id'=>$inserted_id,  
                           'session_id'=> $id,
                           'video' =>  $newName,
                           'video_type'  => $file->getClientMimeType()
                           ];
   
                           $uploadimage=$db->table('infrastructuresell_videos');
                           $save = $uploadimage->insert($data);
                           $msg = 'Your product will be live shortly.';
                           }
   
                           } 

            return redirect()->to(base_url('Infrastructure/Sell'));
        }
    }

}   