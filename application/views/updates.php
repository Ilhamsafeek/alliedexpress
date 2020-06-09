<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-refresh"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="chain.html"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li>Updates</li>
                </ul>
                <h4>Zamzam Updates</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
    <div class="contentpanel">

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




        <?php if ($update_data) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> New Update</a>

                                </div>
                            </div>
                            <div class="ibox-content">

                                <table id="shTable" class="footable table table-bordered table-stripped table-hover" data-page-size="8" data-filter=#filter>
                                    <thead>
                                        <tr>

                                            <th data-hide="phone">Posted Time</th>
                                            <th data-hide="phone">Image</th>
                                            <th data-hide="phone">Tag Line</th>
                                            <th data-hide="phone">Status</th>

                                            <th class="text-right" data-sort-ignore="true">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($update_data as $k => $v) : ?>
                                            <tr>

                                                <td>
                                                    <?php echo $v['update_info']['date_time']; ?>
                                                </td>
                                                <td>

                                                    <img class="img-circle" src="<?php echo $v['update_info']['image_url']; ?>" width="30px" alt="">
                                                </td>
                                                <td>
                                                    <?php echo $v['update_info']['tag_line']; ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php echo $v['update_info']['status']; ?>
                                                    </button>
                                                </td>



                                                <td class="text-right">
                                                    <div class="btn-group">

                                                        <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#editModal<?php echo $v['update_info']['update_id']; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        <a class="btn btn-default btn-xs" href="#" data-toggle="modal" data-target="#deleteModal<?php echo $v['update_info']['update_id']; ?>"><i class="fa fa-trash-o"></i> Delete</a>

                                                    </div>


                                                </td>
                                            </tr>

                                            <div class="modal inmodal" id="deleteModal<?php echo $v['update_info']['update_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                                            <h4 class="modal-title">Confirm Delete?</h4>
                                                        </div>
                                                        <form role="form" action="<?php echo base_url('updates/deleteupdate/' . $v['update_info']['update_id']) ?>" method="post" id="issueForm">
                                                            <div class="confirmation-modal-body">

                                                                <div class="modal-footer d-flex justify-content-around">
                                                                    <button type="button" class="btn btn-white" data-dismiss="modal">No</button>
                                                                    <button type="submit" class="btn btn-success" name="confirm" value="Confirm">Yes</button>
                                                                </div>
                                                            </div>


                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal inmodal" id="editModal<?php echo $v['update_info']['update_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                                            <h4 class="modal-title">Edit Zamzam Update</h4>
                                                        </div>
                                                        <form role="form" action="<?php echo base_url('updates/editupdate/' . $v['update_info']['update_id']) ?>" method="post" id="issueForm" enctype="multipart/form-data">
                                                            <div class="modal-body">

                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Tag Line</label>
                                                                            <input id="tag_line" name="tag_line" type="text" class="form-control" value="<?php echo $v['update_info']['tag_line']; ?>" required>

                                                                        </div>
                                                                    </div>


                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label for="image_url" class="col-sm-3 control-label">Image</label>
                                                                            <input type="file" name="image_url" id="image_url">
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <?php if ($v['update_info']['image_url'] != "") : ?>
                                                                                <img src="<?php echo $v['update_info']['image_url']; ?>" width="40px" height="40px">
                                                                            <?php endif ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <!-- <div class="form-group">
                                                                            <label class="font-normal">Status</label>
                                                                            <textarea id="status" name="status" type="text" class="form-control" required><?php echo $v['update_info']['status']; ?></textarea>

                                                                        </div> -->
                                                                        <input id="status" name="status" value="inactive" type="checkbox" <?php  if($v['update_info']['status']=='active'){ echo 'checked'; }?> data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-width="100">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-around">
                                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Discard</button>
                                                                    <button type="submit" class="btn btn-success">Update</button>
                                                                </div>
                                                            </div>


                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach ?>

                                    </tbody>

                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>

            <div class="notfoundpanel">

                <div class="row">
                    <img src="https://plugin.intuitcdn.net/transactions-list-ui/3.21.10/images/1369e3744cf993faa355b5f7f4833b1a.svg" width="200px">
                </div>
                <div class="row">
                    <h2><strong>Create New ZamZam Update to display in mobile app home page</strong></h2>
                </div>
                <div class="row">
                    <a href="#" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Create Zamzam Update</a>
                </div>
            </div>

        <?php } ?>

        <div class="modal inmodal" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                        <h4 class="modal-title">New Zamzam Update</h4>
                    </div>
                    <form role="form" action="<?php echo base_url('updates/createupdate') ?>" method="post" id="issueForm" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="font-normal">Tag Line</label>
                                        <input id="tag_line" name="tag_line" type="text" class="form-control" required>

                                    </div>
                                </div>


                            </div>


                            <div class="row">

                                <div class="form-group">
                                    <label for="photo" class="col-sm-3 control-label">Image</label>

                                    <div class="col-sm-9">
                                        <input type="file" name="image_url" id="image_url">
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer d-flex justify-content-around">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>


    </div>

    <script>
        $(document).ready(function() {
            $("#updatesMainMenu").addClass('active');
            $("#zamzamUpdatesMenu").addClass('active');



        });

       
    </script>