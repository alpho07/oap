<!DOCTYPE>
<html>

    <title><?php echo $title; ?></title>

    <?php $this->load->view('partials/header'); ?>
    <style type="text/css">
        #exTab1 .tab-content {

            padding : 5px 15px;
        }

        td{
            vertical-align: middle !important;
            text-align: center !important;
            padding: 0px !important;
        }
        
        table-hover td{
            text-align: left;
        }

    </style>
    <body>

        <!-- Container -->
        <div class="container" style="width:100% !important;">

            <!-- Header -->
            <header class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- Top Header -->
                    <div id="top-header">

                        <div class="row">

                            <nav id="top-navigation" class="col-lg-7 col-md-7 col-sm-7">
                                <ul class="pull-left">
                                    <li><a class="btn btn-primary" href="<?php echo base_url(); ?>">Home</a></li>
                                    <li><a class="btn btn-primary" href="<?php echo base_url(); ?>">About</a></li>
                                    <li><a class="btn btn-primary" href="<?php echo base_url(); ?>">Contact</a></li>
                                     <?php if ($this->session->userdata('user_id') == TRUE && $this->session->userdata('type') > 0) { ?>
                        <li><?php if ($this->uri->segment(2) !== 'admindashboard') { ?>                            
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>home/userdashboard"><i class="fa fa-dashboard"></i> My User Dashboard</a>
                            <?php } else { ?>
                                <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/admindashboard"><i class="fa fa-dashboard"></i> Admin Dashboard</a>

                            <?php } ?></li>
                        <?php }else{echo '';};?>

                                </ul>
                            </nav>

                            <nav class="col-lg-5 col-md-5 col-sm-5">
                                <ul class="pull-right">
                                    <li style="width:150px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></li>
                                    <li><a href="#" ><i class="icons icon-user-3"></i> <?php echo $this->session->userdata('username'); ?></a></li>
                                    <li><a href="<?php echo base_url(); ?>home/logout" class="btn btn-danger pull-right"><i class="fa fa-power-off"></i> Logout</a></li>

                                    <li><a href="<?php echo base_url(); ?>home/postada" class="btn btn-primary"><i class="icons icon-plus-1"></i> Post Ad</a></li>
                                    <li><a href="<?php echo base_url(); ?>home/postobituarya" class="btn btn-primary"><i class="icons icon-plus-1"></i> Post Obituary</a></li>
                                </ul>
                            </nav>

                        </div>

                    </div>
                    <!-- /Top Header -->





                </div>

            </header>
            <!-- /Header -->


            <!-- Content -->
            <div class="row content">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumbs">
                        <p><a href="<?php echo base_url(); ?>">Home</a> <i class="icons icon-right-dir"></i> <?php echo $ptitle; ?></p>
                    </div>
                </div>

                <!-- Main Content -->
                <section class="main-content col-lg-12 col-md-12 col-sm-12">

                    <div class="row">

                        <!-- Heading -->
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div class="carousel-heading">
                                <h4>Admin Dashboard &#187 Users</h4>
                                <div class="carousel-arrows">
                                    <a href="#"><i class="icons icon-reply"></i></a>
                                </div>
                            </div>

                        </div>
                        <!-- /Heading -->

                    </div>	


                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">


                            <div id="exTab1">	
                            <?php $this->load->view('pages/admin/admin_menu');?>

                                <div class="tab-content clearfix">
                                    <div class="tab-pane active" id="1a">
                                        <table id="example myTable" class="display1234" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th style="width:10px !important;"><input type="checkbox" value="" style="display:inline-block"/></th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Type</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($ads as $ad):
                                                    ?>
                                                    <tr >
                                                        <td ><?php echo $i; ?></td>
                                                        <td><input style="display: inline-table !important" type="checkbox" value=""/></td>
                                                        <td><?php echo $ad->name; ?></td>
                                                        <td><?php echo $ad->phone; ?></td>
                                                        <td><?php echo $ad->email; ?></td>
                                                        <td> <?php if ($ad->user_type == '1') {
                                                            echo 'Administator';
                                                        }else{
                                                            echo 'Client';
                                                        }
                                                        ?>
                                                              
                                                           </td>
               
                                                </tr>
                                                <?php
                                                $i++;
                                            endforeach;
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>              
                          

                 
                        
                       
                    </div>
            </div>



        </div>

    </div>


</section>
<!-- /Main Content -->

</div>
<!-- /Content -->

<script>
    $(document).ready(function () {
        base_url = "<?php echo base_url(); ?>";
        loadTitles();
        function loadTitles() {
            $('.display1234').dataTable();
        }
    });
</script>






<div id="back-to-top">
    <i class="icon-up-dir"></i>
</div>

</div>
<?php $this->load->view('partials/footer'); ?>


</body>

</html>