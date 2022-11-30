<?= $this->include('header') ?>
<!--=================================
Header -->

<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?=base_url();?>/public/assets/images/bg-slider/inner-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative about-banner inner-slider-heading-main">
        <h2>Category Listing</h2>
        </div>
      </div>
    </div>
</section>
<!--=================================
Slider Banner -->



<section class="space-ptb bg-light-white" id="category-listing" style="padding-top:70px;">
  <div class="container">
    <div class="row " style="border: 2px solid #443000; border-radius: 5px; padding-right: 20px;padding-left: 20px;" id="recent-tabs"> 
        
    <div class="browse-job d-flex pb-lg-2 pt-lg-2 px-lg-4">
        <div class="mb-lg-4 mb-md-0" id="jobs-tabs">
            <ul class="nav nav-tabs justify-content-center d-flex" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="recent-tab" data-bs-toggle="tab" href="#recent-jobs" role="tab" aria-controls="recent-jobs" aria-selected="true">Recent Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="featured-tab" data-bs-toggle="tab" href="#featured-jobs" role="tab" aria-controls="featured-jobs" aria-selected="false">Featured Jobs</a>
                </li>
            </ul>
        </div>
    </div>
    
     <div class="tab-content px-2" id="myTabContent">
            <!-- Recent jobs -->
        <div class="tab-pane fade show active" id="recent-jobs" role="tabpanel" aria-labelledby="recent-tab">
            <div class="row mt-3" >
                    <?php if(!empty($cat)){
                  foreach($cat as $val){
                    ?>
               <div class="col-lg-4 mb-4">
                <div class="employers-list">
                  <div class="employers-list-logo">
                    <img class="img-fluid" src="images/marketing.png" alt="">
                  </div>
                  <div class="employers-list-details">
                    <div class="employers-list-info">
                      <div class="employers-list-title">
                        <h5 class="mb-0"><a href="<?= base_url('jobdescription/'.$val['id']);?>"><?php if(!empty($val['skills'])){ echo $val['skills'];}?></a></h5>
                      </div>
                      <div class="employers-list-option">
                          <ul class="list-unstyled hospital-name">
                          <li><a href="#"><?php if(!empty($val['company_name'])){ echo $val['company_name'];}?></a> </li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-map-marker-alt pe-1"></i><?php if(!empty($val['location'])){ echo $val['location'];}?></li>
                            <li><i class="fas fa-rupee-sign pe-1"></i>Annual CTC: <?php if(!empty($val['min_salary'])){ echo $val['min_salary'];}?>to<?php if(!empty($val['max_salary'])){ echo $val['max_salary'];}?> Lacs</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="employers-list-position">
                    <?php if($val['apply_job']==1){?>
                      <button class="btn desc-btn btn-primary-dark d-grid" id="btnreinfo" disabled>Applied</button>
                    <?php } else {?>
                  <input type="hidden" id="uid" value="<?= $val['id'];?>" >
                  <button class="btn desc-btn btn-primary-dark d-grid"  onclick ="myjobapply()">Apply Now</button>
                     <?php }?> 
                </div>
                </div>
                </div>
                <?php 
                }
                }
                ?>
            </div>
        </div>
        <div class="tab-pane fade show" id="featured-jobs" role="tabpanel" aria-labelledby="featured-tab">
            <div class="row mt-3" >
                  <?php if(!empty($catfeatured)){
          foreach($catfeatured as $featured){
            ?>
            <div class="col-lg-4 mb-4">
        <div class="employers-list">
          <div class="employers-list-logo">
            <img class="img-fluid" src="images/marketing.png" alt="">
          </div>
          <div class="employers-list-details">
            <div class="employers-list-info">
              <div class="employers-list-title">
                <h5 class="mb-0"><a href="#"><?php if(!empty($featured['skills'])){ echo $featured['skills'];}?></a></h5>
              </div>
              <div class="employers-list-option">
                  <ul class="list-unstyled hospital-name">
                  <li><a href="#"><?php if(!empty($featured['company_name'])){ echo $featured['company_name'];}?></a> </li>
                </ul>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt pe-1"></i><?php if(!empty($featured['location'])){ echo $featured['location'];}?></li>
                    <li><i class="fas fa-rupee-sign pe-1"></i>Annual CTC: <?php if(!empty($featured['min_salary'])){ echo $featured['min_salary'];}?>to<?php if(!empty($featured['max_salary'])){ echo $featured['max_salary'];}?> Lacs</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="employers-list-position">
          <?php if($val['apply_job']==1){?>
              <button class="btn desc-btn btn-primary-dark d-grid" id="btnreinfo" disabled>Applied</button>
            <?php } else {?>
          <input type="hidden" id="uid" value="<?= $val['id'];?>" >
          <button class="btn desc-btn btn-primary-dark d-grid"  onclick ="myjobapply()">Apply Now</button>
             <?php }?> 
          </div>
        </div>
        </div>
        <?php }}?>             
           </div>
        </div>
    </div>
    <div class="row">
          <div class="col-12 text-center mt-2">
               <?php echo $pager->links();?>
          </div>
        </div>
    
    
     
    </div>
  </div>
</section>

<!--=================================
Footer-->
<?= $this->include('footer') ?>
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
       
        // $('#btnreinfo').remove('btn-secondary');
        // $('#btnreinfo').addClass('custom-button');
        // $('#btnreinfo').text('Applied');
       //  $("#btnreinfo").css({"background-color": "grey", "border": "aliceblue"});
         setTimeout(function () {
          $('#btnreinfo').attr('disabled', false);
          $('#btnreinfo').remove('btn-secondary');
        $('#btnreinfo').addClass('custom-button');
        $('#btnreinfo').text('Applied');
        $("#btnreinfo").css({"background-color": "grey", "border": "aliceblue"});
        window.location.reload();
                            }, 100);

        
    },
    error: function(error){
     console.log(error); 
   }

 });

 } 
</script>
