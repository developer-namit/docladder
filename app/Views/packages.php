<?= $this->include('recruiter-header') ?>
<!--=================================
header
Register -->
<!--=================================
Plans&and Packages -->
<section class="space-ptb-outer bg-light recruiter-homepage">
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-lg-12 mb-3"><h2 class="main-site-title sub-title-bg ms-2 text-center"><span>Packages</span></h2></div>
           </div>
       <div class="row align-items-center">
          
         <div class="col-lg-12 pt-0 pt-md-3 pt-lg-0">
           <div class="row g-0">
               <div class="col-md-3 text-center">
               <div class="pricing-plan">
                 <div class="pricing-price">
                   <span><sup><i class="fas fa-rupee-sign"></i></sup><strong>1L</strong>/yearly</span>
                    <input type="hidden" name="oneyear" value="12" id="oneyear">
                   <input type="hidden" name="oneamount" value="65000" id="yearamount">
                    <input type="hidden" name="yearemail" value="200000" id="yearemail">
                   <input type="hidden" name="jobposting" value="3000" id="jobposting">
                    <input type="hidden" name="oneresume" value="20000" id="oneresume">
                   <input type="hidden" name="suser" value="<?php echo session()->get('firstname');?>" id="yearuser">
                   <h5 class="pricing-title mb-0 mt-2">One Year Plan</h5>
                 </div>
                 <ul class="list-unstyled pricing-list">
                    <li><span><i class="fas fa-check"></i></span> 120000 Resumes </li>
                    <li><span><i class="fas fa-check"></i></span> 12 Lacs Email</li>
                    <li><span><i class="fas fa-check"></i></span> 17500 Job Posting</li>
                    
                 </ul>
                 <a class="btn btn-secondary main-btn" href="#" onclick="razorpayoneyear(this.value)">Select Plan</a>
               </div>
             </div>
               
               
               
               
               
               
             <div class="col-md-3 text-center">
               <div class="pricing-plan">
                 <div class="pricing-price">
                   <span><sup><i class="fas fa-rupee-sign"></i></sup><strong>65k</strong>/Half-yearly</span>
                    <input type="hidden" name="syear" value="6" id="sixmonth">
                   <input type="hidden" name="samount" value="65000" id="samount">
                    <input type="hidden" name="semail" value="200000" id="semail">
                   <input type="hidden" name="jobposting" value="3000" id="sjobposting">
                    <input type="hidden" name="sresume" value="20000" id="sresume">
                   <input type="hidden" name="suser" value="<?php echo session()->get('firstname');?>" id="suser">
                   <h5 class="pricing-title mb-0 mt-2">6 Months Plan</h5>
                 </div>
                 <ul class="list-unstyled pricing-list">
                    <li><span><i class="fas fa-check"></i></span> 20000 Resumes </li>
                    <li><span><i class="fas fa-check"></i></span> 2 Lacs Email</li>
                    <li><span><i class="fas fa-check"></i></span> 7500 Job Posting</li>
                    
                 </ul>
                 <a class="btn btn-secondary main-btn" href="#" onclick="razorpaysixmonths(this.value)">Select Plan</a>
               </div>
             </div>
             <div class="col-md-3 text-center">
               <div class="pricing-plan mb-0 mb-md-3">
                 <div class="pricing-price">
                   <span><sup><i class="fas fa-rupee-sign"></i></sup><strong>45k</strong>/Quarterly</span>
                    <input type="hidden" name="threemonths" value="3" id="threemonths">
                   <input type="hidden" name="tamount" value="45000" id="tamount">
                    <input type="hidden" name="temail" value="50000" id="temail">
                  <input type="hidden" name="jobposting" value="3000" id="tjobposting">
                    <input type="hidden" name="resume" value="10000" id="tresume">
                   <input type="hidden" name="tuser" value="<?php echo session()->get('firstname');?>" id="tuser">
                   <h5 class="pricing-title mb-0 mt-2">3 Months Plan</h5>
                 </div>
                 <ul class="list-unstyled pricing-list">
                    <li><span><i class="fas fa-check"></i></span> 10000 Resumes </li>
                    <li><span><i class="fas fa-check"></i></span> 50000 Email</li>
                    <li><span><i class="fas fa-check"></i></span> 17500 Job Posting</li>
                 </ul>
                  <a class="btn btn-secondary main-btn" href="#" onclick="razorpaythreemonths(this.value)">Select Plan</a>
               </div>
             </div>
             <div class="col-md-3 text-center">
               <div class="pricing-plan">
                 <div class="pricing-price">
                   <span><sup><i class="fas fa-rupee-sign"></i></sup><strong>25k</strong>/Monthly</span>
                    <input type="hidden" name="oyear" value="1" id="onemonth">
                   <input type="hidden" name="oamount" value="25000" id="oamount">
                    <input type="hidden" name="0email" value="15000" id="oemail">
                  <input type="hidden" name="jobposting" value="3000" id="ojobposting">
                    <input type="hidden" name="oresume" value="5000" id="oresume">
                   <input type="hidden" name="ouser" value="<?php echo session()->get('firstname');?>" id="ouser">
                   <h5 class="pricing-title mb-0 mt-2">1 Months Plan</h5>
                 </div>
                 <ul class="list-unstyled pricing-list">
                    <li><span><i class="fas fa-check"></i></span> 5000 Resumes </li>
                    <li><span><i class="fas fa-check"></i></span> 15000 Email</li>
                    <li><span><i class="fas fa-check"></i></span> 17500 Job Posting</li>
                 </ul>
                 <a class="btn btn-secondary main-btn" href="#" onclick="razorpaymonth(this.value)">Select Plan</a>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
   <!--=================================
   Plans&and Packages -->

<!--=================================
Footer Start-->
<?= $this->include('recruiter-footer') ?>
<!--=================================
Footer Ends-->

<!--=================================
Javascript -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<link rel="manifest" href="/manifest.json">
<link rel="manifest" href="manifest.webmanifest">
<!--6 months-->
<script>
    function razorpayoneyear(){
        var year =$('#oneyear').val();
        var amount =$('#yearamount').val();
        var email =$('#yearemail').val();
        var name= $("#yearuser").val();
        var resume= $("#oneresume").val();
        var jobposting= $("#jobposting").val();
        var url= '<?php echo base_url();?>';
      
var options = {
    "key": "rzp_test_3zV3BLzKJQcDAB", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": name,
    "description": "Transaction",
    "image": "<?php echo base_url();?>/public/assets/images/main-logo.png",
    // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        console.log(response);
        var payment_id = response.razorpay_payment_id;
        $.ajax({
        url: url +'/RecruiterPayment/savepaymentdata',
        type: 'post',
        dataType: 'json',
        data: {
        razorpay_payment_id: payment_id,amount:amount,name:name,totalemail:email,totalyear:year,resume:resume,jobposting:jobposting }, 
        success: function (data) {
        console.log(data);
        window.location.href = url + '/RecruiterPayment/success';
        }
        });
        }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        }
</script>
<!--6 months-->
<script>
    function razorpaysixmonths(){
        var year =$('#sixmonth').val();
        var amount =$('#samount').val();
        var email =$('#semail').val();
        var name= $("#suser").val();
        var resume= $("#sresume").val();
        var url= '<?php echo base_url();?>';
      
var options = {
    "key": "rzp_test_3zV3BLzKJQcDAB", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": name,
    "description": "Transaction",
    "image": "<?php echo base_url();?>/public/assets/images/main-logo.png",
    // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        console.log(response);
        var payment_id = response.razorpay_payment_id;
        $.ajax({
        url: url +'/RecruiterPayment/savepaymentdata',
        type: 'post',
        dataType: 'json',
        data: {
        razorpay_payment_id: payment_id , amount : amount ,name : name,totalemail:email,totalyear:year,resume:resume
        }, 
        success: function (data) {
        console.log(data);
        window.location.href = url + '/RecruiterPayment/success';
        }
        });
        }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        }
</script>
<!--3months-->
<script>
    function razorpaythreemonths(){
        var year =$('#threemonths').val();
        var amount =$('#tamount').val();
        var email =$('#temail').val();
        var name= $("#tuser").val();
        var resume= $("#tresume").val();
        var url= '<?php echo base_url();?>';
      
var options = {
    "key": "rzp_test_3zV3BLzKJQcDAB", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": name,
    "description": "Transaction",
    "image": "<?php echo base_url();?>/public/assets/images/main-logo.png",
    // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        console.log(response);
        var payment_id = response.razorpay_payment_id;
        $.ajax({
        url: url +'/RecruiterPayment/savepaymentdata',
        type: 'post',
        dataType: 'json',
        data: {
        razorpay_payment_id: payment_id , amount : amount ,name : name,totalemail:email,totalyear:year,resume:resume
        }, 
        success: function (data) {
        console.log(data);
        window.location.href = url + '/RecruiterPayment/success';
        }
        });
        }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        }
</script>
<!--one months-->
<script>
    function razorpaymonth(){
        var year =$('#onemonth').val();
        var amount =$('#oamount').val();
        var email =$('#oemail').val();
        var name= $("#ouser").val();
        var resume= $("#oresume").val();
        var url= '<?php echo base_url();?>';
      
var options = {
    "key": "rzp_test_3zV3BLzKJQcDAB", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": name,
    "description": "Transaction",
    "image": "<?php echo base_url();?>/public/assets/images/main-logo.png",
    // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        console.log(response);
        var payment_id = response.razorpay_payment_id;
        $.ajax({
        url: url +'/RecruiterPayment/savepaymentdata',
        type: 'post',
        dataType: 'json',
        data: {
        razorpay_payment_id: payment_id , amount : amount ,name : name,totalyear:year,resume:resume
        }, 
        success: function (data) {
        console.log(data);
        window.location.href = url + '/RecruiterPayment/success';
        }
        });
        }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        }
</script>



















