<?php

if (defined('MODALLINKS') === false) {
    exit;
}


/**
 * Gets the modal link on click
 *
 * @return nothing
 */
function modalLinksGetPost()
{
    global $shortcode_tags;
    $globalShortcodeTags          = json_encode($shortcode_tags);
    $adminAjaxUrl                 = admin_url('admin-ajax.php');
    $modalLinksModalWidth         = intval(get_option('modalLinksModalWidth'));
    $modalLinksModalWidthType     = get_option('modalLinksModalWidthType');
    $modalLinksModalMaxHeight     = intval(get_option('modalLinksModalMaxHeight'));
    $modalLinksModalMaxHeightType = get_option('modalLinksModalMaxHeightType');
    $modalLinksModalDraggable     = get_option('modalLinksModalDraggable');
    $modalLinksModalResizable     = get_option('modalLinksModalResizable');
    $modalLinksModalShow          = get_option('modalLinksModalShow');
    $modalLinksModalHide          = get_option('modalLinksModalHide');
    $modalLinksModalType          = get_option('modalLinksModalType');
    $modalLinksModalCloseIcon     = get_option('modalLinksModalCloseIcon');

    $modalLinksModalCloseEsc      = get_option('modalLinksModalCloseEsc');
    $modalLinksModalLoadingGif    = get_option('modalLinksModalLoadingGif');
    $modalLinksModalClass         = get_option('modalLinksModalClass');


    if ($modalLinksModalWidth === false || $modalLinksModalWidth == 0) {
        $modalLinksModalWidth = '\'auto\'';
    }

    if ($modalLinksModalMaxHeight === false || $modalLinksModalMaxHeight == 0) {
        $modalLinksModalMaxHeight = '\'auto\'';
    }

    if ($modalLinksModalCloseIcon === 'true') {
        $closeIconDisplay = 'block';
    } else if ($modalLinksModalCloseIcon === 'false') {
        $closeIconDisplay = 'none';
    } else {
        $closeIconDisplay = 'block';
    }

    if ($modalLinksModalLoadingGif !== '') {
        $modalLinksModalLoadingGif = plugins_url(
            'modal-links/images/loading/ajaxLoader_'
            .$modalLinksModalLoadingGif
            .'.gif',
            ''
        );
    }

    if ($modalLinksModalClass !== '') {
        $modalLinksModalClass = '.'.$modalLinksModalClass;
    }

echo <<<CSS

<style type="text/css">

$modalLinksModalClass .ui-button.ui-dialog-titlebar-close {
    display: $closeIconDisplay
}

</style>

CSS;

echo <<<JAVASCRIPT

<script type="text/javascript">
jQuery(function(){

    if (jQuery.isNumeric($modalLinksModalWidth)
        && '$modalLinksModalWidthType' == '%'
    ) {
        var modalLinksModalWidth = window.innerWidth * ($modalLinksModalWidth / 100);
        console.log(modalLinksModalWidth);
    } else {
        var modalLinksModalWidth = $modalLinksModalWidth;
    }

    if (jQuery.isNumeric($modalLinksModalMaxHeight)
        && '$modalLinksModalMaxHeightType' == '%'
    ) {
        var modalLinksModalMaxHeight = window.innerWidth * ($modalLinksModalMaxHeight / 100);
    } else {
        var modalLinksModalMaxHeight = $modalLinksModalMaxHeight;
    }

    jQuery(document).on('click', 'a[target="_modal"]', function(e){

        e.preventDefault();
        var thisID         = jQuery(this).attr('id');
        var thisHref       = jQuery(this).attr('href');
        var thisDataTitle  = jQuery(this).attr('data-title');
        var thisDataLogin  = jQuery(this).attr('data-login');
        var thisDataAction = jQuery(this).attr('data-action');

        var data = {
            modalLoadingGif: '$modalLinksModalLoadingGif',
            globalShortcodeTags: $globalShortcodeTags,
            action: 'modalLinksGetPost'
        };

        if (thisID) {
            data.modalLinks_postID = thisID;
            if (thisDataTitle === 'true' || thisDataTitle === 'false')
                data.modalLinks_postDataTitle = thisDataTitle;
        } else if (thisHref != '#') {
            data.modalLinks_postPermalink = thisHref;
            if(thisDataTitle === 'true' || thisDataTitle === 'false')
                data.modalLinks_postDataTitle = thisDataTitle;
        } else if (thisDataLogin === 'true') {
            data.modalLinks_postDataLogin = thisDataLogin;
            if (thisDataAction === 'register' || thisDataAction === 'logout')
                data.modalLinks_postDataAction = thisDataAction;
            if (thisDataTitle === 'true' || thisDataTitle === 'false')
                data.modalLinks_postDataTitle = thisDataTitle;
        } else {
            data = '';
        }

        if (data) {

            modalLinksGetPostCall('$adminAjaxUrl', data, function(data){

                if (data) {
                    var modalLoadingGif   = data.modalLoadingGif;
                    var modalTitle        = data.modalTitle;
                    var modalContent      = data.modalContent;

                    if (data.modalButtons && (data.modalButtons === 'false')) {
                        var buttonsDisplay = jQuery('#modalLinksDialog')
                        .parent('div')
                        .find('.ui-dialog-buttonpane')
                        .css('display');

                        if (buttonsDisplay !== 'none') {
                            jQuery('#modalLinksDialog')
                            .parent('div')
                            .find('.ui-dialog-buttonpane')
                            .css('display', 'none');
                        }
                    } else {
                        var buttonsDisplay = jQuery('#modalLinksDialog')
                        .parent('div')
                        .find('.ui-dialog-buttonpane')
                        .css('display');

                        if (buttonsDisplay === 'none')
                            jQuery('#modalLinksDialog')
                            .parent('div')
                            .find('.ui-dialog-buttonpane')
                            .css('display', 'block');
                    }

                    jQuery('#modalLinksDialog')
                    .html(modalContent)
                    .dialog('option', 'title', modalTitle);

                    if (modalLoadingGif === '') {
                        jQuery('#modalLinksDialog')
                        .dialog('open');
                    }
                }

            });
        }

    });

    jQuery('#modalLinks button[data-dismiss="modal"]').on('click', function(e){

        e.preventDefault();
        jQuery('#modalLinks').fadeOut();

    });

    jQuery('#modalLinksDialog').dialog({
        dialogClass   : '$modalLinksModalClass',
        modal         : $modalLinksModalType,
        autoOpen      : false,
        closeOnEscape : $modalLinksModalCloseEsc,
        draggable     : $modalLinksModalDraggable,
        resizable     : $modalLinksModalResizable,
        show          : $modalLinksModalShow,
        hide          : $modalLinksModalHide,
        open : function(event, ui) {

                jQuery(this).dialog('option',
                                    {'width': modalLinksModalWidth,
                                     'maxHeight': modalLinksModalMaxHeight});
        },
        buttons : {
            Ok    : function() {

                        jQuery(this)
                        .html('')
                        .dialog('option', 'title', '')
                        .dialog('close');
                    }
        }
    });

});
</script>

JAVASCRIPT;

}//end modalLinksGetPost()


add_action('wp_footer', 'modalLinksGetPost', 20);

do_action('modalLinksJs');
