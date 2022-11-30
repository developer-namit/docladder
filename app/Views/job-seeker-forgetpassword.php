<?= $this->include('recruiter-header') ?>
<!--=================================
Header -->

<!--=================================
Register -->
<section class="space-ptb bg-light edit-profile padd-top-150">
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 job-posting-section-title"><h2>My Profile</h2></div>
            <div class="col-lg-10">
                <div class="row">
                    <?php if(!empty(session()->getFlashdata("wrong"))): ?>
                <div class="col-10">
                <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata("wrong") ?>
                </div>
                </div>
                <?php endif; ?>
                
                <?php if(!empty(session()->getFlashdata("success"))): ?>
                <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata("success") ?>
                </div>
                <?php endif; ?>
                  
                    <div class="col-lg-8">
                        <div class="tab-pane fade show" id="changePassword" role="tabpanel" aria-labelledby="tab-03">
                        
                            <form class="postjob-form mx-5"  method="post" id="UpdateTHepassword">
                                <div class="box">
                                    <div class="row box-header">
                                        <h4>New Password</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="row bg-white login-register justify-content-center">
                                            <div class="form-group col-md-6 mb-3">
                                                <label class="form-label" for="password2">New Password</label>
                                                <input type="password" name="password" value="<?php echo set_value('password');?>" id="newpassword" class="form-control">
                                            <span class="errormsg" id= password_error_msg></span>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label class="form-label" for="password2">Confirm Password</label>
                                                <input type="password" name="confirmpassword" value="<?php echo set_value('confirmpassword');?>" id="confirmpassword" class="form-control">
                                                 <span class="errormsg" id= confirm_error_msg></span>
                                            </div>
                                            <div class="form-group col-md-12 mt-4 mb-3 text-center">
                                                <input class="btn btn-primary main-btn" type="submit" value="Update">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                          </div>
                          
                        </div>
                    
                </div>
                
                
            </div>
        </div>
  </div>
</section>
<!--=================================
Register -->


<?= $this->include('footer') ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
 $(function(){
 $("#password_error_msg").hide();
 $("#confirm_error_msg").hide();
  var error_password= false;
  var error_confirm_password= false;
  var error_oldpassword= false;

   $("#oldpassword").focusout(function(){
      old_password();
     });

   $("#newpassword").focusout(function(){
      new_password();
     });

   $("#confirmpassword").focusout(function(){
      confirm_password();
     });

   function new_password(){
  var password_length= $("#newpassword").val().length;
  if(password_length < 7 || password_length > 20){
    $("#password_error_msg").html("At least 8 characters");
    $('#password_error_msg').css("color", "red");
    $("#password_error_msg").show();
    error_password= true;
  }else {
    $("#password_error_msg").hide();
  }
  }
 
 function confirm_password(){
  var password= $("#newpassword").val();
  var confirm_password=$("#confirmpassword").val();
  if(password != confirm_password){
    $("#confirm_error_msg").html("Password don't match");
    $('#confirm_error_msg').css("color", "red");
    $("#confirm_error_msg").show();
    error_confirm_password= true;

  }else{
    $("#confirm_error_msg").hide();
  }

 }

 $("#UpdateTHepassword").submit(function(){
       var password= $("#newpassword").val();
       var url= '<?php echo base_url();?>';
   error_password= false;
    error_confirm_password= false;
  new_password();
  confirm_password();
  if(error_password== false && error_confirm_password== false){
    
     $.ajax({
    type: "post",
     url:url +'/AjexCallback/changepassword',
    data: {password:password},
    success: function(data){
      console.log(data);
    },
    });

   return true;   
  }else{
    return false;
  }

});

 });
</script>



