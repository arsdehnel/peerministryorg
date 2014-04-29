<?php
/*
Template Name: Store
*/

get_header(); ?>

<main role="main">
  <article class="page">
    <header>
      <h2>Store</h2>
    </header>
    <div class="grid">
    	<div class="grid-2-12">
    		Store FAQs, featured items, process flow, etc.
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
    	    			<p>
                            Currently your cart has no items in it.  Select an item's "Add To Cart" yellow button in the item listing in the middle of this page to add an item to your cart.
                        </p>
                        <?php
    	    		endif;
        		?>
            </div>
    	</div>
    </div>
  
    

  </article>

</main>

<?php get_footer(); ?>
