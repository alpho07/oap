<style type="text/css">
  
    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    /* On mouse-over, add a deeper shadow */
    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    
       .product-image img { 
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;
}
</style>
<div class="row">

    <!-- Heading -->
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="carousel-heading">
            <h4>LATEST OBITUARIES</h4>
        </div>

    </div>
    <!-- /Heading -->

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row subcategories" >
            <?php foreach ($obituaries as $ob): ?>

                <!-- Subcategory -->
                <div class="col-lg-fifth col-md-fifth col-sm-fifth subcategory" >

                    <a class="product-image" href="<?php echo base_url() . 'home/loadProfile/' . $ob->id . '/' . str_replace(" ", "-", $ob->obtitle); ?>">
                        <img src="<?php echo base_url() . $ob->image_path; ?>" alt="<?php echo $ob->obtitle; ?>"  style="height:180px !important;"  /></a>
                    <div class="product-info card">
                        <h6><a href="<?php echo base_url() . 'home/loadProfile/' . $ob->id . '/' . str_replace(" ", "-", $ob->obtitle); ?>"><span class="price"><?php echo $ob->obtitle; ?></span></a></h6>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>

        <a href="<?php echo base_url(); ?>home/allobs" class="pull-right btn btn-warning" style="margin: 20px;">View More <i class="fa fa-arrow-right"></i></a>
    </div>

</div>

<!-- Heading -->
<div class="col-lg-12 col-md-12 col-sm-12">

    <div class="carousel-heading">
        <h4>LATEST ADS</h4>
    </div>

</div>
<!-- /Heading -->

<div class="row"> 
    <?php foreach ($featured as $ob): ?>
        <div class="col-lg-3 col-md-3 col-sm-3 product ">

            <div class="product-image ">
                <a href="<?php echo base_url() . 'home/loadsingle/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>">
                    <img src="<?php echo base_url() . $ob->image_path; ?>" alt="<?php echo $ob->title; ?>" width="160px" height="160px"/>
                </a>

            </div>

            <div class="product-info card">
                <h5><a href="<?php echo base_url() . 'home/loadsingle/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>"><?php echo mb_strimwidth($ob->title , 0, 22, "..."); ?></a></h5>
                <span class="price"><?php echo $ob->price; ?></span>
            </div>

        </div>
    <?php endforeach; ?>
    <a href="<?php echo base_url(); ?>home/all" class="pull-right btn btn-success" style="margin: 20px;">View More <i class="fa fa-arrow-right"></i></a>
</div>
