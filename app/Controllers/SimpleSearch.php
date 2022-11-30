<?php
namespace App\Controllers;
use App\Models\StateModel;
class SimpleSearch extends BaseController
{
    public function index()
    {
    $data=[];
        helper(['url', 'form']);
        $request = service('request');

        return view('simple-search', $data);
    }
    // simple search
    public function SimpleSearching(){
        helper(['url', 'form']);
        $request = service('request');
        $db = \Config\Database::connect();
        $searching= $db->table('jobposting');
        $searching->select('*');

        echo "<pre>"; print_r($_POST);
    }
    
    
    // advance search 
    public function advancesearch(){
       return view('advance-search');  
    }
    
  public function savesearch(){
       return view('saved-search');  
    }
    
}