<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user bg-blue"></i>
                        <div class="d-inline">
                            <h5>Profile</h5>
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
                    <div class="card-body">

                        <form role="form" id="createForm" action="<?php echo base_url('users/edit/' . $account_data['user_id'] . '/dashboard'); ?>" method="post">

                            <?php
                            echo validation_errors(); ?>

                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="font-normal">Username</label>
                                            <input readonly id="username" name="username" type="text" class="form-control" autocomplete="off" value="<?php echo $account_data['username']; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label class="font-normal">Phone</label>
                                            <input id="phone" name="phone" type="text" class="form-control" value="<?php echo  $account_data['phone']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label class="font-normal">Email</label>
                                            <input id="email" name="email" type="text" class="form-control" value="<?php echo  $account_data['email']; ?>" required>
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
                                            <label class="font-normal">Password</label>
                                            <input id="password" name="password" type="password" class="form-control" autocomplete="off">
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
    </div>
</div>