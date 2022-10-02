<style>
    .select_members,
    .upload_resolution,
    .select_changed_members,
    .budget_section {
        display: none;
    }

    .table td,
    .table th {
        font-size: 12px;
        text-align: center;
    }

    .custom-input {
        width: 95px;
    }

    .custom-select-2 {
        width: 110px;
    }

    .table td,
    .table th {
        padding: 0.25rem;
        vertical-align: middle;
        border-top: 1px solid #e9ecef;
    }

    .form-group {
        margin-bottom: 0rem;
    }

    body {
        zoom: 90%;
    }

    .monthpicker_input {
        height: 38px !important;
        color: black !important;
        background-color: white !important;
    }

    .div_like_input {
        border: 1px solid #898C95;
        background-color: #E9E8E2;
    }
</style>
<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb light">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url('data_entry'); ?>">Data Entry</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Data Entry
                    <div class="pull-right">
                        <a href="<?php echo site_url('data_entry/work_progress_list'); ?>" class="btn btn-info btn-sm">
                            View Work Progress list
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="contact_form" enctype="multipart/form-data">
                        <?php
                        foreach ($master_row as $master_row)

                        ?>
                        <div class="card">
                            <div class="card-header-custom">General Information</div>
                            <div class="card-body no-padding">
                                <table class="table table-bordered table-responsive" style="width:100%">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputState" class="col-form-label">Thematic Area</label>
                                            <select class="form-control" id="thematic_area" name="thematic_area" required>
                                                <option value="<?php echo $master_row['thematic_area_id']; ?>"><?php echo $master_row['thematic_area_name']; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="finance_year" class="col-form-label">Fiscal Year</label>
                                            <select class="form-control" id="finance_year" name="finance_year" required>
                                                <option value="<?php echo $master_row['finance_year']; ?>"><?php echo $master_row['finance_year']; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="period" class="col-form-label">Period</label>
                                            <select class="form-control" id="period" name="period" required>
                                                <option value="">Select</option>
                                                <?php
                                                foreach ($periods as $period) {
                                                ?>
                                                    <option value="<?php echo $period['period_en']; ?>" selected><?php echo $period['period_en']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header-custom">
                                Work Plan
                            </div>
                            <div class="card-body no-padding">
                                <span>
                                    <img id="loading-image" src="loading.gif" style="display:none;height:75px;width:75px;" />
                                </span>
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="width:100%" id="dataTable">
                                        <tr style="background-color:#E2F5F0;">
                                            <th width="2%" rowspan="2">Sl</th>
                                            <th width="8%" rowspan="2">Outputs</th>
                                            <th width="8%" rowspan="2">Activities</th>
                                            <th width="8%" rowspan="2">Deliverables</th>
                                            <th width="15%" colspan="2">Plan</th>
                                            <th width="15%" colspan="3">Progress</th>
                                            <th width="15%" colspan="4">Activities(Quarterly)</th>
                                            <th width="8%" rowspan="2">Budget</th>
                                            <th width="8%" rowspan="2">Expenditure</th>
                                            <th width="8%" rowspan="2">Responsibilities</th>
                                            <th width="8%" rowspan="2">Partners</th>
                                            <th width="8%" rowspan="2">Remarks</th>
                                        </tr>
                                        <tr style="background-color:#E2F5F0;">
                                            <th>Baseline</th>
                                            <th>Target</th>
                                            <th>Status</th>
                                            <th>Number</th>
                                            <th>Comments</th>
                                            <th>1st</th>
                                            <th>2nd</th>
                                            <th>3rd</th>
                                            <th>4th</th>
                                        </tr>
                                        <?php
                                        $i = 1;
                                        foreach ($rows as $row) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i++; ?>
                                                    <input type="hidden" name="wp_details_id[]" value="<?php echo $row['id']; ?>" />
                                                </td>
                                                <td>
                                                    <div class="div_like_input">
                                                        <?php echo $row['activity_name']; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="div_like_input">
                                                        <?php echo $row['sub_activity_name']; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="div_like_input">
                                                        <?php echo $row['indicator_name']; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="div_like_input">
                                                        <?php echo $row['baseline']; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="div_like_input">
                                                        <?php echo $row['target_value']; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select name="progress_status[]" required>
                                                        <option value="">Select</option>
                                                        <option value="Not Started">Not Started</option>
                                                        <option value="Ongoing">Ongoing</option>
                                                        <option value="Completed">Completed</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" name="progress_value[]" id="progress_value" class="custom-input" required></td>
                                                <td><textarea name="progress_comment[]" id="progress_comment" class="custom-input"></textarea>
                                                <td>
                                                    <?php
                                                    if ($row['quarter1'] == 'Y') {
                                                        echo '<i class="fa fa-check" aria-hidden="true">';
                                                    } else {
                                                        echo '<i class="fa fa-times" aria-hidden="true">';
                                                    };
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($row['quarter2'] == 'Y') {
                                                        echo '<i class="fa fa-check" aria-hidden="true">';
                                                    } else {
                                                        echo '<i class="fa fa-times" aria-hidden="true">';
                                                    };
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($row['quarter3'] == 'Y') {
                                                        echo '<i class="fa fa-check" aria-hidden="true">';
                                                    } else {
                                                        echo '<i class="fa fa-times" aria-hidden="true">';
                                                    };
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($row['quarter4'] == 'Y') {
                                                        echo '<i class="fa fa-check" aria-hidden="true">';
                                                    } else {
                                                        echo '<i class="fa fa-times" aria-hidden="true">';
                                                    };
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="div_like_input">
                                                        <?php echo $row['budget']; ?>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="expenditure[]" id="expenditure" class="custom-input" required></td>
                                                <td>
                                                    <div class="div_like_input">
                                                        <?php echo $row['responsibilities']; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="div_like_input">
                                                        <?php echo $row['partners']; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="div_like_input">
                                                        <?php echo $row['remarks']; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row gutters">
                            <div class="col-sm-10">
                                <button type="submit" name="save" value="Save" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>