<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
       Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/css/main.css") ?>

    <!-- Wordpress Templates require a style.css in theme root directory -->
    <?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."style.css") ?>

    <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
    <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/vendor/modernizr-2.6.1.min.js") ?>

    <!-- Wordpress Head Items -->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php register_nav_menus( array('main'		=> 'Main Menu'
  					  			   ,'footer'	=> 'Footer Menu' ) ); ?>

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
  <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
  <![endif]-->

  <div id="container">
    <header role="banner" class="site-header">
      <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    </header>
    <section class="image-carousels">
	    <?php
	    	//get all the images that have been indicated for this page's header
	    	$images = get_field('header_images');

			if( is_array( $images ) && count( $images ) > 0 ):
				foreach( $images as $image ):
					if( rand() % 2 == 1 ):
						$left_images[] = $image;
					else:
						$right_images[] = $image;
					endif;
				endforeach;
			endif;

			if( count( $left_images ) > 0 && shuffle( $left_images ) ):
				foreach( $left_images as $image ):
					$module_images[] = array('src' => $image['sizes']['medium'],
						'height' => $image['sizes']['medium-height'],
						'width' => $image['sizes']['medium-width'] );
				endforeach;
				$images_str = json_encode($module_images);
				?>
				<div class="image-module left" data-center='{"x":190,"y":160}' data-images='<?php echo $images_str; ?>'>
					<img class="current">
					<img class="loader">
				</div><!-- /.image-module.image-module-left -->
				<?php
			endif;
			if( count( $right_images ) > 0 && shuffle( $right_images ) ):
				unset($module_images);
				foreach( $right_images as $image ):
					$module_images[] = array('src' => $image['sizes']['medium'],
						'height' => $image['sizes']['medium-height'],
						'width' => $image['sizes']['medium-width'] );
				endforeach;
				$images_str = json_encode($module_images);
				?>
				<div class="image-module right" data-center='{"x":-190,"y":150}' data-images='<?php echo $images_str; ?>'>
					<img class="current">
					<img class="loader">
				</div><!-- /.image-module.image-module-right -->
				<?php
			endif;
  		?>
	</section>

    <?php
		$cur_id = get_the_id();
		$items = wp_get_nav_menu_items( 'main' );
		if( is_array( $items ) && count( $items ) ):
			echo '<nav class="nav-main">';
			foreach( $items as $item ):
				echo '<a href="'.$item->url.'"';
				if( $cur_id == $item->object_id ):
					echo ' class="active"';
				elseif( get_permalink( $cur_id ) == $item->url ):
					echo ' class="active"';
				endif;
				echo '>'.$item->title.'</a>';
			endforeach;
      global $woocommerce;
      if( sizeof( $woocommerce->cart->get_cart() ) > 0 ):
        echo '<a class="cart icon-cart" href="'.$woocommerce->cart->get_cart_url().'" title="View your shopping cart">Cart</a>';
      endif;
			echo '</nav>';
		endif;
    ?>
