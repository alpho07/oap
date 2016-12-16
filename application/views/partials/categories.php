<style>
      .fix-search {
    position: fixed;
    top: 10px;
   
  }

</style>
<aside class="sidebar col-lg-2 col-md-2 col-sm-2  col-lg-pull-8 col-md-pull-8 col-sm-pull-8">

    <!-- Categories -->
    <div class="row sidebar-box purple">

        <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="sidebar-box-heading">
                <i class="icons icon-folder-open-empty"></i>
                <h4>Categories</h4>
            </div>

            <div class="sidebar-box-content">
               <?php $menu = & get_instance();
                       $menu->menuBuilder();
                       ;?>
            </div>

        </div>

    </div>
    <!-- /Categories -->


    <?php $this->load->view('partials/ads_left'); ?>

</aside>

<!-- Sidebar -->
<aside class="sidebar right-sidebar col-lg-2 col-md-2 col-sm-2">
<?php $this->load->view('partials/ads_right'); ?>

</aside>
<!-- /Sidebar -->

<script>
$(function() {

    var $sidebar   = $(".sidebar-box-content1"), 
        $window    = $(window),
        offset     = $sidebar.offset(),
        topPadding = 25;

    $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding
            });
        } else {
            $sidebar.stop().animate({
                marginTop: 0
            });
        }
    });
    
 


    
});
</script>