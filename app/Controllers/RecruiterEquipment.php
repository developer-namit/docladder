<?php
namespace App\Controllers;
use App\Models\SearchModel;
use App\Models\JobPostingModel;
use App\Models\CitiesModel;
use App\Models\StateModel;
use App\Models\EquipmentModel;
use App\Models\EquipmentImgModel;
class RecruiterEquipment extends BaseController
{
    public function index()
    {   
        helper(['url', 'form']);
        $session = session();
        if (!$session->get('isLoggedIn')== true) {
          return redirect()->to(base_url('home'));          
      }
        $data=[];
        $db      = \Config\Database::connect();
        $builder = $db->table('countries');
        $data['county']=$builder->get()->getResultArray();
        $model= New StateModel();
        $data['state']= $model->get()->getResultArray();
     return view('equipment-form', $data);
    }
    //submit Equipment form
    public function EquipmentForm(){
        $data=[];
         $current_timestamp = strtotime("now");
        helper(['url', 'form']);
        $session=session();
        $id=$session->get('id');
       
        $db      = \Config\Database::connect();
        $builder = $db->table('countries');
        $data['county']=$builder->get()->getResultArray();
        $model= New StateModel();
        $data['state']= $model->get()->getResultArray();
        
        $file = $this->validate([
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image,2097152]',
            ],
            'video'=>[
               // 'uploaded[video]',
                'mime_in[video, video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/mp4]',
                'max_size[video, 150960000]',
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
                 return view('equipment-form', $data);             
                } else{
                        
             $request = service('request');
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
             $model= new EquipmentModel();
             $model->insert($data);
             $session->setFlashdata('success', 'Data has been successfully updated!');
               $inserted_id= $model->insertID();
             
             if (!empty($this->request->getFileMultiple('images'))) {
                        foreach($this->request->getFileMultiple('images') as $file)
                        {   
                        $newName=$file->getName().$current_timestamp;
                        $file->move('./public/uploads/Equipmentimages', $newName);

                        $data = [
                        'equipment_id'=>$inserted_id,    
                        'session_id'=> $id,
                        'images' =>   $newName,
                        'images_type'  => $file->getClientMimeType()
                        ];

                        $uploadimage= New EquipmentImgModel();
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
   
                           $uploadimage=$db->table('recruiter_equipment_videos');
                           $save = $uploadimage->insert($data);
                        }
   
                    }         
                      return redirect()->to(base_url('Equipment'));
             
        }
    }
       
    }
