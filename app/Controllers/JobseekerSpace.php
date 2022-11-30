<?php
namespace App\Controllers;
use App\Models\JobSpace;
use App\Models\CitiesModel;
use App\Models\StateModel;
use App\Models\JobseekerSpaceimg;

class JobseekerSpace extends BaseController
{
    public function index()
    {
        helper(['url', 'form']);
        $session = session();
        $data=[];
        $data=[
            'header'=>'Space Form',
            'spaceinformation'=>'Space Information',
            'product_name'=>'Product name',
            'product_image'=>'Product Image',
            'Price'=>'Price',
            'offerprice'=>'Offer Price',
            'State'=>'State',
            'City'=>'City',
            'Product_description'=>'Product Description',
            'Year_of_manufacturing'=>'Year of Manufacturing',
            'Product_video'=>'Product Video',
            'Area'=>'Area(sq. ft)',
            'Person'=>'Concerned Person Name',
            'Contact'=>'Contact',
            'E_mail'=>'E-mail address',
        ];
        $db      = \Config\Database::connect();
        $builder = $db->table('countries');
        $data['county']=$builder->get()->getResultArray();
        $model= New StateModel();
        $data['state']= $model->get()->getResultArray();
         return view('job-seeker-space-form', $data);
    }
    //space post data
    public function JobSpaceform(){
         $db      = \Config\Database::connect();
        helper(['url', 'form']);
          $current_timestamp = strtotime("now");
        $data=[];
        $data=[
            'header'=>'Space Form',
            'spaceinformation'=>'Space Information',
            'product_name'=>'Product name',
            'product_image'=>'Product Image',
            'Price'=>'Price',
            'offerprice'=>'Offer Price',
            'State'=>'State',
            'City'=>'City',
            'Product_description'=>'Product Description',
            'Year_of_manufacturing'=>'Year of Manufacturing',
            'Product_video'=>'Product Video',
            'Area'=>'Area(sq. ft)',
            'Person'=>'Concerned Person Name',
            'Contact'=>'Contact',
            'E_mail'=>'E-mail address',
        ];
        $model= New StateModel();
        $data['state']= $model->get()->getResultArray();
        $request = service('request');
        $session=session();
        $id=$session->get('id');
        $file = $this->validate([
            'image' => [
                'uploaded[image]',
                'max_size[image,108000]',
            ],
            'product_name' => ['label' => 'Product Name', 'rules' => 'required'],   
            'price' => ['label' => 'Price', 'rules' => 'required'],
            'concerned_person_name' => ['label' => 'Name', 'rules' => 'required'],
            'contact_details' => ['label' => 'Contact', 'rules' => 'required'],
            'e-mail_address' => ['label' => 'Email', 'rules' => 'required'],
            'state' => ['label' => 'State', 'rules' => 'required'],
        ]);    
        if(!$file){          
            $data['validation']=$this->validator;
                 return view('job-seeker-space-form', $data);             
                }else{
            $img=$this->request->getFile('image');
            if($img->isValid() && !$img->hasMoved()){
            $newName=$img->getName().$current_timestamp;
            $img->move('./public/uploads/spaceimages', $newName);
            $image_name =  $newName;
            $image_type  = $img->getClientMimeType();
            }
            // videos
            $videos=$this->request->getFile('video');
            if($videos->isValid() && !$videos->hasMoved()){
            $VideoName=$videos->getName().$current_timestamp;
            $videos->move('./public/uploads/spacevideo', $VideoName);
            $video_name =  $VideoName;
            $video_type  = $videos->getClientMimeType();     
            }else{
              $video_name =  '';  
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
                    'product_price'=>$this->request->getVar('price'),
                    'offer_price'=>$this->request->getVar('offerprice'),
                    'file_image'=>$image_name,
                    'file_video'=>$video_name,  
                    'state'=>$state,
                    'city'=>$city,
                    'product_description'=>$this->request->getVar('product_description'),
                    'year_of_manufacturing'=>$this->request->getVar('year_of_manufacturing'),
                    'area_sq_ft'=>$this->request->getVar('area_sq_ft'),
                    'concerned_person_name'=>$this->request->getVar('concerned_person_name'),
                    'contact'=>$this->request->getVar('contact_details'),
                    'e-mail_address'=>$this->request->getVar('e-mail_address'),
                    'created_at'=>$currentTime 
                ];    
             $model= new JobSpace();
             $model->insert($data);
             $session->setFlashdata('success', 'Data Updated Successfully!');
            
             $inserted_id= $model->insertID();
             //images
              if (!empty($this->request->getFileMultiple('images'))) {
                           foreach($this->request->getFileMultiple('images') as $file)
                           {   
                           $newName=$file->getName().$current_timestamp;
                           $file->move('./public/uploads/Spaceimages', $newName);
   
                           $data = [
                           'session_id'=> $id,
                           'space_id'=>$inserted_id,    
                           'images' =>  $newName,
                           'images_type'  => $file->getClientMimeType()
                           ];
                            
                            $build= new JobseekerSpaceimg();
                             $build->insert($data);
                               $msg = 'Files have been successfully uploaded';
                           }
                           }
                // video
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
   
                           $uploadimage=$db->table('jobseeker_space_video');
                           $save = $uploadimage->insert($data);
                           $msg = 'Your product will be live shortly.';
                           }
   
                           } 
                           
             return redirect()->to(base_url('JobseekerSpace'));               
        }
    }
}
      
    