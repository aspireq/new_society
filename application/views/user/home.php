<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $common; ?>
    </head>
    <body>
        <?php echo $header; ?>
        <div class="container-fluid">
            <div class="dashboard-wrapper col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-md-12">
                <?php echo $top_menu; ?>
                <div class="top-bar clearfix">
                    <!-- <div class="container-fluid">
                       <div class="row gutter">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                             <h3 class="page-title">My Adda</h3>
                          </div>
                       </div>
                    </div> -->
                </div>
                <div class="main-container">
                    <div class="row gutter">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php if ($message != "") { ?>
                                <div class="alert <?php echo ($message_type == true) ? 'alert-success' : 'alert-danger'; ?>">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $message; ?>
                                </div>
                            <?php } ?>
                            <div class="tabbable tabs-left clearfix">
                                <ul class="nav nav-tabs">
                                    <li class="<?php echo ($type == "News") ? 'active' : ''; ?>"><a href="#newsfeed" data-toggle="tab" aria-expanded="false">News Feed</a></li>
                                    <li class="<?php echo ($type == "Groups") ? 'active' : ''; ?>"><a href="#tabOne" data-toggle="tab" aria-expanded="false">Groups</a></li>
                                    <li class="<?php echo ($type == "Photos") ? 'active' : ''; ?>"><a href="#tabTwo" data-toggle="tab" aria-expanded="false">Photos</a></li>
                                    <li class=""><a href="#tabThree" data-toggle="tab" aria-expanded="false">Polls</a></li>
                                    <li class="<?php echo ($type == "Notice") ? 'active' : ''; ?>"><a href="#tabFour" data-toggle="tab" aria-expanded="false">Notices</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane <?php echo ($type == "News") ? 'active' : ''; ?>" id="newsfeed">
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1 feed-card">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img class="media-object" src="<?php echo base_url(); ?>include_files/admin/img/no-face.png" alt="...">
                                                                </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <h4 class="media-heading">User Name</h4>
                                                                <p>1-2 Owner (All Members)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <span><i class="fa fa-clock-o"></i>&nbsp;2 days ago</span>
                                                        <div class="dropdown">
                                                            <button class="dropbtn"><i class="icon-dots-three-vertical"></i></button>
                                                            <div class="dropdown-content">
                                                                <a href="#">Remove this Poll</a>
                                                                <a href="#">Extent Poll</a>
                                                                <a href="#">Close Poll</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <h4>Poll Quetion here ?</h4>
                                                    <form class="">
                                                        <div class="form-group feed-poll">
                                                            <label class="radio">
                                                                <input type="radio" name="1">a
                                                            </label>
                                                            <label class="radio">
                                                                <input type="radio" name="1">b
                                                            </label>
                                                            <label class="radio">
                                                                <input type="radio" name="1">c
                                                            </label>
                                                            <label class="radio">
                                                                <input type="radio" name="1">d
                                                            </label>
                                                        </div>
                                                        <div class="form-group text-center">
                                                            <button class="btn btn-info">Vote</button><br>
                                                            <span>0 Votes , 12 Days left </span>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="dotted-hr" />
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1 feed-card">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img class="media-object" src="<?php echo base_url(); ?>include_files/admin/img/no-face.png" alt="...">
                                                                </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <h4 class="media-heading">User Name</h4>
                                                                <p>1-2 Owner (All Members)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <span><i class="fa fa-clock-o"></i>&nbsp;2 days ago</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">  
                                                        <img src="<?php echo base_url(); ?>include_files/admin/img/not-found.jpg" alt="" class="img-responsive img-thumbnail">
                                                    </div>
                                                    <div class="col-md-3">  
                                                        <img src="<?php echo base_url(); ?>include_files/admin/img/not-found.jpg" alt="" class="img-responsive img-thumbnail">
                                                    </div>
                                                    <div class="col-md-3">  
                                                        <img src="<?php echo base_url(); ?>include_files/admin/img/not-found.jpg" alt="" class="img-responsive img-thumbnail">
                                                    </div>
                                                    <div class="col-md-3">  
                                                        <img src="<?php echo base_url(); ?>include_files/admin/img/not-found.jpg" alt="" class="img-responsive img-thumbnail">
                                                    </div>
                                                    <div class="col-md-12 text-right">
                                                        <a href="#">View All</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="dotted-hr" />
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1 feed-card">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img class="media-object" src="<?php echo base_url(); ?>include_files/admin/img/notice.png" alt="...">
                                                                </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <h4 class="media-heading">Notice Board</h4>
                                                                <p>(All Members)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <span><i class="fa fa-clock-o"></i>&nbsp;2 days ago</span>
                                                        <div class="dropdown">
                                                            <button class="dropbtn"><i class="icon-dots-three-vertical"></i></button>
                                                            <div class="dropdown-content">
                                                                <a href="#">View All Notice</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 noticecontent">
                                                    <h3>Notice title</h3>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   

                                    <div class="tab-pane <?php echo ($type == "Groups") ? 'active' : ''; ?>" id="tabOne">
                                        <a class="btn btn-info">Discover And Join Group</a>
                                        <a class="btn btn-info" data-toggle="collapse" href="#creategroup" aria-expanded="false" aria-controls="creategroup">Create a Group</a>
                                        <div class="collapse" id="creategroup">
                                            <div class="well">
                                                <form>
                                                    <div class="form-group">
                                                        <label class="control-label">Group Name</label>
                                                        <input class="form-control" type="text" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Group Description</label>
                                                        <textarea class="form-control" placeholder=""></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="radio">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="permission" id="" value="1" checked>Open For All
                                                            </label> 
                                                            <label class="radio-inline">
                                                                <input type="radio" name="permission" id="" value="2">Restricted
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-info">Create</button>
                                                        <button class="btn btn-default">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tab one -->
                                    <div class="tab-pane <?php echo ($type == "Photos") ? 'active' : ''; ?>" id="tabTwo">
                                        <div class="createalbum">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-info" data-toggle="collapse" data-target="#createalbum">Create Album</button>
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="collapse" id="createalbum">
                                                            <br/>
                                                            <input type="text" name="album_name" id="album_name" placeholder="Album Name" class="form-control" value="<?php echo (!empty($albumdata) && $albumdata['album_name'] != "") ? $albumdata['album_name'] : ''; ?>" >
                                                            <input type="text" name="page_type" id="page_type" value="Photos">
                                                            <input id="input-44" name="userFiles[]" type="file" multiple class="file-loading">
                                                            <div id="errorBlock" class="help-block"></div>
                                                            <button class="btn btn-info" type="submit" name="add_album" id="add_album" value="add_album">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <br/>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="thumbnail">
                                                        <img src="<?php echo base_url(); ?>include_files/admin/img/not-found.jpg" alt="...">
                                                        <div class="caption">
                                                            <p><span>Album 1 (4 Images)</span><span class="pull-right"><i class="icon-watch_later"></i>&nbsp;18 April 2017</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="albumimages hidden">
                                            <div class="row">
                                                <div id="album_images">
                                                    <div class="col-md-12">
                                                        <h4>Album Name 
                                                            <button class="btn btn-warning btn-back pull-right">Back</button>
                                                        </h4>
                                                        <br/>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img src="<?php echo base_url(); ?>include_files/admin/img/not-found.jpg" alt="" class="img-responsive" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img src="<?php echo base_url(); ?>include_files/admin/img/not-found.jpg" alt="" class="img-responsive" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img src="<?php echo base_url(); ?>include_files/admin/img/not-found.jpg" alt="" class="img-responsive" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img src="<?php echo base_url(); ?>include_files/admin/img/not-found.jpg" alt="" class="img-responsive" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tab two -->
                                    <div class="tab-pane" id="tabThree">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Start a Poll :</h4>
                                                <form class="form-horizontal row">
                                                    <div class="form-group col-md-8">
                                                        <label for="1" class="col-sm-2 control-label">Topic</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="1" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <label for="1" class="col-sm-2 control-label">Poll Description</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control"></textarea> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <label for="1" class="col-sm-2 control-label">Poll Option</label>
                                                        <div class="col-sm-10">
                                                            <ol class="poll-list">
                                                                <li>
                                                                    <input type="text" class="form-control poll-option" id="1" placeholder="">
                                                                    &nbsp;<a class="remove" href="#"><i class="icon-square-cross"></i></a>
                                                                </li>
                                                                <li>
                                                                    <input type="text" class="form-control poll-option" id="1" placeholder="">
                                                                    &nbsp;<a class="remove" href="#"><i class="icon-square-cross"></i></a>
                                                                </li>
                                                                <li>
                                                                    <input type="text" class="form-control poll-option" id="1" placeholder="">
                                                                    &nbsp;<a class="remove" href="#"><i class="icon-square-cross"></i></a>
                                                                </li>
                                                            </ol>
                                                            <a href="#">Add Poll Option</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <label for="1" class="col-sm-2 control-label">Poll Expiry Date</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="1" placeholder="dd-mm-yyyy"> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <div class="checkbox col-md-12">
                                                            <label class="checkbox-inline">
                                                                <input class="" type="checkbox">Allow Multiple Votes
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input class="" type="checkbox">One Vote per Flat
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input class="" type="checkbox">Anonymous Voting
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <label for="1" class="col-sm-2 control-label">Visible To</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control">
                                                                <option>All Members</option>
                                                                <option>Only Owners</option>
                                                                <option>Only Owners</option>
                                                                <optgroup label="My Groups">
                                                                    <option value="hello1">hello1</option>
                                                                    <option value="hello1">hello1</option>
                                                                </optgroup>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <button class="btn btn-info">Start Poll</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tab three -->
                                    <div class="tab-pane <?php echo ($type == "Notice") ? 'active' : ''; ?>" id="tabFour">
                                        <div class="createnotice row hidden <?php //echo ($message_type == false) ? '' : 'hidden'         ?>">
                                            <form class="form-horizontal col-sm-8" method="post">
                                                <div class="form-group">
                                                    <div class="radio col-sm-12">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="notice_type" value="Administration">&nbsp;&nbsp;Administration
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="notice_type" value="General" checked>&nbsp;&nbsp;General
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="notice_type" value="Buy/Rent/Sell">&nbsp;&nbsp;Buy/Rent/Sell
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Subject</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="notice_subject" id="notice_subject" class="form-control" value="<?php echo (!empty($noticedata) && $noticedata['subject'] != "") ? $noticedata['subject'] : ''; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">From E-mail</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="notice_email" id="notice_email" placeholder="email address" class="form-control" value="<?php echo $userinfo['uacc_email']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Select Expiry Date</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="notice_expiry_date" id="notice_expiry_date"  placeholder="yyyy-mm-dd" class="form-control" value="<?php echo (!empty($noticedata) && $noticedata['expiry_date'] != "") ? $noticedata['expiry_date'] : ''; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Brief Description</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" name="notice_description"><?php echo (!empty($noticedata) && $noticedata['description'] != "") ? $noticedata['description'] : ''; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Notice Recepients</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control" name="recepients" id="recepients">
                                                            <option value="All Users" <?php echo (!empty($noticedata) && $noticedata['recepients'] == "All Users") ? 'selected' : ''; ?>>All Users</option>
                                                            <option value="All Owners" <?php echo (!empty($noticedata) && $noticedata['recepients'] == "All Owners") ? 'selected' : ''; ?>>All Owners</option>
                                                            <option value="Only Primary Contacts" <?php echo (!empty($noticedata) && $noticedata['recepients'] == "Only Primary Contacts") ? 'selected' : ''; ?>>Only Primary Contacts</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Detailed Description</label>
                                                    <div class="col-md-10">
                                                        <textarea id="txtEditor" name="detailed_description"><?php echo (!empty($noticedata) && $noticedata['final_detailed_descrption'] != "") ? $noticedata['final_detailed_descrption'] : ''; ?></textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="final_detailed_descrption" id="final_detailed_descrption">
                                                <input type="hidden" name="page_type" id="page_type" value="Notice">
                                                <div class="form-group col-sm-12">
                                                    <button class="btn btn-info" name="add_notice" id="add_notice" value="add_notice">Post</button>
                                                    <button class="btn btn-default btn-cancel" type="button" onclick="window.location.href = '<?php echo base_url(); ?>user/home'">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="noticelist row">
                                            <?php //if ($notice == false) { ?>
                                            <div class="col-md-4">
                                                <button class="btn btn-info btn-createnotice" type="button" name="btn_add_notice" id="btn_add_notice">Create Notice</button>
                                            </div>                                            
                                            <form class="form-inline col-md-8" method="post">
                                                <div class="form-group pull-right">
                                                    <div class="input-group">
                                                        <div class="col-sm-9">
                                                            <select class="form-control">
                                                                <option>All Notice</option>
                                                                <option value="Administration">Admin Notices</option>
                                                                <option value="General">General Notices</option>
                                                                <option value="Buy/Rent/Sell">Buy/Rent/Sell</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group pull-right">
                                                    <div class="input-group">
                                                        <input id="search" type="text" name="" class="form-control" placeholder="Search Notice...">
                                                        <label class="input-group-addon" for="search"><i class="icon-search4"></i></label>
                                                    </div>
                                                </div>
                                            </form>                                            
                                            <div class="col-md-12">
                                                <br/>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.No.</th>
                                                                <th>Subject</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (!empty($results)) { ?>
                                                                <?php
                                                                if ($this->uri->segment(3) != "") {
                                                                    $record_counter = $this->uri->segment(3) + 1;
                                                                } else {
                                                                    $record_counter = 1;
                                                                }
                                                                array_pop($results);
                                                                foreach ($results as $data) {
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $record_counter; ?>
                                                                        </td>
                                                                        <td class="description">
                                                                            <h4><?php echo $data->subject; ?></h4>
                                                                            <p class="ellipsis"><?php echo $data->description; ?></p>
                                                                        </td>
                                                                        <td>
                                                                            <button class="btn btn-warning"><i class="icon-mode_edit"></i></button>
                                                                            <button class="btn btn-danger" type="button" onclick="delete_notice('<?php echo $data->id; ?>');"><i class="icon-cup"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $record_counter++;
                                                                }
                                                                ?>
                                                            <?php } else { ?>
                                                                <tr>
                                                                    <td colspan="3" class="text-center">
                                                                        No Notices available
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <nav aria-label="Page navigation">
                                                        <ul class="pagination pull-right">                                        
                                                            <?php
                                                            foreach ($links as $key => $link) {
                                                                echo "<li>" . $link . "</li>";
                                                            }
                                                            ?>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                            <?php //} ?>
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
        <div class="modal fade" id="delete_notice" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete Notice</h4>
                        </div>
                        <div class="modal-body">
                            <p id="confirmation_text">Are you sure want to delete this notice ?</p>
                        </div>
                        <input type="hidden" name="page_type" id="page_type" value="Notice">
                        <input type="hidden" name="notice_id" id="notice_id">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Delete</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/dataTables.tableTools.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/autoFill.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/autoFill.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/fixedHeader.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/datatables/custom-datatables.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/common.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/wysiwyg-editor/editor.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript">
                                                                                $(function () {
                                                                                    $("#txtEditor").Editor();
                                                                                });
        </script>
        <script>
            $(document).ready(function () {
                $("#input-44").fileinput({
                    uploadUrl: '/file-upload-batch/2',
                    maxFilePreviewSize: 800
                });
                $('#notice_expiry_date').datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    todayHighlight: true
                });
            });
            function delete_notice(notice_id) {
                $('#notice_id').val();
                $('#delete_notice').modal('show');
                $('#notice_id').val(notice_id);
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#add_notice').click(function () {
                    var textareaval = $('.Editor-editor').html();
                    $('#final_detailed_descrption').val(textareaval);
                });
                $(".btn-cancel").click(function (e) {
                    e.preventDefault();
                    $(".noticelist").removeClass('hidden');
                    $(".createnotice").addClass('hidden');
                });

                $(".btn-createnotice").click(function (e) {
                    e.preventDefault();
                    $(".createnotice").removeClass('hidden');
                    $(".noticelist").addClass('hidden');
                });
                $(".createalbum .thumbnail").click(function (e) {
                    e.preventDefault();
                    $(".albumimages").removeClass('hidden');
                    $(".createalbum").addClass('hidden');
                });
                $(".btn-back").click(function (e) {
                    e.preventDefault();
                    $(".createalbum").removeClass('hidden');
                    $(".albumimages").addClass('hidden');
                });
            });
        </script>
    </body>
</html>

