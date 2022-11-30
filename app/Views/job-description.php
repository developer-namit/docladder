<?= $this->include('jobseeker-header') ?>

<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?= base_url('/public/assets');?>/images/bg-slider/inner-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative inner-slider-heading-main">
      <h1><?= esc($heading) ?></h1>  
      </div>
      </div>
    </div>

</section>
<!--=================================
Slider Banner -->

<!--job list -->
<section class="space-ptb bg-light-white" id="job-description">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-md-12">
            <div class="job-list border p-3">
              <div class=" job-list-logo me-3">
                <img class="img-fluid" src="<?=base_url();?>/public/assets/images/marketing.png" alt="">
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <h5 class="main-h5 mb-0"><?php if(!empty($getuser['job_title'])){ echo ucfirst($getuser['job_title']); }?></h5>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-map-marker-alt pe-1"></i><?php if(!empty($getuser['location'])){ echo $getuser['location']; }?></li>
                      <li><i class="fas fa-phone fa-flip-horizontal fa-fw"></i><span class="ps-2"><?php if(!empty($getuser['contact_name'])){ echo $getuser['contact_name']; }?></span></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="job-list-favourite-time">
                <!--<a  class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>-->
                <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i> <?php if(!empty($getuser['totaldays'])){ echo $getuser['totaldays']; }?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="border p-4 mt-3 mt-lg-3 bg-white">
          <div class="row">
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-debit-card"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1">Offered Salary</label>
                  <span class="mb-0 fw-bold d-block text-dark"><?php if(!empty($getuser['min_salary'])){ echo  $getuser['min_salary']; }?> L - <?php if(!empty($getuser['max_salary'])){ echo $getuser['max_salary']; }?> L</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-md-0 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-apartment"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1"><?= esc($industry)?></label>
                  <span class="mb-0 fw-bold d-block text-dark"><?php if(!empty($getuser['skills_name'])){ echo $getuser['skills_name']; }?></span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-sm-0 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-medal"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1"><?= esc($Experience)?></label>
                  <span class="mb-0 fw-bold d-block text-dark"><?php if(!empty($getuser['maxexp'])){ echo $getuser['maxexp']; }?></span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-mortarboard"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1"><?= esc($qualification)?></label>
                  <span class="mb-0 fw-bold d-block text-dark"><?php if(!empty($getuser['education_name'])){ echo $getuser['education_name']; }?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="my-4 my-lg-4">
          <h5 class="main-h5 mb-3 mb-lg-4"><?= esc($jobdescription)?></h5>
           <p class="fst-italic"><?php if(!empty($getuser['job_description'])){ echo $getuser['job_description']; }?> </p>
        </div>
        <hr>
        <div class="my-4 my-lg-4">
          <h5 class="main-h5 mb-3 mb-lg-4"><?= esc($knowledge)?></h5>
          <ul class="list-unstyled list-style">
              <?php if(!empty($getuser['key_skills'])){ ?>
            <li><i class="far fa-check-circle font-md text-primary me-2"></i>
            <?php echo $getuser['key_skills']; ?>
            </li>
            <?php }?>
          </ul>
        </div>
        <hr>
        <div class="mt-4 mt-lg-4">
          <h5 class="main-h5 mb-3 mb-lg-4"><?= esc($education)?></h5>
          <ul class="list-unstyled list-style mb-4 mb-lg-0">
             <?php if(!empty($getuser['education_name'])){ ?> 
            <li><i class="far fa-check-circle font-md text-primary me-2"></i>
            <?php echo $getuser['education_name']; ?>
            </li>
            <?php }?>
            
            <?php if(!empty($getuser['posteducation_name'])){ ?> 
            <li><i class="far fa-check-circle font-md text-primary me-2"></i>
            <?php echo $getuser['posteducation_name']; ?>
            </li>
            <?php }?>
            
            <?php if(!empty($getuser['specialty_name'])){ ?> 
            <li><i class="far fa-check-circle font-md text-primary me-2"></i>
            <?php echo $getuser['specialty_name']; ?>
            </li>
            <?php }?>
            
            <?php if(!empty($getuser['maxexp'])){ ?> 
            <li><i class="far fa-check-circle font-md text-primary me-2"></i>
            <?php echo $getuser['maxexp']; ?>
            </li>
            <?php }?>
            
          </ul>
        </div>
      </div>
      <!--=================================
      sidebar -->
      <div class="col-lg-4">
        <div class="sidebar mb-0">
            <?php if(!empty($getuser['jobs_status']==1)){?>
          <div class="widget d-grid">
            <button class="btn btn-secondary" id="custom-button"  style="background-color: darkgray; border: 1px;"><i class="far fa-paper-plane"></i><?= esc($button)?></button>
          </div>
          <?php } else{?>
          <div class="widget d-grid">
            <button class="btn btn-secondary" id="btnreinfo" onclick ="myjobapply('<?php if(!empty($getuser['id'])){ echo $getuser['id']; }?>')"><i class="far fa-paper-plane"></i><?= esc($buttonfor)?></button>
          </div>
          <?php }?>
         
          <div class="widget ">
            <div class="widget-title">
              <h5 class="main-h5"><?= esc($similar)?></h5>
            </div>
            <div class="similar-jobs-item widget-box bg-white">
                <?php if(!empty($searchsimilar)){
                    foreach($searchsimilar as $jobsearch){
                        ?>
              
              <div class="job-list">
                <div class="job-list-div">
                  <div class="job-list-logo">
                    <img class="img-fluid" src="<?=base_url();?>/public/assets/images/marketing.png" alt="">
                    <!-- <i class="flaticon-doc"></i> -->
                  </div>
                </div>
                <div class="job-list-details">
                  <div class="job-list-info">
                    <div class="job-list-title">
                      <ul class="list-unstyled">
                        <li><h5 class="mb-0"><a href="<?php if(!empty($jobsearch['id'])){ echo $jobsearch['id'];}?>"><?php if(!empty($jobsearch['skill'])){ echo $jobsearch['skill'];}?></a></h5></li>
                      </ul>
                    </div>
                    <div class="job-list-option">
                      <ul class="list-unstyled">
                        <li><a><?php if(!empty($jobsearch['company_name'])){ echo ucfirst($jobsearch['company_name']);}?></a> </li>
                        <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span><?php if(!empty($jobsearch['location'])){ echo $jobsearch['location'];}?></span></li>
                        <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: <?php if(!empty($jobsearch['min_salary'])){ echo $jobsearch['min_salary'];}?> to <?php if(!empty($jobsearch['max_salary'])){ echo $jobsearch['max_salary'];}?> Lacs</span></li>
                        </ul>
                   </div>
                  </div>
                </div>
              </div>
              
              <?php }}?>
            </div>
          </div>
        </div>
      </div>
      <!--=================================
      sidebar -->
    </div>
  </div>
</section>
<!--=================================
job list -->
<!--=================================
Footer-->
<?= $this->include('jobseeker-footer') ?>
<!--=================================
Footer-->

<script>
function myjobapply(id){     
 var url= '<?php echo base_url();?>'
    $.ajax({
    type: "post",
    url: url +'/JobSeekerSearch/applyJobs',
    data: {id:id},
    dataType: "json",
    beforeSend:function(){
        $('#btnreinfo').attr('disabled', 'disabled');
    },
    success: function (response) {
        $('#btnreinfo').attr('disabled', false);
        $('#btnreinfo').remove('btn-secondary');
        $('#btnreinfo').addClass('custom-button');
        $('#btnreinfo').text('Applied');
        $("#btnreinfo").css({"background-color": "grey", "border": "aliceblue"});

    },
    error: function(error){
     console.log(error); 
   }

 });

 } 

</script>
