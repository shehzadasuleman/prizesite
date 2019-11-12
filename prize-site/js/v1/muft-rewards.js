jQuery(document).ready(function($) {

    if ( window.location.pathname == "/wordpress/v1/muft-rewards" ) {

        $('#show-draw-detail').on('click', function(e) {
            $('#signup-daily-draw-info').toggle();
        });

        function resetAllSignupErrorMessages(){
            $("#fname-error-msg").css({ "display": "none" });
            $("#signup-fname-invalid-msg").css({ "display": "none" });
            $("#lname-error-msg").css({ "display": "none" });
            $("#signup-lname-invalid-msg").css({ "display": "none" });
            $("#username-error-msg").css({ "display": "none" });
            $("#signup-username-invalid-msg").css({ "display": "none" });
            $("#password-error-msg").css({ "display": "none" });
            $("#signup-password-invalid-msg").css({ "display": "none" });
            $("#cpassword-error-msg").css({ "display": "none" });
            $("#signup-cpassword-invalid-msg").css({ "display": "none" });
            $("#no-error-msg").css({ "display": "none" });
            $("#signup-number-invalid-msg").css({ "display": "none" });
            $("#signup-error-chk-box-msg").css({ "display": "none" });
            $("#signup-fname").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
            $("#signup-lname").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
            $("#signup-username").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
            $("#signup-password").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
            $("#signup-cpassword").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
            $("#signup-no").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
            $("#check-label-box").addClass("check-label");
            $("#check-label-box").removeClass("error-occured");
        }

        $('#prizesite-signup-form').on('submit', function(e) {
            e.preventDefault();

            resetAllSignupErrorMessages();

            var form = $(this),
            fName = form.find('#signup-fname').val(),
            lName = form.find('#signup-lname').val(),
            password = form.find('#signup-password').val(),
            cpassword = form.find('#signup-cpassword').val(),
            phNumber = form.find('#signup-no').val(),
            emailAddress = form.find('#signup-username').val(),
            ajaxurl = form.data('url');

            var enterDraw = 0;
            if  ( $('#agree-enter-draw').prop('checked') === true ) {
                var enterDraw = 1;
            }
            alert(enterDraw);
            var isError = 0;

            if (fName === '') {
                $("#signup-fname").css({ "border-color": "#da6666" });
                $("#fname-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            } else if( /^[A-Za-z]+$/.test(fName) === false ){
                $("#signup-fname").css({ "border-color": "#da6666" });
                $("#signup-fname-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            }

            if (lName === '') {
                $("#signup-lname").css({ "border-color": "#da6666" });
                $("#lname-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            } else if( /^[A-Za-z]+$/.test(lName) === false ){
                $("#signup-lname").css({ "border-color": "#da6666" });
                $("#signup-lname-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            }

            if (password === '') {
                $("#signup-password").css({ "border-color": "#da6666" });
                $("#password-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            } else if( password.length < 8 ){
                $("#signup-password").css({ "border-color": "#da6666" });
                $("#signup-password-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            }

            if (cpassword === '') {
                $("#signup-cpassword").css({ "border-color": "#da6666" });
                $("#cpassword-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            } else if( cpassword !== password ){
                $("#signup-cpassword").css({ "border-color": "#da6666" });
                $("#signup-cpassword-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            }

            function IsValidPhone(phNumber) {
                var regex = /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/;
                if(!regex.test(phNumber)) {
                  return 1;
                }else{
                  return 0;
                }
            }

            if (phNumber === '') {
                $("#signup-no").css({ "border-color": "#da6666" });
                $("#no-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            } else if(IsValidPhone(phNumber)==1){
                $("#signup-no").css({ "border-color": "#da6666" });
                $("#signup-number-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
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
                $("#signup-username").css({ "border-color": "#da6666" });
                $("#username-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            } else if(IsValidEmail(emailAddress)==1){
                $("#signup-username").css({ "border-color": "#da6666" });
                $("#signup-username-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            }

            if ($('#signup-agree').is(":not(:checked)")) {
                $("#check-signup-label-box").removeClass("check-label");
                $("#check-signup-label-box").addClass("error-occured");
                $("#signup-error-chk-box-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            }

            if ( isError == 1 ) { return ; }

            $('#signup-popup-progress-bar').css({ "display": "block" })
            $("#muftrewards-signup-registration-modal .progress-bar").css({ "width": "60%" });
            $("#signup-popup-progress-content").text("Progress ( 60% )");

            $.ajax({

                url: ajaxurl,
                type: 'post',
                data: {
    
                    fName: fName,
                    lName : lName,
                    password : password,
                    enterDraw : enterDraw,
                    phNumber: phNumber,
                    emailAddress: emailAddress,
                    enterDraw : enterDraw,
                    action: 'prizesite_save_muftrewards_user_data'
    
                },
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    $("#muftrewards-signup-registration-modal .progress-bar").css({ "width": "100%" });
                    $("#signup-popup-progress-content").text("Progress ( 100% )");
                    var respArray = response.split('-');
                    if (response == -100) {
                        $.redirect('http://localhost/wordpress/v1/failure-confirmation-page', {RegistrationPerformed: "True"}, "POST");
                    } else if(respArray[0] == 0) {
                        $('#signup-fname').val('');
                        $('#signup-lname').val('');
                        $('#signup-password').val('');
                        $('#signup-cpassword').val('');
                        $('#signup-username').val('');
                        $('#signup-no').val('');
                        $("#signup-agree").prop("checked", false);
                        $('#muftrewards-signup-registration-modal').modal('hide');
                        $("#mr-signup-danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                            $("#mr-signup-danger-alert").slideUp(500);
                        });
                    } else {
                        var hash = respArray[1];
                        window.location = origin + '/wordpress/v1/mr-verification?hash=' + hash;
                    }
                }
    
            });
        });

        $('#prizesite-signin-form').on('submit', function(e) {
            e.preventDefault();

            $("#signin-username-error-msg").css({ "display": "none" });
            $("#signin-username-invalid-msg").css({ "display": "none" });
            $("#signin-password-error-msg").css({ "display": "none" });
            $("#signin-username").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
            $("#signin-password").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });

            var form = $(this),
            password = form.find('#signin-password').val(),
            emailAddress = form.find('#signin-username').val(),
            ajaxurl = form.data('url');

            var isError = 0;

            function IsValidEmail(emailAddress) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test(emailAddress)) {
                  return 1;
                }else{
                  return 0;
                }
            }

            if (emailAddress === '') {
                $("#signin-username").css({ "border-color": "#da6666" });
                $("#signin-username-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            } else if(IsValidEmail(emailAddress)==1){
                $("#signin-username").css({ "border-color": "#da6666" });
                $("#signin-username-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            }

            if (password === '') {
                $("#signin-password").css({ "border-color": "#da6666" });
                $("#signin-password-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
                "border-radius": "5px",
                "display": "block",
                "margin": "10px 0 0",
                "padding": "7px 15px" });
                isError = 1;
            }

            if ( isError == 1 ) { return ; }

            $('#signin-popup-progress-bar').css({ "display": "block" })
            $("#muftrewards-signin-registration-modal .progress-bar").css({ "width": "60%" });
            $("#signin-popup-progress-content").text("Progress ( 60% )");

            $.ajax({

                url: ajaxurl,
                type: 'post',
                data: {
    
                    password : password,
                    emailAddress: emailAddress,
                    action: 'prizesite_signin_muftrewards_user_data'
    
                },
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    $("#muftrewards-signin-registration-modal .progress-bar").css({ "width": "100%" });
                    $("#signin-popup-progress-content").text("Progress ( 100% )");
                    var respArray = response.split('-');
                    if (response == -100) {
                        $('#signin-password').val('');
                        $('#signin-username').val('');
                        $("#mr-signin-invalid-alert").fadeTo(2000, 500).slideUp(500, function() {
                            $("#mr-signin-invalid-alert").slideUp(500);
                        });
                    } else if (response == -200) {
                        $('#signin-password').val('');
                        $('#signin-username').val('');
                        $("#mr-signin-wrong-password-alert").fadeTo(2000, 500).slideUp(500, function() {
                            $("#mr-signin-wrong-password-alert").slideUp(500);
                        });
                    } else if (response == -300) {
                        $('#signin-password').val('');
                        $('#signin-username').val('');
                        $("#mr-signin-not-verified-alert").fadeTo(2000, 500).slideUp(500, function() {
                            $("#mr-signin-not-verified-alert").slideUp(500);
                        });
                    } else if(respArray[0] == 0) {
                        $('#signin-password').val('');
                        $('#signin-username').val('');
                        $("#mr-signin-danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                            $("#mr-signin-danger-alert").slideUp(500);
                        });
                    } else {
                        var hash = respArray[1];
                        $.redirect('http://localhost/wordpress/v1/mr-user/dashboard');
                    }
                    $('#signin-popup-progress-bar').css({ "display": "none" })
                }
            });
        });

        $('#forgot-password-btn').on('click', function(e) {
            $('#muftrewards-signin-registration-modal').modal('hide');
        });

        $('#prizesite-fp-form').on('submit', function(e) {
            e.preventDefault();
            
            $('#muftrewards-fp-registration-modal').modal('hide');
            $('#muftrewards-vc-registration-modal').modal('show');
        });

        $('#prizesite-fp-vc-form').on('submit', function(e) {
            e.preventDefault();
            
            $('#muftrewards-vc-registration-modal').modal('hide');
            $("#new-fp-username").prop('disabled', true);
            $('#muftrewards-new-fp-registration-modal').modal('show');
        });
    }

    if ( window.location.pathname == "/wordpress/v1/mr-verification" ) {

        getVerificationDataByID();

        function getVerificationDataByID(){

            $("#verification-retrieve-data-error").css({ "display": "none" });
            $("#verification-retrieve-data-failure").css({ "display": "none" });
            $("#error-msg").css({ "display": "none" });

        }

        $('#prizesite-mr-signup-verification').on('submit', function(e) {
        
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
                    action: 'prizesite_verify_mr_user_data'
    
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

    /*if ( window.location.pathname == "/wordpress/v1/mr-user/dashboard" ) {
        $('#mr-user-signout').on('click', function(e) {
            window.location = origin + '/wordpress/v1/muft-rewards';
        });
    }*/
});