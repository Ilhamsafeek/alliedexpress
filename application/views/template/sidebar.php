<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.html">
            <div class="logo-img">
                <img src="<?php echo base_url('assets/favicon.png'); ?>" width="50px" class="header-brand-img" alt="">
            </div>
            <!-- <span class="text">Allied</span> -->
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Navigation</div>
                <div id="dashboardMainMenu" class="nav-item">
                    <a href="<?php echo base_url('/'); ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                </div>

                <div class="nav-lavel">Master Files</div>
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
                <div class="nav-lavel">---</div>
                <div id="packagesMainMenu" class="nav-item">
                    <a href="<?php echo base_url('packages'); ?>"><i class="ik ik-package"></i><span>Packages</span></a>

                </div>
                <div id="otherExpensesMainMenu" class="nav-item">
                    <a href="<?php echo base_url('expenses'); ?>"><i class="ik ik-minus-circle"></i><span>Other Expenses</span></a>

                </div>
                <div class="nav-lavel">Payment</div>
                <div id="customerPaymentMainMenu" class="nav-item">
                    <a href="<?php echo base_url('payment/customer'); ?>"><i class="ik ik-check-circle"></i><span>Customer Payment</span></a>
                </div>
                <div id="agentToOfficeMainMenu" class="nav-item">
                    <a href="<?php echo base_url('payment/agenttooffice'); ?>"><i class="ik ik-navigation-2"></i><span>Agent to head office</span></a>
                </div>

            </nav>
        </div>
    </div>
</div>