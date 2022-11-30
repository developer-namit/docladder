<?= $this->include('jobseeker-header') ?>
<!--=================================
Header -->

<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?= base_url('public/assets');?>/images/bg-slider/contact-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative inner-slider-heading-main">
        <h1>Applied JOBS</h1>
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
                              <li><span class="date-posted"><i class="far fa-calendar pe-1"></i><?php if(!empty($jobs['created_at'])){ echo ucfirst($jobs['created_at']);}?></span></li>
                              <li><h5 class="mb-0"><a href="#"><?php if(!empty($jobs['skills'])){ echo ucfirst($jobs['skills']);}?></a></h5></li>
                            </ul>
                          </div>
                          <div class="job-list-option">
                            <ul class="list-unstyled">
                              
                              <li><a href="#"><?php if(!empty($jobs['company_name'])){ echo ucfirst($jobs['company_name']);}?></a> </li>
                              
                              <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span><?php if(!empty($jobs['location'])){ echo $jobs['location'];}?></span></li>
                              <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC:</span><span><?php if(!empty($jobs['min_salary'])){ echo $jobs['min_salary'];}?></span>  to <span><?php if(!empty($jobs['max_salary'])){ echo $jobs['max_salary'];}?></span> Lacs</span></li>
                             
                             <?php if (session()->get('isLoggedIn')== true && session()->get('status')==1) {?>
                                <li class="detail-link">
                                <a href="<?= base_url('jobdescription/'.$jobs['jobposting_id']);?>">View Details</a>
                            </li>
                            <?php }else{?>   

                                   <li class="detail-link">
                                <a href="<?= base_url('Jobseeker');?>">View Details</a>
                            </li>
                            <?php }?>
                            </ul>
                         
                            </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <?php }}?>
            </div>
            <div class="row justify-content-center">
            <div class="col-12 text-center">
            <?php echo $pager->links();?>
            </div>
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






<!-- // job function -->

<script>
  function getjobfunction(sel){  
      var skill= sel.value;
      if(skill >0){
      var url= '<?php echo base_url('RecruiterHome/getdata');?>';
          $.ajax({
                    type: "post",
                    url:  url,
                    data:{skill:skill},
                    dataType:'json',
                    success:function(res){
                     console.log('res',res);
                     var html="";
                      for(var count=0; count < res.length; count++){                 
                      html+= '<option value="'+res[count]['id']+'">'+res[count]['skills']+'</option>';
                     }
                     $('#specialization').html(html);
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                });
      }
  }
    </script>