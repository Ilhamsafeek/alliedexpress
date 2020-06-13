<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-truck bg-blue"></i>
                        <div class="d-inline">
                            <h5>Riders</h5>
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





        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-block">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="ik ik-plus"></i>Add Rider</button>

                        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demoModalLabel">Add Rider</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>


                                    <form role="form" id="createForm" action="<?php echo base_url('users/create/riders') ?>" method="post">

                                        <?php echo validation_errors(); ?>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-sm-6">

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="font-normal">Name</label>
                                                            <input id="name" name="name" type="text" class="form-control" autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
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
                                                            <label class="font-normal">Phone</label>
                                                            <input id="phone" name="phone" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <label class="font-normal">Email</label>
                                                            <input id="email" name="email" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <label class="font-normal">Commission</label>
                                                            <input id="commission" name="commission" type="text" class="form-control" autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p>Account access</p>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <label class="font-normal">Username</label>
                                                            <input type="username" class="form-control" autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <label class="font-normal">Password</label>
                                                            <input name="password" type="password" class="form-control" autocomplete="off" required>
                                                        </div>
                                                    </div>


                                                    <input id="type" name="type" type="hidden" class="form-control" value="rider">
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
                                        <th>Area</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Commission</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($user_data as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $user_data[$key]['city'] . '/' . $user_data[$key]['zone']; ?></td>
                                            <td><?php echo $user_data[$key]['name']; ?></td>
                                            <td><?php echo $user_data[$key]['phone']; ?></td>
                                            <td><?php echo $user_data[$key]['commission']; ?></td>
                                            <td>
                                                <div class="table-actions">

                                                    <a href="#" data-toggle="modal" data-target="#editModal<?php echo $user_data[$key]['user_id']; ?>"><i class="ik ik-edit-2"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $user_data[$key]['user_id']; ?>"><i class="ik ik-trash-2"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                        <div class="modal fade" id="editModal<?php echo $user_data[$key]['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel">Edit Rider</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>


                                                    <form role="form" id="createForm" action="<?php echo base_url('users/edit/' . $user_data[$key]['user_id'] . '/riders'); ?>" method="post">

                                                        <?php echo validation_errors(); ?>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-sm-6">

                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Name</label>
                                                                            <input id="name" name="name" type="text" class="form-control" autocomplete="off" value="<?php echo $user_data[$key]['name']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label" for="description">City</label>
                                                                            <select class="form-control select2" data-placeholder="Choose city" id="city_id" name="city_id" style="width:100%;" required>
                                                                                <?php foreach ($city_data as $k => $v) : ?>
                                                                                    <option value="<?php echo $v['city_id']; ?>" <?php if ($v['city_id'] == $user_data[$key]['city_id']) {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>><?php echo $v['city'] ?></option>
                                                                                <?php endforeach ?>


                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Phone</label>
                                                                            <input id="phone" name="phone" type="text" class="form-control" value="<?php echo $user_data[$key]['phone']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Email</label>
                                                                            <input id="email" name="email" type="text" class="form-control" value="<?php echo $user_data[$key]['email']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Commission</label>
                                                                            <input id="commission" name="commission" type="text" class="form-control" autocomplete="off" value="<?php echo $user_data[$key]['commission']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <p>Account access</p>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="alert alert-info alert-dismissible" role="alert">
                                                                                Leave the password field empty if you don't want to change.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Username</label>
                                                                            <input id="username" type="username" class="form-control" autocomplete="off" value="<?php echo $user_data[$key]['username']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Password</label>
                                                                            <input name="password" type="password" class="form-control" autocomplete="off">
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
                                        <div class="modal fade" id="deleteModal<?php echo $user_data[$key]['user_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel">Delete Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you Really want to delete?</p>
                                                    </div>

                                                    <form role="form" id="createForm" action="<?php echo base_url('users/delete/' . $user_data[$key]['user_id'] . '/riders'); ?>" method="post">

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
        $("#ridersMainMenu").addClass('active');
        $(".select2").select2();
    });
</script>