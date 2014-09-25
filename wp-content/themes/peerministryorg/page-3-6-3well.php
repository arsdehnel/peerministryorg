<?php
/*
Template Name: 3-6-3well
*/

get_header(); ?>

<div class="main" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="page" id="post-<?php the_ID(); ?>">
    <header>
      <h2><?php the_title(); ?></h2>
    </header>
    <div class="grid">
    	<div class="grid-3-12 grid-sm-0-12">
		    <?php
			    $image_1 = get_field('image_1');
				if( is_array( $image_1 ) ):
					$images[] = $image_1;
				endif;
			    $image_2 = get_field('image_2');
				if( is_array( $image_2 ) ):
					$images[] = $image_2;
				endif;
			    $image_3 = get_field('image_3');
				if( is_array( $image_3 ) ):
					$images[] = $image_3;
				endif;

				foreach( $images as $image ):
					echo '<span class="image-wrapper">';
					echo '<img src="'.$image['sizes']['medium'].'" data-option-type="image" id="image-6" height="'.$image['sizes']['medium-height'].'" width="'.$image['sizes']['medium-width'].'">';
					echo '</span>';
				endforeach;

		    ?>
    	</div>
    	<div class="grid-6-12">
		    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
    	</div>
    	<div class="grid-3-12 well">
    		<header>
	    		<?php echo get_field('well_title'); ?>
    		</header>
    		<div class="well-contents">
				<?php echo get_field('well_content'); ?>
			</div>
    	</div>
    </div>



  </article>
  <?php endwhile; endif; ?>

</div><!-- /.main -->

<?php get_footer(); ?>
