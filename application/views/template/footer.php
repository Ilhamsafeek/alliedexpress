       <footer class="footer">
           <div class="w-100 clearfix">
               <span class="text-center text-sm-left d-md-inline-block">AlliedExpress@2020</span>
               <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Developed by <a href="https://www.hashnative.com/" class="text-dark" target="_blank">Hash Native</a></span>
           </div>
       </footer>

       </div>

       </div>



       <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
           <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                   <div class="quick-search">
                       <div class="container">
                           <div class="row">
                               <div class="col-md-4 ml-auto mr-auto">
                                   <div class="input-wrap">
                                       <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                       <i class="ik ik-search"></i>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="modal-body d-flex align-items-center">
                       <div class="container">
                           <div class="apps-wrap">
                               <?php if ($this->session->userdata()['type'] == 'admin') : ?>
                                   <div class="app-item">
                                       <a href="<?php echo base_url('/'); ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                   </div>
                               <?php endif; ?>
                               <?php if ($this->session->userdata()['type'] == 'admin') : ?>
                                   <div class="app-item">
                                       <a href="<?php echo base_url('customers'); ?>"><i class="ik ik-users"></i><span>Customers</span></a>
                                   </div>
                                   <div class="app-item">
                                       <a href="<?php echo base_url('agents'); ?>"><i class="ik ik-command"></i><span>Agents</span></a>
                                   </div>
                                   <div class="app-item">
                                       <a href="<?php echo base_url('riders'); ?>"><i class="ik ik-truck"></i><span>Riders</span></a>
                                   </div>
                                   <div class="app-item">
                                       <a href="<?php echo base_url('areas/zone'); ?>"><i class="ik ik-triangle"></i><span>Zone</span></a>
                                   </div>
                                   <div class="app-item">
                                       <a href="<?php echo base_url('areas/city'); ?>"><i class="ik ik-git-merge"></i><span>City</span></a>
                                   </div>
                               <?php endif; ?>

                               <div class="app-item">
                                   <a href="<?php echo base_url('packages'); ?>"><i class="ik ik-package"></i><span>Packages</span></a>
                               </div>
                               <?php if ($this->session->userdata()['type'] == 'admin') : ?>
                                   <div class="app-item">
                                       <a href="<?php echo base_url('expenses'); ?>"><i class="ik ik-minus-circle"></i><span>Other Expenses</span></a>
                                   </div>
                               <?php endif; ?>
                               <?php if ($this->session->userdata()['type'] == 'admin' || $this->session->userdata()['type'] == 'customer') : ?>

                                   <div class="app-item">
                                       <a href="<?php echo base_url('payment/customer'); ?>"><i class="ik ik-check-circle"></i><span>Customer Payment</span></a>
                                   </div>
                               <?php endif; ?>
                               <?php if ($this->session->userdata()['type'] != 'customer' && $this->session->userdata()['type'] != 'rider') : ?>

                                   <div class="app-item">
                                       <a href="<?php echo base_url('payment/agenttooffice'); ?>"><i class="ik ik-navigation-2"></i><span>Agent to head office</span></a>
                                   </div>
                               <?php endif; ?>

                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>


       <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

       <script type="text/javascript">
           (function(b, o, i, l, e, r) {
               b.GoogleAnalyticsObject = l;
               b[l] || (b[l] =
                   function() {
                       (b[l].q = b[l].q || []).push(arguments)
                   });
               b[l].l = +new Date;
               e = o.createElement(i);
               r = o.getElementsByTagName(i)[0];
               e.src = 'https://www.google-analytics.com/analytics.js';
               r.parentNode.insertBefore(e, r)
           }(window, document, 'script', 'ga'));
           ga('create', 'UA-XXXXX-X', 'auto');
           ga('send', 'pageview');
       </script>
       </body>

       </html>