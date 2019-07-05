jQuery(document).ready(function($) {

    var origin = document.location.origin;

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
                    window.location = 'https://muftpaise.com/failure-confirmation-page/';
                } else if (response == 0) {
                    $("#danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#danger-alert").slideUp(500);
                    });
                } else {
                    window.location = 'https://muftpaise.com/success-confirmation-page/';
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

        $('#progress-modal').modal('show');
        $("#error-msg").css({ "display": "none" });
        $("#email-error-msg").css({ "display": "none" });
        $("#error-chk-box-msg").css({ "display": "none" });
        $("#no").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#email").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#check-label-box").addClass("check-label");
        $("#check-label-box").removeClass("error-occured");
        
        var form = $(this),
            phNumber = form.find('#no').val(),
            emailAddress = form.find('#email').val(),
            ajaxurl = form.data('url');

        var isError = 0;
        $("#progress-modal .progress-bar").css({ "width": "50%" });
        $("#progress-content").text("Progress ( 50% )");

        if (phNumber === '') {
            $("#no").css({ "border-color": "#da6666" });
            $("#error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            isError = 1;
        }

        if (emailAddress === '') {
            $("#email").css({ "border-color": "#da6666" });
            $("#email-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
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

        $("#progress-modal .progress-bar").css({ "width": "75%" });
        $("#progress-content").text("Progress ( 75% )");

        if ( isError == 1 ) { return ; }

        $.ajax({

            url: ajaxurl,
            type: 'post',
            data: {

                phNumber: phNumber,
                emailAddress: emailAddress,
                action: 'prizesite_save_new_verification_data'

            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                var respArray = response.split('-');
                if (response == -100) {
                    $("#progress-modal .progress-bar").css({ "width": "100%" });
                    $("#progress-content").val("Progress ( 100% )");
                    window.location = origin + '/wordpress/v1/failure-confirmation-page';
                } else if(respArray[0] == 0) {
                    $("#progress-modal .progress-bar").css({ "width": "100%" });
                    $("#progress-content").text("Progress ( 100% )");
                    $("#v1-danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#v1-danger-alert").slideUp(500);
                    });
                } else {
                    $("#progress-modal .progress-bar").css({ "width": "100%" });
                    $("#progress-content").text("Progress ( 100% )");
                    var hash = respArray[1];
                    window.location = origin + '/wordpress/v1/verification?hash=' + hash;
                }
                $('#no').val('');
                $("#agree").prop("checked", false);
                $('#progress-modal').modal('hide');
            }

        });
    });

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
                    window.location = origin + '/wordpress/v1/not-registered';
                } else if (response == -200) {
                    window.location = origin + '/wordpress/v1/try-tomorrow';
                } else if (response == -300) {
                    window.location = origin + '/wordpress/v1/won';
                }
                $('#check-phNumber').val('');
            }

        });
    });

    $('#prizesite-lucky-form-popup').on('submit', function(e) {
        e.preventDefault();

        $("#popup-progress-bar").css({ "display": "block" });
        $("#popup-error-msg").css({ "display": "none" });
        $("#popup-email-error-msg").css({ "display": "none" });
        $("#popup-error-chk-box-msg").css({ "display": "none" });
        $("#popup-no").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#popup-email").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#popup-check-label-box").addClass("check-label");
        $("#popup-check-label-box").removeClass("error-occured");

        var form = $(this),
            phNumber = form.find('#popup-no').val(),
            emailAddress = form.find('#popup-email').val(),
            ajaxurl = form.data('url');

        var isError = 0;
        $("#popup-registration-modal .progress-bar").css({ "width": "50%" });
        $("#popup-progress-content").text("Progress ( 50% )");

        if (phNumber === '') {
            $("#popup-no").css({ "border-color": "#da6666" });
            $("#popup-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            isError = 1;
        }

        if (emailAddress === '') {
            $("#popup-email").css({ "border-color": "#da6666" });
            $("#popup-email-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
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

        $("#popup-registration-modal .progress-bar").css({ "width": "75%" });
        $("#popup-progress-content").text("Progress ( 75% )");

        if ( isError == 1 ) { return ; }

        $.ajax({

            url: ajaxurl,
            type: 'post',
            data: {

                phNumber: phNumber,
                emailAddress: emailAddress,
                action: 'prizesite_save_new_verification_data'

            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                var respArray = response.split('-');
                if (response == -100) {
                    $("#popup-registration-modal .progress-bar").css({ "width": "100%" });
                    $("#popup-progress-content").text("Progress ( 100% )");
                    window.location = origin + '/wordpress/v1/failure-confirmation-page';
                } else if(respArray[0] == 0) {
                    $("#popup-registration-modal .progress-bar").css({ "width": "100%" });
                    $("#popup-progress-content").text("Progress ( 100% )");
                    $("#v1-danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#v1-danger-alert").slideUp(500);
                    });
                } else {
                    $("#popup-registration-modal .progress-bar").css({ "width": "100%" });
                    $("#popup-progress-content").text("Progress ( 100% )");
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
                    window.location = origin + '/wordpress/v1/success-confirmation-page';
                }
                $('#passcode-no').val('');
            }

        });
    });

});