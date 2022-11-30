<?= $this->include('header') ?>
<!--=================================
Header -->

<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?= base_url('public/assets');?>/images/bg-slider/contact-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative inner-slider-heading-main">
        <h1>Search Recruiter</h1>
        <!--<h2>Build an Ecosystem for Healthcare Industry</h2>-->
      </div>
      </div>
    </div>
</section>

<!--=================================
Slider Banner -->
<!--=================================
search below -->
<section class="space-ptb bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="job-search-field job-search-field-02">
          <div class="job-search-item">
            <form class="row basic-select-wrapper justify-content-center" action="<?= base_url('findjobs')?>" method="get">
                <?php $validation =  \Config\Services::validation(); ?>
              <div class="col-lg-12">
                <div class="box-shadow search-wrapper-bg">
                    <div class="row">
                      <div class="col-lg-10">
                      <div class="row">                    
                        
                          <div class="col-lg-4">
                            <div class="form-group mt-0">
                                <div class="form-group main-form-input mb-3 mb-lg-0">
                                      <div class="position-relative left-icon" >
                                        <select class="form-control basic-select" name="designation"  onchange="getjobfunction(this)" autocomplete="off">
                                         <option value=""></option>
                                         <?php if(!empty($designation)) {
                                            foreach($designation as $des){ ?>
                                            <?php if(isset($_GET['designation']) && !empty($_GET['designation']== $des['designation_id'])) {?>
                                            <option value="<?= $des['designation_id']?>" selected="selected"><?= $des['designation'];?></option>
                                            <?php } else {?>
                                            <option value="<?= $des['designation_id']?>"><?= $des['designation'];?></option>
                                            <?php
                                            }
                                            }
                                            }
                                            ?>
                                        </select>
                                      <i class="fas fa-search" disabled></i>
                                      </div>
                                  </div>
                            </div>
                              <?php if ($validation->getError('designation')): ?>
                                                        <div class="invalid-color" style="color:red;">
                                                        <?= $validation->getError('designation') ?>
                                                        </div>                                
                                                        <?php endif; ?>
                            </div>
                           
                            <div class="col-lg-4">
                              <div class="form-group mt-0">
                                  <div class="form-group main-form-input mb-3 mb-lg-0">
                                        <div class="position-relative left-icon" >
                                        <select class="form-control basic-select" name="specialization" id="specialization" autocomplete="off">
                                         <?php if(!empty($special)) {
                                            foreach($special as $skill){ ?>
                                            <?php if(isset($_GET['specialization']) && !empty($_GET['specialization']== $skill['id'])) {?>
                                            <option value="<?= $_GET['specialization']?>" selected="selected"><?= $skill['skills'];?></option>
                                            
                                            <?php
                                            }
                                            }
                                            }
                                            ?>
                                        </select>   
                                        <i class="fas fa-plus-circle" ></i></i>
                                        </div>
                                    </div>
                              </div>
                            </div>
                            
                            <div class="col-lg-4">
                          <div class="form-group mt-0">
                                <div class="form-group-search">
                                    <div class="form-group main-form-input">
                                          <div class="position-relative left-icon slt-location" >
                                          <select class="form-control jquery-select2" name="location[]" id="location" autocomplete="on" multiple>
                                          <option disabled>Select Location...</option>
                                                <option value="NI" <?php if(!empty($_GET['location']) && in_array("NI", $_GET['location'])) {echo("selected");}?>>Anywhere in North India</option>  
                                                <option value="EI" <?php if(!empty($_GET['location']) && in_array("EI", $_GET['location'])) {echo("selected");}?>>Anywhere in East India</option>
                                                <option value="WI" <?php if(!empty($_GET['location']) && in_array("WI", $_GET['location'])) {echo("selected");}?>>Anywhere in West India</option>
                                                <option value="SI" <?php if(!empty($_GET['location']) && in_array("SI", $_GET['location'])) {echo("selected");}?>>Anywhere in South India</option>
                                                <?php if(!empty($margedata)){
                                                foreach($margedata as $val){?>
                                                <option value="<?= $val['name'];?>" <?php if(!empty($_GET['location']) && in_array($val['name'], $_GET['location'])) {echo("selected");}?>><?= strtolower($val['name']);?></option>
                                                <?php if(!empty($val['city'])){
                                                foreach($val['city'] as $cities){?>
                                                <option value="<?= $cities['name'];?>" <?php if(!empty($_GET['location']) && in_array($cities['name'], $_GET['location'])) {echo("selected");}?>><?= $cities['name'];?></option>
                                                <?php }}  } } ?>                                                                 
                                    </select> 
                                              <i class="fas fa-map-marker-alt" style="user-select: auto;"></i>
                                          </div>
                                      </div>
                                </div>
                          </div>
                            <?php if ($validation->getError('location')): ?>
                                                        <div class="invalid-color" style="color:red;">
                                                        <?= $validation->getError('location') ?>
                                                        </div>                                
                                                        <?php endif; ?>
                          </div>
                            
                      </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <div class="mt-0 text-center">
                              <a href="" class="searched-btn">
                                <input class="btn btn-secondary main-btn" type="submit" value="Search"></a>
                          </div>
                    </div>

                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
search below -->

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
                              <li><h5 class="mb-0"><a href="#"><?php if(!empty($jobs['skill'])){ echo ucfirst($jobs['skill']);}?></a></h5></li>
                            </ul>
                          </div>
                          <div class="job-list-option">
                            <ul class="list-unstyled">
                              
                              <li><a href="#"><?php if(!empty($jobs['company_name'])){ echo ucfirst($jobs['company_name']);}?></a> </li>
                              
                              <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span><?php if(!empty($jobs['location'])){ echo $jobs['location'];}?></span></li>
                              <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC:</span><span><?php if(!empty($jobs['min_salary'])){ echo $jobs['min_salary'];}?></span>  to <span><?php if(!empty($jobs['max_salary'])){ echo $jobs['max_salary'];}?></span> Lacs</span></li>
                             
                             <?php if (session()->get('isLoggedIn')== true && session()->get('status')==1) {?>
                                <li class="detail-link">
                                <a href="<?= base_url('jobdescription/'.$jobs['id']);?>">View Details</a>
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


        </div>
        
      </div>
    </div>
  </div>
</section>
<!--=================================
job-grid -->




<!--=================================
Footer-->
<?= $this->include('footer') ?>
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