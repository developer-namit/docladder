<?php
namespace App\Controllers;
use App\Models\TransactionModel;
class RecruiterPayment extends BaseController
{
    public function index()
    {
  
     return view('packages'); 
    }
    public function savepaymentdata($DATA = [])
	{
	
	
	    if(!empty($this->request->getVar('razorpay_payment_id'))){
	        $razorpay= $this->request->getVar('razorpay_payment_id');
	    }else{
	        $razorpay=0;
	    }
	     if(!empty($this->request->getVar('name'))){
	        $name= $this->request->getVar('name');
	    }else{
	        $name='';
	    }
	    
	     if(!empty($this->request->getVar('totalyear'))){
	        $year= $this->request->getVar('totalyear');
	    }else{
	        $year='';
	    }
	    
	     if(!empty( $this->request->getVar('totalemail'))){
	        $email=  $this->request->getVar('totalemail');
	    }else{
	        $email='';
	    }
	    
	    if(!empty( $this->request->getVar('resume'))){
	        $resume=  $this->request->getVar('resume');
	    }else{
	        $resume='';
	    }
	    
	    if(!empty($this->request->getVar('amount'))){
	        $amount= $this->request->getVar('amount');
	    }else{
	        $amount='';
	    }
	    
	     if(!empty($this->request->getVar('posting'))){
	        $posting= $this->request->getVar('posting');
	    }else{
	        $posting='';
	    }
	    
		$session= session();
		$name = $name;
	    $email = $email;
	   // $contact = $this->request->getVar('contact');
		$amount = $amount;
		$resume = $resume;
		$year =$year;
		$posting=$posting;
		$pay_id= $razorpay;
		 $currentTime= date("y-m-d H:i:s");
		$registrationData=[];
		$registrationData = array(
			'session_id' => session()->get('id'),
			'razorpay_payment_id'=> $pay_id,
			'username' => $name,
			'amount' => $amount,
			'year' =>$year,
			'email'=> $email,
			'resume'=> $resume,
			'posting'=>$posting,
			'created_at'=>$currentTime
		);
	
		
		$model=  new TransactionModel();
	   $data=	 $model->insert($registrationData);

		
		$response=[];
		$response=[
		    'status'=>true,
		    'msg'=>'successfuly Updated',
		    'save'=>$data
		    ];
		echo  json_encode($response);
		// save this to database

	}

	/**
	 * This is a function called when payment successfull,
	 * and shows the success message
	 */
	public function success() {
		return view('payment-success');
		}  
	
		public function failed() {
		$data['title'] = 'payment Failed | docladder.com';  
		echo "<h4>Your transaction got Failed</h4>";            
		}
    
   
 
}