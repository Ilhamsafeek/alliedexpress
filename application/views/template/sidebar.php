<div class="leftpanel" style=" position: fixed; top:50px; height: 100%; position: fixed;">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="">
            <img class="img-circle" src="<?php echo base_url('assets/images/photos-profile.png '); ?>" alt=""></a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $this->session->userdata('username'); ?></h4>
            <small class="text-muted"><?php echo $this->session->userdata('email'); ?></small>
        </div>
    </div><!-- media -->

    <ul class="nav nav-pills nav-stacked">
        <li id="dashboardMainMenu"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>


        <li class="parent" id="profileMainMenu"><a href="#"><i class="fa fa-users"></i> <span>Profiles</span></a>
            <ul class="children">
                <?php if (in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
                    <li id="rolesMenu"><a href="<?php echo base_url('roles'); ?>">Roles</a></li>
                <?php endif; ?>
                <?php if (in_array('createAdmins', $user_permission) || in_array('updateAdmins', $user_permission) || in_array('viewAdmins', $user_permission) || in_array('deleteAdmins', $user_permission)) : ?>

                    <li id="adminMenu"><a href="<?php echo base_url('admins'); ?>">Admins</a></li>
                <?php endif; ?>
                <?php if (in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
                    <li id="userMenu"><a href="<?php echo base_url('users'); ?>">Users</a></li>
                <?php endif; ?>
            </ul>
        </li>
        <?php if (in_array('createMasterfiles', $user_permission) || in_array('updateMasterfiles', $user_permission) || in_array('viewMasterfiles', $user_permission) || in_array('deleteMasterfiles', $user_permission)) : ?>

        <li class="parent" id="masterFilesMainMenu"><a href="chain.html"><i class="fa fa-folder"></i> <span>Master Files</span></a>
            <ul class="children">
                <li id="projectTypesMenu"><a href="<?php echo base_url('masterfiles/projecttypes'); ?>">Project Types</a></li>
                <li id="projectCategoriesMenu"><a href="<?php echo base_url('masterfiles/projectcategories'); ?>">Project Categories</a></li>
                <li id="projectSubCategoriesMenu"><a href="<?php echo base_url('masterfiles/projectsubcategories'); ?>">Project Sub Categories</a></li>
                <li id="mahallaMenu"><a href="<?php echo base_url('masterfiles/mahalla'); ?>">Mahalla</a></li>
                <li id="channelsMenu"><a href="<?php echo base_url('masterfiles/channels'); ?>">Channels</a></li>
                <li id="implementorTypeMenu"><a href="<?php echo base_url('masterfiles/implementortypes'); ?>">Implementor Type</a></li>
                <li id="implementorsMenu"><a href="<?php echo base_url('masterfiles/implementors'); ?>">Implementors</a></li>

            </ul>
        </li>
        <?php endif; ?>
        <?php if (in_array('createProject', $user_permission) || in_array('updateProject', $user_permission) || in_array('viewProject', $user_permission) || in_array('deleteProject', $user_permission)) : ?>

        <li class="parent" id="projectMainMenu"><a href="chain.html"><i class="fa fa-bars"></i> <span>Project</span></a>
            <ul class="children">
                <li id="createProjectMenu"><a href="<?php echo base_url('project/createproject'); ?>">Create Project</a></li>
                <li id="allProjectsMenu"><a href="<?php echo base_url('project/allprojects'); ?>">All Projects</a></li>

            </ul>
        </li>
        <?php endif; ?>
        <?php if (in_array('createSermon', $user_permission) || in_array('updateSermon', $user_permission) || in_array('viewSermon', $user_permission) || in_array('deleteSermon', $user_permission)) : ?>
    
        
        <li class="parent" id="updatesMainMenu"><a href="chain.html"><i class="fa fa-refresh"></i> <span>Updates</span></a>
            <ul class="children">
                <li id="sermonMenu"><a href="<?php echo base_url('sermon'); ?>">Sermons</a></li>
                <li id="zamzamUpdatesMenu"><a href="<?php echo base_url('updates'); ?>">Zamzam Updates</a></li>
                <li id="zamzamEventsMenu"><a href="#">Zamzam Events</a></li>

            </ul>
        </li>
        <?php endif; ?>
        <?php if (in_array('updateDonations', $user_permission) || in_array('viewDonations', $user_permission)) : ?>

        <li id="paymentMainMenu"><a href="<?php echo base_url('project/paymenthistory'); ?>"><i class="fa fa-money"></i> <span>Donations</span></a>
        </li>
        <?php endif; ?>

    </ul>
</div><!-- leftpanel -->