<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-package bg-blue"></i>
                        <div class="d-inline">
                            <h5>Packages</h5>
                            <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.html"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Tables</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                        </ol>
                    </nav>
                </div> -->
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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="ik ik-plus"></i>New Package</button>

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
                                                                <input id="way_bill_no" name="way_bill_no" type="text" class="form-control" placeholder="Way Bill Number" required>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="description">Customer</label>
                                                            <select class="form-control select2" data-placeholder="Choose customer" id="customer_id" name="customer_id" style="width:100%;" required>
                                                                <?php foreach ($customer_data as $k => $v) : ?>
                                                                    <option value="<?php echo $v['customer_id']; ?>"><?php echo $v['name'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="description">City</label>
                                                            <select class="form-control select2" data-placeholder="Choose city" id="city_id" name="city_id" style="width:100%;" required>
                                                                <?php foreach ($city_data as $k => $v) : ?>
                                                                    <option value="<?php echo $v['city_id']; ?>"><?php echo $v['city'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <label class="font-normal">Courier Cahrge</label>
                                                            <input id="courier_charge" name="courier_charge" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <label class="font-normal">COD Amount</label>
                                                            <input id="cod_amount" name="cod_amount" type="text" class="form-control" required>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="description">Rider / Agent</label>
                                                            <select class="form-control select2" data-placeholder="Choose rider/agent" id="rider_or_agent_id" name="rider_or_agent_id" style="width:100%;" required>
                                                                <?php foreach ($user_data as $k => $v) : ?>
                                                                    <option value="<?php echo $v['user_id']; ?>"><?php echo $v['username'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="description">Collected By</label>
                                                            <select class="form-control select2" data-placeholder="Choose rider/agent" id="collected_by_id" name="collected_by_id" style="width:100%;" required>
                                                                <?php foreach ($user_data as $k => $v) : ?>
                                                                    <option value="<?php echo $v['user_id']; ?>"><?php echo $v['username'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>

                                                    </div>


                                                    <input id="date" name="date" type="hidden" class="form-control" value="<?php echo date("d/m/Y"); ?>">
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
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Way Bill No</th>
                                        <th>Customer Name</th>
                                        <th>Phone</th>
                                        <th>Delivery Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($package_data as $key => $value) {

                                        $status_color = 'primary';

                                        if ($package_data[$key]['delivery_status'] == 'out for delivery') {
                                            $status_color = 'default';
                                        } else if ($package_data[$key]['delivery_status'] == 're scheduled') {
                                            $status_color = 'warning';
                                        } else if ($package_data[$key]['delivery_status'] == 'canceled') {
                                            $status_color = 'danger';
                                        } else if ($package_data[$key]['delivery_status'] == 'returned') {
                                            $status_color = 'secondary';
                                        } else if ($package_data[$key]['delivery_status'] == 'returned to customer') {
                                            $status_color = 'info';
                                        } else if ($package_data[$key]['delivery_status'] == 'delivered') {
                                            $status_color = 'success';
                                        }

                                    ?>
                                        <tr>
                                            <td><?php echo $package_data[$key]['date']; ?></td>
                                            <td><?php echo $package_data[$key]['way_bill_no']; ?></td>
                                            <td><?php echo $package_data[$key]['name']; ?></td>
                                            <td><?php echo $package_data[$key]['phone']; ?></td>

                                            <td><span class="badge badge-<?php echo $status_color; ?>"><?php echo $package_data[$key]['delivery_status']; ?></span></td>
                                            <td>
                                                <div class="table-actions">
                                                    <a href="#" data-toggle="modal" data-target="#updateModal<?php echo $package_data[$key]['package_id']; ?>"><i class="ik ik-refresh-cw"></i></a>

                                                    <a href="#" data-toggle="modal" data-target="#editModal<?php echo $package_data[$key]['package_id']; ?>"><i class="ik ik-edit-2"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $package_data[$key]['package_id']; ?>"><i class="ik ik-trash-2"></i></a>
                                                </div>
                                            </td>

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
                                                                                <option value="collected" <?php if ($package_data[$key]['delivery_status'] == 'collected') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Collected</option>
                                                                                <option value="out for delivery" <?php if ($package_data[$key]['delivery_status'] == 'out for delivery') {
                                                                                                                        echo 'selected';
                                                                                                                    } ?>>Out for Delivery</option>
                                                                                <option value="re scheduled" <?php if ($package_data[$key]['delivery_status'] == 're scheduled') {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>Re Scheduled</option>
                                                                                <option value="canceled" <?php if ($package_data[$key]['delivery_status'] == 'canceled') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Canceled</option>
                                                                                <option value="returned" <?php if ($package_data[$key]['delivery_status'] == 'returned') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Returned</option>
                                                                                <option value="delivered" <?php if ($package_data[$key]['delivery_status'] == 'delivered') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Delivered</option>
                                                                                <option value="returned to customer" <?php if ($package_data[$key]['delivery_status'] == 'returned to customer') {
                                                                                                                            echo 'selected';
                                                                                                                        } ?>>Returned to Customer</option>

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
                                                                            <input name="rescheduled_date" type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" value="<?php echo $package_data[$key]['rescheduled_date']; ?>">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12" id="receiver_name_delivery_status_<?php echo $package_data[$key]['package_id'] ?>">
                                                                        <div class="form-group">
                                                                            <label for="date">Receiver Name</label>
                                                                            <input name="receiver_name" type="text" class="form-control" value="<?php echo $package_data[$key]['receiver_name']; ?>">
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
                                                                            <select class="form-control select2" data-placeholder="Choose customer" id="customer_id" name="customer_id" style="width:100%;" required>
                                                                                <?php foreach ($customer_data as $k => $v) : ?>
                                                                                    <option value="<?php echo $v['customer_id']; ?>" <?php if ($v['customer_id'] == $package_data[$key]['customer_id']) {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>><?php echo $v['name'] ?></option>
                                                                                <?php endforeach ?>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label" for="description">City</label>
                                                                            <select class="form-control select2" data-placeholder="Choose city" id="city_id" name="city_id" style="width:100%;" required>
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
                                                                            <input id="courier_charge" name="courier_charge" type="text" class="form-control" value="<?php echo $package_data[$key]['courier_charge']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">COD Amount</label>
                                                                            <input id="cod_amount" name="cod_amount" type="text" class="form-control" value="<?php echo $package_data[$key]['cod_amount']; ?>" required>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label" for="description">Rider / Agent</label>
                                                                            <select class="form-control select2" data-placeholder="Choose rider/agent" id="rider_or_agent_id" name="rider_or_agent_id" style="width:100%;" required>
                                                                                <?php foreach ($user_data as $k => $v) : ?>
                                                                                    <option value="<?php echo $v['user_id']; ?>" <?php if ($v['user_id'] == $package_data[$key]['rider_or_agent_id']) {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>><?php echo $v['username'] ?></option>
                                                                                <?php endforeach ?>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label" for="description">Collected By</label>
                                                                            <select class="form-control select2" data-placeholder="Choose rider/agent" id="collected_by_id" name="collected_by_id" style="width:100%;" required>
                                                                                <?php foreach ($user_data as $k => $v) : ?>
                                                                                    <option value="<?php echo $v['user_id']; ?>" <?php if ($v['user_id'] == $package_data[$key]['collected_by_id']) {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>><?php echo $v['username'] ?></option>
                                                                                <?php endforeach ?>
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
        var package_data = <?php echo json_encode($package_data); ?>;
        package_data.forEach(element => {
            enableReason("test", element.package_id);
        });
    });


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


        if ($("#" + id).val() == 'delivered') {
            document.getElementById('receiver_name_' + id).style.display = 'block';
        } else {
            document.getElementById('receiver_name_' + id).style.display = 'none';

        }
    }
</script>