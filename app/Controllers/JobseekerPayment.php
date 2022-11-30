<?php
namespace App\Controllers;
use App\Models\SeekerTreansactionModel;
class JobseekerPayment extends BaseController
{
    public function index()
    {
  
     return view('premium-job-seeker-payment'); 
    }
    public function savepaymentdata()
	{
		$session= session();
		$name = $this->request->getVar('username');
	   $amount = $this->request->getVar('amount');
		$pay_id= $this->request->getVar('razorpay_payment_id');
		 $currentTime= date("y-m-d H:i:s");
		$registrationData=[];
		$registrationData = array(
			'session_id' => session()->get('id'),
			'razorpay_payment_id'=> $pay_id,
			'username' => $name,
			'amount' => $amount,
			'created_at'=>$currentTime
		);
		$model=  new SeekerTreansactionModel();
	   $data=	 $model->insert($registrationData);
		echo  json_encode($data);
		// save this to database

	}

	/**
	 * This is a function called when payment successfull,
	 * and shows the success message
	 */
	public function success() {
		return view('seeker-success');
		}  
	
		public function failed() {
		$data['title'] = 'payment Failed | docladder.com';  
		echo "<h4>Your transaction got Failed</h4>";            
		}
    
   
 
}