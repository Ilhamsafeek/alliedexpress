<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-check-circle bg-blue"></i>
                        <div class="d-inline">
                            <h5>
                                <?php if ($this->session->userdata()['type'] == 'customer') { ?>
                                    My Payments
                                <?php } else { ?>
                                    Customer Payment
                                <?php  } ?>

                            </h5>
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
                            <li class="breadcrumb-item active" aria-current="page">Customer</li>
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
                        <?php if ($this->session->userdata()['type'] == 'admin') : ?>

                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="ik ik-plus"></i>New Payment</button>
                        <?php endif; ?>
                        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demoModalLabel">New Payment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>


                                    <form role="form" id="createForm" action="<?php echo base_url('payment/createcustomerpayment') ?>" method="post">

                                        <?php echo validation_errors(); ?>
                                        <div class="modal-body">

                                            <div class="row">

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="font-normal">Date</label>
                                                        <input name="date" type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" value="<?php echo date('Y-m-d'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="description">Customer</label>
                                                        <select class="form-control select2" data-placeholder="Choose customer" id="customer_id" name="customer_id" style="width:100%;" required>
                                                            <?php foreach ($customer_data as $k => $v) : ?>
                                                                <option value="<?php echo $v['user_id']; ?>"><?php echo $v['name'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
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
                                                                <th style="text-align: center;">Date</th>
                                                                <th style="text-align: center;">Way Bill No</th>
                                                                <th style="text-align: center;">Customer</th>
                                                                <th style="text-align: center;">COD Amount</th>
                                                                <th style="text-align: center;">Courier Charge</th>
                                                                <th style="text-align: center;">Delivery Status</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php foreach ($package_data as $key => $value) {
                                                                if (
                                                                    $package_data[$key]['customer_payment_id'] == '' &&
                                                                    ($package_data[$key]['delivery_status'] == 'delivered' ||
                                                                        $package_data[$key]['delivery_status'] == 'returned')
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
                                                                        <td class="courier_charge"><?php echo $package_data[$key]['courier_charge']; ?></td>

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
                                                                <tr>
                                                                    <th style="width:50%">Total COD:</th>
                                                                    <td id="subTotal">0</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total Courier Charge</th>
                                                                    <td id="totalCourier">0</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Total Payment:</th>
                                                                    <td id="total">0</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="packages" name="packages">
                                                <input type="hidden" id="sub_total" name="sub_total">
                                                <input type="hidden" id="total_courier" name="total_courier">
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

                                        <th>Date</th>
                                        <?php if ($this->session->userdata()['type'] == 'admin') : ?>
                                            <th>Customer</th>
                                        <?php endif; ?>
                                        <th>Receipt No</th>
                                        <!-- <th>Way Bills</th> -->
                                        <th style="text-align: right;">Amount</th>


                                        <th style="text-align: right;">View / Print</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($customer_payment_data as $key => $value) { ?>
                                        <tr>

                                            <td><?php echo $customer_payment_data[$key]['date']; ?></td>
                                            <?php if ($this->session->userdata()['type'] == 'admin') : ?>
                                                <td><?php echo $customer_payment_data[$key]['name']; ?></td>
                                            <?php endif; ?>
                                            <td><?php echo $customer_payment_data[$key]['customer_payment_receipt_no']; ?></td>

                                            <?php
                                            $packages = array();
                                            foreach ($package_data as $index => $value) {
                                                $package_data[$index]['way_bill_no'];

                                                $packageArray = explode(',', $customer_payment_data[$key]['packages']);

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
                                            <td style="text-align: right;"><?php echo number_format($customer_payment_data[$key]['total'], 2); ?></td>

                                            <td>
                                                <div class="table-actions">
                                                    <a href="#" data-toggle="modal" data-target="#printModal<?php echo $customer_payment_data[$key]['customer_payment_id']; ?>"><i class="ik ik-printer"></i></a>

                                                    <!-- <a href="#" data-toggle="modal" data-target="#editModal<?php echo $customer_payment_data[$key]['customer_payment_id']; ?>"><i class="ik ik-edit-2"></i></a> -->
                                                    <?php if ($this->session->userdata()['type'] == 'admin') : ?>

                                                        <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $customer_payment_data[$key]['customer_payment_id']; ?>"><i class="ik ik-trash-2"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>


                                            <div class="modal fade" id="printModal<?php echo $customer_payment_data[$key]['customer_payment_id']; ?>" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="demoModalLabel">Payment Receipt</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>

                                                        <div id="printable_receipt" class="modal-body">

                                                            <div class="row invoice-info">
                                                                <div class="col-sm-4 invoice-col">
                                                                    From
                                                                    <address>
                                                                        <strong>AlliedExpress,</strong><br>https://alliedexpresslk.com/ <br>Phone: 0777 912 500
                                                                    </address>
                                                                </div>
                                                                <div class="col-sm-4 invoice-col">
                                                                    To
                                                                    <address>
                                                                        <strong><?php echo $customer_payment_data[$key]['name']; ?></strong><br><?php echo $customer_payment_data[$key]['address']; ?><br>Email: <?php echo $customer_payment_data[$key]['email']; ?>
                                                                    </address>
                                                                </div>
                                                                <div class="col-sm-4 invoice-col">
                                                                    <b>Receipt No #<?php echo $customer_payment_data[$key]['customer_payment_receipt_no']; ?></b><br>
                                                                    <br>
                                                                    <b>Date:</b> <?php echo $customer_payment_data[$key]['date']; ?><br>

                                                                </div>
                                                            </div>
                                                            <div class="row" style="background-color: #f5f5f5 !important; padding-right: 8%">
                                                                <div class="col-md-3">
                                                                    <p>Way Bill No</p>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p>Status</p>
                                                                </div>
                                                                <div class="col-md-3" style="text-align:right">
                                                                    <p>Amount</p>
                                                                </div>
                                                                <div class="col-md-3" style="text-align:right">
                                                                    <p>Courier Charge</p>
                                                                </div>

                                                            </div>
                                                            <?php
                                                            foreach ($package_data as $index => $value) {
                                                                $package_data[$index]['way_bill_no'];

                                                                $packageArray = explode(',', $customer_payment_data[$key]['packages']);

                                                                foreach ($packageArray as $key1 => $package_id) {
                                                                    if ($package_id == $package_data[$index]['package_id']) {
                                                                        array_push($packages, $package_data[$index]['way_bill_no']);
                                                            ?>
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <p><span><?php echo $package_data[$index]['way_bill_no']; ?></span></p>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <p><?php echo $package_data[$index]['delivery_status']; ?></p>
                                                                            </div>
                                                                            <div class="col-md-3" style="text-align:right; padding-right:8%">
                                                                                <p><?php
                                                                                    if ($package_data[$index]['delivery_status'] != 'returned') {
                                                                                        echo number_format($package_data[$index]['cod_amount'], 2);
                                                                                    } else {
                                                                                        echo number_format('0', 2);
                                                                                    }


                                                                                    ?></p>
                                                                            </div>
                                                                            <div class="col-md-3" style="text-align:right; padding-right:10%">
                                                                                <p><?php echo number_format($package_data[$index]['courier_charge'], 2); ?></p>
                                                                            </div>

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
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            Total COD:
                                                                        </div>
                                                                        <div class="col-md-6" style="float: right;">
                                                                            <strong style="float: right;"><?php echo number_format($customer_payment_data[$key]['sub_total'], 2); ?></strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            Total Courier Charge(-):
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <strong style="float: right;"><?php echo number_format($customer_payment_data[$key]['total_courier'], 2); ?></strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            Total Payment:
                                                                        </div>
                                                                        <div class="col-md-6" style="float: right;">
                                                                            <strong style="float: right;"><?php echo number_format($customer_payment_data[$key]['total'], 2); ?></strong>
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
                                            <div class="modal fade" id="deleteModal<?php echo $customer_payment_data[$key]['customer_payment_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="demoModalLabel">Delete Confirmation</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Do you Really want to delete?</p>
                                                        </div>

                                                        <form role="form" id="deleteForm" action="<?php echo base_url('payment/deletecustomerpayment/' . $customer_payment_data[$key]['customer_payment_id']) ?>" method="post">

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
        $("#customerPaymentMainMenu").addClass('active');

        $(".select2").select2();
        onCustomerChanged();
        $("#customer_id").on("change", function() {
            onCustomerChanged();
        });

    });

    function onCustomerChanged() {
        var value = $("#customer_id option:selected").text().toLowerCase();

        $("#due_table tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });


        // calculate total

        var subTotal = 0;
        var totalCourier = 0;
        var Total = 0;
        var packages = [];
        $('table #row-selector:checked').each(function() {

            var subCourier = $(this).closest('tr').find('td.courier_charge').text();

            totalCourier = totalCourier + parseFloat(subCourier);

            var returnedCourier = $(this).closest('tr').find('td.delivery_status a span').text();
            var subValue = $(this).closest('tr').find('td.cod_amount').text();


            if (returnedCourier != 'returned') {
                subTotal = subTotal + parseFloat(subValue);
            }
            var package = $(this).closest('tr').find('td.package_id').text();
            packages.push(package);
        });
        Total = subTotal - totalCourier;
        document.getElementById('subTotal').innerHTML = subTotal;
        document.getElementById('totalCourier').innerHTML = totalCourier;
        document.getElementById('total').innerHTML = Total;

        document.getElementById('packages').value = packages;
        document.getElementById('sub_total').value = subTotal;
        document.getElementById('total_courier').value = totalCourier;
        document.getElementById('total_amount').value = Total;

    }
</script>

<script>
    function  () {
        var printContents = document.getElementById('printable_receipt').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

        location.reload();

    }
</script>