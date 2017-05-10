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
                                <h3 class="page-title">Manage User</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-container">
                    <div class="row gutter">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="tabbable tabs-left clearfix">
                                <?php if ($message != "") { ?>
                                    <div class="alert <?php echo ($message_type == true) ? 'alert-success' : 'alert-danger'; ?>">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <?php echo $message; ?>
                                    </div>
                                <?php } ?>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tabOne" data-toggle="tab" aria-expanded="false">Add User</a></li>
                                    <li class=""><a href="#tabTwo" data-toggle="tab" aria-expanded="true">Access Control</a></li>
                                    <li class=""><a href="#tabThree" data-toggle="tab" aria-expanded="false">Broadcast</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabOne">                                        
                                        <form method="post" id="make_deposit" role="form" name="make_deposit">
                                            <div class="table-responsive">
                                                <table id="" class="table table-bordered table-condensed no-margin">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Username<sup>*</sup></th>                                                          
                                                            <th>Block</th>
                                                            <th>Flat No</th>
                                                            <th>Password</th>
                                                            <th>Phone/Mobile</th>
                                                            <th>Intercom</th>
                                                            <th>Resident is</th>
                                                            <th>Email Address</th>
                                                        </tr>
                                                    </thead>                                       
                                                    <tbody>
                                                        <?php
                                                        for ($i = 1; $i <= 10; $i++) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td>
                                                                    <input id="<?php echo 'username-' . $i; ?>" name="username[]" size="6" type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <select name="block[]" id="<?php echo 'block-' . $i; ?>" class="form-control">
                                                                        <option value=""></option>
                                                                        <option value="6">6</option>
                                                                        <option value="21">21</option>
                                                                        <option value="22">22</option>
                                                                        <option value="23">23</option>
                                                                        <option value="24">24</option>
                                                                        <option value="25">25</option>
                                                                        <option value="26">26</option>
                                                                        <option value="27">27</option>
                                                                        <option value="28">28</option>
                                                                        <option value="29">29</option>
                                                                        <option value="30">30</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input id="<?php echo 'flatno-' . $i; ?>" name="flatno[]" size="2" type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input id="<?php echo 'password-' . $i; ?>" name="password[]"  type="password" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input id="<?php echo 'mobile-' . $i; ?>" name="mobile[]" size="6" type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input id="<?php echo 'intercom-' . $i; ?>" name="intercom[]" size="3" type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="<?php echo 'user_type-' . $i; ?>" id="<?php echo 'user_type_tenant-' . $i; ?>" value="Tenant">Tenant</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="<?php echo 'user_type-' . $i; ?>" id="<?php echo 'user_type_owner-' . $i; ?>" value="Owner" checked>Owner</label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input id="<?php echo 'email-' . $i; ?>" name="email[]" type="text" class="form-control">
                                                                </td>
                                                                <td><div id="<?php echo 'error-' . $i; ?>" style="color:RED"></div></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <div class="form-group">
                                                    <br/>
                                                    <label class="radio-inline"><input type="radio" name="send_invites" id="send_invites" value="<?php echo true; ?>">Also Send Invites</label>
                                                    <label class="radio-inline"><input type="radio" name="send_invites" id="not_send_invites" value="<?php echo false; ?>" checked="">Do not Send Invites</label>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-info" onclick = "return validate()" type="submit" name = "submit" id="CreateAccounts" value="add_users">Create User Account</button>                                                     
                                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url(); ?>auth_admin/manage_users'">Delete all of the above records</button>
                                                </div>
                                            </div>
                                        </form>
                                        <hr/>
                                        <div class="row">
                                            <p class="col-md-12"><br/>Your ADDA has the following Blocks : 6,21,22,23,24,25,26,27,28,29,30,gfg,gf,ggfg,gfg,1,2,3,4,5 </p>

                                            <div class="col-md-12">
                                                <a href="#add" data-toggle="collapse" class="col-md-12 col-sm-12 col-xs-12 bg-info p-15">To Add More blocks - Please click here</a>
                                                <div id="add" class="collapse">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="table-responsive">
                                                                <form method="post">
                                                                    <table class="table m-0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <input size="2" name="apt_0" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_1" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_0" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_1" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_0" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_1" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_0" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_1" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_0" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_1" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_0" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_1" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_0" type="text" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input size="2" name="apt_1" type="text" class="form-control">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="form-group">
                                                                        <button class="btn btn-info">Add Blocks</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 m-15"></div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <a href="#edit" data-toggle="collapse" class="col-md-12 col-sm-12 col-xs-12 bg-warning p-15">To Edit blocks - Please click here</a>
                                                <div id="edit" class="collapse">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal">
                                                                <br/>
                                                                <div class="form-group">
                                                                    <label for="" class="col-sm-5 control-label">Select block to rename :</label>
                                                                    <div class="col-sm-7">
                                                                        <select class="form-control">
                                                                            <option>1</option>
                                                                            <option>1</option>
                                                                            <option>1</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-sm-5 control-label">New block name :</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control" id="" placeholder="text">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-10">
                                                                        <button class="btn btn-info">Update Block</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tab one -->
                                    <div class="tab-pane" id="tabTwo">
                                        <div class="table-responsive">
                                            <form method="post">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl.No</th>
                                                            <th>User</th>
                                                            <th>Is Committee Member?</th>
                                                            <th>Designation</th>
                                                            <th>Manage Users</th>
                                                            <th>HelpDesk Tracker</th>
                                                            <th>Income Tracker</th>
                                                            <th>Expense Tracker</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        foreach ($users as $user) {
                                                            ?>
                                                        <input type="text" name="user_ids[]" value="<?php echo $user->uacc_id; ?>">
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><a href="#myModal" data-toggle="modal"><?php echo $user->uacc_username; ?> 6-124</a></td>
                                                            <td>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" name="committee_member[]" id="committee_member-<?php echo $user->uacc_id; ?>" value="1" <?php echo ($user->is_commitee_member == 1) ? 'checked' : ''; ?>>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="designation[]" id="designation<?php echo $user->uacc_id; ?>" placeholder="" class="form-control" value="<?php echo ($user->designation != "") ? $user->designation : '';?>">
                                                            </td>
                                                            <td>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" name="manage_users[]" id="manage_users-<?php echo $user->uacc_id; ?>" value="1" <?php echo (in_array('Manage Users', $user->permission)) ? 'checked' : '';?>>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>    
                                                        <?php
                                                        $i++;
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                                <button class="btn btn-info" name="add_permission" id="add_permission" value="add_permission" type="submit">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- tab two -->
                                    <div class="tab-pane" id="tabThree">
                                        <div class="row">
                                            <form class="form-horizontal">
                                                <div class="col-md-6">
                                                    <div class="table-responsive">
                                                        <h4>Broadcast message to :</h4>
                                                        <table class="table table-bordered table-condensed">
                                                            <tr>
                                                                <td>All Users</td>
                                                                <td>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Only Users who live here</td>
                                                                <td>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Only Primary Contacts</td>
                                                                <td>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>All Owners</td>
                                                                <td>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>All Tenants</td>
                                                                <td>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Association Committee</td>
                                                                <td>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>All Residents of Block</td>
                                                                <td>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
                                                                    &nbsp;&nbsp;
                                                                    <select class="">
                                                                        <option>1</option>
                                                                        <option>12</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Only Owners of Block</td>
                                                                <td>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
                                                                    &nbsp;&nbsp;
                                                                    <select class="">
                                                                        <option>1</option>
                                                                        <option>12</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>All Members of SubGroup</td>
                                                                <td>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
                                                                    &nbsp;&nbsp;
                                                                    <select class="">
                                                                        <option>1</option>
                                                                        <option>12</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Include Managers</td>
                                                                <td>
                                                                    <input type="checkbox" name="" id="optionsRadios1" value="option1" checked>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="1" class="col-sm-2 control-label">Message type</label>
                                                    <div class="col-sm-10">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Email
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> General SMS
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">  Essential SMS
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> App Notification / Flash
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="1" class="col-sm-2 control-label">Reply-To</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="1" placeholder="loremipsum@gmail.com">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="1" class="col-sm-2 control-label">CC</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="1" placeholder="loremipsum@gmail.com">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="1" class="col-sm-2 control-label">Subject</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="1" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="1" class="col-sm-2 control-label">Message</label>
                                                    <div class="col-sm-10">
                                                        <textarea id="txtEditor"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="1" class="col-sm-2 control-label">Send this</label>
                                                    <div class="col-sm-10">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Right Now 
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Later
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="1" class="col-sm-2 control-label">Send SMS</label>
                                                    <div class="col-sm-10">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Yes
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped table-condensed">
                                                            <tr>
                                                                <td>
                                                                    <div class="radio">
                                                                        <label>
                                                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                            Meeting
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input name="" id="" value="" size="" type="text">
                                                                    Meeting on
                                                                    <input name="" id="" value="day,dd-MMM-yy" size="20" maxlength="20" type="text">
                                                                    at 
                                                                    <select name="temp1_32" id="temp1_32">
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="10" selected="">10</option>
                                                                    </select>
                                                                    :
                                                                    <select name="temp1_42" id="temp1_42">
                                                                        <option value="0">0</option>
                                                                        <option value="15">15</option>
                                                                        <option value="30" selected="">30</option>
                                                                        <option value="45">45</option>
                                                                    </select>
                                                                    , venue <input name="temp1_52" id="temp1_52" value="Office" size="15" maxlength="15" type="text">. Please attend without fail.
                                                                    - Zerogravity Committee
                                                                    <br>
                                                                    <br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="radio">
                                                                        <label>
                                                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                            Water Disruption
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    Water Outage on <input name="" id="" value="day,dd-MMM-yy" size="20" maxlength="20" type="text">,
                                                                    <select name="" id="">
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10" selected="">10</option>
                                                                    </select>
                                                                    :
                                                                    <select name="" id="">
                                                                        <option value="0">0</option>
                                                                        <option value="15">15</option>
                                                                        <option value="30" selected="">30</option>
                                                                        <option value="45">45</option>
                                                                    </select>
                                                                    to
                                                                    <select name="" id="">
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12" selected="">12</option>
                                                                    </select>
                                                                    :
                                                                    <select name="" id="">
                                                                        <option value="0">0</option>
                                                                        <option value="15">15</option>
                                                                        <option value="30" selected="">30</option>
                                                                        <option value="45">45</option>
                                                                    </select>
                                                                    . Please make necessary arrangements.
                                                                    - Zerogravity Committee
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <button class="btn btn-info">Send</button>
                                                </div>
                                            </form>
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
        <script src="<?php echo base_url(); ?>include_files/admin/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/scrollup.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/flot/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/flot/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/flot/jquery.flot.time.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/flot/jquery.flot.resize.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/flot/custom/multi-bar-chart.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/flot/custom/profile-area.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/jvectormap/gdp-data.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/jvectormap/usa.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/jvectormap/custom/usa-profile.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/d3.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/c3/c3.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/c3/c3.custom.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/themeSwitcher.js"></script>

        <!-- datatable -->
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/dataTables.tableTools.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/autoFill.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/autoFill.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/fixedHeader.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/custom-datatables.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/common.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/wysiwyg-editor/editor.js"></script>
        <script type="text/javascript">$(function () {
                                                            $("#txtEditor").Editor();
                                                        });
        </script>
        <script>
            function validate() {

                var errorExists = false;

                var username = $('#username-1').val();
                var password = $('#password-1').val();
                var block = $('#block-1').val();
                var email = $('#email-1').val().trim();
                $('#email-1').val(email);
                var mobile = $('#mobile-1').val();
                var error = $('#error-1');
                if (!check(username, password, block, email, mobile, error)) {
                    errorExists = true;
                } else {
                    error.html("");
                }

                var username = $('#username-2').val();
                if (username != "") {
                    var password = $('#password-2').val();
                    var block = $('#block-2').val();
                    var email = $('#email-2').val().trim();
                    $('#email-2').val(email);
                    var mobile = $('#mobile-2').val();
                    var error = $('#error-2');
                    if (!check(username, password, block, email, mobile, error)) {
                        errorExists = true;
                    } else {
                        error.html("");
                    }
                }

                var username = $('#username-3').val();
                ;
                var password = $('#password-3').val();
                var block = $('#block-3').val();
                var email = $('#email-3').val().trim();
                $('#email-3').val(email);
                var mobile = $('#mobile-3').val();
                var error = $('#error-3');
                if (!check(username, password, block, email, mobile, error)) {
                    errorExists = true;
                } else {
                    error.html("");
                }

                var username = $('#username-4').val();
                var password = $('#password-4').val();
                var block = $('#block-4').val();
                var email = $('#email-4').val().trim();
                $('#email-2').val(email);
                var mobile = $('#mobile-4').val();
                var error = $('#error-4');
                if (!check(username, password, block, email, mobile, error)) {
                    errorExists = true;
                } else {
                    error.html("");
                }

                var username = $('#username-5').val();
                var password = $('#password-5').val();
                var block = $('#block-5').val();
                var email = $('#email-5').val().trim();
                $('#email-2').val(email);
                var mobile = $('#mobile-5').val();
                var error = $('#error-5');
                if (!check(username, password, block, email, mobile, error)) {
                    errorExists = true;
                } else {
                    error.html("");
                }


                var username = $('#username-6').val();
                var password = $('#password-6').val();
                var block = $('#block-6').val();
                var email = $('#email-6').val().trim();
                $('#email-6').val(email);
                var mobile = $('#mobile-6').val();
                var error = $('#error-6');
                if (!check(username, password, block, email, mobile, error)) {
                    errorExists = true;
                } else {
                    error.html("");
                }

                var username = $('#username-7').val();
                var password = $('#password-7').val();
                var block = $('#block-7').val();
                var email = $('#email-7').val().trim();
                $('#email-7').val(email);
                var mobile = $('#mobile-7').val();
                var error = $('#error-7');
                if (!check(username, password, block, email, mobile, error)) {
                    errorExists = true;
                } else {
                    error.html("");
                }

                var username = $('#username-8').val();
                var password = $('#password-8').val();
                var block = $('#block-8').val();
                var email = $('#email-8').val().trim();
                $('#email-8').val(email);
                var mobile = $('#mobile-8').val();
                var error = $('#error-8');
                if (!check(username, password, block, email, mobile, error)) {
                    errorExists = true;
                } else {
                    error.html("");
                }

                var username = $('#username-9').val();
                var password = $('#password-9').val();
                var block = $('#block-9').val();
                var email = $('#email-9').val().trim();
                $('#email-9').val(email);
                var mobile = $('#mobile-9').val();
                var error = $('#error-9');
                if (!check(username, password, block, email, mobile, error)) {
                    errorExists = true;
                } else {
                    error.html("");
                }

                var username = $('#username-10').val();
                var password = $('#password-10').val();
                var block = $('#block-10').val();
                var email = $('#email-10').val().trim();
                $('#email-10').val(email);
                var mobile = $('#mobile-10').val();
                var error = $('#error-10');
                if (!check(username, password, block, email, mobile, error)) {
                    errorExists = true;
                } else {
                    error.html("");
                }

                return !errorExists;
            }

            function check(firstName, aptNo, block, email, mobile, error) {
                var errorMsg = "";
                if (firstName.trim() == "" && aptNo.trim() == "" && email.trim() == "")
                    return true;
                if (firstName.trim() == "")
                    errorMsg = errorMsg + "FirstName cannot be empty<br/>";
                if (block.trim() == "")
                    errorMsg = errorMsg + "Block cannot be empty<br/>";
                if (aptNo.trim() == "")
                    errorMsg = errorMsg + "AptNo cannot be empty<br/>";
                if (mobile.trim() == "")
                    errorMsg = errorMsg + "Mobile No cannot be empty<br/>";
                if (email.trim() == "")
                    errorMsg = errorMsg + "Email cannot be empty<br/>";
                if (errorMsg == "")
                    return true;
                error.html(errorMsg);
            }
        </script>
    </body>
</html>

