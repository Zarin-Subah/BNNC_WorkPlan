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
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">হোম</a></li>
                    <li class="breadcrumb-item active" aria-current="page">সূচক</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    সূচক এডিট করুন
                </div>
                <?php
                foreach ($performance_indicator_edit as $performance_indicator)
                    
                    ?>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="indicator" class="col-form-label">সূচকের নাম</label>
                                <input type="text" class="form-control" id="indicator" name="indicator" placeholder=""  value="<?php echo $performance_indicator['indicator_name']; ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="unit_of_indicator" class="col-form-label">সূচকের একক</label>
                                <input list="unit_of_indicator_list" name="unit_of_indicator" id="unit_of_indicator" class="form-control" value="<?php echo $performance_indicator['unit_of_indicator']; ?>"/></label>
                                <datalist id="unit_of_indicator_list">
                                    <?php
                                    foreach ($unit_of_indicator_list as $unit_of_indicator) {
                                        ?>
                                        <option value="<?php echo $unit_of_indicator['unit_of_indicator']; ?>">
                                        <?php } ?>
                                </datalist>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="unit_of_measure" class="col-form-label">পরিমাপের একক</label>
                                <select id="unit_of_measure" name="unit_of_measure" class="form-control">
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="Number" <?php
                                    if ($performance_indicator['unit_of_measure'] == 'Number') {
                                        echo "selected";
                                    }
                                    ?>>Number</option>
                                    <option value="Percentage" <?php
                                    if ($performance_indicator['unit_of_measure'] == 'Percentage') {
                                        echo "selected";
                                    }
                                    ?>>Percentage</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="strategy" class="col-form-label">কৌশল</label>
                                <select id="strategy" name="strategy" class="form-control" required>
                                    <option value="">নির্বাচন করুন</option>
                                    <?php
                                    $strategry = sql::rows('activities', '', 'distinct(strategy_code) as strategy_code');
                                    foreach ($strategry as $strategry) {
                                        ?>
                                        <option value="<?php echo $strategry['strategy_code']; ?>" <?php
                                        if ($strategry['strategy_code'] == $performance_indicator['strategy_code']) {
                                            echo "selected";
                                        }
                                        ?>><?php echo $strategry['strategy_code']; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="sub_strategy" class="col-form-label">উপ কৌশল</label>
                                <select id="sub_strategy" name="sub_strategy" class="form-control">
                                    <option value=""><?php echo $performance_indicator['sub_strategy_code']; ?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="activity" class="col-form-label">কার্যক্রম</label>
                                <select id="activity" name="activity" class="form-control" required>
                                    <option value="<?php echo $performance_indicator['activity_id']; ?>"><?php echo $performance_indicator['activity_code'] . ". " . $performance_indicator['activity_name']; ?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="sub_activity" class="col-form-label">উপ কার্যক্রম</label>
                                <select id="sub_activity" name="sub_activity" class="form-control" required>
                                    <option value="<?php echo $performance_indicator['sub_activity_id']; ?>"><?php echo $performance_indicator['sub_activity_name']; ?></option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>