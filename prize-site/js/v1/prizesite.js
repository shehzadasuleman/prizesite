jQuery(document).ready(function($) {

    /*alert(error_message);
    if(typeof error_message == 'undefined'){
        var error_message = ""
     }*/

    $(window).on("resize", function (e) {
        checkScreenSize();
    });

    checkScreenSize();
    
    function checkScreenSize(){
        var newWindowWidth = $(window).width();
        var newWindowHeight = $(window).height();
        if (newWindowWidth < 768) {
            $('#past-winners-sidebar-content-fb-lg').hide();
            $('#past-winners-sidebar-content-fb-sm').show();
            $('#past-winners-register-number-lg').hide();
            $('#past-winners-register-content-lg').hide();
            $('#past-winners-register-number-sm').show();
            $('#past-winners-register-content-sm').show();
        } else {
            $('#past-winners-sidebar-content-fb-lg').show();
            $('#past-winners-sidebar-content-fb-sm').hide();
            $('#past-winners-register-number-sm').hide();
            $('#past-winners-register-content-sm').hide();
            $('#past-winners-register-number-lg').show();
            $('#past-winners-register-content-lg').show();
        }
    }

    window.onload = function() {
        $( "<span class='past-winners-label'>Enter your mobile number above</span>" ).insertBefore( "#winners-data" );
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
            },
            "lengthChange": false
        });
    } );

});