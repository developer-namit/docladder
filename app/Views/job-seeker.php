<?= $this->include('header') ?>
<!--=================================
Header -->
<style>
    .nmSelBox .select2-selection__rendered {
      border: 1px solid #eeeeee;
      color: #574e4e;
      border-radius: 0px;
      filter: drop-shadow(0 0 2.5px rgba(121, 121, 121, 0.57));
      background-color: #ffffff;
      height: 35px;
      padding: 5px 20px;
      box-shadow: none;
      font-size: 14px;
      font-weight: 600;
      display: flex !important;
        align-items: center !important;
    }
    
    .nmSelBox .select2-selection__rendered li{
        margin: 7px !important;
    }
    
    .nmSelBox .select2-selection__rendered li input::placeholder{
        color:#000000 !important;
        font-size:16px !important;
    }
    
    .select2-results__options.select2-results__options--nested li{
        font-weight:bold !important;
    }
    
    .select2-results__group {
      display: none !important;
      padding: 0px !important;
    }
    .select2-results__options.select2-results__options--nested{
        padding: 0px !important;
    }
    
</style>
<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?= base_url();?>/public/assets/images/bg-slider/inner-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative inner-slider-heading-main">
        <h1>Job Seeker Sign Up</h1>
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
        <form class="mt-2" action="<?= base_url('JobseekerRegister');?>" method="post" id="formsubmitted" enctype="multipart/form-data">
          <div class="">
            <fieldset>
              <legend class="px-2">Sign up with</legend>
              <div class="social-login">
                <ul class="list-unstyled d-flex mb-0">
                    <li class="google text-center">
                        <a href="<?php if(!empty($googleApi)){echo $googleApi;}; ?>">
                             <img  src="<?= base_url();?>/public/assets/images/social-icons/google.png" alt="GOOGLE"></a>
                    </li>
                    <li class="facebook text-center">
                        <a href="<?php if(!empty($fbApi)){echo $fbApi;}; ?>">
                             <img  src="<?= base_url();?>/public/assets/images/social-icons/facebook.png" alt="FACEBOOK"></a>
                    </li>
                   
                    <li><span class="divider">or</span></li>
                    <li>
                    <div class="upload-resume text-center">
                                     
                            <a class="resume-btn" id="imageUpload"><i class="fas fa-upload"></i> <span>Upload Resume</span></a>
                            <input type="file" name="file" id="myfile"  style="display: none;" />
                           
                         
                        </div>
                    </li>
                     <span id="error_resume"></span>
                </ul>
              </div>
            </fieldset>
          </div>
            <div class="" id="job-seeker">
                
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
                        <input type="text" class="form-control <?php if($validation->getError('emailid')): ?>is-invalid<?php endif ?>" id="emailid" name="emailid" placeholder="Email" value="<?php echo set_value('emailid'); ?>" onkeyup="processChange()" />
                                    <?php if ($validation->getError('emailid')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('emailid') ?>
                                    </div>                                
                                <?php endif; ?>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Contact<em class="text-danger">*</em>  <small> ( to be verified immediately)</small></label>
                         <input type="text" maxlength="10"  class="form-control numberonly <?php if($validation->getError('contactno')): ?>is-invalid<?php endif ?>" id="contactno" name="contactno" placeholder="Phone" value="<?php echo set_value('contactno'); ?>" onkeyup="contactChange()"  />
                                    <?php if ($validation->getError('contactno')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('contactno') ?>
                                    </div>                                
                                <?php endif; ?>
                    </div>
                    
                    <div class="form-group col-md-12 select-border mb-3 nmSelBox">
                    <label class="form-label">Current  Location <em class="text-danger">*</em></label>
                    
                     <select class="form-control jquery-select2 slt-location cuurentLocationSel" name="state[]" id="states" autocomplete="off" multiple>
                                            <option disabled>Select Location...</option>

                                            <optgroup><option value="NI">Anywhere in North India</option></optgroup>
                                            <optgroup><option value="EI">Anywhere in East India</option></optgroup>
                                            <optgroup><option value="WI">Anywhere in West India</option></optgroup>
                                            <optgroup><option value="SI">Anywhere in South India</option></optgroup>
                                            <?php 
                                                if(!empty($margedata)){
                                                    foreach($margedata as $val){
                                            ?>
                                                <optgroup><option value="state_<?= $val['id'];?>"><?= strtolower($val['name']);?></option></optgroup>
                                            <?php 
                                                if(!empty($val['city'])){
                                                    foreach($val['city'] as $cities){
                                            ?>
                                                <option value="city_<?= $cities['id'];?>"> <?= strtolower($cities['name']);?></option>
                                            <?php } } ?>
                                                <optgroup><option value="other_<?= $val['id'] ?>" type="others" mainId="<?= $val['id'] ?>" mainState="<?= $val['name'] ?>" >Others in <?= strtolower($val['name']);?></option></optgroup>
                                            <?php } } ?>     
                                      </select>
                                      
                                      <div class="child">
                                          
                                      </div>
                                          
                  </div>
                  
                  <div class="form-group col-md-12 select-border mb-3 nmSelBox">
                      <label class="form-label">Preferred Location <em class="text-danger">*</em></label>
                     <select class="form-control jquery-select2 slt-location prefferedLocationSel" name="location[]" id="location" autocomplete="off" multiple>
                         
                                            
                                            <option disabled>Select Location...</option>

                                            <optgroup><option value="NI">Anywhere in North India</option></optgroup>
                                            <optgroup><option value="EI">Anywhere in East India</option></optgroup>
                                            <optgroup><option value="WI">Anywhere in West India</option></optgroup>
                                            <optgroup><option value="SI">Anywhere in South India</option></optgroup>
                                            <?php 
                                                if(!empty($margedata)){
                                                    foreach($margedata as $val){
                                            ?>
                                                <optgroup><option value="state_<?= $val['id'];?>"><?= strtolower($val['name']);?></option></optgroup>
                                            <?php 
                                                if(!empty($val['city'])){
                                                    foreach($val['city'] as $cities){
                                            ?>
                                                <option value="city_<?= $cities['id'];?>"> <?= strtolower($cities['name']);?></option>
                                            <?php } } ?>
                                                <optgroup><option value="other_<?= $val['id'] ?>" type="others"  mainId="<?= $val['id'] ?>"  mainState="<?= $val['name'] ?>" >Others in <?= strtolower($val['name']);?></option></optgroup>
                                            <?php } } ?>                                                         
                                        </select>
                         <?php if ($validation->getError('location')): ?>
                            <div class="invalid" style="color:red;">
                            <?= $validation->getError('location') ?>
                            </div>                                
                            <?php endif; ?>
                            
                            <div class="child"></div>
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
              
            </div>
            </form>
          </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-4 mt-3 mt-lg-0">
        <?php  
           $validation =  \Config\Services::validation(); ?>
            
            <div class="bg-white p-4 box-shadow" id="login-register">
              <form class="mt-2" action="<?php echo base_url('jobseekinglogin');?>" method="post">
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
    $(".cuurentLocationSel").select2({
		closeOnSelect : false,
		placeholder : "Current Location",
		allowHtml: true,
		allowClear: true,
		tags: true 
	});
	
	$(".prefferedLocationSel").select2({
		closeOnSelect : false,
		placeholder : "Preferred Location",
		allowHtml: true,
		allowClear: true,
		tags: true 
	});

		$('.icons_select2').select2({
			width: "100%",
			templateSelection: iformat,
			templateResult: iformat,
			allowHtml: true,
			placeholder: "Location",
			dropdownParent: $( '.select-icon' ),
			allowClear: true,
			multiple: false
		});


			function iformat(icon, badge,) {
				var originalOption = icon.element;
				var originalOptionBadge = $(originalOption).data('badge');
			 	return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '<span class="badge">' + originalOptionBadge + '</span></span>');
			}
			
			
			$('.jquery-select2').on('select2:select', function (e) {
                var data = e.params.data;
                if(data.element.getAttribute('type') == 'others'){
                    var selectedMainId = data.element.offsetParent.getAttribute('id');
                    var selectedValue = data.id;
                    
                    $(`#${selectedMainId}`).parent('.form-group').find('.child').append(`
                        <div id="Main${selectedMainId}${selectedValue}" class="mb-3 mt-3 col-md-12">
                            <label class="form-label">${data.text.trim()}</label>
                            <input type="text" class="form-control" name="other[${selectedMainId}][${data.element.getAttribute('mainId')}]" value="">
                        </div>
                    `);
                }
            });
			
            $('.jquery-select2').on('select2:unselect', function (e) {
                var data = e.params.data;
               if(data.element.getAttribute('type') == 'others'){
                    var selectedMainId = data.element.offsetParent.getAttribute('id');
                    var selectedValue = data.id;
                    $(`#Main${selectedMainId}${selectedValue}`).remove()
                }
            });
            
            
            $(document).ready(function(){
                $('.nmSelect').select2();
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
     
          success:function(res)
          {
            console.log(res);
            $('#error_resume').html(res.success);
            $('#error_resume').show();
            }
          });

      });
      
      $('.numberonly').keypress(function (e) {    
    
        var charCode = (e.which) ? e.which : event.keyCode    

        if (String.fromCharCode(charCode).match(/[^0-9]/g))    

            return false;                        

    }); 

    function debounce(func, timeout = 500){
      let timer;
      return (...args) => {
        clearTimeout(timer);
        timer = setTimeout(() => { func.apply(this, args); }, timeout);
      };
    }
    function saveInput(){
      var email = $('#emailid').val();
      var contactno = $('#contactno').val();

      // check both field is empty condition
      if(!email || !contactno){
        return false;
      }

      if(contactno.length != 10){
        // check contact validation
        return false;
      }

      if(email){
        // check email validation
        if( !validateEmail(email)) { 
          return false;
        }
      }

      $.ajax({
          url: "<?= base_url("JobseekerRegister/addVisitorList") ?>",
          method:"POST",
          data: $("#formsubmitted").serialize(),
          cache: false,
          processData: false,
          dataType:'json',
          success:function(res)
          {
            
          }
      });

      

      
    }
    const processChange = debounce(() => saveInput());
    const contactChange = debounce(() => saveInput());

    function validateEmail($email) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      return emailReg.test( $email );
    }



  </script>

