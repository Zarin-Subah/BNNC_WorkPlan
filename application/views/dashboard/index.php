<!--Select-->
<link rel="stylesheet" href="<?php echo base_url('resource/plugins/select2/css/select2.min.css'); ?>">
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        packages: ['corechart']
    });
</script>
<style>
    .chart path {
        stroke-width: 1;
        /* control the countries borders width */
        stroke: #0d6cca;
        /* choose a color for the border */
    }

    th {
        text-align: center;
    }

    .dashboard_number {
        font-size: 16px;
    }

    #basicExample td,
    #basicExample th {
        font-size: 12px;
    }
</style>
<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <div class="row gutters">
                <div class="col-md-12">
                    <form method="POST" action="">
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
                                                                                                    } else {
                                                                                                        if ($fiscal_year['fiscal_year'] == $selected_fiscal_year) {
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
                                <input type="submit" class="btn btn-primary btn-sm" name="save" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row gutters">
                <?php
                foreach ($national_activity_summary as $national_activity)

                ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clipboard-list"></i></span>

                        <div class="info-box-content">
                            <div class="dashboard_number"><?php echo $national_activity['total_activity']; ?></div>
                            <span class="info-box-text">Total Activities</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>

                        <div class="info-box-content">
                            <div class="dashboard_number"><?php
                                                            echo $national_activity['completed_activity'] . " (";
                                                            if ($national_activity['total_activity'] > 0) {
                                                                echo number_format(($national_activity['completed_activity'] / $national_activity['total_activity'] * 100), 2);
                                                            } else {
                                                                echo 0;
                                                            }
                                                            echo "%)";
                                                            ?>
                            </div>
                            <span class="info-box-text">Completed</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-retweet"></i></i></span>

                        <div class="info-box-content">
                            <div class="dashboard_number"><?php
                                                            echo $national_activity['ongoing_activity'] . " (";
                                                            if ($national_activity['total_activity'] > 0) {
                                                                echo number_format(($national_activity['ongoing_activity'] / $national_activity['total_activity'] * 100), 2);
                                                            } else {
                                                                echo 0;
                                                            }
                                                            echo "%)";
                                                            ?>
                            </div>
                            <span class="info-box-text">Ongoing</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>

                        <div class="info-box-content">
                            <div class="dashboard_number">
                                <?php
                                echo $national_activity['no_progress_activity'] . " (";
                                if ($national_activity['total_activity'] > 0) {
                                    echo number_format(($national_activity['no_progress_activity'] / $national_activity['total_activity'] * 100), 2);
                                } else {
                                    echo 0;
                                }
                                echo "%)";
                                ?>
                            </div>
                            <span class="info-box-text">No progress</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Summary table of progress status by Sectors</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="basicExample" class="table table-sm">
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="width:30%;">Ministry</th>
                                        <th rowspan="2" style="width:10%;">Workplan Submitted</th>
                                        <th rowspan="2" style="width:10%;">Progress Submitted</th>
                                        <th colspan="4" style="width:30%;">Status of nutrition activities</th>
                                        <th colspan="3" style="width:30%;">Financial status (In lac taka)</th>
                                        <th rowspan="2">Details</th>
                                    </tr>
                                    <tr>
                                        <th>Total Activities</th>
                                        <th>Completed</th>
                                        <th>Ongoing</th>
                                        <th>No progress</th>
                                        <th>Allocation</th>
                                        <th>Expenditure</th>
                                        <th>Unspent allocation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($summary_table_of_activity_by_sector_rows as $summary_table_of_activity_by_sector) {
                                        $number_of_activities = $summary_table_of_activity_by_sector['number_of_activity'];
                                        $completed_percentage = 0;
                                        $ongoing_percentage = 0;
                                        $no_progress_percentage = 0;
                                        $expenditure_percentage = 0;
                                        $unspent_percentage = 0;
                                        $completed = $summary_table_of_activity_by_sector['completed_activity'];
                                        $ongoing = $summary_table_of_activity_by_sector['ongoing_activity'];
                                        $no_progress = $summary_table_of_activity_by_sector['no_progress_activity'];
                                        $allocation = $summary_table_of_activity_by_sector['allocation'];
                                        $expenditure = $summary_table_of_activity_by_sector['expenditure'];
                                        $unspent = $allocation - $expenditure;
                                        if (($number_of_activities > 0)) {
                                            $completed_percentage = number_format(($completed / $number_of_activities) * 100, 2);
                                            $ongoing_percentage = number_format(($ongoing / $number_of_activities) * 100, 2);
                                            $no_progress_percentage = number_format(($no_progress / $number_of_activities) * 100, 2);
                                        }
                                        if (($expenditure > 0) && ($allocation > 0)) {
                                            $expenditure_percentage = round(($expenditure / $allocation) * 100);
                                        }
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $summary_table_of_activity_by_sector['name'] . " (" . $summary_table_of_activity_by_sector['name_short'] . ")"; ?>
                                            </td>
                                            <td align="center" class="<?php echo ($summary_table_of_activity_by_sector['is_workplan_submitted'] == 'Yes') ? 'text-success' : 'text-danger'; ?>">
                                                <?php
                                                if ($summary_table_of_activity_by_sector['is_workplan_submitted'] == 'Yes') {
                                                    echo '&#10004;';
                                                } else {
                                                    echo '&#10006;';
                                                }
                                                ?>
                                            </td>
                                            <td align="center" class="<?php echo ($summary_table_of_activity_by_sector['is_progress_submitted'] == 'Yes') ? 'text-success' : 'text-danger'; ?>">
                                                <?php
                                                if ($summary_table_of_activity_by_sector['is_progress_submitted'] == 'Yes') {
                                                    echo '&#10004;';
                                                } else {
                                                    echo '&#10006;';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $number_of_activities; ?>
                                            </td>
                                            <td>
                                                <?php echo $completed . " ($completed_percentage%)"; ?>
                                                <div class="progress mb-2 sm">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $completed_percentage ?>%" aria-valuenow="<?= $completed_percentage ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo $ongoing . " ($ongoing_percentage%)"; ?>
                                                <div class="progress mb-2 sm">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $ongoing_percentage ?>%" aria-valuenow="<?= $ongoing_percentage ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo $no_progress . " ($no_progress_percentage%)"; ?>
                                                <div class="progress mb-2 sm">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $no_progress_percentage ?>%" aria-valuenow="<?= $no_progress_percentage ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo number_format($allocation / 100000, 2); ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo number_format($expenditure / 100000, 2) . " ($expenditure_percentage%)";
                                                ?>
                                                <div class="progress mb-2 sm">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?= $expenditure_percentage ?>%" aria-valuenow="<?= $expenditure_percentage ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php
                                                echo number_format($unspent / 100000, 2);
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($summary_table_of_activity_by_sector['child'] > 0) {
                                                ?>
                                                    <a href="#" class="btn btn-custom-min btn-success" data-toggle="collapse" data-target="#demo<?php echo $i; ?>" class="accordion-toggle"><i onclick="myFunction(this)" class="fas fa-plus-circle"></i></a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr class="p">
                                            <td colspan="10" class="hiddenRow">
                                                <div class="accordian-body collapse p-2" id="demo<?php echo $i; ?>">
                                                    <table class="table table-sm table-striped" style="border-collapse:collapse;width:100%;">
                                                        <?php
                                                        $sql = "select ministry_name,ministry_name_short,(SELECT
     (CASE WHEN (COUNT(`view_wp_master`.`id`) > 0) THEN 'Yes' ELSE 'No' END)
   FROM `view_wp_master`
   WHERE (((`view_wp_master`.`ministry_id` = `view_wp_details_summary`.`ministry_id`)
            OR (`view_wp_master`.`parent_id` = `view_wp_details_summary`.`ministry_id`))
          AND (`view_wp_master`.`finance_year` = `view_wp_details_summary`.`finance_year`))) AS `is_workplan_submitted`,
  (SELECT
     (CASE WHEN (COUNT(`view_wpro_master`.`id`) > 0) THEN 'Yes' ELSE 'No' END)
   FROM `view_wpro_master`
   WHERE (((`view_wpro_master`.`ministry_id` = `view_wp_details_summary`.`ministry_id`)
            OR (`view_wpro_master`.`parent_id` = `view_wp_details_summary`.`ministry_id`))
          AND (`view_wpro_master`.`finance_year` = `view_wp_details_summary`.`finance_year`))) AS `is_progress_submitted`, SUM(number_of_activity) AS number_of_activity,SUM(completed_activity) AS completed_activity,SUM(ongoing_activity) AS ongoing_activity,SUM(no_progress_activity) AS no_progress_activity,IFNULL(SUM(allocation_en),0) AS allocation,IFNULL(SUM(expenditure_en),0) AS expenditure from view_wp_details_summary where parent_id='$summary_table_of_activity_by_sector[id]' and finance_year='$summary_table_of_activity_by_sector[finance_year]' and progress_value_en IS NOT NULL group by ministry_id  UNION ALL
SELECT `name`,name_short,is_workplan_submitted,is_progress_submitted,0,0,0,0,0,0 FROM `view_department_status` WHERE parent_id='$summary_table_of_activity_by_sector[id]' and finance_year='$summary_table_of_activity_by_sector[finance_year]' AND is_progress_submitted='No' and is_active=1";
                                                        $data = sql::custom_query($sql);
                                                        $k = 1;
                                                        foreach ($data as $d) {
                                                            $completed_percentage = 0;
                                                            $ongoing_percentage = 0;
                                                            $no_progress_percentage = 0;
                                                            $expenditure_percentage = 0;
                                                            $unspent_percentage = 0;
                                                            $completed = $d['completed_activity'];
                                                            $ongoing = $d['ongoing_activity'];
                                                            $no_progress = $d['no_progress_activity'];
                                                            $allocation = $d['allocation'];
                                                            $expenditure = $d['expenditure'];
                                                            $unspent = $allocation - $expenditure;
                                                            if (($number_of_activities > 0)) {
                                                                $completed_percentage = number_format(($completed / $number_of_activities) * 100, 2);
                                                                $ongoing_percentage = number_format(($ongoing / $number_of_activities) * 100, 2);
                                                                $no_progress_percentage = number_format(($no_progress / $number_of_activities) * 100, 2);
                                                            }
                                                            if (($expenditure > 0) && ($allocation > 0)) {
                                                                $expenditure_percentage = round(($expenditure / $allocation) * 100);
                                                            }
                                                        ?>
                                                            <tr>
                                                                <td width="14%"><?php echo $d['ministry_name'] . "(" . $d['ministry_name_short'] . ")"; ?></td>
                                                                <td width="10%" align="center" class="<?php echo ($d['is_workplan_submitted'] == 'Yes') ? 'text-success' : 'text-danger'; ?>">
                                                                    <?php
                                                                    if ($d['is_workplan_submitted'] == 'Yes') {
                                                                        echo '&#10004;';
                                                                    } else {
                                                                        echo '&#10006;';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td width="10%" align="center" class="<?php echo ($d['is_progress_submitted'] == 'Yes') ? 'text-success' : 'text-danger'; ?>">
                                                                    <?php
                                                                    if ($d['is_progress_submitted'] == 'Yes') {
                                                                        echo '&#10004;';
                                                                    } else {
                                                                        echo '&#10006;';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td width="10%">
                                                                    <?php
                                                                    echo $d['number_of_activity'];
                                                                    ?>
                                                                </td>
                                                                <td width="10%">
                                                                    <?php echo $completed . " ($completed_percentage%)"; ?>
                                                                    <div class="progress mb-2 sm">
                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= $completed_percentage ?>%" aria-valuenow="<?= $completed_percentage ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td width="10%">
                                                                    <?php echo $ongoing . " ($ongoing_percentage%)"; ?>
                                                                    <div class="progress mb-2 sm">
                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $completed_percentage ?>%" aria-valuenow="<?= $completed_percentage ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td width="10%">
                                                                    <?php echo $no_progress . " ($no_progress_percentage%)"; ?>
                                                                    <div class="progress mb-2 sm">
                                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $completed_percentage ?>%" aria-valuenow="<?= $completed_percentage ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td width="10%">
                                                                    <?php echo number_format($allocation / 100000, 2); ?>
                                                                </td>
                                                                <td width="10%">
                                                                    <?php
                                                                    echo number_format($expenditure / 100000, 2) . " ($expenditure_percentage%)";
                                                                    ?>
                                                                    <div class="progress mb-2 sm">
                                                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $expenditure_percentage ?>%" aria-valuenow="<?= $expenditure_percentage ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td width="10%">
                                                                    <?php
                                                                    echo number_format($unspent / 100000, 2);
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Status of nutrition activities as per work plans</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" style="height:380px;overflow-y:auto;">
                            <center>
                                <div id="status_of_nutrition_activities_as_per_work_plans_chart" style="width: 100%; min-height: 700px;"></div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Financial status regarding implementation of nutrition (Lac Tk)</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" style="height:380px;overflow-y:auto;">
                            <center>
                                <div id="financial_status_regarding_implementation_of_nutrition_chart" style="width: 100%; min-height: 700px;"></div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Progress according to thematic areas</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <div id="thematic_area" style="width: 100%; min-height: 420px;"></div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Type of thematic area activities implemented by ministries</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <div id="thematic_area_ministry" style="width: 100%; min-height: 420px;"></div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">Trend of fund allocation & expenditure by period</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <center><div id="fund_allocation_by_period" style="width: 100%; min-height: 300px;"></div></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
</div>
<?php
$this->load->view('shared/js_links.php');
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
    Highcharts.chart('status_of_nutrition_activities_as_per_work_plans_chart', {
        colors: ['#0D5890', '#179977', '#FFB933', '#EF2F1A'],
        chart: {
            type: 'bar'
        },
        title: {
            text: null
        },
        xAxis: {
            categories: [<?php
                            $categories = "";
                            $number_of_activities = "";
                            $completed = "";
                            $ongoing = "";
                            $no_progress = "";
                            foreach ($summary_table_of_activity_by_sector_rows as $summary_table_of_activity_by_sector_row) {
                                $categories .= "'" . $summary_table_of_activity_by_sector_row['name_short'] . "',";
                                $number_of_activities .= $summary_table_of_activity_by_sector_row['number_of_activity'] . ",";
                                $completed .= $summary_table_of_activity_by_sector_row['completed_activity'] . ",";
                                $ongoing .= $summary_table_of_activity_by_sector_row['ongoing_activity'] . ",";
                                $no_progress .= $summary_table_of_activity_by_sector_row['no_progress_activity'] . ",";
                            }
                            echo $categories;
                            ?>],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            labels: {
                overflow: 'justify'
            }
        },
        legend: {
            align: 'center',
            verticalAlign: 'bottom',
            x: 0,
            y: 0
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Total Activities',
            data: [<?php echo $number_of_activities; ?>]
        }, {
            name: 'Completed',
            data: [<?php echo $completed; ?>]
        }, {
            name: 'Ongoing',
            data: [<?php echo $ongoing; ?>]
        }, {
            name: 'No progress',
            data: [<?php echo $no_progress; ?>]
        }]
    });
</script>
<script type="text/javascript">
    Highcharts.chart('financial_status_regarding_implementation_of_nutrition_chart', {
        colors: ['#0D5890', '#179977', '#FFB933'],
        chart: {
            type: 'bar'
        },
        title: {
            text: null
        },
        xAxis: {
            categories: [<?php
                            $categories = "";
                            $allocation = "";
                            $expenditure = "";
                            $unspent = "";
                            foreach ($summary_table_of_activity_by_sector_rows as $summary_table_of_activity_by_sector_row) {
                                $categories .= "'" . $summary_table_of_activity_by_sector_row['name_short'] . "',";
                                $allocation .= number_format($summary_table_of_activity_by_sector_row['allocation'] / 100000, 2, '.', '') . ",";
                                $expenditure .= number_format($summary_table_of_activity_by_sector_row['expenditure'] / 100000, 2, '.', '') . ",";
                                $unspent .= number_format(($summary_table_of_activity_by_sector_row['allocation'] - $summary_table_of_activity_by_sector_row['expenditure']) / 100000, 2, '.', '') . ",";
                            }
                            echo $categories;
                            ?>],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            labels: {
                overflow: 'justify'
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            align: 'center',
            verticalAlign: 'bottom',
            x: 0,
            y: 0
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Allocation',
            data: [<?php echo $allocation; ?>]
        }, {
            name: 'Expenditure',
            data: [<?php echo $expenditure; ?>]
        }, {
            name: 'Unspent',
            data: [<?php echo $unspent; ?>]
        }]
    });
</script>
<script type="text/javascript">
    Highcharts.chart('thematic_area', {
        colors: ['#0D5890', '#179977', '#FFB933', '#EF2F1A'],
        chart: {
            type: 'bar'
        },
        title: {
            text: null
        },
        xAxis: {
            categories: [<?php
                            $categories = "";
                            $number_of_activities = "";
                            $completed = "";
                            $ongoing = "";
                            $no_progress = "";
                            foreach ($progress_according_to_thematic_areas_rows as $progress_according_to_thematic_areas_row) {
                                $categories .= "'" . $progress_according_to_thematic_areas_row['thematic_area'] . "',";
                                $number_of_activities .= $progress_according_to_thematic_areas_row['number_of_activity'] . ",";
                                $completed .= $progress_according_to_thematic_areas_row['completed_activity'] . ",";
                                $ongoing .= $progress_according_to_thematic_areas_row['ongoing_activity'] . ",";
                                $no_progress .= $progress_according_to_thematic_areas_row['no_progress_activity'] . ",";
                            }
                            echo $categories;
                            ?>],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            labels: {
                overflow: 'justify'
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            align: 'center',
            verticalAlign: 'bottom',
            x: 0,
            y: 0
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Total Activities',
            data: [<?php echo $number_of_activities; ?>]
        }, {
            name: 'Completed',
            data: [<?php echo $completed; ?>]
        }, {
            name: 'Ongoing',
            data: [<?php echo $ongoing; ?>]
        }, {
            name: 'No progress',
            data: [<?php echo $no_progress; ?>]
        }]
    });
</script>
<script type="text/javascript">
    Highcharts.chart('thematic_area_ministry', {
        chart: {
            type: 'bar'
        },
        title: {
            text: null
        },
        xAxis: {
            categories: ['জীবনচক্রব্যাপী সবার জন্য পুষ্টি', 'কৃষি ও খাদ্য বৈচিত্র্য এবং স্থানীয়ভাবে গৃহীত খাদ্য উপকরণ', 'সামাজিক নিরাপত্তা', 'সমন্বিত সামাজিক আচরন পরিবর্তন যোগাযোগ কৌশল বাস্তবায়ন', 'তথ্যভিত্তিক নীতি ও কর্মসূচি প্রণয়ন এবং বাস্তবায়ন পরিবীক্ষণ মূল্যায়ন ও গবেষণা', 'সক্ষমতা তৈরি'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: 30,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [
            <?php
            foreach ($summary_table_of_activity_by_sector_rows as $summary_table_of_activity_by_sector_row) {
            ?> {
                    name: '<?php echo $summary_table_of_activity_by_sector_row['name_short']; ?>',
                    <?php
                    $sql = "SELECT sum(number_of_activity)  AS `data` FROM `view_wp_details_summary` WHERE finance_year='$selected_fiscal_year' and progress_value_en is not null and (ministry_id='$summary_table_of_activity_by_sector_row[id]' OR parent_id='$summary_table_of_activity_by_sector_row[id]') GROUP BY thematic_area_id ORDER BY thematic_area_id ASC";
                    $theamatic_datas = sql::custom_query($sql);
                    $dt = "";
                    foreach ($theamatic_datas as $theamatic_data) {
                        $dt .= $theamatic_data['data'] . ",";
                    }
                    ?>
                    data: [<?php echo $dt; ?>]
                },
            <?php } ?>

        ]
    });
</script>
<?php
/*
  <script type="text/javascript">
  Highcharts.chart('fund_allocation_by_period', {
  colors: ['#7CB5EC', '#90ED7D'],
  chart: {
  type: 'column'
  },
  title: {
  text: null
  },
  xAxis: {
  categories: [<?php
  $categories = "";
  $allocation = "";
  $expenditure = "";
  foreach ($trend_of_fund_allocation_by_period_rows as $trend_of_fund_allocation_by_period_row) {
  $categories.="'" . $trend_of_fund_allocation_by_period_row['name_short'] . "',";
  $allocation.=$trend_of_fund_allocation_by_period_row['allocation'] . ",";
  $expenditure.=$trend_of_fund_allocation_by_period_row['expenditure'] . ",";
  }
  echo $categories;
  ?>],
  crosshair: true
  },
  yAxis: {
  min: 0,
  title: {
  text: null
  }
  },
  tooltip: {
  headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
  '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
  footerFormat: '</table>',
  shared: true,
  useHTML: true
  },
  plotOptions: {
  column: {
  dataLabels: {
  enabled: true
  }
  }
  },
  credits: {
  enabled: false
  },
  series: [{
  name: 'Allocation',
  data: [<?php echo $allocation; ?>]
  }, {
  name: 'Expenditure',
  data: [<?php echo $expenditure; ?>]
  }]
  });
  </script>
 */
?>