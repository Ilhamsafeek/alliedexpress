<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-minus-circle bg-blue"></i>
                        <div class="d-inline">
                            <h5>Other Expenses</h5>
                            <span>Additional expenses to the business</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href=""><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Other Expenses</a>
                            </li>
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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="ik ik-plus"></i>Add New Expense</button>

                        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demoModalLabel">Add New Expense</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>


                                    <form role="form" id="createForm" action="<?php echo base_url('expenses/createexpense') ?>" method="post">

                                        <?php echo validation_errors(); ?>
                                        <div class="modal-body">

                                            <div class="row">

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="font-normal">Date</label>
                                                        <input name="date" type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="font-normal">Description</label>
                                                        <input id="description" name="description" type="text" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="font-normal">Amount</label>
                                                        <input id="amount" name="amount" type="text" class="form-control" required>
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
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Amount</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($expense_data as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $expense_data[$key]['date']; ?></td>

                                            <td><?php echo $expense_data[$key]['description']; ?></td>
                                            <td><?php echo $expense_data[$key]['amount']; ?></td>

                                            <td>
                                                <div class="table-actions">

                                                    <a href="#" data-toggle="modal" data-target="#editModal<?php echo $expense_data[$key]['expense_id']; ?>"><i class="ik ik-edit-2"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $expense_data[$key]['expense_id']; ?>"><i class="ik ik-trash-2"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                        <div class="modal fade" id="editModal<?php echo $expense_data[$key]['expense_id']; ?>" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel">Edit Expense</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>


                                                    <form role="form" id="createForm" action="<?php echo base_url('expenses/editexpense/' . $expense_data[$key]['expense_id']) ?>" method="post">

                                                        <?php echo validation_errors(); ?>
                                                        <div class="modal-body">

                                                            <div class="row">




                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="font-normal">Date</label>
                                                                        <input name="date" type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" value="<?php echo $expense_data[$key]['date']; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="font-normal">Description</label>
                                                                        <input id="description" name="description" type="text" class="form-control" value="<?php echo $expense_data[$key]['description']; ?>" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="font-normal">Amount</label>
                                                                        <input id="amount" name="amount" type="text" class="form-control" value="<?php echo $expense_data[$key]['amount']; ?>" required>
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
                                        <div class="modal fade" id="deleteModal<?php echo $expense_data[$key]['expense_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel">Delete Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you Really want to delete?</p>
                                                    </div>

                                                    <form role="form" id="createForm" action="<?php echo base_url('expenses/deleteexpense/' . $expense_data[$key]['expense_id']) ?>" method="post">

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
        $("#otherExpensesMainMenu").addClass('active');

        $(".select2").select2();
    });
</script>