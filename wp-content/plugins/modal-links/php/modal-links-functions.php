<?php

if (defined('MODALLINKS') === false) {
    exit;
}


/**
 * Get the absolute path of a plugin
 *
 * @param string $plugins_url nothing to comment here
 *
 * @return absolute path of a plugin
 */
function modalLinksGetPluginAbsPath($plugins_url)
{
    $serverHost    = $_SERVER['HTTP_HOST'];
    $serverDocRoot = $_SERVER['DOCUMENT_ROOT'];
    $pluginPath    = plugins_url($plugins_url, '');
    $pluginPath    = str_replace('http://'.$serverHost, '', $pluginPath);
    $pluginPath    = str_replace('https://'.$serverHost, '', $pluginPath);
    $pluginAbsPath = $serverDocRoot.$pluginPath;

    return $pluginAbsPath;

}//end modalLinksGetPluginAbsPath()


/**
 * Send post id and get post title and content
 *
 * @return post title and content
 */
function modalLinksPostIdToPostInfo($postID)
{
    // Get post type.
    $postType = get_post_type($postID);

    switch($postType) {
        // Post.
        case 'post':
            $post         = get_post($postID);
            $modalTitle   = $post->post_title;
            $modalContent = $post->post_content;
            break;
        // Page.
        case 'page':
            $page         = get_page($postID);
            $modalTitle   = $page->post_title;
            $modalContent = $page->post_content;
            break;
        // Attachment.
        case 'attachment':
            $modalTitle   = __(
                'Modal Links Error', 'modal_links'
            );
            $modalContent = __(
                'Modal Links does not support attachments', 'modal_links'
            );
            break;
        // Revision.
        case 'revision':
            $modalTitle   = __(
                'Modal Links Error', 'modal_links'
            );
            $modalContent = __(
                'Modal Links does not support revisions', 'modal_links'
            );
            break;
        // Navigation Menu Item.
        case 'nav_menu_item':
            $modalTitle   = __(
                'Modal Links Error', 'modal_links'
            );
            $modalContent = __(
                'Modal Links does not support navigation menus', 'modal_links'
            );
            break;
        default:
            $modalTitle   = __(
                'Modal Links Error', 'modal_links'
            );
            $modalContent = __(
                'Modal Links plugin works for posts and pages only',
                'modal_links'
            );
            break;
    }//end switch

    $postInfo = array(
                 'modalTitle'   => $modalTitle,
                 'modalContent' => $modalContent,
                );

    return $postInfo;

}//end modalLinksPostIdToPostInfo()


/**
 * Send post url and get post id
 *
 * @param string $postUrl nothing to comment here
 *
 * @return post id
 */
function modalLinksPostUrlToPostId($postUrl)
{
    $url               = html_entity_decode($postUrl);
    $url               = urldecode($url);
    $permalink         = explode('/', $url);
    $permalinkEnd      = end($permalink);
    $permalinkStart    = $permalink[0];
    $permalinkSettings = get_option('permalink_structure', '');
    $permalinkSize     = count($permalink);

    // Remove empty items at the start and the end of array.
    if (empty($permalinkEnd) === true) {
        array_pop($permalink);
    }

    if (empty($permalinkStart) === true) {
        array_shift($permalink);
    }

    switch($permalinkSettings) {
        // Default.
        case '':
            $url = end($permalink);
            break;
        // Day and name.
        case '/%year%/%monthnum%/%day%/%postname%/':
            $permalink = array_splice($permalink, $permalinkSize - 5, 4);
            $url       = implode('/', $permalink);
            break;
        // Month and name.
        case '/%year%/%monthnum%/%postname%/':
            $permalink = array_splice($permalink, $permalinkSize - 4, 3);
            $url       = implode('/', $permalink);
            break;
        // Numeric.
        case '/archives/%post_id%':
            $permalink = array_splice($permalink, $permalinkSize - 2);
            $url       = implode('/', $permalink);
            break;
        // Post name.
        case '/%postname%/':
            end($permalink);
            $url = prev($permalink);
            break;
        default:
            $url = false;
            break;
    }//end switch

    if (!$url) {
        return;
    }

    $postId = url_to_postid($url);

    if (!$postId) {
        return;
    }

    return $postId;

}//end modalLinksPostUrlToPostId()


/**
 * Get the content select
 *
 * @param string $selectId       nothing to comment here
 * @param string $selectSelected nothing to comment here
 *
 * @return nothing
 */
function modalLinksGetModalContentDropdown($selectId, $selectSelected)
{
    $posts = get_posts(array('post_type' => 'post'));
    $pages = get_posts(array('post_type' => 'page'));

    echo '<select name="'.$selectId.'" id="'.$selectId.'"
autocomplete="off" name="post">'
            .'<option value="">'.__('Select Content', 'modal_links').'</option>'
        .'<optgroup label="'.__('Posts', 'modal_links').'">';

    foreach ($posts as $post) {
        if (in_category('Modals', $post->ID) == false) {
            if ($selectSelected && ($post->ID == $selectSelected)) {
                echo '<option value="'.$post->ID.'" selected="selected">'
                    .$post->post_title
                    .'</option>';
            } else {
                echo '<option value="'.$post->ID.'">'
                    .$post->post_title
                    .'</option>';
            }
        }
    }

    echo '</optgroup>'
        .'<optgroup label="'.__('Modals', 'modal_links').'">';

    foreach ($posts as $post) {
        if (in_category('Modals', $post->ID) == true) {
            if ($selectSelected && ($post->ID == $selectSelected)) {
                echo '<option value="'.$post->ID.'" selected="selected">'.
                        $post->post_title.'
                    </option>';
            } else {
                echo '<option value="'.$post->ID.'">'.
                        $post->post_title.'
                    </option>';
            }
        }
    }

    echo '</optgroup>'
        .'<optgroup label="'.__('Pages', 'modal_links').'">';

    foreach ($pages as $page) {
        if ($selectSelected && ($page->ID == $selectSelected)) {
            echo '<option value="'.$page->ID.'" selected="selected">'.
                    $page->post_title.'</option>';
        } else {
            echo '
                <option value="'.$page->ID.'">'.$page->post_title.'</option>';
        }
    }

    echo '</optgroup>';
    echo '<optgroup label="'
        .__('Forms', 'modal_links')
        .'">';
    if ($selectSelected && ('login' === $selectSelected)) {
        echo '<option value="login" selected="selected">Login/Logout</option>';
    } else {
        echo '<option value="login">Login/Logout</option>';
    }

    if ($selectSelected && ('register' === $selectSelected)) {
        echo '<option value="register" selected="selected">Register</option>';
    } else {
        echo '<option value="register">Register</option>';
    }
    echo '</optgroup>'
    .'</select>';

}//end modalLinksGetModalContentDropdown()


/**
 * Get the title select
 *
 * @param string $selectId nothing to comment here
 *
 * @return nothing
 */
function modalLinksGetModalTitleDropdown($selectId)
{
    echo '
        <select name="'.$selectId.'" id="'.$selectId.'"
        autocomplete="off" name="title">'.'
            <option value="">'.__('Show title?', 'modal_links').'</option>'.'
            <option value="true">'.__('Yes', 'modal_links').'</option>'.'
            <option value="false">'.__('No', 'modal_links').'</option>'.'
        </select>';

}//end modalLinksGetModalTitleDropdown()


do_action('modalLinksFunctions');
