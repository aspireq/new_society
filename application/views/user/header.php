<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Jignesh Bhaty 6-124</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="" name="" placeholder="First Name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<header class="clearfix">
    <div class="logo"><img src="<?php echo base_url(); ?>include_files/admin/img/logo.png" alt="Logo"></div>
    <div class="pull-right">
        <ul id="header-actions" class="clearfix">
            <li class="list-box user-admin dropdown">
                <div class="admin-details">
                    <div class="name">Welcome,</div>
                    <div class="designation"><?php echo ucfirst($userinfo['uacc_username']); ?></div>
                </div>
                <a id="drop4" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-account_circle"></i></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-content"><a href="#"><i class="icon-warning2"></i>Update Password<br><span>Your password will expire in 7 days.</span></a> <a href="profile.html">Edit Profile</a> <a href="forgot-pwd.html">Change Password</a> <a href="profile.html">Settings</a> 
                        <a href="<?php echo base_url(); ?>home/logout">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <?php if($userinfo['uacc_group_fk'] == 3) {  ?>
    <a href="<?php echo base_url(); ?>auth_admin" class="support">Admin</a>
    <?php } ?>
    <div class="custom-search"><input type="text" class="search-query" placeholder="Search here ..."> <i class="icon-search4"></i></div>
</header>