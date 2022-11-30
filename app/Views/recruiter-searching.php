<?= $this->include('jobseeker-header') ?>
<!--=================================
Header -->
<style>
      
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
   .form-control select {
    font-size: 16px;
    line-height: 25px;
    color: #747070;
    font-weight: 400;
}

.category-style-box:hover {
 -webkit-box-shadow: 0px 10px 25px -6px rgb(0 0 0 / 15%) !important;
 box-shadow: 0px 10px 25px -6px rgb(0 0 0 / 15%) !important;
}

.job-search-item select {
    padding-left: 50px;
    height: 40px;
    -webkit-box-shadow: none;
    box-shadow: none;
    border: none;
}
span.select2-dropdown.select2-dropdown--below {
    width: 14% !important;
    position: absolute;
}
  .select2-results__option {
  padding-right: 20px;
  vertical-align: middle;
}
.select2-results__option:before {
  content: "";
  display: inline-block;
  position: relative;
  height: 20px;
  width: 20px;

  border-radius: 4px;
  background-color: #fff;
  margin-right: 20px;
  vertical-align: middle;
}
.select-icon .select2-results__option:before,
.select-icon .select2-results__option[aria-selected=true]:before {
	display: none !important;
	/* content: "" !important; */
}
.select2-results__option[aria-selected=true]:before {
  font-family:fontAwesome;
  content: "\f00c";
  color: #fff;
  background-color: #f77750;
  border: 0;
  display: inline-block;
  padding-left: 3px;
}
.select2-container--default .select2-results__option[aria-selected=true] {
	background-color: #fff;
}

.select2-container--default .select2-results__option[aria-selected=true] {
	background-color: #fff;
}
</style>
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
            <form class="row basic-select-wrapper justify-content-center" action="<?= base_url('searching')?>" method="get">
              <div class="col-lg-12">
                <div class="box-shadow search-wrapper-bg">
                    <div class="row">
                      <div class="col-lg-10">
                      <div class="row">
                          <div class="col-lg-3">
                          <div class="form-group mt-0">
                                <div class="form-group-search">
                                    <div class="form-group main-form-input mb-3 mb-lg-0 ">
                                          <div class="position-relative left-icon" >
                                              <input type="text" class="form-control ps-5" name="job_title"  value="<?php if(!empty($_GET['job_title'])){ echo $_GET['job_title']; }?>"  id="adds" placeholder="Hospital" autocomplete="off" >
                                              <i class="fas fa-hospital-alt" ></i>
                                          </div>
                                      </div>
                                </div>
                          </div>
                          </div>
                              <div class="col-lg-3">
                          <div class="form-group mt-0">
                                <div class="form-group-search">
                                    <div class="form-group main-form-input mb-3 mb-lg-0">
                                          <div class="position-relative left-icon slt-location" >
                                          <select class="form-control jquery-select2" name="location[]" id="location" autocomplete="on" multiple>
                                           <option>Select location ...</option>
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
                          </div>
                          <div class="col-lg-3">
                            <div class="form-group mt-0">
                                <div class="form-group main-form-input mb-3 mb-lg-0">
                                      <div class="position-relative left-icon" >
                                        <select class="form-control basic-select"  name="designation"  onchange="getjobfunction(this)">
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
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group mt-0">
                                  <div class="form-group main-form-input mb-3 mb-lg-0">
                                        <div class="position-relative left-icon" >
                                        <select class="form-control basic-select" name="specialization" id="specialization" autocomplete="off">
                                             <?php if(!empty($special)) {
                                            foreach($special as $des){ ?>
                                            <?php if(isset($_GET['specialization']) && !empty($_GET['specialization']== $des['id'])) {?>
                                            <option value="<?= $_GET['specialization']?>" selected="selected"><?= $des['skills'];?></option>
                                            
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
                              <li><span class="date-posted"><i class="far fa-calendar pe-1"></i><?php if(!empty($jobs['created_at'])){ echo $jobs['created_at'];}?></span></li>
                              <li><h5 class="mb-0"><a href="<?= base_url('jobdescription/'.$jobs['id']);?>"><?php if(!empty($jobs['skill'])){ echo ucfirst($jobs['skill']);}?></a></h5></li>
                            </ul>
                          </div>
                          <div class="job-list-option">
                            <ul class="list-unstyled">
                              
                              <li><a href="#"><?php if(!empty($jobs['company_name'])){ echo ucfirst($jobs['company_name']);}?></a> </li>
                              
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