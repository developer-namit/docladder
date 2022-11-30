<?= $this->include('header') ?>
<!--=================================
Header -->

<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?= base_url();?>/public/assets/images/bg-slider/inner-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative inner-slider-heading-main">
        <h1>Sign Up</h1>
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
    <div class="row justify-content-center equipment-register-form" id="register-login">
        <?php $validation =  \Config\Services::validation(); ?>
        <div class="col-lg-6 mt-lg-0">
          <div class="login-register bg-white">
          <div class="">
            <fieldset>
              <legend class="px-2">Sign up with</legend>
              <div class="social-login">
                <ul class="list-unstyled d-flex mb-0">
                    <li class="google text-center">
                        <a href="">
                             <img  src="<?= base_url();?>/public/assets/images/social-icons/google.png" alt="GOOGLE"></a>
                    </li>
                    <li class="facebook text-center">
                        <a href="<?php if(!empty($fbApi)){echo $fbApi;}; ?>">
                             <img  src="<?= base_url();?>/public/assets/images/social-icons/facebook.png" alt="FACEBOOK"></a>
                    </li>
                    
                </ul>
              </div>
            </fieldset>
          </div>
            <div class="" id="job-seeker">
                <form class="mt-2" action="<?= base_url('Register');?>" method="post" id="formsubmitted" enctype="multipart/form-data">
                    <?= csrf_field() ?> 
                  <input type="hidden" name="file"  id="resumedata" >
                <div class="row align-items-end">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="Username">User Name<em class="text-danger">*</em></label>
                         <input type="text" class="form-control <?php if($validation->getError('firstname')): ?>is-invalid<?php endif ?>" id="firstname" name="firstname" placeholder="Name" value="<?php echo set_value('firstname'); ?>"/>
                                <?php if ($validation->getError('firstname')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('firstname') ?>
                                    </div>                                
                                <?php endif; ?>
                    </div>
                    
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Email Address<em class="text-danger">*</em></label>
                        <input type="text" class="form-control <?php if($validation->getError('emailid')): ?>is-invalid<?php endif ?>" id="emailid" name="emailid" placeholder="Email" value="<?php echo set_value('emailid'); ?>"/>
                                    <?php if ($validation->getError('emailid')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('emailid') ?>
                                    </div>                                
                                <?php endif; ?>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Contact<em class="text-danger">*</em>  <small> ( to be verified immediately)</small></label>
                         <input type="text" maxlength="10"  class="form-control <?php if($validation->getError('contactno')): ?>is-invalid<?php endif ?>" id="contactno" name="contactno" placeholder="Phone" value="<?php echo set_value('contactno'); ?>"/>
                                    <?php if ($validation->getError('contactno')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('contactno') ?>
                                    </div>                                
                                <?php endif; ?>
                    </div>
                    <div class="form-group col-md-12 select-border mb-3">
                    <label class="form-label">State <em class="text-danger">*</em></label>
                    <select class="form-control basic-select" name="state" id="states">
                        <option value="">Select State </option>
                       <?php if(!empty($state)){foreach($state as $states){?>
                       <option value="<?php echo $states['id'];?>"><?php echo $states['name'];?></option>
                       <?php }} ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 select-border mb-3">
                    <label class="form-label">Current Location</label>
                    <select class="form-control basic-select" name="city" id="city"></select>
                  </div>
                   
            <div class=" form-group mb-3 col-md-12 datetimepickers">
            <label class=" form-label">DOB <em class="text-danger">*</em></label>
            <div class="input-group date" id="datetimepicker-01" data-target-input="nearest">
            <input type="text" name="dob" id="dob" class="form-control datetimepicker-input <?php if($validation->getError('dob')): ?>is-invalid<?php endif ?>" value="" data-target="#datetimepicker-01">
            <div class="input-group-append d-flex" data-target="#datetimepicker-01" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
            <?php if ($validation->getError('dob')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('dob') ?>
                                    </div>                                
                                <?php endif; ?>
            </div>
            </div>                    
              </div>                  
                    
                    
                    
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Gender <em class="text-danger">*</em></label>
                        <select class="form-control basic-select" name="gender">
                          <option selected>Select Gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Password<em class="text-danger">*</em></label>
                        <input type="password" class="form-control <?php if($validation->getError('passwordto')): ?>is-invalid<?php endif ?>" name="passwordto" placeholder="Password" value="<?php echo set_value('passwordto'); ?>"/>
                                    <?php if ($validation->getError('passwordto')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('passwordto') ?>
                                    </div>                                
                                <?php endif; ?>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="password2">Confirm Password<em class="text-danger">*</em></label>
                        <input type="password" class="form-control <?php if($validation->getError('confirm_password')): ?>is-invalid<?php endif ?>" name="confirm_password" placeholder="Confirm Password" value="<?php echo set_value('confirm_password'); ?>"/>
                                    <?php if ($validation->getError('confirm_password')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('confirm_password') ?>
                                    </div>                                
                                <?php endif; ?>
                    </div>
                </div>
                <div class="row mt-3 mb-3 align-items-center">
                    <div class="col-5">
                        <input class="btn btn-primary main-btn" type="submit" id="submitdata" value="Submit">
                        
                    </div>
                    <div class="col-7">
                        <div class="mt-1 forgot-pass text-right">
                            <p class="mt-1">Already registered? <a href="<?= base_url();?>/public/assets/#login-register">Sign in here</a></p>
                        </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-4 mt-3 mt-lg-0">
        <?php  
           $validation =  \Config\Services::validation(); ?>
            
            <div class="bg-white p-4 box-shadow" id="login-register">
              <form class="mt-2" action="<?php echo base_url('login');?>" method="post">
                        <div class="row">
                          <div class="mb-3 col-12">
                            <label class="form-label" for="Email2">Username / Email Address</label>
                            <input type="text" class="form-control <?php if($validation->getError('email')): ?>is-invalid<?php endif ?>" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>"/>
                                    <?php if ($validation->getError('email')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email') ?>
                                    </div>                                
                                <?php endif; ?>
                          </div>
                          <div class="mb-3 col-12">
                            <label class="form-label" for="password2">Password<em class="text-danger">*</em></label>
                            <input type="password" class="form-control <?php if($validation->getError('password')): ?>is-invalid<?php endif ?>" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>"/>
                                    <?php if ($validation->getError('password')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password') ?>
                                    </div>                                
                                <?php endif; ?>                        
                          </div>
                        </div>
                        <div class="row justify-content-center align-items-center">
                          <div class="mt-3 mb-3 col-5">
                              <input class="btn btn-primary main-btn" type="submit" value="Sign In">
                          </div>
                          <div class="col-7">
                            <div class="mt-3 mt-md-0 forgot-pass text-right">
                              <a href="<?php echo base_url('forgetpassword');?>">Forgot Password?</a>
                            </div>
                          </div>
                        </div>
                      </form>
            </div>
            <div class="blog-post blog-post-you-tube text-center mt-3" id="equipment-video">
          <div class="js-video [youtube, widescreen]">
            <iframe  src="https://www.youtube.com/embed/JC6hiHsHWxo" allowfullscreen=""></iframe>
          </div>
          <div class="blog-post-content">
            <div class="blog-post-details">
              <div class="blog-post-title">
                <h4><a href="<?php echo base_url();?>">Watch Youtube Video</a></h4>
              </div>
              <div class="blog-post-description">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
<?= $this->include('footer') ?>
<!--=================================
Footer-->
<!--// state-->
<script>
  $(document).ready(function () {
    $('#states').on('change', function () {  
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
                    var html= '<option >Select city</option>';
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

<!-- // upload resume -->
<script>
 $(document).on("click","#imageUpload",function(){
        $("input[id='myfile']").click();
      }); 
      $("#myfile").change(function(){
        // $("input[id='myfile']").click();
          var name = document.getElementById("myfile").files[0].name;
          var form_data = new FormData();
          form_data.append("file", document.getElementById('myfile').files[0]);
          var url='<?= base_url();?>';
          $.ajax({
            url: url +'/JobseekerRegister/uploadresume',
          method:"POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          dataType:'json',
     
          success:function(data)
          {
            console.log(data['fname']);
             if (data.success == false) {
                $('#error_resume').html('Saved!', '', 'success');
                    $('#error_resume').html(data.msg);
                    $('#error_resume').show();
            }else{
            
            $('#resumedata').val(data['resume']);
            $('#firstname').val(data['fname']);
            $('#contactno').val(data['mobile']);
            $('#emailid').val(data['email']);
            $('#dob').val(data['dob']);
            }
          }
          });

      });


  </script>