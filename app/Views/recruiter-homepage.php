<?= $this->include('recruiter-header') ?>
<!--=================================
Header -->

<!--=================================
Register -->
    <section class="space-ptb-outer bg-light recruiter-homepage">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mb-3"><h2 class="main-site-title sub-title-bg ms-2 text-center"><span>Recent Searches</span></h2></div>
                <div class="col-lg-12">
                     <div class="search-wrapper">
                       <div class="row">
                         <div class="justify-content-start">
                           <ul class="nav nav-tabs nav-tabs-02" role="tablist">
                             <li class="nav-item col-lg-6">
                               <a class="nav-link active ms-0" id="simple-search" data-bs-toggle="tab" href="#simple-search-tab" role="tab" aria-controls="simple-search-tab" aria-selected="true">Simple Search</a>
                             </li>
                             <li class="nav-item col-lg-6">
                               <a class="nav-link" id="advance-search" data-bs-toggle="tab" href="#advance-search-tab" role="tab" aria-controls="advance-search-tab" aria-selected="false">Advance Search</a>
                             </li>
                           </ul>
                         </div>
                       </div>
                       <div class="tab-content mt-3">
                         <div class="tab-pane fade active show" id="simple-search-tab" role="tabpanel" aria-labelledby="simple-search">
                            <div class="row">
                                <?php if(!empty($simple['savedata'])){
                                    foreach($simple['savedata'] as $save){
                                        
                                        ?>
                            
                                <div class="col-lg-6  mb-4">
                                    <div class="search-box-tab search-border">
                                        <div class="d-flex align-items-center bg-white-odd">
                                            <h5 class="mb-0">Key skills</h5>
                                            <span class="mx-2 fw-bold">:</span>
                                            <ul class="d-flex align-items-center list-unstyled mb-0">
                                                <li class="me-2 text-secondary">
                                                <?php if(isset($save['key_skills']) && !empty($save['key_skills'])){ echo $save['key_skills']; }?>
                                                     </li>
                                                  </ul>
                                        </div>
                                        <ul class="list-unstyled mb-0 content bg-blue-even me-0">
                                            <li><i class="far fa-calendar-alt me-2"></i><?php if(isset($save['date']) && !empty($save['date'])){ echo $save['date']; }?></li>
                                            <li><i class="fas fa-clock me-1"></i><?php if(isset($save['time']) && !empty($save['time'])){ echo $save['time']; }?></li>
                                            <li><i class="fas fa-map-marker-alt"></i><?php if(isset($save['location']) && !empty($save['location'])){ echo $save['location']; }?></li>
                                            <li><i class="fas fa-user-md"></i> <?php if(isset($save['title_name']) && !empty($save['title_name'])){ echo $save['title_name']; }?></li>
                                            <li><i class="fas fa-briefcase"></i><?php if(isset($save['maxexp']) && !empty($save['maxexp'])){ echo $save['maxexp']; }?></li>
                                            
                                        </ul>
                                     
                                        <div class="mt-2 text-right">
                                            <a href="<?= base_url('Savesearching');?>/<?=$save['jobfunction'];?>/<?=$save['search'];?>"><input type="button" class="run-btn-bg" value="Run Search"></a>
                                        </div>
                                    </div>
                                </div>
                                 <?php }} ?>  
                            </div>
                            <div class="row justify-content-center">
                            <div class="col-12 text-center">
                            <?php 
                          
                              if(!empty($simple)){
                                echo $simple['pager']->links();
                            }?>
                               
                            </div>
                            </div>  
                         </div>
                         <div class="tab-pane fade" id="advance-search-tab" role="tabpanel" aria-labelledby="advance-search">
                         <div class="row">
                                <?php if(!empty($advance['savedata'])){
                                    foreach($advance['savedata'] as $advancesave){
                                        
                                        ?>
                                <?php if(isset($advancesave['search']) && !empty($advancesave['search']=='advance')){?> 
                                <div class="col-lg-6  mb-4">
                                    <div class="search-box-tab search-border">
                                        <div class="d-flex align-items-center bg-white-odd">
                                            <h5 class="mb-0">Key skills</h5>
                                            <span class="mx-2 fw-bold">:</span>
                                            <ul class="d-flex align-items-center list-unstyled mb-0">
                                                <li class="me-2 text-secondary">
                                                <?php if(isset($advancesave['key_skills']) && !empty($advancesave['key_skills'])){ echo $advancesave['key_skills']; }?>
                                                     </li>
                                                  </ul>
                                        </div>
                                        <ul class="list-unstyled mb-0 content bg-blue-even me-0">
                                            <li><i class="far fa-calendar-alt me-2"></i><?php if(isset($advancesave['date']) && !empty($advancesave['date'])){ echo $advancesave['date']; }?></li>
                                            <li><i class="fas fa-clock me-1"></i><?php if(isset($advancesave['time']) && !empty($advancesave['time'])){ echo $advancesave['time']; }?></li>
                                            <li><i class="fas fa-map-marker-alt"></i><?php if(isset($advancesave['location']) && !empty($advancesave['location'])){ echo $advancesave['location']; }?></li>
                                            <li><i class="fas fa-user-md"></i> <?php if(isset($advancesave['title_name']) && !empty($advancesave['title_name'])){ echo $advancesave['title_name']; }?></li>
                                            <li><i class="fas fa-briefcase"></i><?php if(isset($advancesave['maxexp']) && !empty($advancesave['maxexp'])){ echo $advancesave['maxexp']; }?></li>
                                            
                                        </ul>
                                        <div class="mt-2 text-right">
                                            <a href="<?= base_url('Savesearching');?>/<?=$advancesave['jobfunction'];?>/<?=$advancesave['search'];?>"><input type="button" class="run-btn-bg" value="Run Search"></a>
                                        </div>
                                    </div>
                                </div>
                                 <?php }}} ?>  
                            </div> 
                            
                            <div class="row justify-content-center">
                            <div class="col-12 text-center">
                            <?php 
                          
                          if(!empty($advance)){
                            echo $advance['pager']->links();
                        }?>
                               
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
Footer Start-->
<?= $this->include('recruiter-footer') ?>
<!--=================================
Footer Ends-->

