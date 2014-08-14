<?php
/*
Template Name: Store
*/

get_header(); ?>

<div class="main" role="main">
  <article class="page">
    <header>
      <h2>Store</h2>
    </header>
    <div class="grid">
    	<div class="grid-2-12">

    	</div>
    	<div class="grid-8-12">
    		<?php
   			if( is_single() ):
	    			echo '<a href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'">Back to Store</a>';
	    		endif;
    			woocommerce_content();
    		?>
    	</div>
    	<div class="grid-2-12 well cart">
				<?php
    				if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) :
    	    			woocommerce_mini_cart();
    	    		else:
                        ?>
                    	<h2>Your Cart!</h2>
    	    			<p>
							Waiting and willing to be filled with your orders.
                        </p>
                        <?php
    	    		endif;
        		?>
            </div>
    	</div>
    </div>



  </article>

</div><!-- /.main -->

<?php get_footer(); ?>
