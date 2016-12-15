<ul  class="nav nav-pills">

    <li class="<?php if ($this->uri->segment(2) == 'admindashboard') {
    echo 'active';
} else {
    
} ?>">
        <a  href="<?php echo base_url(); ?>admin/admindashboard">Users</a>
    </li>
    <li class="<?php if ($this->uri->segment(2) == 'reports') {
                echo 'active';
            } else {
                
            } ?>">
        <a href="<?php echo base_url(); ?>admin/reports" >Reported Ads <?php if ($mcount > 0) { ?><span style="background: red" class="badge"><?php echo $mcount; ?></span> <?php
            } else {
                echo '';
            };
?></a>
    </li>
    <li class="<?php if ($this->uri->segment(2) == 'ads') {
                echo 'active';
            } else {
                
            } ?>">
        <a href="<?php echo base_url(); ?>admin/ads" >Normal Ads</a>
    </li>
    <li class="<?php if ($this->uri->segment(2) == 'obituaries') {
                echo 'active';
            } else {
                
            } ?>">
        <a href="<?php echo base_url(); ?>admin/obituaries" >Obituaries</a>
    </li>
    <li class="<?php if ($this->uri->segment(2) == 'comments') {
                echo 'active';
            } else {
                
            } ?>">
        <a href="<?php echo base_url(); ?>admin/comments" >Obituary Comments</a>
    </li>
    <li class="<?php if ($this->uri->segment(2) == 'premium') {
                echo 'active';
            } else {
                
            } ?>">
        <a href="<?php echo base_url(); ?>admin/premium" >Premium Ads</a>
    </li>
    <li class="<?php if ($this->uri->segment(2) == 'payments') {
                echo 'active';
            } else {
                
            } ?>">
        <a href="<?php echo base_url(); ?>admin/payments" >Payments</a>
    </li>
    <li class="<?php if ($this->uri->segment(2) == 'settings') {
                echo 'active';
            } else {
                
            } ?>">
        <a href="<?php echo base_url(); ?>admin/settings" >Category settings</a>
    </li>
</ul>