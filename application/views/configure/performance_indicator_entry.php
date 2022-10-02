<style>
    .select_members,.upload_resolution,.select_changed_members,.budget_section{
        display: none;
    }
</style>
<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb light">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Deliverable</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Add Deliverable
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="sub_activity" class="col-form-label">Activity</label>
                                <select id="sub_activity" name="sub_activity" class="form-control" required>
                                    <option value="">Select</option>
                                    <?php
                                    foreach ($sub_activity_list as $activity) {
                                        ?>
                                        <option value="<?php echo $activity['id']; ?>"><?php echo $activity['sub_activity']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-7">
                                <label for="indicator" class="col-form-label">Deliverable</label>
                                <input type="text" class="form-control" id="indicator" name="indicator" placeholder="" required>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>