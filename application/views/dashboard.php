<div class="main-content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body" style="background-color:#bff5ff ">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Packages</h6>
                                <h2><?php echo $daily_total_packages; ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-package"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <small class="text-small mt-10 d-block">Total for this Month</small>
                            </div>
                            <div class="col-md-4">
                                <h5><?php echo $monthly_total_packages; ?> </h5>
                            </div>
                        </div>



                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body" style="background-color:#96ffd2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Delivered</h6>
                                <h2><?php echo $daily_total_delivered_packages; ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-check-circle"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <small class="text-small mt-10 d-block">Total for this Month</small>
                            </div>
                            <div class="col-md-4">
                                <h5><?php echo $monthly_total_delivered_packages; ?> </h5>
                            </div>
                        </div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body" style="background-color:#ffcc77">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Returned</h6>
                                <h2><?php echo $daily_total_returned_packages; ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-rotate-ccw"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <small class="text-small mt-10 d-block">Total for this Month</small>
                            </div>
                            <div class="col-md-4">
                                <h5><?php echo $monthly_total_returned_packages; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body" style="background-color:#ffb1a2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Canceled</h6>
                                <h2><?php echo $daily_total_canceled_packages; ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-x-circle"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <small class="text-small mt-10 d-block">Total for this Month</small>
                            </div>
                            <div class="col-md-4">
                                <h5><?php echo $monthly_total_canceled_packages; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="row">
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>

                    </div><!-- row -->
                </div>
            </div>
        </div>

        <!-- <?php

        $result = array();
        for ($x = 1; $x <= 12; $x++) {
            $result[strval($x)] = '0';
            foreach ($test as $k => $v) {

                if ($x == (int) $v['month']) {
                    $result[strval($x)] = $v['total'];
                }
            }
        }

        var_dump($result);


        ?> -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body" style="background-color:#bff5ff ">
                        <div class="d-flex justify-content-between align-items-center">


                            <div class="state">
                                <h6>COD Total</h6>
                                <h2>Rs.<?php echo number_format($daily_total_cod, 2); ?></h2>
                            </div>
                        </div>

                        <small class="text-small mt-10 d-block">Total for this Month</small>
                        <h5>Rs.<?php echo number_format($monthly_total_cod, 2); ?> </h5>


                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body" style="background-color:#96ffd2">
                        <div class="d-flex justify-content-between align-items-center">


                            <div class="state">
                                <h6>Courier Charge</h6>
                                <h2>Rs.<?php echo number_format($daily_total_courier, 2); ?></h2>
                            </div>
                        </div>

                        <small class="text-small mt-10 d-block">Total for this Month</small>
                        <h5>Rs.<?php echo number_format($monthly_total_courier, 2); ?> </h5>

                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body" style="background-color:#ffcc77">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Expenses</h6>
                                <h2>Rs.<?php echo number_format($daily_total_expense, 2); ?></h2>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Total for this Month</small>
                        <h5>Rs.<?php echo number_format($monthly_total_expense, 2); ?> </h5>


                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body" style="background-color:#ffb1a2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Pending Payments</h6>
                                <h2>Rs.<?php echo number_format($daily_total_pending, 2); ?></h2>
                            </div>

                        </div>
                        <small class="text-small mt-10 d-block">Total for this Month</small>
                        <h5>Rs.<?php echo number_format($monthly_total_pending, 2); ?> </h5>


                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row clearfix">

            <div class="col-xl-4 col-md-4">
                <a href="#" data-toggle="modal" data-target="#customerModal">


                    <div class="card sos-st-card twitter">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="mb-0"><i class="ik ik-users text-primary"></i> Customer Report</h5>
                                </div>

                                <div class="col-auto"><i class="fas fa-arrow-up text-green"></i></div>
                            </div>
                        </div>
                    </div>
                </a>


                <div class="modal fade" id="customerModal" role="dialog" aria-labelledby="demoModalLabel" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="demoModalLabel">Customer Report</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>


                            <div class="modal-body">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label" for="description">Customer</label>
                                            <select class="form-control select2 customer" data-placeholder="Choose customer" id="customer_id" name="customer_id" style="width:100%;" required>
                                                <?php foreach ($customer_data as $k => $v) : ?>
                                                    <option value="<?php echo $v['user_id']; ?>"><?php echo $v['company'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Print Report</button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-xl-4 col-md-4">
                <div class="card sos-st-card twitter">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0"><i class="ik ik-package text-primary"></i> Package Summary</h5>
                            </div>

                            <div class="col-auto"><i class="fas fa-arrow-up text-green"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="card sos-st-card twitter">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0"><i class="ik ik-minus-circle text-primary"></i> Expense Report</h5>
                            </div>

                            <div class="col-auto"><i class="fas fa-arrow-up text-green"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#dashboardMainMenu").addClass('active');
        $(".select2").select2();

    });
</script>

<script>
    window.onload = function() {
        var monthly_courier_charge_data = <?php echo json_encode($monthly_courier_charge_data); ?>;
        var monthly_expenses_data = <?php echo json_encode($monthly_expenses_data); ?>;

        var options = {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Income & Expenses"
            },
            axisX: {
                valueFormatString: "MMM"
            },
            axisY: {
                title: "",
                suffix: "",
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
                verticalAlign: "bottom",
                horizontalAlign: "left",
                dockInsidePlotArea: true,
                itemclick: toogleDataSeries
            },
            data: [{
                    type: "line",
                    showInLegend: true,
                    name: "Income",
                    markerType: "square",
                    xValueFormatString: "MMM, YYYY",
                    // yValueFormatString: "#,##",
                    dataPoints: [{
                            x: new Date(new Date().getFullYear(), 0),
                            y: monthly_courier_charge_data['1']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 1),
                            y: monthly_courier_charge_data['2']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 2),
                            y: monthly_courier_charge_data['3']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 3),
                            y: monthly_courier_charge_data['4']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 4),
                            y: monthly_courier_charge_data['5']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 5),
                            y: monthly_courier_charge_data['6']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 6),
                            y: monthly_courier_charge_data['7']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 7),
                            y: monthly_courier_charge_data['8']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 8),
                            y: monthly_courier_charge_data['9']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 9),
                            y: monthly_courier_charge_data['10']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 10),
                            y: monthly_courier_charge_data['11']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 11),
                            y: monthly_courier_charge_data['12']
                        },

                    ]
                },
                {
                    type: "line",
                    lineDashType: "dash",
                    showInLegend: true,
                    name: "Expenses",
                    color: "#F08080",
                   // yValueFormatString: "#,##",
                    dataPoints: [{
                            x: new Date(new Date().getFullYear(), 0),
                            y: monthly_expenses_data['1']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 1),
                            y: monthly_expenses_data['2']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 2),
                            y: monthly_expenses_data['3']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 3),
                            y: monthly_expenses_data['4']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 4),
                            y: monthly_expenses_data['5']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 5),
                            y: monthly_expenses_data['6']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 6),
                            y: monthly_expenses_data['7']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 7),
                            y: monthly_expenses_data['8']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 8),
                            y: monthly_expenses_data['9']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 9),
                            y: monthly_expenses_data['10']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 10),
                            y: monthly_expenses_data['11']
                        },
                        {
                            x: new Date(new Date().getFullYear(), 11),
                            y: monthly_expenses_data['12']
                        },

                    ]
                }
            ]
        };
        $("#chartContainer").CanvasJSChart(options);

        function toogleDataSeries(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }

    }
</script>