jQuery(document).ready(function($) {

    $(window).on("resize", function (e) {
        checkScreenSize();
    });

    checkScreenSize();
    
    function checkScreenSize(){
        var newWindowWidth = $(window).width();
        var newWindowHeight = $(window).height();
        if (newWindowWidth <= 768) {
            $('#past-winners-sidebar-content-fb-lg').hide();
            $('#past-winners-sidebar-content-fb-sm').show();
        } else {
            $('#past-winners-sidebar-content-fb-lg').show();
            $('#past-winners-sidebar-content-fb-sm').hide();
        }
    }

    $(document).ready(function() {
        $('#winners-data').DataTable( {
            "columnDefs": [
                {
                    "targets": [ 2 ],
                    "visible": false,
                    "searchable": true
                }
            ],
            "language": {
                "zeroRecords": error_message
            }
        });
    } );

});