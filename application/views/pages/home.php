<!DOCTYPE html>
<html lang="bn">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <!-- Fevicon -->
        <link rel="shortcut icon" href="<?php echo base_url('resource/images/bd_logo.png'); ?>" />

        <title>মন্ত্রণালয় ভিত্তিক পুষ্টি পরিকল্পনা</title>

        <meta name="keyword" content="Nutrition">
        <meta name="description" content="Nutrition">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resource/home/css/bootstrap.min.css">

        <!-- Google Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> -->

        <!-- Main Style CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resource/home/css/style.css">
        <style>
            .container{
                zoom:85%;
            }
        </style>
    </head>
    <body>

        <div class="home-content">

            <!-- Login -->

            <div class="container-fluid">
                <div class="container-home-screen">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-center pb-4">
                                    <img src="<?php echo base_url(); ?>/resource/home/img/logo-nutrition.png" alt="Nutrition">
                                </div>
                                <div class="d-flex justify-content-center pb-5">
                                    <h1 class="text-center d-block text-white">BNNC Workplan</h1>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="home-left">
                                    <p class="mt-4 mt-lg-5">
                                        &nbsp;
                                    </p>
                                    <div style="display:inline-block;" ><h5 class="mt-4 mr-2" style="display:inline-block;">Click on the buttons on the side to see the details</h5></div>
                                    <div style="display:inline-block;" ><img src="<?php echo base_url(); ?>/resource/home/img/arrow-right.png" alt="Nutrition"></div>
                                </div>
                            </div>  
                            <div class="col-md-12 col-lg-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="<?php echo site_url('dashboard');?>">
                                            <div class="home-right mt-4 mt-lg-0">
                                                <img src="<?php echo base_url(); ?>/resource/home/img/icon-dashboard.png" alt="Nutrition">
                                                <h4 class="mt-2">Dashboard</h4>
                                            </div>
                                        </a>  
                                    </div>  
                                    <div class="col-md-6">
                                        <a href="<?php echo site_url('data_entry/work_plan_add');?>">
                                            <div class="home-right mt-4 mt-lg-0">
                                                <img src="<?php echo base_url(); ?>/resource/home/img/icon-planning.png" alt="Nutrition">
                                                <h4 class="mt-2">Workplan Entry</h4>
                                            </div>
                                        </a>
                                    </div> 
                                    <div class="col-md-6">
                                        <a href="<?php echo site_url('data_entry/work_plan_list_with_progress');?>">
                                            <div class="home-right mt-4">
                                                <img src="<?php echo base_url(); ?>/resource/home/img/icon-progress.png" alt="Nutrition">
                                                <h4 class="mt-2">Progress Entry</h4>
                                            </div>
                                        </a>
                                    </div> 
                                    <div class="col-md-6">
                                        <a href="<?php echo site_url('reports');?>">
                                            <div class="home-right mt-4">
                                                <img src="<?php echo base_url(); ?>/resource/home/img/icon-report.png" alt="Nutrition">
                                                <h4 class="mt-2">Reports</h4>
                                            </div>
                                        </a>
                                    </div> 
                                    <div class="col-md-6">
                                        <a href="<?php echo site_url('admin_area');?>">
                                            <div class="home-right mt-4">
                                                <img src="<?php echo base_url(); ?>/resource/home/img/icon-management.png" alt="Nutrition">
                                                <h4 class="mt-2">System Management</h4>
                                            </div>
                                        </a>
                                    </div> 
                                    <div class="col-md-6">
                                        <a href="<?php echo base_url();?>resource/documents/User_Manual.pdf">
                                            <div class="home-right mt-4" id="using">
                                                <img src="<?php echo base_url(); ?>/resource/home/img/icon-manual.png" alt="Nutrition">
                                                <h4 class="mt-2">User Manual</h4>
                                            </div>
                                        </a>
                                    </div>  
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>  

            <!-- /Login --> 

        </div>

        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <!-- Main Js -->


    </body>
</html>
