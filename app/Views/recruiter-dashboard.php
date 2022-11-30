<?= $this->include('recruiter-header') ?>
<!--=================================
Header -->

<!--=================================
Register -->
<section class="space-ptb-outer bg-light service-information">
    <div class="container">
        <div class="row mb-4">
          <h2 class="main-site-title sub-title-bg mb-3 text-center"><span>Dashboard</span></h2>
            <div class="col-lg-10">
                <div class="service-info">
                  <h3 class="main-sub-title mb-3 text-left"><span>Service Information</span></h3>
                    <div class="user-dashboard-table table-responsive border-table">
                        <table class="table table-lg table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td>Receipt ID </td>
                                    <td>-</td>
                                    <td><?php if(!empty($transaction['id'])){ echo $transaction['id'];}?></td>
                                </tr>
                                <tr>
                                    <td>Client Name</td>
                                    <td>-</td>
                                    <td><?php if(!empty($transaction['username'])){ echo $transaction['username'];}?></td>
                                </tr>
                                <tr>
                                    <td>Concerned Person Name</td>
                                    <td>-</td>
                                    <td><?php echo session()->get('firstname');?></td>
                                </tr>
                                <tr>
                                    <td>Contact</td>
                                    <td>-</td>
                                    <td><?php echo session()->get('contactno');?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <div class="service-info-bg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="job-posting-info pt-lg-2 pb-lg-3">
                              <h3 class="main-sub-title mb-3 text-left"><span>Job Posting</span></h3>
                                <div class="user-dashboard-table table-responsive border-table">
                                    <table class="table table-lg table-hover mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Total Posts</td>
                                                <td>-</td>
                                                <td><?php if(!empty($jobpost['id'])){ echo $jobpost['id'];}?>/<?php if(!empty($post['id'])){ echo $post['id'];}?></td>
                                            </tr>
                                            <!--<tr>-->
                                            <!--    <td>Remaining Posts</td>-->
                                            <!--    <td>-</td>-->
                                            <!--    <td>0/0</td>-->
                                            <!--</tr>-->
                                            <tr>
                                                <td>Register Date </td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['start_date'])){ echo $transaction['start_date'];}?></td>
                                            </tr>
                                            <tr>
                                                <td>Expired on</td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['expired_date'])){ echo $transaction['expired_date'];}?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="resume-services-info">
                                <div class="job-posting-info pt-lg-2 pt-4 pb-lg-3">
                                <h3 class="main-sub-title mb-3 text-left"><span>Resume Services</span></h3>
                                <div class="user-dashboard-table table-responsive border-table">
                                    <table class="table table-lg table-hover mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Number of Resumes</td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['less_resume'])){ echo $transaction['less_resume'];}?>/<?php if(!empty($transaction['resume'])){ echo $transaction['resume'];}?></td>
                                            </tr>
                                            <!--<tr>-->
                                            <!--    <td>Upgraded Resumes</td>-->
                                            <!--    <td>-</td>-->
                                            <!--    <td>0/0</td>-->
                                            <!--</tr>-->
                                            <tr>
                                                <td>Register Date </td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['start_date'])){ echo $transaction['start_date'];}?></td>
                                            </tr>
                                            <tr>
                                                <td>Expired on</td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['expired_date'])){ echo $transaction['expired_date'];}?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row pt-lg-3 pb-lg-2">
                        <div class="col-lg-6">
                            <div class="job-posting-info pt-lg-0 pt-4">
                              <h3 class="main-sub-title mb-3 text-left"><span>Other Services</span></h3>
                                <div class="user-dashboard-table table-responsive border-table">
                                    <table class="table table-lg table-hover mb-0">
                                        <thead>
                                            <tr>
                                              <th colspan="3">Total number of</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Emails (Used Services/ Remaining services )</td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['less_email'])){ echo $transaction['less_email'];}?>/<?php if(!empty($transaction['email'])){ echo $transaction['email'];}?></td>
                                            </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="pt-4 pt-lg-0">
                              <h3 class="main-sub-title mb-3 text-left"><span>Sub Users</span></h3>
                                <div class="user-dashboard-table table-responsive border-table">
                                    <table class="table table-lg table-hover mb-0">
                                        <thead>
                                            <tr>
                                              <th scope="col">Name</th>
                                              <th scope="col">Contact</th>
                                              <th scope="col">Allocated Services</th>
                                              <th scope="col">Pending Services</th>
                                              <th scope="col">Profile</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($posting)){
                                                foreach($posting as $jobs){
                                                    ?>
                                            <tr>
                                                <td><?php if(!empty($jobs['client_first_name'])){ echo $jobs['client_first_name'];}?></td>
                                                <td><?php if(!empty($jobs['contact_no'])){ echo $jobs['contact_no'];}?></td>
                                                <td><?php if(!empty($jobs['total_allocated'])){ echo $jobs['total_allocated'];}else{echo '0'; }?> /2</td>
                                                <td><?php if(!empty($jobs['pending_allocated'])){ echo $jobs['pending_allocated'];}else{echo '0'; }?> /2</td>
                                                <?php if(!empty($jobs['status']) && $jobs['status']=='active'){?>
                                                   <td>
                                                    <span class="badge badge-success">Active</span>
                                                </td> 
                                                   <?php } else{?>
                                                <td>
                                                    <span class="badge badge-danger">In-Active</span>
                                                </td>
                                            </tr>
                                            <?php 
                                                   }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    
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
                    <h3>Physician</h3>
                    <ul class="list-unstyled details-ul">
                        <li class="me-2">Abc hospital <span>|</span></li>
                        <li class="me-2">Location- Abc Hospital</li>
                    </ul>
                    <ul class="list-unstyled details-ul">
                        <li class="me-2">Experience-  0 to 2 <span>|</span></li>
                        <li class="me-2">Salary - <i class="fas fa-rupee-sign pe-1"></i>25 to <i class="fas fa-rupee-sign pe-1"></i> 30 Lacs</li>
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
                                <td width="21" >-</td>
                                <td width="651" >Physician</td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Experience</td>
                                <td width="21" >-</td>
                                <td width="651" >6 Months</td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Location</td>
                                <td width="21" >-</td>
                                <td width="651" >Punjab</td>
                            </tr>
                             <tr>
                                <td width="214" height="33" >Salary</td>
                                <td width="21" >-</td>
                                <td width="651" >25 to 30 Lacs</td>
                            </tr>
                             <tr>
                                <td width="214" height="33" >Industry</td>
                                <td width="21" >-</td>
                                <td width="651" >Healthcare</td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Job Description</td>
                                <td width="21" >-</td>
                                <td width="651" >Urgent Opening For Consultant Physician</td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Graduation</td>
                                <td width="21" >-</td>
                                <td width="651" >M.B.B.S</td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Post Graduation</td>
                                <td width="21" >-</td>
                                <td width="651" >DCH</td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Super Specialty</td>
                                <td width="21" >-</td>
                                <td width="651" >DM</td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Company Name</td>
                                <td width="21" >-</td>
                                <td width="651" >Abc Hospital</td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Executive Name</td>
                                <td width="21" >-</td>
                                <td width="651" >Abc</td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >Contact No</td>
                                <td width="21" >-</td>
                                <td width="651" >9874563210</td>
                            </tr>
                            <tr>
                                <td width="214" height="33" >E-mail Id</td>
                                <td width="21" >-</td>
                                <td width="651" >abc@gmail.com</td>
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

<!--=================================
