<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $common; ?>
    </head>
    <body>
        <?php echo $header; ?>
        <div class="container-fluid">
            <?php echo $sidebar; ?>
            <div class="dashboard-wrapper">
                <?php echo $top_menu; ?>
                <div class="top-bar clearfix">
                    <div class="container-fluid">
                        <div class="row gutter">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h3 class="page-title">Dashboard</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-container">
                    <div class="row gutter">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <a href="#" class="block-60 green-bg">
                                <h1>SMS</h1>
                                <h5>Send to member</h5>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <a href="#" class="block-60 violet-bg">
                                <h1>Post Notice</h1>
                                <h5>Send to Adda</h5>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="#" class="block-60 teal-bg">
                                <h1>Flash</h1>
                                <h5>Instant App Notification</h5>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="<?php echo base_url();?>user/home" class="block-60 orange-bg">
                                <h1>Post Notice</h1>
                                <h5>Notice in your Adda</h5>
                            </a>
                        </div>
                    </div>
                    <div class="row gutter">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4>Overview</h4>

                                </div>
                                <div class="panel-body">
                                    <div class="row gutter">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="plan2">
                                                <h3 class="plan2-title">Manage Users</h3>
                                                <p class="plan2-price"><span class="icon-users2"></span></p>
                                                <ul class="plan2-details">
                                                    <li>
                                                        <a href="#">
                                                            <span>2</span>
                                                            <h4 class="plan2-name">Admins</h4>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span>3</span>
                                                            <h4 class="plan2-name">Unapproved</h4>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span>5</span>
                                                            <h4 class="plan2-name">Association</h4>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <button type="button" class="btn btn-info btn-lg btn-block choose-plan2" onclick="window.location.href = '<?php echo base_url(); ?>auth_admin/manage_users'">View All</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="plan2">
                                                <h3 class="plan2-title">Setup ADDA Profile</h3>
                                                <p class="plan2-price"><span class="icon-domain"></span></p>
                                                <ul class="plan2-details">
                                                    <li>
                                                        <a href="<?php echo base_url();?>home/page?appartment_id=<?php echo $userinfo['appartment_id'];?>">
                                                            <span class="icon-check2"></span>
                                                            <h4 class="plan2-name">Public page</h4>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="icon-warning2"></span>
                                                            <h4 class="plan2-name">Image</h4>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="icon-warning2"></span>
                                                            <h4 class="plan2-name">Location</h4>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <button type="button" class="btn btn-info btn-lg btn-block choose-plan2" onclick="window.location.href = '<?php echo base_url(); ?>auth_admin/profile_setup'">View All</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="plan2">
                                                <h3 class="plan2-title">Admin Reports</h3>
                                                <p class="plan2-price"><span class="icon-tonality"></span></p>
                                                <ul class="plan2-details">
                                                    <li>
                                                        <a href="#">
                                                            <span>165</span>
                                                            <h4 class="plan2-name">Total</h4>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span>0</span>
                                                            <h4 class="plan2-name">Published</h4>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span>3</span>
                                                            <h4 class="plan2-name">Lorem ipsum</h4>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <button type="button" class="btn btn-info btn-lg btn-block choose-plan">View All</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $footer; ?>
            </div>
        </div>
        <script src="<?php echo base_url();?>include_files/admin/js/jquery.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/scrollup.min.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/flot/jquery.flot.min.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/flot/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/flot/jquery.flot.time.min.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/flot/jquery.flot.resize.min.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/flot/custom/multi-bar-chart.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/flot/custom/profile-area.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/jvectormap/gdp-data.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/jvectormap/usa.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/jvectormap/custom/usa-profile.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/d3.min.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/c3/c3.min.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/c3/c3.custom.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/themeSwitcher.js"></script>
        <script src="<?php echo base_url();?>include_files/admin/js/common.js"></script>
    </body>
</html>