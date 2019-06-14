jQuery(document).ready(function($) {

    if ( window.location.pathname == "/wordpress/v1/faqs" ) {

       var hash = window.location.hash;
        if (hash.toLowerCase().indexOf("urdu") >= 0) {
            $("#english-tab-link").removeClass("active");
            $("#urdu-tab-link").addClass("active");
            $("#english-tab").removeClass("active");
            $("#english-tab").removeClass("show");
            $("#urdu-tab").addClass("active");
            $("#urdu-tab").addClass("show");

            if ( hash.toLowerCase() != "urdu-tab" ) {
                $('html, body').delay(500).animate({
                    'scrollTop' : $(hash).position().top
                });
            }
        }
        
    }

    $(".share-link-btn").click(function(){
        var shareUrl = $(this).attr('href');
        $('#query-url').val(shareUrl);
    });

    $("#copy-url-btn").click(function(){
        $(this).siblings('#query-url').select();
        document.execCommand("copy");
    });

    /* Send Query form Submission */
    $('#prizesite-query-form').on('submit', function(e) {
        e.preventDefault();

        $("#name-error-msg").css({ "display": "none" });
        $("#email-error-msg").css({ "display": "none" });
        $("#no-error-msg").css({ "display": "none" });
        $("#question-error-msg").css({ "display": "none" });
        $("#query-no").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#query-email").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#query-name").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#query-question").css({ "border-color": "#387E1B", "background-color": "#F2F2F2" });
        $("#email-invalid-msg").css({ "display": "none" });
        $("#no-invalid-msg").css({ "display": "none" });

        var form = $(this),
            name = form.find('#query-name').val(),
            email = form.find('#query-email').val(),
            phNumber = form.find('#query-no').val(),
            question = form.find('#query-question').val(),
            ajaxurl = form.data('url');

        var isError = 0;
        
        if (phNumber === '') {
            $("#query-no").css({ "border-color": "#da6666" });
            $("#no-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            $(".label").css({ "display": "none" });
            isError = 1;
        }

        if (name === '') {
            $("#query-name").css({ "border-color": "#da6666" });
            $("#name-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            $(".label").css({ "display": "none" });
            isError = 1;
        }

        if (email === '') {
            $("#query-email").css({ "border-color": "#da6666" });
            $("#email-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            $(".label").css({ "display": "none" });
            isError = 1;
        }

        if (question === '') {
            $("#query-question").css({ "border-color": "#da6666" });
            $("#question-error-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            $(".label").css({ "display": "none" });
            isError = 1;
        }

        if ( isError == 1 ) { return ; }

        function IsValidEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(email)) {
              return 1;
            }else{
              return 0;
            }
        }

        function IsValidPhone(phNumber) {
            var regex = /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/;
            if(!regex.test(phNumber)) {
              return 1;
            }else{
              return 0;
            }
        }

        if(IsValidEmail(email)==1){
            $("#query-email").css({ "border-color": "#da6666" });
            $("#email-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
            "border-radius": "5px",
            "display": "block",
            "margin": "10px 0 0",
            "padding": "7px 15px" });
            $(".label").css({ "display": "none" });
            return ;
        }

        if(IsValidPhone(phNumber)==1){
            $("#query-no").css({ "border-color": "#da6666" });
            $("#no-invalid-msg").css({ "color": "#da6666", "background-color": "rgba(218, 102, 102, .3)",
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
                email: email,
                phNumber: phNumber,
                question: question,
                action: 'prizesite_save_new_query_data'

            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                $('#add-queries-close').click();
                if (response == 0) {
                    $('#failure-queries-modal').modal('show');
                } else if (response > 0) {
                    $('#success-queries-modal').modal('show');
                }
                $('#query-no').val('');
                $('#query-name').val('');
                $('#query-email').val('');
                $('#query-question').val('');
            }

        });
    });
});