<?php

if (defined('MODALLINKS') === false) {
    exit;
}


/**
 * Calls for post id by post url
 *
 * @return post id
 */
function modalLinksPostUrlToPostIdCall()
{
echo <<<JAVASCRIPT

<script type="text/javascript">

var modalLinksPostUrlToPostIdCall = function(adminAjaxUrl, url)
{
    return jQuery.ajax({
        type     : 'POST',
        url      : adminAjaxUrl,
        async    : false,
        data     : {
                 action: 'modalLinksPostUrlToPostId',
                 modalLinks_postUrl: url
        },
        dataType : 'json'
    });
}

</script>

JAVASCRIPT;

}//end modalLinksPostUrlToPostIdCall()


/**
 * Call for post title and content
 *
 * @return nothing
 */
function modalLinksGetPostCall()
{
echo <<<JAVASCRIPT

<script type="text/javascript">

function modalLinksGetPostCall(adminAjaxUrl, data, callback)
{
    var response;

    if (data.modalLoadingGif !== '') {
        jQuery('#modalLinksDialog')
        .html('<img width="" height="" style="margin: 0 auto; display: block" alt="" src="'+data.modalLoadingGif+'" />')
        .dialog('open');
    }

    jQuery.when(jQuery.ajax({

        type     : 'POST',
        url      : adminAjaxUrl,
        async    : true,
        data     : data,
        dataType : 'json'

    }).done(function(data) {

        response = data;

    })).done(function(){

        callback(response);

    });

}

</script>

JAVASCRIPT;

}//end modalLinksGetPostCall()


add_action('wp_footer', 'modalLinksPostUrlToPostIdCall');
add_action('wp_footer', 'modalLinksGetPostCall');

do_action('modalLinksCalls');
