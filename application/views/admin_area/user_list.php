<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb light">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin_area'); ?>">Admin Area</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User List</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Ministry/ Department List
                    <div class="pull-right">
                        <a href="<?php echo site_url('admin_area/user_add'); ?>" class="btn btn-info btn-sm">
                            Add User
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <a href="<?php echo site_url('export/to_excel/' . $excel_page_name . '/' . $last_query . '') ?>" class="btn btn-sm btn-info">Export to Excel</a>
                    <br/>
                    <br/>
                    <table id="basicExample" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>ID</th>
                                <th>User Type</th>
                                <th>Thematic Area</th>
                                <th>Is Active</th>
                                <th style="width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($rows as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['user_name'] ?></td>
                                    <td><?php echo $row['login_id'] ?></td>
                                    <td><?php echo $row['user_type'] ?></td>
                                    <td><?php echo $row['thematic_area'] ?></td>
                                    <td><span class="badge <?php echo ($row['is_active'] == 1) ? "badge-success" : "badge-danger"; ?>"><?php echo ($row['is_active'] == 1) ? "Yes" : "No"; ?></span></td>
                                    <td align="center">
                                        <a href="<?php echo site_url('admin_area/user_edit/' . $row['id']); ?>" class="btn btn-sm btn-success" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo site_url('admin_area/user_delete/' . $row['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" title="Delete"><i class="fas fa-trash-alt"></i></a>
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