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
                </div>
                <div class="main-container">

                    <div class="myflatlist">
                        <div class="row gutter">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form class="form-horizontal col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">My Flat:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control">
                                                <option>1-2</option>
                                                <option>3-4</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="col-md-4 text-center" id="members">
                                    <img src="<?php echo base_url(); ?>include_files/admin/img/members.png" class="img-center" />
                                    <h4><span>1</span>&nbsp;Members</h4>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="<?php echo base_url(); ?>include_files/admin/img/vehicle.png" class="img-center" />
                                    <h4><span>1</span>&nbsp;Vehicle</h4>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="<?php echo base_url(); ?>include_files/admin/img/visitors.png" class="img-center" />
                                    <h4><span>1</span>&nbsp;Visitors</h4>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="<?php echo base_url(); ?>include_files/admin/img/documnents.png" class="img-center" />
                                    <h4><span>1</span>&nbsp;Documents</h4>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="<?php echo base_url(); ?>include_files/admin/img/staff.png" class="img-center" />
                                    <h4><span>1</span>&nbsp;Staff</h4>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="<?php echo base_url(); ?>include_files/admin/img/booking.png" class="img-center" />
                                    <h4><span>1</span>&nbsp;Bookings</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row hidden memberdetail">
                        <div class="col-md-12">
                            <button class="btn btn-info btn-back">Back</button>
                            <hr>
                        </div>
                        <div class="col-md-6 clearfix">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">My Flat:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>1-2</option>
                                            <option>3-4</option>
                                        </select>
                                    </div>
                                </div>
                            </form> 
                        </div> 
                        <div class="col-md-12">
                            <div class="media">
                                <div class="media-left">
                                    <img src="<?php echo base_url(); ?>include_files/admin/img/no-face.png" class="media-object">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">UserName</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $footer; ?>
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
        <script type="text/javascript">$(function () {
                $("#txtEditor").Editor();
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#input-44").fileinput({
                    uploadUrl: '/file-upload-batch/2',
                    maxFilePreviewSize: 800
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {

                $("#members").click(function (e) {
                    e.preventDefault();
                    $(".memberdetail").removeClass('hidden');
                    $(".myflatlist").addClass('hidden');
                });
                $(".btn-back").click(function (e) {
                    e.preventDefault();
                    $(".myflatlist").removeClass('hidden');
                    $(".memberdetail").addClass('hidden');
                });
            });
        </script>
    </body>
</html>

