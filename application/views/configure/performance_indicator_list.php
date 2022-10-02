<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb light">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List of Deliverables</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    List of Deliverables
                    <div class="pull-right">
                        <a href="<?php echo site_url('configure/performance_indicator_add'); ?>" class="btn btn-info btn-sm">
                            Add Deliverable
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <a href="<?php echo site_url('export/to_excel/' . $excel_page_name . '/' . $last_query . '') ?>" class="btn btn-sm btn-info">Export to Excel</a>
                    <br />
                    <br />
                    <table id="basicExample" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="4%">Sl</th>
                                <th width="20%">Deliverable</th>
                                <th width="20%">Activity</th>
                                <th width="20%">Output</th>
                                <th width="20%">Thematic Area</th>
                                <th style="width:5%">Is Active</th>
                                <th style="width:15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($rows as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['indicator_name'] ?></td>
                                    <td><?php echo $row['activity_name'] ?></td>
                                    <td><?php echo $row['sub_activity_name'] ?></td>
                                    <td><?php echo $row['thematic_area_name'] ?></td>
                                    <td><sapn  class="badge <?php echo ($row['is_active'] == 1) ? 'badge-success' : 'badge-danger'; ?>"> <?php echo ($row['is_active'] == 1) ? 'Yes' : 'No'; ?></span></td>
                                <td align="center">
                                    <a href="<?php echo site_url('configure/performance_indicator_edit/' . $row['indicator_id']); ?>" class="btn btn-sm btn-success" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo site_url('configure/performance_indicator_active_or_inactive/' . $row['id'] . "/" . $row['is_active']); ?>" class="btn btn-sm <?php echo ($row['is_active'] == 1) ? 'btn-warning' : 'btn-info'; ?>" role="button" onclick="return confirm('Are you sure?')" aria-pressed="true"><i class="fas <?php echo ($row['is_active'] == 1) ? 'fa-trash' : 'fa-eye'; ?>" aria-hidden="true"></i></a>
                                </td>
                                </tr>
                                </tr>
                            <?php } ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>