<?php
namespace App\Controllers;
use App\Models\StateModel;
use App\Models\JobEquipment;
class JobseekerEquipment extends BaseController
{
    public function index()
    {   
        helper(['url', 'form']);
        $session = session();
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
        $db      = \Config\Database::connect();
        $builder = $db->table('countries');
        $data['county']=$builder->get()->getResultArray();
        $model= New StateModel();
        $data['state']= $model->get()->getResultArray();
     return view('job-seeker-equipment-form', $data);
    }
    //submit Equipment form
    public function EquipmentForm(){
        $data=[];
         helper(['url', 'form']);
        $current_timestamp = strtotime("now");
        $session=session();
        $id=$session->get('id');

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
       
        $db      = \Config\Database::connect();
        $builder = $db->table('countries');
        $data['county']=$builder->get()->getResultArray();
        $model= New StateModel();
        $data['state']= $model->get()->getResultArray();
        $file = $this->validate([
            'image' => [
                'uploaded[image]',
            ],
            'product_name' => ['label' => 'Product Name', 'rules' => 'required'],   
            'product_price' => ['label' => 'Price', 'rules' => 'required'],
            'concerned_person_name' => ['label' => 'Name', 'rules' => 'required'],
            'contact_details' => ['label' => 'Contact', 'rules' => 'required'],
            'contact'=>['label' => 'Contact', 'rules' => 'required'],
            'e-mail_address' => ['label' => 'Email', 'rules' => 'required'],
            'state' => ['label' => 'State', 'rules' => 'required'],
        ]);    
        if(!$file){          
            $data['validation']=$this->validator;
                 return view('job-seeker-equipment-form', $data);             
                } else{
                                  
            $img=$this->request->getFile('image');
            if($img->isValid() && !$img->hasMoved()){
            $newName=$img->getName().$current_timestamp;
            
            $img->move('./public/uploads/equipmentimages', $newName);
            $image_name =  $img->getName();
            $image_type  = $img->getClientMimeType();
            }
            // videos
            $videos=$this->request->getFile('video');
            if(!empty($videos)){
            if($videos->isValid() && !$videos->hasMoved()){
            $VideoName=$videos->getName().$current_timestamp;
            $videos->move('./public/uploads/equipmentvideos', $VideoName);
            $video_name =  $videos->getName();
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
             $model= new JobEquipment();
             $model->insert($data);
             $session->setFlashdata('success', 'Successful Update Data!');
            
              $inserted_id= $model->insertID();
             //images
              if (!empty($this->request->getFileMultiple('images'))) {
                           foreach($this->request->getFileMultiple('images') as $file)
                           {   
                           $newName=$file->getName().$current_timestamp;
                           $file->move('./public/uploads/Equipmentimages', $newName);
   
                           $data = [
                           'equipment_id'=>$inserted_id,    
                           'session_id'=> $id,
                           'images' =>  $file->getClientName().$current_timestamp,
                           'images_type'  => $file->getClientMimeType()
                           ];
   
                           $uploadimage=$db->table('jobseeker_equipment_images');
                           $save = $uploadimage->insert($data);
                           $msg = 'Files have been successfully uploaded';
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
   
                           $uploadimage=$db->table('jobseeker_equipment_video');
                           $save = $uploadimage->insert($data);
                           $msg = 'Your product will be live shortly.';
                           }
   
                           } 
                           
             return redirect()->to(base_url('JobSeekerEquipment'));               
             
        }
    }
       
    }
