<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb light">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url('data_entry'); ?>">Data Entry</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Work Plan</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">List of Work Plan</div>
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-md-12">
                            <form method="POST" action="">
                                <div class="pull-right">
                                    <?php
                                    $fiscal_years = sql::rows("fiscal_year", " is_active=1", "*");
                                    foreach ($fiscal_years as $fiscal_year) {
                                        echo "<span class='marker bg{$fiscal_year['fiscal_year']}'>{$fiscal_year['fiscal_year']}</span> ";
                                    }
                                    ?>
                                </div>
                                <div class="form-row" style="margin-bottom:-40px;">
                                    <div class="form-group col-md-4">
                                        <label for="thematic_area" class="col-form-label">Thematic Area</label>
                                        <select class="form-control" id="thematic_area" name="thematic_area">
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($thematic_area_list as $thematic_area) {
                                                ?>
                                                <option value="<?php echo $thematic_area['id']; ?>" <?php
                                                if (!empty($_POST)) {
                                                    if ($thematic_area['id'] == $_POST['thematic_area']) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>><?php echo $thematic_area['name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="finance_year" class="col-form-label">Fiscal Year</label>
                                        <select class="form-control" id="finance_year" name="finance_year">
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($fiscal_years as $fiscal_year) {
                                                ?>
                                                <option value="<?php echo $fiscal_year['fiscal_year']; ?>" <?php
                                                if (!empty($_POST)) {
                                                    if ($fiscal_year['fiscal_year'] == $_POST['finance_year']) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>><?php
                                                            echo $fiscal_year['fiscal_year'];
                                                            ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2" style="padding:40px 0;">
                                        <input type="submit" class="btn btn-primary btn-sm" name="save" value="Filter">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <table id="basicExample" class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th style="width:5%;">Sl</th>
                                <th style="width:12%;">Ministry</th>
                                <th style="width:12%;">Finance Year</th>
                                <th style="width:8%;">Created By</th>
                                <th style="width:12%;">Date of Submission</th>
                                <th style="width:20%;text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($rows as $row) {
                                ?>
                                <tr class="bg<?php echo $row['finance_year']; ?>">
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['thematic_area_name']; ?></td>
                                    <td><?php echo $row['finance_year'] ?></td>
                                    <td><?php echo $row['created_by_name'] ?></td>
                                    <td><?php echo date('j F, Y', strtotime($row['created_at'])); ?></td>
                                    <td align="center">
                                        <a href="<?php echo site_url('reports/work_plan_view/' . $row['id']); ?>" class="btn btn-sm btn-info" title="Details">View</a>
                                        <a href="<?php echo site_url('data_entry/work_plan_edit/' . $row['id']); ?>" class="btn btn-sm btn-warning" title="Edit">Edit</a>
                                        <a href="<?php echo site_url('data_entry/work_plan_delete/' . $row['id'] . "/" . $row['is_active']); ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger" title="Delete">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>