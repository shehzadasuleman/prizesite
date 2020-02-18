jQuery(document).ready(function($) {

    var newWindowWidth = 0;

    var newWindowWidth = window.innerWidth;
    document.cookie = "windowWidth="+newWindowWidth;

    if ( window.location.pathname == "/wordpress/v1/contests" || window.location.pathname == "/wordpress/v1/contests#previous-content-block" ) {

        $(window).resize(function() {
            var newWindowWidth = window.innerWidth;
            document.cookie = "windowWidth="+newWindowWidth;
        });

        console.log("screen_size : " + screen_size);
        if( screen_size == 0 ) {
            location.reload(false);
        }
        var total_pages = Math.ceil (previous_contests_count / contests_per_page);
        var index;
        for (index = 2; index <= total_pages; index++) {
            $("#previous-cards-page-"+index).css({ "display": "none" });
            $("#previous-cards-page-"+index).css({ "display": "none" });
        }

        $('.pagination').on('click', 'li', function(){
            var active_link_value = $(this).find('.page-link').text();
            var previous_active_list_element = $(".pagination").find('.active');
            var previous_active_value = previous_active_list_element.find('.page-link').text();

            if ( active_link_value == "Previous" || active_link_value == "Next" ) {
                var new_prev_link_value = 0;
                var new_next_link_value = 0;
                if ( active_link_value == "Previous" ) {
                    var new_prev_link_value = parseInt(previous_active_value) - 1;
                    var previous_active_list_element_index = previous_active_list_element.index();
                    if ( new_prev_link_value > 0 ) {
                        $("#previous-cards-page-"+previous_active_value).css({ "display": "none" });
                        $(previous_active_list_element).removeClass("active");
                        var new_prev_list_element = $(".pagination li:nth-child(" + previous_active_list_element_index + ")");
                        $("#previous-cards-page-"+new_prev_link_value).css({ "display": "flex" });
                        $(new_prev_list_element).addClass("active");
                        if ( new_prev_link_value == 1 ) {
                            $( ".pagination li" ).first().addClass( "disabled" );
                        } else {
                            $( ".pagination li" ).first().removeClass( "disabled" );
                        }
                    }
                }
                if ( active_link_value == "Next" ) {
                    var new_next_link_value = parseInt(previous_active_value) + 1;
                    var next_active_list_element_index = previous_active_list_element.index();
                    var new_next_link_element_index = next_active_list_element_index + 2;
                    if ( new_next_link_value <= total_pages ) {
                        $("#previous-cards-page-"+previous_active_value).css({ "display": "none" });
                        $(previous_active_list_element).removeClass("active");
                        var new_next_list_element = $(".pagination li:nth-child(" + new_next_link_element_index + ")");
                        $("#previous-cards-page-"+new_next_link_value).css({ "display": "flex" });
                        $(new_next_list_element).addClass("active");
                        if ( new_next_link_value == total_pages ) {
                            $( ".pagination li" ).last().addClass( "disabled" );
                        } else {
                            $( ".pagination li" ).last().removeClass( "disabled" );
                        }
                    }
                }
            } else {
                $("#previous-cards-page-"+previous_active_value).css({ "display": "none" });
                $(previous_active_list_element).removeClass("active");
                $("#previous-cards-page-"+active_link_value).css({ "display": "flex" });
                $(this).addClass("active");
                if ( active_link_value == 1 ) {
                    $( ".pagination li" ).first().addClass( "disabled" );
                } else {
                    $( ".pagination li" ).first().removeClass( "disabled" );
                }
                if ( active_link_value == total_pages ) {
                    $( ".pagination li" ).last().addClass( "disabled" );
                } else {
                    $( ".pagination li" ).last().removeClass( "disabled" );
                }
            }
        });

        $('.page-item').on('click', function() {
            var current_text = $(this).children('a').text();
            var current_value = parseInt(current_text);
            if( current_text != "Previous" && current_text != "Next" ) {
                var previous_page = current_value - 1;
                var next_page = current_value + 1;
                var page_index = 1;
                while ( page_index <= total_pages ) {
                    $("#page-number-"+page_index).css({ "display": "block" });
                    if ( page_index != current_value && page_index != previous_page && page_index != next_page ) {
                        $("#page-number-"+page_index).css({ "display": "none" });
                    }
                    page_index = page_index + 1;
                }
            } else if( current_text == "Previous" ) {
                var previous_active_list_element = $(".pagination").find('.active');
                var previous_active_value = previous_active_list_element.find('.page-link').text();
                if ( previous_active_value != 1 ) {
                    $("#page-number-" + (previous_active_value - 2)).css({ "display": "block" });
                    if ( previous_active_value != 2 ) {
                        $("#page-number-" + (parseInt(previous_active_value) + 1)).css({ "display": "none" });
                    }
                }
            } else if( current_text == "Next" ) {
                var next_active_list_element = $(".pagination").find('.active');
                var next_active_value = next_active_list_element.find('.page-link').text();
                console.log("next_active_value : " + next_active_value);
                console.log("next_active_value + 2 : " + (parseInt(next_active_value) + 2));
                console.log("next_active_value : - 1 " + (next_active_value - 1));
                if ( next_active_value != total_pages ) {
                    $("#page-number-" + (parseInt(next_active_value) + 2)).css({ "display": "block" });
                    if ( next_active_value != 1 ) {
                        $("#page-number-" + (parseInt(next_active_value) - 1)).css({ "display": "none" });
                    }

                }
            }
        });

        setTimeout(minimizePages, 50);

        function minimizePages(){
            var page_index = 1;
            while ( page_index <= total_pages ) {
                $("#page-number-"+page_index).css({ "display": "block" });
                if ( page_index != 1 && page_index != 2 && page_index != 3 ) {
                    $("#page-number-"+page_index).css({ "display": "none" });
                }
                page_index = page_index + 1;
            }
        }
    }

    $("#share-contest-close").click(function(){
        location.reload(false);
    });

    $('#prizesite-contest-share-form').on('submit', function(e) {
        e.preventDefault();

        $('#contest-url').select();
        document.execCommand("copy");

        var form = $(this),
        ajaxurl = form.data('url');

        $.ajax({

            url: ajaxurl,
            type: 'post',
            data: {

                shareCount: share_count,
                constestID: contest_id,
                action: 'prizesite_update_share_count_data'

            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                $('#share-contest-close').click();
                var count_value = parseInt(share_count);
                var label_text = (count_value + 1) + " Share";
                if ( count_value > 1 ) {
                    label_text = label_text + "s"
                }
                if (response > 0) {
                    $("#share-counter").text(label_text);
                }
            }

        });
    });

    if ( window.location.pathname == "/wordpress/v1/live-contest" ) {

        // Set the date we're counting down to
        var countDownDate = new Date(end_date).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();
            
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
            
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        document.getElementById("countdown-days").innerHTML = days;

        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        document.getElementById("countdown-hours").innerHTML = hours;

        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        document.getElementById("countdown-mins").innerHTML = minutes;

        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("countdown-secs").innerHTML = seconds;

        }, 1000);

        $("#success-modal-close-btn").click(function(){
            location.reload(false);
        });

        $('#prizesite-contest-comment-form').on('submit', function(e) {
            e.preventDefault();
    
            $("#comment-name-error-msg").css({ "display": "none" });
            $("#comment-name-invalid-msg").css({ "display": "none" });
            $("#comment-no-error-msg").css({ "display": "none" });
            $("#comment-number-invalid-msg").css({ "display": "none" });
            $("#comment-text-error-msg").css({ "display": "none" });
            $("#comment-name").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
            $("#comment-no").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
            $("#comment-text").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
    
           var form = $(this),
                name = form.find('#comment-name').val(),
                phNumber = form.find('#comment-no').val(),
                ctext = form.find('#comment-text').val(),
                ajaxurl = form.data('url');
    
            var isError = 0;
            
            if (phNumber === '') {
                $("#comment-no").css({ "border-color": "#da6666" });
                $("#comment-no-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                $(".label").css({ "display": "none" });
                isError = 1;
            }
    
            if (name === '') {
                $("#comment-name").css({ "border-color": "#da6666" });
                $("#comment-name-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                $(".label").css({ "display": "none" });
                isError = 1;
            }
    
            if (ctext === '') {
                $("#comment-text").css({ "border-color": "#da6666" });
                $("#comment-text-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                $(".label").css({ "display": "none" });
                isError = 1;
            }
    
            if ( isError == 1 ) { return ; }
    
            function IsValidPhone(phNumber) {
                var regex = /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/;
                if(!regex.test(phNumber)) {
                  return 1;
                }else{
                  return 0;
                }
            }

            if(IsValidPhone(phNumber)==1){
                $("#comment-no").css({ "border-color": "#da6666" });
                $("#comment-number-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                $(".label").css({ "display": "none" });
                return ;
            }
    
            $.ajax({
    
                url: ajaxurl,
                type: 'post',
                data: {
    
                    name: name,
                    phNumber: phNumber,
                    comment: ctext,
                    constestID: contest_id,
                    action: 'prizesite_save_new_comment_data'
    
                },
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    $('#comment-contest-close').click();
                    if( response == -100 ) {
                        $('#duplicate-comment-modal').modal('show');
                    } else if (response <= 0) {
                        $('#failure-comment-modal').modal('show');
                    } else if (response > 0) {
                        $('#success-comment-modal').modal('show');
                    }
                    $('#comment-no').val('');
                    $('#comment-name').val('');
                    $('#comment-text').val('');
                }
    
            });
        });
    }

});