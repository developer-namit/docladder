<?= $this->include('recruiter-header') ?>
<style>
    .recruiter-btn a{
            border: 2px solid #0d7e82;
        padding:3px 15px;
        font-size:18px;
    }
</style>
<!--=================================
Header -->
<!--=================================
Register -->
<section class="space-ptb-outer bg-light recruiter-job-posting">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
            <div class="row">
              <div class="col-lg-8 text-center mb-3">
                <h2 class="main-site-title sub-title-bg"><span>Post a new job</span></h2>
             </div>
             <div class="col-lg-4"></div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="row">
                    <div class="col-lg-8">
                        <form class="postjob-form" action="<?php echo base_url();?>" method="post" id="myform">
                        <input type="hidden" name="id" value="<?php if(!empty($getemp['id'])){echo $getemp['id'];}?>"> 
                            <div class="box-header">
                                <h4>General Information</h4>
                              </div>
                            <div class="box">
                                <div class="box-body">
                                    <div class="bg-white login-register justify-content-center">
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Job Title<em class="text-danger">*</em></label>
                                                <input type="text" name="job_title" id="job_title" class="form-control" value="<?php if(!empty($getemp['job_title'])){echo $getemp['job_title'];}?>" placeholder="Enter a Title">
                                                <div class='error_field' id='name_error_msg'></div>
                                            </div>
                                            <div class="form-group col-md-12 select-border mb-3">
                                                <label>Key Skills<em class="text-danger">*</em></label>
                                                <input type="text" name="key_skills" id="key_skills" placeholder="Enter Key Skills" class="form-control" value="<?php if(!empty($getemp['key_skills'])){echo $getemp['key_skills'];}?>">
                                                <div class='error_field' id='key_skill_error_msg'></div>
                                            </div>
                                            <div class="form-group col-md-6 select-border mb-3">
                                                <label>Min Experience<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select" name="min_experience" required>
                                                   <option value="0" <?php if(isset($getemp['min_experience']) && $getemp['min_experience'] == '0'){echo("selected");}?>>Fresher</option>                                      
                                                <option value="1" <?php if(isset($getemp['min_experience']) && $getemp['min_experience'] == '1'){echo("selected");}?>>1Y Experience</option>
                                                <option value="2" <?php if(isset($getemp['min_experience']) && $getemp['min_experience'] == '2'){echo("selected");}?>>2Y Experience</option>
                                                <option value="3" <?php if(isset($getemp['min_experience']) && $getemp['min_experience'] == '3'){echo("selected");}?>>3Y Experience</option>
                                                <option value="4" <?php if(isset($getemp['min_experience']) && $getemp['min_experience'] == '4'){echo("selected");}?>>4Y Experience</option>
                                                <option value="5" <?php if(isset($getemp['min_experience']) && $getemp['min_experience'] == '5'){echo("selected");}?>>5Y Experience</option>
                                                <option value="6" <?php if(isset($getemp['min_experience']) && $getemp['min_experience'] == '6'){echo("selected");}?>>6Y Experience</option>
                                                <option value="7" <?php if(isset($getemp['min_experience']) && $getemp['min_experience'] == '7'){echo("selected");}?>>7Y Experience</option>
                                                <option value="8" <?php if(isset($getemp['min_experience']) && $getemp['min_experience'] == '8'){echo("selected");}?>>8Y Experience</option>
                                                <option value="9" <?php if(isset($getemp['min_experience']) && $getemp['min_experience'] == '9'){echo("selected");}?>>9Y Experience</option>
                                                <option value="10" <?php if(isset($getemp['min_experience']) && $getemp['min_experience'] == '10'){echo("selected");}?>>10Y Experience</option>
                                                <option value="11" <?php if(isset($getemp['min_experience']) && $getemp['min_experience'] == '11'){echo("selected");}?>>10Y+ Experience</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 select-border mb-3">
                                                <label>Max Experience<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select" name="max_experience" required>
                                                  <option value="" selected="selected">Select Value</option>
                                                <option value="1" <?php if(isset($getemp['max_experience']) && $getemp['max_experience'] == '1'){echo("selected");}?>>1Y Experience</option>
                                                <option value="2" <?php if(isset($getemp['max_experience']) && $getemp['max_experience'] == '2'){echo("selected");}?>>2Y Experience</option>
                                                <option value="3" <?php if(isset($getemp['max_experience']) && $getemp['max_experience'] == '3'){echo("selected");}?>>3Y Experience</option>
                                                <option value="4" <?php if(isset($getemp['max_experience']) && $getemp['max_experience'] == '4'){echo("selected");}?>>4Y Experience</option>
                                                <option value="5" <?php if(isset($getemp['max_experience']) && $getemp['max_experience'] == '5'){echo("selected");}?>>5Y Experience</option>
                                                <option value="6" <?php if(isset($getemp['max_experience']) && $getemp['max_experience'] == '6'){echo("selected");}?>>6Y Experience</option>
                                                <option value="7" <?php if(isset($getemp['max_experience']) && $getemp['max_experience'] == '7'){echo("selected");}?>>7Y Experience</option>
                                                <option value="8" <?php if(isset($getemp['max_experience']) && $getemp['max_experience'] == '8'){echo("selected");}?>>8Y Experience</option>
                                                <option value="9" <?php if(isset($getemp['max_experience']) && $getemp['max_experience'] == '9'){echo("selected");}?>>9Y Experience</option>
                                                <option value="10" <?php if(isset($getemp['max_experience']) && $getemp['max_experience'] == '10'){echo("selected");}?>>10Y Experience</option>
                                                <option value="11" <?php if(isset($getemp['max_experience']) && $getemp['max_experience'] == '11'){echo("selected");}?>>10Y+ Experience</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Min Salary<em class="text-danger">*</em> <small>( in Lacs )</small></label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend d-flex">
                                                    <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                                                  </div>
                                                  <input type="text" class="form-control" id="min_salary" maxlength="2"  name="min_salary" placeholder="Min" value="<?php if(!empty($getemp['min_salary'])){echo $getemp['min_salary'];}?>">
                                                </div>
                                                <div class='error_field' id='minsalay_error_msg'></div>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Max Salary<em class="text-danger">*</em> <small>( in Lacs )</small></label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend d-flex">
                                                    <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                                                  </div>
                                                  <input type="text" name="max_salary" id="max_salary" maxlength="2" value="<?php if(!empty($getemp['max_salary'])){echo $getemp['max_salary'];}?>" class="form-control" placeholder="Max">                                             
                                                </div>
                                                <div class='error_field' id='maxsalay_error_msg'></div>
                                            </div>
                                            <div class="form-group col-md-12 select-border mb-3">
                                                <label>Location<em class="text-danger">*</em></label>
                                                <input type="text" class="form-control" name="location[]" id="location" value="<?php if(!empty($getemp['location'])){echo $getemp['location'];}?>">
                                                <div class='error_field' id='location_error_msg'></div>
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Desired Profile</label>
                                                <input type="text" class="form-control" name="desired_profile" value="<?php if(!empty($getemp['desired_profile'])){echo $getemp['desired_profile'];}?>" placeholder="Enter a Title">
                                            </div>
                                            <div class="form-group col-md-4 mb-3">
                                                <label>Industry</label>
                                                <input type="text" class="form-control" value="Health Care" disabled>
                                            </div>
                                                <div class="form-group col-md-4 select-border mb-3">
                                                <label>Job Function<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select" id="jobfunction" name="job_function"  onchange="getval(this);">
                                                    <option value="">Select job function..</option>
                                                    <?php if(!empty($skill)){
                                                    foreach($skill as $skills){
                                                    if(isset($getemp['job_function']) && $getemp['job_function'] == $skills['designation_id']){
                                                    ?>
                                                    <option value="<?php echo $skills['designation_id'];?>" selected><?php echo $skills['designation'];?></option>
                                                    <?php  }else{?>
                                                    <option value="<?php echo $skills['designation_id'];?>"><?php echo $skills['designation'];?></option>
                                                    <?php }}}?>
                                                </select>
                                                <div class='error_field' id='jobfunction_error_msg'></div>    
                                            </div>
                                            <div class="form-group col-md-4 select-border mb-3">
                                                <label>Area of Specialization<em class="text-danger">*</em></label>
                                                <select  id="specialization" name="specialization" class="form-control basic-select">
                                                    <?php if(!empty($getemp['specialization_name']) && !empty($getemp['specialization_name'])){?>
                                                    <option value="<?= $getemp['specialization']; ?>" selected><?= $getemp['specialization_name']; ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 mb-2">
                                                <label>Job Description<em class="text-danger">*</em></label>
                                                <textarea class="form-control" id="job_description" rows="2" name="job_description" required><?php if(!empty($getemp['job_description'])){echo $getemp['job_description']; }?></textarea>
                                                <div class='error_field' id='job_description_error_msg'></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--education-->
                            <div class="box-header">
                                <h4>Education</h4>
                            </div>
                            <div class="box">
                                <div class="box-body">
                                    <div class="bg-white login-register justify-content-center">
                                        <div class="row">
                                            <div class="form-group col-md-6 select-border mb-3">
                                                <label>Graduation<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select" name="graduation">
                                                <?php if(!empty($graducate)){ foreach($graducate['education'] as $key=> $edu){  
                                                     if(isset($getemp['graduation']) && $getemp['graduation']== $key){
                                                            ?>
                                                    <option value="<?php echo $key;?>" selected="selected"><?php echo $edu;?></option>
                                                    <?php }else{?>
                                                    <option value="<?php echo $key; ?>"><?php echo $edu; ?></option>
                                                <?php }}}?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 select-border mb-3">
                                                <label>Post Graduation</label>
                                                <select class="form-control basic-select" name="post_graducation">
                                                <?php if(!empty($graducate)){ foreach($graducate['postgarduate'] as $key=> $edupost){  
                                                    if(isset($getemp['post_graducation']) && $getemp['post_graducation']== $key){
                                                            ?>
                                                    <option value="<?php echo $key;?>" selected="selected"><?php echo $edupost;?></option>
                                                    <?php }else{?>
                                                    <option value="<?php echo $key; ?>"><?php echo $edupost; ?></option>
                                                <?php }}}?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 select-border mb-2">
                                                <label>Super Specialty</label>
                                                <select class="form-control basic-select" name="super_specialty">
                                                <?php if(!empty($graducate)){ foreach($graducate['specialty'] as $key=> $eduspecil){
                                                    if(isset($getemp['super_specialty']) && $getemp['super_specialty']== $key){
                                                        ?>
                                                <option value="<?php echo $key;?>" selected="selected"><?php echo $eduspecil;?></option>
                                                <?php }else{?>  
                                                <option value="<?php echo $key; ?>"><?php echo $eduspecil; ?></option>
                                                <?php }}}?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!--company address-->
                            <div class="box mb-3 mb-lg-0">
                                <div class="box-header">
                                    <h4>Hospital Information</h4>
                                </div>
                                <div class="box-body">
                                    <div class="bg-white login-register justify-content-center">
                                        <div class="row">
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Hospital Name <em class="text-danger">*</em></label>
                                                <input type="text" class="form-control" id="company_name" name= "company_name" value="<?php if(!empty($getemp['company_name'])){echo $getemp['company_name']; } ?>" placeholder="">
                                            <span id="error_company"></span>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Executive Name <em class="text-danger">*</em></label>
                                                <input type="text" class="form-control" id="executive_name" name="executive_name" value="<?php if(!empty($getemp['executive_name'])){echo $getemp['executive_name']; }else if(!empty(session()->get('firstname'))){ echo session()->get('firstname'); }?>">
                                            <span id="error_excutive"></span>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Contact No <em class="text-danger">*</em></label>
                                                <input type="tel" class="form-control" id="mobileid" maxlength="10"   name="contact_name" value="<?php if(!empty($getemp['contact_name'])){echo $getemp['contact_name']; } else if(!empty(session()->get('contactno'))){ echo session()->get('contactno');}?>">
                                               <div class='error_field' id='mobile_error_msg'></div>
                                                
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>E-mail Id <em class="text-danger">*</em></label>
                                                <input type="email" class="form-control" id="emailid" name="email" value="<?php if(!empty($getemp['email'])){echo $getemp['email']; }else if(!empty(session()->get('email_id'))) { echo session()->get('email_id'); }?>">
                                            <span id="error_email"></span>
                                            </div>
                                            <div class="form-group col-md-12 mb-3 mt-2">
                                                <ul class="list-unstyled d-flex align-items-center justify-content-center mb-0">
                                                    <li class="text-right me-2 me-sm-4"><a class="btn btn-secondary main-btn"  data-bs-toggle="modal" data-bs-target="#jobPreviewModal" id="previewdata">Preview</a></li>
                                                    <li class="text-center me-2 me-sm-4"><a class="btn btn-primary main-btn" id="submitdata" href="#">Submit</a></li>
                                                    <li class="text-left"><a class="btn btn-secondary main-btn" id="templatedata"  href="#">Save Template</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    <div class="col-lg-4" style="position: relative;">
                    <form action="" method="get">
                        <div class="get-template-field bg-white box-shadow mb-3">
                            <div class="form-group col-md-12 select-border mb-3">
                                <label>Get Template<em class="text-danger">*</em></label>
                                <select class="form-control basic-select" name="template">
                                  <option value="value 01" selected="selected">Select Template</option>
                                  <?php if(!empty($getform)){ foreach($getform as $val){ ?>
                                <option value="<?php echo $val['id'];?>"><?php echo $val['job_title'].'&nbsp'.'('.$val['created_at'].')';?></option>
                                <?php }}?>
                                </select>
                            </div>
                            <div class="col-md-12 mb-2 mt-2">
                                <ul class="list-unstyled d-flex align-items-center justify-content-center recruiter-btn mb-0">
                                    <li class="me-2">
                                      <input type="submit" value="Get" class="btn btn-secondary main-btn">      
                                  </li>
                                  <li class="me-2">
                                  <input type="submit" value="Edit" class="btn btn-secondary main-btn">  
                                  </li>
                                  </form>
                                  <?php if(!empty($val['id'])){?>
                                    <li class=" me-lg-0"><a class="btn btn-secondary main-btn" href="<?php echo base_url('delete/'.$val['id']);?>">Delete</a></li>
                                    <?php }else{?>
                                        <li class=" me-lg-0"><a class="btn btn-secondary main-btn" href="">Delete</a></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
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
        </div>
  </div>
</section>
<!--=================================
Register -->


<!--=================================
Footer-->
<?= $this->include('recruiter-footer') ?>
<!--=================================
Footer-->


<!--=================================
Job Preview Modal Popup -->

<div class="modal fade" id="jobPreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header p-4">
            <div class="preview-heading">
                <h4 class="mb-0 text-center">This is a preview of what people may see</h4>
                <p class="mb-0">Your job post may look slightly different when it goes live.</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row align-items-center preview-title">
                <div class="col-lg-8 preview-job-title">
                    <h3><span id= title_job></span></h3>
                    <ul class="list-unstyled details-ul">
                    <li class="me-2"><span id="executive"></span> <span>|</span></li>
                        <li class="me-2">Location: <span id="location2"></span></li>
                        
                    </ul>
                    <ul class="list-unstyled details-ul">
                        <li class="me-2">Experience: <span id="minexperience"></span> to <span id="maxexperience"><span>|</span></li>
                        <li class="me-2">Salary : <i class="fas fa-rupee-sign pe-1"></i> 
                        <span id="minsalary"></span> to <i class="fas fa-rupee-sign pe-1"></i> 
                        <span id="maxsalary"></span> Lacs</li>
                    </ul>
                </div>
                <div class="col-lg-4 main-btn">
                    <a href="#" class="btn-primary-dark">Apply Now</a>
                </div>
            </div>

            <div class="row">
              <div class="col-lg-12 p-0">
                <div id="preview-details">
                    <table class="table mb-0" width="100%" border="0" align="center" >
                        <tbody>
                             <tr>
                                <td width="214" height="33" >Job Title</td>
                                <td width="21" >:</td>
                                <td width="651" id="jobtitle"></td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Experience</td>
                                <td width="21" >:</td>
                                <td width="651" id="max_experience"></td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Location</td>
                                <td width="21" >:</td>
                                <td width="651" id="locations"></td>
                            </tr>
                             <tr>
                                <td width="214" height="33" >Salary</td>
                                <td width="21" >:</td>
                                <td width="651" id="salary">1 to 2 Lacs</td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Job Description</td>
                                <td width="21" >:</td>
                                <td width="651" id="jobdescription"></td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Graduation</td>
                                <td width="21" >:</td>
                                <td width="651" id="graduation"></td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Post Graduation</td>
                                <td width="21" >:</td>
                                <td width="651" id="postgraducation"></td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Super Specialty</td>
                                <td width="21" >:</td>
                                <td width="651" id="super_specialty"></td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Hospital Name</td>
                                <td width="21" >:</td>
                                <td width="651" id="companyname"></td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Executive Name</td>
                                <td width="21" >:</td>
                                <td width="651" id="executivename"></td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Contact No</td>
                                <td width="21" >:</td>
                                <td width="651" id="contactname"></td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >E-mail Id</td>
                                <td width="21" >:</td>
                                <td width="651" id="email"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>

<!--=================================
Browse by category Modal Popup -->
<div class="modal  modal-right popup-modal show" id="deletepopup" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
  <div class="modal-body ">
        <div class="delete-btn">
            <h2>Success!! You job has been posted.</h2>
        </div>
  </div>
</div>
</div>
</div>

















<!--=================================
Javascript -->
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- jQuery UI -->
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multiselect-widget/3.0.1/jquery.multiselect.filter.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multiselect-widget/3.0.1/jquery.multiselect.min.js"></script>

<!-- preview data -->
<script>
 $(document).ready(function () {
 $('#previewdata').on('click', function (e){  
e.preventDefault();
 var data2 = $("#myform").serialize();
  var url= '<?php echo base_url('RecruiterHome/previewdata');?>';
  $.ajax({
                    type: "post",
                    url:  url,
                    data:data2,
                    dataType:'json',
                    success:function(data){
                        // Check Session save                    
                      console.log(data);
                      var html="";  
                       $('#job_title').html(data['checkpost']['job_title']);
                        $('#title_job').html(data['checkpost']['job_title']);
                       $('#jobtitle').html(data['checkpost']['job_title']);
                       $('#max_experience').html(data['checkpost']['max_experience']);
                       $('#locations').html(data['checkpost']['location']);
                       $('#salary').html(data['checkpost']['max_salary']);
                       $('#job_description').html(data['checkpost']['job_description']);
                        $('#jobdescription').html(data['checkpost']['job_description']);
                       $('#graduation').html(data['checkpost']['edu_name']);
                       $('#postgraducation').html(data['checkpost']['posteducation_name']); 
                       $('#super_specialty').html(data['checkpost']['specialty_name']);
                       $('#companyname').html(data['checkpost']['company_name']);
                       $('#executivename').html(data['checkpost']['executive_name']);
                       $('#contactname').html(data['checkpost']['contact_name']);
                       $('#email').html(data['checkpost']['email']);
                       $('#maxexperience').html(data['checkpost']['max_experience']);
                       $('#location2').html(data['checkpost']['location']);
                       $('#executive').html(data['checkpost']['executive_name']);
                       $('#minexperience').html(data['checkpost']['min_experience']);
                       $('#minsalary').html(data['checkpost']['min_salary']);
                       $('#maxsalary').html(data['checkpost']['max_salary']);                    
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                });        
 });     
 });
</script>
<!--//template-->
<script>
 $(document).ready(function () {
 $('#templatedata').on('click', function (e){  
e.preventDefault();
    var job_title = $('#job_title').val();
    var key_skills = $('#key_skills').val();
    var min_salary = $('#min_salary').val();
    var max_salary = $('#max_salary').val();
    var location = $('#location').val();
    var company = $('#company_name').val();
    var excutive = $('#executive_name').val();
    var contact = $('#mobileid').val();
    var emailid = $('#emailid').val();
    
    //company
    if (company == '') {
    $('#error_company').html("Hospital name cannot be empty");
    $('#error_company').parent().show();
    $("#error_company").css("color", "red");
    return false;
    }else{
        $("#error_company").html("");
    }
    //excutive
    if (excutive == '') {
    $('#error_excutive').html("Excutive name cannot be empty");
    $('#error_excutive').parent().show();
    $("#error_excutive").css("color", "red");
    return false;
    }else{
        $("#error_excutive").html("");
    }
    //contact
    if (contact == '') {
    $('#mobile_error_msg').html("Contact number cannot be empty");
    $('#mobile_error_msg').parent().show();
    $("#mobile_error_msg").css("color", "red");
    return false;
    }else{
        $("#mobile_error_msg").html("");
    }
    //emailid
    if (emailid == '') {
    $('#error_email').html("Email id cannot be empty");
    $('#error_email').parent().show();
    $("#error_email").css("color", "red");
    return false;
    }else{
        $("#error_email").html("");
    }
    
    
    
     if (job_title == '') {
    $('#name_error_msg').html("Job Title cannot be empty");
    $('#name_error_msg').parent().show();
    $("#name_error_msg").css("color", "red");
    return false;
    }else{
        $("#name_error_msg").html("");
    }
    var job_description = $('#job_description').val();
    if (job_description == '') {
    $('#job_description_error_msg').html("Job description cannot be empty");
    $('#job_description_error_msg').parent().show();
    $("#job_description_error_msg").css("color", "red");
    return false;
    }else{
        $("#job_description_error_msg").html("");
    }
    //skill
    if (key_skills == '') {
    $('#key_skill_error_msg').html("'You should select a skills");
    $('#key_skill_error_msg').parent().show();
    $('#key_skill_error_msg').css("color", "red");
    return false;
    }else{
        $("#key_skill_error_msg").html("");
    }
    if (min_salary == '') {
    $('#minsalay_error_msg').html("Minimum salary cannot be empty");
    $('#minsalay_error_msg').parent().show();
    $('#minsalay_error_msg').css("color", "red");
    return false;
    }else{
        $("#minsalay_error_msg").html("");    
    }
    if (max_salary == '') {
    $('#maxsalay_error_msg').html("Job Title cannot be empty");
    $('#maxsalay_error_msg').parent().show();
    $('#maxsalay_error_msg').css("color", "red");
    return false;
    }else{
        $("#maxsalay_error_msg").html("");
    }
    if (location == '') {
    $('#location_error_msg').html("Job Title cannot be empty");
    $('#location_error_msg').parent().show();
    $('#location_error_msg').css("color", "red");
    return false;
    }else{
        $("#location_error_msg").html("");
    }
    
var data2 = $("#myform").serialize();
  var url= '<?php echo base_url('RecruiterHome/tempdata');?>';
  $.ajax({
                    type: "post",
                    url:  url,
                    data:data2,
                    dataType:'json',
                    success:function(res){
                     console.log(res);
                     $("#deletepopup").modal('show');
                     window.setTimeout(function(){ 
                    window.location.href = '<?php echo base_url('jobposting');?>';
                     }, 2000);
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }

                });         
 });     
 });
 function refreshPage() {
    location.reload(true);
}
</script>
<!-- //submit post data -->
<script>
 $(document).ready(function () {
 $('#submitdata').on('click', function (e){  
e.preventDefault();
    var mobile= $('#mobileid').val();
    var validateMobNum= /^\d*(?:\.\d{1,2})?$/;
    var job_title = $('#job_title').val();
    var key_skills = $('#key_skills').val();
    var min_salary = $('#min_salary').val();
    var max_salary = $('#max_salary').val();
    var location = $('#location').val();
    var job_description = $('#job_description').val();
    var company = $('#company_name').val();
    var excutive = $('#executive_name').val();
    var contact = $('#mobileid').val();
    var emailid = $('#emailid').val();
    
    //company
    if (company == '') {
    $('#error_company').html("Hospital name cannot be empty");
    $('#error_company').parent().show();
    $("#error_company").css("color", "red");
    return false;
    }else{
        $("#error_company").html("");
    }
    //excutive
    if (excutive == '') {
    $('#error_excutive').html("Excutive name cannot be empty");
    $('#error_excutive').parent().show();
    $("#error_excutive").css("color", "red");
    return false;
    }else{
        $("#error_excutive").html("");
    }
    //contact
    if (contact == '') {
    $('#mobile_error_msg').html("Contact number cannot be empty");
    $('#mobile_error_msg').parent().show();
    $("#mobile_error_msg").css("color", "red");
    return false;
    }else{
        $("#mobile_error_msg").html("");
    }
    //emailid
    if (emailid == '') {
    $('#error_email').html("Email id cannot be empty");
    $('#error_email').parent().show();
    $("#error_email").css("color", "red");
    return false;
    }else{
        $("#error_email").html("");
    }
    
    
    if (job_title == '') {
    $('#name_error_msg').html("Job Title cannot be empty");
    $('#name_error_msg').parent().show();
    $("#name_error_msg").css("color", "red");
    return false;
    }else{
        $("#name_error_msg").html("");
    }
    //skill
    if (key_skills == '') {
    $('#key_skill_error_msg').html("'You should select a skills");
    $('#key_skill_error_msg').parent().show();
    $('#key_skill_error_msg').css("color", "red");
    return false;
    }else{
        $("#key_skill_error_msg").html("");
    }
    if (min_salary == '') {
    $('#minsalay_error_msg').html("Minimum salary cannot be empty");
    $('#minsalay_error_msg').parent().show();
    $('#minsalay_error_msg').css("color", "red");
    return false;
    }else{
        $("#minsalay_error_msg").html("");      
    }
    if (max_salary == '') {
    $('#maxsalay_error_msg').html("Job Title cannot be empty");
    $('#maxsalay_error_msg').parent().show();
    $('#maxsalay_error_msg').css("color", "red");
    return false;
    }else{
        $("#maxsalay_error_msg").html("");
    }
    if (location == '') {
    $('#location_error_msg').html("Location cannot be empty");
    $('#location_error_msg').parent().show();
    $('#location_error_msg').css("color", "red");
    return false;
    }else{
        $("#location_error_msg").html("");
    }
    if (job_description == '') {
    $('#job_description_error_msg').html("Job description cannot be empty");
    $('#job_description_error_msg').parent().show();
    $('#job_description_error_msg').css("color", "red");
    return false;
    }else{
        $("#job_description_error_msg").html("");
    }
 var data2 = $("#myform").serialize();
  var url= '<?php echo base_url('RecruiterHome/postdata');?>';
  $.ajax({
                    type: "post",
                    url:  url,
                    data:data2,
                    dataType:'json',
                    success:function(res){
                     console.log(res);
                     $("#deletepopup").modal('show');
                     window.setTimeout(function(){ 
                    window.location.href = '<?php echo base_url('jobposting');?>';
                     }, 2000);
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }

                });         
 });     
 });
 function refreshPage() {
    location.reload(true);
}
</script>
<!-- //get Area of Specialization -->
<script>
  function getval(sel){  
      var skill= sel.value;
      var skill_names= '<?php if(!empty($getemp['specialization_name'])){ echo $getemp['specialization_name'];}?>';
       var skill_id= '<?php if(!empty($getemp['specialization'])){ echo $getemp['specialization'];}?>';
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
    <!-- //get designation -->
<script>
        $(document).ready(function(){
        function split( val ) {
      return val.split( /,\s*/ );
      }
      function extractLast( term ) {
      return split( term ).pop();
      }
      $('#key_skills').autocomplete({
              source: function (request, response){
                $.getJSON('<?php echo base_url('RecruiterHome/getdesignation');?>',{ term: extractLast(request.term)
              }, response);
            },
            focus: function() {
                 return false;
             },
            select: function( event, ui ) {
                var terms = split( this.value );
                terms.pop();
                terms.push( ui.item.value );
                terms.push( "" );
                this.value = terms.join( ", " );
                return false;
            }          
          });
    });
    </script>
<script>
$(function(){
// Single Select
 function split( val ) {
      return val.split( /,\s*/ );
      }
    function extractLast( term ) {
    return split( term ).pop();
    }


var url= '<?php echo base_url('AjexCallback/getlocation');?>';  
$( "#location" ).autocomplete({
 source: function( request, response ) {
  // Fetch data
  $.ajax({
   url: url,
   type: 'post',
   dataType: "json",
   data: {
    search: extractLast(request.term)
   },
   success: function( data ) {
    response( data );
   }
  });
 },
 select: function (event, ui) {
    // Set selection
   // $('#location').val(ui.item.label); // display the selected text
    // $('#selectuser_id').val(ui.item.value); // save selected id to input
     var terms = split( this.value );
                terms.pop();
                terms.push( ui.item.value );
                terms.push( "" );
                this.value = terms.join( ", " );
                return false;
 },
 focus: function(event, ui){
    
    //$( "#location" ).val( ui.item.label );
    // $( "#selectuser_id" ).val( ui.item.value );
    return false;
  },
});
});
</script>



