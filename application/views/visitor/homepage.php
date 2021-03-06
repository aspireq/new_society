<?php echo $header; ?>
<section id="innerbanner">
    <div class="container-fluid">
        <h1><?php echo $appartment_info->appartment_name; ?> Owners and Residents Group</h1>
        <h3>Join now to connect with other owners/residents of <?php echo $appartment_info->appartment_name; ?>.</h3>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <br/>
            <div class="col-md-10 col-sm-9 col-xs-12">
                <h3 class="blue">Welcome to <?php echo $appartment_info->appartment_name; ?>!</h3>
                <p><b><i class="fa fa-map-marker"></i>&nbsp;Location:</b> <?php echo $appartment_info->address; ?><?php echo ($appartment_info->city != "") ? ', ' . $appartment_info->city : '' ?>
                    <?php echo ($appartment_info->state != "") ? ', ' . $appartment_info->state : '' ?>
                    <?php echo ($appartment_info->pincode != "") ? ', ' . $appartment_info->pincode : '' ?> </p>
                <ul class="list-inline shareaddalink">
                    <li class=""><b>Share this Adda:</b></li>
                    <li class="link"><a href="#"><i class="fa fa-link"></i>&nbsp;Copy Link</a></li>
                    <li class="facebook"><a href="#"><i class="fa fa-facebook-square"></i>&nbsp;Facebook</a></li>
                    <li class="google"><a href="#"><i class="fa fa-google-plus-square"></i>&nbsp;Google+</a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter-square"></i>&nbsp;Twitter</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-12">
                <button class="btn btn-raised btn-info btn-block btn-joinadda" data-toggle="modal" data-target="#joinmodal"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Join Now</button>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <hr/>
                <h3 class="blue">About <?php echo $appartment_info->appartment_name; ?></h3>
                <p><?php echo $appartment_info->info; ?></p>                
            </div>
        </div>
        <div class="row">
            <br/>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="addaspec">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#spec" aria-controls="spec" role="tab" data-toggle="tab">Specification</a></li>
                        <li role="presentation"><a href="#location" aria-controls="location" role="tab" data-toggle="tab">Location</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="spec">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>No. Of Blocks</td>
                                            <td>20</td>
                                        </tr>
                                        <tr>
                                            <td>No. Of Flats</td>
                                            <td>72</td>
                                        </tr>
                                        <tr>
                                            <td>Association Name</td>
                                            <td><?php echo ($appartment_info->association_name) ? $appartment_info->association_name : 'N/A'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Contact</td>
                                            <td><?php echo ($appartment_info->phone) ? $appartment_info->phone : 'N/A'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Builder URL</td>
                                            <td><?php echo ($appartment_info->builder_url) ? $appartment_info->builder_url : 'N/A'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Amenities</td>
                                            <td><?php echo $appartment_info->amenities; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="location">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2451.2768305599816!2d72.59647471962413!3d22.99565102266238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e85e9da07067f%3A0x6f7a9be0d06374a8!2sZero+Gravity+Webservices+LLP!5e0!3m2!1sen!2sin!4v1494418503816" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row addafeature">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3 class="blue">Adda Feature</h3>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <h4>Connect and Collaborate with neighbours</h4>
                <ul class="list">
                    <li><i class="fa fa-check"></i>&nbsp;Conversations</li>
                    <li><i class="fa fa-check"></i>&nbsp;Online Polls</li>
                    <li><i class="fa fa-check"></i>&nbsp;Groups, Albums</li>
                    <li><i class="fa fa-check"></i>&nbsp;Post Activities, Events and Notices</li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <h4>Manage your Apartment</h4>
                <ul class="list">
                    <li><i class="fa fa-check"></i>&nbsp;Pay Maintanance Bills</li>
                    <li><i class="fa fa-check"></i>&nbsp;Book Home Services</li>
                    <li><i class="fa fa-check"></i>&nbsp;Manage Visitors</li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <h4>Stay connected to your society management</h4>
                <ul class="list">
                    <li><i class="fa fa-check"></i>&nbsp;Get Notifications and Updates</li>
                    <li><i class="fa fa-check"></i>&nbsp;Raise and Track Complaints</li>
                    <li><i class="fa fa-check"></i>&nbsp;Book Apartment Facilities</li>
                </ul>
            </div>
        </div>
    </div>
    <br/>
</section>
<?php echo $footer; ?>
<script src="<?php echo base_url(); ?>include_files/user/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url(); ?>include_files/user/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>include_files/user/js/material.min.js"></script>
<script src="<?php echo base_url(); ?>include_files/user/js/ripples.min.js"></script>
<script src="<?php echo base_url(); ?>include_files/user/js/smoothscroll.js"></script>
<script src="<?php echo base_url(); ?>include_files/user/js/wow.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>include_files/user/js/aspire.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>include_files/user/js/validator.js"></script>
</body>
</html>
