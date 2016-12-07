<?php $this->load->view('partials/header'); ?>
<title>Home - Login</title>
<body>

    <!-- Container -->
    <div class="container">

        <!-- Header -->
        <header class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <!-- Top Header -->
                <div id="top-header">

                    <div class="row">

                        <nav id="top-navigation" class="col-lg-7 col-md-7 col-sm-7">
                            <ul class="pull-left">
                                <li><a class="btn btn-primary" href="<?php echo base_url(); ?>">Home</a></li>                              
                                <li><a class="btn btn-primary" href="<?php echo base_url() . '/home/about'; ?>">About Us</a></li>
                                <li><a class="btn btn-primary" href="<?php echo base_url() . '/home/contact'; ?>">Contact</a></li>
                            </ul>
                        </nav>

                        <nav class="col-lg-5 col-md-5 col-sm-5">
                            <ul class="pull-right">
                                <li class="purple"><a href="<?php echo base_url(); ?>home/postad/" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Post Ad </a>

                                </li>
                                <li><a href="<?php echo base_url(); ?>home/postobituary/" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Post Obituary</a></li>
                            </ul>
                        </nav>

                    </div>

                </div>
                <!-- /Top Header -->



                <!-- Main Header -->
                <div id="main-header">

                    <div class="row">

                        <div id="logo" class="col-lg-4 col-md-4 col-sm-4">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo3.png" alt="Logo"></a>
                        </div>


                    </div>

                </div>
                <!-- /Main Header -->





            </div>

        </header>
        <!-- /Header -->


        <!-- Content -->
        <div class="row content">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="breadcrumbs">
                    <p><a href="#">Home</a> <i class="icons icon-right-dir"></i> Login</p>
                </div>
            </div>

            <!-- Main Content -->
            <section class="main-content col-lg-12 col-md-12 col-sm-12">


                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3">

                        <div class="carousel-heading no-margin">
                            <h4>Login</h4>
                        </div>

                        <div class="page-content">

                            <div class="box-wrapper">
                                <div class="alert align-center alert-danger"><i class="fa fa-exclamation-circle"></i> <span id="error_message"> adadada</span></div>
                                <div class="iconic-input">
                                    <input type="text" placeholder="Email" id="uemail">
                                    <i class="icons icon-user-3"></i>
                                </div>
                                <div class="iconic-input">
                                    <input type="password" placeholder="Password" id="upass">
                                    <i class="icons icon-lock"></i>
                                </div>

                                <br>
                                <div class="pull-left">
                                    <input type="submit" class="orange" id="Login" value="Login"> Or 
                                     <a href="<?php echo base_url();?>auth/register/">Register</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#">Forgot your password?</a>
                                    <br>

                                </div>
                                <br class="clearfix">
                            </div>
                        </div>

                    </div>

                </div>


            </section>
            <!-- /Main Content -->




        </div>
        <!-- /Content -->
        <div id="back-to-top">
            <i class="icon-up-dir"></i>
        </div>
        <?php $this->load->view('partials/top-footer_1'); ?>
        <?php $this->load->view('partials/footer'); ?>
    </div>
    <!-- Container -->

    <script>
        $(function () {
            error_message = '';
            error = '';
            base_url = "<?php echo base_url(); ?>";
            $('.alert').hide();
            $('#Login').click(function () {
                error_message = $('#error_message');
                error = $('.alert-danger');
                username = $('#uemail').val();
                password = $('#upass').val();

                if (username === '') {
                    error_message.text('Please enter your email');
                    error.show();
                } else if (password === '') {
                    error_message.text('Please enter your Password');
                    error.show();
                } else if (!validateEmail(username)) {
                    error_message.text('Please enter a valid email e.g. a@k.com');
                    error.show();
                } else {
                    login(username, password);
                }
            });

            function login(u, p) {
                 login_sess ="<?php echo $this->session->userdata('browsing_cache')?>";
                $.post(base_url + "auth/authenticate", {username: u, password: p}, function (resp) {
                   
                    if (resp === 'success') {          
                         if(login_sess!==''){
                             window.location.href ="<?php echo $this->session->userdata('browsing_cache');?>";
                         }else{
                        window.location.href = base_url + "home/userdashboard/";
                       }
                
                    } else {
                        error_message.text('Invalid Username / Password');
                        error.show();
                    }
                });
            }

            function validateEmail($email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return emailReg.test($email);
            }
        });

    </script>


