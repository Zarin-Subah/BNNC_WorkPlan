<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb light">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reports</li>
                </ol>
            </nav>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-list"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text" onclick="location.replace('<?php echo site_url('reports/work_plan_list'); ?>')"  onMouseOver="this.style.cursor = 'pointer'"><i class="far fa-share-square"></i> Annual Work Plan</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4" onclick="location.replace('<?php echo site_url('reports/work_progress_list'); ?>')"  onMouseOver="this.style.cursor = 'pointer'">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><i class="far fa-share-square"></i> Work Progress</span>
                </div>
            </div>
        </div>
    </div>
</div>