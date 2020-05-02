jQuery(document).ready(function($) {

    $('.main-navigation li').on('click', function(e){
        var link_text = $(this).find('a').slice(0,1).text();
        if ( link_text == "About Us" || link_text == "Profile" ) {
            $(this).find('ul').toggle( "fade" );
            //$( ".sub-menu" ).toggle( "fade" );
        }
    });

    $('#urdu-tab .panel-collapse-urdu').on('show.bs.collapse', function () {
        $(this).siblings('.panel-heading-urdu').addClass('active');
    });
    
    $('#urdu-tab .panel-collapse-urdu').on('hide.bs.collapse', function () {
        $(this).siblings('.panel-heading-urdu').removeClass('active');
    });

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

    if ( window.location.pathname == "/wordpress/v1/past-winners" ) {

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
        });

    }

    if ( window.location.pathname == "/wordpress/v1/partners" ) {

        $('#partners-register-btn').on('click', function(e) {
            e.preventDefault();

            $('#popup-registration-modal').modal('show');
        });
    }

});