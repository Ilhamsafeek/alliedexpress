<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-package bg-blue"></i>
                        <div class="d-inline">
                            <h5>Packages</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="ik ik-home"></i></a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">Packages</li>
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
                    <div class="card-header row">
                        <div class="col col-sm-3">
                            <?php if ($this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'staff') : ?>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="ik ik-plus"></i>New Package</button>
                            <?php endif; ?>
                            <div class="modal fade" id="addModal" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="demoModalLabel">New Package</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>


                                        <form role="form" id="createForm" action="<?php echo base_url('packages/create') ?>" method="post" onkeydown="return event.key != 'Enter';">

                                            <?php echo validation_errors(); ?>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-sm-6">

                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <div class="input-group input-group-success">
                                                                    <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-hash"></i></label></span>
                                                                    <input id="way_bill_no" name="way_bill_no" type="text" class="form-control" placeholder="Way Bill Number" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="description">Customer</label>
                                                                <select class="form-control select2 customer" data-placeholder="Choose customer" id="customer_id" name="customer_id" style="width:100%;" required>
                                                                    <?php foreach ($customer_data as $k => $v) : ?>
                                                                        <option value="<?php echo $v['user_id']; ?>"><?php echo $v['company'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="font-normal">Receiver name</label>
                                                                <input id="receiver_name" name="receiver_name" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label class="font-normal">Receiver phone</label>
                                                                <input id="receiver_phone" name="receiver_phone" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="font-normal">Receiver address</label>
                                                                <textarea id="receiver_address" name="receiver_address" type="text" class="form-control" required></textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="description">City</label>
                                                                <select class="form-control select2" data-placeholder="Choose city" id="city_id_add" name="city_id" style="width:100%;" onchange="fillCahrge(this)" required>
                                                                    <?php foreach ($city_data as $k => $v) : ?>
                                                                        <option value="<?php echo $v['city_id']; ?>"><?php echo $v['city'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label class="font-normal">Courier Charge</label>
                                                                <input id="courier_charge_add" name="courier_charge" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label class="font-normal">COD Amount</label>
                                                                <input id="cod_amount" name="cod_amount" type="text" class="form-control" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="description">Rider / Agent</label>
                                                                <select class="form-control select2" data-placeholder="Choose rider/agent" id="rider_or_agent_id" name="rider_or_agent_id" style="width:100%;" required>
                                                                    <?php foreach ($user_data as $k => $v) :
                                                                        if ($v['type'] == 'rider' || $v['type'] == 'agent') :
                                                                    ?>
                                                                            <option value="<?php echo $v['user_id']; ?>"><?php echo $v['name'] ?></option>
                                                                    <?php
                                                                        endif;
                                                                    endforeach ?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="description">Collected By</label>
                                                                <select class="form-control select2" data-placeholder="Choose rider/agent" id="collected_by_id" name="collected_by_id" style="width:100%;" required>
                                                                    <?php foreach ($user_data as $k => $v) :
                                                                        if ($v['type'] == 'rider' || $v['type'] == 'agent') :
                                                                    ?>
                                                                            <option value="<?php echo $v['user_id']; ?>"><?php echo $v['name'] ?></option>
                                                                    <?php
                                                                        endif;
                                                                    endforeach ?>
                                                                </select>
                                                            </div>

                                                        </div>


                                                        <input id="date" name="date" type="hidden" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                                    </div>

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

                        <div class="col col-sm-6">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="">From</label>
                                    <input type="date" id="from_date_filter" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="">To</label>
                                    <input type="date" id="to_date_filter" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                </div>

                            </div>
                        </div>
                        <div class="col col-sm-3">
                            <div class="card-options text-right">
                                <button type="button" class="btn btn-default" onclick="printDiv()"><i class="ik ik-printer"></i>Print Report</button>

                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive" id="printable_table">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <?php if ($this->session->userdata()['type'] != 'customer') : ?>
                                            <th></th>
                                        <?php endif; ?>
                                        <th style="text-align: center; width: 10%;">Collected Date</th>
                                        <th style=" text-align: center;">Way Bill No</th>
                                        <?php if ($this->session->userdata()['type'] != 'customer') : ?>
                                            <th>Customer</th>
                                        <?php endif; ?>
                                        <th style="text-align: center;">Rider / Agent</th>
                                        <th style="text-align: center;">COD Amount</th>
                                        <th style="text-align: center;">Courier Charge</th>
                                        <th style="text-align: center;">Area</th>
                                        <th style="text-align: center;">Delivery Status</th>
                                        <?php if ($this->session->userdata()['type'] == 'customer' || $this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'agent' || $this->session->userdata()['type'] == 'staff') : ?>
                                            <th style="text-align: center;">Payment Status</th>
                                        <?php endif; ?>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($package_data as $key => $value) {

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
                                            <?php if ($this->session->userdata()['type'] != 'customer') : ?>
                                                <td>
                                                    <div class="table-actions">

                                                        <a href="#" data-toggle="modal" data-target="#updateModal<?php echo $package_data[$key]['package_id']; ?>"><i class="ik ik-refresh-cw"></i></a>

                                                        <?php if ($this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'staff') : ?>
                                                            <a href="#" data-toggle="modal" data-target="#editModal<?php echo $package_data[$key]['package_id']; ?>"><i class="ik ik-edit-2"></i></a>
                                                        <?php endif; ?>
                                                        <?php if ($this->session->userdata()['type'] == 'admin') : ?>
                                                            <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $package_data[$key]['package_id']; ?>"><i class="ik ik-trash-2"></i></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                            <td><?php echo $package_data[$key]['date']; ?></td>
                                            <td><?php echo $package_data[$key]['way_bill_no']; ?></td>
                                            <?php if ($this->session->userdata()['type'] != 'customer') : ?>
                                                <td><?php echo $package_data[$key]['company']; ?></td>
                                            <?php endif; ?>
                                            <td>
                                                <?php foreach ($user_data as $k => $v) :
                                                    if (($v['type'] == 'rider' || $v['type'] == 'agent') && $v['user_id'] == $package_data[$key]['rider_or_agent_id']) :
                                                        echo  $v['name'];
                                                    endif;
                                                endforeach ?>



                                            </td>
                                            <td style="text-align: right;"><?php echo number_format($package_data[$key]['cod_amount'], 2); ?></td>
                                            <?php if ($this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'staff') : ?>
                                                <td style="text-align: right;"><?php echo number_format($package_data[$key]['courier_charge'], 2); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo $package_data[$key]['city'] . ' / ' . $package_data[$key]['zone']; ?></td>

                                            <td style="text-align: center;">
                                                <a href="#" data-toggle="modal" data-target="#statusModal<?php echo $package_data[$key]['package_id']; ?>"> <span class="badge badge-<?php echo $status_color; ?>"><?php echo $package_data[$key]['delivery_status']; ?></span> <?php echo $package_data[$key]['last_status_update_date']; ?></a>
                                            </td>

                                            <?php if ($this->session->userdata()['type'] == 'customer' || $this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'agent' || $this->session->userdata()['type'] == 'staff') :
                                                if ($this->session->userdata()['type'] == 'customer' || $this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'staff') {
                                                    if ($package_data[$key]['customer_payment_id'] != '' && $package_data[$key]['delivery_status'] == 'delivered') { ?>
                                                        <td style="text-align: center;">
                                                            <a href="#"> <span class="badge  badge-pill badge-success">paid</span></a>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td style="text-align: center;">
                                                            <a href="#"> <span class="badge  badge-pill badge-info">pending</span></a>
                                                        </td>
                                                    <?php }
                                                } else {
                                                    if ($package_data[$key]['settlement_id'] != '') { ?>
                                                        <td style="text-align: center;">
                                                            <a href="#"> <span class="badge  badge-pill badge-success">paid</span></a>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td style="text-align: center;">
                                                            <a href="#"> <span class="badge  badge-pill badge-info">pending</span></a>
                                                        </td>
                                                <?php }
                                                } ?>
                                            <?php endif;  ?>


                                        </tr>

                                        <div class="modal fade" id="updateModal<?php echo $package_data[$key]['package_id']; ?>" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel">Update Package</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>


                                                    <form role="form" id="createForm" action="<?php echo base_url('packages/edit/' . $package_data[$key]['package_id']); ?>" method="post">

                                                        <?php echo validation_errors(); ?>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-sm-12">

                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label" for="description">Status</label>
                                                                            <select class="form-control select2" data-placeholder="Choose customer" id="delivery_status_<?php echo $package_data[$key]['package_id'] ?>" name="delivery_status" style="width:100%;" onchange="enableReason(this)" required>
                                                                                <?php if ($this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'staff') : ?>
                                                                                    <option value="collected" <?php if ($package_data[$key]['delivery_status'] == 'collected') {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>Collected</option>
                                                                                <?php endif; ?>
                                                                                <?php if ($this->session->userdata()['type'] != 'rider') : ?>
                                                                                    <option value="out for delivery" <?php if ($package_data[$key]['delivery_status'] == 'out for delivery') {
                                                                                                                            echo 'selected';
                                                                                                                        } ?>>Out for Delivery</option>
                                                                                <?php endif; ?>
                                                                                <option value="re scheduled" <?php if ($package_data[$key]['delivery_status'] == 're scheduled') {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>Re Scheduled</option>
                                                                                <?php if ($this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'staff') : ?>
                                                                                    <option value="canceled" <?php if ($package_data[$key]['delivery_status'] == 'canceled') {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>Canceled</option>
                                                                                <?php endif; ?>
                                                                                <?php if ($this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'rider' || $this->session->userdata()['type'] == 'staff') : ?>
                                                                                    <option value="returned" <?php if ($package_data[$key]['delivery_status'] == 'returned') {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>Returned</option>
                                                                                <?php endif; ?>
                                                                                <option value="delivered" <?php if ($package_data[$key]['delivery_status'] == 'delivered') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Delivered</option>
                                                                                <?php if ($this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'staff') : ?>
                                                                                    <option value="returned to customer" <?php if ($package_data[$key]['delivery_status'] == 'returned to customer') {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>>Returned to Customer</option>
                                                                                <?php endif; ?>
                                                                                <?php if ($this->session->userdata()['type'] != 'rider') : ?>
                                                                                    <option value="received to destination" <?php if ($package_data[$key]['delivery_status'] == 'received to destination') {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>>Received to destination</option>
                                                                                <?php endif; ?>
                                                                                <?php if ($this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'agent' || $this->session->userdata()['type'] == 'staff') : ?>
                                                                                    <option value="returned to head office" <?php if ($package_data[$key]['delivery_status'] == 'returned to head office') {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>>Returned to head office</option>
                                                                                <?php endif; ?>

                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <textarea id="reason_delivery_status_<?php echo $package_data[$key]['package_id'] ?>" name="reason" type="text" class="form-control" placeholder="Reason"><?php echo $package_data[$key]['reason']; ?></textarea>

                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-8" id="rescheduled_date_delivery_status_<?php echo $package_data[$key]['package_id'] ?>">
                                                                        <div class="form-group">
                                                                            <label for="date">Date</label>
                                                                            <input name="rescheduled_date" type="date" class="form-control" value="<?php echo $package_data[$key]['rescheduled_date']; ?>">
                                                                        </div>
                                                                    </div>


                                                                </div>


                                                            </div>

                                                            <input type="hidden" name="last_status_update_date" value="<?php echo date('Y-m-d'); ?>">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="editModal<?php echo $package_data[$key]['package_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel">Edit Package</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>


                                                    <form role="form" id="createForm" action="<?php echo base_url('packages/edit/' . $package_data[$key]['package_id']); ?>" method="post">

                                                        <?php echo validation_errors(); ?>
                                                        <div class="modal-body">


                                                            <div class="row">
                                                                <div class="col-sm-6">

                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">

                                                                            <div class="input-group input-group-success">
                                                                                <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-hash"></i></label></span>
                                                                                <input id="way_bill_no" name="way_bill_no" type="text" class="form-control" placeholder="Way Bill Number" value="<?php echo $package_data[$key]['way_bill_no']; ?>" required>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label" for="description">Customer</label>
                                                                            <select class="form-control select2" data-placeholder="Choose customer" id="customer_id_<?php echo $package_data[$key]['package_id']; ?>" name="customer_id" style="width:100%;" required>
                                                                                <?php foreach ($customer_data as $k => $v) : ?>
                                                                                    <option value="<?php echo $v['user_id']; ?>" <?php if ($v['user_id'] == $package_data[$key]['customer_id']) {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>><?php echo $v['company'] ?></option>
                                                                                <?php endforeach ?>
                                                                            </select>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Receiver name</label>
                                                                            <input id="receiver_name" name="receiver_name" type="text" class="form-control" value="<?php echo $package_data[$key]['receiver_name']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Receiver phone</label>
                                                                            <input id="receiver_phone" name="receiver_phone" type="text" class="form-control" value="<?php echo $package_data[$key]['receiver_phone']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Receiver address</label>
                                                                            <textarea id="receiver_address" name="receiver_address" type="text" class="form-control" required> <?php echo $package_data[$key]['receiver_address']; ?></textarea>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label" for="description">City</label>
                                                                            <select class="form-control select2" data-placeholder="Choose city" id="city_id_add_<?php echo $package_data[$key]['package_id']; ?>" name="city_id" style="width:100%;" onchange="fillCahrge(this)" required>
                                                                                <?php foreach ($city_data as $k => $v) : ?>
                                                                                    <option value="<?php echo $v['city_id']; ?>" <?php if ($v['city_id'] == $package_data[$key]['city_id']) {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>><?php echo $v['city'] ?></option>
                                                                                <?php endforeach ?>
                                                                            </select>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Courier Charge</label>
                                                                            <input id="courier_charge_edit_city_id_add_<?php echo $package_data[$key]['package_id']; ?>" name="courier_charge" type="text" class="form-control" value="<?php echo $package_data[$key]['courier_charge']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">COD Amount</label>
                                                                            <input id="cod_amount" name="cod_amount" type="text" class="form-control" value="<?php echo $package_data[$key]['cod_amount']; ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label" for="description">Rider / Agent</label>
                                                                            <select class="form-control select2" data-placeholder="Choose rider/agent" id="rider_or_agent_id_<?php echo $package_data[$key]['package_id']; ?>" name="rider_or_agent_id" style="width:100%;" required>
                                                                                <?php foreach ($user_data as $k => $v) :
                                                                                    if ($v['type'] == 'rider' || $v['type'] == 'agent') :
                                                                                ?>
                                                                                        <option value="<?php echo $v['user_id']; ?>" <?php if ($v['user_id'] == $package_data[$key]['rider_or_agent_id']) {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>><?php echo $v['name'] ?></option>
                                                                                <?php
                                                                                    endif;
                                                                                endforeach ?>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label" for="description">Collected By</label>
                                                                            <select class="form-control select2" data-placeholder="Choose rider/agent" id="collected_by_id_<?php echo $package_data[$key]['package_id']; ?>" name="collected_by_id" style="width:100%;" required>
                                                                                <?php foreach ($user_data as $k => $v) :
                                                                                    if ($v['type'] == 'rider' || $v['type'] == 'agent') :
                                                                                ?>
                                                                                        <option value="<?php echo $v['user_id']; ?>" <?php if ($v['user_id'] == $package_data[$key]['collected_by_id']) {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>><?php echo $v['name'] ?></option>
                                                                                <?php
                                                                                    endif;
                                                                                endforeach ?>
                                                                            </select>
                                                                        </div>

                                                                    </div>

                                                                </div>

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
                                        <div class="modal fade" id="deleteModal<?php echo $package_data[$key]['package_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel">Delete Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you Really want to delete?</p>
                                                    </div>

                                                    <form role="form" id="createForm" action="<?php echo base_url('packages/delete/' . $package_data[$key]['package_id']) ?>" method="post">

                                                        <?php echo validation_errors(); ?>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
        $("#packagesMainMenu").addClass('active');
        $(".select2").select2();
        $("#customer_id").select2();

        $("#rider_or_agent_id").select2();
        $("#collected_by_id").select2();
        var package_data = <?php echo json_encode($package_data); ?>;
        package_data.forEach(element => {
            enableReason("test", element.package_id);
        });

        fillCahrge(document.getElementById('city_id_add'));
    });

    function fillCahrge(selected_city) {

        var city_data = <?php echo json_encode($city_data); ?>;

        var city = city_data.filter(function(city) {

            return city.city_id == selected_city.value;
        });


        var id = $(selected_city).attr("id");
        if (id == 'city_id_add') {
            $('#courier_charge_add').val(city[0].courier_price);
        } else {
            $('#courier_charge_edit_' + id).val(city[0].courier_price);
        }
    }

    function enableReason(item, row_id = null) {

        var id = $(item).attr("id");
        if (row_id != null) {
            id = "delivery_status_" + row_id;
        }
        if ($("#" + id).val() == 'canceled' ||
            $("#" + id).val() == 'returned' ||
            $("#" + id).val() == 'returned to customer') {
            document.getElementById('reason_' + id).style.display = 'block';
        } else {
            document.getElementById('reason_' + id).style.display = 'none';

        }

        if ($("#" + id).val() == 're scheduled') {
            document.getElementById('rescheduled_date_' + id).style.display = 'block';
        } else {
            document.getElementById('rescheduled_date_' + id).style.display = 'none';

        }
    }

    function InvalidMsg(textbox) {

        if (textbox.value === '') {
            textbox.setCustomValidity('Entering way bill number is necessary!');
        } else if (textbox.validity.typeMismatch) {
            textbox.setCustomValidity('Please enter valid way bill number!');

        } else {
            if (isExists(textbox.value) == true) {
                textbox.setCustomValidity('Please enter a unique way bill number');

            } else {
                textbox.setCustomValidity('');
            }
        }



        return true;
    }

    function isExists(value) {
        console.log('entering');
        var exists = false;
        var package_data = <?php echo json_encode($package_data); ?>;
        package_data.forEach(element => {

            if (element.way_bill_no == value) {
                exists = true;
            }

        });
        return exists;
    }
</script>


<script>
    function printDiv() {
        var totalCOD = 0;
        var totalCourier = 0;
        var from = new Date(document.getElementById('from_date_filter').value);
        var to = new Date(document.getElementById('to_date_filter').value);
        $('#printable_table tr').each(function(index, elem) {
            $(this).find('th').eq(0).remove();
            $(this).find('td').eq(0).remove();

            // after removal


            var package_date = new Date($(this).find('td').eq(0).text());

            if ((from.getTime() <= package_date.getTime()) && (to.getTime() >= package_date.getTime())) {

            } else {
                $(this).remove();
            }

            totalCOD = totalCOD + Number($(this).find('td').eq(4).text().replace(',', ''));
            totalCourier = totalCourier + Number($(this).find('td').eq(5).text().replace(',', ''));

        });

        
        $("#printable_table").append(" <br> <hr> <b>From :" +
            document.getElementById('from_date_filter').value + " to " +
            document.getElementById('to_date_filter').value + 
            "</b> <br><hr> <b>Total COD : " +Number((totalCOD).toFixed(1)).toLocaleString() + "<br>" +
            "<b>Total Courier Charge : " +Number((totalCourier).toFixed(1)).toLocaleString() + "</b>");
        var printContents = document.getElementById('printable_table').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

        location.reload();



    }
</script>