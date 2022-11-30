<?= $this->include('recruiter-header') ?>
<!--=================================
Header -->

<!--=================================
manage jobs -->
<section class="space-ptb-outer bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box mb-0 manage-table">
            <div class="row mb-2 align-items-center user-table-heading table-desktop">
                <div class="col-3 d-flex align-items-center">
                  <div class="form-check theme-col select-all-bg mt-2">
                    <input class="form-check-input" type="checkbox" value="1" id="checkall">
                <label class="form-check-label" for="flexCheckDefault">Select All</label>
                  </div>
                </div>
                <div class="col-6 d-flex align-items-center justify-content-center">
                  <div class="section-title mb-0 mt-1">
                    <h4 class="main-site-title sub-title-bg"><span>Manage Jobs</span></h4>
                  </div>
                </div>
                <div class="col-3 mt-2">
                  <div class="delete">
                    <input type="submit"  id="delete" value="Delete" class="btn btn-primary del-all">
                  </div>
                </div>
            </div>
          <div class="row mb-2 align-items-center user-table-heading table-tab">
            <div class="row mx-auto">
              <div class="col-6 d-flex align-items-center">
                <div class="form-check theme-col select-all-bg mt-2">
                  <input class="form-check-input" type="checkbox" value="1" id="checkall">
                <label class="form-check-label" for="flexCheckDefault">Select All</label>
                </div>
              </div>
              <div class="col-6 mt-2">
                <div class="delete">
                  <input type="submit" id="delete" value="Delete" class="btn btn-primary del-all">
                </div>
              </div>
            </div>
            <div class="row mx-auto">
              <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="section-title mb-0 mt-2 mt-sm-0">
                  <h4 class="main-site-title sub-title-bg"><span>Manage Jobs</span></h4>
                </div>
              </div>
            </div>
          </div>
        <div class="user-dashboard-table table-responsive">
            <table class="table table-bordered" id="checktables">
              <thead class="bg-light">
                <tr>
                  <th scope="col">Select</th>
                  <th scope="col">Sr. No</th>
                  <th scope="col"><i class="fas flaticon-job-1 me-2"></i>Job Category</th>
                  <th scope="col"><i class="fas fa-briefcase me-2"></i>Experience</th>
                  <th scope="col"><i class="fas fa-rupee-sign me-1"></i>Salary</th>
                  <th scope="col"><i class="fas fa-map-marker-alt me-2"></i>Location</th>
                  <th scope="col"><i class="far fa-calendar-alt me-2"></i>Date Posted</th>
                  <th scope="col"><i class="fas fa-hand-point-up me-2"></i>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i= 1; 
                if(!empty($jobposting)){ foreach($jobposting as $job){ ?>
                  <tr>
                      <td>
                          <div class="form-check">
                              <input class="form-check-input checkbox" type="checkbox" value="<?php if(!empty($job['id'])){ echo $job['id']; }?>" id="checkboxid">
                        </div>
                      </td>
                      <td><?php echo $i;?></td>
                      <td><?php if(!empty($job['job_title'])){ echo $job['job_title']; }?></td>
                      <td><?php if(!empty($job['max_experience'])){ echo $job['maxexp']; }?></td>
                      <td><?php if(!empty($job['max_salary'])){ echo $job['max_salary']; }?></td>
                      <td><?php if(!empty($job['location'])){ echo $job['location']; }?></td>
                      <td><?php if(!empty($job['created_at'])){ echo $job['created_at']; }?></td>
                      <td>
                        <ul class="list-unstyled mb-0 d-flex">
                          <li><a class="text-primary" onclick="myfunction(<?php echo $job['id'];?>)"><i class="far fa-eye"></i></a></li>
                          <li><a class="text-info" onclick="myEditfunction(<?php echo $job['id'];?>)"><i class="fas fa-pencil-alt"></i></a></li>
                          <li><a class="text-danger" onclick="mydelfunction(<?php echo $job['id'];?>)"><i class="far fa-trash-alt"></i></a></li>
                        </ul>
                      </td>
                  </tr>
                  <?php $i++; }} ?>
              </tbody>
            </table>
            </div>
            <div class="row justify-content-center">
            <div class="col-12 text-center">
              <ul class="pagination mt-3">
                <?php echo $pager->links();?>
                  
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
manage jobs -->

<?= $this->include('recruiter-footer') ?>
<!--=================================
Footer-->

<!--=================================
Footer-->

<!--=================================
View Equipment Details Modal Popup -->
<div class="modal  modal-right popup-modal show" id="ViewJobForm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content recruiter-job-posting">
      <div class="modal-title">
          <ul class="list-unstyled">
              <li>
                <h2>View Details</h2>
              </li>
              <li>
                 <button type="button" class="btn-close popup-btn" data-bs-dismiss="modal" aria-label="Close"></button>
              </li>
          </ul>
      </div>
      <div class="modal-body">
        <form class="postjob-form mx-3">
            <div class="box">
                <div class="row box-header">
                    <h4>General Information</h4>
                </div>
                <div class="box-body">
                    <div class="row bg-white login-register justify-content-center">
                        <div class="form-group col-md-12 mb-3">
                            <label>Job Title<em class="text-danger">*</em></label>
                            <input type="text" id="jobtitle"  class="form-control"  placeholder="Enter a Title" disabled>
                          </div>
                        <div class="form-group col-md-12 select-border mb-3">
                            <label>Key Skills<em class="text-danger">*</em></label>
                            <input type="text" id="keyskill"  class="form-control"  placeholder="Enter a Skill" disabled>
                        </div>
                        <div class="form-group col-md-6 select-border mb-3">
                            <label>Min Experience<em class="text-danger">*</em></label>
                            <input type="text" id="min_experience"  class="form-control"  disabled>
                        </div>
                        <div class="form-group col-md-6 select-border mb-3">
                            <label>Max Experience<em class="text-danger">*</em></label>
                            <input type="text" id="max_experience"  class="form-control"  disabled>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Min Salary<em class="text-danger">*</em> <small>( in Lacs )</small></label>
                            <div class="input-group">
                              <div class="input-group-prepend d-flex">
                                <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                              </div>
                              <input type="text" class="form-control" placeholder="Min" id="min_salary" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Max Salary<em class="text-danger">*</em> <small>( in Lacs )</small></label>
                            <div class="input-group">
                              <div class="input-group-prepend d-flex">
                                <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                              </div>
                              <input type="text" class="form-control" placeholder="Max" id="max_salary" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-12 select-border mb-3">
                            <label>Location<em class="text-danger">*</em></label>
                            <input type="text" class="form-control" placeholder="Max" id="location" disabled>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label>Desired Profile</label>
                            <input type="text" class="form-control" value="" id="desired_profile" placeholder="Enter a Title" disabled>
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label>Industry</label>
                            <input type="text" class="form-control" id="industry"  disabled>
                        </div>
                        <div class="form-group col-md-6 select-border mb-3">
                            <label>Job Function<em class="text-danger">*</em></label>
                            <input type="text" class="form-control" id="jobfunction"  disabled>
                        </div>
                        <div class="form-group col-md-6 select-border mb-3">
                            <label>Area of Specialization<em class="text-danger">*</em></label>
                            <input type="text" class="form-control" id="specialization"  disabled>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label>Job Description<em class="text-danger">*</em></label>
                            <textarea class="form-control" rows="2" id="job_description" disabled></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!--education-->
            <div class="box">
                <div class="row box-header">
                    <h4>Education</h4>
                </div>
                <div class="box-body">
                    <div class="row bg-white login-register justify-content-center">
                        <div class="form-group col-md-6 select-border mb-3">
                    <label>Graduation</label>
                    <input type="text" class="form-control" id="graduation" value="" disabled>
                    </select>
                </div>
                        <div class="form-group col-md-6 select-border mb-3">
                    <label>Post Graduation</label>
                    <input type="text" class="form-control" id="postgraduation" value="" disabled>
                </div>
                        <div class="form-group col-md-12 select-border">
                    <label>Super Specialty</label>
                    <input type="text" class="form-control" id="specialty" value="" disabled>
                </div>
                    </div>
                </div>
                
            </div>
            <!--company address-->
            <div class="box mb-4">
                <div class="row box-header">
                    <h4>Company Information</h4>
                </div>
                <div class="box-body">
                    <div class="row bg-white login-register justify-content-center">
                        <div class="form-group col-md-6 mb-3">
                    <label>Company Name</label>
                    <input type="text" class="form-control" id="company_name"  placeholder="" disabled>
                </div>
                        <div class="form-group col-md-6 mb-3">
                    <label>Executive Name</label>
                    <input type="text" class="form-control" id="excutive_name" disabled>
                </div>
                        <div class="form-group col-md-6 mb-1">
                    <label>Contact No</label>
                    <input type="tel" class="form-control" id="contact_name" disabled>
                </div>
                        <div class="form-group col-md-6 mb-1">
                    <label>E-mail Id</label>
                    <input type="email" class="form-control" id="email_id" disabled>
                </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--=================================
Edit Equipment Details Modal Popup -->
<div class="modal  modal-right popup-modal show" id="EditJobForm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content recruiter-job-posting">
      <div class="modal-title">
          <ul class="list-unstyled">
              <li>
                <h2>Edit Details</h2>
              </li>
              <li>
                 <button type="button" class="btn-close popup-btn" data-bs-dismiss="modal" aria-label="Close"></button>
              </li>
          </ul>
      </div>
          <?php if(!empty(session()->getFlashdata("success"))): ?>
          <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata("success") ?>
          </div>
          <?php endif; ?>
      <div class="modal-body">
        <form class="" method="post" id="MyForm">
          <!--general info-->
          <div class="box">
              <div class="row box-header mx-2">
                  <h4>General Information</h4>
              </div>
              <div class="box-body edit">
                  <div class="row justify-content-center">
                    <input type="hidden" name="id" id="updateid">
                      <div class="form-group col-md-12 mb-3">
                          <label>Job Title<em class="text-danger">*</em></label>
                          <input type="text" id="job_title" class="form-control" placeholder="Enter a Title">
                      </div>
                      <div class="form-group col-md-12 select-border mb-3">
                          <label>Key Skills<em class="text-danger">*</em></label>
                          <input type="text" id="key_skills"  class="form-control"  placeholder="Enter a Skill" >
                      </div>
                      <div class="form-group col-md-6 select-border mb-3">
                          <label>Min Experience<em class="text-danger">*</em></label>
                          <select class="form-control basic-select" name="min_experience" id="minexperience">
                            
                          </select>
                      </div>
                      <div class="form-group col-md-6 select-border mb-3">
                          <label>Max Experience<em class="text-danger">*</em></label>
                          <select class="form-control basic-select" name="max_experience" id="maxexperience">
                          </select>
                      </div>
                      <div class="form-group col-md-6 mb-3">
                          <label>Min Salary<em class="text-danger">*</em> <small>( in Lacs )</small></label>
                          <div class="input-group">
                            <div class="input-group-prepend d-flex">
                              <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                            </div>
                            <input type="text" class="form-control" name="min_salary" placeholder="Min"  id="minsalary">
                          </div>
                      </div>
                      <div class="form-group col-md-6 mb-3">
                          <label>Max Salary<em class="text-danger">*</em> <small>( in Lacs )</small></label>
                          <div class="input-group">
                            <div class="input-group-prepend d-flex">
                              <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                            </div>
                            <input type="text" class="form-control" placeholder="Max"  name="maxsalary" id="maxsalary">
                          </div>
                      </div>
                      <div class="form-group col-md-12 select-border mb-3">
                          <label>Location<em class="text-danger">*</em></label>
                          <input type="text" class="form-control" name="locationval" id="locationval" value="">
                      </div>
                      <div class="form-group col-md-12 mb-3">
                          <label>Desired Profile</label>
                          <input type="text" class="form-control" name="desiredprofile" id="desiredprofile"  value="" placeholder="Enter a Title">
                      </div>

                      <div class="form-group col-md-4 mb-3">
                          <label>Industry</label>
                          <input type="text" class="form-control" value="Health Care" disabled>
                      </div>
                      <div class="form-group col-md-4 select-border mb-3">
                          <label>Job Function<em class="text-danger">*</em></label>
                          <select class="form-control basic-select" name="job_function" value="" id="job_function">
                            
                          </select>
                      </div>
                      <div class="form-group col-md-4 select-border mb-3">
                          <label>Area of Specialization<em class="text-danger">*</em></label>
                          <select class="form-control basic-select" id="specializationdata" name="specialization">
                          </select>
                      </div>
                      
                      <div class="form-group col-md-12">
                          <!--<label>Job Description</label>-->
                          <!--<input type="text" class="form-control" value="" placeholder="">-->
                      
                          <label>Job Description<em class="text-danger">*</em> <small>( Max 2000 characters )</small></label>
                          <textarea class="form-control" rows="3" maxlength="2000" id="jobdesc" name="job_description"></textarea>
                      </div>
                  </div>
              </div>
          </div>
          <!--education-->
          <div class="box">
              <div class="row box-header mx-2">
                  <h4>Educational Qualification</h4>
              </div>
              <div class="box-body edit">
                  <div class="row justify-content-center">
                      <div class="form-group col-md-6 select-border mb-3">
                  <label>Graduation</label>
                  <select class="form-control basic-select" name="graduation" id="graduationdata">           
                    </select>
              </div>
                      <div class="form-group col-md-6 select-border mb-3">
                  <label>Post Graduation</label>
                  <select class="form-control basic-select" name="postgraduation" id="postgraduated">  
                </select>
              </div>
                  <div class="form-group col-md-12 select-border">
                  <label>Super Specialty</label>
                  <select class="form-control basic-select" name="super_specialty" id="superspecialty"> 
                </select>
              </div>
                  </div>
              </div>
              
          </div>
          <!--company address-->
          <div class="box">
              <div class="row box-header mx-2">
                  <h4>Company Information</h4>
              </div>
              <div class="box-body edit">
                  <div class="row justify-content-center">
                      <div class="form-group col-md-6 mb-3">
                  <label>Company Name</label>
                  <input type="text" class="form-control" value="" name="company_name" id="companyname" placeholder="">
              </div>
                      <div class="form-group col-md-6 mb-3">
                  <label>Executive Name</label>
                  <input type="text" class="form-control" name="excutive_name" id="excutivename" value="">
              </div>
                      <div class="form-group col-md-6 mb-3">
                  <label>Contact No</label>
                  <input type="tel" class="form-control" name="contactNo" value="" id="contactNo">
              </div>
                <div class="form-group col-md-6 mb-3">
                      <label>E-mail Id</label>
                      <input type="email" class="form-control"  name="email_id" value="" id="emaildId">
                </div>
                <div class="form-group col-md-12 mb-1">
                    <ul class="list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="text-center me-4">
                          <input class="btn btn-primary main-btn" onclick=myfunctionupdate(this.value); type="button" value="Submit">
                      </li>
                      <li class="text-left">
                        <input class="btn btn-secondary main-btn" type="button" id="btnclosed" value="Cancel">
                      </li>
                  </ul>
                </div>
                  </div>
              </div>
          </div>
          
      </form>
      </div>
    </div>
  </div>
</div>
<!--=================================
Edit Equipment Details Modal Popup -->

<!--=================================
Delete Modal Popup -->
<div class="modal  modal-right popup-modal show" id="deletepopup" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!--<div class="modal-header">-->
      <!--      <button type="button" class="btn-close" ></button>-->
      <!--</div>-->
      <div class="modal-body ">
            <!--<div class="alert alert-danger d-flex align-items-center" role="alert">-->
            <!--  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="<?php echo base_url();?>/assets/#exclamation-triangle-fill"/></svg>-->
            <!--  <div>-->
            <!--    An example danger alert with an icon-->
            <!--  </div>-->
            <!--</div>-->
            <div class="delete-btn">
                <h2>Really want to Delete ?</h2>
                <input type="hidden" id="delid" name="id" value="">
                <ul class="list-unstyled">
                     <li><input class="btn btn-secondary" onclick="mydeletfunction()" type="button" value="Delete"></li>
                     <li><input class="btn btn-primary-dark" type="button" value="Cancel" data-bs-dismiss="modal" aria-label="Close"></li>
                </ul>
            </div>
      </div>
    </div>
  </div>
</div>
<!--=================================
Delete Modal Popup Modal Popup -->
<!-- // view page -->

<!-- jQuery UI -->
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multiselect-widget/3.0.1/jquery.multiselect.filter.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multiselect-widget/3.0.1/jquery.multiselect.min.js"></script>
<!-- // view page -->
<script>
  function myfunction(id){
    var url= '<?php echo base_url('ManagePosting/Getjobposting');?>';
    $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                        // Check Session save                    
                      console.log(data);
                      var val="";  
                       $('#jobtitle').val(data['job_title']);
                       $('#keyskill').val(data['key_skills']);
                       $('#min_experience').val(data['minexperience']);
                       $('#max_experience').val(data['maxexperience']);
                       $('#location').val(data['location']);
                       $('#max_salary').val(data['max_salary']);
                       $('#min_salary').val(data['min_salary']);
                       $('#job_description').val(data['job_description']);
                       $('#graduation').val(data['edu_name']);
                       $('#postgraduation').val(data['posteducation_name']); 
                       $('#specialty').val(data['specialty_name']);
                       $('#company_name').val(data['company_name']);
                       $('#excutive_name').val(data['executive_name']);
                       $('#contact_name').val(data['contact_name']);
                       $('#email_id').val(data['email']);
                       $('#desired_profile').val(data['desired_profile']);
                       $('#jobfunction').val(data['skills_name']);
                       $('#specialization').val(data['specialization_name']);
                      $("#ViewJobForm").modal('show');                   
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                }); 
  }
</script>
<!-- //edit function -->
<script>
  function myEditfunction(id){
    var url= '<?php echo base_url('ManagePosting/Getjobposting');?>';
    $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                        // Check Session save                    
                      var html=""; 
                      $('#updateid').val(data['id']);
                      $('#delid').val(data['id']); 
                       $('#job_title').val(data['job_title']);
                       $('#key_skills').val(data['key_skills']);
                       $('#locationval').val(data['location']);
                       $('#maxsalary').val(data['max_salary']);
                       $('#minsalary').val(data['min_salary']);
                       $('#jobdesc').val(data['job_description']);
                       $('#companyname').val(data['company_name']);
                       $('#excutivename').val(data['executive_name']);
                       $('#contactNo').val(data['contact_name']);
                       $('#emaildId').val(data['email']);
                       $('#desiredprofile').val(data['desired_profile']);
                      // $('#job_function').val(data['skills_name']).prop('selected','selected');
                      // $('#specializationdata').val(data['specialization_name']);
                       //max exp
                       var options = '';
                       options += '<option value="'+ data['max_experience'] +'">'+ data['maxexperience'] +'</option>';
                       options += '<option value="1">1 Year</option>';
                       options += '<option value="2">2 Year</option>';
                       options +=  '<option value="3">3 Years</option>';
                       options +=  '<option value="4">4 Years</option>';
                       options += '<option value="5">5 Year</option>';
                       options +=  '<option value="6">6 Years</option>';
                       options +=  '<option value="7">7 Years</option>';
                       options += '<option value="8">8 Year</option>';
                       options +=  '<option value="9">9 Years</option>';
                       options +=  '<option value="10">10 Years</option>';
                       options +=  '<option value="11">10+ Years</option>';
                       $('#maxexperience').html(options);
                       // min exp
                       var minoptions = '';
                       minoptions += '<option value="'+ data['min_experience'] +'">'+ data['minexperience'] +'</option>';
                       minoptions += '<option value="0">Fresher</option>';
                       minoptions += '<option value="1">1 Years</option>';
                       minoptions +=  '<option value="2">2 Years</option>';
                       minoptions +=  '<option value="3">3 Years</option>';
                       minoptions +=  '<option value="4">4 Years</option>';
                       minoptions += '<option value="5">5 Years</option>';
                       minoptions += '<option value="6">6 Years</option>';
                       minoptions +=  '<option value="7">7 Years</option>';
                       minoptions +=  '<option value="8">8 Years</option>';
                       minoptions +=  '<option value="9">9 Years</option>';
                        minoptions +=  '<option value="10">10 Years</option>';
                       minoptions +=  '<option value="11">10+ Years</option>';
                       $('#minexperience').html(minoptions);
                      //education
                       var edu='';
                       edu += '<option value="'+ data['graduation'] +'">'+ data['edu_name'] +'</option>';
                       $.each(data['edu']['education'], function(key, val) {
                        edu += '<option value="'+ key +'">'+ val +'</option>'; 
                          });
                        $('#graduationdata').html(edu); 
                       // post education
                       var postedu='';
                       postedu += '<option value="'+ data['post_graducation'] +'">'+ data['posteducation_name'] +'</option>';
                       $.each(data['edu']['postgarduate'], function(key, val) {
                        postedu += '<option value="'+ key +'">'+ val +'</option>'; 
                          });        
                       $('#postgraduated').html(postedu);
                         // special data
                         var spacial='';
                         spacial += '<option value="'+ data['specialization'] +'">'+ data['specialty_name'] +'</option>';
                          $.each(data['edu']['specialty'], function(key, val) {
                         spacial += '<option value="'+ key +'">'+ val +'</option>'; 
                          });        
                          $('#superspecialty').html(spacial);
                          //designation data
                          var skills='';
                          skills += '<option value="'+ data['job_function'] +'">'+ data['skills_name'] +'</option>';
                          $.each(data['designation'], function(keys, vals) {
                         skills += '<option value="'+ vals['designation_id'] +'">'+ vals['designation'] +'</option>'; 
                          });        
                          $('#job_function').html(skills);
                          // skills data
                          var designation='';
                          designation += '<option value="'+ data['specialization'] +'">'+ data['specialization_name'] +'</option>';
                          $.each(data['skills'], function(keys, vals) {
                          designation += '<option value="'+ keys +'">'+ vals['skills'] +'</option>'; 
                          });        
                          $('#specializationdata').html(designation);        
                          $("#EditJobForm").modal('show');                
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                }); 
  }
</script>
<!-- get specializationdata data -->
<script>
  $(document).ready(function () {
    $("#job_function").on('change', function () {  
        var skill= this.value;
      var url= '<?php echo base_url('RecruiterHome/getdata');?>';
          $.ajax({
                    type: "post",
                    url:  url,
                    data:{skill:skill},
                    dataType:'json',
                    success:function(res){
                     var html="";                        
                    var html= '<option value="" >Select Area of Specialization</option>';
                     for(var count=0; count < res.length; count++){                 
                      html+= '<option value="'+res[count]['id']+'">'+res[count]['skills']+'</option>';
                     }
                     $('#specializationdata').html(html);
                    },
                    error:function(err){
                    console.log('Erro',err);
                    }
                });     
    }).change();
  });
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
    <!-- get location data -->
<script>
$(function(){
// Single Select
var url= '<?php echo base_url('AjexCallback/getlocation');?>';
function split( val ) {
  return val.split( /,\s*/ );
  }
  function extractLast( term ) {
  return split( term ).pop();
  }
$( "#locationval" ).autocomplete({
 source: function( request, response ) {
  // Fetch data
  $.ajax({
   url: url,
   type: 'post',
   dataType: "json",
   data: {
    search: request.term
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

<!-- //update -->
<script>
  function myfunctionupdate(){
  var id            =$('#updateid').val();
  var job_title     =$('#job_title').val();
  var key_skill     =$('#key_skills').val();
  var min_experience =$('#minexperience').val();
  var max_experience=$('#maxexperience').val();
  var location      =$('#locationval').val();
  var max_salary    =$('#maxsalary').val();
  var min_salary    =$('#minsalary').val();
  var job_description =$('#jobdesc').val();
  var graduation      =$('#graduationdata').val();
  var postgraducation =$('#postgraduated').val(); 
  var superspecial    =$('#superspecialty').val();
  var company_name    =$('#companyname').val();
  var executive_name   =$('#excutivename').val();
  var contact_number  =$('#contactNo').val();
  var email           =$('#emaildId').val();
  var desired_profile  =$('#desiredprofile').val();
  var job_function    =$('#job_function').val();
  var specialization  =$('#specializationdata').val();   
  var url= '<?php echo base_url('ManagePosting/EditPosting');?>';
 
  $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id,job_title:job_title,key_skill:key_skill,min_experience:min_experience,max_experience:max_experience,location:location,max_salary:max_salary,min_salary:min_salary,job_description:job_description,graduation:graduation,postgraducation:postgraducation,superspecial:superspecial,company_name:company_name,executive_name:executive_name,email:email,desired_profile:desired_profile,job_function:job_function,specialization:specialization, contact_number:contact_number},
                    dataType:'json',
                    success:function(res){
                     console.log(res);
                     window.location.reload();
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }

                });          
  }
</script>
<!-- // cancel modal -->
<script>
 $("#btnclosed").click(function(){
            $("#EditJobForm").modal('hide');
        });
</script>

<!-- delete data to select id  -->
<script>
function mydeletfunction(){
  var id  =$('#delid').val();
  var url= '<?php echo base_url('ManagePosting/deleteposting');?>'
  $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                     console.log(true);
                     window.location.reload();
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
  });
}
</script>
<script>
  function mydelfunction(id){
    var url= '<?php echo base_url('ManagePosting/Getjobposting');?>';
    $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                      var val=""; 
                      $('#delid').val(data['id']);                       
                       $("#deletepopup").modal('show');           
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                }); 
  }
</script>

<!-- //multiple delete function -->
<script type="text/javascript">
     $(document).ready(function(){
      // Check all
        $("#checkall").change(function(){
           var checked = $(this).is(':checked');
           if(checked){
              $(".checkbox").each(function(){
                  $(this).prop("checked",true);
              });
           }else{
              $(".checkbox").each(function(){
                  $(this).prop("checked",false);
              });
           }
        });
        // Changing state of CheckAll checkbox 
        $(".checkbox").click(function(){

           if($(".checkbox").length == $(".checkbox:checked").length) {
               $("#checkall").prop("checked", true);
           } else {
               $("#checkall").prop("checked",false);
           }

        });
        // Delete button clicked
        $('#delete').click(function(){
          var url= '<?php echo base_url('ManagePosting/multidelete');?>';
           // Confirm alert
           var deleteConfirm = confirm("Are you sure?");
           if (deleteConfirm == true) {
              // Get userid from checked checkboxes
              var users_arr = [];
              $(".checkbox:checked").each(function(){
                  var userid = $(this).val();
                  users_arr.push(userid);
              });
              // Array length
              var length = users_arr.length;
              if(length > 0){
                 // AJAX request
                 $.ajax({
                    url: url,
                    type: 'post',
                    data: {id: users_arr},
                    success: function(response){
                      window.location.reload();
                      //  Remove <tr>
                      //  $(".checkbox:checked").each(function(){
                      //      var userid = $(this).val();
                      //      console.log(userid);
                      //      $('#tr_'+userid).remove();
                      //  });

                    }
                 });
              }
           } 

        });

      });
      </script>