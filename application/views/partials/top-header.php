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
                        <li><a class="btn btn-success"  href="<?php echo base_url(); ?>">Home</a></li>

                        <li><a class="btn btn-success" href="<?php echo base_url(); ?>home/about">About</a></li>
                        <li><a class="btn btn-success" href="<?php echo base_url(); ?>home/contact">Contact</a></li>
                        <?php if ($this->session->userdata('user_id') == TRUE && $this->session->userdata('type') > 0) { ?>
                            <li><?php if ($this->uri->segment(2) == 'admindashboard') { ?>                            
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>home/userdashboard"><i class="fa fa-dashboard"></i> My User Dashboard</a>
                            <?php } else { ?>
                                <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/admindashboard"><i class="fa fa-dashboard"></i> Admin Dashboard</a>

                            <?php } ?></li>
                        <?php } else {
                            echo '';
                        }; ?>
                    </ul>
                </nav>

                <nav class="col-lg-5 col-md-5 col-sm-5">

                    <ul class="pull-right">

<?php if ($this->session->userdata('user_id') == TRUE) { ?>
                            <li><span><i class="icons icon-user-3"></i> <?php echo $this->session->userdata('username'); ?></span></li>
                            <li class="purple"><a href="<?php echo base_url() . 'home/userdashboard'; ?>" class="purple"><i class="fa fa-das"></i> Dashboard</a></li>

                            <li class="purple pull-right"><a href="<?php echo base_url() . 'home/logout'; ?>"><i class="fa fa-power-off"></i> Logout</a>

<?php } else { ?>
                                <ul class="pull-right">
                                    <li class="purple"><a href="<?php echo base_url(); ?>auth/authorize" class="btn btn-warning"><i class="fa fa-user-circle"></i> Login</a>

                                    </li>


                                    <li><a class="btn btn-primary" href="<?php echo base_url(); ?>home/postad"><i class="fa fa-plus-circle"></i> Post Your Ad</a></li>
                                    <li><a class="btn btn-success" href="<?php echo base_url(); ?>home/postobituary"><i class="fa fa-plus-circle"></i> Post Obituary</a></li>
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
<?php } ?>

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
                                        <a href="<?php echo base_url(); ?>home/contact">
                                            <i class="icons icon-location-7"></i>
                                            <span class="nav-caption">Contact Us</span>
                                            <span class="nav-description">&nbsp;</span>
                                        </a>
                                    </li>




                                </ul>
                                <form id="search" method="post" action="<?php echo base_url();?>search/query">
                                <div id="search-bar" >

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <table id="search-bar-table">
                                            <tr>
                                                <td class="search-column-1">
                                                    <p><span class="grey">Popular Searches:</span> <a href="#">Obituaries</a>, <a href="#">Caskets</a>, <a href="#">Pathologists</a>, <a href="#">Hospitals</a>, <a href="#">Flowers</a></p>
                                                    <input type="text" name="keyword" placeholder="Enter your keyword">
                                                </td>
                                                <td class="search-column-2">
                                                    <p class="align-right"><a href="#">&nbsp;</a></p>
                                                    <select class="chosen-select-search" name="category">
                                                        <option value="">All Categories</option>
                                                        <?php foreach($categories as $c):?>
                                                        <option value="<?php echo $c->id;?>"><?php echo $c->name;?></option>
                                                    <?php endforeach;?>
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
                                </form>

                            </nav>
                            <!-- /Main Navigation -->

                            </div>

                            </header>