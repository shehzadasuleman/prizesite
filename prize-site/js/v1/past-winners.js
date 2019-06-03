jQuery(document).ready(function($) {

    window.onload = function() {
        $( "<span class='past-winners-label'>Enter your mobile number above</span>" ).insertBefore( "#winners-data" );
    }
    $(document).ready(function() {
        $('#winners-data').DataTable( {
            "ordering": false,
            "columnDefs": [
                {
                    "targets": [ 2 ],
                    "visible": false,
                    "searchable": true
                }
            ],
            "language": {
                "zeroRecords": error_message,
                "search": "Search Winning Mobile Numbers:"
            },
            "lengthChange": false
        });
    } );

});