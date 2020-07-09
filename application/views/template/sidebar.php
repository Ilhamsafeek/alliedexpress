<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="<?php echo base_url('/'); ?>">
            <div class="logo-img">
                <img src="<?php echo base_url('assets/src/img/logo-white.png'); ?>" width="200px" class="header-brand-img" alt="">
            </div>
            <!-- <span class="text">Allied</span> -->
        </a>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <?php if ($this->session->userdata()['type'] == 'admin') : ?>
                    <div class="nav-lavel">Navigation</div>

                    <div id="dashboardMainMenu" class="nav-item">
                        <a href="<?php echo base_url('/'); ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->userdata()['type'] == 'admin') : ?>

                    <div class="nav-lavel">Master Files</div>
                    <div id="staffMainMenu" class="nav-item">
                        <a href="<?php echo base_url('staff'); ?>"><i class="ik ik-user"></i><span>Staff</span></a>

                    </div>
                    <div id="customersMainMenu" class="nav-item">
                        <a href="<?php echo base_url('customers'); ?>"><i class="ik ik-users"></i><span>Customers</span></a>

                    </div>
                    <div id="agentsMainMenu" class="nav-item">
                        <a href="<?php echo base_url('agents'); ?>"><i class="ik ik-command"></i><span>Agents</span></a>

                    </div>
                    <div id="ridersMainMenu" class="nav-item">
                        <a href="<?php echo base_url('riders'); ?>"><i class="ik ik-truck"></i><span>Riders</span></a>

                    </div>
                    <div id="zoneMainMenu" class="nav-item">
                        <a href="<?php echo base_url('areas/zone'); ?>"><i class="ik ik-triangle"></i><span>Zone</span></a>

                    </div>
                    <div id="cityMainMenu" class="nav-item">
                        <a href="<?php echo base_url('areas/city'); ?>"><i class="ik ik-git-merge"></i><span>City</span></a>

                    </div>
                <?php endif; ?>
                <div class="nav-lavel">Delivery</div>
                <div id="packagesMainMenu" class="nav-item">
                    <a href="<?php echo base_url('packages'); ?>"><i class="ik ik-package"></i><span>Packages</span></a>

                </div>
                <div id="packagesMainMenu" class="nav-item">
                    <a href="<?php echo base_url('track'); ?>" target="_blank"><i class="ik ik-git-commit"></i><span>Track</span></a>

                </div>
                <?php if ($this->session->userdata()['type'] == 'admin') : ?>
                    <div id="otherExpensesMainMenu" class="nav-item">
                        <a href="<?php echo base_url('expenses'); ?>"><i class="ik ik-minus-circle"></i><span>Other Expenses</span></a>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->userdata()['type'] != 'rider' && $this->session->userdata()['type'] != 'staff') : ?>
                    <div class="nav-lavel">Payment</div>
                <?php endif; ?>
                <?php if ($this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'customer') : ?>
                    <div id="customerPaymentMainMenu" class="nav-item">
                        <a href="<?php echo base_url('payment/customer'); ?>"><i class="ik ik-check-circle"></i><span>
                                <?php if ($this->session->userdata()['type'] == 'customer') { ?>
                                    My Payments
                                <?php } else { ?>
                                    Customer Payment
                                <?php  } ?>
                            </span></a>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->userdata()['type'] != 'customer' && $this->session->userdata()['type'] != 'rider' && $this->session->userdata()['type'] != 'staff') : ?>

                    <div id="agentToOfficeMainMenu" class="nav-item">
                        <a href="<?php echo base_url('payment/agenttooffice'); ?>"><i class="ik ik-navigation-2"></i><span>Agent Settlements</span></a>
                    </div>
                <?php endif; ?>

            </nav>
        </div>
    </div>
</div>