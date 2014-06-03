<?php

if (defined('MODALLINKS') === false) {
    exit;
}


/**
 * Register scripts
 *
 * @return nothing
 */
function modalLinksLoadScripts()
{
    // Check if jQuery is already enqueued.
    $jQueryEnqueued = wp_script_is(
        'jquery',
        $list = 'enqueued'
    );

    // Check if jQuery UI dialog is already enqueued.
    $jQueryUIDialogJSEnqueued = wp_script_is(
        'jquery-ui-dialog',
        $list = 'enqueued'
    );

    // Check if jQuery UI dialog CSS is already enqueued.
    $jQueryUIDialogCSSEnqueued = wp_style_is(
        'wp-jquery-ui-dialog',
        $list = 'enqueued'
    );

    // If jQuery is not enqueued, enqueue it.
    if ($jQueryEnqueued === false) {
        wp_enqueue_script('jquery');
    }

    // If jQuery UI is not enqueued, enqueue it.
    if ($jQueryUIDialogJSEnqueued === false) {
        wp_enqueue_script('jquery-ui-dialog');
    }

    // If jQuery UI CSS is not enqueued, enqueue it.
    if ($jQueryUIDialogCSSEnqueued === false) {
        wp_enqueue_style('wp-jquery-ui-dialog');
    }

    wp_enqueue_script(
        'jquery-scoped',
        plugins_url(
            'modal-links/js/modal-links-jquery-scoped.js',
            ''
        ),
        array('jquery')
    );

}//end modalLinksLoadScripts()


add_action('wp_enqueue_scripts', 'modalLinksLoadScripts');

do_action('modalLinksScripts');
