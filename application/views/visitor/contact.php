<?php echo $header; ?>
<section id="innerbanner">
    <div class="container-fluid">
        <h1>We’re always open to talk to good people</h1>
        <h3>Have a questions?</h3>
    </div>
</section>
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3>Contact Us</h3>
            </div>
            <div class="col-md-4 col-sm-5 col-xs-12">
                <div class="m-30"></div>
                <div class="media">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object" src="<?php echo base_url(); ?>include_files/user/images/address.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Address</h4>
                        <address>
                            27, Lorem ipsum dummy text,<br>
                            Lorem ipsum dummy text,<br>
                            Ahmedabad, India,<br>
                            380056
                        </address>
                    </div>
                </div>
                <br/>
                <div class="media">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object" src="images/smartphone.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Call Us</h4>
                        <p>+91 1234567890</p>
                        <p>+91 1234567890</p>
                    </div>
                </div>
                <br/>
                <ul class="list-inline social-network social-circle">
                    <li><a href="#" class="icoFacebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="icoTwitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="icoGoogle"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
            <div class="col-md-8 col-sm-7 col-xs-12">
                <form class="contactform row" data-toggle="validator" role="form">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label" for="apartmentname">Apartment Name<sup>*</sup></label>
                            <input class="form-control" id="apartmentname" type="text" data-error="Enter valid Apartmentname name" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label" for="name">Name<sup>*</sup></label>
                            <input class="form-control" id="name" type="text" data-error="Enter valid name" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label" for="name">Phone Number<sup>*</sup></label>
                            <input class="form-control" id="name" type="text" data-error="Enter valid phone number" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label" for="email">Email<sup>*</sup></label>
                            <input class="form-control" id="email" type="email" data-error="Enter valid phone email" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Regarding :</label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Support
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Sales Enquiry
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Business Enquiry
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="textArea" class="control-label">Textarea</label>
                            <textarea class="form-control" rows="2" id="textArea"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-raised btn-info">Sign Up <i class="fa fa-send"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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