<?= $this->include('header') ?>
<style>
.recruiter {
    text-align: center!important;
    margin-top: 0px;
    padding-top: 0px!important;
}
.recruiter h5 {
    font-size: 38px;
}
.premium-job{
    position: absolute;
    padding-top: 30px;
    text-align: right;
}
.premium-job h6 {
    color: #fff;
    font-size: 21px;
    line-height: 30px;
    color: #ffffff;
    font-weight: 700;
    font-family: 'Montserrat', sans-serif;
}
.premium-job a {
    color: #fff;
    font-size: 18px;
    /* text-decoration: underline; */
    font-weight: 700;
    font-family: 'Montserrat', sans-serif;
    border: 2px solid #fff;
    font-size: 16px;
    line-height: 30px;
    color: #13648c;
    padding: 5px 22px;
    border-radius: 5px;
    cursor: pointer;
    background-color: #fff;
}
.premium-job p {
    margin-top: 20px;
}
@media screen and (max-width:991px){
.recruiter-btn {
    display: block;
}
.get-col {
    display: block;
  }
.bg-green {
    height: 560px!important;
}
.recruiter-image-block .recruiter {
    position: unset;
}
.premium-job {
    text-align: center;
    width: 100%;
}
}
@media screen and (max-device-width: 767px){
.recruiter h5 {
    margin-left: 0px;
}
.premium-job {
    position: inherit;
    padding-top: 30px;
    text-align: center;
}
}
@media screen and (max-device-width: 575px){
.recruiter h5 {
    display: block;
}
.nav-tabs .nav-item .nav-link {
    font-size: 16px;
}
}
@media screen and (max-width: 440px){
.bg-green {
    height: 620px!important;
  }
}
@media screen and (max-width: 390px){
.bg-green {
    height: 620px!important;
    padding: 10px!important;
  }
}
@media screen and (min-device-width: 1800px){
#homepage-slider .carousel-control-next {
    right: 0!important;
  }
}
@media screen and (min-device-width: 1800px){
#homepage-slider .carousel-control-prev {
    left: 0!important;
  }
}
@media screen and (min-device-width: 992px) and (max-device-width: 1199px){
.recruiter-image-block .recruiter {
    left: 0px;
  }
.recruiter h5 {
    font-size: 32px;
  }
}
</style>
<!--=================================
Banner -->
    <section class="clearfix slider-banner homepage-slider" id="homepage-slider">
        <div class="mainSlider-wrapper">
            <div id="slider" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#slider" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#slider" data-bs-slide-to="1"></li>
                    <li data-bs-target="#slider" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/bg-slider/slider-4.png" alt="">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/bg-slider/slider-5.jpg" alt="">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/bg-slider/slider-5.jpg" alt="">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#slider" role="button" data-bs-slide="prev" data-bs-target="#slider">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slider" role="button" data-bs-slide="next" data-bs-target="#slider">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container slider-form-outer">
            <div class="slider-form-wrapper">
                <div class="row justify-content-center">
                    <!--<div class="col-sm-12 justify-content-center text-center">-->
                    <!--    <h1 class="text-upper slider-heading-main mb-lg-4 mb-2"><span class="text-primary">Change</span> is here</h1>-->
                    <!--</div>-->
                    <div class="col-sm-12">
                        <div class="slider-form">
                            <div class="row" style="justify-content:center;">
                                <div class="col-sm-12 bg-white slider-border-left">
                                    <div class="job-search-column px-lg-5 px-3 pb-lg-5 pb-4 pt-4 text-center">
                                        <h1 class="text-upper slider-heading-main mb-2"><span class="text-primary">Change is here</span> </h1>
                                        <h3 class="slider-title-dark mb-2">Search by skills. View salaries. One-click-apply</h3>
                                        <div>
                                            <br>
                                            <?php $validation =  \Config\Services::validation(); ?>
                                             <form class="" action="<?= base_url('findsjob')?>" method="get">
                                                <ul class="list-unstyled row mb-0">
                                                    
                                                    <li class="job-search-item col-lg-4">
                                                        <div class="form-group mb-lg-4 mb-2 main-form-input">
                                                            <div class="position-relative left-icon">
                                                                <select class="form-control ps-5 basic-select" name="designation" id="designation"  onchange="getjobfunction(this)">
                                                                    <option value="">Job Function</option>
                                                                    <?php if(!empty($designation)) {
                                                                    foreach($designation as $des){ ?>                                  
                                                                    <option value="<?= $des['designation_id']?>"><?= $des['designation'];?></option>
                                                                    <?php
                                                                    }
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <i class="fas fa-search"></i>
                                                            </div>
                                                        </div>
                                                        <?php if ($validation->getError('designation')): ?>
                                                        <div class="invalid-color" style="color:red;">
                                                        <?= $validation->getError('designation') ?>
                                                        </div>                                
                                                        <?php endif; ?>
                                                    </li>
                                                    <li class="job-search-item col-lg-4">
                                                        <div class="form-group main-form-input mb-2">
                                                            <div class="position-relative left-icon">
                                                                <select class="form-control basic-select" name="specialization" id="specialization" autocomplete="off">
                                                                 </select>
                                                                <i class="fas fa-plus-circle"></i>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="job-search-item col-lg-4">
                                                        <div class="form-group main-form-input mb-2">
                                                            <div class="position-relative left-icon slt-location">
                                                               <select class="form-control jquery-select2" name="location[]" id="location" autocomplete="on" multiple>
                                                                    <option disabled>Select Location...</option>
                                                                    <option value="NI">Anywhere in North India</option>
                                                                    <option value="EI">Anywhere in East India</option>
                                                                    <option value="WI">Anywhere in West India</option>
                                                                    <option value="SI">Anywhere in South India</option> 
                                                                    <?php if(!empty($margedata)){
                                                                    foreach($margedata as $val){?>
                                                                    <option value="<?= $val['name'];?>"><?= strtolower($val['name']);?></option>
                                                                    <?php if(!empty($val['city'])){
                                                                    foreach($val['city'] as $cities){?>
                                                                    <option value="<?= $cities['name'];?>"><?= $cities['name'];?></option>
                                                                    <?php }}}} ?>
                                                                          </select>
                                                                <i class="fas fa-map-marker-alt"></i>
                                                            </div>
                                                        </div>
                                                         <?php if ($validation->getError('location')): ?>
                                                            <div class="invalid-color" style="color:red;">
                                                            <?= $validation->getError('location') ?>
                                                            </div>                                
                                                            <?php endif; ?>
                                                    </li>
                                                </ul>
                                                <ul class="list-unstyled row mb-0">
                                                   
                                                </ul>
                                                <div class="mt-2 mt-lg-3 text-center">
                                                    <input  class="main-btn btn-primary" type="submit" value="Find Jobs">
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-sm-5 bg-primary slider-border-right">-->
                                <!--    <div class="slider-ul">-->
                                <!--        <ul class="list-unstyled">-->
                                <!--            <li class="slider-heading">Make your Search <em><strong>easy</strong></em>.</li>-->
                                <!--            <li class="slider-title">Upload Your Resume</li>-->
                                <!--            <li class="slider-content">Don't have resume? Build one in 3 steps</li>-->
                                <!--            <li class="slider-btn mt-lg-3 mt-2"><a href="#" class="btn-primary-dark">Upload/Create Resume</a></li>-->
                                <!--        </ul>-->
                                <!--    </div>-->
                                <!--</div>-->
                        <div class="bg-dark-primrary slider-border-bottom row justify-content-center">
                            <div class="row" id="counter-div" style="width: 812px;">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-3">
                                    <ul class="list-unstyled justify-content-center d-flex mb-0 align-items-center">
                                        <li class="me-2"><img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/bg-icons/job-seekers.png" alt=""></li>
                                        <li class="counter-text">
                                            <span class="mb-0"><?php if(!empty($total_jobposting)){echo $total_jobposting; }?>+</span>
                                            <label class="mb-0">Job Seekers</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-3">
                                    <ul class="list-unstyled justify-content-center d-flex mb-0 align-items-center">
                                        <li class="me-2"><img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/bg-icons/recruiters.png" alt=""></li>
                                        <li class="counter-text">
                                            <span class="mb-0"><?php if(!empty($total_recuiter)){echo $total_recuiter; }?>+</span>
                                            <label class="mb-0">Recruiters</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-3">
                                    <ul class="list-unstyled justify-content-center d-flex mb-0 align-items-center">
                                        <li class="me-2 "><img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/bg-icons/suitcase.png" alt=""></li>
                                        <li class="counter-text">
                                            <span class="mb-0">5 Laks+</span>
                                            <label class="mb-0">Job</label>
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
        </div>
    </section>
<!--=================================
Banner -->

<!--=================================
Featured Advertisers-->
    <section class="space-ptb" id="featured-advertisers">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title center">
                        <!--<p class="subtitle">OVER 1 LAKH+ JOBS</p>-->
                        <h2 class="title">Top Hiring Recruiters</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class="col-12 text-center">
                    <div class="owl-carousel owl-nav-bottom-center " data-nav-arrow="true" data-nav-dots="false" data-items="5" data-md-items="4" data-sm-items="3" data-xs-items="3" data-xx-items="2" data-space="0" data-autoheight="true">
                        
                        <div class="item">
                            <div class="employers-grid mb-3 mb-md-0">
                                <div class="employers-list-logo">
                                    <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/advertisers/brareye.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="employers-grid mb-3 mb-lg-0">
                                <div class="employers-list-logo">
                                    <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/advertisers/care max.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="employers-grid mb-3 mb-md-0">
                                <div class="employers-list-logo">
                                    <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/advertisers/life care.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="employers-grid mb-3 mb-lg-0">
                                <div class="employers-list-logo">
                                    <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/advertisers/navchetan.jpg" alt="">
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div class="employers-grid mb-3 mb-lg-0">
                                <div class="employers-list-logo">
                                    <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/advertisers/randhawa.jpg" alt="">
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div class="employers-grid mb-3 mb-md-0">
                                <div class="employers-list-logo">
                                    <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/advertisers/virk hsp.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="employers-grid mb-3 mb-lg-0">
                                <div class="employers-list-logo">
                                    <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/advertisers/swastik.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="employers-grid mb-3 mb-lg-0">
                                <div class="employers-list-logo">
                                    <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/advertisers/life2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 justify-content-end d-flex pb-3 pe-5 recruiter-view-btn">
                    <a class="text-white" href="top-recruiters.html" target="_blank">View More</a>
                </div>
            </div>
            <!--<div class="row mt-5">   -->
            <!--    <div class="col-12 justify-content-center d-flex mt-md-3 mt-3 main-btn-dark">-->
            <!--        <a class="btn btn-primary-dark" href="top-recruiters.html" target="_blank">View More</a>-->
            <!--    </div>-->
            <!--</div> -->
        </div>
    </section>
<!--=================================
Featured Advertisers -->


<!--=================================
Browse By Category Start -->
    <section class="space-ptb bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title center">
                        <p class="subtitle text-primary-light">EXPLORE TRENDING JOB SEARCHES </p>
                        <h2 class="title text-primary-dark">Browse By Category</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center ">
                <div class="col-lg-12 mt-0 mt-md-3 mt-lg-0">
                    <div class="row category-style text-center">
                        <?php if(!empty('designation')){
                            foreach($designation as $jobprofile){
                                ?>
                          
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class=" category-style-box"  onclick="mycategory('<?=$jobprofile['designation_id'];?>')">
                                <a class="category-item mainTitle">
                                    <div class="category-icon mb-3">
                                        <img class="img-fluid" src="<?=base_url('public/assets/images');?>/<?php if(!empty($jobprofile['logo'])){ echo $jobprofile['logo']; }?>" alt="">
                                        <input type="hidden" id="category" value="<?=$jobprofile['designation_id'];?>" >
                                    </div>
                                    <h6><?=$jobprofile['designation']?></h6>
                                    <span class="mb-0"><?php if(!empty($jobprofile['total'])){echo $jobprofile['total']; }?> Open Position <i class="fas fa-chevron-down" ></i></span>
                                </a>
                            </div>
                        </div>
                        <?php   
                            }
                        }
                        ?>
                       </div>
                </div>
            </div>
        </div>
    </section>
<!--=================================
Browse By Category Ends-->


<!--=================================
Jobs-listing -->
    <section class="space-ptb">
        <div class="container">
            <!--<div class="row">-->
            <!--    <div class="col-12">-->
            <!--        <div class="section-title center mb-5 pb-3">-->
            <!--            <p class="subtitle">DON'T KNOW WHERE TO START</p>-->
            <!--            <h2 class="title">Trending Jobs You May Be Interested In</h2>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="pb-lg-5 pb-4" style="border: 2px solid #443000; border-radius: 5px; padding-right: 20px;padding-left: 20px;" id="recent-tabs">
                <div class="col-12">
                    <div class="browse-job d-flex pb-lg-2 pt-lg-2 px-lg-4">
                        <div class="mb-lg-4 mb-md-0" id="jobs-tabs">
                            <ul class="nav nav-tabs justify-content-center d-flex" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="recent-tab" data-bs-toggle="tab" href="#recent-jobs" role="tab" aria-controls="recent-jobs" aria-selected="true">Recent Jobs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="featured-tab" data-bs-toggle="tab" href="#featured-jobs" role="tab" aria-controls="featured-jobs" aria-selected="false">Featured Jobs</a>
                                </li>
                                <!--<li class="nav-item">-->
                                <!--  <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Upgrade</a>-->
                                <!--</li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content px-2" id="myTabContent">
                        <!-- Recent jobs -->
                        <div class="tab-pane fade show active" id="recent-jobs" role="tabpanel" aria-labelledby="recent-tab">
                           
                            <div class="row mt-3" >
                                 <?php if(!empty($recentjob)){
                                foreach($recentjob as $val){?>
                                <div class="col-lg-4 mb-4">
                                    <!-- Freelance -->
                                    <div class="job-list">
                                        <div class="job-list-div">
                                            <div class="job-list-logo">
                                                <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/marketing.png" alt="">
                                                <!-- <i class="flaticon-doc"></i> -->
                                            </div>
                                        </div>
                                        <div class="job-list-details">
                                            <div class="job-list-info">
                                                <div class="job-list-title">
                                                    <ul class="list-unstyled">
                                                        <li><span class="date-posted"><i class="far fa-calendar pe-1"></i><?= $val['created_at'];?></span></li>
                                                        <li>
                                                            <h5 class="mb-0"><a href="#"><?php if(!empty($val['skills'])){ echo $val['skills']; }?></a></h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="job-list-option">
                                                    <ul class="list-unstyled">
                                                        <li><a><?php if(!empty($val['company_name'])){ echo $val['company_name']; }?></a> </li>
                                                        <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span><?php if(!empty($val['location'])){ echo $val['location']; }?></span></li>
                                                        <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: <?php if(!empty($val['min_experience'])) { $val['min_experience']; }?> to <?php if(!empty($val['max_experience'])) { echo $val['max_experience']; }?> Lacs</span></li>
                                                          <?php  $session=session();
                                                            if (!$session->get('isLoggedIn')== true) {?>
                                                             <li><a class="detail-link" href="<?php echo base_url('Jobseeker');?>" >View Details</a></li> 
                                                        <?php } else {?>
                                                           <li><a class="detail-link" onclick="mygetfunction(<?php echo $val['id'];?>)">View Details</a></li>
                                                       <?php }?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                 <?php        
                             }
                            }
                            ?>
                            </div>
                           
                           
                            <div class="row" style="justify-content: space-between;">
                                <div class="col-12 justify-content-center d-flex mt-md-3 mt-0 main-btn-dark">
                                     
                                <a class="btn btn-primary-dark " href="<?= base_url('RecentJob');?>" target="_blank">View More</a>
                                                       
                                </div>
                            </div>
                        </div>
                        <!-- Popular jobs -->
                        <div class="tab-pane fade show" id="featured-jobs" role="tabpanel" aria-labelledby="featured-tab">
                           <div class="row mt-3" >
                                 <?php if(!empty($freaturedjobs)){
                                foreach($freaturedjobs as $fval){?>
                                <div class="col-lg-4 mb-4">
                                    <!-- Freelance -->
                                    <div class="job-list">
                                        <div class="job-list-div">
                                            <div class="job-list-logo">
                                                <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/marketing.png" alt="">
                                                <!-- <i class="flaticon-doc"></i> -->
                                            </div>
                                        </div>
                                        <div class="job-list-details">
                                            <div class="job-list-info">
                                                <div class="job-list-title">
                                                    <ul class="list-unstyled">
                                                        <li><span class="date-posted"><i class="far fa-calendar pe-1"></i><?= $fval['created_at'];?></span></li>
                                                        <li>
                                                            <h5 class="mb-0"><a href="login.html"><?php if(!empty($fval['skills'])){ echo $fval['skills']; }?></a></h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="job-list-option">
                                                    <ul class="list-unstyled">
                                                        <li><a><?= $fval['company_name'];?></a> </li>
                                                        <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span><?php if(!empty($fval['location'])){ echo $fval['location']; }?></span></li>
                                                        <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: <?php if(!empty($fval['min_experience'])){ $fval['min_experience'];}?> to <?php if(!empty($fval['max_experience'])){ echo  $fval['max_experience']; }?> Lacs</span></li>
                                                        <?php if (session()->get('isLoggedIn')== true && session()->get('status')==1) {?>
                                                                     <li><a class="detail-link" onclick="mygetfunction(<?php echo $fval['id'];?>)">View Details</a></li>
                                                        <?php } else{?>
                                                        <li class="detail-link"><a href="<?=base_url('Jobseeker');?>">View Details</a></li>
                                                        <?php }?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                 <?php        
                             }
                            }
                            ?>
                            </div>
                            <div class="row" style="justify-content: space-between;">
                                <div class="col-12 justify-content-center d-flex mt-md-3 mt-0 main-btn-dark">
                                     <?php if (session()->get('isLoggedIn')== true && session()->get('status')==1) {?>
                                                        <a class="btn btn-primary-dark " href="<?= base_url('FeaturedJob');?>" target="_blank">View More</a>
                                                        <?php } else{?>
                                                        <a class="btn btn-primary-dark"  target="_blank" href="<?=base_url('Jobseeker');?>">View More</a></li>
                                                        <?php }?>
                                </div>
                            </div>
                            
                            
                            
                        </div>




                    </div>
                </div>
                <!--<div class="col-12 justify-content-center d-flex mt-md-3 mt-3 main-btn-dark">-->
                <!--  <a class="btn btn-primary-dark " href="recent-jobs.html" target="_blank">View More</a>-->
                <!--</div>-->
            </div>
        </div>
    </section>
<!--=================================
Jobs-listing -->

<!--=================================


<!--=================================
Recruiter Attention -->
    <section class="bg-green">
        <div class="container">
            <div class="row">
                <div class=" col-sm-12 col-xl-12 col-md-12 col-lg-6">
                    <div class="recruiter-ul">
                        <ul class="list-unstyled">
                            <li class="recruiter-heading">Job Seeker</li>
                            <li class="recruiter-title">Accelerate Your Job Search</li>
                            <li class="recruiter-content">SERVICES TO HELP YOU FIND JOB FASTER</li>
                            <li class="recruiter-btn justify-content-lg-start mt-2"><a data-bs-toggle="modal" data-bs-target="#premuimpartnermodal">Be a Premium Partner</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-12 col-md-12 col-lg-3">
                    <div class="recruiter-image-block">
                        <!--<img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/recruiter.png" alt="">-->
                        <div class="recruiter">
                            <h5>GET RECRUITERS ATTENTION</h5>
                        </div>
                    </div>
                </div>
                  <div class="col-sm-12 col-xl-12 col-md-12 col-lg-3">
                    <div class="recruiter-image-block">
                        <!--<img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/recruiter.png" alt="">-->
                        <div class="premium-job">
                            <h6>FIND OUR PREMIUM JOB SEEKERS DOCTORS</h6>
                            <p><a href="https://tryyourwork.com/docladder/home/findOurPremiumJobSeekers">Click Here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--=================================
Recruiter Attention -->

<!--=================================
Testimonial Starts-->
    <section class="space-ptb overflow-hidden" id="testimonial">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-title center">
                        <p class="subtitle"> WE COMMIT TO PROVIDE BEST SERVICES</p>
                        <h2 class="title">Happy Clients Testimonials</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <!--<div class="owl-carousel owl-nav-bottom-center " data-nav-arrow="true" data-nav-dots="false" data-items="5" data-md-items="4" data-sm-items="3" data-xs-items="2" data-xx-items="1" data-space="15" data-autoheight="true">-->
                    <div class="owl-carousel testimonial-center owl-nav-bottom-center" data-nav-arrow="true" data-items="4" data-md-items="3" data-sm-items="3" data-xs-items="2" data-xx-items="1" data-space="0" data-autoheight="true">
                        <div class="item">
                            <div class="testimonial-item-02">
                                <div class="testimonial-author">
                                    <div class="testimonial-avatar avatar avatar-lg">
                                        <img class="img-fluid rounded-circle" src="<?php echo base_url();?>/public/assets/images/avatar/01.jpg" alt="">
                                    </div>
                                    <div class="testimonial-name">
                                        <h6 class="mb-1">Michael Bean</h6>

                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>The Jobber database has been one of our current sources for recruitment, backed by a very experienced team who would go out of their way to make sure that requests are taken ahead. </p>
                                </div>
                                <div class="testimonial-btn"><a href="#">Read More..</a></div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item-02">
                                <div class="testimonial-author">
                                    <div class="testimonial-avatar avatar avatar-lg">
                                        <img class="img-fluid rounded-circle" src="<?php echo base_url();?>/public/assets/images/avatar/01.jpg" alt="">
                                    </div>
                                    <div class="testimonial-name">
                                        <h6 class="mb-1">Michael Bean</h6>

                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>The Jobber database has been one of our current sources for recruitment, backed by a very experienced team who would go out of their way to make sure that requests are taken ahead. </p>
                                </div>
                                <div class="testimonial-btn"><a href="#">Read More..</a></div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item-02">
                                <div class="testimonial-author">
                                    <div class="testimonial-avatar avatar avatar-lg">
                                        <img class="img-fluid rounded-circle" src="<?php echo base_url();?>/public/assets/images/avatar/01.jpg" alt="">
                                    </div>
                                    <div class="testimonial-name">
                                        <h6 class="mb-1">Michael Bean</h6>

                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>The Jobber database has been one of our current sources for recruitment, backed by a very experienced team who would go out of their way to make sure that requests are taken ahead. </p>
                                </div>
                                <div class="testimonial-btn"><a href="#">Read More..</a></div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item-02">
                                <div class="testimonial-author">
                                    <div class="testimonial-avatar avatar avatar-lg">
                                        <img class="img-fluid rounded-circle" src="<?php echo base_url();?>/public/assets/images/avatar/01.jpg" alt="">
                                    </div>
                                    <div class="testimonial-name">
                                        <h6 class="mb-1">Michael Bean</h6>

                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>The Jobber database has been one of our current sources for recruitment, backed by a very experienced team who would go out of their way to make sure that requests are taken ahead. </p>
                                </div>
                                <div class="testimonial-btn"><a href="#">Read More..</a></div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item-02">
                                <div class="testimonial-author">
                                    <div class="testimonial-avatar avatar avatar-lg">
                                        <img class="img-fluid rounded-circle" src="<?php echo base_url();?>/public/assets/images/avatar/01.jpg" alt="">
                                    </div>
                                    <div class="testimonial-name">
                                        <h6 class="mb-1">Michael Bean</h6>

                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>The Jobber database has been one of our current sources for recruitment, backed by a very experienced team who would go out of their way to make sure that requests are taken ahead. </p>
                                </div>
                                <div class="testimonial-btn"><a href="#">Read More..</a></div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item-02">
                                <div class="testimonial-author">
                                    <div class="testimonial-avatar avatar avatar-lg">
                                        <img class="img-fluid rounded-circle" src="<?php echo base_url();?>/public/assets/images/avatar/01.jpg" alt="">
                                    </div>
                                    <div class="testimonial-name">
                                        <h6 class="mb-1">Michael Bean</h6>

                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>The Jobber database has been one of our current sources for recruitment, backed by a very experienced team who would go out of their way to make sure that requests are taken ahead. </p>
                                </div>
                                <div class="testimonial-btn"><a href="#">Read More..</a></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--<div class="row mt-2">-->
            <!--    <div class="col-12 justify-content-center d-flex mt-md-3 mt-3 main-btn">-->
            <!--        <a class="btn btn-primary" href="testimonial.html">View More</a>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </section>
<!--=================================
Testimonial Ends-->

<!--=================================


<!--=================================
Footer Start-->
<?= $this->include('footer') ?>
<!--=================================
Footer Ends-->

<!--=================================
testing Modal Popup -->
    <div class="modal  modal-right popup-modal show" id="exampleModalCenterleft" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="popup-list-desc" style="background-image: url(<?=base_url();?>/public/assets/images/popup-banner.png);">
                    <div class="job-list" style="justify-content: space-between;">
                        
                        <div class="job-list-option optn-detail px-lg-3 px-2">
                            <ul class="list-unstyled desc-header mb-0">
                                <li>
                                    <h5><a href="#" class="title_job"></a></h5>
                                </li>
                                <li class="desc-address-details">
                                    <a href="#"><span class="company"></span> <span class="space-line">|</span><span class='location'></span></a>
                                </li>
                                <li class="desc-price">
                                    <ul class="list-inline d-flex">
                                        <li><i class="fas fa-rupee-sign pe-1"></i><span id="min_salary">/- </span></li>
                                        <li><i class="fas fa-rupee-sign pe-1"></i><span id="max_salary"></span> <span>Lac</span></li>
                                        <li>CTC</li>
                                    </ul>
                                </li>
                            </ul>

                            <!--<ul class="list-unstyled job-middle job-list-favourite-time">-->
                            <!--  <li><a class="btn btn-primary d-grid" href="login.html"> Apply Now</a></li>-->
                            <!--</ul>-->
                        </div>
                       
                        <div class="job-list-option  px-lg-3 px-2">
                            <button class="btn desc-btn btn-primary-dark d-grid" id="btnreinfo" onclick ="myjobapply()" style="font-size:16px; padding:3px 10px;">Apply Now</button>
                            <input type="hidden" name="id" id="uid" value="">
                            <input type="hidden" name="id" id="sid" value="">
                        </div>

                    </div>
                    <div style="position: relative;">
                        <button type="button" class="btn-close popup-btn" data-bs-dismiss="modal" aria-label="Close" style="position: absolute;top: -182px;right: 13px;opacity: 1;"></button>
                    </div>
                </div>
                <div class="modal-body p-md-4 p-3">
                    <div class="login-register">
                        <div id="jobDescriptionText" class="jobDescriptionText">
                            <h2>Job Details:<span id="jobdetails"></span></h2>
                            <h3>Description:</h3>
                            <p class="description-details"></p>
                            <p>Qualification Required: <span id="postgraduation"></span>/<span id="graduation"></span></p>
                            <p>Desired Profile :<span id="desired_profile"></span> </p>
                            <p>Job Function : <span id="jobfunction"></span></p>
                            <p>Experience/Training:</p>
                            <ul class="bullets-primary desc-list">
                                <li id="max_experience">Physican</li>
                                
                            </ul>
                            <p>Key Skills: <span id="keyskill"></span></p>
                            <p>Contact Details: <span id="contact_name"></span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-lg-4" id="popup-list-desc">
                    <div class="desc-footer">
                        <h4>APPLY RIGHT WAY</h4>
                        <h5>Think you're the perfect candidate?</h5>
                    </div>
                    <div>
                        <button class="btn btn-primary-dark desc-btn" id="btnbottoninfo" onclick ="myjobbottomapply()"  style="background-color: aliceblue; border: aliceblue; color: black;">Apply Now</button>
                       </div>
                </div>
            </div>
        </div>
    </div>
<!--=================================
testing Modal Popup -->

<!--=================================
Premuim Partner Modal Popup -->
    <div class="modal  modal-right popup-modal show" id="premuimpartnermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="popup-list-desc" style="background-image: url(<?= base_url('/public/assets/');?>images/popup-banner.png);">
                    <div style="position: relative;width:100%;">
                        <button type="button" class="btn-close popup-btn" data-bs-dismiss="modal" aria-label="Close" style="position: absolute;top: -182px;right: 13px;opacity: 1;"></button>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <div class="login-register">
                        <div id="jobDescriptionText" class="jobDescriptionText pb-3">
                            <h2>Benefits</h2>
                            <ul class="bullets">
                                <li>Candidate profile will be visible on portal's home page.</li>
                                <li>If any recruiter searches any of the specialization then upgraded resumes will be display on top.</li>
                                <li>Jobseeker can access the live sessions.</li>
                                <li>Posting of equipment & space will be shown on top.</li>
                                <li>Free notification will be send by admin related to his/her profile regarding job.</li>
                                <li>Get best Packages in the industry.</li>
                            </ul>
                            <!-- <ol class="num-ol">
                                <li>Candidate profile will be visible on portal's home page.</li>
                                <li>If any recruiter searches any of the specialization then upgraded resumes will be display on top.</li>
                                <li>Jobseeker can access the live sessions.</li>
                                <li>Posting of equipment & space will be shown on top.</li>
                                <li>Free notification will be send by admin related to his/her profile regarding job.</li>
                                <li>Get best Packages in the industry.</li>
                            </ol> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--=================================
Premuim Partner Modal Popup -->

<!--=================================
Browse by category Modal Popup -->
    <div class="modal fade" id="categoryModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header p-3 px-4">
                    <h4 class="mb-0 text-center">
                        <span id="categorytitle"></span>
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="tab-content click-tab-bg">
                        <div class="tab-pane fade active show" id="home-1" role="tabpanel" aria-labelledby="home-tab-1">
                            <div class="row" id="allcategory">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--=================================
Browse by category Modal Popup -->
<script src="<?=base_url('public/assets');?>/js/category.js"></script>
<script>
    function mygetfunction(id){
     var url= '<?php echo base_url('Home/Getjobposting');?>';
    $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                        // Check Session save                    
                      console.log(data);
                      var aply= data['applied_job'];
                      console.log(aply);
                      $('#uid').val(data['id']);
                      $('#sid').val(data['session_id']);
                        $('.title_job').html(data['company_name']);
                        $('#jobdetails').html(data['job_title']);
                      $('#keyskill').html(data['key_skills']);
                      $('#min_experience').html(data['minexperience']);
                      $('#max_experience').html(data['maxexperience']);
                      $('.location').html(data['location']);
                      $('#max_salary').html(data['max_salary']);
                      $('#min_salary').html(data['min_salary']);
                      $('.description-details').html(data['job_description']);
                      $('#graduation').html(data['edu_name']);
                      $('#postgraduation').html(data['posteducation_name']); 
                      $('#specialty').html(data['specialty_name']);
                      $('.company').html(data['company_name']);
                      $('#excutive_name').html(data['executive_name']);
                      $('#contact_name').html(data['contact_name']);
                      $('#email_id').html(data['email']);
                      $('#desired_profile').html(data['desired_profile']);
                      $('#jobfunction').html(data['skills_name']);
                      $('#specialization').html(data['specialization']);
                      
                      if(aply==1){
                        $('#btnreinfo').attr('disabled', false);
                        $('#btnreinfo').remove('btn-secondary');
                        $('#btnreinfo').addClass('custom-button');
                        $('#btnreinfo').text('Applied');
                        $("#btnreinfo").css({"background-color": "#0D7E82", "border": "#0D7E82"});
                       
                      }else{
                        $('#btnreinfo').text('Apply Now');
                        $("#btnreinfo").css({"background-color": "#0D7E82","color": "#fff", "border": "2px solid #0D7E82"});
                      }
                      
                      if(aply==1){
                        $('#btnbottoninfo').attr('disabled', false);
                        $('#btnbottoninfo').remove('btn-secondary');
                        $('#btnbottoninfo').addClass('custom-button');
                        $('#btnbottoninfo').text('Applied');
                        $("#btnbottoninfo").css({"background-color": "#0D7E82", "border": "#0D7E82"});
                       
                      }else{
                        $('#btnbottoninfo').text('Apply Now');
                        $("#btnbottoninfo").css({"background-color": "#0D7E82","color": "#fff", "border": "2px solid #0D7E82"});
                      }
                      
                      
                      
                      $("#exampleModalCenterleft").modal('show');                   
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                }); 
  }
</script>

<!--apply job-->

<script>
function myjobapply(){
    var id = $('#uid').val();
    var url= '<?php echo base_url();?>'
    $.ajax({
    type: "post",
    url: url +'/JobSeekerSearch/applyJobs',
    data: {id:id},
    dataType: "json",
    beforeSend:function(){
        $('#btnreinfo').attr('disabled', 'disabled');
    },
    success: function (res) {
        console.log(res);
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

<script>
    function myjobbottomapply(){
      var id = $('#uid').val();
    var url= '<?php echo base_url();?>'
    $.ajax({
    type: "post",
    url: url +'/JobSeekerSearch/applyJobs',
    data: {id:id},
    dataType: "json",
    beforeSend:function(){
        $('#btnbottoninfo').attr('disabled', 'disabled');
    },
    success: function (res) {
        console.log(res);
        $('#btnbottoninfo').attr('disabled', false);
        $('#btnbottoninfo').remove('btn-secondary');
        $('#btnbottoninfo').addClass('custom-button');
        $('#btnbottoninfo').text('Applied');
         $("#btnbottoninfo").css({"background-color": "grey", "border": "aliceblue"});
        
    },
    error: function(error){
     console.log(error); 
   }

 });  
    }
</script>


<!--// select2 multiple function-->
<script>
$(".jquery-select2").select2({
			closeOnSelect : false,
			placeholder : "Location",
			allowHtml: true,
			allowClear: true,
			tags: true // создает новые опции на лету
		});

			$('.icons_select2').select2({
				width: "100%",
				templateSelection: iformat,
				templateResult: iformat,
				allowHtml: true,
				placeholder: "Location",
				dropdownParent: $( '.select-icon' ),//обавили класс
				allowClear: true,
				multiple: false
			});
	

				function iformat(icon, badge,) {
					var originalOption = icon.element;
					var originalOptionBadge = $(originalOption).data('badge');
				 	return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '<span class="badge">' + originalOptionBadge + '</span></span>');
				}



</script>
<script>
    function getjobfunction(sel) {
    var skill = sel.value;
    if (skill > 0) {
        var url = '<?=base_url('RecruiterHome/getdata');?>';
        $.ajax({
            type: "post",
            url: url,
            data: { skill: skill },
            dataType: 'json',
            success: function(res) {
                console.log('res', res);
                var html = "";
                for (var count = 0; count < res.length; count++) {
                    html += '<option value="' + res[count]['id'] + '">' + res[count]['skills'] + '</option>';
                }
                $('#specialization').html(html);
            },
            error: function(err) {
                console.log('Erro', err)
            }
        });
    }
}
</script>

<script>
$("#designation").select2({
  tags: "true",
  placeholder: "Select an option",
  allowClear: true
});
    
</script>
