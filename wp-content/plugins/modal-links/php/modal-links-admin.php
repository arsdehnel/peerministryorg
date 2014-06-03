<?php

if (defined('MODALLINKS') === false) {
    exit;
}


/**
 * Add submenu in settings
 *
 * @return nothing
 */
function modalLinksAdminPage()
{
    add_options_page(
        __('Modal Links', 'modal_links'),
        __('Modal Links', 'modal_links'),
        'manage_options',
        'modal_links',
        'modalLinksAdminPageCallback'
    );

}//end modalLinksAdminPage()


/**
 * Admin page callback
 *
 * @return the html of admin page
 */
function modalLinksAdminPageCallback()
{
    //do_action('modalLinksAdminAutoOpenExtension');

    echo '<div class="wrap">'
            .'<h2>'.__('Modal Links Settings', 'modal_links').'</h2>'
            .'<form name="modalLinksForm" method="POST" action="options.php">';
                settings_fields('modal_links');
                do_settings_sections('modal_links');
                submit_button();
        echo '</form>';

        echo '<h3>'.__('Usage and Support', 'modal_links').'</h3>'
            .'<p>'
                .'<a target="_blank"
                href="https://wordpress.org/plugins/modal-links/">'
                    .__('Modal Links in wordpress.org', 'modal_links')
                .'</a>'
            .'</p>';

        do_action('modalLinksAdminValidationExtension');

        echo '<h3>'.__('Extensions', 'modal_links').'</h3>';

        $serverHost    = $_SERVER['HTTP_HOST'];
        $serverDocRoot = $_SERVER['DOCUMENT_ROOT'];

        $extensionsArr = array(
            array(
                'tag'         => 'modal-links-read-more',
                'name'        => 'Modal Links Read More',
                'description' => 'uses the post\'s/page\'s read more link to
                open the complete post/page in modal window',
            ),
            array(
                'tag'         => 'modal-links-meta-widget-login-register',
                'name'        => 'Modal Links Meta Widget Login Register',
                'description' => 'uses the meta widget and opens Login/Logout
                and Register links in modal window',
            ),
            array(
                'tag'         => 'modal-links-validation',
                'name'        => 'Modal Links Validation',
                'description' => 'checks if your modal links shortcodes
                in posts/pages are valid or no',
            ),
            array(
                'tag'         => 'modal-links-shortcode-gui',
                'name'        => 'Modal Links Shortcode GUI',
                'description' => 'adds a GUI way to insert the shortcode
                into the wp editor. No need to know or remember anything',
            ),
            array(
                'tag'         => 'modal-links-auto-open',
                'name'        => 'Modal Links Auto Open',
                'description' => 'opens a post/page in modal windowautomatically.
                Selectable option for every post/page and front page',
            ),
        );

        foreach ($extensionsArr as $extension) {
            $pluginFileExists = modalLinksGetPluginAbsPath($extension['tag']
                .'/'
                .$extension['tag']
                .'.php');
            $pluginIsActive   = is_plugin_active($extension['tag']
                .'/'
                .$extension['tag']
                .'.php');
            if (file_exists($pluginFileExists) === true) {
                if ($pluginIsActive === true) {
                    echo '<p>'
                            .__('Great!', 'modal_links')
                            .' <strong>'
                                .__($extension['name'], 'modal_links')
                            .'</strong> '
                            .__(
                                'plugin seems that is installed and activated',
                                'modal_links'
                            )
                            .'.<br />'
                            .__(
                                'This plugin is an extension of Modal Links plugin
                                and '.$extension['description'],
                                'modal_links'
                            )
                        .'.</p>';
                } else {
                    echo '<p>'
                            .'<strong>'
                                .__($extension['name'], 'modal_links')
                            .'</strong> '
                            .__(
                                'plugin seems that is installed but not activated',
                                'modal_links'
                            )
                            .'.<br />'
                            .__(
                                'This plugin is an extension of Modal Links plugin
                                and '.$extension['description'],
                                'modal_links'
                            )
                            .'.<br />'
                            .__('Activate it', 'modal_links')
                            .' <a href="'.get_bloginfo('wpurl')
                                .'/wp-admin/plugins.php">'
                                .__('now', 'modal_links')
                            .'</a>'
                        .'.</p>';
                }
            } else {
                echo '<p>'
                        .'<strong>'
                            .__($extension['name'], 'modal_links')
                        .'</strong> '
                        .__('plugin seems that is not installed', 'modal_links')
                        .'.<br />'
                        .__(
                            'This plugin is an extension of Modal Links plugin
                            and '.$extension['description'],
                            'modal_links'
                        )
                        .'.<br />'
                        .__('You can get it', 'modal_links')
                        .' <a target="_blank"
                        href="https://wordpress.org/plugins/modal-links/">'
                            .__('here', 'modal_links')
                        .'</a>'
                    .'.</p>';
            }
        }

    echo '</div>';

}//end modalLinksAdminPageCallback()


if (is_admin() === true) {
    add_action('admin_menu', 'modalLinksAdminPage');
}
