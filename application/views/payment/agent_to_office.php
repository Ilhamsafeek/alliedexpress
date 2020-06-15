<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-navigation-2 bg-blue"></i>
                        <div class="d-inline">
                            <h5>Agent to Head Office</h5>
                            <span>Sending payments to head office from agent</span>
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

                        if ($this->session->userdata()['type'] != 'admin') : ?>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="ik ik-plus"></i>New Payment</button>
                        <?php endif; ?>
                        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demoModalLabel">New Payment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>


                                    <form role="form" id="createForm" action="<?php echo base_url('payment/createagentsettlement') ?>" method="post">

                                        <?php echo validation_errors(); ?>
                                        <div class="modal-body">

                                            <div class="row">

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="font-normal">Date</label>
                                                        <input name="date" type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" value="<?php echo date('d/m/Y'); ?>">
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
                                                                <th>Courier Charge</th>
                                                                <th>Delivery Status</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php foreach ($package_data as $key => $value) {
                                                                if (
                                                                    $package_data[$key]['settlement_id'] == '' &&
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
                                                                    <th>Subtotal:</th>
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
                                        <th></th>
                                        <th>Date</th>
                                        <th>Receipt No</th>
                                        <th>Way Bills</th>
                                        <th>Amount</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($settlement_data as $key => $value) { ?>
                                        <tr>
                                            <th></th>
                                            <td><?php echo $settlement_data[$key]['date']; ?></td>

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

                                            <td><?php
                                                foreach ($packages as $waybill_id => $waybill_no) { ?>
                                                    <span class="badge badge-primary"><?php echo $waybill_no; ?></span>
                                                <?php }

                                                ?>

                                            </td>
                                            <td><?php echo $settlement_data[$key]['total']; ?></td>

                                            <td>
                                                <div class="table-actions">
                                                    <!-- <a href="#" data-toggle="modal" data-target="#printModal<?php echo $settlement_data[$key]['settlement_id']; ?>"><i class="ik ik-printer"></i></a> -->

                                                    <!-- <a href="#" data-toggle="modal" data-target="#editModal<?php echo $settlement_data[$key]['settlement_id']; ?>"><i class="ik ik-edit-2"></i></a> -->
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $settlement_data[$key]['settlement_id']; ?>"><i class="ik ik-trash-2"></i></a>
                                                </div>
                                            </td>


                                            <div class="modal fade" id="printModal<?php echo $settlement_data[$key]['settlement_id']; ?>" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="demoModalLabel">Payment Receipt</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-header row">
                                                                    <div class="col col-sm-3">
                                                                        <div class="dropdown d-inline-block">
                                                                            <a class="btn-icon checkbox-dropdown dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                            <div class="dropdown-menu" aria-labelledby="moreDropdown">
                                                                                <a class="dropdown-item" id="checkbox_select_all" href="javascript:void(0);">Select All</a>
                                                                                <a class="dropdown-item" id="checkbox_deselect_all" href="javascript:void(0);">Deselect All</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-options d-inline-block">
                                                                            <a href="#"><i class="ik ik-inbox"></i></a>
                                                                            <a href="#"><i class="ik ik-plus"></i></a>
                                                                            <a href="#"><i class="ik ik-rotate-cw"></i></a>
                                                                            <div class="dropdown d-inline-block">
                                                                                <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                                                                                    <a class="dropdown-item" href="#">Action</a>
                                                                                    <a class="dropdown-item" href="#">More Action</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col col-sm-6">
                                                                        <div class="card-search with-adv-search dropdown">
                                                                            <form action="">
                                                                                <input type="text" class="form-control" placeholder="Search.." required="">
                                                                                <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                                                                                <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                                                <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control" placeholder="Full Name">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input type="email" class="form-control" placeholder="Email">
                                                                                    </div>
                                                                                    <button class="btn btn-theme">Search</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col col-sm-3">
                                                                        <div class="card-options text-right">
                                                                            <span class="mr-5">1 - 50 of 2,500</span>
                                                                            <a href="#"><i class="ik ik-chevron-left"></i></a>
                                                                            <a href="#"><i class="ik ik-chevron-right"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body p-0">
                                                                    <div class="list-item-wrap">
                                                                        <div class="list-item">
                                                                            <div class="item-inner">
                                                                                <label class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                                                                    <span class="custom-control-label">&nbsp;</span>
                                                                                </label>
                                                                                <div class="list-title"><a href="javascript:void(0)">Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry.</a></div>
                                                                                <div class="list-actions">
                                                                                    <a href="#"><i class="ik ik-eye"></i></a>
                                                                                    <a href="#"><i class="ik ik-inbox"></i></a>
                                                                                    <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                                    <a href="#"><i class="ik ik-trash-2"></i></a>
                                                                                </div>
                                                                            </div>

                                                                            <div class="qickview-wrap">
                                                                                <div class="desc">
                                                                                    <p>Fusce suscipit turpis a dolor posuere ornare at a ante. Quisque nec libero facilisis, egestas tortor eget, mattis dui. Curabitur viverra laoreet ligula at hendrerit. Nullam sollicitudin maximus leo, vel pulvinar orci semper id. Donec vehicula tempus enim a facilisis. Proin dignissim porttitor sem, sed pulvinar tortor gravida vitae.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="list-item">
                                                                            <div class="item-inner">
                                                                                <label class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option2">
                                                                                    <span class="custom-control-label">&nbsp;</span>
                                                                                </label>
                                                                                <div class="list-title"><a href="javascript:void(0)">Aenean eu pharetra arcu, vitae elementum sem. Sed non ligula molestie, finibus lacus at, suscipit mi. Nunc luctus lacus vel felis blandit, eu finibus augue tincidunt.</a></div>
                                                                                <div class="list-actions">
                                                                                    <a href="#"><i class="ik ik-eye"></i></a>
                                                                                    <a href="#"><i class="ik ik-inbox"></i></a>
                                                                                    <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                                    <a href="#"><i class="ik ik-trash-2"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="qickview-wrap">
                                                                                <div class="desc">
                                                                                    <p>Fusce suscipit turpis a dolor posuere ornare at a ante. Quisque nec libero facilisis, egestas tortor eget, mattis dui. Curabitur viverra laoreet ligula at hendrerit. Nullam sollicitudin maximus leo, vel pulvinar orci semper id. Donec vehicula tempus enim a facilisis. Proin dignissim porttitor sem, sed pulvinar tortor gravida vitae.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="list-item">
                                                                            <div class="item-inner">
                                                                                <label class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option3">
                                                                                    <span class="custom-control-label">&nbsp;</span>
                                                                                </label>
                                                                                <div class="list-title"><a href="javascript:void(0)">Donec lectus augue, suscipit in sodales sit amet, semper sit amet enim. Duis pretium, nisi id pretium ornare, tortor nibh sodales tellus.</a></div>
                                                                                <div class="list-actions">
                                                                                    <a href="#"><i class="ik ik-eye"></i></a>
                                                                                    <a href="#"><i class="ik ik-inbox"></i></a>
                                                                                    <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                                    <a href="#"><i class="ik ik-trash-2"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="qickview-wrap">
                                                                                <div class="desc">
                                                                                    <p>Fusce suscipit turpis a dolor posuere ornare at a ante. Quisque nec libero facilisis, egestas tortor eget, mattis dui. Curabitur viverra laoreet ligula at hendrerit. Nullam sollicitudin maximus leo, vel pulvinar orci semper id. Donec vehicula tempus enim a facilisis. Proin dignissim porttitor sem, sed pulvinar tortor gravida vitae.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Print Receipt</button>
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