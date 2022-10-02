<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb light">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url('reports'); ?>">Reports</a></li>
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
                                <div class="pull-right"><span class="marker bg2019-2020">2019-2020</span> <span class="marker bg2020-2021">2020-2021</span></div>
                                <div class="form-row" style="margin-bottom:-40px;">
                                    <div class="form-group col-md-4">
                                        <label for="inputState" class="col-form-label">মন্ত্রনালয়</label>
                                        <select class="form-control" id="ministry" name="ministry">
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($ministsry_list as $ministsry) {
                                                ?>
                                                <option value="<?php echo $ministsry['id']; ?>" <?php
                                                if (!empty($_POST)) {
                                                    if ($ministsry['id'] == $_POST['ministry']) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>><?php echo "•" . $ministsry['name_bangla']; ?></option>
                                                        <?php
                                                        /*
                                                          $departments = sql::rows("ministry", " parent_id='$ministsry[id]'", "*");
                                                          if (count($departments) > 0) {
                                                          foreach ($departments as $department) {
                                                          echo "<option value='{$department['id']}'>&nbsp;&nbsp;&nbsp;&nbsp;º{$department['name_bangla']}</option>";
                                                          }
                                                          }
                                                         */
                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState" class="col-form-label">অর্থ বছর</label>
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
                                                            echo $fiscal_year['fiscal_year_bn'];
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
                    <table id="basicExample" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Ministry/Department</th>
                                <th>Finance Year</th>
                                <th>Created By</th>
                                <th>Date of Submission</th>
                                <th>Work plan</th>
                                <th>Original Signed copy</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($rows as $row) {
                                ?>
                                <tr class="bg<?php echo $row['finance_year'];?>">
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['ministry_name_bangla'] . "<br/>" . $row['parent_name_bangla']; ?></td>
                                    <td><?php echo $row['finance_year_bn'] ?></td>
                                    <td><?php echo $row['created_by_name'] ?></td>
                                    <td><?php echo date('j F, Y', strtotime($row['created_at'])); ?></td>
                                    <td align="center">
                                        <a href="<?php echo site_url('reports/work_plan_view/' . $row['id']); ?>" class="btn btn-sm btn-info" title="Details">View</a>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if (!empty($row['signed_copy'])) {
                                            ?>
                                            <a href="<?php echo base_url('_^_imgUpload/signed_workplan/' . $row['signed_copy']); ?>" class="btn btn-sm btn-info" target="_blank" title="Signed Copy">View</a>
                                            <?php
                                        }
                                        ?>
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