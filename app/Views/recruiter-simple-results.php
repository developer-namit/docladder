<!--=================================
Header -->
<?= $this->include('recruiter-header') ?>
    <!--=================================
Header -->
<style>
section.space-ptb.bg-light.recruiter-job-posting.padd-top-150 {
padding-top: 100px!important;
}
  .fa-check{
    background: #13648c;
    padding: 4px;
    font-size: 11px;
    border-radius: 50%;
    color: #fff;
    margin-right: 5px;
    position: relative;
    top: -2px;
}  

    .nmSelBox .select2-selection__rendered {
      border: 1px solid #eeeeee;
      color: #574e4e;
      border-radius: 0px;
      filter: drop-shadow(0 0 2.5px rgba(121, 121, 121, 0.57));
      background-color: #ffffff;
      height: 35px;
      padding: 5px 20px;
      box-shadow: none;
      font-size: 14px;
      font-weight: 600;
      display: flex !important;
        align-items: center !important;
    }
    
    .nmSelBox .select2-selection__rendered li{
        margin: 7px !important;
    }
    
    .nmSelBox .select2-selection__rendered li input::placeholder{
        color:#000000 !important;
        font-size:16px !important;
    }
    
    .select2-results__options.select2-results__options--nested li{
        font-weight:bold !important;
    }
    
    .select2-results__group {
      display: none !important;
      padding: 0px !important;
    }
    .select2-results__options.select2-results__options--nested{
        padding: 0px !important;
    }
    
</style>
<!--=================================
Simple search results -->

    <section class="space-ptb bg-light recruiter-job-posting padd-top-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="search-result-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="cand-title mb-5"><span><?php if(!empty($total)){ echo $total; }?></span> Candidates Found</h3>
                              
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled d-block mb-0">
                                    
                                    <li class="mb-5 pb-2 text-right">
                                        <a class="modify-search-btn" onclick=mymodifyfunction();><i class="fas fa-edit me-2"></i>Modify Search</a>
                                    </li>
                                   
                                    
                                    
                                </ul>
                            </div>
                            <ul class="listing list-unstyled">
                                <li>
                                    <div class="form-group d-flex">
                                            <label>Show </label>
                                            <select class="form-control basic-select" id="paginationpage">
                                              <option value="40">40</option>
                                              <option value="80">80</option>
                                              <option value="120">120</option>
                                              <option value="160">160</option>
                                              <option value="200">200</option>
                                            </select>
                                        </div>
                                </li>
                                <li>
                                    <div class="form-check theme-col mt-2">
                                    <input class="form-check-input" type="checkbox" value="1" id="checkall">
                                        <label class="form-check-label" for="flexCheckDefault">Select All</label>
                                    </div>
                                </li>
                                <li>
                                    <ul class="list-unstyled social-shares mb-0">
                                        <h3 class="mb-0 me-2">Send Via :</h3>
                                        <a href=""  id="mail" target="_blank">
                                            <li>
                                                <img src="<?=base_url('public/assets');?>/images/social-icons/gmail.png" alt="Email">
                                            </li>
                                        </a>
                            
                                        <!--<a href="<?=base_url('public/assets');?>/#" target="_blank">-->
                                        <!--    <li>-->
                                        <!--        <img src="<?=base_url('public/assets');?>/images/social-icons/msgs.png" alt="Email">-->
                                        <!--    </li>-->
                                        <!--</a>-->
                                    </ul>
                                </li>
                                <li>
                                <form action="<?=base_url('SaveMonthly');?>" method="get"> 
                                    <ul class="list-unstyled d-flex justify-content-end mb-0">
                                           
                                    <li  class="me-2 w-100">
                                                <div class="form-group d-flex">
                                                    <label>Freshness </label>
                                                    <select class="form-control basic-select" name="months">
                                                      <option value="1">1 month</option>
                                                      <option value="3">3 month</option>
                                                      <option value="6">6 month</option>
                                                      <option value="12">12 month</option>
                                                      <option value="24">More than 12 months</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li>
                                            <input type="submit" class="saved-search-btn" value="Save">
                                            </li>
                                           
                                        </ul>
                                        </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="search-results-body">
                    <?php if(!empty($simpleform)){ 
                        foreach($simpleform as $simple){ 
                    ?>
                        <div class="search-result-list mb-4">
                            <div class="doc-des">
                                <div class="row align-items-center">

                                    <div class="col-md-8">
                                        <div class="form-check theme-col mb-2">
                                        <input class="form-check-input checkbox" type="checkbox" value="<?php if(!empty($simple['id'])){ echo $simple['id']; }?>" id="checkboxid">
                                            <label class="form-check-label" for="flexCheckDefault"><span><?php if(!empty($simple['totaldays'])){ echo $simple['totaldays']; }?></span>Old <?php if(!empty($simple['payment'])){ echo '('.$simple['payment']; ?>) <span><i class="fas fa-check"></i></span><?php }?>
                                             </label>
                                             
                                        </div>
                                        <a href="<?=base_url('/candidate/profile').'/'.$simple['id']; ?>" target="_blank">
                                            <h3><?php if(isset($simple['first_name']) && !empty($simple['first_name'])){ echo ucfirst($simple['first_name']); }?></h3>
                                        </a>
                                        <ul class="candidate-details-items list-unstyled mb-0">
                                            <li>
                                                <p class="mb-0">Keyskills</p>
                                                <span class="mx-2"><i class="fas fa-arrow-right"></i></span>
                                                <p class="mb-0"><?php if(isset($simple['key_skills']) && !empty($simple['key_skills'])){ echo $simple['key_skills']; }?></p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Current Location</p>
                                                <span class="mx-2"><i class="fas fa-arrow-right"></i></span>
                                                <p class="mb-0"><?php if(isset($simple['current_location']) && !empty($simple['current_location'])){ echo $simple['current_location']; }?></p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Salary</p>
                                                <span class="mx-2"><i class="fas fa-arrow-right"></i></span>
                                                <p class="mb-0"><i class="fas fa-rupee-sign"></i><?php if(isset($simple['current_ctc']) && !empty($simple['current_ctc'])){ echo $simple['current_ctc']; }?>L</p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Specialization</p>
                                                <span class="mx-2"><i class="fas fa-arrow-right"></i></span>
                                                <p class="mb-0"><?php if(isset($simple['specialization_name']) && !empty($simple['specialization_name'])){ echo $simple['specialization_name']; }?></p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Preferred Location</p>
                                                <span class="mx-2"><i class="fas fa-arrow-right"></i></span>
                                                <p class="mb-0"><?php if(isset($simple['preffered_location']) && !empty($simple['preffered_location'])){ echo $simple['preffered_location']; }?><?php if(isset($simple['preffered_location']) && !empty($simple['city_name'])){ echo ','.$simple['city_name']; }?></p>
                                            </li>

                                            <li>
                                                <p class="mb-0">Work Experience</p>
                                                <span class="mx-2"><i class="fas fa-arrow-right"></i></span>
                                                <p class="mb-0"><?php if(!empty($simple['min_experience']==1)){ echo $simple['min_experience'];?> Year<?php }else if(!empty($simple['min_experience'])){?><?php echo $simple['min_experience'];?> Years <?php }?> <?php if(!empty($simple['max_experience']==1)){ echo $simple['max_experience']; ?> Month <?php } else if(!empty($simple['max_experience'])){?><?=$simple['max_experience'];?> Months<?php }?>  <span></span></p>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <div class="col-md-4">
                                             <div id="section-text">
                                            <div class="article text-center">
                                            <button type="button" class="moreless-button" id="morlessbutton" onclick="mymorefunction('<?=$simple['id'];?>')">View Contact details</button>
                                                    <ul class="moretext morethentext_<?=$simple['id'];?> list-unstyled mt-4" id="contact-listing">
                                                    <li>
                                                        <a href="<?=base_url('public/assets');?>">
                                                            <i class="fas fa-phone fa-flip-horizontal fa-fw"></i>
                                                            <span class="ps-2"><?php if(isset($simple['contact_no']) && !empty($simple['contact_no'])){ echo $simple['contact_no']; }?></span>
                                                        </a>
                                                    </li>
                                                    <?php if(!empty($simple['email_id'])){?>
                                                    <li>
                                                        <a href="<?=base_url('public/assets');?>">
                                                            <i class="fas fa-envelope fa-flip-horizontal fa-fw"></i>
                                                            <span class="ps-2"><?php if(isset($simple['email_id']) && !empty($simple['email_id'])){ echo $simple['email_id']; }?></span>
                                                        </a>
                                                    </li>
                                                    <?php }?>
                                                </ul>
                                                
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  
                        }
                        }?>      
                        <div class="row">
                            <div class="col-12 text-center mt-4">
                                <ul class="pagination justify-content-center mb-0">
                                    <?php if(!empty($pagination)){?>
                                    <li class="page-item">
                                        <?=$pagination;?></li>
                                        <?php } else{ ?>
                                            <li class="page-item">
                                                <?php echo $pager->links();?>
                                                </li>
                                             <?php }?>   
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
<!--model data-->
    <div class="modal  modal-right popup-modal show"  id="ViewSpaceForm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content recruiter-job-posting">
      <div class="modal-title">
          <ul class="list-unstyled">
              <li>
                <h2>Simple Search</h2>
              </li>
              <li>
                 <button type="button" class="btn-close popup-btn" data-bs-dismiss="modal" aria-label="Close"></button>
              </li>
          </ul>
      </div>
      <div class="modal-body">
        <div class="box-header">
          <h4>General Information</h4>
        </div>
        <form class="postjob-form">
            <div class="box">
                <div class="box-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <form class="postjob-form" action="<?php echo base_url('Simplesearching');?>" method="get">
                                <!--general info-->
                                <?php $validation =  \Config\Services::validation(); ?>
                                <div class="box">
                                    
                                    <div class="box-body">
                                        <div class="row bg-white login-register justify-content-center check-select-p">
                                            <div class="form-group col-md-12 select-border mb-3">
                                                <label>Key Skills</label>
                        
                                        <input type="text" name="key_skills" id="key_skills" placeholder="Enter Key Skills" class="form-control" value="<?php if(!empty($_GET['key_skills'])){ echo $_GET['key_skills']; }?>">
                                   
                                            </div>
                                            
                                            <div class="form-group col-md-12 select-border mb-3 nmSelBox">
                                                <label class="form-label">Current  Location <em class="text-danger">*</em></label>
                    
                                                <select class="form-control jquery-select2 slt-location cuurentLocationSel" name="state[]" id="states" autocomplete="off" multiple>
                                                    <option disabled>Select Location...</option>
        
                                                    <optgroup><option value="NI" <?php if(isset($_GET['state']) && !empty($_GET['state']) && in_array('NI',$_GET['state']) ){  echo "selected"; }  ?>>Anywhere in North India</option></optgroup>
                                                    <optgroup><option value="EI" <?php if(isset($_GET['state']) && !empty($_GET['state']) && in_array('EI',$_GET['state']) ){  echo "selected"; }  ?> >Anywhere in East India</option></optgroup>
                                                    <optgroup><option value="WI" <?php if(isset($_GET['state']) && !empty($_GET['state']) && in_array('WI',$_GET['state']) ){  echo "selected"; }  ?>>Anywhere in West India</option></optgroup>
                                                    <optgroup><option value="SI" <?php if(isset($_GET['state']) && !empty($_GET['state']) && in_array('SI',$_GET['state']) ){  echo "selected"; }  ?> >Anywhere in South India</option></optgroup>
                                                    <?php 
                                                        if(!empty($margedata)){
                                                            foreach($margedata as $val){
                                                                
                                                            if(isset($_GET['state']) && !empty($_GET['state']) && in_array('state_'.$val['id'],$_GET['state']) ){  
                                                                $selected = "selected";
                                                            } else{
                                                                $selected = "";
                                                            }
                                                    ?>
                                                        <optgroup><option value="state_<?= $val['id'];?>" <?= $selected; ?> ><?= strtolower($val['name']);?></option></optgroup>
                                                    <?php 
                                                        if(!empty($val['city'])){
                                                            foreach($val['city'] as $cities){
                                                                
                                                                if(isset($_GET['state']) && !empty($_GET['state']) && in_array('city_'.$cities['id'],$_GET['state']) ){  
                                                                    $selected = "selected";
                                                                } else{
                                                                    $selected = "";
                                                                }
                                                    ?>
                                                        <option value="city_<?= $cities['id'];?>" <?= $selected; ?> > <?= strtolower($cities['name']);?></option>
                                                    <?php } } 
                                                         if(isset($_GET['state']) && !empty($_GET['state']) && in_array('other_'.$val['id'],$_GET['state']) ){  
                                                            $selected = "selected";
                                                        } else{
                                                            $selected = "";
                                                        }
                                                    ?>
                                                        <optgroup><option value="other_<?= $val['id'] ?>" type="others" mainId="<?= $val['id'] ?>" mainState="<?= $val['name'] ?>" <?= $selected; ?> ><?= strtolower($val['other']);?></option></optgroup>
                                                    <?php } } ?>     
                                              </select>
                                              
                                              <div class="child">
                                                    <?php
                                                        if(isset($_GET['other']['states']) && !empty($_GET['other']['states']) ){
                                                        foreach($_GET['other']['states'] as $p => $others){
                                                    ?>
                                                     
                                                     <div id="Mainstatesother_<?= $p; ?>" class="mb-3 mt-3 col-md-12">
                                                        <label class="form-label">other cities in </label>
                                                        <input type="text" class="form-control" name="other[states][<?= $p; ?>]" value="<?= $others ?>">
                                                     </div>
                                                    <?php 
                                                        }  }
                                                    ?>
                                                        
                                                    
                                              </div>
                                          
                                            </div>
                  
                                          <div class="form-group col-md-12 select-border mb-3 nmSelBox">
                                              <label class="form-label">Preferred Location <em class="text-danger">*</em></label>
                                             <select class="form-control jquery-select2 slt-location prefferedLocationSel" name="location[]" id="location" autocomplete="off" multiple>
                                                 
                                                                    
                                                                    <option disabled>Select Location...</option>
                        
                                                                    <optgroup><option value="NI" <?php if(isset($_GET['location']) && !empty($_GET['location']) && in_array('NI',$_GET['location']) ){  echo "selected"; }  ?>>Anywhere in North India</option></optgroup>
                                                                    <optgroup><option value="EI" <?php if(isset($_GET['location']) && !empty($_GET['location']) && in_array('EI',$_GET['location']) ){  echo "selected"; }  ?> >Anywhere in East India</option></optgroup>
                                                                    <optgroup><option value="WI" <?php if(isset($_GET['location']) && !empty($_GET['location']) && in_array('WI',$_GET['location']) ){  echo "selected"; }  ?>>Anywhere in West India</option></optgroup>
                                                                    <optgroup><option value="SI" <?php if(isset($_GET['location']) && !empty($_GET['location']) && in_array('SI',$_GET['location']) ){  echo "selected"; }  ?> >Anywhere in South India</option></optgroup>
                                                                    <?php 
                                                                        if(!empty($margedata)){
                                                                            foreach($margedata as $val){
                                                                                
                                                                                if(isset($_GET['location']) && !empty($_GET['location']) && in_array('state_'.$val['id'],$_GET['location']) ){  
                                                                                    $selected = "selected";
                                                                                } else{
                                                                                    $selected = "";
                                                                                }
                                                                    ?>
                                                                        <optgroup><option value="state_<?= $val['id'];?>" <?= $selected; ?>><?= strtolower($val['name']);?></option></optgroup>
                                                                    <?php 
                                                                        if(!empty($val['city'])){
                                                                            foreach($val['city'] as $cities){
                                                                                
                                                                                if(isset($_GET['location']) && !empty($_GET['location']) && in_array('city_'.$cities['id'],$_GET['location']) ){  
                                                                                    $selected = "selected";
                                                                                } else{
                                                                                    $selected = "";
                                                                                }
                                                                    ?>
                                                                        <option value="city_<?= $cities['id'];?>" <?= $selected; ?> > <?= strtolower($cities['name']);?></option>
                                                                    <?php } } 
                                                                    
                                                                        if(isset($_GET['location']) && !empty($_GET['location']) && in_array('other_'.$val['id'],$_GET['location']) ){  
                                                                            $selected = "selected";
                                                                        } else{
                                                                            $selected = "";
                                                                        }
                                                                    ?>
                                                                        <optgroup><option value="other_<?= $val['id'] ?>" type="others"  mainId="<?= $val['id'] ?>"  mainState="<?= $val['name'] ?>" <?= $selected; ?>  ><?= strtolower($val['other']);?></option></optgroup>
                                                                    <?php } } ?>                                                         
                                                                </select>
                                                
                                                    
                                                                <div class="child">
                                                                    
                                                                    <?php
                                                                        if(isset($_GET['other']['location']) && !empty($_GET['other']['location']) ){
                                                                        foreach($_GET['other']['location'] as $p => $others){
                                                                    ?>
                                                                     
                                                                     <div id="Mainstatesother_<?= $p; ?>" class="mb-3 mt-3 col-md-12">
                                                                        <label class="form-label">other cities in </label>
                                                                        <input type="text" class="form-control" name="other[states][<?= $p; ?>]" value="<?= $others ?>">
                                                                     </div>
                                                                    <?php 
                                                                        }  }
                                                                    ?>
                                                    
                                                                </div>
                                          </div>
                                          
                                            
                                            <div class="form-group col-md-6 select-border mb-3">
                                                <label>Min Experience<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select <?php if($validation->getError('min_experience')): ?>is-invalid<?php endif ?>" name="min_experience" required>
                                                <option value="" selected="selected">Select Value</option>
                                                    <option value="0" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '0'){echo("selected");}?>>Fresher</option>                                      
                                                    <option value="1" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '1'){echo("selected");}?>>1Y Experience</option>
                                                    <option value="2" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '2'){echo("selected");}?>>2Y Experience</option>
                                                    <option value="3" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '3'){echo("selected");}?>>3Y Experience</option>
                                                    <option value="4" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '4'){echo("selected");}?>>4Y Experience</option>
                                                    <option value="5" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '5'){echo("selected");}?>>5Y Experience</option>
                                                    <option value="6" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '6'){echo("selected");}?>>6Y Experience</option>
                                                    <option value="7" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '7'){echo("selected");}?>>7Y Experience</option>
                                                    <option value="8" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '8'){echo("selected");}?>>8Y Experience</option>
                                                    <option value="9" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '9'){echo("selected");}?>>9Y Experience</option>
                                                    <option value="10" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '10'){echo("selected");}?>>10Y Experience</option>
                                                    <option value="11" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '11'){echo("selected");}?>>10Y+ Experience</option>
                                                </select>
                                        <?php if ($validation->getError('min_experience')): ?>
                                        <div class="invalid-feedback">
                                        <?= $validation->getError('min_experience') ?>
                                        </div>                                
                                        <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6 select-border mb-3">
                                                <label>Max Experience<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select <?php if($validation->getError('max_experience')): ?>is-invalid<?php endif ?>" name="max_experience" required>
                                                     <option value="" selected="selected">Select Value</option>
                                                    <option value="1" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '1'){echo("selected");}?>>1Y Experience</option>
                                                    <option value="2" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '2'){echo("selected");}?>>2Y Experience</option>
                                                    <option value="3" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '3'){echo("selected");}?>>3Y Experience</option>
                                                    <option value="4" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '4'){echo("selected");}?>>4Y Experience</option>
                                                    <option value="5" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '5'){echo("selected");}?>>5Y Experience</option>
                                                    <option value="6" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '6'){echo("selected");}?>>6Y Experience</option>
                                                    <option value="7" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '7'){echo("selected");}?>>7Y Experience</option>
                                                    <option value="8" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '8'){echo("selected");}?>>8Y Experience</option>
                                                    <option value="9" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '9'){echo("selected");}?>>9Y Experience</option>
                                                    <option value="10" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '10'){echo("selected");}?>>10Y Experience</option>
                                                    <option value="11" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '11'){echo("selected");}?>>10Y+ Experience</option>
                                                </select>
                                                        <?php if ($validation->getError('max_experience')): ?>
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('max_experience') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Min Salary<em class="text-danger">*</em> <small>( in Lacs )</small></label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend d-flex">
                                                    <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                                                  </div>
                                                  <input type="text" class="form-control <?php if($validation->getError('min_salary')): ?>is-invalid<?php endif ?>" name="min_salary" value="<?php if(isset($_GET['min_salary']) && !empty($_GET['min_salary'])){ echo $_GET['min_salary']; }?>" required>
                                                    <?php if ($validation->getError('min_salary')): ?>
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('min_salary') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Max Salary<em class="text-danger">*</em> <small>( in Lacs )</small></label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend d-flex">
                                                    <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                                                  </div>
                                                  <input type="text" class="form-control <?php if($validation->getError('max_salary')): ?>is-invalid<?php endif ?>"  name="max_salary" value="<?php if(isset($_GET['max_salary']) && !empty($_GET['max_salary'])){ echo $_GET['max_salary']; }?>" required>
                                                    <?php if ($validation->getError('max_salary')): ?>
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('max_salary') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 select-border mb-3">
                                                <label>Job Function<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select <?php if($validation->getError('designation')): ?>is-invalid<?php endif ?>" name="designation" id="designation" required>
                                                <option value=" ">Select job function</option>
                                                <?php if (!empty($designation)){ 
                                                    foreach($designation as $val) { ?>                           
                                                    <option value="<?php echo $val['designation_id'];?>" <?php if(isset($_GET['designation']) && $_GET['designation'] == $val['designation_id']){echo("selected");}?>><?php if(!empty($val['designation'])){ echo $val['designation']; }?></option>
                                                    <?php }}?>
                                            </select>
                                            <?php if ($validation->getError('designation')): ?>
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('designation') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                            </div>
                                          
                                            <div class="form-group col-md-12 select-border mb-3">
                                                <label>Area of Specialization<em class="text-danger">*</em></label>
                                                <select class="form-control  <?php if($validation->getError('specialization')): ?>is-invalid<?php endif ?>" name="specialization" id="specialization" required> 
                                                <option value=" ">Select job function</option>
                                                <?php if(!empty($skills)){
                                                    foreach ($skills as $sk){
                                                    ?>
                                                  <option value="<?php echo $sk['id'];?>" <?php if(isset($_GET['specialization']) && !empty($sk['id']== $_GET['specialization'])){ echo "selected"; }?>><?= $sk['skills']; ?></option>
                                                 <?php    
                                                    }
                                                } ?>   
                                            </select>
                                            <?php if ($validation->getError('specialization')): ?>
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('specialization') ?>
                                                    </div>                                
                                                    <?php endif; ?>
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
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--=================================
advance View Equipment Details Modal Popup -->    

    
<!--=================================
Simple search results -->
<style>
.pagination .page-item{
    color: #13648c;
    padding: 5px 20px;
    border-radius: 3px;
    font-weight: 500;
    border: none;
    font-size: 20px;
    background-color: transparent;
}
@media (max-width: 1199px){
.pagination .page-item  {
    padding: 5px 15px;
}
}
.page-item {
    margin-left: 10px;
}

</style>



<!--=================================
Footer-->
<!--=================================
Footer-->
<?= $this->include('footer') ?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multiselect-widget/3.0.1/jquery.multiselect.filter.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multiselect-widget/3.0.1/jquery.multiselect.min.js"></script>
    <script>
        function mymorefunction(id){
           $(".morethentext_"+id).slideToggle(); 
            if ($('#morlessbutton').text() == "View Contact details") {
            $(this).text("View Contact details")
            } else {
                $(this).text("View Contact details")
    }
        }
    </script>
    
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
  $(document).ready(function () {
    $('#paginationpage').on('change', function () {  
      var page= this.value;
    //   var request= '<?=$_SERVER['REQUEST_URI'];?>';
    var request= '<?php if(!empty($url)){ echo $url;}?>';
      var url= request+'&pages='+page;
      window.location.replace(url );
});
  });
</script>
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
        $('#mail').click(function(e){
          
              // Get userid from checked checkboxes
              var users_arr = [];
              $(".checkbox:checked").each(function(){
                  var userid = $(this).val();
                  users_arr.push(userid);
              });
              // Array length
              var length = users_arr.length;
              var url='<?=base_url('RecruiterSimpleSearch/email');?>'
              if(length > 0){
                 // AJAX request
                 $.ajax({
                    url: url,
                    type: 'get',
                    data: {id: users_arr},
                    success: function(response){
                     if(response.success==true){
                     window.location.replace('<?=base_url('Mail');?>');
                 }else if(response.success==false){
                    $('#alertMsg').html(response.msg);
                                $('#alertMessage').show();
                                $('#alertMsg').css("color", "red");
                             
                            }
                            setTimeout(function () {
                                $('#alertMsg').html('');
                                $('#alertMessage').hide();
                            }, 4000);
                 }   
                 });
              }
           
              e.preventDefault();
        });

      });
      </script>
      
<script>
    function mymodifyfunction(){
        let skills='<?= $_GET['specialization'];?>';
        
       $("#ViewSpaceForm").modal('show');         
    }
</script>

<script>
        function mymodifyadvance(){
           $("#advanceSpaceForm").modal('show'); 
        }
    </script>

<script>
    $(".cuurentLocationSel").select2({
		closeOnSelect : false,
		placeholder : "Current Location",
		allowHtml: true,
		allowClear: true,
		tags: true 
	});
	
	$(".prefferedLocationSel").select2({
		closeOnSelect : false,
		placeholder : "Preferred Location",
		allowHtml: true,
		allowClear: true,
		tags: true 
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

            $('.jquery-select2').on('select2:select', function (e) {
                var data = e.params.data;
                if(data.element.getAttribute('type') == 'others'){
                    var selectedMainId = data.element.offsetParent.getAttribute('id');
                    var selectedValue = data.id;
                    
                    $(`#${selectedMainId}`).parent('.form-group').find('.child').append(`
                        <div id="Main${selectedMainId}${selectedValue}" class="mb-3 mt-3 col-md-12">
                            <label class="form-label">${data.text.trim()}</label>
                            <input type="text" class="form-control" name="other[${selectedMainId}][${data.element.getAttribute('mainId')}]" value="">
                        </div>
                    `);
                }
            });
			
            $('.jquery-select2').on('select2:unselect', function (e) {
                var data = e.params.data;
               if(data.element.getAttribute('type') == 'others'){
                    var selectedMainId = data.element.offsetParent.getAttribute('id');
                    var selectedValue = data.id;
                    $(`#Main${selectedMainId}${selectedValue}`).remove()
                }
            });

</script>

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
    }).change();
  });
    </script>
    