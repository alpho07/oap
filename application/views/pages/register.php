<?php $this->load->view('partials/header'); ?>
<style type="text/css">
    .error{
        padding: 0em !important;
        margin: 0px !important;
        color:red !important;
        font-weight: normal !important;
        border: red !important;
        -webkit-border: red !important;
    }
    div.error{
        display:none !important;
    }
    input.error,select.error,textArea.error {
        border: 1px solid red !important ;
    }
</style>
<title>Home - Register</title>
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
                    <p><a href="#">Home</a> <i class="icons icon-right-dir"></i> Register</p>
                </div>
            </div>

            <!-- Main Content -->
            <section class="main-content col-lg-12 col-md-12 col-sm-12">


                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3">
                      <form id="Registration">
                        <div class="carousel-heading no-margin">
                            <h4>Register</h4>
                        </div>

                        <div class="page-content">
                         <div class="alert align-center alert-danger"><i class="fa fa-exclamation-circle"></i> <span id="error_message"> adadada</span></div>

                            <div class="box-wrapper">
                                <div class="iconic-input">
                                    <input type="text" placeholder="Name" id="fullname" name="fullname">
                                    <i class="icons icon-user-3"></i>
                                </div>

                                <div class="iconic-input">
                                    <input type="text" placeholder="Email" id="email" name="email">
                                    <i class="icons icon-mail"></i>
                                </div>

                                <div class="iconic-input">
                                    <input type="text" placeholder="Phone e.g. 0700 000 000" id="phone" name="phone">
                                    <i class="icons icon-phone"></i>
                                </div>
                                <div class="iconic-input">
                                    <input type="password" placeholder="Password" id="upass" name="password">
                                    <i class="icons icon-lock"></i>
                                </div>
                                
                                <div class="iconic-input">
                                    <input type="password" placeholder="Confirm Password" id="cpass">
                                    <i class="icons icon-lock"></i>
                                </div>

                                <br>
                                <div class="pull-left">
                                    <input type="button" class="btn btn-warning btn-lg" id="Register" value="Register"> Or 
                                    <a href="<?php echo base_url(); ?>auth/authorize/">Login</a>
                                </div>


                            </div>
                            <br class="clearfix">
                        </div>
                    </form>
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
        $('#Register').click(function () {
            error_message = $('#error_message');
            error = $('.alert-danger');
            user = $('#fullname').val();
            email = $('#email').val();
            phone = $('#phone').val();
            password = $('#upass').val();
            cpassword = $('#cpass').val();

            if (user === '') {
                error_message.text('Please enter your name');
                error.show();
            } else if (email === '') {
                error_message.text('Please enter your email');
                error.show();
            } else if (phone === '') {
                error_message.text('Please enter your phone');
                error.show();
            }else if (password === '') {
                error_message.text('Please enter your Password');
                error.show();
            }else if (!$.isNumeric(phone)) {
                 error_message.text('Please enter digits for Phone Number');
                error.show();
            }else if (cpassword === '') {
                error_message.text('Please enter your Password Confirmation');
                error.show();
            }else if (!validateEmail(email)) {
                error_message.text('Please enter a valid email e.g. a@k.com');
                error.show();
            } else if (password !==cpassword) {
                error_message.text('Passwords do not match');
                error.show();
            } else if (password.length < 3) {
                error_message.text('Password too short must be atlest 3 characters');
                error.show();
            } else if (phone.length < 10 || phone.length > 10) {
                error_message.text('Invalid Phone Number, Atleast 10 Digits');
                error.show();
            } else {
                Register();
            }
        });

        function Register() {
            $.post(base_url + "register/newuser", $('#Registration').serialize(), function (resp) {
              
                     $.Zebra_Dialog("Hello <strong>"+ $('#fullname').val()+ "</strong> You have been successfully registered, redirecting to Login page...", {
                'type': 'info',
                'title': 'Registration Successfull',
                'buttons': [
                    {caption: 'Okey', callback: function () {
                         window.location.href = base_url + "auth/authorize/";

                        }}
                ]
            });
        }).fail(function(){
            error_message.text('An error occured while registering, try later!');
                    error.show();
        });

               
           
            }
        

        function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            return emailReg.test($email);
        }
    });

</script>


