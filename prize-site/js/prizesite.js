jQuery(document).ready(function($) {

    var origin = document.location.origin;

    var urlPath = window.location;
    var urlPathString = String(urlPath);
    if ( urlPathString.indexOf('utm_source') != -1 || urlPathString.indexOf('utm_medium') != -1 || urlPathString.indexOf('utm_campaign') != -1 ) {
        var urlArray = String(urlPath).split('?');
        if( urlArray.length > 1 ) {
            var parameterArray = urlArray[1].split('&');
            var sourceArray = parameterArray[0].split('=');
            var mediumArray = parameterArray[1].split('=');
            var campaignArray = parameterArray[2].split('=');

            document.cookie = "UTM_SOURCE="+sourceArray[1];
            document.cookie = "UTM_MEDIUM="+mediumArray[1];
            document.cookie = "UTM_CAMPAIGN="+campaignArray[1];
        }
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    //var source = getCookie("UTM_SOURCE");
    //alert(source);

    /* Candidates form Submission */
    $('#prizesiteCandidatesForm').on('submit', function(e) {
        e.preventDefault();
        var form = $(this),
            phNumber = form.find('#phNumber').val(),
            ajaxurl = form.data('url');

        if (phNumber === '' && $('#customCheck1').is(":checked")) {
            alert('Required inputs are empty');
            return;
        }

        $.ajax({

            url: ajaxurl,
            type: 'post',
            data: {

                phNumber: phNumber,
                action: 'prizesite_save_new_candidate_data'

            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                if (response == -100) {
                    $.redirect('http://localhost/wordpress/v1/failure-confirmation-page', {RegistrationPerformed: "True"}, "POST");
                } else if (response == 0) {
                    $("#danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#danger-alert").slideUp(500);
                    });
                } else {
                    $.redirect('http://localhost/wordpress/v1/success-confirmation-page/', {RegistrationPerformed: "True"}, "POST");
                }
                $('#phNumber').val('');
                $("#customCheck1").prop("checked", false);
            }

        });
    });

    /* Winner Check form Submission */
    $('#prizesiteWinnerCheckForm').on('submit', function(e) {
        e.preventDefault();
        var form = $(this),
            phNumber = form.find('#check-phNumber').val(),
            ajaxurl = form.data('url');

        if (phNumber === '') {
            alert('Required inputs are empty');
            return;
        }

        $.ajax({

            url: ajaxurl,
            type: 'post',
            data: {

                phNumber: phNumber,
                action: 'prizesite_check_candidate_data'

            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                if (response == -100) {
                    window.location = 'https://muftpaise.com/not-registered/';
                } else if (response == -200) {
                    window.location = 'https://muftpaise.com/did-not-won/';
                } else if (response == -300) {
                    window.location = 'https://muftpaise.com/won/';
                }
                $('#check-phNumber').val('');
            }

        });
    });

    $('#draw-btn-menu').on('click', function(e) {
        window.location = origin + '/wordpress/v1';
    });

    $('#prizesite-lucky-form').on('submit', function(e) {
        e.preventDefault();

        $("#error-msg").css({ "display": "none" });
        $("#email-error-msg").css({ "display": "none" });
        $("#email-invalid-msg").css({ "display": "none" });
        $("#number-invalid-msg").css({ "display": "none" });
        $("#error-chk-box-msg").css({ "display": "none" });
        $("#no").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#email").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#check-label-box").addClass("check-label");
        $("#check-label-box").removeClass("error-occured");
        
        var source = getCookie("UTM_SOURCE");
        var medium = getCookie("UTM_MEDIUM");
        var campaign = getCookie("UTM_CAMPAIGN");

        var form = $(this),
            phNumber = form.find('#no').val(),
            emailAddress = form.find('#email').val(),
            ajaxurl = form.data('url');

        var isError = 0;

        function IsValidPhone(phNumber) {
            var regex = /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/;
            if(!regex.test(phNumber)) {
              return 1;
            }else{
              return 0;
            }
        }

        if (phNumber === '') {
            $("#no").css({ "border-color": "#da6666" });
            $("#error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            isError = 1;
        } else if(IsValidPhone(phNumber)==1){
            $("#no").css({ "border-color": "#da6666" });
            $("#number-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            isError = 1;
        }

        function IsValidEmail(emailAddress) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(emailAddress)) {
              return 1;
            }else{
              return 0;
            }
        }

        if (emailAddress === '') {
            $("#email").css({ "border-color": "#da6666" });
            $("#email-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            isError = 1;
        } else if(IsValidEmail(emailAddress)==1){
            $("#email").css({ "border-color": "#da6666" });
            $("#email-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            isError = 1;
        }

        if ($('#agree').is(":not(:checked)")) {
            $("#check-label-box").removeClass("check-label");
            $("#check-label-box").addClass("error-occured");
            $("#error-chk-box-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            isError = 1;
        }

        if ( isError == 1 ) { return ; }

        if ( window.location.pathname == "/wordpress/v1/faqs" || window.location.pathname == "/wordpress/v1/contact-us" || window.location.pathname == "/wordpress/v1/past-winners" || window.location.pathname == "/wordpress/v1/whats-the-catch" || window.location.pathname == "/wordpress/v1/winners" || window.location.pathname == "/wordpress/v1/ads" ) {
            $('#popup-progress-bar').modal('show');
            $("#registration-modal .progress-bar").css({ "width": "75%" });
            $("#popup-progress-content").text("Progress ( 75% )");
        } else {
            $('#progress-modal').modal('show');
            $("#progress-modal .progress-bar").css({ "width": "75%" });
            $("#progress-content").text("Progress ( 75% )");
        }

        $.ajax({

            url: ajaxurl,
            type: 'post',
            data: {

                phNumber: phNumber,
                emailAddress: emailAddress,
                source: source,
                medium: medium,
                campaign: campaign,
                action: 'prizesite_save_new_verification_data'

            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                if ( window.location.pathname == "/wordpress/v1/faqs" || window.location.pathname == "/wordpress/v1/contact-us" || window.location.pathname == "/wordpress/v1/past-winners" || window.location.pathname == "/wordpress/v1/whats-the-catch" || window.location.pathname == "/wordpress/v1/winners" || window.location.pathname == "/wordpress/v1/ads" ) {
                    $("#registration-modal .progress-bar").css({ "width": "100%" });
                    $("#popup-progress-content").text("Progress ( 100% )");
                } else {
                    $("#progress-modal .progress-bar").css({ "width": "100%" });
                    $("#progress-content").val("Progress ( 100% )");
                }
                var respArray = response.split('-');
                if (response == -100) {
                    $.redirect('http://localhost/wordpress/v1/failure-confirmation-page', {RegistrationPerformed: "True"}, "POST");
                } else if(respArray[0] == 0) {
                    $("#v1-danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#v1-danger-alert").slideUp(500);
                    });
                } else {
                    var hash = respArray[1];
                    window.location = origin + '/wordpress/v1/verification?hash=' + hash;
                }
                $('#no').val('');
                $("#agree").prop("checked", false);
                $('#progress-modal').modal('hide');
            }

        });
    });

    // sleep time expects milliseconds
    function sleep (time) {
        return new Promise((resolve) => setTimeout(resolve, time));
    }
    
    $('#prizesite-lucky-form-check').on('submit', function(e) {

        e.preventDefault();
        var form = $(this),
            phNumber = form.find('#check-no').val(),
            ajaxurl = form.data('url');

        $("#check-no").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#check-error-msg").css({ "display": "none" });

        if (phNumber === '') {
            $("#check-no").css({ "border-color": "#da6666" });
            $("#check-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            $(".label").css({ "display": "none" });
            return;
        }

        $('#check-ad-modal').modal({backdrop: true,backdrop: 'static'});

        $.ajax({

            url: ajaxurl,
            type: 'post',
            data: {

                phNumber: phNumber,
                action: 'prizesite_check_candidate_data'

            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                sleep(ad_timer).then(() => {
                    if (response == -100) {
                        $.redirect(origin + '/wordpress/v1/not-registered', {CheckPrizePerformed: "True"}, "POST");
                    } else if (response == -200) {
                        $.redirect(origin + '/wordpress/v1/try-tomorrow', {CheckPrizePerformed: "True"}, "POST");
                    } else if (response == -300) {
                    $.redirect(origin + '/wordpress/v1/won', {CheckPrizePerformed: "True"}, "POST");
                    }
                    $('#check-phNumber').val('');
                });
            }

        });
    });

    $('#prizesite-lucky-form-popup').on('submit', function(e) {
        e.preventDefault();

        $("#popup-error-msg").css({ "display": "none" });
        $("#popup-email-invalid-msg").css({ "display": "none" });
        $("#popup-email-error-msg").css({ "display": "none" });
        $("#popup-no-invalid-msg").css({ "display": "none" });
        $("#popup-error-chk-box-msg").css({ "display": "none" });
        $("#popup-no").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#popup-email").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#popup-check-label-box").addClass("check-label");
        $("#popup-check-label-box").removeClass("error-occured");

        var source = getCookie("UTM_SOURCE");
        var medium = getCookie("UTM_MEDIUM");
        var campaign = getCookie("UTM_CAMPAIGN");

        var form = $(this),
            phNumber = form.find('#popup-no').val(),
            emailAddress = form.find('#popup-email').val(),
            ajaxurl = form.data('url');

        var isError = 0;

        function IsValidPhone(phNumber) {
            var regex = /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/;
            if(!regex.test(phNumber)) {
              return 1;
            }else{
              return 0;
            }
        }

        if (phNumber === '') {
            $("#popup-no").css({ "border-color": "#da6666" });
            $("#popup-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            isError = 1;
        } else if(IsValidPhone(phNumber)==1){
            $("#popup-no").css({ "border-color": "#da6666" });
            $("#popup-no-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            isError = 1;
        }

        function IsValidEmail(emailAddress) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(emailAddress)) {
              return 1;
            }else{
              return 0;
            }
        } 

        if (emailAddress === '') {
            $("#popup-email").css({ "border-color": "#da6666" });
            $("#popup-email-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            isError = 1;
        } else if(IsValidEmail(emailAddress)==1){
            $("#popup-email").css({ "border-color": "#da6666" });
            $("#popup-email-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            isError = 1;
        }

        if ($('#popup-agree').is(":not(:checked)")) {
            $("#popup-check-label-box").removeClass("check-label");
            $("#popup-check-label-box").addClass("error-occured");
            $("#popup-error-chk-box-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            isError = 1;
        }

        if ( isError == 1 ) { return ; }

        $('#popup-progress-bar').modal('show');
        $("#popup-registration-modal .progress-bar").css({ "width": "75%" });
        $("#popup-progress-content").text("Progress ( 75% )");

        $.ajax({

            url: ajaxurl,
            type: 'post',
            data: {

                phNumber: phNumber,
                emailAddress: emailAddress,
                source: source,
                medium: medium,
                campaign: campaign,
                action: 'prizesite_save_new_verification_data'

            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                $("#popup-registration-modal .progress-bar").css({ "width": "100%" });
                $("#popup-progress-content").text("Progress ( 100% )");
                var respArray = response.split('-');
                if (response == -100) {
                    $.redirect('http://localhost/wordpress/v1/failure-confirmation-page', {RegistrationPerformed: "True"}, "POST");
                } else if(respArray[0] == 0) {
                    $("#v1-danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#v1-danger-alert").slideUp(500);
                    });
                } else {
                    var hash = respArray[1];
                    window.location = origin + '/wordpress/v1/verification?hash=' + hash;
                }
                $('#popup-no').val('');
                $("#popup-agree").prop("checked", false);
            }

        });
    });

    $('#prizesite-lucky-form-verification').on('submit', function(e) {
        
        e.preventDefault();
        var urlPath = window.location;
        var urlArray = String(urlPath).split('?');
        var hashArray = urlArray[1].split('=');

        var form = $(this),
            passCode = form.find('#passcode-no').val(),
            hash = hashArray[1],
            ajaxurl = form.data('url');

        $("#passcode-no").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#check-error-msg").css({ "display": "none" });

        if (passCode === '') {
            $("#passcode-no").css({ "border-color": "#da6666" });
            $("#check-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            $(".label").css({ "display": "none" });
            return;
        }

        $.ajax({

            url: ajaxurl,
            type: 'post',
            data: {

                passCode: passCode,
                hash: hash,
                action: 'prizesite_save_new_candidate_data'

            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                if(response == -100) {
                    $("#verification-passcode-failure-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#verification-passcode-failure-alert").slideUp(500);
                    });
                } else if(response == 0) {
                    $("#verification-failure-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#verification-failure-alert").slideUp(500);
                    });
                } else if(response > 0){
                    $.redirect('http://localhost/wordpress/v1/success-confirmation-page/', {RegistrationPerformed: "True"}, "POST");
                }
                $('#passcode-no').val('');
            }

        });
    });

    if ( window.location.pathname == "/wordpress/v1/verification" ) {

        getVerificationDataByID();

        function getVerificationDataByID(){

            $("#verification-retrieve-data-error").css({ "display": "none" });
            $("#verification-retrieve-data-failure").css({ "display": "none" });
            $("#error-msg").css({ "display": "none" });

            var urlPath = window.location;
            var urlArray = String(urlPath).split('?');
            var hashArray = urlArray[1].split('=');

            var form = $(this),
                hash = hashArray[1],
                ajaxurl = ajax_admin_url;

            $.ajax({

                url: ajaxurl,
                type: 'post',
                data: {
        
                    hash: hash,
                    action: 'prizesite_get_new_verification_data'
        
                },
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    var respArray = response.split('-');
                    if(response == -100) {
                        $("#verification-retrieve-data-failure").fadeTo(2000, 500).slideUp(500, function() {
                            $("#verification-retrieve-data-failure").slideUp(500);
                        });
                    } else if(response == 0) {
                        $("#verification-retrieve-data-error").fadeTo(2000, 500).slideUp(500, function() {
                            $("#verification-retrieve-data-error").slideUp(500);
                        });
                    } else{
                        var email = respArray[1].replace("0","");
                        var title = $('#verification-title').html().replace("{email}", email);
                        document.getElementById("verification-title").innerHTML = title;
                    }
                }
            });
        }

        $('#prizesite-verification-email-resend').on('submit', function(e) {
        
            e.preventDefault();
            
            var urlPath = window.location;
            var urlArray = String(urlPath).split('?');
            var hashArray = urlArray[1].split('=');
    
            var form = $(this),
                hash = hashArray[1],
                ajaxurl = ajax_admin_url;
    
            $.ajax({
            
                url: ajaxurl,
                type: 'post',
                data: {
            
                    hash: hash,
                    action: 'prizesite_resend_new_email'
            
                },
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    if(response == -100) {
                        $("#verification-resend-email-error").fadeTo(10000, 500).slideUp(500, function() {
                            $("#verification-resend-email-error").slideUp(500);
                        });
                    } else if(response == 0) {
                        $("#verification-resend-email-failure").fadeTo(10000, 500).slideUp(500, function() {
                            $("#verification-resend-email-failure").slideUp(500);
                        });
                    } else if(response > 0) {
                        $("#verification-resend-email-success").fadeTo(10000, 500).slideUp(500, function() {
                            $("#verification-resend-email-success").slideUp(500);
                        });
                    } else {
                            alert(response);
                    }
                }
            });
        });
    }

});