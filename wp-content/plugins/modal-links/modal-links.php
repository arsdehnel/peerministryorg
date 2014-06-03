<?php
/**
 * Plugin Name: Modal Links
 * Plugin URI: https://wordpress.org/plugins/modal-links
 * Description: With this plugin you can create a "modal" link to open post/page and even login/logout and register form in modal window.
 * Version: 1.3.8
 * Author: George Lazarou
 * Author URI: http://georgelazarou.info
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/*
    Copyright 2014  George Lazarou  (email : info@georgelazarou.info)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


define('MODALLINKS', 'Modal Links');

// Load the admin function.
require_once 'php/modal-links-admin.php';

// Load the ajax callback functions.
require_once 'php/modal-links-callbacks.php';

// Load the ajax call functions.
require_once 'php/modal-links-calls.php';

// Load functions.
require_once 'php/modal-links-functions.php';

// Load the js functions.
require_once 'php/modal-links-js.php';

// Load the scripts.
require_once 'php/modal-links-scripts.php';

// Load settings.
require_once 'php/modal-links-settings.php';

// Load the shortcode function.
require_once 'php/modal-links-shortcode.php';


/**
 * Load the textdomain
 *
 * @return nothing
 */
function modalLinksLoadTextdomain()
{
    load_plugin_textdomain(
        'modal_links',
        false,
        basename(dirname(__FILE__)).'/languages'
    );

}//end modalLinksLoadTextdomain()


/**
 * On activation
 *
 * @return nothing
 */
function modalLinksActivate()
{
    // If Modals category not exists create it.
    $modalCategoryExists = term_exists('Modals', 'category');
    if (($modalCategoryExists == 0) || ($modalCategoryExists == null)) {
        wp_create_category('Modals');
    }

    // For Single site.
    if (is_multisite() === false) {
        add_option('modalLinksModalWidth', 0);
        add_option('modalLinksModalWidthType', 'px');
        add_option('modalLinksModalMaxHeight', 0);
        add_option('modalLinksModalMaxHeightType', 'px');
        add_option('modalLinksModalDraggable', 'false');
        add_option('modalLinksModalResizable', 'false');
        add_option('modalLinksModalTitle', 'default');
        add_option('modalLinksModalShow', 'false');
        add_option('modalLinksModalHide', 'false');
        add_option('modalLinksModalType', 'true');
        add_option('modalLinksModalCloseIcon', 'true');
        add_option('modalLinksModalCloseEsc', 'true');
        add_option('modalLinksModalLoadingGif', 'gray32');
        add_option('modalLinksModalClass', '');
    } else {
        // For Multisite.
        global $wpdb;
        $blogIds        = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
        $originalBlogId = get_current_blog_id();
        foreach ($blogIds as $blogId) {
            switch_to_blog($blogId);
            add_option('modalLinksModalWidth', 0);
            add_option('modalLinksModalWidthType', 'px');
            add_option('modalLinksModalMaxHeight', 0);
            add_option('modalLinksModalMaxHeightType', 'px');
            add_option('modalLinksModalDraggable', 'false');
            add_option('modalLinksModalResizable', 'false');
            add_option('modalLinksModalTitle', 'default');
            add_option('modalLinksModalShow', 'false');
            add_option('modalLinksModalHide', 'false');
            add_option('modalLinksModalType', 'true');
            add_option('modalLinksModalCloseIcon', 'true');
            add_option('modalLinksModalCloseEsc', 'true');
            add_option('modalLinksModalLoadingGif', 'gray32');
            add_option('modalLinksModalClass', '');
        }

        switch_to_blog($originalBlogId);

        add_site_option('modalLinksModalWidth', 0);
        add_site_option('modalLinksModalWidthType', 'px');
        add_site_option('modalLinksModalMaxHeight', 0);
        add_site_option('modalLinksModalMaxHeightType', 'px');
        add_site_option('modalLinksModalDraggable', 'false');
        add_site_option('modalLinksModalResizable', 'false');
        add_site_option('modalLinksModalTitle', 'default');
        add_site_option('modalLinksModalShow', 'false');
        add_site_option('modalLinksModalHide', 'false');
        add_site_option('modalLinksModalType', 'true');
        add_site_option('modalLinksModalCloseIcon', 'true');
        add_site_option('modalLinksModalCloseEsc', 'true');
        add_site_option('modalLinksModalLoadingGif', 'gray32');
        add_site_option('modalLinksModalClass', '');
    }//end if

}//end modalLinksActivate()


/**
 * On deactivation
 *
 * @return nothing
 */
function modalLinksDeactivate()
{

}//end modalLinksDeactivate()


/**
 * On uninstallation
 *
 * @return nothing
 */
function modalLinksUninstall()
{
    // For Single site.
    if (is_multisite() === false) {
        delete_option('modalLinksModalWidth');
        delete_option('modalLinksModalWidthType');
        delete_option('modalLinksModalMaxHeight');
        delete_option('modalLinksModalMaxHeightType');
        delete_option('modalLinksModalDraggable');
        delete_option('modalLinksModalResizable');
        delete_option('modalLinksModalTitle');
        delete_option('modalLinksModalShow');
        delete_option('modalLinksModalHide');
        delete_option('modalLinksModalType');
        delete_option('modalLinksModalCloseIcon');
        delete_option('modalLinksModalCloseEsc');
        delete_option('modalLinksModalLoadingGif');
        delete_option('modalLinksModalClass');
    } else {
        // For Multisite.
        global $wpdb;
        $blogIds        = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
        $originalBlogId = get_current_blog_id();
        foreach ($blogIds as $blogId) {
            switch_to_blog($blogId);
            delete_option('modalLinksModalWidth');
            delete_option('modalLinksModalWidthType');
            delete_option('modalLinksModalMaxHeight');
            delete_option('modalLinksModalMaxHeightType');
            delete_option('modalLinksModalDraggable');
            delete_option('modalLinksModalResizable');
            delete_option('modalLinksModalTitle');
            delete_option('modalLinksModalShow');
            delete_option('modalLinksModalHide');
            delete_option('modalLinksModalType');
            delete_option('modalLinksModalCloseIcon');
            delete_option('modalLinksModalCloseEsc');
            delete_option('modalLinksModalLoadingGif');
            delete_option('modalLinksModalClass');
        }

        switch_to_blog($originalBlogId);

        delete_site_option('modalLinksModalWidth');
        delete_site_option('modalLinksModalWidthType');
        delete_site_option('modalLinksModalMaxHeight');
        delete_site_option('modalLinksModalMaxHeightType');
        delete_site_option('modalLinksModalDraggable');
        delete_site_option('modalLinksModalResizable');
        delete_site_option('modalLinksModalTitle');
        delete_site_option('modalLinksModalShow');
        delete_site_option('modalLinksModalHide');
        delete_site_option('modalLinksModalType');
        delete_site_option('modalLinksModalCloseIcon');
        delete_site_option('modalLinksModalCloseEsc');
        delete_site_option('modalLinksModalLoadingGif');
        delete_site_option('modalLinksModalClass');
    }//end if

}//end modalLinksUninstall()


/**
 * Add settings link
 *
 * @param array  $links there is nothing to comment
 * @param string $file  there is nothing to comment
 *
 * @return $links
 */
function modalLinksSettingsLink($links, $file)
{
    $this_plugin = plugin_basename(dirname(__FILE__) . '/modal-links.php');

    if ($file == $this_plugin) {
        $settingsLink = '<a href="'
        .get_bloginfo('wpurl')
        .'/wp-admin/admin.php?page=modal_links">'
        .__('Settings', 'modal_links')
        .'</a>';
        array_unshift($links, $settingsLink);
    }

    return $links;

}//end modalLinksSettingsLink()


/**
 * Add modal dialog markup
 *
 * @return nothing
 */
function modalLinksModalMarkup()
{
    echo '<div id="modalLinksDialog"></div>';

}//end modalLinksModalMarkup()


/**
 * Hides Modal category from categories widget
 *
 * @param array $catArgs there is nothing to comment
 *
 * @return $catArgs
 */
function modalLinksCategoriesWidgetFilter($catArgs)
{
    $modalCategoryId = get_cat_ID('Modals');
    $excludeArr      = array($modalCategoryId);

    if (isset($catArgs['exclude']) === true
        && empty($catArgs['exclude']) === false
    ) {
        $excludeArr = array_unique(
            array_merge(
                explode(',', $catArgs['exclude']),
                $excludeArr
            )
        );
    }

    $catArgs['exclude'] = implode(',', $excludeArr);
    return $catArgs;

}//end modalLinksCategoriesWidgetFilter()


/**
 * Hides posts of Modal category from everywhere
 *
 * @param string $query there is nothing to comment
 *
 * @return nothing
 */
function modalLinksExcludeCategory($wp_query)
{
    $modalCategoryId = get_cat_ID('Modals');
    $excluded = array($modalCategoryId);

    if ((is_admin() === false)) {
        $wp_query->set('category__not_in', $excluded);
    }

}//end modalLinksExcludeCategory()


add_action('init', 'modalLinksLoadTextdomain');
register_activation_hook(__FILE__, 'modalLinksActivate');
register_deactivation_hook(__FILE__, 'modalLinksDeactivate');
register_uninstall_hook(__FILE__, 'modalLinksUninstall');
if (is_admin() === true) {
    add_filter('plugin_action_links', 'modalLinksSettingsLink', 10, 2);
}
add_action('wp_footer', 'modalLinksModalMarkup');
add_filter('widget_categories_args', 'modalLinksCategoriesWidgetFilter', 10, 1);
add_action('pre_get_posts', 'modalLinksExcludeCategory');

do_action('modalLinks');
