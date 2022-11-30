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
    text-decoration: underline;
    font-weight: 700;
    font-family: 'Montserrat', sans-serif;
}
.job-list-logo {
    -webkit-box-flex: 0;
    text-align: center;
    padding: 0;
    display: block!important;
}
.job-list-div {
    flex: 0 0 30%;
    text-align: center;
}
.job-list {
    background: #ffffff;
    transition: all 0.3s ease-in-out;
    display: flex;
    flex-flow: unset;
    align-items: center;
    height: 100%;
    width: 95%;
    border-radius: 5px;
    box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;
    margin: auto;
}
.job-list .job-list-details {
    padding-left: 0px;
    flex: 0 0 70%!important;
    padding: 5px 0!important;
}
.job-search-item input {
    padding-left: 50px;
}
@media screen and (max-device-width: 480px){
.pagination .page-item .page-link {
    padding: 3px 4px;
  }
}
@media screen and (max-device-width: 767px){
.pagination .page-item {
    padding: 6px;
  }
}
@media screen and (max-device-width: 991px){
 .job-list {
    padding-right: 20px;
  }
}
@media screen and (max-device-width: 575px){
.job-search-item input {
    width: 100%;
   }
}
</style>
<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?=base_url('public/assets');?>/images/bg-slider/inner-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative about-banner inner-slider-heading-main">
        <h2>Browse premium job seeker </h2>
      </div>
      </div>
    </div>
</section>
<!--=================================
Slider Banner -->

<!--=================================
Browse By Category Start -->
<section class="space-ptb bg-light-white" id="premium-jobs-option"> 
  <div class="container">
      <!--<div class="row">-->
      <!--    <div class="col-lg-12"><h2 class="main-site-title sub-title-bg text-center ms-2"><span>Premium Job Seeker</span></h2></div>-->
      <!--</div>-->
      <div class="job-search-item mt-4 mb-4">
        <form>  
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                                <div class="box-shadow search-wrapper-filter">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group mt-0">
                          <!-- <label class="form-label">Job Function</label> -->
                          <div class="form-group main-form-input">
                                <div class="position-relative left-icon">
                                        <input type="text" class="form-control" name="job_title" placeholder="Location" autocomplete="off">
                                        <i class="fas fa-map-marker-alt" style="user-select: auto;"></i>
                                    </div>
                            </div>
                      </div>
                    </div>
                    <!--<div class="col-lg-5">-->
                    <!--    <div class="form-group mt-0">-->
                    <!--      <div class="form-group-search">-->
                              <!-- <label class="form-label">Hospital</label> -->
                    <!--          <div class="form-group main-form-input">-->
                    <!--                <div class="position-relative left-icon">-->
                    <!--                    <input type="text" class="form-control" name="salary" placeholder="Salary" autocomplete="off">-->
                    <!--                    <i class="fas flaticon-salary me-2"></i>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="mt-0 text-center">
                                  <a href="searched-jobs.html" class="searched-btn"><input class="btn btn-secondary main-btn" type="button" value="Search"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
                </div>
                <div class="col-md-2"></div>
            </div>

        </form>
      </div>
      <div class="row mt-3">
        <div class="col-lg-4 mb-4">
            <!-- Freelance -->
            <div class="job-list">
              <div class="job-list-div">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?= base_url('public/assets') ?>/images/docladder-icons/doc.png" alt="">
                  <!-- <i class="flaticon-doc"></i> -->
                </div>
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <ul class="list-unstyled">
                      <li><span class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</span></li>
                      <li><h5 class="mb-0 text-left"><a href="#">Lorem Ispum</a></h5></li>
                    </ul>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                      <li class="education"><i class="fas fa-scroll pe-1"></i><span>Qualification: MBBS, MD</span></li>
                      <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                      <li class="detail-link text-right"><a href="recruiter-signup.html">View Details</a></li></ul>
                 </div>
                </div>
              </div>
              
            </div>
          </div>
        <div class="col-lg-4 mb-4">
            <!-- Freelance -->
            <div class="job-list">
              <div class="job-list-div">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?= base_url('public/assets') ?>/images/docladder-icons/doc.png" alt="">
                  <!-- <i class="flaticon-doc"></i> -->
                </div>
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <ul class="list-unstyled">
                      <li><span class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</span></li>
                      <li><h5 class="mb-0 text-left"><a href="#">Lorem Ispum</a></h5></li>
                    </ul>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                      <li class="education"><i class="fas fa-scroll pe-1"></i><span>Qualification: MBBS, MD</span></li>
                      <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                      <li class="detail-link text-right"><a href="recruiter-signup.html">View Details</a></li></ul>
                 </div>
                </div>
              </div>
              
            </div>
          </div>
        <div class="col-lg-4 mb-4">
            <!-- Freelance -->
            <div class="job-list">
              <div class="job-list-div">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?= base_url('public/assets') ?>/images/docladder-icons/doc.png" alt="">
                  <!-- <i class="flaticon-doc"></i> -->
                </div>
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <ul class="list-unstyled">
                      <li><span class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</span></li>
                      <li><h5 class="mb-0 text-left"><a href="#">Lorem Ispum</a></h5></li>
                    </ul>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                      <li class="education"><i class="fas fa-scroll pe-1"></i><span>Qualification: MBBS, MD</span></li>
                      <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                      <li class="detail-link text-right"><a href="recruiter-signup.html">View Details</a></li></ul>
                 </div>
                </div>
              </div>
              
            </div>
          </div>
      </div>
      <div class="row mt-3">
        <div class="col-lg-4 mb-4">
            <!-- Freelance -->
            <div class="job-list">
              <div class="job-list-div">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?= base_url('public/assets') ?>/images/docladder-icons/doc.png" alt="">
                  <!-- <i class="flaticon-doc"></i> -->
                </div>
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <ul class="list-unstyled">
                      <li><span class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</span></li>
                      <li><h5 class="mb-0 text-left"><a href="#">Lorem Ispum</a></h5></li>
                    </ul>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                      <li class="education"><i class="fas fa-scroll pe-1"></i><span>Qualification: MBBS, MD</span></li>
                      <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                      <li class="detail-link text-right"><a href="recruiter-signup.html">View Details</a></li></ul>
                 </div>
                </div>
              </div>
              
            </div>
          </div>
        <div class="col-lg-4 mb-4">
            <!-- Freelance -->
            <div class="job-list">
              <div class="job-list-div">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?= base_url('public/assets') ?>/images/docladder-icons/doc.png" alt="">
                  <!-- <i class="flaticon-doc"></i> -->
                </div>
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <ul class="list-unstyled">
                      <li><span class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</span></li>
                      <li><h5 class="mb-0 text-left"><a href="#">Lorem Ispum</a></h5></li>
                    </ul>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                      <li class="education"><i class="fas fa-scroll pe-1"></i><span>Qualification: MBBS, MD</span></li>
                      <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                      <li class="detail-link text-right"><a href="recruiter-signup.html">View Details</a></li></ul>
                 </div>
                </div>
              </div>
              
            </div>
          </div>
        <div class="col-lg-4 mb-4">
            <!-- Freelance -->
            <div class="job-list">
              <div class="job-list-div">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?= base_url('public/assets') ?>/images/docladder-icons/doc.png" alt="">
                  <!-- <i class="flaticon-doc"></i> -->
                </div>
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <ul class="list-unstyled">
                      <li><span class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</span></li>
                      <li><h5 class="mb-0 text-left"><a href="#">Lorem Ispum</a></h5></li>
                    </ul>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                      <li class="education"><i class="fas fa-scroll pe-1"></i><span>Qualification: MBBS, MD</span></li>
                      <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                      <li class="detail-link text-right"><a href="recruiter-signup.html">View Details</a></li></ul>
                 </div>
                </div>
              </div>
              
            </div>
          </div>
      </div>
      <div class="row mt-3">
        <div class="col-lg-4 mb-4">
            <!-- Freelance -->
            <div class="job-list">
              <div class="job-list-div">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?= base_url('public/assets') ?>/images/docladder-icons/doc.png" alt="">
                  <!-- <i class="flaticon-doc"></i> -->
                </div>
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <ul class="list-unstyled">
                      <li><span class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</span></li>
                      <li><h5 class="mb-0 text-left"><a href="#">Lorem Ispum</a></h5></li>
                    </ul>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                      <li class="education"><i class="fas fa-scroll pe-1"></i><span>Qualification: MBBS, MD</span></li>
                      <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                      <li class="detail-link text-right"><a href="recruiter-signup.html">View Details</a></li></ul>
                 </div>
                </div>
              </div>
              
            </div>
          </div>
        <div class="col-lg-4 mb-4">
            <!-- Freelance -->
            <div class="job-list">
              <div class="job-list-div">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?= base_url('public/assets') ?>/images/docladder-icons/doc.png" alt="">
                  <!-- <i class="flaticon-doc"></i> -->
                </div>
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <ul class="list-unstyled">
                      <li><span class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</span></li>
                      <li><h5 class="mb-0 text-left"><a href="#">Lorem Ispum</a></h5></li>
                    </ul>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                      <li class="education"><i class="fas fa-scroll pe-1"></i><span>Qualification: MBBS, MD</span></li>
                      <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                      <li class="detail-link text-right"><a href="recruiter-signup.html">View Details</a></li></ul>
                 </div>
                </div>
              </div>
              
            </div>
          </div>
        <div class="col-lg-4 mb-4">
            <!-- Freelance -->
            <div class="job-list">
              <div class="job-list-div">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?= base_url('public/assets') ?>/images/docladder-icons/doc.png" alt="">
                  <!-- <i class="flaticon-doc"></i> -->
                </div>
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <ul class="list-unstyled">
                      <li><span class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</span></li>
                      <li><h5 class="mb-0 text-left"><a href="#">Lorem Ispum</a></h5></li>
                    </ul>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                      <li class="education"><i class="fas fa-scroll pe-1"></i><span>Qualification: MBBS, MD</span></li>
                      <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                      <li class="detail-link text-right"><a href="recruiter-signup.html">View Details</a></li></ul>
                 </div>
                </div>
              </div>
              
            </div>
          </div>
      </div>
      <div class="row mt-3">
        <div class="col-lg-4 mb-4">
            <!-- Freelance -->
            <div class="job-list">
              <div class="job-list-div">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?= base_url('public/assets') ?>/images/docladder-icons/doc.png" alt="">
                  <!-- <i class="flaticon-doc"></i> -->
                </div>
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <ul class="list-unstyled">
                      <li><span class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</span></li>
                      <li><h5 class="mb-0 text-left"><a href="#">Lorem Ispum</a></h5></li>
                    </ul>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                      <li class="education"><i class="fas fa-scroll pe-1"></i><span>Qualification: MBBS, MD</span></li>
                      <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                      <li class="detail-link text-right"><a href="recruiter-signup.html">View Details</a></li></ul>
                 </div>
                </div>
              </div>
              
            </div>
          </div>
        <div class="col-lg-4 mb-4">
            <!-- Freelance -->
            <div class="job-list">
              <div class="job-list-div">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?= base_url('public/assets') ?>/images/docladder-icons/doc.png" alt="">
                  <!-- <i class="flaticon-doc"></i> -->
                </div>
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <ul class="list-unstyled">
                      <li><span class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</span></li>
                      <li><h5 class="mb-0 text-left"><a href="#">Lorem Ispum</a></h5></li>
                    </ul>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                      <li class="education"><i class="fas fa-scroll pe-1"></i><span>Qualification: MBBS, MD</span></li>
                      <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                      <li class="detail-link text-right"><a href="recruiter-signup.html">View Details</a></li></ul>
                 </div>
                </div>
              </div>
              
            </div>
          </div>
        <div class="col-lg-4 mb-4">
            <!-- Freelance -->
            <div class="job-list">
              <div class="job-list-div">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?= base_url('public/assets') ?>/images/docladder-icons/doc.png" alt="">
                  <!-- <i class="flaticon-doc"></i> -->
                </div>
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <ul class="list-unstyled">
                      <li><span class="date-posted"><i class="far fa-calendar pe-1"></i>03-Mar-2022</span></li>
                      <li><h5 class="mb-0 text-left"><a href="#">Lorem Ispum</a></h5></li>
                    </ul>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span>Moga</span></li>
                      <li class="education"><i class="fas fa-scroll pe-1"></i><span>Qualification: MBBS, MD</span></li>
                      <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: 60 to 72 Lacs</span></li>
                      <li class="detail-link text-right"><a href="recruiter-signup.html">View Details</a></li></ul>
                 </div>
                </div>
              </div>
              
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-12 text-center mt-2">
          <ul class="pagination justify-content-center">
            <li class="page-item "> <span class="page-link b-radius-none prev-p">Prev</span> </li>
            <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">21</a></li>
            <li class="page-item"> <a class="page-link next-p" href="#">Next</a> </li>
          </ul>
        </div>
      </div>
    
  </div>
</section>
<!--=================================
Browse By Category Ends-->





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
