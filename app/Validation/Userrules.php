<?php
namespace App\Validation;
use App\Models\RecruiterModel;
use App\Models\ManageSubModel;
use App\Models\JobSeekerModel;
use App\Models\SignupModel;
class Userrules{

  public function validateUser(string $str, string $fields, array $data){
    $model = new RecruiterModel();
    $getdata = ['email_address' => $data['email'], 'password' => md5($data['password'])];
    $user = $model->where($getdata)->first();
     if(!$user){
      return false;
   }
}
// job seeking
public function validateJobUser(string $str, string $fields, array $data){
  $model = new JobSeekerModel();
  $getdata = ['email_id' => $data['email'], 'password' => md5($data['password'])];
  $user = $model->where($getdata)->first();
   if(!$user){
    return false;
 }
}

// signup

public function validatesign(string $str, string $fields, array $data){
  $model = new SignupModel();
  $getdata = ['email_id' => $data['email'], 'password' => md5($data['password'])];
  $user = $model->where($getdata)->first();
   if(!$user){
    return false;
 }
}



}
?>