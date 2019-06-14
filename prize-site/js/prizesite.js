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

        $("#error-msg").css({ "display": "none" });
        $("#error-chk-box-msg").css({ "display": "none" });
        $("#no").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#check-label-box").addClass("check-label");
        $("#check-label-box").removeClass("error-occured");
        
        var form = $(this),
            phNumber = form.find('#no').val(),
            ajaxurl = form.data('url');

        if (phNumber === '') {
            $("#no").css({ "border-color": "#da6666" });
            $("#error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            $(".label").css({ "display": "none" });
            $("#check-label-box").removeClass("check-label");
            $("#check-label-box").addClass("error-occured");
            return;
        }

        if ($('#agree').is(":not(:checked)")) {
            $(".label").css({ "display": "none" });
            $("#check-label-box").removeClass("check-label");
            $("#check-label-box").addClass("error-occured");
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
                    window.location = origin + '/wordpress/v1/failure-confirmation-page';
                } else if (response == 0) {
                    $("#v1-danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#v1-danger-alert").slideUp(500);
                    });
                } else {
                    window.location = origin + '/wordpress/v1/success-confirmation-page';
                }
                $('#no').val('');
                $("#agree").prop("checked", false);
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

        $("#popup-error-msg").css({ "display": "none" });
        $("#popup-error-chk-box-msg").css({ "display": "none" });
        $("#popup-no").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#popup-check-label-box").addClass("check-label");
        $("#popup-check-label-box").removeClass("error-occured");

        var form = $(this),
            phNumber = form.find('#popup-no').val(),
            ajaxurl = form.data('url');

        if (phNumber === '') {
            $("#popup-no").css({ "border-color": "#da6666" });
            $("#popup-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            $(".label").css({ "display": "none" });
            $("#popup-check-label-box").removeClass("check-label");
            $("#popup-check-label-box").addClass("error-occured");
            return;
        }

        if ($('#popup-agree').is(":not(:checked)")) {
            $(".label").css({ "display": "none" });
            $("#popup-check-label-box").removeClass("check-label");
            $("#popup-check-label-box").addClass("error-occured");
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
                    window.location = origin + '/wordpress/v1/failure-confirmation-page';
                } else if (response == 0) {
                    $("#v1-danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#v1-danger-alert").slideUp(500);
                    });
                } else {
                    window.location = origin + '/wordpress/v1/success-confirmation-page';
                }
                $('#popup-no').val('');
                $("#popup-agree").prop("checked", false);
            }

        });
    });

});