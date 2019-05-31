jQuery(document).ready(function($) {
    
    if ( window.location == "http://localhost/wordpress/v1/faqs" ) {
        if ( window.location.hash == "#urdu-tab" ) {
            $("#english-tab-link").removeClass("active");
            $("#urdu-tab-link").addClass("active");
            $("#english-tab").removeClass("active");
            $("#english-tab").removeClass("show");
            $("#urdu-tab").addClass("active");
            $("#urdu-tab").addClass("show");
        }
    
        for ( index = 1; index <= english_questions_count; index++ ) {
            var heading_hash = "#heading";
            var heading_hash = heading_hash.concat(index,"English");
            var content_hash = "#content";
            var content_hash = content_hash.concat(index,"English");
            if ( window.location.hash == heading_hash ) {
                $("#heading1English").removeClass("active");
                $("#content1English").removeClass("show");
                $(heading_hash).addClass("active");
                $(content_hash).addClass("show");
            }
        }
    
        for ( index = 1; index <= urdu_questions_count; index++ ) {
            var heading_hash = "#heading";
            var heading_hash = heading_hash.concat(index,"Urdu");
            var content_hash = "#content";
            var content_hash = content_hash.concat(index,"Urdu");
            if ( window.location.hash == heading_hash ) {
                $("#english-tab-link").removeClass("active");
                $("#urdu-tab-link").addClass("active");
                $("#english-tab").removeClass("active");
                $("#english-tab").removeClass("show");
                $("#urdu-tab").addClass("active");
                $("#urdu-tab").addClass("show");
                $("#heading1Urdu").removeClass("active");
                $("#content1Urdu").removeClass("show");
                $(heading_hash).addClass("active");
                $(content_hash).addClass("show");
            }
        }
    }

    $('#english-tab .panel-collapse-english').on('show.bs.collapse', function () {
        $(this).siblings('.panel-heading-english').addClass('active');
    });
    
    $('#english-tab .panel-collapse-english').on('hide.bs.collapse', function () {
        $(this).siblings('.panel-heading-english').removeClass('active');
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