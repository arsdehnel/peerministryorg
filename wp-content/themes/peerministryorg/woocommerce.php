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
    				echo '<header>';
    				echo 'Your Cart';
    				echo '</header>';
	    			woocommerce_mini_cart();
	    		endif;
    			/*
    			
    			if( $woocommerce->cart->cart_contents_count > 0 ):
	    			global $woocommerce; 
	    			foreach( $woocommerce->cart->cart_contents as $item ):			//item is an array
	    				echo '<div>Product ID: '.$item['product_id'].'</div>';
	    				echo '<div>Variation ID: '.$item['variation_id'].'</div>';
	    				echo '<div>Print Qty: '.$item['variation']['Print Quantity'].'</div>';
	    				echo '<div>Product: '.$item['data']->post->post_title.'</div>';
	    				echo '<div>Price: '.$item['data']->price.'</div>';
	    				/*
	    				print_r( $item['data']->post );
	    				foreach( $item as $key => $value ):
	    					if( !is_object( $value ) ):
			   					echo '<div>'.$key.': '.$value.'</div>';
	    					else:
			   					echo '<div>'.$key.': '.$value->post->post_title.' is object</div>';
	    						//print_r( $value->post );
	    						foreach( $value as $key => $value ):
				   					echo '<div>'.$key.'</div>';
	    						endforeach;
			   					echo '<div>'.$key.' is object</div>';
	    					endif;
							echo '<hr>';
	    				endforeach;
	    				//var_dump( $item->data );
	    				echo '<hr>';
	    				echo '<hr>';
	    				echo '<hr>';
	    				echo '<hr>';
	    			endforeach;
	    		endif;
	    		
	    		*/
	    		
    		?>
    	</div>
    </div>
  
    

  </article>

</main>

<?php get_footer(); ?>
