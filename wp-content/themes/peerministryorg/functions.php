<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

//WooCommerce
add_theme_support( 'woocommerce' );
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'hook_woocommerce_in_cart_product_thumbnail', 'woocommerce_cart_thumb', 50 );
add_filter( 'wp_link_query_args', 'peerministry_link_types' );
add_filter( 'woocommerce_product_tabs', 'remove_additional_info_tab', 99 );
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 50;' ), 20 );

function remove_additional_info_tab( $tabs ){
	if( is_array( $tabs ) && array_key_exists( 'additional_information', $tabs ) ){
		unset( $tabs['additional_information'] );
	}
	return $tabs;
}

function peerministry_link_types( $query ){

	$post_types = $query['post_type'];
	unset($post_types[array_search('simplemodal',$post_types)]);
	$query['post_type'] = $post_types;

	$query['post_status'] = array('publish','inherit');
	return $query;
}

// Custom HTML5 Comment Markup
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li>
     <article <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
       <header class="comment-author vcard">
          <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
          <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
          <time><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a></time>
          <?php edit_comment_link(__('(Edit)'),'  ','') ?>
       </header>
       <?php if ($comment->comment_approved == '0') : ?>
          <em><?php _e('Your comment is awaiting moderation.') ?></em>
          <br />
       <?php endif; ?>

       <?php comment_text() ?>

       <nav>
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
       </nav>
     </article>
    <!-- </li> is added by wordpress automatically -->
<?php
}

function woocommerce_cart_thumb( $imgElem ){
  $pattern = '/(width|height)="[0-9]*"/i';
  return preg_replace($pattern, "", $imgElem);
}

automatic_feed_links();

register_nav_menus( array(
  'main'   => 'Main Menu',
  'footer' => 'Footer Menu'
) );

// Widgetized Sidebar HTML5 Markup
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<section>',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

// Custom Functions for CSS/Javascript Versioning
$GLOBALS["TEMPLATE_URL"] = get_bloginfo('template_url')."/";
$GLOBALS["TEMPLATE_RELATIVE_URL"] = wp_make_link_relative($GLOBALS["TEMPLATE_URL"]);

// Add ?v=[last modified time] to style sheets
function versioned_stylesheet($relative_url, $add_attributes=""){
  echo '<link rel="stylesheet" href="'.versioned_resource($relative_url).'" '.$add_attributes.'>'."\n";
}

// Add ?v=[last modified time] to javascripts
function versioned_javascript($relative_url, $add_attributes=""){
  echo '<script src="'.versioned_resource($relative_url).'" '.$add_attributes.'></script>'."\n";
}

// Add ?v=[last modified time] to a file url
function versioned_resource($relative_url){
  $file = $_SERVER["DOCUMENT_ROOT"].$relative_url;
  $file_version = "";

  if(file_exists($file)) {
    $file_version = "?v=".filemtime($file);
  }

  return $relative_url.$file_version;
}

if( !is_admin()){
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"), false, '1.11.0', true);
	wp_enqueue_script('jquery');
	wp_enqueue_script('theme-plugins',$GLOBALS["TEMPLATE_RELATIVE_URL"]."js/plugins.js", false, '1', true);
	wp_enqueue_script('spinjs',$GLOBALS["TEMPLATE_RELATIVE_URL"]."js/vendor/spin.min.js", false, '2.0.1', true);
	wp_enqueue_script('theme-main',$GLOBALS["TEMPLATE_RELATIVE_URL"]."js/main.js", false, '1', true);
}