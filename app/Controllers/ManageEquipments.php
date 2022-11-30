<?php
namespace App\Controllers;
use App\Models\EquipmentModel;
use App\Models\StateModel;
use App\Models\CitiesModel;
use App\Models\EquipmentImgModel;

class ManageEquipments extends BaseController
{
    public function index()
    {
        $data=[];
        helper(['url', 'form']);
        $request = service('request');
            $model= new EquipmentModel();
        $model->where('session_id', session()->get('id'));
        $data = [
            'equipment' => $model->paginate(10),
            'pager' => $model->pager,
            'currentPage' => $model->currentPage,
            ]; 
        // state
        if(!empty($data['equipment'])){
           foreach($data['equipment'] as $key=> $val){
            if($val['state'] > 0){
            $state= new StateModel();
            $state->where('id', $val['state']);
            $states= $state->get()->getRowArray();
           $data['equipment'][$key]['state_name']= $states['name'];
            } 
           //city
           $city= new CitiesModel();
           if($val['city'] > 0){
           $city->where(['state_id'=>$val['state'], 'id'=> $val['city']]);
           $cities= $city->get()->getRowArray();
           if(!empty($cities)){
             $data['equipment'][$key]['city_name']= $cities['name'];
            }else{
                $data['equipment'][$key]['city_name']= '';
            }
            }
           } 
        }
        
        return view('manage-equipments', $data);
    }

    public function GetEquipment(){
        $session= session();
        $session_id= $session->get('id');
        $db      = \Config\Database::connect();
        $id= $_POST['id'];
        $model= New EquipmentModel();
        $model->where(['session_id'=> $session_id, 'id'=> $id]);
        $equipment=$model->get()->getRowArray();

        if(!empty($equipment['state'])){
        $state= new StateModel();
            $state->where('id', $equipment['state']);
            $states= $state->get()->getRowArray();
           $equipment['state_name']= $states['name'];
        }
            //city
            if($equipment['city']> 0){ 
           $city= new CitiesModel();
           $city->where(['state_id'=>$equipment['state'], 'id'=> $equipment['city']]);
           $cities= $city->get()->getRowArray();
           if(!empty($cities)){
            $equipment['city_name']= $cities['name'];
           }else{
            $equipment['city_name']= '';
           }
         
            }
            if(!empty($equipment['country'])){ 
            // all state
            $builder = $db->table('countries')->select('*');
            $builder->where('id',$equipment['country']);
            $country= $builder->get()->getRowArray(); 
            if(!empty($country)){
                $equipment['country_name']= $country['name'];
            }else{
                $equipment['country_name']= 0;
            }
        }
            // all images
            $builder = $db->table('recruiter_equipment_images')->select('*');
            $builder->where(['session_id'=>$session_id, 'equipment_id'=>$id]);
            $images= $builder->get()->getResultArray(); 
            if(!empty($images)){
                $equipment['images_name'][]= $images;
            }else {
                $equipment['images_name']= 0;
            }
             // total count images
             $builder = $db->table('recruiter_equipment_images')->selectCount('equipment_id');
            $builder->where(['session_id'=>$session_id, 'equipment_id'=>$id]);
            $images= $builder->get()->getRowArray(); 
            if(!empty($images)){
                $equipment['totalimages']= $images;
            }else {
                $equipment['totalimages']= 0;
            }
            // videos 
            $builder = $db->table('recruiter_equipment_videos')->select('*');
            $builder->where(['session_id'=>$session_id, 'equipment_id'=>$id]);
            $video= $builder->get()->getResultArray(); 
            if(!empty($video)){
                $equipment['video_name'][]= $video;
            }else {
                $equipment['video_name']= 0;
            }
            
        //data   
        $data=[];
        if(!empty($equipment)){
            $data= $equipment;
        }else{
            $data= true;
        }
        // images
       // get all state
       $statemodel= new StateModel();
       $Sm= $statemodel->get()->getResultArray();
       if(!empty($Sm)){
        $data['getstates']= $Sm;
       }else{
        $data['getstates']='';
       }
        $cityModel= new CitiesModel();
        $cityModel->where('state_id', $equipment['state']);
        $cd= $cityModel->get()->getResultArray();
        if(!empty($cd)){
            $data['getcities']= $cd;
        }else{
            $data['getcities']='';
        }

        //countries
        $db      = \Config\Database::connect();
        $builder = $db->table('countries');
       $data['counties']= $builder->get()->getResultArray();
       
        echo json_encode($data);
    }

    public function EditEquipment(){
         $current_timestamp = strtotime("now");
        $request = service('request');
        $session=session();
        $model= new EquipmentModel();
        $id= $this->request->getVar('id');
        $db      = \Config\Database::connect();
        $sessionid=$session->get('id');
        //images 
                $img=$this->request->getFile('imagefiles');
                if($img->isValid() && !$img->hasMoved()){
                    $build= New EquipmentModel();
                    $build->where(['session_id'=> $sessionid,'id'=>$id]);
                    $files=$build->first();        
                    $images=$files['file_image'];
                    unlink(FCPATH.'public/uploads/equipmentimages'.'/'.$images);
                $newName=$img->getName().$current_timestamp;
            $img->move('./public/uploads/equipmentimages', $newName);
            $image_name =  $newName;
            $image_type  = $img->getClientMimeType();
        }else{
            $model= new EquipmentModel();
            $model->where(['id'=>$id, 'session_id'=>$sessionid]);
            $dataimg= $model->get()->getRowArray();
            $image_name=$dataimg['file_image'];                   
        }
        
            // videos
            $videos=$this->request->getFile('videofiles');
            if($videos->isValid() && !$videos->hasMoved()){
                $videos=$this->request->getFile('videofiles');            
                $VideoName=$videos->getName().$current_timestamp;
                $videos->move('./public/uploads/equipmentvideos', $VideoName);
                $video_name =  $VideoName;
                $video_type  = $videos->getClientMimeType();
                 $build= New EquipmentModel();
                    $build->where(['session_id'=> $sessionid,'id'=>$id]);
                    $filesvideo=$build->first();
                    $uploadvideo=$filesvideo['file_video'];
                    if(!empty($uploadvideo))
                    unlink(FCPATH.'public/uploads/equipmentvideos'.'/'.$uploadvideo);    
            }
            else{
                $model= new EquipmentModel();
                $model->where(['id'=>$id, 'session_id'=>$sessionid]);
                $dataimg= $model->get()->getRowArray();
                $video_name=$dataimg['file_video'];   
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

                // data
             $data=[
                 'product_name'=>$this->request->getVar('product_name'),
                 'product_price'=>$this->request->getVar('product_price'),
                 'file_image'=>$image_name,
                 'file_video'=>$video_name,  
                 'state'=>$state,
                 'city'=>$city,
                 'product_description'=>$this->request->getVar('product_description'),
                 'year_of_manufacturing'=>$this->request->getVar('year_of_manufacturing'),
                 'contact_details'=>$this->request->getVar('contact_details'),
                 'concerned_person_name'=>$this->request->getVar('concernedperson_name'),
                 'contact'=>$this->request->getVar('getcontact'),
                 'e-mail_address'=>$this->request->getVar('email_address'),
                 'country'=>$country,
                 'created_at'=>$currentTime                   
             ];
             $model= new EquipmentModel();
             $model->Updatdata($id,$sessionid,$data);
               // multiple images
                $img=[];
              if (!empty($this->request->getFileMultiple('images'))) {
                        foreach($this->request->getFileMultiple('images') as $file)
                        {   
                        $newName=$file->getName().$current_timestamp;
                        $file->move('./public/uploads/Equipmentimages', $newName);
                        $img = [
                        'equipment_id'=>$id,    
                        'session_id'=> $sessionid,
                        'images' =>  $newName,
                        'images_type'  => $file->getClientMimeType()
                        ];
                        $uploadimage= New EquipmentImgModel();
                        $builder = $db->table('recruiter_equipment_images')->selectCount('equipment_id');
                        $builder->where(['session_id'=>$sessionid, 'equipment_id'=>$id]);
                        $images= $builder->get()->getRowArray(); 
                        if($images['equipment_id']>=6){
                            $msg = 'At least six images can be updated.';
                        }else{
                        $save = $uploadimage->insert($img);
                        $msg = 'Files have been successfully uploaded';
                        }
                            
                        }
                        }
             $response = [
            'success' => true,
            'msg' => "Sent Successfully!",
            ]; 
            return $this->response->setJSON($response);
    }

    // delete
    public function deletedata(){
        $session= session();
        $session_id= $session->get('id');
        $id= $_POST['id'];
        //images
        $build= New EquipmentModel();
        $build->where(['session_id'=> $session_id, 'id'=> $id]);
        // $img=$build->first();
        //  $image_name=$img['file_image'];
        //  $video_name=$img['file_video'];
        //  if(!empty($image_name)){
        //  unlink(FCPATH.'public/uploads/equipmentimages'.'/'.$image_name);
        //  }else if(!empty($video_name)){
        //     unlink(FCPATH.'public/uploads/equipmentvideos'.'/'.$video_name);  
        //  }
        $model= New EquipmentModel();
                $model->where(['session_id'=> $session_id, 'id'=> $id]);
                $del= $model->delete();
                echo json_encode($del);  
         }
        
        // select all multipal data
    public function multidelete(){
        $uid= $_POST['id'];
        $session_id= session()->get('id');
            $model= New EquipmentModel();
            $model->where('session_id', $session_id);
            $model->whereIn('id', $uid);
        $delete= $model->delete(); 
        $res=[];
        if($delete){
                $res = 'Selected users have been deleted successfully.';
            }else{
                $res = 'Some problem occurred, please try again.';
            }
        echo json_encode($res);
        }
//add more images remove
public function removeimg(){
        $session= session();
       $session_id= $session->get('id');
       $id= $this->request->getVar('id');
       $build= New EquipmentImgModel();
        $build->where(['session_id'=> $session_id, 'id'=> $id]);
        $img=$build->first();        
         $images=$img['images'];
        unlink(FCPATH.'public/uploads/Equipmentimages'.'/'.$images);
         $model= New EquipmentImgModel();
           $model->where(['session_id'=> $session_id, 'id'=> $id]);
          $del= $model->delete();
              
        $res=[];
        if($del){
                $res = 'Selected users have been deleted successfully.';
            }else{
                $res = 'Some problem occurred, please try again.';
            }
        return $this->response->setJSON($res);
               
    }
}
      
    