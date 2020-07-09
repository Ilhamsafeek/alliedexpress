<div class="container padding-bottom-3x mb-1">
    <div class="card mb-3">
        <img src="<?php echo base_url('assets/src/img/brand.png'); ?>" width="280px" class="header-brand-img" alt="">

        <div class="row p-4 text-center text-white text-lg bg-dark rounded-top">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <input id="way_bill_search" type="text" class="form-control" placeholder="Way Bill Number" onkeyup="onCustomerChanged(this)">
            </div>
        </div>
        <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Sender:</span> <strong><span id="sender" class="text-medium"> -</span></strong></div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Receiver:</span> <strong><span id="receiver" class="text-medium"> -</span></strong></div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Destination:</span><strong><span id="destination" class="text-medium"> -</span></strong></div>

        </div>
        <hr>

        <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span> <strong><span id="status" class="text-medium"> -</span> <span id="status_date" class="text-medium"> -</span></strong></div>

        </div>

        <div class="card-body">
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                <div id="collected" class="step">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="ik ik-package"></i></div>
                    </div>
                    <h4 class="step-title">Package Collected</h4>
                    <h4 id="collected_date" class="step-title"></h4>
                </div>

                <div id="received" class="step">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="ik ik-home"></i></div>
                    </div>
                    <h4 class="step-title">Received to destination</h4>
                </div>
                <div id="dispatched" class="step">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="ik ik-truck"></i></div>
                    </div>
                    <h4 class="step-title">Dispatched</h4>
                </div>
                <div id="delivered" class="step">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="ik ik-check-circle"></i></div>
                    </div>
                    <h4 class="step-title">Package Delivered</h4>
                </div>
            </div>
        </div>
    </div>

</div>



<script type="text/javascript">
    $(document).ready(function() {


    });

    function onCustomerChanged(way_bill) {


        document.getElementById('status').innerHTML = '-';
        document.getElementById('sender').innerHTML = '-';
        document.getElementById('receiver').innerHTML = '-';
        document.getElementById('destination').innerHTML = '-';
        document.getElementById('collected_date').innerHTML = '';
        document.getElementById('status_date').innerHTML = '';


        document.getElementById("collected").classList.remove("completed");
        document.getElementById("received").classList.remove("completed");
        document.getElementById("dispatched").classList.remove("completed");
        document.getElementById("delivered").classList.remove("completed");
        document.getElementById("status").classList.remove("badge");



        var package_data = <?php echo json_encode($package_data); ?>;


        var package = package_data.filter(function(package) {
            return package.way_bill_no == way_bill.value;
        });
        document.getElementById('status').innerHTML = package[0]['delivery_status'];
        if (package[0]['delivery_status'] == 're scheduled') {
            document.getElementById('status_date').innerHTML = "Date: " + package[0]['rescheduled_date'];

        }
        document.getElementById('sender').innerHTML = package[0]['company'];
        document.getElementById('receiver').innerHTML = package[0]['receiver_name'];
        document.getElementById('destination').innerHTML = package[0]['city'] + ' / ' + package[0]['zone'];

        document.getElementById('collected_date').innerHTML = package[0]['date'];

        if (package[0]['delivery_status'] == 'collected') {
            $("#collected").addClass('completed');

            $("#status").addClass('badge badge-primary');
        } else if (package[0]['delivery_status'] == 'received to destination') {
            $("#collected").addClass('completed');
            $("#received").addClass('completed');

            $("#status").addClass('badge badge-success');
        } else if (package[0]['delivery_status'] == 'out for delivery') {
            $("#collected").addClass('completed');
            $("#received").addClass('completed');
            $("#dispatched").addClass('completed');

            $("#status").addClass('badge badge-secondary');
        } else if (package[0]['delivery_status'] == 'delivered') {
            $("#collected").addClass('completed');
            $("#received").addClass('completed');
            $("#dispatched").addClass('completed');
            $("#delivered").addClass('completed');

            $("#status").addClass('badge badge-success');
        } else if (package[0]['delivery_status'] == 'canceled') {
            $("#collected").addClass('completed');

            $("#status").addClass('badge badge-danger');
        } else if (package[0]['delivery_status'] == 're scheduled') {
            $("#collected").addClass('completed');
            $("#received").addClass('completed');

            $("#status").addClass('badge badge-warning');
        } else if (package[0]['delivery_status'] == 'returned to customer') {
            $("#collected").addClass('completed');
            $("#received").addClass('completed');

            $("#status").addClass('badge badge-info');
        } else if (package[0]['delivery_status'] == 'returned') {
            $("#collected").addClass('completed');
            $("#received").addClass('completed');
            $("#dispatched").addClass('completed');

            $("#status").addClass('badge badge-danger');

        } else if (package[0]['delivery_status'] == 'returned to head office') {
            $("#collected").addClass('completed');
            $("#received").addClass('completed');

            $("#status").addClass('badge badge-danger');


        }


    }
</script>