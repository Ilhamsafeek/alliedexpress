<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-triangle bg-blue"></i>
                        <div class="d-inline">
                            <h5>Zone</h5>
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
                                <a href="#">Master files</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Zone</li>
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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="ik ik-plus"></i>Add Zone</button>

                        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demoModalLabel">Add Zone</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>


                                    <form role="form" id="createForm" action="<?php echo base_url('areas/createzone') ?>" method="post">

                                        <?php echo validation_errors(); ?>
                                        <div class="modal-body">

                                            <div class="row">


                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="font-normal">Zone</label>
                                                        <input id="zone" name="zone" type="text" class="form-control" required>
                                                    </div>
                                                </div>


                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="font-normal">Courier Price</label>
                                                        <input id="courier_price" name="courier_price" type="text" class="form-control" required>
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
                                        <th>Zone</th>
                                        <th>Courier Price</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($zone_data as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $zone_data[$key]['zone']; ?></td>

                                            <td><?php echo $zone_data[$key]['courier_price']; ?></td>

                                            <td>
                                                <div class="table-actions">

                                                    <a href="#" data-toggle="modal" data-target="#editModal<?php echo $zone_data[$key]['zone_id']; ?>"><i class="ik ik-edit-2"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $zone_data[$key]['zone_id']; ?>"><i class="ik ik-trash-2"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                        <div class="modal fade" id="editModal<?php echo $zone_data[$key]['zone_id']; ?>" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel">Edit Zone</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>


                                                    <form role="form" id="createForm" action="<?php echo base_url('areas/editzone/' . $zone_data[$key]['zone_id']) ?>" method="post">

                                                        <?php echo validation_errors(); ?>
                                                        <div class="modal-body">

                                                            <div class="row">



                                                                <div class="col-sm-8">
                                                                    <div class="form-group">
                                                                        <label class="font-normal">Zone</label>
                                                                        <input id="zone" name="zone" type="text" class="form-control" value="<?php echo $zone_data[$key]['zone']; ?>" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-8">
                                                                    <div class="form-group">
                                                                        <label class="font-normal">Courier Price</label>
                                                                        <input id="courier_price" name="courier_price" type="text" class="form-control" value="<?php echo $zone_data[$key]['courier_price']; ?>" required>
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
                                        <div class="modal fade" id="deleteModal<?php echo $zone_data[$key]['zone_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel">Delete Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you Really want to delete?</p>
                                                    </div>

                                                    <form role="form" id="createForm" action="<?php echo base_url('areas/deletezone/' . $zone_data[$key]['zone_id']) ?>" method="post">

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
        $("#zoneMainMenu").addClass('active');

        $(".select2").select2();
    });
</script>