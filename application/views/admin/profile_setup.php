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
                                    <li class="active"><a href="#tabOne" data-toggle="tab" aria-expanded="false">Home</a></li>
                                    <li class=""><a href="#tabTwo" data-toggle="tab" aria-expanded="true">Images</a></li>
                                    <li class=""><a href="#tabThree" data-toggle="tab" aria-expanded="false">Location</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabOne">
                                        <h4>Welcome Message</h4>
                                        <p>Here you can enter a greeting message for outsiders, instructions for owners/tenants to join your ADDA, status of your Project ( if it is under construction) etc.</p>
                                        <form method="post">
                                            <div class="form-group">                                                
                                                <textarea id="txtEditor" name="txtEditor" rows="10" class="form-control"><?php echo (!empty($appartment_info) && $appartment_info->info != "") ? $appartment_info->info : '' ?></textarea>
                                            </div>
                                            <button class="btn btn-info" name="add_info" id="add_info" value="add_info" type="submit">Save</button>
                                        </form>
                                    </div>
                                    <!-- tab one -->
                                    <div class="tab-pane" id="tabTwo">
                                        <form method="post" id="society_images" enctype="multipart/form-data">
                                            <input type="hidden" name="code" id="code" value="1234">
                                            <div class="row oldimage">
                                                <?php foreach ($appartment_images as $image) { ?>                                                
                                                    <div class="col-md-3">
                                                        <div class="thumbnail">
                                                            <a class="close"><i class="fa fa-times-circle"></i></a>
                                                            <input type="hidden" name="old_company_images[]" id="<?php echo $image->image; ?>" value="<?php echo $image->image; ?>">
                                                            <img src="<?php echo base_url(); ?>include_files/appartment_images/<?php echo $image->image; ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Select File</label>
                                                <input type="file" id="input-44" name="userFiles[]" multiple class="file-loading form-control">
                                                <div id="errorBlock" class="help-block"></div>
                                            </div>
                                            <button class="btn btn-info" name="add_images" id="add_images" value="add_images" type="submit">Save</button>
                                        </form>
                                    </div>
                                    <!-- tab two -->
                                    <div class="tab-pane" id="tabThree">
                                        <div class="row">
                                            <h4>Apartment Complex Address</h4>
                                            <form class="form-horizontal" method="post" id="appartment_info">
                                                <div class="form-group col-md-8">
                                                    <label for="1" class="col-sm-2 control-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <textarea type="text" class="form-control" name="address"><?php echo (!empty($appartment_info) && $appartment_info->address != "") ? $appartment_info->address : '' ?></textarea> 
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="city_name" class="col-sm-2 control-label">City</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="city_name" name="city_name" value="<?php echo (!empty($appartment_info) && $appartment_info->city != "") ? $appartment_info->city : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="state_name" class="col-sm-2 control-label">State</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="state_name" name="state_name" value="<?php echo (!empty($appartment_info) && $appartment_info->state != "") ? $appartment_info->state : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="pincode" class="col-sm-2 control-label">Pin Code</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo (!empty($appartment_info) && $appartment_info->pincode != "") ? $appartment_info->pincode : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="phone" class="col-sm-2 control-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo (!empty($appartment_info) && $appartment_info->phone != "") ? $appartment_info->phone : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="builder_url" class="col-sm-2 control-label">Building Url</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="builder_url" name="builder_url" value="<?php echo (!empty($appartment_info) && $appartment_info->builder_url != "") ? $appartment_info->builder_url : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="association_name" class="col-sm-2 control-label">Association Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="association_name" name="association_name" value="<?php echo (!empty($appartment_info) && $appartment_info->association_name != "") ? $appartment_info->association_name : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="amenities" class="col-sm-2 control-label">Amenities</label>
                                                    <div class="col-sm-10">
                                                        <textarea type="text" class="form-control" name="amenities" id="amenities"><?php echo (!empty($appartment_info) && $appartment_info->amenities != "") ? $appartment_info->amenities : '' ?></textarea> 
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <button class="btn btn-info" type="submit" name="appartmentinfo" id="appartmentinfo" value="appartmentinfo">Save</button>
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
        <script src="<?php echo base_url(); ?>include_files/admin/plugin/imageupload/js/plugins/sortable.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/plugin/imageupload/js/fileinput.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/plugin/imageupload/themes/explorer/theme.js" type="text/javascript"></script>
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
        <script type="text/javascript">
            $(function () {
                //$("#txtEditor").Editor();               
            });
        </script>
        <script>
            $(document).ready(function () {
                $('.close').click(function () {
                    $(this).parents('.oldimage .col-md-3').remove();
                    $(this).closest('input').remove();
                });
                $('#pincode, #phone').on('change keyup', function () {
                    var sanitized = $(this).val().replace(/[^-.0-9]/g, '');
                    sanitized = sanitized.replace(/(.)-+/g, '$1');
                    sanitized = sanitized.replace(/\.(?=.*\.)/g, '');
                    $(this).val(sanitized);
                });
                $("#input-44").fileinput({
                    uploadUrl: '/file-upload-batch/2',
                    maxFilePreviewSize: 800
                });
            });
        </script>
    </body>
</html>

