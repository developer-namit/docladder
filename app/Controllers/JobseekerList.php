<?php
namespace App\Controllers;
class JobseekerList extends BaseController
{
    public function index(){
       
        return view('category-listing');   
        
    }
}