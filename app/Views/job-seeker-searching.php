
<?= $this->include('jobseeker-header') ?>
<!--=================================
Header -->
<style>
       
       @media (max-width: 991px) {
           #nav-icon4{
               margin-top: 30px;
           }
       }
     #testing ul {
         position: relative;
         margin-bottom: 0;
     }
     #testing li {
         padding: 0;
         border-bottom: 1px solid #fff;
         font-weight: 500;
         font-size: 16px;
         margin-bottom: 0;
     }
     .resume-sec h5 {
       font-size: 20px;
       letter-spacing: 1px;
       line-height: 35px;
       color: #443000;
       font-weight: 700;
       border-bottom: 2px solid #443000;
     }
     #testing ul li a {
         font-size: 16px;
         line-height: 20px;
         color: #000000;
         font-weight: 500;
     }
     #testing ul li a:hover{
         color: #986c00;
     }
     #testing ul li a:focus{
         color: #986c00;
     }
     #testing h2{
       color:#fff;
       padding-top:10px;
     }
     .container-ul {
       width: 100%;
       margin: auto;
       height: auto;
       overflow: hidden;
       padding: 5px 20px 0;
     }
     .resume-sec {
         position: relative;
         background: #fff;
         box-shadow: 0 5px 25px 0 rgb(41 128 185 / 15%);
         -webkit-box-shadow: 0 5px 25px 0 rgb(41 128 185 / 15%);
         border-radius: 5px;
         padding: 12px 12px 30px;
         box-sizing: border-box;
         
         overflow: hidden;
         transition: .6s linear;
         display: flex;
         justify-content: center;
         align-items: center;
         flex-wrap: wrap;
     }
     .resume-col{
         width:100%;
         margin: 15px auto;
         height: 180px;
         overflow: hidden;
         padding:0 5px;
     }
     .nav-tabs .nav-item .nav-link {
         margin-top: -38px;
         background-color: #fff;
     }
     .employers-list-logo img {
       border: 2px solid #9c7100;
       background: #fff;
       height: 120px;
   }
     .category-style-box {
       background-color: #fff;
       margin-bottom: 25px;
       padding: 25px 0px 30px;
       height: 210px;
   }

.category-style-box:hover {
 -webkit-box-shadow: 0px 10px 25px -6px rgb(0 0 0 / 15%) !important;
 box-shadow: 0px 10px 25px -6px rgb(0 0 0 / 15%) !important;
}

</style>
<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?= base_url('public/assets');?>/images/bg-slider/contact-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative inner-slider-heading-main">
        <h1>FIND JOBS</h1>
        <!--<h2>Build an Ecosystem for Healthcare Industry</h2>-->
      </div>
      </div>
    </div>
</section>
<!--=================================
Slider Banner -->

<!--=================================


<!--=================================
job-grid -->
<section class="space-ptb bg-light-white" id="equipments">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--=================================
        right-sidebar -->

        <div class="row" id="recent-jobs">
            <div class="row mt-3">
              <?php  if(!empty($jobposting)){
                foreach($jobposting as $jobs){
                  ?>
                <div class="col-lg-4 mb-4">
                    <!-- Freelance -->
                    <div class="job-list">
                      <div class="job-list-div">
                        <div class="job-list-logo">
                          <img class="img-fluid" src="<?=base_url('public/assets');?>/images/marketing.png" alt="">
                          <!-- <i class="flaticon-doc"></i> -->
                        </div>
                      </div>
                      <div class="job-list-details">
                        <div class="job-list-info">
                          <div class="job-list-title">
                            <ul class="list-unstyled">
                              <li><span class="date-posted"><i class="far fa-calendar pe-1"></i><?php if(!empty($jobs['created_at'])){ echo $jobs['created_at'];}?></span></li>
                              <li><h5 class="mb-0"><a href="#"><?php if(!empty($jobs['skill'])){ echo $jobs['skill'];}?></a></h5></li>
                            </ul>
                          </div>
                          <div class="job-list-option">
                            <ul class="list-unstyled">
                              
                              <li><a href="#"><?php if(!empty($jobs['company_name'])){ echo $jobs['company_name'];}?></a> </li>
                              
                              <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span><?php if(!empty($jobs['location'])){ echo $jobs['location'];}?></span></li>
                              <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC:</span><span><?php if(!empty($jobs['min_salary'])){ echo $jobs['min_salary'];}?></span>  to <span><?php if(!empty($jobs['max_salary'])){ echo $jobs['max_salary'];}?></span> Lacs</span></li>
                              <li class="detail-link"><a href="<?= base_url('jobdescription/'.$jobs['id']);?>">View Details</a></li></ul>
                         </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <?php }}?>
            </div>
        </div>
        
            <div class="row">
          <div class="col-12 text-center mt-2">
                <?php echo $pager->links();?>
          </div>
        </div>

        
      </div>
    </div>
  </div>
</section>
<!--=================================
job-grid -->




<!--=================================
Footer-->
<?= $this->include('jobseeker-footer') ?>
<!--=================================
Footer-->