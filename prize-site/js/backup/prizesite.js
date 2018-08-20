jQuery(document).ready(function($) {

    /*$('#menu-prizesite-header-menu li a').on('click', function(e) {

        $(this).css("color", "black");
        $(this).css("font-weight", "bold");
    });*/

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
                    window.location = 'http://muftpaise.com/failure-confirmation-page/';
                } else if (response == 0) {
                    $("#danger-alert").fadeTo(2000, 1000).slideUp(1000, function() {
                        $("#danger-alert").slideUp(1000);
                    });
                } else {
                    window.location = 'http://muftpaise.com/success-confirmation-page/';
                }
                $('#phNumber').val('');
                $("#customCheck1").prop("checked", false);
            }

        });
    });
});