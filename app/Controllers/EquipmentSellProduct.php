<?php
namespace App\Controllers;
use App\Models\EquipmentModel;
use App\Models\StateModel;
use App\Models\EquipmentSell;

class EquipmentSellProduct extends BaseController
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

     return view('equipment-sell', $data);
    }
    public function SellProduct(){
        $data=[];
        $session=session();
        $db      = \Config\Database::connect();
        $current_timestamp = strtotime("now");
        $id=$session->get('id');
        //state
        $state= $db->table('states');
        $data['state']=$state->get()->getResultArray();

        $users= $db->table('jobseeker_register');
        $data['getform']= $users->where('id',$id)->get()->getRowArray();
  
        $data=[
            'header'=>'Equipment Form',
            'information'=>'Equipment Information',
            'product_name'=>'Product name',
            'product_image'=>'Product Image',
            'Price'=>'Price',
            'offerprice'=>'Offer Price',
            'State'=>'State',
            'City'=>'City',
            'Product_description'=>'Product Description',
            'Year_of_manufacturing'=>'Year of Manufacturing',
            'Product_video'=>'Product Video',
            'contact_details'=>'Contact Details',
            'Area'=>'Area(sq. ft)',
            'Person'=>'Concerned Person Name',
            'Contact'=>'Contact',
            'E_mail'=>'E-mail address',
            'country'=>'Country Of Origin',
        ];
        helper(['url', 'form']);
        $db      = \Config\Database::connect();
        $builder = $db->table('countries');
        $data['country']=$builder->get()->getResultArray();
        $model= New StateModel();
        $data['state']= $model->get()->getResultArray();
        if(!empty($this->request->getFile('image')) ){
            $file = $this->validate([
                    'image' => ['uploaded[image]'],
                 'product_name' => ['label' => 'Product Name', 'rules' => 'required'],
                'e-mail_address' => ['label' => 'Email', 'rules' => 'required'],
                'concerned_person_name' => ['label' => 'Name', 'rules' => 'required'],
                'contact_details' => ['label' => 'Mobile number', 'rules' => 'required|numeric|regex_match[/^[0-9]{10}$/]'],
                'contact' => ['label' => 'Mobile number', 'rules' => 'required|numeric|regex_match[/^[0-9]{10}$/]'],
                ]);

        }
           
        if(!$file){          
            $data['validation']=$this->validator;
                 return view('equipment-sell', $data);             
                } else{
                                 
      
            $img=$this->request->getFile('image');

            if($img->isValid() && !$img->hasMoved()){
            $newName=$img->getName().$current_timestamp;
            $img->move('./public/uploads/equipmentimages', $newName);
            $image_name =  $newName;
            $image_type  = $img->getClientMimeType();
            }else{
              $image_name =  '';  
            }
            // videos
        
            $videos=$this->request->getFile('video');
            if(!empty($videos)){
            if($videos->isValid() && !$videos->hasMoved()){
            $VideoName=$videos->getName().$current_timestamp;
            $videos->move('./public/uploads/equipmentvideos', $VideoName);
            $video_name =  $VideoName;
            $video_type  = $videos->getClientMimeType();     
            }else{
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
                $currentTime= date("y-m-d H:i:s");
             $data=[
                 'session_id'=> $id,
                 'product_name'=>$this->request->getVar('product_name'),
                 'product_price'=>$this->request->getVar('product_price'),
                 'file_image'=>$image_name,
                 'file_video'=>$video_name,  
                 'state'=>$state,
                 'city'=>$city,
                 'product_description'=>$this->request->getVar('product_description'),
                 'year_of_manufacturing'=>$this->request->getVar('year_of_manufacturing'),
                 'contact_details'=>$this->request->getVar('contact_details'),
                 'concerned_person_name'=>$this->request->getVar('concerned_person_name'),
                 'contact'=>$this->request->getVar('contact'),
                 'e-mail_address'=>$this->request->getVar('e-mail_address'),
                 'country'=>$country,
                 'sku'=>$this->request->getVar('sku'),
                 'product_brand'=>$this->request->getVar('brand'),
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
             $model= new EquipmentSell();
             $model->insert($data);
             $session->setFlashdata('success', 'Your product will be live shortly.');
             $inserted_id= $model->insertID();
             
             // images
              if (!empty($this->request->getFileMultiple('images'))) {
                           foreach($this->request->getFileMultiple('images') as $file)
                           {   
                           $newName=$file->getName().$current_timestamp;
                           $file->move('./public/uploads/Equipmentimages', $newName);
   
                           $data = [
                           'equipment_id'=>$inserted_id,  
                           'session_id'=> $id,
                           'images' =>  $newName,
                           'images_type'  => $file->getClientMimeType()
                           ];
   
                           $uploadimage=$db->table('equipmentsell_images');
                           $save = $uploadimage->insert($data);
                           $msg = 'Your product will be live shortly.';
                           }
   
                           } 
            // videos
                 if (!empty($this->request->getFileMultiple('video_name'))) {
                           foreach($this->request->getFileMultiple('video_name') as $file)
                           {   
                           $newName=$file->getName().$current_timestamp;
                           $file->move('./public/uploads/Equipmentvideos', $newName);
   
                           $data = [
                           'equipment_id'=>$inserted_id,  
                           'session_id'=> $id,
                           'video' =>  $newName,
                           'video_type'  => $file->getClientMimeType()
                           ];
   
                           $uploadimage=$db->table('equipmentsell_videos');
                           $save = $uploadimage->insert($data);
                           $msg = 'Your product will be live shortly.';
                           }
   
                           } 
             
             return redirect()->to(base_url('Equipment/Sell'));
        }
    }

}   