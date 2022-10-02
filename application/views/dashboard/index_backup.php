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
</style>
<div class="main-content">
    <?php
    foreach ($infographic as $infographic)
        
        ?>
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <div class="row gutters">
                <div class="col-12 col-sm-6 col-md-3" onclick="location.replace('reports/uncc_dncc_category_wise_report')"  onMouseOver="this.style.cursor = 'pointer'">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-home"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Functional</span>
                            <div class="dashboard_number">DNNC=<?php echo $infographic['functional_committee_dncc']; ?>(<?php echo number_format($infographic['functional_committee_dncc'] / $infographic['total_dncc'] * 100, 2); ?>%)</div>
                            <div class="dashboard_number">UNCC=<?php echo $infographic['functional_committee_uncc']; ?>(<?php echo number_format($infographic['functional_committee_uncc'] / $infographic['total_uncc'] * 100, 2); ?>%)</div>
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
                            <span class="info-box-text">Reporting Rate</span>
                            <div class="dashboard_number">DNNC=<?php echo $infographic['reporting_rate_dncc']; ?>(<?php echo number_format($infographic['reporting_rate_dncc'] / $infographic['total_dncc'] * 100, 2); ?>%)</div>
                            <div class="dashboard_number">UNCC=<?php echo $infographic['reporting_rate_uncc']; ?>(<?php echo number_format($infographic['reporting_rate_uncc'] / $infographic['total_uncc'] * 100, 2); ?>%)</div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3" onclick="location.replace('reports/uncc_dncc_category_wise_summary_report/1')"  onMouseOver="this.style.cursor = 'pointer'">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-subscript"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">One Meeting Ever</span>
                            <div class="dashboard_number">DNNC=<?php echo $infographic['one_meeting_ever_dncc']; ?>(<?php echo number_format($infographic['one_meeting_ever_dncc'] / $infographic['total_dncc'] * 100, 2); ?>%)</div>
                            <div class="dashboard_number">UNCC=<?php echo $infographic['one_meeting_ever_uncc']; ?>(<?php echo number_format($infographic['one_meeting_ever_uncc'] / $infographic['total_uncc'] * 100, 2); ?>%)</div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3" onclick="location.replace('<?php echo site_url('reports/uncc_dncc_list_of_committees_those_didnt_conduct_meeting'); ?>')"  onMouseOver="this.style.cursor = 'pointer'">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">No Meeting Ever</span>
                            <div class="dashboard_number">DNNC=<?php echo $infographic['no_meeting_ever_dncc']; ?>(<?php echo number_format($infographic['no_meeting_ever_dncc'] / $infographic['total_dncc'] * 100, 2); ?>%)</div>
                            <div class="dashboard_number">UNCC=<?php echo $infographic['no_meeting_ever_uncc']; ?>(<?php echo number_format($infographic['no_meeting_ever_uncc'] / $infographic['total_uncc'] * 100, 2); ?>%)</div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Functionality of DNCC</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <center><div id="functionality_of_DNCC" style="width: 100%; min-height: 300px;"></div></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Functionality of UNCC</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <center><div id="functionality_of_UNCC" style="width: 100%; min-height: 300px;"></div></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">DNCC Functional Ranking</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <center><div id="DNCC_functional_ranking" style="width: 100%; min-height: 300px;"></div></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">UNCC Functional Ranking</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <center><div id="UNCC_functional_ranking" style="width: 100%; min-height: 300px;"></div></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Functionality of DNCC</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div style=" height:500px" id="map1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Functionality of UNCC</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div style=" height:500px" id="map2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Grade Wise</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST">
                                <div class="row">                               
                                    <div class="col-md-4">
                                        <select class="form-control" name="category_wise_year" id="category_wise_year">
                                            <?php foreach ($years as $year) { ?>
                                                <option <?php
                                                if ($year == $current_year) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $year; ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="category_wise_period" id="category_wise_period">
                                            <?php
                                            foreach ($bi_monthly_periods as $bi_monthly_period) {
                                                ?>
                                                <option value="<?php echo $bi_monthly_period; ?>"<?php
                                                if ($current_period == $bi_monthly_period) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $bi_monthly_period; ?></option>;
                                                    <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="division" id="division" class='form-control'>
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($divisions as $division) {
                                                ?>
                                                <option value="<?php echo $division['division_id']; ?>"<?php
                                                if (!empty($_POST['division'])) {
                                                    if ($_POST['division'] == $division['division_id']) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>><?php echo $division['division_name']; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select class="form-control" name="district" id="district">
                                                <option value="">Select Division First</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select class="form-control" name="type" id="type">
                                                <?php
                                                foreach ($organization_types as $organization_type) {
                                                    ?>
                                                    <option <?php
                                                    if (!empty($_POST)) {
                                                        if ($organization_type == $_POST['type']) {
                                                            echo "selected";
                                                        }
                                                    }
                                                    ?>><?php echo $organization_type; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="chart_type" id="chart_type">
                                            <option value="bar">Bar</option>
                                            <option value="column">Column</option>
                                            <option value="table">Table</option>
                                        </select>
                                    </div>

                                </div>
                            </form>
                            <center><div id="category_wise" style="width: 100%; min-height: 300px;"></div></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Budget Allocation For Nutrition</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="budget_pie"></div>
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

                    Highcharts.chart('functionality_of_DNCC', {
                        chart: {
                            type: 'column'
                        },
                        xAxis: {
                            categories: [
<?php
$functionality_of_DNCC_categories = "";
$functionality_of_DNCC_data = "";
foreach ($functionality_of_DNCC as $functionality_of_DNCC) {
    $functionality_of_DNCC_categories.="'" . $functionality_of_DNCC['division_name'] . "',";
    $functionality_of_DNCC_data.=$functionality_of_DNCC['percentage'] . ",";
}
echo $functionality_of_DNCC_categories;
?>
                            ]
                        },
                        credits: {
                            enabled: false
                        },
                        title: {
                            text: null,
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: null
                            }
                        },
                        plotOptions: {
                            column: {
                                colorByPoint: false,
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        tooltip: {
                            shared: true,
                            useHTML: true,
                            formatter: function () {
                                return 'We have ' + this.y + ' ' + this.point.options.category + 's'
                            }
                        },
                        series: [{
                                name: 'Division wise functionality',
                                data: [<?php echo $functionality_of_DNCC_data; ?>]

                            }]
                    });
</script>
<script type="text/javascript">

    Highcharts.chart('functionality_of_UNCC', {
        chart: {
            type: 'column'
        },
        xAxis: {
            categories: [
<?php
$functionality_of_UNCC_categories = "";
$functionality_of_UNCC_data = "";
foreach ($functionality_of_UNCC as $functionality_of_UNCC) {
    $functionality_of_UNCC_categories.="'" . $functionality_of_UNCC['division_name'] . "',";
    $functionality_of_UNCC_data.=$functionality_of_UNCC['percentage'] . ",";
}
echo $functionality_of_UNCC_categories;
?>
            ]
        },
        credits: {
            enabled: false
        },
        title: {
            text: null,
        },
        yAxis: {
            min: 0,
            title: {
                text: null
            }
        },
        plotOptions: {
            column: {
                colorByPoint: false,
                dataLabels: {
                    enabled: true
                }
            }
        },
        tooltip: {
            shared: true,
            useHTML: true,
            formatter: function () {
                return 'We have ' + this.y + ' ' + this.point.options.category + 's'
            }
        },
        series: [{
                name: 'Division wise functionality',
                data: [<?php echo $functionality_of_UNCC_data; ?>]

            }]
    });
</script>
<script type="text/javascript">

    Highcharts.chart('DNCC_functional_ranking', {
        chart: {
            type: 'column'
        },
        xAxis: {
            categories: [
<?php
$functional_ranking_of_DNCC_categories = "";
$functional_ranking_of_DNCC_data_A = "";
$functional_ranking_of_DNCC_data_B = "";
$functional_ranking_of_DNCC_data_C = "";
foreach ($functional_ranking_of_DNCC as $functional_ranking_of_DNCC) {
    $functional_ranking_of_DNCC_categories.="'" . $functional_ranking_of_DNCC['division_name'] . "',";
    $functional_ranking_of_DNCC_data_A.=$functional_ranking_of_DNCC['percentage_of_A'] . ",";
    $functional_ranking_of_DNCC_data_B.=$functional_ranking_of_DNCC['percentage_of_B'] . ",";
    $functional_ranking_of_DNCC_data_C.=$functional_ranking_of_DNCC['percentage_of_C'] . ",";
}
echo $functional_ranking_of_DNCC_categories;
?>
            ],
            crosshair: true
        },
        credits: {
            enabled: false
        },
        title: {
            text: null,
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
        series: [{
                name: 'A',
                data: [<?php echo $functional_ranking_of_DNCC_data_A; ?>]

            }, {
                name: 'B',
                data: [<?php echo $functional_ranking_of_DNCC_data_B; ?>]

            }, {
                name: 'C',
                data: [<?php echo $functional_ranking_of_DNCC_data_C; ?>]

            }]
    });
</script>
<script type="text/javascript">

    Highcharts.chart('UNCC_functional_ranking', {
        chart: {
            type: 'column'
        },
        xAxis: {
            categories: [
<?php
$functional_ranking_of_UNCC_categories = "";
$functional_ranking_of_UNCC_data_A = "";
$functional_ranking_of_UNCC_data_B = "";
$functional_ranking_of_UNCC_data_C = "";
foreach ($functional_ranking_of_UNCC as $functional_ranking_of_UNCC) {
    $functional_ranking_of_UNCC_categories.="'" . $functional_ranking_of_UNCC['division_name'] . "',";
    $functional_ranking_of_UNCC_data_A.=$functional_ranking_of_UNCC['percentage_of_A'] . ",";
    $functional_ranking_of_UNCC_data_B.=$functional_ranking_of_UNCC['percentage_of_B'] . ",";
    $functional_ranking_of_UNCC_data_C.=$functional_ranking_of_UNCC['percentage_of_C'] . ",";
}
echo $functional_ranking_of_UNCC_categories;
?>
            ],
            crosshair: true
        },
        credits: {
            enabled: false
        },
        title: {
            text: null,
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
        series: [{
                name: 'A',
                data: [<?php echo $functional_ranking_of_UNCC_data_A; ?>]

            }, {
                name: 'B',
                data: [<?php echo $functional_ranking_of_UNCC_data_B; ?>]

            }, {
                name: 'C',
                data: [<?php echo $functional_ranking_of_UNCC_data_C; ?>]

            }]
    });
</script>
<script>
    $(function () {
        //on page load  
        var year = $('#category_wise_year').val();
        var period = $('#category_wise_period').val();
        var division = $('#division').val();
        var district = $('#district').val();
        var type = $('#type').val();
        getAjaxData(year, period, division, district, type, 'bar');
        //on changing select option
        $('#category_wise_year,#category_wise_period,#division,#district,#type,#chart_type').change(function () {
            var year = $('#category_wise_year').val();
            var period = $('#category_wise_period').val();
            var division = $('#division').val();
            var district = $('#district').val();
            var type = $('#type').val();
            var chart_type = $('#chart_type').val();
            getAjaxData(year, period, division, district, type, chart_type);
        });
        function getAjaxData(year, period, division, district, type, chart_type) {
            var options = {
                chart: {
                    renderTo: 'category_wise',
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: null,
                },
                xAxis: {
                    categories: [{}]
                },
                yAxis: {
                    title: {
                        text: null
                    }
                    ,
                    labels: {
                        overflow: 'justify'
                    }
                },
                plotOptions: {
                    column: {
                        colorByPoint: false,
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                tooltip: {
                    formatter: function () {
                        var s = '<b>' + this.x + '</b>';
                        $.each(this.points, function (i, point) {
                            s += '<br/>' + point.series.name + ': ' + point.y + '';
                        });
                        return s;
                    },
                    shared: true
                },
                series: [{
                        type: chart_type

                    }]
            };
            $.ajax({
                url: '<?= site_url(); ?>/dashboard/category_wise_graphical_view',
                data: {year: year, period: period, division: division, district: district, type: type, chart_type: chart_type},
                type: 'POST',
                dataType: "json",
                success: function (data) {
                    //alert(data);
                    //console.log(data);
                    if (chart_type == 'table') {
                        $('#category_wise').html(data);
                    } else {
                        options.xAxis.categories = data[0].name;
                        options.series[0].name = data[0].indicator_name;
                        options.series[0].data = data[0].data;
                        var chart = new Highcharts.Chart(options);
                    }
                }
            });
        }
    });
</script>
<script type="text/javascript">
    Highcharts.chart('budget_pie', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: null
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                        name: 'Nutrition Specific',
                        y: 42.66
                    }, {
                        name: 'Nutrition Sensitive',
                        y: 57.34
                    }]
            }]
    });
</script>
<?php
$newData['id'] = 'map1';
$newData['zoom'] = 7;
$newData['rows'] = $map_rows1;
$this->load->view('shared/map_script.php', $newData);
$newData['id'] = 'map2';
$newData['zoom'] = 7;
$newData['rows'] = $map_rows2;
$this->load->view('shared/map_script.php', $newData);
?>