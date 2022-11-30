<?php
namespace App\Controllers;
use App\Models\ContactModel;
class Contactus extends BaseController
{
    public function index()
    {
        return view('contact-us');
    }
    // submit contact us form

    public function contact_form(){
        helper(['url', 'form']);
        if($this->request->getMethod()== 'post'){
            $inputs = $this->validate([
                'username' => ['label' => 'Name', 'rules' => 'required|min_length[5]'],
                'email' => ['label' => 'Email', 'rules' => 'required|min_length[6]|max_length[50]'],
                'message' => ['label' => 'message', 'rules' => 'required'],
                'phone' => ['label' => 'Mobile number', 'rules' => 'required|numeric|regex_match[/^[0-9]{10}$/]'],
            ]);
        
    
            $data['validation']= $this->validator;
            if (!$inputs) {
                return view('contact-us', $data);
            }else{
            $data=[
                'name'=> $this->request->getVar('username'),
                'email_id'=> $this->request->getVar('email'),
                'message'=> $this->request->getVar('message'),
                'contact_no'=> $this->request->getVar('phone'),
            ];

            $message='<html>
            <head>
              <title>GREAT DEALS ON EQUIPMENT FROM BEST BRANDS</title>
            </head>
            <body>
               <table style="border-bottom: 1px solid #ddd;">
                <tr>
                  <th> Name</th>
                  <th>Email ID</th>
                  <th>Contact No</th>
                  <th>Message</th>
                </tr>
                <tr>';
                $message.='<td>'.$data['name'].'</td>';
                $message.='<td>'.$data['email_id'].'</td>';
                $message.='<td>'.$data['contact_no'].'</td>';
                $message.='<td>'.$data['message'].'     
                </tr>
              </table>
            </body>
            </html>
            ';
        
                $email = \Config\Services::email();                         
                $email->setFrom($data['email_id']);
                $email->setTo('docladder@vertosys.com');
                $email->setSubject('Docladder');
                $email->setMessage($message);             
                $email->send();
                if ($email->send()) 
                {
                echo 'Email successfully sent';
                } 
                else 
                {
                $emaidata = $email->printDebugger(['headers']);
                 //print_r($emaildata);
                 }


            $model= New ContactModel();
             $model->insert($data);
          $response=[
            'status'=>true,
            'msg'=>'successfuly Update',
            ];
         echo json_encode($response);
    }
        }
    }

    public function  newsletter(){
        helper(['url', 'form']);
        $model= New ContactModel();
            if($model->check_newsletter($this->request->getVar('email'))){
              $response = [
            'success' => false,
            'msg' => 'Email id already exit.'
            ];  
            }else{
            $data=[
                'email_id'=> $this->request->getVar('email')
            ];
             $model->newsletter($data);
              $response = [
            'success' => true,
            'msg' => 'You have been subscribed'
            ];

            }
           
 return $this->response->setJSON($response);

}
}