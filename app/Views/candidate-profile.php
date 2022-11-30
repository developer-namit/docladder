<?= $this->include('recruiter-header') ?>
    <!--=================================
Header -->

    <section class="space-ptb-outer bg-light recruiter-job-posting">
        <div class="container">
            <div class="row justify-content-center job-seeker-profile">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-8 text-center">
                    <h2 class="main-site-title sub-title-bg mb-3"><span>Candidate Profile</span></h2>
                </div>
            </div>
            <div class="row justify-content-center job-seeker-profile">
                <div class="col-lg-11">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="candidates-details-left">
                                <div id="leftcol_item" class="content-profile mb-3">
                                    <!-- <a href="https://tryyourwork.com/docladder-project-client/images/user-profile.png"> -->
                                    <?php if(!empty($user['upload_image'])){?>  
                                    <div class="user_dashboard_pic">
                                            <img alt="user photo" src="<?=base_url('public/uploads/uploadImage');?>/<?=$user['upload_image'];?>">  
                                        </div>
                                     <?php } else{?>
                                        <div class="user_dashboard_pic">
                                            <img alt="user photo" src="<?=base_url('public/assets');?>/images/user-profile.png">  
                                        </div>
                                    <?php }?>   
                                    <!-- </a> -->
                                </div>
                                <div class="content-widget-right">
                                    <h3>Download Resume</h3>
                                    <div class="resume-section-col">
                                        <div class="resume-section">
                                            <span class="me-1">Resume Title :</span>
                                            <p class="mb-0"><?php if(isset($user['job_title']) && !empty($user['job_title'])){ echo $user['job_title']; }?></p>
                                        </div>
                                        <div>
                                        
                                        <a href="<?=base_url('public/uploads/uploadResume');?>/<?=$user['upload_resume'];?>" target="_blank" class="download-btn"  attributes-list download rel="noopener noreferrer" target="_blank">
                                        Download<i class="fas fa-file-download ms-2"></i>
                                    </a> 
                                    
                                </div>
                
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-8">
                            <div class="candidate-details-right">
                                <div class="candidate-details-title mb-3 mb-lg-4 pb-3 border-dotted-bottom">
                                    <h2 class="mb-0"><span><?php if(isset($user['first_name']) && !empty($user['first_name'])){ echo $user['first_name']; }?></span></h2>
                                    <?php if(isset($user['current_employer']) && !empty($user['current_employer'])){?>
                                    <h3 class="mb-0"><span><?php echo $user['current_employer']; ?></span></h3><?php }?>
                                </div>
                                <div class="candidate-personal-info border-dotted-bottom">
                                    <h4><i class="fas flaticon-resume me-2"></i>Personal Details</h4>
                                    <ul class="list-unstyled mb-0 details">
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Gender :</label>
                                                <span><?php if(isset($user['gender']) && !empty($user['gender'])){ echo $user['gender']; }?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Location :</label>
                                                <span><?php if(isset($user['state']) && !empty($user['state'])){ echo $user['state']; }?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Contact :</label>
                                                <span><?php if(isset($user['contact_no']) && !empty($user['contact_no'])){ echo $user['contact_no']; }?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Email ID :</label>
                                                <span><?php if(isset($user['email_id']) && !empty($user['email_id'])){ echo $user['email_id']; }?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="candidate-education-info border-dotted-bottom mt-lg-4 mt-3">
                                    <h4><i class="flaticon-mortarboard me-2"></i>Education Details</h4>
                                    <ul class="list-unstyled mb-0 details">
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Graduation :</label>
                                                <span><?php if(isset($user['education_name']) && !empty($user['education_name'])){ echo $user['education_name']; }?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Institute :</label>
                                                <span><?php if(isset($user['institute']) && !empty($user['institute'])){ echo $user['institute']; }?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Post Graduation :</label>
                                                <span>	<?php if(isset($user['posteducation_name']) && !empty($user['posteducation_name'])){ echo $user['posteducation_name']; }?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Institute :</label>
                                                <span><?php if(isset($user['post_institute']) && !empty($user['post_institute'])){ echo $user['post_institute']; }?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Super Speciality  :</label>
                                                <span><?php if(isset($user['specialeducation_name']) && !empty($user['specialeducation_name'])){ echo $user['specialeducation_name']; }?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Institute :</label>
                                                <span><?php if(isset($user['specialty_institute']) && !empty($user['specialty_institute'])){ echo $user['specialty_institute']; }?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="candidate-experience border-dotted-bottom mt-lg-4 mt-3">
                                    <h4><i class="flaticon-businessman me-1"></i> Work Experience</h4>
                                    <ul class="list-unstyled mb-0 mt-3 details">
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Total experience :</label>
                                                <span><?php if(isset($user['maxexp']) && !empty($user['maxexp'])){ echo $user['maxexp']; }?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Current employer :</label>
                                                <span><?php if(isset($user['current_employer']) && !empty($user['current_employer'])){ echo $user['current_employer']; }?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-lg-2">
                                                <label>Current Designation :</label>
                                                <span><?php if(isset($user['current_designation']) && !empty($user['current_designation'])){ echo $user['current_designation']; }?></span>
                                            </div>
                                        </li>
                                    </ul>
                                
                                </div>
                                <div class="candidate-skills mt-lg-4 mt-3">
                                    <h4><i class="flaticon-doctor me-2"></i>Specialization and Preferences :</h4>
                                    <ul class="list-unstyled mb-0 mt-3">
                                        <li>
                                            <div class="candidates-keyskills mt-3">
                                                <h5>Key skills :</h5>
                                                <ul class="candidates-skill-tag list-unstyled mb-0">
                                        
                                                    <li><a href="javascript:void(0);"><span><?php if(isset($user['key_skills']) && !empty($user['key_skills'])){ echo $user['key_skills']; }?></span></a></li>
                                                   
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="mt-2">
                                            <div>
                                                <label>Current CTC :</label>
                                                <span><?php if(isset($user['current_ctc']) && !empty($user['current_ctc'])){ echo $user['current_ctc']; }?>Lac</span>
                                            </div>
                                        </li>
                                    </ul>
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
