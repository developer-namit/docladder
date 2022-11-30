<?= $this->include('recruiter-header') ?>
  <!--=================================
  Header -->


<!--=================================
saved search -->
<section class="space-ptb-outer bg-light">
    <div class="container">
        <div class="recruiter-job-posting">
            <div class="col-lg-12 text-center"><h2 class="main-site-title sub-title-bg mb-3"><span>Saved Search</span></h2></div>
        </div>
        <div class="table-responsive saved-search-table ">
            <table class="table table-lg table-hover">
                <thead>
                    <tr>
                        <th><i class="far fa-edit me-1"></i>Title</th>
                        <th><i class="far fa-calendar-alt me-1"></i>Date</th>
                        <th><i class="fas fa-map-marker-alt me-1"></i>Location</th>
                        <th><i class="fas fa-briefcase me-1"></i>Experience</th>
                        <th><i class="fas fa-search-plus me-1"></i>Search Type</th>
                        <th><i class="fas fa-hand-point-up me-1"></i>Action</th> 
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($savedata)){
                        foreach($savedata as $save){
                            ?>
                    <tr>
                      
                        
                        <td>
                            <a href="#">
                                <h5><?php if(!empty($save['title_name'])){ echo $save['title_name'];}?></h5>
                            </a>
                        </td>
                        <td>
                            
                        <?php if(!empty($save['created_at'])){ echo $save['created_at'];}?>
                            
                        </td>
                        <td>
                            
                        <?php if(!empty($save['location'])){ echo $save['location'];}?>
                        </td>
                        <td>
                            
                        <?php if(!empty($save['maxexp'])){ echo $save['maxexp'];}?>
                        </td>
                        <td>
                            
                        <?php if(!empty($save['search'])){ echo $save['search'];}?>
                        </td>
                        <td>
                            <a href="<?= base_url('Savesearching');?>/<?=$save['jobfunction'];?>/<?=$save['search'];?>" class="cl-success mrg-5" data-toggle="tooltip" data-original-title="Edit"><input type="button" class="btn btn-secondary" value="Run"></a>
                        </td> 
                       
                    </tr>
                    <?php    
                        }
                       } 
                       ?>  
                </tbody>
            </table>
            <div class="">
                <div class="col-12 text-center mt-3 mb-4">
                    <ul class="pagination justify-content-center mb-0">
                    <?php if(!empty($pagination)){?>
                                    <li class="page-item">
                                        <?=$pagination;?></li>
                                        <?php }  ?>
                                             </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
saved search -->


<!--=================================
Footer-->
<?= $this->include('recruiter-footer') ?>

<!--=================================
Footer-->

<!--=================================