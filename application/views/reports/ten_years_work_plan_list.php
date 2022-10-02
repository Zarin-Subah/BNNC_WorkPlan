<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb light">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url('data_entry'); ?>">Data Entry</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List of Data</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    List of Data
                </div>
                <div class="card-body">
                    <table id="basicExample" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Ministry/Department</th>
                                <th>Parent</th>
                                <th>Period</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th style="width:8%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($rows as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['ministry_name_bangla'] ?></td>
                                    <td><?php echo $row['parent_name_bangla'] ?></td>
                                    <td><?php echo $row['period'] ?></td>
                                    <td><?php echo $row['created_by_name'] ?></td>
                                    <td><?php echo $row['created_at'] ?></td>
                                    <td align="center">
                                        <a href="<?php echo base_url('_^_imgUpload/ten_years_workplan/' . $row['work_plan']); ?>" class="btn btn-sm btn-info" target="_blank" title="Signed Copy">View</a>
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