
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" href="<?php echo base_url(); ?>include_files/user/images/favicon.png" sizes="24X24" type="image/png">
        <title>Property2</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>include_files/user/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>include_files/user/css/bootstrap-material-design.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>include_files/user/css/csshake.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>include_files/user/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>include_files/user/css/ripples.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>include_files/user/css/base.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>include_files/user/css/animate.min.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url(); ?>include_files/user/css/sidebar.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>include_files/user/css/lightbox.css" />
        <link href="<?php echo base_url(); ?>include_files/user/css/bootstrap-submenu.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>include_files/user/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>include_files/user/css/responsive.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>include_files/user/js/modernizr.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="header">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>">LOGO</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active">
                                <a class="hvr-underline-from-center" href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li><a class="hvr-underline-from-center" href="<?php echo base_url(); ?>home/whyus">Why Us</a></li>
                            <li><a class="hvr-underline-from-center" href="<?php echo base_url(); ?>home/price">Pricing</a></li>
                            <li><a class="hvr-underline-from-center" href="<?php echo base_url(); ?>home/buzzar">Buzzar</a></li>
                            <li><a class="hvr-underline-from-center" href="<?php echo base_url(); ?>home/blog">Blog</a></li>
                            <li><a class="hvr-underline-from-center" href="<?php echo base_url(); ?>home/career">Career</a></li>
                            <li><a class="hvr-underline-from-center" href="<?php echo base_url(); ?>home/contact">Contact</a></li>
                            <li><a data-toggle="modal" data-target="#signinmodal" class="btn btn-primary btn-raised">Sign In</a></li>
                            <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                            </li> -->
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="signinmodal" tabindex="-1" role="dialog" aria-labelledby="apartmentsignin">
            <div class="modal-dialog" role="document">
                <div class="modal-content row">
                    <div class="col-md-5 registerlinkblock" id="gradient">
                        <img src="<?php echo base_url(); ?>include_files/user/images/apartment.png" />
                        <h4>Create Adda,It's Free!!</h4>
                        <h4><a data-toggle="modal" href="#registermodal" data-dismiss="modal">Register Now</a></h4>
                    </div>
                    <div class="col-md-7 p-0">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="apartmentsignin">Sign In</h4>
                        </div>
                        <div class="modal-body">
                            <form data-toggle="validator" role="form" id="login_form" action="<?php echo base_url(); ?>home/login_via_ajax">
                                <div id="login_message"></div>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="email">Email / Username</label>
                                    <input class="form-control" id="login_identity" name="login_identity" type="text" data-error="Email address is invalid" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="password">Password</label>
                                    <input class="form-control" id="login_password" name="login_password" type="password" data-minlength="6" data-error="Minimum of 6 characters" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group label-floating row m-10">
                                    <div class="checkbox col-md-6 m-0 p-0">
                                        <label>
                                            <input type="checkbox"> Remember Me
                                        </label>
                                    </div>
                                    <div class="col-md-6 text-right p-0">
                                        <a href="" class="l-27">Forgot Password?</a>
                                    </div>
                                </div>
                                <input type="hidden" name="valid_login_url" id="valid_login_url" value="<?php echo base_url(); ?>user">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-raised btn-info btn-block" name="login_user" id="login_user">Sign In <i class="fa fa-send"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- register modal -->
        <div class="modal fade" id="registermodal" tabindex="-1" role="dialog" aria-labelledby="registerblock">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content row">
                    <div class="col-md-4 registerlinkblock" id="gr">
                        <img src="<?php echo base_url(); ?>include_files/user/images/apartment.png" />
                        <h4>Already Adda Member ??</h4>
                        <h4><a data-toggle="modal" href="#signinmodal" data-dismiss="modal">Login Now</a></h4>
                    </div>
                    <div class="col-md-8 p-0">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="registerblock">Sign Up</h4>
                        </div>
                        <div class="modal-body">
                            <form class="registerform" data-toggle="validator" role="form" method="post" id="register_user" action="<?php echo base_url(); ?>home/register">
                                <div id="register_message">
                                </div>                               
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="apartmentname">Apartment Name<sup>*</sup></label>
                                        <input class="form-control" id="apartmentname" name="apartmentname" type="text" data-error="Enter valid apartment name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="register_username">Username<sup>*</sup></label>
                                        <input class="form-control" id="register_username" name="register_username" type="text" data-error="Enter valid username" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="register_email_address">Email<sup>*</sup></label>
                                        <input class="form-control" id="register_email_address" name="register_email_address" data-error="Enter valid Email" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="mobile_no">Phone / Mobile <sup>*</sup></label>
                                        <input class="form-control" id="mobile_no" name="mobile_no" type="text" data-error="Enter valid phone/mobile number" required maxlength="10">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="passwordmain">Password<sup>*</sup></label>
                                        <input class="form-control" id="passwordmain" type="password" name="passwordmain" data-error="Enter password" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputPasswordConfirm">Re-enter Password<sup>*</sup></label>
                                        <input class="form-control" id="inputPasswordConfirm" type="password" name="inputPasswordConfirm" data-error="Confirm password must be match with password" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="address">Address<sup>*</sup></label>
                                        <textarea class="form-control" name="address" id="address" required data-error="Enter address" rows="1"></textarea>                                    
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="city">Select City<sup>*</sup></label>
                                        <select class="form-control" name="city" id="city" required="" data-error="Enter city">
                                            <option value="">Select City</option>
                                            <?php foreach ($cities as $city) { ?>
                                                <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="pincode">Pincode<sup>*</sup></label>
                                        <input class="form-control" name="pincode" id="pincode" required data-error="Enter pincode" maxlength="8"></input>                                    
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="blocks">All Blocks / Wings <sup>*</sup></label>
                                        <input class="form-control" id="blocks" name="blocks" type="text" data-error="Enter valid value" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="total_flats">Total Flats <sup>*</sup></label>
                                        <input class="form-control" id="total_flats" name="total_flats" type="text" data-error="Enter valid value" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="my_block">My Block <sup>*</sup></label>
                                        <input class="form-control" id="my_block" name="my_block" type="text" data-error="Enter valid value" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="my_flat">My Flat<sup>*</sup></label>
                                        <input class="form-control" id="my_block" name="my_flat" type="text" data-error="Enter valid value" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="m-t-15">
                                        <label class="radio-inline">
                                            <input type="radio" name="user_type" id="user_type_owner" value="1"> Owner
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="user_type" id="user_type_tenant" value="2"> Tenant
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-raised btn-info btn-block" name="signup_user" id="signup_user">Sign Up <i class="fa fa-send"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>