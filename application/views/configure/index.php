<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb light">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <!--<li class="breadcrumb-item"><a href="#">Analytics</a></li>-->
                    <li class="breadcrumb-item active" aria-current="page">Configure</li>
                </ol>
            </nav>
        </div>
        <div class="col-12 col-sm-6 col-md-4" onclick="location.replace('<?php echo site_url('configure/major_activity_list'); ?>')"  onMouseOver="this.style.cursor = 'pointer'">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-home"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">প্রধান কার্যক্রম সমূহ</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4" onclick="location.replace('<?php echo site_url('configure/sub_activity_list'); ?>')"  onMouseOver="this.style.cursor = 'pointer'">
            <div class="info-box">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">উপ কার্যক্রম সমূহ</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4" onclick="location.replace('<?php echo site_url('configure/index'); ?>')"  onMouseOver="this.style.cursor = 'pointer'">
            <div class="info-box">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">কর্ম সম্পাদন সূচক সমূহ</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
</div>