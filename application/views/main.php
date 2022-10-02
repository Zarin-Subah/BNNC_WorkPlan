<!doctype html>
<html lang="en">
    <!-- Mirrored from bootstrap.gallery/unify-admin/design-3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Feb 2019 16:58:43 GMT -->
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="BNNC National Workplan monitoring system" />
        <meta name="keywords" content="BNNC, BNNC workplan monitoring system" />
        <meta name="author" content="BNNC National Workplan monitoring system" />
        <link rel="shortcut icon" href="<?php echo base_url('resource/images/bd_logo.png'); ?>" />
        <title>Bangladesh National Nutrition Council</title>

        <?php
        include_once('shared/css_links.php');
        ?>
        <style>
            .hiddenRow {
                padding: 0 !important;
                background-color: #eeeeee;
                font-size: 13px;
            }
            .accordian-body span{
                color:#a2a2a2 !important;
            }
            .collapsable-table .accordion-toggle {
                cursor: pointer;
            }
            .bg-info{
                color:white;
                font-weight: bold;
            }
            .my-div-icon-green{
                height:1px;
                width:1px;
                border-radius: 50%;
                background-color: #72B026;
                border:1px solid #000;
            }
            .my-div-icon-blue{
                height:1px;
                width:1px;
                border-radius: 50%;
                background-color: #36A5D7;
                border:1px solid #000;
            }
            .my-div-icon-orange{
                height:1px;
                width:1px;
                border-radius: 50%;
                background-color: #F1942F;
                border:1px solid #000;
            }
            .my-div-icon-red{
                height:1px;
                width:1px;
                border-radius: 50%;
                background-color: red;
                border:1px solid #000;
            }
            .legend-table td{
                width:70px;
                font-weight: bold;
                color:white;
                text-align: center;
            }
            .marker{
                height: 50px;
                width:100px;
                padding:5px;
                font-weight: bold;
            }
            .btn-custom-min{
                padding:5px;
            }
            #basicExample td,#basicExample th{
                font-size: 12px;
            }
            <?php
            $fiscal_years = sql::rows("fiscal_year", " is_active=1", "*");
            foreach ($fiscal_years as $fiscal_year) {
                echo ".bg{$fiscal_year['fiscal_year']}{background-color: {$fiscal_year['row_color']}}";
            }
            ?>
/*            .bg2019-2020{
                background-color: #fcb2ae;
            }
            .bg2020-2021{
                background-color: #c7dcfc;
            }*/
        </style>

    </head>
    <body>
        <!-- BEGIN .app-wrap -->
        <div class="app-wrap">
            <!-- BEGIN .app-heading -->
            <header class="app-header">
                <div class="container-fluid">
                    <div class="row gutters">
                        <div class="col-2">
                            <a class="mini-nav-btn" href="#" id="app-side-mini-toggler">
                                <i class="icon-arrow_back"></i>
                            </a>
                            <a href="#app-side" data-toggle="onoffcanvas" class="onoffcanvas-toggler" aria-expanded="true">
                                <i class="icon-chevron-thin-left"></i>
                            </a>
                        </div>
                        <div class="col-2" align="right">
                            <a href="<?php echo site_url('dashboard'); ?>"><img src="<?php echo base_url('resource/images/bd_logo.png'); ?>" style="height:60px;width:60px;"/></a>
                        </div>
                        <div class="col-4" align="center">
                            <div class="head-title">
                                <span class="title">Bangladesh National Nutrition Council</span>
                            </div>
                        </div>
                        <div class="col-2">
                            <a href="<?php echo site_url('dashboard'); ?>"><img src="<?php echo base_url('resource/images/bnnc_logo.png'); ?>" style="height:60px;width:60px;"/></a>
                        </div>
                        <div class="col-2">
                            <ul class="header-actions">
                                <li>
                                    <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                        <img class="avatar" src="<?php echo base_url('resource/'); ?>images/user.jpg" alt="User Thumb" />
                                        <span class="user-name">
                                            <?php
                                            if ($this->session->userdata('user_name') != '') {
                                                echo $this->session->userdata('user_name');
                                            } else {
                                                echo "Guest User";
                                            }
                                            ?>
                                        </span>
                                        <i class="icon-chevron-small-down"></i>
                                    </a>
                                    <?php
                                    if ($this->session->userdata('is_logged_id') == TRUE) {
                                        ?>
                                        <div class="dropdown-menu lg dropdown-menu-right" aria-labelledby="userSettings">
                                            <ul class="user-settings-list">
                                                <li>
                                                    <a href="<?php echo site_url('profile/user_profile'); ?>">
                                                        <div class="icon">
                                                            <i class="icon-account_circle"></i>
                                                        </div>
                                                        <p>Update Profile</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo site_url('login/changePass');?>">
                                                        <div class="icon red">
                                                            <i class="icon-cog3"></i>
                                                        </div>
                                                        <p>Change Password</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="filters.html">
                                                        <div class="icon yellow">
                                                            <i class="icon-schedule"></i>
                                                        </div>
                                                        <p>Activity</p>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="logout-btn">
                                                <a href="<?php echo site_url('login/logout'); ?>" class="btn btn-primary">Logout</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: .app-heading -->
            <!-- BEGIN .app-container -->
            <div class="app-container">
                <!-- BEGIN .app-side -->
                <?php
                include_once('shared/sidebar.php');
                ?>
                <!-- END: .app-side -->

                <!-- BEGIN .app-main -->
                <div class="app-main">
                    <!-- BEGIN .main-content -->
                    <?php include_once $dir . '/' . $page . '.php'; ?>
                    <!-- END: .main-content -->
                </div>
                <!-- END: .app-main -->
            </div>
            <!-- END: .app-container -->
            <!-- BEGIN .main-footer -->
            <footer class="main-footer fixed-btm">
                Copyright BNNC 2020.
            </footer>
            <!-- END: .main-footer -->
        </div>
        <!-- END: .app-wrap -->

        <?php
        include_once('shared/js_links.php');
        include_once('shared/alert.php');
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script>
            var $j = jQuery.noConflict();
            function getSubStrategy(strategy_code, k) {
                //alert(strategy_code);
                var datasend = 'strategy_code=' + strategy_code;
                //alert(datasend);
                $.ajax({
                    type: "POST",
                    data: datasend,
                    url: '<?= site_url(); ?>/other/sub_strategy_list',
                    cache: false,
                    success: function (msg) {
                        var data = "";
                        data = $.parseJSON(msg);
                        //alert(data.sub_strategry_list);
                        var html = "<option value=''>Select</option>";
                        var html2 = "<option value=''>Select</option>";
                        var i;
                        for (i = 0; i < data.sub_strategry_list.length; i++) {
                            html += '<option value=' + data.sub_strategry_list[i].sub_strategy_code + '>' + data.sub_strategry_list[i].sub_strategy_code + '</option>';
                        }
                        for (i = 0; i < data.activity_list.length; i++) {
                            html2 += '<option value=' + data.activity_list[i].id + '>' + data.activity_list[i].activity_code + '. ' + data.activity_list[i].activity_name + '</option>';
                        }
                        //alert(html);
                        $('#sub_strategy' + k).html(html);
                        $('#activity' + k).html(html2);
                    }
                });
            }
        </script>
        <script>
            function getActivity(sub_strategy_code, k) {
                //alert(activity_id);
                var datasend = 'sub_strategy_code=' + sub_strategy_code;
                //alert(datasend);
                $.ajax({
                    type: "POST",
                    data: datasend,
                    url: '<?= site_url(); ?>/other/activity_list',
                    cache: false,
                    success: function (msg) {
                        var data = "";
                        data = $.parseJSON(msg);
                        var html2 = "<option value=''>Select</option>";
                        var i;
                        for (i = 0; i < data.activity_list.length; i++) {
                            html2 += '<option value=' + data.activity_list[i].id + '>' + data.activity_list[i].activity_code + '. ' + data.activity_list[i].activity_name + '</option>';
                        }
                        //alert(html2);
                        $('#activity' + k).html(html2);
                    }
                });
            }
        </script>
        <script>
            function getSubActivity(activity_id, i) {
                //alert(activity_id);
                var datasend = 'activity_id=' + activity_id;
                //alert(datasend);
                $.ajax({
                    type: "POST",
                    data: datasend,
                    url: '<?= site_url(); ?>/other/sub_activity_list',
                    cache: false,
                    success: function (msg) {
                        //alert(msg);
                        $('#sub_activity' + i).html(msg);
                        //$('#upazila').html("<option value=''>Select District First</option>");

                    }
                });
            }
        </script>
        <script>
            function getIndicator(sub_activity_id, i) {
                //alert(sub_activity_id);
                var datasend = 'sub_activity_id=' + sub_activity_id;
                //alert(datasend);
                $.ajax({
                    type: "POST",
                    data: datasend,
                    url: '<?= site_url(); ?>/other/indicator_list',
                    cache: false,
                    success: function (msg) {
                        //alert(msg);
                        $('#indicator' + i).html(msg);
                        //$('#upazila').html("<option value=''>Select District First</option>");

                    }
                });
            }
        </script>
        <!--For Collapseable Table-->
        <script>
            $('.accordion-toggle').click(function () {
                $('.hiddenRow').hide();
                $(this).next('tr').find('.hiddenRow').show();
            });
        </script>
        <script>
            // Basic DataTable
            $(function () {
                $('#basicExample').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });
            });
        </script>
        <script>
            $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();
            });
        </script>
        <script>
            $('#fromDate').Monthpicker({
                onSelect: function () {
                    $('#toDate').Monthpicker('option', {minValue: $('#fromDate').val()});
                }
            });
            $('#toDate').Monthpicker({
                onSelect: function () {
                    $('#fromDate').Monthpicker('option', {maxValue: $('#toDate').val()});
                }
            });
        </script>
    </body>
</html>