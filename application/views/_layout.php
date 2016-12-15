
<!DOCTYPE html>

<html>

    <head>

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title -->
        <title>Home - <?php echo $title;?></title>

        <?php $this->load->view('partials/header'); ?>

    </head>


    <body>

        <!-- Container -->
        <div class="container " style="width:100% !important;">

            <!-- Header -->
            <?php $this->load->view('partials/top-header'); ?>
            <!-- /Header -->


            <!-- Content -->
            <div class="row content">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumbs">
                        <p><a href="<?php echo base_url();?>">Home</a> <i class="icons icon-right-dir"></i><?php echo $ptitle;?> </p>
                    </div>
                </div>

                <!-- Main Content -->
                <section class="main-content col-lg-8 col-md-8 col-sm-8 col-lg-push-2 col-md-push-2 col-sm-push-2">


                    <?php $this->load->view($content); ?>


                </section>
                <!-- /Main Content -->
                 



                <!-- Sidebar -->
                <?php $this->load->view('partials/categories'); ?>
                <!-- /Sidebar -->
             
            </div>
            <!-- /Content -->
              


            <!-- Banner -->
              <?php $this->load->view('partials/bads'); ?>

            <!-- /Banner -->


            <!-- Footer -->
            <?php $this->load->view('partials/top-footer'); ?>

            <!-- Footer -->


            <div id="back-to-top">
                <i class="icon-up-dir"></i>
            </div>

        </div>
        <!-- Container -->



        <?php $this->load->view('partials/footer'); ?>
    </body>

</html>

