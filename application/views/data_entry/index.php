<style>
    a:hover{
        color:#179978;
    }
</style>
<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb light">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <!--<li class="breadcrumb-item"><a href="#">Analytics</a></li>-->
                    <li class="breadcrumb-item active" aria-current="page">Data Entry</li>
                </ol>
            </nav>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
                <div class="card-header bg-success text-center text-white">Work Plan</div>
                <div class="card-body">
                    <ul type="square">
                        <li><i class="far fa-share-square"></i> <a href="<?php echo site_url('data_entry/work_plan_add'); ?>">Add new annual plan</a></li>
                        <li><i class="far fa-share-square"></i> <a href="<?php echo site_url('data_entry/work_plan_list'); ?>">Update the previous annual plan</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
                <div class="card-header bg-brown text-center text-white">Work Progress</div>
                <div class="card-body">
                    <ul type="square">
                        <li><i class="far fa-share-square"></i> <a href="<?php echo site_url('data_entry/work_plan_list_with_progress'); ?>">Add the progress of the annual plan </a></li>
                        <li><i class="far fa-share-square"></i> <a href="<?php echo site_url('data_entry/work_progress_list');?>">Update the progress of the plan</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>