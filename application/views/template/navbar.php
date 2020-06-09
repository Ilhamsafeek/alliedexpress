<body>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-analytics.js"></script>



    <header>
        <div class="headerwrapper">
            <div class="header-left">
                <a href="<?php echo base_url(); ?>" class="logo">
                    <img height="30px" src="<?php echo base_url('assets/images/logo.png'); ?>" alt=""></a>
                <div class="pull-right">
                    <a href="chain.html" class="menu-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div><!-- header-left -->

            <div class="header-right">

                <div class="pull-right">
                    <!-- 
                <form class="form form-search" action="search-results.html">
                    <input type="search" class="form-control" placeholder="Search"></form> -->

                    <div class="btn-group btn-group-list btn-group-notification">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge">5</span>
                        </button>
                        <div class="dropdown-menu pull-right">
                            <a href="chain.html" class="link-right"><i class="fa fa-search"></i></a>
                            <h5>Notification</h5>
                            <ul class="media-list dropdown-list">
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos-user1.png" alt="">
                                    <div class="media-body">
                                        <strong>Nusja Nawancali</strong> likes a photo of you
                                        <small class="date"><i class="fa fa-thumbs-up"></i> 15 minutes ago</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos-user2.png" alt="">
                                    <div class="media-body">
                                        <strong>Weno Carasbong</strong> shared a photo of you in your <strong>Mobile
                                            Uploads</strong> album.
                                        <small class="date"><i class="fa fa-calendar"></i> July 04, 2014</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos-user3.png" alt="">
                                    <div class="media-body">
                                        <strong>Venro Leonga</strong> likes a photo of you
                                        <small class="date"><i class="fa fa-thumbs-up"></i> July 03, 2014</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos-user4.png" alt="">
                                    <div class="media-body">
                                        <strong>Nanterey Reslaba</strong> shared a photo of you in your <strong>Mobile
                                            Uploads</strong> album.
                                        <small class="date"><i class="fa fa-calendar"></i> July 03, 2014</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos-user1.png" alt="">
                                    <div class="media-body">
                                        <strong>Nusja Nawancali</strong> shared a photo of you in your <strong>Mobile
                                            Uploads</strong> album.
                                        <small class="date"><i class="fa fa-calendar"></i> July 02, 2014</small>
                                    </div>
                                </li>
                            </ul>
                            <div class="dropdown-footer text-center">
                                <a href="chain.html" class="link">See All Notifications</a>
                            </div>
                        </div>
                        <!-- dropdown-menu -->
                    </div><!-- btn-group -->

                    <div class="btn-group btn-group-list btn-group-messages">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge">2</span>
                        </button>
                        <div class="dropdown-menu pull-right">
                            <a href="chain.html" class="link-right"><i class="fa fa-plus"></i></a>
                            <h5>New Messages</h5>
                            <ul class="media-list dropdown-list">
                                <!-- <li class="media">
                                    <span class="badge badge-success">New</span>
                                    <img class="img-circle pull-left noti-thumb" src="images/photos-user1.png" alt="">
                                    <div class="media-body">
                                        <strong>Nusja Nawancali</strong>
                                        <p>Hi! How are you?...</p>
                                        <small class="date"><i class="fa fa-clock-o"></i> 15 minutes ago</small>
                                    </div>
                                </li> -->

                                <?php foreach ($chat_data as $key => $value) : ?>
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="images/photos-user1.png" alt="">
                                        <div class="media-body">
                                            <strong><?php echo $value['topic']; ?></strong>
                                            <p><?php echo $value['message']; ?></p>
                                            <small class="date"><i class="fa fa-clock-o"></i> <?php echo date('M d, Y H:i', $value['time_stamp']); ?></small>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="dropdown-footer text-center">
                                <a target="_blank" href="<?php echo base_url('message'); ?>" class="link">See All Messages</a>
                            </div>
                        </div>
                        <!-- dropdown-menu -->
                    </div><!-- btn-group -->

                    <div class="btn-group btn-group-option">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                            <li><a href="<?php echo base_url('company') ?>"><i class="glyphicon glyphicon-cog"></i> General Settings</a></li>
                            <li class="divider">
                            </li>
                            <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                        </ul>
                    </div><!-- btn-group -->

                </div><!-- pull-right -->

            </div><!-- header-right -->

        </div><!-- headerwrapper -->
    </header>



    <section>

        <div class="mainwrapper">