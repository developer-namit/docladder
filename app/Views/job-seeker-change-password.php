<?= $this->include('jobseeker-header') ?>
<!--=================================
Header -->

<!--=================================
Register -->
<section class="space-ptb-outer bg-light edit-profile job-seeker-posting">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center mb-3"><h2 class="main-site-title sub-title-bg"><span><?= esc($myprofile);?></span></h2></div>
      <div class="col-lg-8">
          <span id="update_msg" style="font-size: 19px;"></span>
         <?php   $validation =  \Config\Services::validation(); ?>
        <form class="postjob-form" action="" method="post"  id="formsubmitted">
          <div class="box-header">
            <h4><i class="login-icon fas fa-key me-1"></i><?= esc($changepassword);?></h4>
          </div>
            <div class="box">
                <div class="box-body">
                    <div class="bg-white login-register justify-content-center">
                      <div class="row">
                          <div class="form-group col-sm-8 mb-3">
                              <label class="form-label"><?= esc($oldpassword);?></label>
                              <input type="password" name="oldpassword" value="<?php echo set_value('oldpassword');?>" id="oldpassword"  class="form-control">
                                 <span id="oldpassword_error_msg"></span>
                          </div>
                          
                          <div class="form-group col-sm-4 mb-3">
                            <div class="forget-pass-btn">
                                <input class="" type="reset" onclick="myforfunction()" value="Forget Password"></div>
                          </div>
                          <div class="form-group col-md-6 mb-3">
                              <label class="form-label" for="password2"><?= esc($newpassword);?></label>
                              <input type="password" name="newpassword" value="<?php echo set_value('newpassword');?>" id="newpassword" class="form-control">
                                <span id="password_error_msg"></span>
                          </div>
                          <div class="form-group col-md-6 mb-3">
                              <label class="form-label" for="password2"><?= esc($confirmpassword);?></label>
                              <input type="password" name="confirmpassword" value="<?php echo set_value('confirmpassword');?>" id="confirmpassword" class="form-control">
                                 <span id="confirm_error_msg"></span>
                          </div>
                          <div class="form-group col-md-12 mt-2 mb-2 mb-lg-3 text-center">
                              <input class="btn btn-secondary main-btn" type="submit" value="Update">
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!--=================================
Register -->

<!--=================================
FORGOT Modal Popup -->
<div class="modal  modal-right popup-modal show" id="forgetpopup" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content recruiter-job-posting">
      <div class="modal-title">
          <ul class="list-unstyled">
              <li>
                <h2>Forget password</h2>
              </li>
              <li>
                 <button type="button" class="btn-close popup-btn" data-bs-dismiss="modal" aria-label="Close"></button>
              </li>
          </ul>
      </div>
          <?php if(!empty(session()->getFlashdata("success"))): ?>
          <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata("success") ?>
          </div>
          <?php endif; ?>
      <div class="modal-body">
        <form class="" method="post" id="MyForm">
          <!--general info-->
          <div class="box">
              
              <div class="box-body edit">
                  
                    <input type="hidden" name="id" id="updateid">
                      <div class="form-group col-md-12 mb-3">
                          <label>Email Address<em class="text-danger">*</em></label>
                          <input type="text" id="email" name="email"  id="email" class="form-control" placeholder="Enter  Email address">
                        <div class='error_field' id='email_error_msg'></div>
                      
                      </div>
                   
              <div class="form-group col-md-12 mt-4 mb-3">
                  <ul class="list-unstyled d-flex align-items-center justify-content-center">
                      <li class="text-center me-4">
                          <input class="btn btn-primary main-btn" onclick=myfunctionforgot(this.value); type="button" value="Submit">
                      </li>
                      <li class="text-left">
                        <input class="btn btn-secondary main-btn" type="submit" id="btnclosed" value="Cancel" data-bs-dismiss="modal" aria-label="Close">
                      </li>
                  </ul>
              </div>
         
                     
                </div>   
            </div>
        </div>  
    </div>
    </div>
</div>

<!--=================================
FORGOT Modal Popup Modal Popup -->



<!--=================================
Footer-->
<?= $this->include('jobseeker-footer') ?>
<!--=================================
Footer-->

<script>
  function myforfunction(){
     $("#forgetpopup").modal('show');           
  }
  
</script>

// change the password
<script>
 $(function(){
 $("#password_error_msg").hide();
 $("#confirm_error_msg").hide();
 $('#error_old_password').hide(); 

  var error_password= false;
  var error_confirm_password= false;
  var error_old_password= false;

   $("#newpassword").focusout(function(){
      new_password();
     });

   $("#confirmpassword").focusout(function(){
      confirm_password();
     });
     
     $("#oldpassword").focusout(function(){
      oldpassword();
     });
     
     
     function oldpassword(){
  var url= '<?php echo base_url();?>';
  var oldpassword=$("#oldpassword").val();
  
    $.ajax({
    type: "post",
     url: url+'/JobSeekerPassword/oldpassword',
    data: {oldpassword:oldpassword},
    success: function(res)
    {
    if (res.success == true) {
                              $('#oldpassword_error_msg').html(res.msg);
                                $('#oldpassword_error_msg').show();
                                $('#oldpassword_error_msg').css("color", "green");
                               error_old_password= true;
                            } else if (res.success == false) {
                                $('#oldpassword_error_msg').html(res.msg);
                                $('#oldpassword_error_msg').show();
                                $('#oldpassword_error_msg').css("color", "red");
                                 error_old_password= false;
                            }
  }
    });


 }

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
 
 $("#formsubmitted").submit(function(event){
     event.preventDefault();
     error_password= false;
     error_confirm_password= false;
    
  new_password();
  confirm_password();
  oldpassword();
 var url= '<?php echo base_url();?>';
  var newpassword= $("#newpassword").val();
  if(error_password== false && error_confirm_password== false &&  error_old_password== true){
     $.ajax({
    type: "post",
     url: url+'/JobSeekerPassword/updatepassword',
    data: {newpassword:newpassword},
    success: function(res)
    {
        console.log(res);
        alert(res.msg);        
        window.location.href = '<?php echo base_url('JobProfile');?>';
                            
  }
                     
    });

  }else{
    return false;
  }

});

 });
 
</script>
<!--// forget password    -->

<script>
  function myfunctionforgot(){
     var email = $('#email').val();
     if (email == '') {
    $('#email_error_msg').html("Email address cannot be empty");
    $('#email_error_msg').parent().show();
    $("#email_error_msg").css("color", "red");
    return false;
    }else{
        $("#email_error_msg").html("");
    }
    if(IsEmail(email)==false){
                $('#email_error_msg').html("Email address invalid");
                $('#email_error_msg').show();
                return false;
            }else{
        $("#email_error_msg").html("");
    }
    
     if(user_email(email)==false){
                $('#email_error_msg').html("Email address invalid");
                $('#email_error_msg').show();
                return false;
            }else{
        $("#email_error_msg").html("");
    }
            
     
  }
    function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
    return false;
    }else{
    return true;
    }
    }
    
    function user_email(email){
    var url= '<?php echo base_url();?>';
     if(email!=''){
    $.ajax({
    type: "get",
    url: url +'/AjexCallback/checkemail',
    data: {email:email},
     dataType: "JSON",
    success: function(response){
        console.log(response);
         if(response.success==true){
                         $('#email_error_msg').html(response.msg);
                                $('#email_error_msg').show();
                                $('#email_error_msg').css("color", "green");
                                setTimeout(function () {
                                window.location.href = '<?php echo base_url('logout');?>';                 
                                }, 2000);
         }
         else if(response.success==false){
                              $('#email_error_msg').html(response.msg);
                                $('#email_error_msg').show();
                                $('#email_error_msg').css("color", "red");
                            }
    }
    });
  }else{
      return true;
  }

 }
    
</script>
