<?= $this->include('header') ?>
<!--=================================
Header -->

<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?=base_url('/public/assets');?>/images/bg-slider/inner-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative about-banner inner-slider-heading-main">
        <h2>Easy Healthcare Delivery Solutions</h2>
        <p>Now offering its advanced range of equipments, devices and solutions on docladder.com</p>
      </div>
      </div>
    </div>
</section>
<!--=================================
Slider Banner -->

<section class="space-ptb bg-light-white equipment-product" id="equipment-products">
  <div class="container">
    <div class="row">
      <!--=================================
      sidebar -->
      <div class="col-lg-3">
        <div class="sidebar">
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Price</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#Price" role="button" aria-expanded="false" aria-controls="Price"> <i class="fas fa-chevron-down"></i> </a>
              
            </div>
            <div class="collapse show" id="Price">
              <div class="widget-content-price">
               <p>Custom Price In INR</p>
          
                <div class="search mb-3">
                 <input class="form-control"  name="minimum_price" id="minimum_price" type="text" placeholder="Minimum Price">
                </div>
                <div class="search">
                  
                   <input class="form-control" name="maximum_price" id="maximum_price" type="text" placeholder="Maximum Price">
                </div>
                <p class="mb-0 mt-2">
                
                <a id="myBtn" style="cursor: pointer;">Apply</a>
                
      </p>
      </form>
              </div>
            </div>
          </div>
          <div class="widget">
                <div class="widget-title widget-collapse">
                  <h6>Brand</h6>
                  <a class="ms-auto" data-bs-toggle="collapse" href="#Brand" role="button" aria-expanded="false" aria-controls="Brand"> <i class="fas fa-chevron-down"></i> </a>
                </div>
                <div class="collapse show" id="Brand">
                    <div class="w-100 mt-3">
                        <div class="addto-search">
                            <form action="#">
                                <div class="form-input brand-search search">
                                    <input class="keyword form-control" type="text" placeholder="Search...">
                                    <i class="fa fa-search"></i>
                                    <!--<button class="search-button"><i class="fa fa-search"></i></button>-->
                                </div>
                            </form>
                        </div>
                        <div class="addto-playlists widget-content">
                            <ul class="list-unstyled">
                                <li class="form-check">
                                    <label for="random-1" class="playlist-name">
                                    <input id="random-1" type="checkbox" name="" value="Apple" class="common_selector brand">
                                        Apple
                                    </label>
                                </li>
                                <li class="form-check">
                                    <label for="random-2" class="playlist-name"> 
                                        <input id="random-2" type="checkbox" name="" value="Accushot"  class="common_selector brand">
                                        Accushot
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="widget">
                <div class="widget-title widget-collapse">
                  <h6>Location</h6>
                  <a class="ms-auto" data-bs-toggle="collapse" href="#country" role="button" aria-expanded="false" aria-controls="Brand"> <i class="fas fa-chevron-down"></i> </a>
                </div>
                <div class="collapse show" id="country">
                    <div class="w-100 mt-3">
                        <div class="addto-search">
                            <form action="#">
                                <div class="form-input brand-search search">
                                    <input class="keyword form-control" type="text" placeholder="Search...">
                                    <i class="fa fa-search"></i>
                                    <!--<button class="search-button"><i class="fa fa-search"></i></button>-->
                                </div>
                            </form>
                        </div>
                        <div class="addto-playlists widget-content">
                            <ul class="list-unstyled">
                              <?php if(!empty($states)){
                                foreach($states as $st){
                                ?>
                               
                                <li class="form-check checkbox">
                                    <label for="random-1" class="playlist-name">
                                    <input id="random-1" type="checkbox" name="" value="<?=$st['id'];?>" class="common_selector state">
                                     <?=$st['name'];?>
                                    </label>
                                </li>
                                <?php   
                                }
                              }
                              ?>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!--=================================
      sidebar -->
      <div class="col-lg-9 ps-lg-4">
        <div class="row job-filter mb-3 d-sm-flex align-items-center">
            <div class="col-12">
              <div class="products-heading"> 
                <h5 class="mb-0 me-2 me-lg-4">Space</h5>
                <h6 class="mb-0" style="display:none;">( showing 24 out of 184 products )</h6>
                </div>
            </div>
        </div>
        <div class="list-wrapper">
        <div class="row filter_data">
        
         <div class="row justify-content-center">
        <div class="col-12 text-center">
        <ul class="pagination mt-3">
        </ul>
        </div>
        </div>
        
        </div>
       


        </div>
      </div>
    </div>
  </div>
</section>
<style>
#loading
{
 text-align:center; 
 background: url('<?php echo base_url(); ?>/assets/images/avatar-green.gif') no-repeat center; 
 height: 150px;
}
</style>

<!--=================================
Footer-->
<?= $this->include('footer') ?>

<!--=================================
Footer-->
<!-- // filter search -->

<script src = "https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"> </script>
<script>
  $(document).ready(function(){
    filter_data(1);
    $("#myBtn").click(function(){
     var maximum_price = $('#maximum_price').val();
      var minimum_price = $('#minimum_price').val();
      filter_data(1);
    });

    function filter_data(page)
    {
      $('.filter_data').html('<div id="loading" style="" ></div>');
      var brand = get_filter('brand');
      var country = get_filter('country');
      var state = get_filter('state');
      var maximum= maximum_price.value;
      var minimum= minimum_price.value; 
      var url= '<?php echo base_url('InfrastructureBuy/product_filter');?>';
      $.ajax({
            url: url,
            method:"POST",
            dataType:"JSON",
            data:{ brand:brand, country:country, state:state, minimum:minimum, maximum:maximum},
            success:function(data)
            {
               $('.filter_data').html(data);
               pages();
            }
        })
    }
    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    //price
    function get_price(price){
      $("#myBtn").click(function(){
        var filters=[];
        var filters = $("#maximum_price").val();
        var filters = $("#minimum_price").val(); 
        return filters;
});

    }

    function pages(){
    var items = $(".list-item");
    
    var numItems = items.length;
    var perPage = 12;
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
    
    }

    $('.common_selector').click(function() {
    
    filter_data();
    });

  });
  </script>

<!--=================================
Javascript -->
    <script>
        (function($){
          $(".keyword").on('keyup', function(e) {
            var $this = $(this);
            var exp = new RegExp($this.val(), 'i');
            $(".addto-playlists li label").each(function() {
              var $self = $(this);
              if(!exp.test($self.text())) {
                $self.parent().hide();
              } else {
                $self.parent().show();
              }
            });
          });
        })(jQuery);
    </script>

    <!-- Search Filter Checkbox JS -->
    <script>
        (function($){
          $(".keyword").on('keyup', function(e) {
            var $this = $(this);
            var exp = new RegExp($this.val(), 'i');
            $(".addto-playlists li label").each(function() {
              var $self = $(this);
              if(!exp.test($self.text())) {
                $self.parent().hide();
              } else {
                $self.parent().show();
              }
            });
          });
        })(jQuery);
    </script>


