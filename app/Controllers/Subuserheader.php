<?php
namespace App\Controllers;
use App\Models\RecruiterModel;
class Subuserheader extends BaseController
{
    public function index()
    {
    $data=[];
    $user= new RecruiterModel();
    $user->where(['id'=>session()->get('id')]);
    $data['users']=$user->first();
//echo "<pre>"; print_r($data);
        return view('sub-user-header', $data);
            
        }
        // header page
        
    }