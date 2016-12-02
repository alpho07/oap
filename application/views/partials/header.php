<style type="text/css">
    .product-image{
        box-shadow: -1px 4px 6px 3px #CCCED0;
    }
    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    /* On mouse-over, add a deeper shadow */
    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
</style>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,900,700italic,500italic' rel='stylesheet' type='text/css'>

<!-- Stylesheets -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/perfect-scrollbar.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/fontello.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/animation.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.theme.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/chosen.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.maxlength.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="<?php echo base_url(); ?>css/zebra/zebra_dialog.css" rel='stylesheet' type='text/css' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        base_url="<?php echo base_url();?>";
        $.maxlength.setDefaults({showFeedback: true});
  
        $('#phone').focusout(function(){
            $.get(base_url+'auth/verify/phone/'+$(this).val(),function(resp){
                if(resp==='success'){
                    Prompt("Phone Number <strong> (" +$("#phone").val()+ ")</strong>");
                    $('#phone').val('');
                }else{
                    
                }
            })
        });
        $('#email').focusout(function(){
            $.get(base_url+'auth/verify/email/'+$(this).val(),function(resp){
                if(resp==='success'){
                     Prompt("Phone Number <strong> (" +$("#email").val()+ ")</strong>");
                    $('#email').val('');
                }else{
                    
                }
            })
        });
              
        
    
        function Prompt(d) {
            $.Zebra_Dialog("This " + d + " is already registerd, please login to post AD or Obituary", {
                'type': 'error',
                'title': 'Duplicate Record',
                'buttons': [
                    {caption: 'Okey', callback: function () {


                        }}
                ]
            });

        }

    });
    
</script>