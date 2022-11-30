<?= $this->include('header') ?>
<!--=================================
Header -->
<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?= base_url('/public/assets');?>/images/bg-slider/contact-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative inner-slider-heading-main">
        <h1>Contact Us</h1>
        <!--<h2>Build an Ecosystem for Healthcare Industry</h2>-->
      </div>
      </div>
    </div>

</section>
<!--=================================
Slider Banner -->

<style>
  input.subscribe {
    background-color: #124E3B;
    color: aliceblue;
}
</style>

<!--=================================
Ecosystem -->
<section class="space-ptb contact-section">
  <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-3">
            <h2 class="main-site-title sub-title-bg title-tab"><span>Build an Ecosystem for Healthcare Industry</span></h2>
            <div class="title-mobile">
              <h2 class="main-site-title sub-title-bg mb-2">
                <span>Build an Ecosystem for </span> 
              </h2>
              <h2 class="main-site-title sub-title-bg ">
               <span class="mt-4">Healthcare Industry</span> </span>
              </h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-4 mb-3 mb-sm-0">
              <div class="article text-center">
                  <input type="button" class="btn btn-secondary btn-contact btn-contact-1" value="I’m a Job Seeker">
                  <ul class="moretext-1 list-unstyled contact-details-ul" id="contact-listing" style="display: none;">
                      <li>
                          <a href="tel:+91 9877666442">
                              <i class="fas fa-phone fa-flip-horizontal fa-fw"></i>
                              <span class="ps-2">999 999 9999</span>
                          </a>
                      </li>
                      <li>
                          <a href="tel:+91 9877666442">
                              <i class="fas fa-envelope fa-flip-horizontal fa-fw"></i>
                              <span class="ps-2">vermaashwin5@gmail.com</span>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="article text-center">
              <input type="button" class="btn btn-secondary btn-contact btn-contact-2" value="I’m Recruiter">
              <ul class="moretext-2 list-unstyled contact-details-ul" id="contact-listing"  style="display: none;">
                  <li>
                      <a href="tel:+91 9877666442">
                          <i class="fas fa-phone fa-flip-horizontal fa-fw"></i>
                          <span class="ps-2">999 999 9999</span>
                      </a>
                  </li>
                  <li>
                      <a href="tel:+91 9877666442">
                          <i class="fas fa-envelope fa-flip-horizontal fa-fw"></i>
                          <span class="ps-2">vermaashwin5@gmail.com</span>
                      </a>
                  </li>
              </ul>
          </div>
          </div>
          <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="article text-center">
              <input type="button" class="btn btn-secondary btn-contact btn-contact-3" value="I’m trying to Buy/Sell">
              <ul class="moretext-3 list-unstyled contact-details-ul" id="contact-listing" style="display: none;">
                  <li>
                      <a href="tel:+91 9877666442">
                          <i class="fas fa-phone fa-flip-horizontal fa-fw"></i>
                          <span class="ps-2">999 999 9999</span>
                      </a>
                  </li>
                  <li>
                      <a href="tel:+91 9877666442">
                          <i class="fas fa-envelope fa-flip-horizontal fa-fw"></i>
                          <span class="ps-2">vermaashwin5@gmail.com</span>
                      </a>
                  </li>
              </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-12 healthcare-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.  </p>
            <ul class="list-unstyled text-center d-flex justify-content-center">
              <li><a href="tel:+91 9877666442"><i class="fas fa-phone fa-flip-horizontal fa-fw"></i><span class="ps-2">999 999 9999</span></a></li>
              <li><a href="mailto:info@docladder.com"><i class="fas fa-envelope fa-fw"></i><span class="ps-2">info@docladder.com</span></a></li>
            </ul>
          </div>
        </div>
      

  </div>
</section>
<!--=================================
Ecosystem -->

<!--=================================
Advertsie with Us -->
<section class="space-ptb bg-dark-primrary" id="mobile-app">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-center advertise-block">
          <h2 class="title pb-3 pb-lg-0">Do You Want to Advertise With Us</h2>
          <div class="justify-content-center d-flex mt-3 mt-lg-5 email-btn">
            <a class="btn btn-outline-white" href="#">Email Us</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Advertsie with Us -->

<!--=================================
Contact Form -->
<section class="space-ptb" id="contact-form">
  <div class="container">
  <?php $validation =  \Config\Services::validation(); ?>
      <div class="row pt-3 px-sm-0 justify-content-center">
         <div class="col-lg-7 col-sm-9">
            <div class="row justify-content-center">
              <div class="col-sm-3"></div>
              <?php if(!empty(session()->getFlashdata("success"))): ?>
                <div class="row justify-content-center"><div class="alert alert-success col-lg-10" role="alert">
                <?= session()->getFlashdata("success") ?>
                </div></div>
                <?php endif; ?>
              <div class="col-sm-7">
                <div class="query-heading">
                  <h2>Send Us Your Query</h2>
                </div>
              </div>
              
                <form action="<?=base_url('contact') ?>" method="post" id="formsubmitted">
                    <div class="form-group row mb-3">
                      <div class="col-3"><label>Name</label></div>
                      <div class="col-9">
                        <input type="text" name="username" class="form-control  <?php if($validation->getError('username')): ?>is-invalid<?php endif ?>" id="Username"></div>
                          <?php if ($validation->getError('username')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username') ?>
                                    </div>                                
                                <?php endif; ?>
                                <span id="user_error"></span>
                        </div>
                    <div class="form-group row mb-3">
                      <div class="col-3"><label>Contact No.</label></div>
                      <div class="col-9"><input type="text" name="phone"  maxlength="10"  class="form-control  <?php if($validation->getError('phone')): ?>is-invalid<?php endif ?>" id="phone"></div>
                        <?php if ($validation->getError('phone')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('phone') ?>
                                    </div>                                
                                <?php endif; ?>
                                <span id="contct_error"></span>
                      </div>
                    <div class="form-group row mb-3">
                      <div class="col-3"><label>Email ID</label></div>
                      <div class="col-9"><input type="text" id="emailid" name="email" class="form-control  <?php if($validation->getError('email')): ?>is-invalid<?php endif ?>" ></div>
                        <?php if ($validation->getError('email')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email') ?>
                                    </div>                                
                                <?php endif; ?>
                                <span id="email_error"></span>
                      </div>
                    <div class="form-group row mb-3">
                      <div class="col-3"><label>Message</label>
                      </div>
                    
                      <div class="col-9">
                          <textarea rows="5" name="message" class="form-control  <?php if($validation->getError('message')): ?>is-invalid<?php endif ?>" id="message"  maxlength="250"></textarea></div>
                        <?php if ($validation->getError('message')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('message') ?>
                                    </div>                                
                                <?php endif; ?>
                              
                      </div>
                         <span id="email_msg"></span>  
                    <div class="row mt-md-3 mt-2">
                      <div class="col-3 text-center"></div>
                      <div class="col-9 text-center">
                        <input class="btn btn-primary main-btn" type="submit" value="Submit"></div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    
  </div>
</section>
<!--=================================
Contact Form -->

    <!--=================================
Newsletter  -->
<section class="space-ptb bg-light">
  <div class="container">
      <div class="row" style="align-items:center;">
          <div class="col-md-5 newsletter-img">
              <img class="img-fluid pe-md-5 me-md-4" src="<?php echo base_url();?>/public/assets/images/newsletter.png" alt="" style="user-select: auto;">
          </div>
          <div class="col-md-6 text-left">
              <div class="newsletter-heading text-left">
                  <h2 class="title">Stay Tuned!</h2>
                  <h3 class="title">Sign Up for the Latest Healthcare Jobs News</h3>
                  <span id="asd"></span>
                  <div class=" mt-3">
                    <form action="<?=base_url('subscribe');?>" method="post" id="newsletterform">
                      <div class="form-group mb-3 d-flex newsletter-email">
                          <input type="email" name="email" class="form-control <?php if($validation->getError('email')): ?>is-invalid<?php endif ?>" id="email_id" placeholder="Enter Email">
                            <!--<input class="subscribe" type="submit" value="Subscribe">-->
                            <button type="submit">Subscribe</button>
                            <?php if ($validation->getError('email')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email') ?>
                                    </div>                                
                                <?php endif; ?>
                          </div>
                          <span id="erromsg"></span>
                      </form>
                  </div>
              </div>
          </div>
          
      </div>
  </div>
</section>
<!--=================================
Newsletter -->

<!--=================================
Footer-->
<?= $this->include('footer') ?>
<!--=================================
Footer-->


<!--=================================
testing Modal Popup -->
<div class="modal  modal-right popup-modal show" id="exampleModalCenterleft" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header p-4" id="popup-list-desc">
        <div class="job-list" style="padding:0;" >
          <div class="job-list-details">
            <div class="job-list-info">
              <div class="job-list-title">
                <h5 class="mb-0"><a href="#">Lorem Ispum</a></h5>
              </div>
              <div class="job-list-option">
                <ul class="list-unstyled">
                  <li>
                    <a href="#">Lorem Ispum</a> <span class="space-line">|</span>
                  </li>
                  <li class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</li>
                </ul>
                <ul class="list-unstyled job-middle">
                  <li style="width: 25%;"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                  <li><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                </ul>
                <ul class="list-unstyled job-middle job-list-favourite-time">
                  <li><a class="btn btn-primary d-grid" href="login.html"> Apply Now</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div style="position: relative;">
         <button type="button" class="btn-close popup-btn" data-bs-dismiss="modal" aria-label="Close" style="position: absolute;top: -80px;right: 5px;"></button>
        </div>
      </div>
      <div class="modal-body">
       <div class="login-register">
          <fieldset>
            <legend class="px-2">Description</legend>
            <div id="jobDescriptionText" class="jobsearch-jobDescriptionText">
              <p>Looking for a front-end developer which can design and develop websites using WordPress CMS.</p>
              <p><b>Min 6 Months experience is required to apply for this job</b></p>
              <p>Job Type: Full-time</p>
              <p>Salary: ₹12,000.00 - ₹32,000.00 per month</p>
              <p>Schedule:</p>
              <ul>
                <li>Day shift</li>
              </ul>
              <p>Education:</p>
              <ul>
                <li>Bachelor's (Preferred)</li>
              </ul>
              <p>Work Remotely:</p>
              <ul>
                <li>No</li>
              </ul>
            </div>
            
          </fieldset>
        </div>
      </div>
    </div>
  </div>
</div>
<!--=================================
testing Modal Popup -->

<!--=================================
Javascript -->

    <script>
      $('.btn-contact-1').click(function() {
          $('.moretext-1').slideToggle();
          if ($('.btn-contact-1').text() == "I’m a Job Seeker") {
              $(this).text("I’m a Job Seeker")
          } else {
              $(this).text("I’m a Job Seeker")
          }
      });
    </script>
    <script>
      $('.btn-contact-2').click(function() {
          $('.moretext-2').slideToggle();
          if ($('.btn-contact-2').text() == "I’m a Recruiter") {
              $(this).text("I’m a Recruiter")
          } else {
              $(this).text("I’m a Recruiter")
          }
      });
    </script>
    <script>
      $('.btn-contact-3').click(function() {
          $('.moretext-3').slideToggle();
          if ($('.btn-contact-3').text() == "I’m trying to Buy/Sell") {
              $(this).text("I’m trying to Buy/Sell")
          } else {
              $(this).text("I’m trying to Buy/Sell")
          }
      });
    </script>


<script>
      $(document).ready(function() {
    $('#formsubmitted').on('submit', function(event){ 
      event.preventDefault();
      var email = $('#emailid').val();
       var name = $('#Username').val();
       var contact = $('#phone').val();
        var text = $('#message').val();
         if (email == '') {
    $('#email_error').html("Email address cannot be empty");
    $('#email_error').parent().show();
    $("#email_error").css("color", "red");
    return false;
    }else{
        $("#email_error").html("");
    }
    if(IsEmail(email)==false){
                $('#email_error').html("Email address invalid");
                $('#email_error').show();
                return false;
            }else{
        $("#email_error").html("");
    }
    function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
    return false;
    }else{
    return true;
    }
    } 
      if (name == '') {
    $('#user_error').html("Name cannot be empty");
    $('#user_error').parent().show();
    $("#user_error").css("color", "red");
    return false;
    }else{
        $("#user_error").html("");
    }  
     if (contact == '') {
    $('#contct_error').html("contact cannot be empty");
    $('#contct_error').parent().show();
    $("#contct_error").css("color", "red");
    return false;
    }else{
        $("#contct_error").html("");
    }
    
     if (text == '') {
    $('#email_msg').html("Message cannot be empty");
    $('#email_msg').parent().show();
    $("#email_msg").css("color", "red");
    return false;
    }else{
        $("#email_msg").html("");
    }
    var data2 = $("#formsubmitted").serialize();
  var url= '<?php echo base_url('Contactus/contact_form');?>';
  $.ajax({
                    type: "post",
                    url:  url,
                    data:data2,
                    dataType:'json',
                    success:function(res){
                     console.log(res);
                     if(res.status==true){
                         alert("data has been updated");
                          window.location.href = '<?php echo base_url('contact');?>'; 
                        
                     }
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }

                });       

    });
});    
</script>

<script>
    $('#newsletterform').on('submit', function(event){ 
      event.preventDefault();
        var email = $('#email_id').val();
          if (email == '') {
    $('#erromsg').html("Email address cannot be empty");
    $('#erromsg').parent().show();
    $("#erromsg").css("color", "red");
    return false;
    }else{
        $("#erromsg").html("");
    }
    if(IsEmail(email)==false){
                $('#erromsg').html("Email address invalid");
                $('#erromsg').show();
                return false;
            }else{
        $("#erromsg").html("");
    }
    function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
    return false;
    }else{
    return true;
    }
    }    
     var url= '<?php echo base_url('Contactus/newsletter');?>';
  $.ajax({
                    type: "post",
                    url:  url,
                    data:{email:email},
                    dataType:'json',
                    success:function(res){
                     console.log(res);
                     if(res.success==true){
                         $('#asd').html('<div class="alert alert-success"></div>');
                         $('.alert').html(res.msg);
                        //   window.location.href = '<?php echo base_url('contact');?>'; 
                        
                       }else if(res.success==false){
                             $('#erromsg').html(res.msg);
                       }else{
                             setTimeout(function () {
                               window.location.href = '<?php echo base_url('contact');?>';
                            }, 3000);
                            document.getElementById("newsletterform").reset(); 
                       }
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }

                }); 
     
     
     
    });
  
</script>


