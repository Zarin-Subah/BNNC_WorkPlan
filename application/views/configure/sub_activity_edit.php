<style>
    .select_members,
    .upload_resolution,
    .select_changed_members,
    .budget_section {
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
                    <li class="breadcrumb-item active" aria-current="page">Sub Activity</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Edit Sub Activity
                </div>
                <?php
                foreach ($sub_activity_edit as $sub_activity)
                ?>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="activity" class="col-form-label">Output</label>
                                <select id="activity" name="activity" class="form-control" required>
                                    <option value="">Select</option>
                                    <?php
                                foreach ($major_activity_list as $major_activity) {
                                    ?>
                                        <option value="<?php echo $major_activity['id']; ?>" <?php if ($major_activity['id'] == $sub_activity['id']) {
                                                                                                    echo "selected";
                                                                                                } ?>><?php echo $major_activity['activity_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-7">
                                <label for="sub_activity" class="col-form-label">Activity</label>
                                <input type="text" class="form-control" id="sub_activity" name="sub_activity" placeholder="" value="<?php echo $sub_activity['sub_activity_name']; ?>" required>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>