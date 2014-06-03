<?php

if (defined('MODALLINKS') === false) {
    exit;
}


/**
 * Shortcode
 *
 * @param array  $atts    nothing to comment here
 * @param string $content nothing to comment here
 *
 * @return html link
 */
function modalLinksShortcode($atts, $content = null)
{
    extract(
        shortcode_atts(
            array(
             'id'        => '',
             'category'  => '',
             'permalink' => '',
             'title'     => '',
             'login'     => '',
             'action'    => '',
            ),
            $atts
        )
    );

    // If content is whitespaces, replace them.
    if ($content) {
        $content = preg_replace('/\s\s+/', '', $content);
    }

    if ($content == ' ') {
        $content = '';
    }

    $shortcode = '<a';

    if ($id) {
        $shortcode .= ' target="_modal" id="'.$id.'" href="#"';
        if ($title == 'true' || $title == 'false') {
            $shortcode .= ' data-title="'.$title.'"';
        }

        if ($content) {
            $shortcode .= ">$content</a>";
        } else {
            $shortcode .= ">$id</a>";
        }
    } else if ($permalink) {
        $shortcode .= ' target="_modal" href="'.$permalink.'"';
        if ($title == 'true' || $title == 'false') {
            $shortcode .= ' data-title="'.$title.'"';
        }

        if ($content) {
            $shortcode .= ">$content</a>";
        } else {
            $shortcode .= ">$permalink</a>";
        }
    } else if ($login == 'true') {
        $shortcode .= ' target="_modal" href="#" data-login="true"';
        if ($action == 'register') {
            $shortcode .= ' data-action="'.$action.'"';
            if ($title == 'true' || $title == 'false') {
                $shortcode .= ' data-title="'.$title.'"';
            }

            if ($content) {
                $shortcode .= ">$content</a>";
            } else {
                $shortcode .= '>'.__('Register', 'modal_links').'</a>';
            }
        } else {
            if (is_user_logged_in()) {
                $shortcode .= ' data-action="logout"';
                if ($title == 'true' || $title == 'false') {
                    $shortcode .= ' data-title="'.$title.'"';
                }

                if ($content) {
                    $shortcode .= ">$content</a>";
                } else {
                    $shortcode .= '>'.__('Logout', 'modal_links').'</a>';
                }
            } else {
                if ($title == 'true' || $title == 'false') {
                    $shortcode .= ' data-title="'.$title.'"';
                }

                if ($content) {
                    $shortcode .= ">$content</a>";
                } else {
                    $shortcode .= '>'.__('Login', 'modal_links').'</a>';
                }
            }//end if
        }//end if
    } else {
        if (has_filter('modalLinksShortcode')) {
            $shortcode .= apply_filters('modalLinksShortcode', '', $atts, $content);
        } else {
            $shortcode .= ' href="#">'
            .__('Modal Links Shortcode Error!', 'modal_links')
            .'</a>';
        }
    }//end if

    return $shortcode;

}//end modalLinksShortcode()


add_shortcode('modalLinks', 'modalLinksShortcode');
