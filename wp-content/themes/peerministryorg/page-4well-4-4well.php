<?php
/*
Template Name: 4well-4-4well
*/

get_header(); ?>

<div class="main" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="page" id="post-<?php the_ID(); ?>">
    <header>
      <h2><?php the_title(); ?></h2>
    </header>
    <div class="grid">
    	<div class="grid-4-12 well">
    		<header>
	    		<?php echo get_field('well_title'); ?>
    		</header>
        	<div class="well-contents">
          		<?php echo get_field('well_content'); ?>
        	</div>
    	</div>
    	<div class="grid-4-12">
		    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
    	</div>
    	<div class="grid-4-12 well">
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
