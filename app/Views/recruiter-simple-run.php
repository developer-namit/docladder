<!--=================================
Header -->
<?= $this->include('recruiter-header') ?>
    <!--=================================
Header -->
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
.padd-top-150 {
    padding-top: 100px !important;
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
.pagination li {
    color: #000!important;
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
                                <h3 class="cand-title mb-5"><span><?php if(isset($total) && !empty($total)){ echo $total; }?></span> Candidates Found</h3>
                              
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled d-block mb-0">
                                    <li class="mb-5 pb-2 text-right">
                                        <a href="<?php if(!empty($previous_url)){ echo $previous_url;}?>" class="modify-search-btn"><i class="fas fa-edit me-2"></i>Modify Search</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="listing list-unstyled">
                                <li>
                                    <div class="form-group d-flex">
                                            <label>Show </label>
                                            <select class="form-control basic-select" id="paginationpage">
                                              <option value="0">10</option>
                                              <option value="40">40</option>
                                              <option value="80">80</option>
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
                                <span id="alertMsg"></span>
                                    <ul class="list-unstyled social-shares mb-0">
                                        <h3 class="mb-0 me-2">Send Via :</h3>
                                        <a href=""  id="mail" target="_blank">
                                            <li>
                                                <img src="<?=base_url('public/assets');?>/images/social-icons/gmail.png"  alt="Email">
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
                        foreach($simpleform as $row){
                        foreach($row as $simple){
                    ?>
                        <div class="search-result-list mb-4">
                            <div class="doc-des">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="form-check theme-col mb-2">
                                        <input class="form-check-input checkbox" type="checkbox" value="<?php if(!empty($simple['id'])){ echo $simple['id']; }?>" id="checkboxid">
                                            <label class="form-check-label" for="flexCheckDefault"><?php if(!empty($simple['months'])){ echo $simple['months']; }?> Old <?php if(!empty($simple['payment'])){ echo '('.$simple['payment']; ?>) <span><i class="fas fa-check"></i></span><?php }?> </label>
                                        </div>
                                        <a href="<?=base_url('/candidate/profile')?>/<?php if(!empty($simple['id'])){ echo $simple['id']; }?>" target="_blank">
                                            <h3><?php if(isset($simple['first_name']) && !empty($simple['first_name'])){ echo $simple['first_name']; }?>
                                            </h3>
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
                                                <p class="mb-0"><?php if(isset($simple['state']) && !empty($simple['state'])){ echo $simple['state']; }?></p>
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
                                                <p class="mb-0"><?php if(isset($simple['city']) && !empty($simple['city'])){ echo $simple['city']; }?></p>
                                            </li>

                                            <li>
                                                <p class="mb-0">Work Experience</p>
                                                <span class="mx-2"><i class="fas fa-arrow-right"></i></span>
                                                <p class="mb-0"><?php if(isset($simple['maxexp']) && !empty($simple['maxexp'])){ echo $simple['maxexp']; }?><span></span></p>
                                            </li>
                                               
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        
                                             <div id="section-text">
                                            <div class="article text-center">
                                                <input type="button" class="moreless-button" id="morlessbutton" value="View Contact details">
                                                <!-- <a class="moreless-button">View Contact details</a> -->
                                                <ul class="moretext list-unstyled mt-4" id="contact-listing">
                                                    <li>
                                                        <a href="<?=base_url('public/assets');?>/tel:+91 9877666442">
                                                            <i class="fas fa-phone fa-flip-horizontal fa-fw"></i>
                                                            <span class="ps-2"><?php if(isset($simple['contact_no']) && !empty($simple['contact_no'])){ echo $simple['contact_no']; }?></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?=base_url('public/assets');?>/tel:+91 9877666442">
                                                            <i class="fas fa-envelope fa-flip-horizontal fa-fw"></i>
                                                            <span class="ps-2"><?php if(isset($simple['email_id']) && !empty($simple['email_id'])){ echo $simple['email_id']; }?></span>
                                                        </a>
                                                    </li>
                                                   
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <?php
                        }
                               } 
                            }else{
                                echo 'No data found';
                            }   
                        ?>      
                       
                        <div class="row">
                        <div class="col-12 text-center mt-4">
                        <ul class="pagination justify-content-center mb-0">
                        </ul>
                        </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </section>
<!--=================================
Simple search results -->
<!--=================================
Footer-->
<!--=================================
Footer-->
<?= $this->include('footer') ?>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"> </script>

    <script>
        $('#morlessbutton').click(function() {
            $('.moretext').slideToggle();
            if ($('#morlessbutton').text() == "View Contact details") {
                $(this).text("View Contact details")
            } else {
                $(this).text("View Contact details")
            }
        });
    </script>
    

    
<script>
  $(document).ready(function () {
    $('#paginationpage').on('change', function () {  
      var page= this.value;
         var request= '<?php if(!empty($url)){ echo $url;}?>';
         var url= request+'?pages='+page;
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
    var items = $(".search-results-body .search-result-list");
    var numItems = items.length;
    var perPage =<?= $perpageResule ?>;
    items.slice(perPage).hide();
    $('.pagination').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });
      </script>

    
      
      