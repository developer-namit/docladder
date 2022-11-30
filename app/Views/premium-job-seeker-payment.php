<?= $this->include('jobseeker-header') ?>
<!--=================================
Header -->
<!--=================================
Register -->
<section class="space-ptb-outer bg-light recruiter-job-posting">
  <div class="container">
        <div class="row justify-content-center job-seeker-profile">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                      <div><h2 class="main-site-title text-center sub-title-bg mb-3"><span>Benefits</span></h2></div>
                      <div class="box-2 box-shadow mb-3">
                         <div id="jobDescriptionText" class="jobDescriptionText pb-3">
                              <ul class="bullets">
                                <li>Candidate profile will be visible on portal's home page.</li>
                                <li>If any recruiter searches any of the specialization then upgraded resumes will be display on top.</li>
                                <li>Jobseeker can access the live sessions.</li>
                                <li>Posting of equipment & space will be shown on top.</li>
                                <li>Free notification will be send by admin related to his/her profile regarding job.</li>
                                <li>Get best Packages in the industry.</li>
                            </ul>
                          </div>
                      </div>
                     
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-4">
                      <div><h2 class="main-site-title text-center sub-title-bg mb-3"><span>Payment Details</span></h2></div>
                       <div class="box-2 box-shadow">
                        <div class="job-seeker-fees">
                          <h3 class="mb-3">One time fees for Job Seekers </h3>
                             <ul class="list-unstyled mb-0 job-seeker-fees">
                              <li><span><i class="fas fa-check"></i></span> Doctors/ CEO/ COO/ EF - <i class="fas fa-rupee-sign ps-1"></i> 1000
                              <input type="hidden" name="oneamount" value="1000" id="amount">
                               <input type="hidden" name="suser" value="<?php echo session()->get('firstname');?>" id="username">
                               <a class="btn btn-secondary main-btn" href="#" onclick="razorpaydoctor(this.value)">Pay</a>
                              </li>
                              <li><span><i class="fas fa-check"></i></span> Administration - <i class="fas fa-rupee-sign ps-1"></i> 750
                              <input type="hidden" name="oneamount" value="750" id="addamount">
                              <input type="hidden" name="suser" value="<?php echo session()->get('firstname');?>" id="adminname">
                              <a class="btn btn-secondary main-btn" href="#" onclick="razorpayadmin(this.value)">Pay</a>
                              </li>
                              <li><span><i class="fas fa-check"></i></span> Paramedical Staff - <i class="fas fa-rupee-sign ps-1"></i> 500
                              <input type="hidden" name="paraamount" value="500" id="paraamount">
                              <input type="hidden" name="suser" value="<?php echo session()->get('firstname');?>" id="paraname">
                              <a class="btn btn-secondary main-btn" href="#" onclick="razorpayparamedical(this.value)">Pay</a>
                              </li>
                           </ul>
                         </div>
                     </div>
                    
                    
                    
                    </div>
                  </div>
                    
                </div>
                    
                
            </div>
        </div>
  </div>
</section>
<!--=================================
Register -->


<!--=================================
Footer-->
<?= $this->include('jobseeker-footer') ?>
<!--=================================
Footer-->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<link rel="manifest" href="/manifest.json">
<link rel="manifest" href="manifest.webmanifest">
<script>
    function razorpaydoctor(){
        var amount =$('#amount').val();
          var username =$('#adminname').val();
        var url= '<?php echo base_url();?>';
      
var options = {
    "key": "rzp_test_3zV3BLzKJQcDAB", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": name,
    "description": "Transaction",
    "image": "<?php echo base_url();?>/public/assets/images/Docladder-final-logo.png",
    // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        console.log(response);
        var payment_id = response.razorpay_payment_id;
        $.ajax({
        url: url +'/JobseekerPayment/savepaymentdata',
        type: 'post',
        dataType: 'json',
        data: {
        razorpay_payment_id: payment_id,amount:amount, username:username}, 
        success: function (data) {
        console.log(data);
        window.location.href = url + '/JobseekerPayment/success';
        }
        });
        }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        }
</script>

<script>
    function razorpayadmin(){
        var amount =$('#addamount').val();
          var username =$('#username').val();
        var url= '<?php echo base_url();?>';
      
var options = {
    "key": "rzp_test_3zV3BLzKJQcDAB", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": name,
    "description": "Transaction",
    "image": "<?php echo base_url();?>/public/assets/images/Docladder-final-logo.png",
    // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        console.log(response);
        var payment_id = response.razorpay_payment_id;
        $.ajax({
        url: url +'/JobseekerPayment/savepaymentdata',
        type: 'post',
        dataType: 'json',
        data: {
        razorpay_payment_id: payment_id,amount:amount, username:username}, 
        success: function (data) {
        console.log(data);
        window.location.href = url + '/JobseekerPayment/success';
        }
        });
        }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        }
</script>

<script>
    function razorpayparamedical(){
        var amount =$('#paraamount').val();
          var username =$('#paraname').val();
        var url= '<?php echo base_url();?>';
      
var options = {
    "key": "rzp_test_3zV3BLzKJQcDAB", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": name,
    "description": "Transaction",
    "image": "<?php echo base_url();?>/public/assets/images/Docladder-final-logo.png",
    // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        console.log(response);
        var payment_id = response.razorpay_payment_id;
        $.ajax({
        url: url +'/JobseekerPayment/savepaymentdata',
        type: 'post',
        dataType: 'json',
        data: {
        razorpay_payment_id: payment_id,amount:amount, username:username}, 
        success: function (data) {
        console.log(data);
        window.location.href = url + '/JobseekerPayment/success';
        }
        });
        }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        }
</script>


