(function ($) {

    $(document).on('click', 'a.post-link', function (event) {
        event.preventDefault();

        $.ajax({
            // URL to which request is sent.
            url: sk_ajaxobject.ajaxurl,

            // specifies how contents of data option are sent to the server.
            // `post` indicates that we are submitting the data.
            type: 'post',

            // data to be sent to the server.
            data: {
                // a function defined in functions.php hooked to this action (with `wp_ajax_nopriv_` and/or `wp_ajax_` prefixed) will run.
                action: 'sk_load_post',

                // stores the value of `data-id` attribute of the clicked link in a variable.
                post_id: $(this).data('id')
            },

            // pre-reqeust callback function.
            beforeSend: function () {
                $('.content > .entry .entry-content').html('<img src="' + sk_ajaxobject.loadingimage + '" />');
            },

            // function to be called if the request succeeds.
            // `response` is data returned from the server.
            success: function (response) {
                $('.content > .entry .entry-content').hide().html(response).fadeIn('slow');
            }
        })
    })

})(jQuery);