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
                    <li class="breadcrumb-item active" aria-current="page">Edit Activity</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Edit Major Activity
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-row">
                            <?php
                            foreach ($major_activity_edit as $major_activity)
                                
                                ?>
                            <div class="form-group col-md-3">
                                <label for="thematic_area" class="col-form-label">Thematic Area</label>
                                <select id="assign_for" name="thematic_area" class="form-control" required>
                                    <option value="">Select</option>
                                    <?php
                                    foreach ($thematic_area_list as $thematic_area) {
                                        ?>
                                        <option value="<?php echo $thematic_area['id']; ?>" <?php
                                        if ($major_activity['thematic_area'] == $thematic_area['id']) {
                                            echo "selected";
                                        }
                                        ?>><?php echo $thematic_area['name']; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-9">
                                <label for="activity_name" class="col-form-label">Output</label>
                                <input type="text" class="form-control" id="activity_name" name="activity_name" placeholder="" value="<?php echo $major_activity['activity_name']; ?>" required>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>