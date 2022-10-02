<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/bootstrap.min.css">
    <title>Work Plan</title>
    <style>
        th,
        td {
            font-size: 12px;
        }

        th {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="main-content">
                    <!-- Row start -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <?php
                            foreach ($master_row as $master_row)

                            ?>
                            <div class="row">
                                <div class="col-md-3 print-hidden">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-sm btn-success">Back</a>
                                        <a href="#" class="btn btn-sm btn-warning" onclick="window.print()">Print</a>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-3">
                                    <div class="text-center">
                                        <img src="<?php echo base_url('resource/images/bd_logo.png'); ?>" style="height:50px;width:50px;" />
                                        <h6><?php echo $master_row['thematic_area_name']; ?> </h6>
                                        <h6>Progress of Wrokplan <?php echo $master_row['finance_year']; ?></h6>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
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
                                    <tr>
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
                                </thead>
                                <tbody>
                                    <?php
                                    $previous_stategy = "";
                                    $previous_activity = "";
                                    foreach ($rows as $row) {
                                    ?>
                                        <tr>

                                            <td>
                                                <?php
                                                if ($previous_activity != $row['activity_name']) {
                                                    echo $row['activity_name'];
                                                }
                                                $previous_activity = $row['activity_name'];
                                                ?>
                                            </td>
                                            <td><?php echo $row['sub_activity_name']; ?></td>
                                            <td><?php echo $row['indicator_name']; ?></td>
                                            <td><?php echo $row['baseline']; ?></td>
                                            <td><?php echo $row['target_value']; ?></td>
                                            <td><?php echo $row['progress_status']; ?></td>
                                            <td><?php echo $row['progress_value']; ?></td>
                                            <td><?php echo $row['progress_comment']; ?></td>
                                            <td>
                                                <?php
                                                if ($row['quarter1'] == 'Y') {
                                                    echo '&#10004;';
                                                } else {
                                                    echo '&#10006;';
                                                };
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['quarter2'] == 'Y') {
                                                    echo '&#10004;';
                                                } else {
                                                    echo '&#10006;';
                                                };
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['quarter3'] == 'Y') {
                                                    echo '&#10004;';
                                                } else {
                                                    echo '&#10006;';
                                                };
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['quarter4'] == 'Y') {
                                                    echo '&#10004;';
                                                } else {
                                                    echo '&#10006;';
                                                };
                                                ?>
                                            </td>
                                            <td><?php echo $row['budget']; ?></td>
                                            <td><?php echo $row['expenditure']; ?></td>
                                            <td><?php echo $row['responsibilities']; ?></td>
                                            <td><?php echo $row['partners']; ?></td>
                                            <td><?php echo $row['remarks']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>