<script>
    jQuery(document).ready(function() {

        var shTable = jQuery('#shTable').DataTable({
            "pageLength": 25,
            "fnDrawCallback": function(oSettings) {
                jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
            },
            responsive: true,

        });
        <?php
        $searched = '';
        if (isset($search_item)) {
            $searched = $search_item;
        } ?>

        shTable.search('<?php echo $searched; ?>').draw();

        // DataTables Length to Select2
        jQuery('div.dataTables_length select').removeClass('form-control input-sm');
        jQuery('div.dataTables_length select').css({
            width: '60px'
        });
        jQuery('div.dataTables_length select').select2({
            minimumResultsForSearch: -1
        });

    });

    function format(d) {
        // `d` is the original data object for the row
        return '<table class="table table-bordered nomargin">' +
            '<tr>' +
            '<td>Full name:' +
            '<td>' + d.name + '' +
            '' +
            '<tr>' +
            '<td>Extension number:' +
            '<td>' + d.extn + '' +
            '' +
            '<tr>' +
            '<td>Extra info:' +
            '<td>And any further details here (images etc)...' +
            '' +
            '';
    }
</script>

</body>

</html>