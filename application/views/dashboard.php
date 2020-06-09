<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-home"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="chain.html"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li>Dashboard</li>
                </ul>
                <h4>Dashboard</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->

    <div class="contentpanel">
        <!-- <?php var_dump($new_registration); ?> -->
        <div class="row row-stat">
            <div class="col-md-4">
                <div class="panel panel-success-alt noborder">
                    <div class="panel-heading noborder">
                        <div class="panel-btns">
                            <a href="chain.html" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                        </div><!-- panel-btns -->
                        <div class="panel-icon"><i class="fa fa-tasks"></i></div>
                        <div class="media-body">
                            <h5 class="md-title nomargin">Total Projects</h5>
                            <h1 class="mt5"><?php echo $total_projects; ?></h1>
                        </div><!-- media-body -->
                        <hr>
                        <div class=" row clearfix mt20">
                            <div class="col-md-4 col-sm-4 col-xs-4" onclick="window.open('<?php echo base_url('project/allprojects/completed'); ?>','Completed Projects');" style="cursor: pointer;">
                                <h5 class="md-title nomargin">Completed</h5>
                                <h4 class="nomargin"><?php echo $completed_projects; ?></h4>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-4" onclick="window.open('<?php echo base_url('project/allprojects/progress'); ?>','Projects in Progress');" style="cursor: pointer;">
                                <h5 class="md-title nomargin">progress</h5>
                                <h4 class="nomargin"><?php echo $inprogress_projects; ?></h4>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4" onclick="window.open('<?php echo base_url('project/allprojects/open'); ?>','Open Projects');" style="cursor: pointer;">
                                <h5 class="md-title nomargin">Open</h5>
                                <h4 class="nomargin"><?php echo $open_projects; ?></h4>
                            </div>
                        </div>

                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- col-md-4 -->

            <div class="col-md-4">
                <div class="panel panel-primary noborder">
                    <div class="panel-heading noborder">
                        <div class="panel-btns">
                            <a href="chain.html" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                        </div><!-- panel-btns -->
                        <div class="panel-icon"><i class="fa fa-users"></i></div>
                        <div class="media-body">
                            <h5 class="md-title nomargin">Total Users</h5>
                            <h1 class="mt5"><?php echo $total_users; ?></h1>
                        </div><!-- media-body -->
                        <hr>
                        <div class="clearfix mt20">
                            <div class="pull-left" onclick="window.open('<?php echo base_url('users/index/donor'); ?>','Donors');" style="cursor: pointer;">
                                <h5 class="md-title nomargin">Donors</h5>
                                <h4 class="nomargin"><?php echo $total_donors; ?></h4>
                            </div>
                            <div class="pull-right">
                                <h5 class="md-title nomargin">Normal Users</h5>
                                <h4 class="nomargin"><?php echo $normal_users; ?></h4>
                            </div>
                        </div>

                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- col-md-4 -->

            <div class="col-md-4">
                <div class="panel panel-dark noborder">
                    <div class="panel-heading noborder">
                        <div class="panel-btns">
                            <a href="chain.html" class="panel-close tooltips" data-toggle="tooltip" data-placement="left" title="Close Panel"><i class="fa fa-times"></i></a>
                        </div><!-- panel-btns -->
                        <div class="panel-icon"><i class="fa fa-dollar"></i></div>
                        <div class="media-body">
                            <h5 class="md-title nomargin">Total Donation Received</h5>
                            <h3 class="mt5">Rs.<?php echo number_format($total_payment); ?></h3>
                        </div><!-- media-body -->
                        <hr>
                        <div class="clearfix mt20">
                            <div class="pull-left">
                                <h5 class="md-title nomargin">In Hand</h5>
                                <h4 class="nomargin">Rs.<?php echo number_format($total_inhand); ?></h4>
                            </div>
                            <div class="pull-right">
                                <h5 class="md-title nomargin">Transfered</h5>
                                <h4 class="nomargin">Rs.<?php echo number_format($total_transfered); ?></h4>
                            </div>
                        </div>

                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- col-md-4 -->
        </div><!-- row -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Area Wise Appeals</h4>
                <p>This Analytics displays the appeals based on requests coming from</p>
            </div><!-- panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="lg-title">Country wise users</h5>
                        <!-- <p>Some basic example of using vector map displaying the map of the world.</p> -->
                        <div id="vectormap-world" class="height300"></div>
                    </div><!-- col-md-6 -->
                    <div class="col-md-6">
                        <h5 class="lg-title">District wise Projects</h5>
                        <!-- <p>Below is an example of vector map that display only by country (ie United States) -->
                        </p>
                        <div id="vectormap-country" class="height300"></div>
                    </div><!-- col-md-6 -->
                </div><!-- row -->
            </div><!-- panel-body -->
        </div><!-- panel -->


        <div class="panel panel-default">
            <div class="panel-heading">

                <h4 class="panel-title">User Activity</h4>

            </div><!-- panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 mb30">
                        <h5 class="lg-title mb10">User Registration and monthly SignIn</h5>

                        <div id="line-chart" class="height300"></div>
                    </div>

                </div><!-- row -->

            </div><!-- panel-body -->
        </div><!-- panel -->


        <div class="panel panel-default">
            <div class="panel-heading">

                <h4 class="panel-title">Reports</h4>

            </div><!-- panel-heading -->
            <div class="panel-body">


                <div class="row">
                    <div class="col-md-6 mb30">
                        <h5 class="lg-title mb10">Monthly Projects</h5>
                        <div id="monthlyProjectBar" class="flotGraph"></div>
                    </div><!-- col-md-6 -->
                    <div class="col-md-6 mb30">
                        <h5 class="lg-title mb10">Montly Received Donation</h5>

                        <div id="monthlyReceivedBar" class="flotGraph"></div>
                    </div><!-- col-md-6 -->

                </div><!-- row -->

                <div class="row">
                    <div class="col-md-6 mb30">
                        <h5 class="lg-title mb10">Type Wise Projects</h5>

                        <div id="typeWiseProjectsChart" class="flotGraph"></div>
                    </div><!-- col-md-6 -->
                    <div class="col-md-6 mb30">
                        <h5 class="lg-title mb10">Type Wise RECEIVED Donation</h5>

                        <div id="typeWiseDonationChart" class="flotGraph"></div>
                    </div><!-- col-md-6 -->
                </div><!-- row -->

            </div><!-- panel-body -->

        </div><!-- panel -->


    </div><!-- contentpanel -->

</div><!-- mainpanel -->
</div><!-- mainwrapper -->
</section>

<script type="text/javascript">
    $(document).ready(function() {


        $("#dashboardMainMenu").addClass('active');
        var worldData = <?php echo json_encode($countrywise_users); ?>;

        var countryData = <?php echo json_encode($countrywise_projects); ?>;

        jQuery('#vectormap-world').vectorMap({
            map: 'world_mill_en',
            regionStyle: {
                initial: {
                    fill: '#a5a7aa'
                },
                hover: {
                    fill: '#f0ad4e'
                }
            },
            backgroundColor: '#fff',
            series: {
                regions: [{
                    values: worldData,
                    scale: ['#C8EEFF', '#0071A4'],
                    normalizeFunction: 'polynomial'
                }]
            },
            onRegionTipShow: function(event, label, code) {

                $(label).append($("<br/>"));
                var total = worldData[code];
                if (!worldData[code]) {
                    total = '0';
                }
                $(label).append($("<span/>", {
                    'class': 'population',
                    'html': 'Total Users: ' + total
                }));

            }
        });

        jQuery('#vectormap-country').vectorMap({
            map: 'srilanka_en',
            regionStyle: {
                initial: {
                    fill: '#a5a7aa'
                },
                hover: {
                    fill: '#f0ad4e'
                }
            },
            backgroundColor: '#fff',
            series: {
                regions: [{
                    values: countryData,
                    scale: ['#C8EEFF', '#0071A4'],
                    normalizeFunction: 'polynomial'
                }]
            },
            onRegionTipShow: function(event, label, code) {
                $(label).append($("<br/>"));
                var total = countryData[code];
                if (!countryData[code]) {
                    total = '0';
                }
                $(label).append($("<span/>", {
                    'class': 'population',
                    'html': 'Total Projects: ' + total
                }));

            },
            onRegionClick: function(event, code, region) {
                var win = window.open('<?php echo base_url('project/allprojects/'); ?>' + code, '_blank');
                win.focus();
            }
        });


        /***** BAR CHART *****/

        var monthlyProjectsData = [
            ["Jan", <?php if (array_key_exists('Jan', $monthly_projects)) {
                        echo $monthly_projects['Jan'];
                    } else {
                        echo '0';
                    } ?>],
            ["Feb", <?php if (array_key_exists('Feb', $monthly_projects)) {
                        echo $monthly_projects['Feb'];
                    } else {
                        echo '0';
                    } ?>],
            ["Mar", <?php if (array_key_exists('Mar', $monthly_projects)) {
                        echo $monthly_projects['Mar'];
                    } else {
                        echo '0';
                    } ?>],
            ["Apr", <?php if (array_key_exists('Apr', $monthly_projects)) {
                        echo $monthly_projects['Apr'];
                    } else {
                        echo '0';
                    } ?>],
            ["May", <?php if (array_key_exists('May', $monthly_projects)) {
                        echo $monthly_projects['May'];
                    } else {
                        echo '0';
                    } ?>],
            ["Jun", <?php if (array_key_exists('Jun', $monthly_projects)) {
                        echo $monthly_projects['Jun'];
                    } else {
                        echo '0';
                    } ?>],
            ["Jul", <?php if (array_key_exists('Jul', $monthly_projects)) {
                        echo $monthly_projects['Jul'];
                    } else {
                        echo '0';
                    } ?>],
            ["Aug", <?php if (array_key_exists('Aug', $monthly_projects)) {
                        echo $monthly_projects['Aug'];
                    } else {
                        echo '0';
                    } ?>],
            ["Sep", <?php if (array_key_exists('Sep', $monthly_projects)) {
                        echo $monthly_projects['Sep'];
                    } else {
                        echo '0';
                    } ?>],
            ["Oct", <?php if (array_key_exists('Oct', $monthly_projects)) {
                        echo $monthly_projects['Oct'];
                    } else {
                        echo '0';
                    } ?>],
            ["Nov", <?php if (array_key_exists('Nov', $monthly_projects)) {
                        echo $monthly_projects['Nov'];
                    } else {
                        echo '0';
                    } ?>],
            ["Dec", <?php if (array_key_exists('Dec', $monthly_projects)) {
                        echo $monthly_projects['Dec'];
                    } else {
                        echo '0';
                    } ?>]
        ];

        jQuery.plot("#monthlyProjectBar", [monthlyProjectsData], {
            series: {
                lines: {
                    lineWidth: 1
                },
                bars: {
                    show: true,
                    barWidth: 0.5,
                    align: "center",
                    lineWidth: 0,
                    fillColor: "#428BCA",
                   
                }
            },
            grid: {
                borderColor: '#ddd',
                borderWidth: 1,
                labelMargin: 10
            },
            xaxis: {
                mode: "categories",
                tickLength: 0
            }
        });
        var monthlyReceivedDonationData = [
            ["Jan", <?php if (array_key_exists('Jan', $monthly_collected_donation)) {
                        echo $monthly_collected_donation['Jan'];
                    } else {
                        echo '0';
                    } ?>],
            ["Feb", <?php if (array_key_exists('Feb', $monthly_collected_donation)) {
                        echo $monthly_collected_donation['Feb'];
                    } else {
                        echo '0';
                    } ?>],
            ["Mar", <?php if (array_key_exists('Mar', $monthly_collected_donation)) {
                        echo $monthly_collected_donation['Mar'];
                    } else {
                        echo '0';
                    } ?>],
            ["Apr", <?php if (array_key_exists('Apr', $monthly_collected_donation)) {
                        echo $monthly_collected_donation['Apr'];
                    } else {
                        echo '0';
                    } ?>],
            ["May", <?php if (array_key_exists('May', $monthly_collected_donation)) {
                        echo $monthly_collected_donation['May'];
                    } else {
                        echo '0';
                    } ?>],
            ["Jun", <?php if (array_key_exists('Jun', $monthly_collected_donation)) {
                        echo $monthly_collected_donation['Jun'];
                    } else {
                        echo '0';
                    } ?>],
            ["Jul", <?php if (array_key_exists('Jul', $monthly_collected_donation)) {
                        echo $monthly_collected_donation['Jul'];
                    } else {
                        echo '0';
                    } ?>],
            ["Aug", <?php if (array_key_exists('Aug', $monthly_collected_donation)) {
                        echo $monthly_collected_donation['Aug'];
                    } else {
                        echo '0';
                    } ?>],
            ["Sep", <?php if (array_key_exists('Sep', $monthly_collected_donation)) {
                        echo $monthly_collected_donation['Sep'];
                    } else {
                        echo '0';
                    } ?>],
            ["Oct", <?php if (array_key_exists('Oct', $monthly_collected_donation)) {
                        echo $monthly_collected_donation['Oct'];
                    } else {
                        echo '0';
                    } ?>],
            ["Nov", <?php if (array_key_exists('Nov', $monthly_collected_donation)) {
                        echo $monthly_collected_donation['Nov'];
                    } else {
                        echo '0';
                    } ?>],
            ["Dec", <?php if (array_key_exists('Dec', $monthly_collected_donation)) {
                        echo $monthly_collected_donation['Dec'];
                    } else {
                        echo '0';
                    } ?>]
        ];

        jQuery.plot("#monthlyReceivedBar", [monthlyReceivedDonationData], {
            series: {
                lines: {
                    lineWidth: 1
                },
                bars: {
                    show: true,
                    barWidth: 0.5,
                    align: "center",
                    lineWidth: 0,
                    fillColor: "#d9534f"
                }
            },
            grid: {
                borderColor: '#ddd',
                borderWidth: 1,
                labelMargin: 10
            },
            xaxis: {
                mode: "categories",
                tickLength: 0
            }
        });


        /***** PIE CHART *****/

        var typeWiseProjectsChartData = <?php echo json_encode($type_wise_projects); ?>;

        jQuery.plot('#typeWiseProjectsChart', typeWiseProjectsChartData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });

        var typeWiseDonationChartData = <?php echo json_encode($type_wise_collection); ?>;

        jQuery.plot('#typeWiseDonationChart', typeWiseDonationChartData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });

        function labelFormatter(label, series) {
            return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
        }

        var m1 = new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'line-chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                //a: logins, b: registration
                {
                    y: new Date().getFullYear()+'-01',
                    a: <?php if (array_key_exists(date('Y').'-01', $user_login)) {
                            echo $user_login[date('Y').'-01'];
                        } else {
                            echo '0';
                        } ?>,
                    b: <?php if (array_key_exists(date('Y').'-01', $new_registration)) {
                            echo $new_registration[date('Y').'-01'];
                        } else {
                            echo '0';
                        } ?>
                },
                {
                    y: new Date().getFullYear()+'-02',
                    a: <?php if (array_key_exists(date('Y').'-02', $user_login)) {
                            echo $user_login[date('Y').'-02'];
                        } else {
                            echo '0';
                        } ?>,
                    b: <?php if (array_key_exists(date('Y').'-02', $new_registration)) {
                            echo $new_registration[date('Y').'-02'];
                        } else {
                            echo '0';
                        } ?>
                },
                {
                    y: new Date().getFullYear()+'-03',
                    a: <?php if (array_key_exists(date('Y').'-03', $user_login)) {
                            echo $user_login[date('Y').'-03'];
                        } else {
                            echo '0';
                        } ?>,
                    b: <?php if (array_key_exists(date('Y').'-03', $new_registration)) {
                            echo $new_registration[date('Y').'-03'];
                        } else {
                            echo '0';
                        } ?>
                },
                {
                    y: new Date().getFullYear()+'-04',
                    a: <?php if (array_key_exists(date('Y').'-04', $user_login)) {
                            echo $user_login[date('Y').'-04'];
                        } else {
                            echo '0';
                        } ?>,
                    b: <?php if (array_key_exists(date('Y').'-04', $new_registration)) {
                            echo $new_registration[date('Y').'-04'];
                        } else {
                            echo '0';
                        } ?>
                },
                {
                    y: new Date().getFullYear()+'-05',
                    a: <?php if (array_key_exists(date('Y').'-05', $user_login)) {
                            echo $user_login[date('Y').'-05'];
                        } else {
                            echo '0';
                        } ?>,
                    b: <?php if (array_key_exists(date('Y').'-05', $new_registration)) {
                            echo $new_registration[date('Y').'-05'];
                        } else {
                            echo '0';
                        } ?>
                },
                {
                    y: new Date().getFullYear()+'-06',
                    a: <?php if (array_key_exists(date('Y').'-06', $user_login)) {
                            echo $user_login[date('Y').'-06'];
                        } else {
                            echo '0';
                        } ?>,
                    b: <?php if (array_key_exists(date('Y').'-06', $new_registration)) {
                            echo $new_registration[date('Y').'-06'];
                        } else {
                            echo '0';
                        } ?>
                },
                {
                    y: new Date().getFullYear()+'-07',
                    a: <?php if (array_key_exists(date('Y').'-07', $user_login)) {
                            echo $user_login[date('Y').'-07'];
                        } else {
                            echo '0';
                        } ?>,
                    b: <?php if (array_key_exists(date('Y').'-07', $new_registration)) {
                            echo $new_registration[date('Y').'-07'];
                        } else {
                            echo '0';
                        } ?>
                },
                {
                    y: new Date().getFullYear()+'-08',
                    a: <?php if (array_key_exists(date('Y').'-08', $user_login)) {
                            echo $user_login[date('Y').'-08'];
                        } else {
                            echo '0';
                        } ?>,
                    b: <?php if (array_key_exists(date('Y').'-08', $new_registration)) {
                            echo $new_registration[date('Y').'-08'];
                        } else {
                            echo '0';
                        } ?>
                },
                {
                    y: new Date().getFullYear()+'-09',
                    a: <?php if (array_key_exists(date('Y').'-09', $user_login)) {
                            echo $user_login[date('Y').'-09'];
                        } else {
                            echo '0';
                        } ?>,
                    b: <?php if (array_key_exists(date('Y').'-09', $new_registration)) {
                            echo $new_registration[date('Y').'-09'];
                        } else {
                            echo '0';
                        } ?>
                },
                {
                    y: new Date().getFullYear()+'-10',
                    a: <?php if (array_key_exists(date('Y').'-10', $user_login)) {
                            echo $user_login[date('Y').'-10'];
                        } else {
                            echo '0';
                        } ?>,
                    b: <?php if (array_key_exists(date('Y').'-10', $new_registration)) {
                            echo $new_registration[date('Y').'-10'];
                        } else {
                            echo '0';
                        } ?>
                },
                {
                    y: new Date().getFullYear()+'-11',
                    a: <?php if (array_key_exists(date('Y').'-11', $user_login)) {
                            echo $user_login[date('Y').'-11'];
                        } else {
                            echo '0';
                        } ?>,
                    b: <?php if (array_key_exists(date('Y').'-11', $new_registration)) {
                            echo $new_registration[date('Y').'-11'];
                        } else {
                            echo '0';
                        } ?>
                },
                {
                    y: new Date().getFullYear()+'-12',
                    a: <?php if (array_key_exists(date('Y').'-12', $user_login)) {
                            echo $user_login[date('Y').'-12'];
                        } else {
                            echo '0';
                        } ?>,
                    b: <?php if (array_key_exists(date('Y').'-12', $new_registration)) {
                            echo $new_registration[date('Y').'-12'];
                        } else {
                            echo '0';
                        } ?>
                }
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['User Login', 'New Registration'],
            lineColors: ['#D9534F', '#428BCA'],
            lineWidth: '2px',
            hideHover: 'auto',
            resize: true
        });


    });
</script>