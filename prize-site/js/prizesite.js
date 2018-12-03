jQuery(document).ready(function($) {

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

    if (document.getElementById("no") != null) {
        document.getElementById("no").focus();
    }

    $('#draw-btn-bottom').on('click', function(e) {
        document.getElementById("no").focus();
    });

    $('#draw-btn-menu').on('click', function(e) {
        window.location = 'http://localhost/wordpress/v1';
    });

    $('#draw-btn-bottom-block').on('click', function(e) {
        document.getElementById("no").focus();
    });
});