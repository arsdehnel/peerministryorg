<?php
/*
Template Name: Checkout
*/

get_header(); ?>

<div class="main" role="main">
  <article class="page">
    <header>
      <h2>Store</h2>
    </header>
    <div class="grid">
    	<div class="grid-2-12">
    		Payment options? Upsells?
            or maybe something else?
    	</div>
    	<div class="grid-8-12 cart-wrapper">
    		<?php
    			if (have_posts()) : while (have_posts()) : the_post();
    				the_content('<p class="serif">Read the rest of this page &raquo;</p>');
				endwhile; endif;
			?>
    	</div>
        <div class="grid-2-12 well cart">
            <header>Download instructions?</header>
            <div class="well-contents">
                <p>something about how it's going to work when they're done</p>
            </div>
        </div>
    </div>



  </article>

</div><!-- /.main -->

<?php get_footer(); ?>
