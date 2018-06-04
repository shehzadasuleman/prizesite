jQuery(document).ready(function($) {

    var mediaUploader;

    $('#s1-upload-button').on('click', function(e) {
        e.preventDefault();

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Story 1 Picture',
            button: {
                text: 'Choose Picture'
            },
            multiple: false
        });

        mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#story1-picture').val(attachment.url);
            $('#story1-picture-preview').attr('src', attachment.url);
        });

        mediaUploader.open();

    });

    $('#s2-upload-button').on('click', function(e) {
        e.preventDefault();

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Story 2 Picture',
            button: {
                text: 'Choose Picture'
            },
            multiple: false
        });

        mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#story2-picture').val(attachment.url);
            $('#story2-picture-preview').attr('src', attachment.url);
        });

        mediaUploader.open();

    });

    $('#bci-upload-button').on('click', function(e) {
        e.preventDefault();

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Bottom Cover',
            button: {
                text: 'Choose Picture'
            },
            multiple: false
        });

        mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#bci-picture').val(attachment.url);
            $('#bci-picture-preview').attr('src', attachment.url);
        });

        mediaUploader.open();

    });

});