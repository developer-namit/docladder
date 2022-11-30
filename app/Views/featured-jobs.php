<?= $this->include('header') ?>

<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?= base_url('public/assets');?>/images/bg-slider/inner-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative inner-slider-heading-main">
        <h1>Featured Jobs</h1>
      </div>
      </div>
    </div>

</section>
<!--=================================
Slider Banner -->
<style>
    .form-control[select] {
    font-size: 16px;
    line-height: 25px;
    color: #747070;
    font-weight: 400;
}
.job-search-item select {
    padding-left: 50px;
    height: 34px;
    -webkit-box-shadow: none;
    box-shadow: none;
    border: none;
}
.main-form-input {
    border: 1px solid #00000040;
    margin-bottom: 0;
    border-radius: 3px;
}

#skills {
    width: 100%;
    padding-left: 3rem;
}
    
</style>

<!--=================================
job-grid -->
<section class="space-ptb bg-light-white recent-jobs" id="equipments">
  <div class="container">
    <div class="row">
        
      <div class="col-md-12">
        <!--=================================
        right-sidebar -->
        <div class="job-search-field job-search-field-02">
          <div class="job-search-item">
            <form class="row basic-select-wrapper justify-content-center" method='get' id="searchForm">
                      <div class="col-lg-12">
                        <div class="box-shadow search-main-wrapper">
                           <div class="row">
                             <div class="col-lg-10">
                               <div class="row">
                                 <div class="col-lg-5">
                                 <div class="form-group mt-0">
                                       <div class="form-group-search">
                                           <div class="form-group main-form-input" >
                                                 <div class="position-relative left-icon" >
                                                 <input type="text" name="skills" id="skills"  autocomplete="off" multiple>
                                                     <i class="fas fa-pencil-alt" ></i>
                                                 </div>
                                             </div>
                                       </div>
                                 </div>
                                 </div>
                      
                                 <div class="col-lg-5">
                                 <div class="form-group mt-0">
                                       <div class="form-group-search">
                                           <!-- <label class="form-label">Location</label> -->
                                           <div class="form-group main-form-input" >
                                                 <div class="position-relative left-icon slt-location" >
                                                     <!--<input type="text" class="form-control" name="job_title" placeholder="Location" autocomplete="off" >-->
                                                      <select class="form-control jquery-select2" name="location[]" id="location" autocomplete="off" multiple>
                                          <option disabled>Select Location...</option>
                                          <option value="NI">Anywhere in North India</option>
                                              <option value="EI">Anywhere in East India</option>
                                              <option value="WI">Anywhere in West India</option>
                                              <option value="SI">Anywhere in South India</option> 
                                              <?php if(!empty($margedata)){
                                                foreach($margedata as $val){?>
                                              <option value="<?= $val['name'];?>"><?= $val['name'];?></option>
                                              <?php if(!empty($val['city'])){
                                                foreach($val['city'] as $cities){?>
                                                <option value="<?= $cities['name'];?>"><?= $cities['name'];?></option>
                                                 <?php }} }} ?>
                                                </select> 
                                                     
                                                     
                                                     <i class="fas fa-map-marker-alt" style="user-select: auto;"></i>
                                                 </div>
                                             </div>
                                       </div>
                                 </div>
                                 </div>
                                   
                                 </div>
                             </div>
                             <div class="col-lg-2">
                               <div class="form-group">
                                 <div class="mt-2 mt-lg-0 text-center">
                                      <a href="" class="searched-btn">
                                          <input class="btn btn-secondary main-btn" type="submit" value="Search"></a>
                                 </div>
                            </div>
                             </div>
                           </div>
                         </div>
                      </div>
                
            </form>
          </div>
        </div>
        <div id="recent-jobs">
            <div class="row mt-3">
                 <?php if(!empty($featuredjob)){
                                foreach($featuredjob as $val){?>
                <div class="col-lg-4 mb-4">
                    <!-- Freelance -->
                    <div class="job-list">
                      <div class="job-list-div">
                        <div class="job-list-logo">
                          <img class="img-fluid" src="<?=base_url('/public/assets');?>/images/marketing.png" alt="">
                          <!-- <i class="flaticon-doc"></i> -->
                        </div>
                      </div>
                      <div class="job-list-details">
                        <div class="job-list-info">
                          <div class="job-list-title">
                            <ul class="list-unstyled">
                              <li><span class="date-posted"><i class="far fa-calendar pe-1"></i><?= $val['created_at'];?></span></li>
                              <li><h5 class="mb-0"><a href="#"><?= $val['skills'];?></a></h5></li>
                            </ul>
                          </div>
                          <div class="job-list-option">
                            <ul class="list-unstyled">
                              
                              <li><a href=""><?= $val['company_name'];?></a> </li>
                              
                              <li class="location"><i class="fas fa-map-marker-alt pe-1"></i><span><?= $val['location'];?></span></li>
                              <li class="ctc"><i class="fas fa-rupee-sign pe-1"></i><span>Annual CTC: <?= $val['min_experience'];?> to <?= $val['max_experience'];?> Lacs</span></li>
                              <li class="detail-link"><a href="<?= base_url('jobdescription/'.$val['id']);?>">View Details</a></li></ul>
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
        <div class="row justify-content-center">
        <div class="col-12 text-center">
        <ul class="pagination mt-3">
            <?php if(!empty($pagination)){ echo $pagination;}?>
        </ul>
        </div>
        </div>
  </div>
</section>
<!--=================================
job-grid -->

<!--=================================
Footer-->
<?= $this->include('footer') ?>
<!--=================================
Footer-->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multiselect-widget/3.0.1/jquery.multiselect.filter.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multiselect-widget/3.0.1/jquery.multiselect.min.js"></script>

<script>
$(".jquery-select2").select2({
	closeOnSelect : false,
	placeholder : "Location",
	allowHtml: true,
	allowClear: true,
	tags: true // создает новые опции на лету
});



$(".basic-select").select2({
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

 <script>
$(document).ready(function () {
  $("#searchForm").submit(function (event) {
    event.preventDefault();
  
    var locations= $("#location").val();
    var name=$("#skills").val();
    var replaced = $.trim(name);
  
    var url= '<?php echo base_url('FeaturedJob');?>/'+replaced+'-job-in-'+locations+'';
    
    var asd= url.replaceAll(' ', '-');
  
    window.location.href = asd;

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


var url= '<?php echo base_url('RecentJobs/getskills');?>';  
$("#skills").autocomplete({
 // minLength: 1,
 source: function( request, response ) {
  var searchText = extractLast(request.term);

  // Fetch data
  $.ajax({
   url: url,
   type: 'post',
   dataType: "json",
   data: {
    // search: request.term, request: 1
    search: searchText
   },
   success: function( data ) {
    response( data );
   }
  });
 },
 select: function (event, ui) {
  console.log(this.value);
    // Set selection
    //$('#skills').val(ui.item.label); // display the selected text
    // remove the current input
    var terms = split( this.value );
                terms.pop();
                terms.push( ui.item.value );
                terms.push( "" );
                this.value = terms.join( ", " );
    return false;
 },
 focus: function(event, ui){
   // $("#skills").val( ui.item.label );
    // $( "#selectuser_id" ).val( ui.item.value );
    return false;
  },
});
});
</script>