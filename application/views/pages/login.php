<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrap.gallery/unify-admin/design-3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Feb 2019 16:58:43 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Unify Admin Panel" />
    <meta name="keywords" content="Login, Unify Login, Admin, Dashboard, Bootstrap4, Sass, CSS3, HTML5, Responsive Dashboard, Responsive Admin Template, Admin Template, Best Admin Template, Bootstrap Template, Themeforest" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="images/bncc_logo.png" />
    <title>Bangladesh National Nutrition Council</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Common CSS -->
    <link rel="stylesheet" href="<?php echo base_url('resource/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('resource/fonts/icomoon/icomoon.css'); ?>" />

    <!-- Mian and Login css -->
    <link rel="stylesheet" href="<?php echo base_url('resource/css/main.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('resource/css/custom.css'); ?>" />
</head>

<body class="login-bg">

    <div class="container">
        <div class="login-screen row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <center>
                    <div style="font-size:20px;margin:15px 0px;color:#148367;font-weight: bold;">Annual Workplan Monitoring System</div>
                </center>
                <form action="" method="POST">
                    <div class="login-container">
                        <div class="row no-gutters">
                            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                                <div class="login-box">
                                    <a href="#" class="login-logo">
                                        <img src="<?php echo base_url('resource/images/bnnc_logo.png'); ?>" alt="Unify Admin Dashboard" />
                                    </a>
                                    <div class="login-heading">Bangladesh National Nutrition Council</div>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="username"><i class="icon-account_circle"></i></span>
                                        <input type="text" class="form-control" name="login_id" placeholder="User ID" aria-label="username" aria-describedby="username" value="<?php
                                                                                                                                                                                if (!empty($_POST)) {
                                                                                                                                                                                    echo $_POST['login_id'];
                                                                                                                                                                                }
                                                                                                                                                                                ?>" required>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
                                        <input type="password" class="form-control" name="login_password" placeholder="Password" aria-label="Password" aria-describedby="password" value="<?php
                                                                                                                                                                                            if (!empty($_POST)) {
                                                                                                                                                                                                echo $_POST['login_password'];
                                                                                                                                                                                            }
                                                                                                                                                                                            ?>" required>
                                    </div>
                                    <div class="actions clearfix">
                                        <a href="forgot-pwd.html">Forget Password?</a>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                    <a href="<?php echo site_url('/'); ?>" class="btn btn-primary"><span class="icon-back"></span> Back to Home</a>
                                    <!--
                                        <div class="credit">কারিগরি সহযোগিতায়:</div>
                                        <div class="credit">নিউট্রিশন ইন্টারন্যাশনাল</div>
                                        
                                        <div class="credit-logo">
                                            <img src="<?php echo base_url('resource/images/ni.jpg'); ?>" style="width:100px;" alt="Unify Admin Dashboard" />
                                            <img src="<?php echo base_url('resource/images/UK aid.png'); ?>" style="width:50px;" alt="Unify Admin Dashboard" />
                                        </div>-->
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                                <div class="login-slider"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="main-footer no-bdr fixed-btm">
        <div class="container">
            Copyright @BNNC 2017.
        </div>
    </footer>
    <?php
    $this->load->view('shared/js_links.php');
    $this->load->view('shared/alert.php');
    ?>
</body>

</html>