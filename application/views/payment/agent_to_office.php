<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-navigation-2 bg-blue"></i>
                        <div class="d-inline">
                            <h5>Agent Settlements</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Payment</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Agent to office</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="alert alert-error alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>



        <div class="row">

            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header d-block">
                        <?php

                        if ($this->session->userdata()['type'] != 'admin') :
                        ?>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="ik ik-plus"></i>New Settlement</button>
                        <?php endif; ?>
                        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demoModalLabel">New Settlement</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>


                                    <form role="form" id="createForm" action="<?php echo base_url('payment/createagentsettlement') ?>" method="post">

                                        <?php echo validation_errors(); ?>
                                        <div class="modal-body">

                                            <div class="row">

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="font-normal">Date</label>
                                                        <input name="date" type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" value="<?php echo date("Y-m-d"); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 table-responsive">


                                                    <table id="due_table" class="table table-striped ">
                                                        <thead>
                                                            <tr>
                                                                <th class="nosort" width="10">
                                                                    <!-- <label class="custom-control custom-checkbox m-0">
                                                                        <input type="checkbox" class="custom-control-input" id="selectall" value="option2" onchange="onCustomerChanged()">
                                                                        <span class="custom-control-label">&nbsp;</span>
                                                                    </label> -->
                                                                </th>
                                                                <th>Date</th>
                                                                <th>Way Bill No</th>
                                                                <th>Customer</th>
                                                                <th>COD Amount</th>
                                                                <!-- <th>Courier Charge</th> -->
                                                                <th>Delivery Status</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php foreach ($package_data as $key => $value) {
                                                                if (
                                                                    $package_data[$key]['settlement_id'] == '' &&
                                                                    $package_data[$key]['delivery_status'] == 'delivered'
                                                                ) :
                                                                    $status_color = 'primary';
                                                                    if ($package_data[$key]['delivery_status'] == 'out for delivery') {
                                                                        $status_color = 'secondary';
                                                                    } else if ($package_data[$key]['delivery_status'] == 're scheduled') {
                                                                        $status_color = 'warning';
                                                                    } else if ($package_data[$key]['delivery_status'] == 'canceled') {
                                                                        $status_color = 'danger';
                                                                    } else if ($package_data[$key]['delivery_status'] == 'returned') {
                                                                        $status_color = 'danger';
                                                                    } else if ($package_data[$key]['delivery_status'] == 'returned to customer') {
                                                                        $status_color = 'info';
                                                                    } else if ($package_data[$key]['delivery_status'] == 'delivered') {
                                                                        $status_color = 'success';
                                                                    } else if ($package_data[$key]['delivery_status'] == 'received to destination') {
                                                                        $status_color = 'success';
                                                                    } else if ($package_data[$key]['delivery_status'] == 'returned to head office') {
                                                                        $status_color = 'danger';
                                                                    }

                                                            ?>
                                                                    <tr>
                                                                        <td>
                                                                            <label class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input select_all_child" id="row-selector" onchange="onCustomerChanged()" value="option2">
                                                                                <span class="custom-control-label">&nbsp;</span>
                                                                            </label>
                                                                        </td>
                                                                        <td class="package_id" style="display:none;"><?php echo $package_data[$key]['package_id']; ?></td>
                                                                        <td><?php echo $package_data[$key]['date']; ?></td>
                                                                        <td><?php echo $package_data[$key]['way_bill_no']; ?></td>
                                                                        <td><?php echo $package_data[$key]['name']; ?></td>
                                                                        <td class="cod_amount"><?php echo $package_data[$key]['cod_amount']; ?></td>
                                                                        <!-- <td class="courier_charge"><?php echo $package_data[$key]['courier_charge']; ?></td> -->

                                                                        <td class="delivery_status">
                                                                            <a href="#" data-toggle="modal" data-target="#statusModal<?php echo $package_data[$key]['package_id']; ?>">
                                                                                <span class="badge badge-<?php echo $status_color; ?>"><?php echo $package_data[$key]['delivery_status']; ?></span>
                                                                            </a>

                                                                        </td>


                                                                    </tr>

                                                            <?php
                                                                endif;
                                                            } ?>


                                                        </tbody>

                                                    </table>

                                                </div>


                                            </div>
                                            <div class="row" style="display: flex; justify-content: flex-end">

                                                <div class="col-6">

                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <!-- <tr>
                                                                    <th style="width:50%">Total COD:</th>
                                                                    <td id="subTotal">0</td>
                                                                </tr> -->
                                                                <!-- <tr>
                                                                    <th>Total Courier Charge</th>
                                                                    <td id="totalCourier">0</td>
                                                                </tr> -->

                                                                <tr>
                                                                    <th>Total Payment:</th>
                                                                    <td id="total">0</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="packages" name="packages">
                                                <!-- <input type="hidden" id="sub_total" name="sub_total"> -->
                                                <!-- <input type="hidden" id="total_courier" name="total_courier"> -->
                                                <input type="hidden" id="total_amount" name="total">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="simpletable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Date</th>
                                        <?php if ($this->session->userdata()['type'] == 'admin') : ?>

                                            <th>Agent Name</th>
                                        <?php endif; ?>
                                        <th>Receipt No</th>

                                        <th style="text-align: right;">Amount</th>


                                        <th style="text-align: right;">View / Print</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($settlement_data as $key => $value) { ?>
                                        <tr>
                                            <th></th>
                                            <td><?php echo $settlement_data[$key]['settlement_date']; ?></td>
                                            <?php if ($this->session->userdata()['type'] == 'admin') : ?>

                                                <td><?php echo $settlement_data[$key]['name']; ?></td>
                                            <?php endif; ?>
                                            <td><?php echo $settlement_data[$key]['settlement_receipt_no']; ?></td>

                                            <?php
                                            $packages = array();
                                            foreach ($package_data as $index => $value) {
                                                $package_data[$index]['way_bill_no'];


                                                $packageArray = explode(',', $settlement_data[$key]['packages']);

                                                foreach ($packageArray as $key1 => $package_id) {
                                                    if ($package_id == $package_data[$index]['package_id']) {
                                                        array_push($packages, $package_data[$index]['way_bill_no']);
                                                    }
                                                }
                                            }  ?>

                                            <!-- <td><?php
                                                        foreach ($packages as $waybill_id => $waybill_no) { ?>
                                                    <span class="badge badge-primary"><?php echo $waybill_no; ?></span>
                                                <?php }

                                                ?>

                                            </td> -->
                                            <td style="text-align: right;"><?php echo number_format($settlement_data[$key]['total'], 2); ?></td>

                                            <td>
                                                <div class="table-actions">
                                                    <a href="#" data-toggle="modal" data-target="#printModal<?php echo $settlement_data[$key]['settlement_id']; ?>"><i class="ik ik-printer"></i></a>

                                                    <!-- <a href="#" data-toggle="modal" data-target="#editModal<?php echo $settlement_data[$key]['settlement_id']; ?>"><i class="ik ik-edit-2"></i></a> -->
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $settlement_data[$key]['settlement_id']; ?>"><i class="ik ik-trash-2"></i></a>
                                                </div>
                                            </td>


                                            <div class="modal fade" id="printModal<?php echo $settlement_data[$key]['settlement_id']; ?>" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="demoModalLabel">Settlement Receipt</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>

                                                        <div id="printable_receipt" class="modal-body">


                                                            <div class="row invoice-info">
                                                                <div class="col-sm-4 invoice-col">
                                                                <address>
                                                                        <strong>Agent: <?php echo $settlement_data[$key]['name']; ?></strong>
                                                                    </address>
                                                                </div>
                                                                <div class="col-sm-4 invoice-col">
                                                                
                                                                   
                                                                </div>
                                                                <div class="col-sm-4 invoice-col">
                                                                    <b>Settlement Receipt No #<?php echo $settlement_data[$key]['settlement_receipt_no']; ?></b><br>
                                                                    <br>
                                                                    <b>Date:</b> <?php echo $settlement_data[$key]['settlement_date']; ?><br>

                                                                </div>
                                                            </div>
                                                            <div class="row" style="background-color: #f5f5f5 !important;">
                                                                <div class="col-md-4">
                                                                    <p>Way Bill No</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p>Status</p>
                                                                </div>
                                                                <div class="col-md-4" style="text-align:right; padding-right:8%">
                                                                    <p>Amount</p>
                                                                </div>
                                                                <!-- <div class="col-md-3" style="text-align:right; padding-right:10%">
                                                                    <p>Courier Charge</p>
                                                                </div> -->

                                                            </div>
                                                            <?php
                                                            foreach ($package_data as $index => $value) {
                                                                $package_data[$index]['way_bill_no'];

                                                                $packageArray = explode(',', $settlement_data[$key]['packages']);

                                                                foreach ($packageArray as $key1 => $package_id) {
                                                                    if ($package_id == $package_data[$index]['package_id']) {
                                                                        array_push($packages, $package_data[$index]['way_bill_no']);
                                                            ?>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <p><span><?php echo $package_data[$index]['way_bill_no']; ?></span></p>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <p><?php echo $package_data[$index]['delivery_status']; ?></p>
                                                                            </div>
                                                                            <div class="col-md-4" style="text-align:right; padding-right:10%">
                                                                                <p><?php
                                                                                    if ($package_data[$index]['delivery_status'] != 'returned') {
                                                                                        echo number_format($package_data[$index]['cod_amount'], 2);
                                                                                    } else {
                                                                                        echo number_format('0', 2);
                                                                                    }


                                                                                    ?></p>
                                                                            </div>
                                                                            <!-- <div class="col-md-3" style="text-align:right; padding-right:10%">
                                                                                <p><?php echo number_format($package_data[$index]['courier_charge'], 2); ?></p>
                                                                            </div> -->

                                                                        </div>
                                                            <?php
                                                                    }
                                                                }
                                                            }  ?>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-6">

                                                                </div>
                                                                <div class="col-md-5">
                                                                    <!-- <div class="row">
                                                                        <div class="col-md-6">
                                                                            Total COD:
                                                                        </div>
                                                                        <div class="col-md-6" style="float: right;">
                                                                            <strong style="float: right;"><?php echo number_format($settlement_data[$key]['sub_total'], 2); ?></strong>
                                                                        </div>
                                                                    </div> -->
                                                                    <!-- <div class="row">
                                                                        <div class="col-md-6">
                                                                            Total Courier Charge:
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <strong style="float: right;"><?php echo number_format($settlement_data[$key]['total_courier'], 2); ?></strong>
                                                                        </div>
                                                                    </div> -->
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            Total Settlement:
                                                                        </div>
                                                                        <div class="col-md-6" style="float: right;">
                                                                            <strong style="float: right;"><?php echo number_format($settlement_data[$key]['total'], 2); ?></strong>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary" onclick="printDiv()">Print Receipt</button>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="deleteModal<?php echo $settlement_data[$key]['settlement_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="demoModalLabel">Delete Confirmation</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Do you Really want to delete?</p>
                                                        </div>

                                                        <form role="form" id="deleteForm" action="<?php echo base_url('payment/deletesettlement/' . $settlement_data[$key]['settlement_id']) ?>" method="post">

                                                            <?php echo validation_errors(); ?>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                                <button type="submit" class="btn btn-primary">Yes</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#agentToOfficeMainMenu").addClass('active');

        $(".select2").select2();
        onCustomerChanged();

    });

    function onCustomerChanged() {

        // calculate total

        var subTotal = 0;
        var totalCourier = 0;
        var Total = 0;
        var packages = [];
        $('table #row-selector:checked').each(function() {

            // var subCourier = $(this).closest('tr').find('td.courier_charge').text();

            // totalCourier = totalCourier + parseFloat(subCourier);

            // var returnedCourier = $(this).closest('tr').find('td.delivery_status a span').text();
            var subValue = $(this).closest('tr').find('td.cod_amount').text();

            subTotal = subTotal + parseFloat(subValue);

            var package = $(this).closest('tr').find('td.package_id').text();
            packages.push(package);
        });
        Total = subTotal 
        // + totalCourier;
        // document.getElementById('subTotal').innerHTML = subTotal;
        // document.getElementById('totalCourier').innerHTML = totalCourier;
        document.getElementById('total').innerHTML = Total;

        document.getElementById('packages').value = packages;
        // document.getElementById('sub_total').value = subTotal;
        // document.getElementById('total_courier').value = totalCourier;
        document.getElementById('total_amount').value = Total;

    }
</script>


<script>
    function printDiv() {
        var printContents = document.getElementById('printable_receipt').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

        location.reload();

    }
</script>