<!--Select-->
<link rel="stylesheet" href="<?php echo base_url('resource/plugins/select2/css/select2.min.css'); ?>">
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.js"></script>
<script type="text/javascript">
    google.charts.load('current', {packages: ['corechart']});
</script>
<style>
    .chart path{
        stroke-width:1; /* control the countries borders width */
        stroke: #0d6cca; /* choose a color for the border */
    }
    th{
        text-align: center;
    }
    .dashboard_number{
        font-size: 16px;
    }
</style>
<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <div class="row gutters">
                <?php
                foreach ($national_activity_summary as $national_activity)
                    
                    ?>
                <div class="col-12 col-sm-6 col-md-3" onclick="location.replace('#')"  onMouseOver="this.style.cursor = 'pointer'">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-home"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Activities</span>
                            <div class="dashboard_number"><?php echo $national_activity['total_activities']; ?></div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3" onclick="location.replace('#')"  onMouseOver="this.style.cursor = 'pointer'">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-percent"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Completed</span>
                            <div class="dashboard_number"><?php echo $national_activity['completed'] . "(" . round($national_activity['completed'] / $national_activity['total_activities'] * 100) . "%)"; ?></div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3" onclick="location.replace('#')"  onMouseOver="this.style.cursor = 'pointer'">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-subscript"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Ongoing</span>
                            <div class="dashboard_number"><?php echo $national_activity['ongoing'] . "(" . round($national_activity['completed'] / $national_activity['total_activities'] * 100) . "%)"; ?></div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3" onclick="location.replace('#')"  onMouseOver="this.style.cursor = 'pointer'">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">No progress</span>
                            <div class="dashboard_number">
                                <?php
                                $no_progress = $national_activity['total_activities'] - ($national_activity['completed'] + $national_activity['ongoing']);
                                echo $no_progress . "(" . round($no_progress / $national_activity['total_activities'] * 100) . "%)";
                                ?>
                            </div>
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
                <div class="card-header">Summary table of activity status by Sectors</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="basicExample" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="width:45%;">Ministry</th>
                                        <th colspan="4">Status of nutrition activities</th>
                                        <th colspan="3">Financial status</th>
                                    </tr>
                                    <tr>
                                        <th>No. of activities</th>
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
                                    foreach ($summary_table_of_activity_by_sector_rows as $summary_table_of_activity_by_sector) {
                                        $number_of_activities = $summary_table_of_activity_by_sector['number_of_activities'];
                                        $completed_percentage = 0;
                                        $ongoing_percentage = 0;
                                        $no_progress_percentage = 0;
                                        $expenditure_percentage = 0;
                                        $unspent_percentage = 0;
                                        $completed = $summary_table_of_activity_by_sector['completed'];
                                        $ongoing = $summary_table_of_activity_by_sector['ongoing'];
                                        $no_progress = $summary_table_of_activity_by_sector['number_of_activities'] - ($summary_table_of_activity_by_sector['completed'] + $summary_table_of_activity_by_sector['ongoing']);
                                        $allocation = $summary_table_of_activity_by_sector['allocation'];
                                        $expenditure = $summary_table_of_activity_by_sector['expenditure'];
                                        $unspent = $allocation - $expenditure;
                                        if (($number_of_activities > 0)) {
                                            $completed_percentage = ($completed / $number_of_activities) * 100;
                                            $ongoing_percentage = ($ongoing / $number_of_activities) * 100;
                                            $no_progress_percentage = ($no_progress / $number_of_activities) * 100;
                                        }
                                        if ($expenditure > 0) {
                                            $expenditure_percentage = round(($expenditure / ($allocation - $expenditure)) * 100);
                                            $unspent_percentage = round(($unspent / ($allocation - $expenditure)) * 100);
                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $summary_table_of_activity_by_sector['name'] . " (" . $summary_table_of_activity_by_sector['name_short'] . ")"; ?>
                                            </td>
                                            <td>
                                                <?php echo $number_of_activities; ?>
                                            </td>
                                            <td>
                                                <?php echo $completed . " ($completed_percentage%)"; ?>
                                            </td>
                                            <td>
                                                <?php echo $ongoing . " ($ongoing_percentage%)"; ?>
                                            </td>
                                            <td>
                                                <?php echo $no_progress . " ($no_progress_percentage%)"; ?>
                                            </td>
                                            <td>
                                                <?php echo $allocation; ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $expenditure . " ($expenditure_percentage%)";
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $unspent . " ($unspent_percentage%)";
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
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
                            <center><div id="status_of_nutrition_activities_as_per_work_plans_chart" style="width: 100%; min-height: 700px;"></div></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Financial status regarding implementation of nutrition</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" style="height:380px;overflow-y:auto;">
                            <center><div id="financial_status_regarding_implementation_of_nutrition_chart" style="width: 100%; min-height: 700px;"></div></center>
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
                            <center><div id="thematic_area" style="width: 100%; min-height: 420px;"></div></center>
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
                            <center><div id="thematic_area_ministry" style="width: 100%; min-height: 420px;"></div></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    </div>
</div>
<?php
$this->load->view('shared/js_links.php');
?>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script src="http://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
                    Highcharts.chart('status_of_nutrition_activities_as_per_work_plans_chart', {
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
$incomplete = "";
foreach ($summary_table_of_activity_by_sector_rows as $summary_table_of_activity_by_sector_row) {
    $categories.="'" . $summary_table_of_activity_by_sector_row['name_short'] . "',";
    $number_of_activities.=$summary_table_of_activity_by_sector_row['number_of_activities'] . ",";
    $completed.=$completed . ",";
    $incomplete.=$summary_table_of_activity_by_sector_row['number_of_activities'] - $completed . ",";
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
                                name: 'Total activities',
                                data: [<?php echo $number_of_activities; ?>]
                            }, {
                                name: 'Completed',
                                data: [<?php echo $completed; ?>]
                            }, {
                                name: 'Incomplete',
                                data: [<?php echo $incomplete; ?>]
                            }]
                    });
</script>
<script type="text/javascript">
    Highcharts.chart('financial_status_regarding_implementation_of_nutrition_chart', {
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
    $categories.="'" . $summary_table_of_activity_by_sector_row['name_short'] . "',";
    $allocation.=$summary_table_of_activity_by_sector_row['allocation'] . ",";
    $expenditure.=$summary_table_of_activity_by_sector_row['expenditure'] . ",";
    $unspent.=$summary_table_of_activity_by_sector_row['allocation'] - $summary_table_of_activity_by_sector_row['expenditure'] . ",";
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
        chart: {
            type: 'bar'
        },
        title: {
            text: null
        },
        xAxis: {
            categories: [<?php
$categories = "";
$total_activities = "";
$completed = "";
$incomplete = "";
foreach ($progress_according_to_thematic_areas_rows as $progress_according_to_thematic_areas_row) {
    $categories.="'" . $progress_according_to_thematic_areas_row['thematic_area'] . "',";
    $total_activities.=$progress_according_to_thematic_areas_row['number_of_activity'] . ",";
    $completed.=$progress_according_to_thematic_areas_row['completed'] . ",";
    $incomplete.=$progress_according_to_thematic_areas_row['number_of_activity'] - $progress_according_to_thematic_areas_row['completed'] . ",";
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
                name: 'Total activities',
                data: [<?php echo $total_activities; ?>]
            }, {
                name: 'Completed',
                data: [<?php echo $completed; ?>]
            }, {
                name: 'Incomplete',
                data: [<?php echo $incomplete; ?>]
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
            valueSuffix: ' millions'
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
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
                name: 'MOHFW',
                data: [12, 1, 0, 0, 1, ]
            }, {
                name: 'MOEF',
                data: [1, 1, 1, 1, 1, ]
            }, {
                name: 'MOED',
                data: [11, 0, -1, -1, 0, ]
            }, {
                name: 'MOSW',
                data: [11, 0, -1, -1, 0, ]
            }, {
                name: 'MOYSports',
                data: [11, 0, -1, -1, 0, ]
            }]
    });
</script>
<script type="text/javascript">
    Highcharts.chart('fund_allocation_by_period', {
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