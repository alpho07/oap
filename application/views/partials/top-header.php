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
            $.post(base_url + "auth/authenticate", {username: u, password: p}, function (resp) {
                if (resp === 'success') {
                    window.location.href = base_url + "home/userdashboard/";
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
<header class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">

        <!-- Top Header -->
        <div id="top-header" class="style4">

            <div class="row">

                <nav id="top-navigation" class="col-lg-7 col-md-7 col-sm-7">
                    <ul class="pull-left">
                         <li><a href="<?php echo base_url(); ?>">Home</a></li>

                        <li><a href="<?php echo base_url(); ?>">About Us</a></li>
                        <li><a href="<?php echo base_url(); ?>home/contact">Contact</a></li>
                    </ul>
                </nav>

                <nav class="col-lg-5 col-md-5 col-sm-5">

                    <ul class="pull-right">

                        <?php if ($this->session->userdata('user_id') == TRUE) { ?>
                            <li><span><i class="icons icon-user-3"></i> <?php echo $this->session->userdata('username'); ?></span></li>
                            <li class="purple"><a href="<?php echo base_url().'home/userdashboard';?>" class="purple"><i class="fa fa-das"></i> Dashboard</a></li>
                       
                            <li class="purple pull-right"><a href="<?php echo base_url() . 'home/logout'; ?>"><i class="fa fa-power-off"></i> Logout</a>

                            <?php } else { ?>
                                <ul class="pull-right">
                                    <li class="purple"><a href="#" class="btn btn-warning"><i class="icons icon-user-3"></i> Login</a>
                                        <ul id="login-dropdown" class="box-dropdown">
                                            <li>
                                                <div class="box-wrapper">
                                                    <h4>LOGIN</h4>
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
                                                        <input type="submit" class="orange" id="Login" value="Login">
                                                    </div>
                                                    <div class="pull-right">
                                                        <a href="#">Forgot your password?</a>
                                                        <br>

                                                    </div>
                                                    <br class="clearfix">
                                                </div>
                                                <div class="footer">

                                                </div>
                                            </li>
                                        </ul>
                                    </li>


                                    <li><a class="btn btn-primary" href="<?php echo base_url(); ?>home/postad"><i class="icons icon-plus-1"></i> Post Your Ad</a></li>
                                    <li><a class="btn btn-success" href="<?php echo base_url(); ?>home/postobituary"><i class="icons icon-plus-1"></i> Post Obituary</a></li>
                                <?php } ?>
                            </ul>
                            </nav>

                            </div>

                            </div>
                            <!-- /Top Header -->



                            <!-- Main Header -->
                            <div id="main-header" class="style4">

                                <div class="row">

                                    <div id="logo" class="col-lg-4 col-md-4 col-sm-4">
                                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo3.png" alt="Logo"></a>
                                    </div>
                                      <?php if ($this->session->userdata('user_id') == TRUE) { ?>
                                         <nav id="middle-navigation" stclass="col-lg-8 col-md-8 col-sm-8">
                                             <ul class="pull-right">
                                       
                                              <li><a class="btn btn-primary" href="<?php echo base_url(); ?>home/postada"><i class="icons icon-plus-1"></i> Post Your Ad</a></li>
                            <li><a class="btn btn-success" href="<?php echo base_url(); ?>home/postobituarya"><i class="icons icon-plus-1"></i> Post Obituary</a></li>
                                        </ul>
                                    </nav>
                                      <?php }?>

                                </div>

                            </div>
                            <!-- /Main Header -->


                            <!-- Main Navigation -->
                            <nav id="main-navigation" class="style4">
                                <ul>
                                    <li class="purple">
                                        <a href="<?php echo base_url(); ?>">
                                            <i class="icons icon-location-7"></i>
                                            <span class="nav-caption">Home</span>
                                            <span class="nav-description">&nbsp;</span>
                                        </a>
                                    </li>
                                    <li class="purple">
                                        <a href="<?php echo base_url(); ?>home/about">
                                            <i class="icons icon-location-7"></i>
                                            <span class="nav-caption">About Us</span>
                                            <span class="nav-description">&nbsp;</span>
                                        </a>
                                    </li>
                                    <li class="purple">
                                        <a href="<?php echo base_url(); ?>home/about">
                                            <i class="icons icon-location-7"></i>
                                            <span class="nav-caption">Contact Us</span>
                                            <span class="nav-description">&nbsp;</span>
                                        </a>
                                    </li>




                                </ul>

                                <div id="search-bar" >

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <table id="search-bar-table">
                                            <tr>
                                                <td class="search-column-1">
                                                    <p><span class="grey">Popular Searches:</span> <a href="#">Obituaries</a>, <a href="#">Caskets</a>, <a href="#">Pathologists</a>, <a href="#">Hospitals</a>, <a href="#">Flowers</a></p>
                                                    <input type="text" placeholder="Enter your keyword">
                                                </td>
                                                <td class="search-column-2">
                                                    <p class="align-right"><a href="#">&nbsp;</a></p>
                                                    <select class="chosen-select-search">
                                                        <option>Obituaries</option>
                                                        <option>Caskets</option>
                                                        <option>Pathologists</option>
                                                        <option>Hospitals</option>
                                                        <option>All Categories</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="search-button">
                                        <input type="submit" value="">
                                        <i class="icons icon-search-1"></i>
                                    </div>
                                </div>

                            </nav>
                            <!-- /Main Navigation -->

                            </div>

                            </header>