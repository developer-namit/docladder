<?= $this->include('recruiter-header') ?>
    <!--=================================
Header -->

    <!--=================================
Register -->
    <section class="space-ptb-outer bg-light recruiter-job-posting">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="main-site-title sub-title-bg mb-3"><span>Simple Search</span></h2>
                </div>
                <div class="col-lg-4"></div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <form class="postjob-form" action="<?php echo base_url('SimpleSearching');?>" method="post">
                                <!--general info-->
                                <div class="box">
                                    <div class="row box-header">
                                        <h4>General Information</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="row bg-white login-register justify-content-center check-select-p">
                                            <div class="form-group col-md-12 select-border mb-3">
                                                <label>Key Skills</label>
                                                <select class="form-control basic-select" multiple="multiple" placeholder="Enter a Title" name="skill[]">
                                                <<?php if (!empty($skills)){ 
                                                    foreach($skills as $val) {
                                                        ?>
                                                    <option value="<?php echo $val['skills']; ?> "><?php if(!empty($val['skills'])){ echo $val['skills']; }?></option>
                                                    <?php }}?>
                                            </select>
                                            </div>
                                            <div class="form-group col-md-12 select-border mb-3">
                                                <label>Current Location</label>
                                                <select class="form-control basic-select-2" multiple="multiple" name="location[]">
                                                   <?php if (!empty($allocation)){ 
                                                    foreach($allocation as $val) {
                                                        ?>
                                                    <option value="<?php if(!empty($val['id'])){ echo $val['id']; }?> "><?php if(!empty($val['name'])){ echo $val['name']; }?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 select-border mb-3">
                                                <label>Preferred Location</label>
                                                <select class="form-control basic-select-2" multiple="multiple" name="preferlocation[]" >
                                                <?php if (!empty($allocation)){ 
                                                    foreach($allocation as $val) { ?>                           
                                                    <option value="<?php if(!empty($val['id'])){ echo $val['id']; }?> "><?php if(!empty($val['name'])){ echo $val['name']; }?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 select-border mb-3">
                                                <label>Min Experience<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select" name="min_experience">
                                                    <option value="0" selected="selected">0</option>
                                                    <option value="1">6 Months</option>
                                                    <option value="2">9 Months</option>
                                                    <option value="3">1 Years</option>
                                                    <option value="4">2 Years</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 select-border mb-3">
                                                <label>Max Experience<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select" name="max_experience">
                                                    <option value="" selected="selected">Select Value</option>
                                                    <option value="1">3 Years</option>
                                                    <option value="2">4 Years</option>
                                                    <option value="3">5 Years</option>
                                                    <option value="4">6 Years</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Min Salary<em class="text-danger">*</em> <small>( in Lacs )</small></label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend d-flex">
                                                    <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                                                  </div>
                                                  <input type="text" class="form-control" placeholder="Min" name="min_salary">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Max Salary<em class="text-danger">*</em> <small>( in Lacs )</small></label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend d-flex">
                                                    <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                                                  </div>
                                                  <input type="text" class="form-control" placeholder="Max" name="max_salary">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 select-border mb-3">
                                                <label>Job Function<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select" name="designation" id="designation">
                                                <?php if (!empty($designation)){ 
                                                    foreach($designation as $val) { ?>                           
                                                    <option value="<?php echo $val['designation_id'];?>"><?php if(!empty($val['designation'])){ echo $val['designation']; }?></option>
                                                    <?php }}?>
                                            </select>
                                            </div>
                                            <div class="form-group col-md-12 select-border mb-3">
                                                <label>Area of Specialization<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select" name="specialization" id="specialization"> 
                                            </select>
                                            </div>
                                            <div class="text-center">
                                                <div class="form-group col-md-12 mt-2 mb-3">
                                                    <a href="simple-search-results.html">
                                                        <input class="btn btn-secondary main-btn" type="submit" value="Start Search"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-post blog-post-you-tube text-center" id="equipment-video">
                        <div class="js-video [youtube, widescreen]">
                            <iframe src="https://www.youtube.com/embed/JC6hiHsHWxo" allowfullscreen=""></iframe>
                        </div>
                        <div class="blog-post-content">
                            <div class="blog-post-details">
                            <div class="blog-post-title">
                                <h4><a href="#">Watch Youtube Video</a></h4>
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
<?= $this->include('recruiter-footer') ?>

<script>
  $(document).ready(function () {
    $('#designation').on('change', function () {  
      var skill= this.value;
      var url= '<?php echo base_url('RecruiterHome/getdata');?>';
          $.ajax({
                    type: "post",
                    url:  url,
                    data:{skill:skill},
                    dataType:'json',
                    success:function(res){
                     console.log('res',res);
                     var html="";                        
                    var html= '<option value="" >Select Area of Specialization</option>';
                     for(var count=0; count < res.length; count++){                 
                      html+= '<option value="'+res[count]['id']+'">'+res[count]['skills']+'</option>';
                     }
                     $('#specialization').html(html);
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                });     
    }).change();
  });
    </script>

   