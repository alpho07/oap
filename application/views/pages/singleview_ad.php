<!DOCTYPE html>

<html>

    <head>
        <title><?php echo $info[0]->title; ?></title>
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

    </head>


    <body>

        <!-- Container -->
        <div class="container">

            <!-- Header -->
            <?php $this->load->view('partials/top-header'); ?>

            <!-- /Header -->


            <!-- Content -->
            <div class="row content">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumbs">
                        <p><a href="<?php echo base_url(); ?>">Home</a> <i class="icons icon-right-dir"></i> <?php echo $info[0]->name; ?><i class="icons icon-right-dir"></i> <?php echo $info[0]->title; ?></p>
                    </div>
                </div>

                <!-- Main Content -->
                <section class="main-content col-lg-12 col-md-12 col-sm-12">


                    <div class="row">

                        <div class="col-lg-7 col-md-7 col-sm-7 ">

                            <div class="carousel-heading no-margin">
                                <h4><?php echo $info[0]->title . ' &#187 KSH. ' . $info[0]->price; ?></h4>
                            </div>

                            <div class="page-content contact-info card">

                                <img width="425" height="350" src="<?php echo base_url() . $info[0]->image_path; ?>" />
                                <div class="row" style="margin-top: 20px;">
                                    <span class="well " style="border-bottom: none;"><?php echo '<strong>' . $info[0]->region . '</strong>'; ?> &#187 <?php
                                        $date = new DateTime($info[0]->date_posted);
                                        echo $date->format('jS F Y  ');
                                        ?> &#187 <?php echo '<strong>Ad ID</strong>: ' . $info[0]->id; ?></span>
                                    <div class="well col-lg-12" style="border-top: none;">
<?php echo $info[0]->description; ?>
                                    </div>
                                </div>

                                <p><a href=""><i class="fa fa-heart-o "></i> Mark as favourite</a> | <a href=""><i class="fa fa-print "></i> Print</a> |  <?php if ($this->session->userdata('user_id') == TRUE && $ver > 0) { ?>
                                        <a href="<?php echo base_url() . 'home/edits/' . $info[0]->id . '/' . str_replace(" ", "-", $info[0]->title); ?>" class="btn btn-success" style="margin: 20px;"><i class="fa fa-edit"></i> Edit
<?php } else {
    echo '';
} ?>  </a></p>
                            </div>

                        </div>




                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="middle-banner banner-item icon-on-left light-blue">
                                <h4>Business / Individual</h4>
                                <p><?php echo $info[0]->user; ?></p>
                                <i class="icons icon-basket-2"></i>
                            </div>
                            <div class="left-side-banner banner-item icon-on-right gray">
                                <span class="button show_mobile">SHOW NUMBER</span>
                                <h4 id="mobile_placeholder">000000000</h4>
                                <h4 id="mobile" style="display:none;"><?php echo $info[0]->phone; ?></h4>
                                <p>Mobile Number</p>
                                <i class="icons icon-phone-outline"></i>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 success-message" style="display:none;">
                            <div class=" alert-success" style="padding: 10px; border: 1px solid; border-radius: 2px;"><i class="fa fa-info-circle" ></i> Message received, thank you!</div> 
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 ad_message">

                            <div class="carousel-heading no-margin">
                                <h4>Message</h4>
                            </div>

                            <div class="page-content contact-form card">

                                <form id="smart-form-message">


                                    <input name="name" type="text" id="name" required placeholder="Name">
                                     <input name="ad_id" type="hidden" value="<?php echo $info[0]->id;?>">


                                    <input name="email" id="email" type="email" placeholder="Email" required>

                                    <label>Subject</label>
                                    <input name="subject" type="text"  id="subject" readonly value="<?php echo $info[0]->title; ?>">


                                    <textarea name="message" id="message" required placeholder="Type Message here..."></textarea>

                                    <input class="big" type="submit" value="Send Message">

                                </form>

                            </div>
                            <button class="btn btn-danger btn-lg btn-block reporterButton" style="margin-bottom: 20px;"><i class="fa fa-bullhorn"></i> Report this Ad</button>
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-5 add_report " style="display: none;">

                            <div class="carousel-heading no-margin">
                                <h4>Report Ad</h4>
                            </div>


                            <div class="page-content contact-form card">

                                <br>
                                <p><a class="btn btn-success btn-block" href="" ><i class="fa fa-exclamation-triangle"></i> My Safety Precautions</a></a></p>

                                <form id="smart-form-report">


                                    <input name="rname" id="rname" type="text" required placeholder="Name">
                                    <input name="ad_id" type="hidden" value="<?php echo $info[0]->id;?>">
                                    <br>



                                    <input name="remail" id="remail" type="email" placeholder="Email" required>
                                    <br>
                                    <br>



                                    <input name="rphone" id="rphone" type="text" placeholder="Phone" required>

                                    <label></label>
                                    <select name="rsubject" id="rsubject">
                                        <option value="Wrong category placement">Ad in wrong category placement</option>
                                        <option value="Ad is a scam">Ad is a scam</option>
                                        <option value="Ad is a spam">Ad is a spam</option>
                                    </select>
                                    <br>
                                    <br>



                                    <textarea name="rmessage" id="rmessage" required placeholder="Type Message here..."></textarea>

                                    <button class="btn btn-danger btn-lg btn-block " id="Reporter" style="margin-bottom: 20px;"><i class="fa fa-bullhorn"></i> Report </button>

                                </form>

                            </div>
                        </div>


                    </div>

                </section>
                <!-- /Main Content -->


            </div>
            <!-- /Content -->










            <!-- Footer -->
            <footer id="footer" class="row">





                <!-- Main Footer -->
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div id="main-footer">

                        <div class="row">

                            <!-- Like us on Twitter -->
                            <div class="col-lg-3 col-md-3 col-sm-6 twitter-widget">

                                <a href="#" class="button blue small">More Ads From this User</a>
                            </div>
                            <!-- /Like us on Twitter -->


                            <!-- Like us on Facebook -->
                            <div class="col-lg-3 col-md-3 col-sm-6 facebook-iframe">
                                <h4>Like us on Facebook</h4>
                                <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FFacebookDevelopers&amp;width=270&amp;height=250&amp;colorscheme=light&amp;header=false&amp;show_faces=true&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:100%; height:290px;"></iframe>
                            </div>
                            <!-- /Like us on Facebook -->


                            <!-- Information -->
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <h4>Information</h4>
                                <ul>
                                    <li><a href="#"><i class="icons icon-right-dir"></i> Advert Space</a></li>
                                    <li><a href="#"><i class="icons icon-right-dir"></i> Advert Space</a></li>
                                    <li><a href="#"><i class="icons icon-right-dir"></i> Advert Space</a></li>
                                    <li><a href="#"><i class="icons icon-right-dir"></i> Advert Space</a></li>
                                    <li><a href="#"><i class="icons icon-right-dir"></i> Advert Space<</a></li>
                                    <li><a href="#"><i class="icons icon-right-dir"></i> Advert Space<</a></li>
                                </ul>
                            </div>
                            <!-- /Information -->


                            <!-- Contact Us -->
                            <div class="col-lg-3 col-md-3 col-sm-6 contact-footer-info">
                                <h4>Contact Us</h4>
                                <ul>
                                    <li><i class="icons icon-location"></i> Nairobi Kenya,<br></li>
                                    <li><i class="icons icon-phone"></i> +254 718 33223344</li>
                                    <li><i class="icons icon-mail-alt"></i><a href="mailto:mail@company.com"> mail@companyname.com</a></li>
                                    <li><i class="icons icon-skype"></i> Online Obituary Platform </li>
                                </ul>
                            </div>
                            <!-- /Contact Us -->

                        </div>

                    </div>

                </div>
                <!-- /Main Footer -->
            </footer>



            <!-- Lower Footer -->
<?php $this->load->view('partials/top-footer'); ?>
            <!-- Footer -->


            <div id="back-to-top">
                <i class="icon-up-dir"></i>
            </div>

        </div>
        <!-- Container -->
        <script>
            $(function () {
                base_url="<?php echo base_url();?>";
                $('.show_mobile').click(function () {
                    $(this).hide();
                    $('#mobile_placeholder').remove();
                    $('#mobile').show();
                });

                $('.reporterButton').click(function () {
                    $(this).hide();
                    $('.ad_message').slideUp();
                    $('.add_report').slideDown();
                });

              $("#smart-form-report").on("submit", function (e) {
            e.preventDefault();
            $report;
        });
              $("#smart-form-message").on("submit", function (e) {
            e.preventDefault();
            $message;
        });

                var $report = $("#smart-form-report").validate({
                    errorElement: 'div',
                    error: function (label) {
                        $(this).addClass("error");
                    },
                    rules: {
                        remail: {
                            required: true,
                            email: true
                        },
                        rname: {
                            required: true
                        },
                        rmessage: {
                            required: true
                        },
                        rphone: {
                            required: true,
                            minlength: 10,
                            maxlength: 10,
                            number: true

                        },
                        password: {
                            required: true,
                            minlength: 3,
                            maxlength: 20
                        },
//                },
//                passwordConfirm: {
//                    required: true,
//                    minlength: 3,
//                    maxlength: 20,
//                    equalTo: '#password'
//                },
                    },
                    // Messages for form validation
                    messages: {
                        email: {
                            required: 'Please enter your email address',
                            email: 'Please enter a VALID email address'
                        },
                        phone: {
                            required: 'Your phone number is required'
                        },
                        description: {
                            required: 'Please describe your Ad'
                        },
                        fullname: {
                            required: 'Your full name is required'
                        },
                        password: {
                            required: 'Your password is required'
                        },
                        dob: {
                            required: 'Date of Birth is required'
                        },
                        dod: {
                            required: 'Date of Passing On is required'
                        },
                    },
                    submitHandler: function (form) {
                       $.post(base_url+'home/report/',$('#smart-form-report').serialize(), function(){
                           $('.add_report').slideUp();
                           $('.success-message').show();
                       }).fail(function(){
                           
                       });
                           
                    },
                    // Do not change code below
                    errorPlacement: function (error, element) {
                        error.insertAfter(element.parent());
                       
                    }
                });
                
                var $message = $("#smart-form-message").validate({
                    errorElement: 'div',
                    error: function (label) {
                        $(this).addClass("error");
                    },
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        name: {
                            required: true
                        },
                        message: {
                            required: true
                        },
                        phone: {
                            required: true,
                            minlength: 10,
                            maxlength: 10,
                            number: true

                        },
                        password: {
                            required: true,
                            minlength: 3,
                            maxlength: 20
                        },
//                },
//                passwordConfirm: {
//                    required: true,
//                    minlength: 3,
//                    maxlength: 20,
//                    equalTo: '#password'
//                },
                    },
                    // Messages for form validation
                    messages: {
                        email: {
                            required: 'Please enter your email address',
                            email: 'Please enter a VALID email address'
                        },
                        phone: {
                            required: 'Your phone number is required'
                        },
                        description: {
                            required: 'Please describe your Ad'
                        },
                        fullname: {
                            required: 'Your full name is required'
                        },
                        password: {
                            required: 'Your password is required'
                        },
                        dob: {
                            required: 'Date of Birth is required'
                        },
                        dod: {
                            required: 'Date of Passing On is required'
                        },
                    },
                    submitHandler: function (form) {
                       $.post(base_url+'home/message/',$('#smart-form-message').serialize(), function(){
                           $('.ad_message').slideUp();
                           $('.success-message').show();
                       }).fail(function(){
                           
                       });
                           
                    },
                    // Do not change code below
                    errorPlacement: function (error, element) {
                        error.insertAfter(element.parent());
                       
                    }
                });


            });
        </script>

<?php $this->load->view('partials/footer'); ?>


    </body>

</html>