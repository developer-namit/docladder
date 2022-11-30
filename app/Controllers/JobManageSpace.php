<?php
namespace App\Controllers;
use App\Models\JobSpace;
use App\Models\StateModel;
use App\Models\CitiesModel;
use App\Models\SpaceImgModel;

class JobManageSpace extends BaseController
{
     public function index()
    {
        $data=[];
        helper(['url', 'form']);
        $request = service('request');
            $model= new Jobspace();
        $model->where('session_id', session()->get('id'));
        $data = [
            'space' => $model->paginate(10),
            'pager' => $model->pager,
            'currentPage' => $model->currentPage,
            ]; 
        // state
        if(!empty($data['space'])){
           foreach($data['space'] as $key=> $val){
            if($val['state'] > 0){
            $state= new StateModel();
            $state->where('id', $val['state']);
            $states= $state->get()->getRowArray();
           $data['space'][$key]['state_name']= $states['name'];
            } 
           //city
           $city= new CitiesModel();
           if($val['city'] > 0){
           $city->where(['state_id'=>$val['state'], 'id'=> $val['city']]);
           $cities= $city->get()->getRowArray();
           if(!empty($cities)){
             $data['space'][$key]['city_name']= $cities['name'];
            }else{
                $data['space'][$key]['city_name']= '';
            }
            }
           } 
        }
        
      return view('job-seeker-manage-space', $data);
    }

    public function Getspace(){
        $session= session();
        $session_id= $session->get('id');
        $current_timestamp = strtotime("now");
        $db      = \Config\Database::connect();
        $id= $_POST['id'];
        $model= New Jobspace();
        $model->where(['session_id'=> $session_id, 'id'=> $id]);
        $space=$model->get()->getRowArray();

        if(!empty($space['state'])){
        $state= new StateModel();
            $state->where('id', $space['state']);
            $states= $state->get()->getRowArray();
           $space['state_name']= $states['name'];
        }
            //city
            if($space['city']> 0){ 
           $city= new CitiesModel();
           $city->where(['state_id'=>$space['state'], 'id'=> $space['city']]);
           $cities= $city->get()->getRowArray();
           if(!empty($cities)){
            $space['city_name']= $cities['name'];
           }else{
            $space['city_name']= '';
           }
         
            }
            if(!empty($space['country'])){ 
            // all state
            $builder = $db->table('countries')->select('*');
            $builder->where('id',$space['country']);
            $country= $builder->get()->getRowArray(); 
            if(!empty($country)){
                $space['country_name']= $country['name'];
            }else{
                $space['country_name']= 0;
            }
        }
            // all images
            $builder = $db->table('jobseeker_space_images')->select('*');
            $builder->where(['session_id'=>$session_id, 'space_id'=>$id]);
            $images= $builder->get()->getResultArray(); 
            if(!empty($images)){
                foreach($images as $img){
                $space['images_name'][]= $img;
            }
            }else {
                $space['images_name']= 0;
            }
             // total count images
             $builder = $db->table('jobseeker_space_images')->selectCount('space_id');
            $builder->where(['session_id'=>$session_id, 'space_id'=>$id]);
            $images= $builder->get()->getRowArray(); 
            if(!empty($images)){
                $space['totalimages']= $images;
            }else {
                $space['totalimages']= 0;
            }
            
            // videos
            
             $builder = $db->table('jobseeker_space_video')->select('*');
            $builder->where(['session_id'=>$session_id, 'space_id'=>$id]);
            $videos= $builder->get()->getResultArray(); 
            if(!empty($videos)){
                foreach($videos as $video){
                $space['video_name'][]= $video;
            }
            }else {
                $space['video_name']= '';
            }
             // total count images
             $builder2 = $db->table('jobseeker_space_video')->selectCount('space_id');
            $builder2->where(['session_id'=>$session_id, 'space_id'=>$id]);
            $videos= $builder2->get()->getRowArray(); 
            if(!empty($videos)){
                $space['totalimages']= $videos;
            }else {
                $space['totalimages']= '';
            }
            
            
        //data   
        $data=[];
        if(!empty($space)){
            $data= $space;
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
        $cityModel->where('state_id', $space['state']);
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

    public function Editspace(){
        $request = service('request');
         $current_timestamp = strtotime("now");
        $session=session();
        $model= new Jobspace();
        $id= $this->request->getVar('id');
        $db      = \Config\Database::connect();
        $sessionid=$session->get('id');
        //images 
                $img=$this->request->getFile('imagefiles');
                if($img->isValid() && !$img->hasMoved()){
                    $build= New Jobspace();
                    $build->where(['session_id'=> $sessionid,'id'=>$id]);
                    $files=$build->first();        
                    $images=$files['file_image'];
                    unlink(FCPATH.'public/uploads/spaceimages'.'/'.$images);
                $newName=$img->getName().$current_timestamp;
            $img->move('./public/uploads/spaceimages', $newName);
            $image_name =  $newName;
            $image_type  = $img->getClientMimeType();
        }else{
            $model= new Jobspace();
            $model->where(['id'=>$id, 'session_id'=>$sessionid]);
            $dataimg= $model->get()->getRowArray();
            $image_name=$dataimg['file_image'];                   
        }
        
            // videos
            $videos=$this->request->getFile('videofiles');
            if($videos->isValid() && !$videos->hasMoved()){
                $videos=$this->request->getFile('videofiles');            
                $VideoName=$videos->getName().$current_timestamp;
                $videos->move('./public/uploads/spacevideo', $VideoName);
                $video_name =  $VideoName;
                $video_type  = $videos->getClientMimeType();
                 $build= New Jobspace();
                     $build->where(['session_id'=> $sessionid,'id'=>$id]);
                    $filesvideo=$build->first();
                    $uploadvideo=$filesvideo['file_video'];
                    if(!empty($uploadvideo))
                    unlink(FCPATH.'public/uploads/spacevideo'.'/'.$uploadvideo);    
            }
            else{
                $model= new Jobspace();
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
                 'product_name'=>$this->request->getVar('product_name'),
                    'product_price'=>$this->request->getVar('price'),
                    'offer_price'=>$this->request->getVar('offer_price'),
                    'file_image'=>$image_name,
                    'file_video'=>$video_name,  
                    'state'=>$state,
                    'city'=>$city,
                    'product_description'=>$this->request->getVar('product_description'),
                    'year_of_manufacturing'=>$this->request->getVar('year_of_manufacturing'),
                    'area_sq_ft'=>$this->request->getVar('sq_ft'),
                    'concerned_person_name'=>$this->request->getVar('concerned_person_name'),
                    'contact'=>$this->request->getVar('contact'),
                    'e-mail_address'=>$this->request->getVar('email_address'),
                    'created_at'=>$currentTime                   
             ];
             $model= new Jobspace();
             $model->Updatspace($id,$sessionid,$data);
               // multiple images
                $img=[];
              if (!empty($this->request->getFileMultiple('images'))) {
                        foreach($this->request->getFileMultiple('images') as $file)
                        {   
                        $newName=$file->getName().$current_timestamp;
                        $file->move('./public/uploads/Spaceimages', $newName);
                        $img = [
                        'session_id'=> $sessionid,    
                        'space_id'=>$id,    
                        'images' =>  $newName,
                        'images_type'  => $file->getClientMimeType()
                        ];
                        $uploadimage= New SpaceImgModel();
                        $builder = $db->table('jobseeker_space_images')->selectCount('space_id');
                        $builder->where(['session_id'=>$sessionid, 'space_id'=>$id]);
                        $images= $builder->get()->getRowArray(); 
                        if($images['space_id']>=6){
                            $msg = 'At least six images can be updated.';
                        }else{
                        $save = $uploadimage->insert($img);
                        $msg = 'Files have been successfully uploaded';
                        }
                            
                        }
                        }
                // video
                 if (!empty($this->request->getFileMultiple('video_name'))) {
                           foreach($this->request->getFileMultiple('video_name') as $file)
                           {   
                           $newName=$file->getName().$current_timestamp;
                           $file->move('./public/uploads/Spacevideos', $newName);
   
                           $data = [
                           'space_id'=>$id,  
                           'session_id'=> $sessionid,
                           'video' =>  $newName,
                           'video_type'  => $file->getClientMimeType()
                           ];
   
                           $uploadimage=$db->table('jobseeker_space_video');
                           $save = $uploadimage->insert($data);
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
        $build= New Jobspace();
        $build->where(['session_id'=> $session_id, 'id'=> $id]);
        $img=$build->first();
         $image_name=$img['file_image'];
         $video_name=$img['file_video'];
         if(!empty($image_name)){
         unlink(FCPATH.'public/uploads/spaceimages'.'/'.$image_name);
         }else if(!empty($video_name)){
            unlink(FCPATH.'public/uploads/spacevideo'.'/'.$video_name);  
         }
        $model= New Jobspace();
                $model->where(['session_id'=> $session_id, 'id'=> $id]);
                $del= $model->delete();
                echo json_encode($del);  
         }
        
        // select all multipal data
    public function multidelete(){
        $uid= $_POST['id'];
        $session_id= session()->get('id');
            $model= New Jobspace();
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
       $build= New SpaceImgModel();
        $build->where(['session_id'=> $session_id, 'id'=> $id]);
        $img=$build->first();        
         $images=$img['images'];
        unlink(FCPATH.'public/uploads/Spaceimages'.'/'.$images);
         $model= New SpaceImgModel();
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
// remove videos
public function removevideo(){
     $db      = \Config\Database::connect();
        $session= session();
       $session_id= $session->get('id');
       $id= $this->request->getVar('id');
       $build= $db->table('jobseeker_space_video');
        $build->where(['session_id'=> $session_id, 'id'=> $id]);
        $video=$build->get()->getRowArray();        
         $videos=$video['video'];
        unlink(FCPATH.'public/uploads/Spacevideos'.'/'.$videos);
         $model= $db->table('jobseeker_space_video');
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
      
    