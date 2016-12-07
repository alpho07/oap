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
<div class="row">
    <form id="smart-form" method="POST" enctype='multipart/form-data' action="<?php echo base_url().'home/obedit/'.$id .'/'.$pe.'/nQo122jq2'  ;?>">

        <div class="col-lg-12 col-md-12 col-sm-12 register-account">

            <div class="carousel-heading no-margin">
                <h4>Edit Obituary : <?php echo $info[0]->obtitle;?></h4>
            </div>


            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p><strong>Edit Obituary information</strong></p>
                        <hr>
                    </div>

                </div>
                
                    <div class="row">


                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Obituary Title:</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input type="text" name="obtitle" id="obtitle" placeholder="Celebrating 10 Anniversary" required value="<?php echo $info[0]->title; ?>">
                    </div>	

                </div>
                <div class="row">


                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Deceased Name:</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input type="text" name="addtitle" id="addtitle" required value="<?php echo $info[0]->obtitle; ?>">
                    </div>	

                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Category</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <select class="chosen-select-search" readonly name="category" id="category" required>
                            <option value="1">Obituary</option>
                            
                        </select>
                    </div>	

                </div>
                
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Date of birth and passing</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <input type="text" name="dob" id="dob" placeholder="Date of Birth 15/02/1938" required value="<?php echo $info[0]->dob; ?>"> 

                    </div>	
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <input type="text" name="dod" id="dod" placeholder="Date of Passing 17/05/1995" required value="<?php echo $info[0]->dod; ?>">

                    </div>	

                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Deceased Bio</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <textarea name="description" name="description" id="description" required ><?php echo $info[0]->description; ?></textarea>
                    </div>	

                </div>
                
                    <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>More Info</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <textarea name="more_info" id="more_info" required placeholder="e.g. Arranged meeting place, paybill number for money collection and mini program" ><?php echo $info[0]->more_info;?></textarea>
                    </div>	

                </div>

                <hr>
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Deceased Portrait</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="" style="color:red; font-weight: bold; " > <?php echo @$error;?></div>
                       
                        <p><input type="file" id="file" multiple  name="file" /></p>
                        <p id="img"><img src="<?php echo base_url().$info[0]->image_path;?>" alt="deceased image" width="200px" height="200px"></p
                    </div>	

                </div>

                <!--div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Password</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input type="password" name="password" id="password" required>
                    </div>	

                </div-->

                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Your Region</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input type="text" name="region" id="region" required value="<?php echo $info[0]->region; ?>">
                    </div>	

                </div>
                <!--hr>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p><strong>Personal Details</strong></p>
                </div>
                <hr>

                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Your Name</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input type="text" name="fullname" id="fullname" required value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>">
                    </div>	

                </div>
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>Your Phone</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input type="text" name="phone" id="phone" required value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
                       <span><small>Please enter a valid 10 digit phone number e.g. 0700 000000</small></span>

                    </div>	

                </div>
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p>your Email</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input type="email" name="email" id="email" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                        <span><small>Please enter a valid email e.g. mimi@example.com</small></span>
                    </div>	

                </div-->



                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button  type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Data</button>
                </div>
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p><strong>&nbsp;</strong></p>
                    </div>


                </div>

            </div>
        </div>

</div>
</form>
</div>

<script>
    $(document).ready(function () {
        $('#dob').datepicker({
            dateFormat:"dd-mm-yy",
            changeYear:true,
            changeMonth:true,
            yearRange: "-100:+0",
            showButtonPanel: true,
        });
        $('#dod').datepicker({
            dateFormat:"dd-mm-yy",
            changeYear:true,
            changeMonth:true,
            showButtonPanel: true,
           
        });
        $("#description").maxlength({max: 3072});
        $("#addtitle").maxlength({max: 48});
        $('#file').change(function () {
            if (this.files.length > 0) {

                $.each(this.files, function (i, v) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var img = new Image();
                        img.src = e.target.result;

                        img.onload = function () {

                            // CREATE A CANVAS ELEMENT AND ASSIGN THE IMAGES TO IT.
                            var canvas = document.createElement("canvas");

                            var value = 30;

                            // RESIZE THE IMAGES ONE BY ONE.
                            img.width = (img.width * value) / 100
                            img.height = (img.height * value) / 100

                            var ctx = canvas.getContext("2d");
                            ctx.clearRect(0, 0, canvas.width, canvas.height);
                            canvas.width = img.width;
                            canvas.height = img.height;
                            ctx.drawImage(img, 0, 0, img.width, img.height);
                            $('#img').empty(); 
                            $('#img').append(img);      // SHOW THE IMAGES OF THE BROWSER.


                        }
                    };
                    reader.readAsDataURL(this);
                });
            }
        });

        $("#smart-form").on("submit", function (e) {
            e.preventDefault();
            $registerForm;
        });

    $('#category').change(function(){
            value = $(this).val();
            if(value==='2'){
                window.location.href="<?php echo base_url();?>home/postad"
            }
        });


        var $registerForm = $("#smart-form").validate({
              errorElement: 'div',
               error: function(label) {
     $(this).addClass("error");
   },
            rules: {
                addtitle: {
                    required: true
                },
                obtitle: {
                    required: true
                },
                category: {
                    required: true
                },
                description: {
                    required: true
                },
                dob: {
                    required: true
                },
                dod: {
                    required: true
                },
        
             
                region: {
                    required: true,
                },
                fullname: {
                    required: true
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
           
            
                phone: {
                    required: 'Your phone number is required'
                },
                description: {
                    required: 'Please describe your Ad'
                },
                fullname: {
                    required: 'Your full name is required'
                },
              
                dob: {
                    required: 'Date of Birth is required'
                },
                dod: {
                    required: 'Date of Passing On is required'
                },
            },
            submitHandler: function (form) {
                form.submit();
            },
            // Do not change code below
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
                $('#password.error').show();
                $('#phone.error').show();
            }
        });





        
});


</script>

