<?php
namespace App\Controllers;
use App\Models\SpaceModel;
use App\Models\StateModel;
use App\Models\CitiesModel;
use App\Models\SpaceMIModel;
class ManageSpace extends BaseController
{
    public function index()
    {
        $data=[];
        helper(['url', 'form']);
        $request = service('request');
            $model= new SpaceModel();
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
           if($val['city'] > 0){
           $city= new CitiesModel();       
           $city->where(['state_id'=>$val['state'], 'id'=> $val['city']]);
           $cities= $city->get()->getRowArray();
           if(!empty($cities)){
             $data['space'][$key]['city_name']= $cities['name'];
            }else{
                $data['space'][$key]['city_name']= 'not found';
            }
            }
           } 
        }
        // echo "<pre>"; print_r($data);
        return view('manage-space', $data);
    }
//get view page data
    public function GetSpace(){
        $session= session();
        $session_id= $session->get('id');
        $db      = \Config\Database::connect();
        $id= $_POST['id'];
        $model= New SpaceModel();
        $model->where(['session_id'=> $session_id, 'id'=> $id]);
        $space=$model->get()->getRowArray();

        if($space['state']> 0){
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
            $space['city_name']='';
        }
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
        //images
          $builder = $db->table('recruiter_space_image')->select('*');
            $builder->where(['session_id'=>$session_id, 'space_id'=>$id]);
            $images= $builder->get()->getResultArray(); 
            if(!empty($images)){
                $data['images_name'][]= $images;
            }else {
                $data['images_name']= 0;
            }
        
        
           
        echo json_encode($data);
    }

    public function EditSpace(){
        $request = service('request');
         $current_timestamp = strtotime("now");
          $db      = \Config\Database::connect();
        $session=session();
        $model= new SpaceModel();
        $id= $this->request->getVar('id');
        $sessionid=$session->get('id');
        //images 

                $img=$this->request->getFile('imagefiles');
                if($img->isValid() && !$img->hasMoved()){
                //remove img
                $build= new SpaceModel();
                    $build->where(['session_id'=> $sessionid,'id'=>$id]);
                    $files=$build->first();        
                    $images=$files['file_image'];
                    unlink(FCPATH.'public/uploads/spaceimages'.'/'.$images);
            $newName=$img->getName().$current_timestamp;
            $img->move('./public/uploads/spaceimages', $newName);
            $image_name =  $newName;
            $image_type  = $img->getClientMimeType();
        }else{
            $model= new SpaceModel();
            $model->where(['id'=>$id, 'session_id'=>$sessionid]);
            $dataimg= $model->get()->getRowArray();
            if(!empty($dataimg)){
            $image_name=$dataimg['file_image'];
           }else{
            $image_name='';
           }                   
        }
            // videos
            
            $videos=$this->request->getFile('videofiles');
            if($videos->isValid() && !$videos->hasMoved()){
            $VideoName=$videos->getName().$current_timestamp;
            $videos->move('./public/uploads/spacevideo', $VideoName);
            $video_name =  $VideoName;
            $video_type  = $videos->getClientMimeType();
             $build= New SpaceModel();
                    $build->where(['session_id'=> $sessionid,'id'=>$id]);
                    $filesvideo=$build->first();
                    $uploadvideo=$filesvideo['file_video'];
                    if(!empty($uploadvideo))
                    unlink(FCPATH.'public/uploads/spacevideo'.'/'.$uploadvideo); 
            }else{
                $model= new SpaceModel();
                $model->where(['id'=>$id, 'session_id'=>$sessionid]);
                $dataimg= $model->get()->getRowArray();
                if(!empty($dataimg)){
                $video_name=$dataimg['file_video'];
            }
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
                 'product_price'=>$this->request->getVar('price'),
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
                 'offer_price'=>$this->request->getVar('offer_price'),
                 'created_at'=>$currentTime                   
             ];
             $model= new SpaceModel();
             $res= $model->Updatspace($id,$sessionid,$data);
             $session = session();
             $session->setFlashdata('success', 'Successful Update Data!');
              // multiple images
                $img=[];
              if (!empty($this->request->getFileMultiple('images'))) {
                        foreach($this->request->getFileMultiple('images') as $file)
                        {   
                        $newName=$file->getName().$current_timestamp;
                        $file->move('./public/uploads/Spaceimages', $newName);
                        $img = [
                        'space_id'=>$id,    
                        'session_id'=> $sessionid,
                        'images' =>  $newName,
                        'images_type'  => $file->getClientMimeType()
                        ];
                        $uploadimage= New SpaceMIModel();
                        $builder = $db->table('recruiter_space_image')->selectCount('space_id');
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
             $response = [
            'success' => true,
            'msg' => "Sent Successfully!",
            ];
             
             
             
        echo json_encode($res);
    }

    // delete
    public function deletedata(){
        $session= session();
        $session_id= $session->get('id');
        $id= $_POST['id'];
        $model= New SpaceModel();
                $model->where(['session_id'=> $session_id, 'id'=> $id]);
                $del= $model->delete();
                echo json_encode($del);  
        }
        // select all multipal data
    public function multidelete(){
        $uid= $_POST['id'];
        $session_id= session()->get('id');
            $model= New SpaceModel();
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
       $build= New SpaceMIModel();
        $build->where(['session_id'=> $session_id, 'id'=> $id]);
        $img=$build->first();        
         $images=$img['images'];
        unlink(FCPATH.'public/uploads/Spaceimages'.'/'.$images);
         $model= New SpaceMIModel();
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
      
    