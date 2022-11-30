<?= $this->include('header') ?>
<!--=================================
Header -->

<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?php echo base_url();?>/public/assets/images/bg-slider/inner-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative inner-slider-heading-main">
        <h1>Recruiter Sign Up</h1>
      </div>
      </div>
    </div>

</section>
<!--=================================
Slider Banner -->


<!--=================================
Register -->
<section class="space-ptb bg-light">
  <div class="container">
      <?php $validation =  \Config\Services::validation(); ?>
    <div class="row justify-content-center equipment-register-form" id="register-login">
        <div class="col-lg-6 mt-lg-0">
           
          <div class="login-register bg-white">
          <div class="">
            <fieldset>
              <legend class="px-2">Sign up with</legend>
              <div class="social-login">
                <ul class="list-unstyled d-flex mb-0">
                    <li class="google text-center">
                        <a href="<?php if(!empty($googleApi)){echo $googleApi;}; ?>"> <img src="<?php echo base_url();?>/public/assets/images/social-icons/google.png" alt="GOOGLE"></a>
                    </li>
                    <li class="facebook text-center">
                    
                        <a href="<?php if(!empty($fbApi)){echo $fbApi;}; ?>"> <img src="<?php echo base_url();?>/public/assets/images/social-icons/facebook.png" alt="FACEBOOK"></a>
                    </li>
                   
                </ul>
              </div>
            </fieldset>
          </div>
            <div class="" id="recruiter">
             <form class="mt-3"  method="POST" action="<?php echo base_url('Recruiter');?>" id="formsubmit"  enctype="multipart/form-data" >
                <div class="row justify-content-center">
                  <div class="mb-2 col-md-12 select-border">
                    <label class="form-label" for="sector">Client Type:</label>
                    <select class="form-control basic-select" name="client_type">
                      <option value="1">Consultant</option>
                      <option value="2">Hospital</option>
                      <option value="3">Others</option>
                    </select>
                  </div>
                  <div class="mb-2 col-md-12">
                    <label class="form-label" for="firstname">Client Name</label>
                    <input type="text" name="client_firstname" value="<?php echo set_value('client_firstname'); ?>" class="form-control">
                  </div>
                  <div class="form-group col-md-12 select-border mb-2">
                    <label class="form-label">State</label>
                    <select class="form-control basic-select"  id="state" name="states">
                    <option value="" selected disabled>Select Your state--</option>
                            <?php if(!empty($state)){foreach($state as $states){?>
                            <option value="<?php echo $states['id'];?>"><?php echo $states['name'];?></option>
                            <?php } }?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 select-border mb-2">
                    <label class="form-label">City</label>
                    <select class="form-control basic-select" id="city" name="city">
                    </select>
                  </div>
                  <div class="mb-2 col-md-12">
                    <label class="form-label" for="Username"> Pin Code<em class="text-danger">*</em></label>
                    <input type="text" class="form-control <?php if($validation->getError('pincode')): ?>is-invalid<?php endif ?>"  maxlength="6" name="pincode" value="<?php echo set_value('pincode'); ?>" id="pincode">
                    <?php if ($validation->getError('pincode')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pincode') ?>
                                    </div>                                
                                <?php endif; ?>
                  </div>
                  <div class="mb-2 col-md-12">
                    <label class="form-label" for="Username">Website Address</label>
                    <input type="text" class="form-control" name="website" value="<?php echo set_value('website'); ?>" id="website">
                   
                  </div>
                  <div class="mb-2 col-md-12">
                    <label class="form-label">Contact No.<em class="text-danger">*</em></label>
                    <input type="tel" class="form-control <?php if($validation->getError('contact')): ?>is-invalid<?php endif ?>"   maxlength="10"  name= "contact" value="<?php echo set_value('contact'); ?>" id="contact_number">
                     <?php if ($validation->getError('contact')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('contact') ?>
                                    </div>                                
                                <?php endif; ?>
                 </div>
                  <div class="mb-2 col-md-12">
                    <label class="form-label">Alternate No.</label>
                    <input type="tel" class="form-control"  maxlength="10" name= "alt_number" value="<?php echo set_value('alt_number'); ?>" id="alt_number">
                 </div>
                 <div class="mb-2 col-md-12">
                    <label class="form-label" for="lastname">Contact Person Name</label>
                    <input type="text" name="client_lastname" value="<?php echo set_value('client_lastname'); ?>" class="form-control">
                  </div>
                  <div class="mb-2 col-md-12">
                    <label class="form-label" for="Username">Designation</label>
                    <input type="text" class="form-control" name="designation" value="<?php echo set_value('designation'); ?>" id="designation">
                  </div>
                  <div class="mb-2 col-md-12">
                    <label class="form-label">Email Address<em class="text-danger">*</em></label>
                    <input type="text" class="form-control <?php if($validation->getError('emailid')): ?>is-invalid<?php endif ?>" name="emailid" value="<?php echo set_value('emailid'); ?>" id="form_email">
                    <span class="errormsg" id= email_error_msg></span>
                    <span class="errormsg" id= email_error_msg2></span>
                     <?php if ($validation->getError('emailid')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('emailid') ?>
                                    </div>                                
                                <?php endif; ?>
                  </div>
                  <div class="mb-2 col-md-12">
                    <label class="form-label">Password </label>
                    <input type="password" class="form-control <?php if($validation->getError('passwordto')): ?>is-invalid<?php endif ?>" name="passwordto" value="<?php echo set_value('passwordto'); ?>" id="password_form">
                     <?php if ($validation->getError('passwordto')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('passwordto') ?>
                                    </div>                                
                                <?php endif; ?>
                    
                  </div>
                  <div class="mb-1 col-md-12">
                    <label class="form-label" for="password2">Confirm Password</label>
                    <input type="password" class="form-control <?php if($validation->getError('confirm_password')): ?>is-invalid<?php endif ?>" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" id="confirm_password_form">
                     <?php if ($validation->getError('confirm_password')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('confirm_password') ?>
                                    </div>                                
                                <?php endif; ?>
                     <span class="errormsg" id= confirm_error_msg></span>
                  </div>
                  <div class="mb-1 col-md-12">
                      <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="" id="Remember-02">
                        <label class="form-check-label" for="Remember-02">Remember Password</label>
                      </div>
                  </div>
                  <div class="mt-2 col-md-4 mb-2">
                        <div class="main-btn">
                          <input type="submit" value="submit" class="btn btn-primary d-grid">
                        </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-4 mt-2 mt-lg-0">
            <div class="bg-white p-4" id="login-register">
              <form class="mt-2"  action="<?php echo base_url('RecruiterLogin');?>" method="post">
                        <div class="row">
                            <div class="mb-3 col-12">
                            <?php if(!empty(session()->getFlashdata("wrong"))): ?>
                            <div class="alert alert-warning" role="alert">
                            <?= session()->getFlashdata("wrong") ?>
                            </div>
                            <?php endif; ?>
                            </div>  
                            
                          <div class="mb-3 col-12">
                            <label class="form-label" for="Email2">Username / Email Address<em class="text-danger">*</em></label>
                            <input type="text" name="email" id="formemail" value="<?php echo set_value('email'); ?>" class="form-control <?php if($validation->getError('email')): ?>is-invalid<?php endif ?>" id="Email22">
                             <?php if ($validation->getError('email')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email') ?>
                                    </div>                                
                                <?php endif; ?>
                            
                          </div>
                          <div class="mb-3 col-12">
                            <label class="form-label" for="password2">Password<em class="text-danger">*</em></label>
                            <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" class="form-control <?php if($validation->getError('password')): ?>is-invalid<?php endif ?>" id="password32">
                            <?php if ($validation->getError('password')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password') ?>
                                    </div>                                
                                <?php endif; ?>
                            
                          </div>
                        </div>
                        <div class="row justify-content-center align-items-center">
                          <div class="mt-3 mb-3 col-6 main-btn">
                            <input type="submit" value="Sign In" class="btn btn-primary d-grid">
                           
                    
                          </div>
                          <div class="col-6">
                            <div class="mt-3 mt-md-0 forgot-pass text-center">
                              <a href="../assets/#">Forgot Password?</a>
                              <!--<p class="mt-1">Don't have account? <a href="../assets/register.html">Sign Up here</a></p>-->
                            </div>
                          </div>
                        </div>
                      </form></div>
            <div class="blog-post blog-post-you-tube text-center mt-3" id="equipment-video">
          <div class="js-video [youtube, widescreen]">
            <iframe  src="https://www.youtube.com/embed/JC6hiHsHWxo" allowfullscreen=""></iframe>
          </div>
          <div class="blog-post-content">
            <div class="blog-post-details">
              <div class="blog-post-title">
                <h4><a href="">Watch Youtube Video</a></h4>
              </div>
              <div class="blog-post-description">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="job-seeker-signup-btn mt-3">
            <a href="<?php echo base_url('packages');?>">
              <input class="btn btn-primary" type="button" value="Get Premium"  data-bs-target="#payment-popup"></a>
            </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Register -->


<!--=================================
Footer-->

<?= $this->include('recruiter-footer') ?>
<!--=================================
Footer-->


<script>
  $(document).ready(function () {
    $('#state').on('change', function () {  
      var state= this.value;
      if(state >0){
      var url= '<?php echo base_url('cities');?>';
          $.ajax({
                    type: "get",
                    url:  url,
                    data:{state:state},
                    dataType:'json',
                    success:function(res){
                     console.log('res',res);
                     var html="";                        
                    var html= '<option value="">Select city</option>';
                     for(var count=0; count < res.length; count++){               
                   html+= '<option value="'+res[count]['id']+'">'+res[count]['name']+'</option>';
                     }
                     $('#city').html(html);
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }

                });
              }     

    }).change();
});
</script>





 <!-- show the password -->
 <script>
  
  $(function(){
  
  $('#eye').click(function(){
       
        if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#password_form').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#password_form').attr('type','password');
        }
    });
});
</script>

<!--<script>-->
<!--   $(function(){-->
<!--      $("#password_error_msg").hide();-->
<!--      $("#confirm_error_msg").hide();-->
<!--      $("#email_error_msg").hide();-->
<!--       $("#pincode_error_msg").hide();-->


<!--     var error_password= false;-->
<!--       var error_confirm_password= false;-->
<!--       var error_email= false;-->
<!--       var error_pincode= false;-->

<!--      $("#password_form").focusout(function(){-->
<!--       user_password();-->
<!--      });-->

<!--      $("#confirm_password_form").focusout(function(){-->
<!--       confirm_password();-->
<!--     });-->


<!--      $("#form_email").focusout(function(){-->
<!--       user_email();-->
<!--      });-->

<!--     $("#pincode").focusout(function(){-->
<!--      user_pincode();-->
<!--     });-->
 //pincode
<!--    function user_pincode(){-->
<!--    var pincode=$("#pincode").val();-->
<!--    var reg = /^[0-9]+$/;-->
<!--    if (pincode == ''){-->
<!--     $("#pincode_error_msg").html("Zipcode required!");-->
<!--    $("#pincode_error_msg").show();-->
<!--    }else if ((pincode.length)< 6 || (pincode.length)>6 ){-->
<!--    $("#pincode_error_msg").html("zipcode should only be 5 digits.");-->
<!--     $("#pincode_error_msg").show();-->
<!--     error_password= false;-->
<!--    }-->
<!--    else if (!reg.test(pincode)){-->
<!--    $("#pincode_error_msg").html("*zipcode should be numbers only");-->
<!--    $("#pincode_error_msg").show();-->
<!--    error_password= false;-->
<!--     }-->
<!--    else{-->
<!--     $("#pincode_error_msg").hide();-->
<!--     error_password= false;-->
<!--    }-->
<!--    }-->




<!--  function user_password(){-->
<!--    var password_length= $("#password_form").val().length;-->
<!--    var password=$("#password_form").val();-->
<!--  var patteren= new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");-->
<!--  if(password.match(patteren)){-->
<!--  $("#password_error_msg").html("Strong Password");-->
<!--      $("#password_error_msg").show();-->
<!--      error_password= false;-->
<!--    }else{-->
<!--      $("#password_error_msg").html("Password must contain at least capital letter,\n\n small letter, number and  special character.\n\n");-->
<!--      $("#password_error_msg").show();-->
<!--      error_password= true;-->

<!--    }-->
<!--    }-->

<!--  function confirm_password(){-->
<!--  var password= $("#password_form").val();-->
<!--  var confirm_password=$("#confirm_password_form").val();-->
<!--  if(password != confirm_password){-->
<!--    $("#confirm_error_msg").html("Password don't match");-->
<!--    $("#confirm_error_msg").show();-->
<!--    error_confirm_password= true;-->

<!--  }else{-->
<!--    $("#confirm_error_msg").hide();-->
<!--  }-->

<!--  }-->

<!--function user_email(){-->
<!--  var url= '<?php echo base_url();?>';-->
<!--  var pattern= new RegExp(/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/);-->
<!--  var email=$("#form_email").val();-->
<!--  if(email!=''){-->
    
<!--    $.ajax({-->
<!--    type: "get",-->
<!--    url: url +'/RecruiterPost/check_emailavalibility',-->
<!--    data: {email:email},-->
<!--    success: function(data){-->
<!--      console.log(data);-->
<!--      $('#email_error_msg2').html(data);-->
<!--      error_email= false;-->
<!--    }-->
<!--    });-->
<!--  }-->

<!-- }-->

<!--  $("#formsubmit").submit(function(){ -->
<!--  error_password= false;-->
<!--  error_confirm_password= false;-->
<!--  error_email= false;-->
<!--  error_pincode= false;-->

<!--  user_password();-->
<!--  confirm_password();-->
<!--  user_email();-->
<!--  user_pincode();-->

<!--  if(error_password== false && error_confirm_password== false && error_email== false && error_pincode== false){-->
<!--  return true;   -->
<!--  }else{-->
<!--    return false;-->
<!--  }-->

<!--});-->

<!--});-->
<!--</script>-->




// <script>  
//   $(function(){
//       $('.error').hide();
//       $('.pass_error').hide();
//       $('#formlogin').click(function(){
//         var email = $('#formemail').val();
//         var password= $('#password').val();
//         if(email== ''){
//           $('#formemail').next().show();
//           return false;
//         }
//         if(IsEmail(email)==false){
//           $('#invalid_email').show();
//           return false;
//         }
//         if(useremail(email)==false){
//           $('#invalid_email').show();
//           return false;
//         }
//         if(password== ''){
//           $('#password').next().show();
//           return false;
//         }
//         if(passwordcheck(password)==false){
//           $('#invalid_password').show();
//           return false;
//         }
//         e.preventDefault();
//       });

//       function IsEmail(email) {
//       var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//       if(!regex.test(email)) {
//       return false;
//       }else{
//       return true;
//       }
//       }
//       function useremail(email){
//       var url= '<?php echo base_url();?>';
//       if(email!=''){
//       $.ajax({
//       type: "get",
//       url: url +'/RecruiterPost/checkemail',
//       data: {email:email},
//       success: function(data){
//       console.log(data);
//       $('.error').html(data);
//       return false;
//       }
//       });
//       }

//       }
//       function passwordcheck(password){
//       var url= '<?php echo base_url();?>';
//       if(password!=''){
//       $.ajax({
//       type: "get",
//       url: url +'/RecruiterPost/passwordcheck',
//       data: {password:password},
//       success: function(data){
//       console.log(data);
//       $('.pass_error').html(data);
//       }
//       });
//       }
//       }
//     });
//     </script>
