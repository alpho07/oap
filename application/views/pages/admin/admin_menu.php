<ul  class="nav nav-pills">
    <li class="">
        <a  href="<?php echo base_url();?>admin/admindashboard">Users</a>
    </li>
    <li><a href="<?php echo base_url();?>admin/reports" >Reported Ads <?php if ($mcount > 0) { ?><span style="background: red" class="badge"><?php echo $mcount; ?></span> <?php } else {
    echo '';
}; ?></a>
    </li>
    <li><a href="<?php echo base_url();?>admin/ads" >Normal Ads</a>
    </li>
    <li><a href="<?php echo base_url();?>admin/obituaries" >Obituaries</a>
    </li>
    <li><a href="<?php echo base_url();?>admin/premium" >Premium Ads</a>
    </li>
    <li><a href="<?php echo base_url();?>admin/payments" >Payments</a>
    </li>
</ul>