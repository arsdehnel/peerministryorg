<?php
/*
Template Name: Home
*/

get_header(); ?>

<div class="main" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="page" id="post-<?php the_ID(); ?>">
    <header>
      <h2><?php the_title(); ?></h2>
    </header>
    <div class="grid">
    	<div class="grid-9-12">
		    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
    	</div>
    	<div class="grid-3-12 panel-well">
    		<div class="panel panel-blue">
    			<header>
    				<?php echo get_field('panel_1_label'); ?>
    			</header>
    			<div class="panel-content">
    				<?php echo get_field('panel_1'); ?>
    			</div>
    		</div>
    		<div class="panel panel-green">
    			<header>
    				<?php echo get_field('panel_2_label'); ?>
    			</header>
    			<div class="panel-content">
    				<?php echo get_field('panel_2'); ?>
    			</div>
    		</div>
    		<div class="panel panel-yellow">
    			<header>
    				<?php echo get_field('panel_3_label'); ?>
    			</header>
    			<div class="panel-content">
    				<?php echo get_field('panel_3'); ?>
    			</div>
    		</div>
    		<div class="panel panel-orange">
    			<header>
    				<?php echo get_field('panel_4_label'); ?>
    			</header>
    			<div class="panel-content">
    				<?php echo get_field('panel_4'); ?>
    			</div>
    		</div>
    	</div>
    </div>



  </article>
  <?php endwhile; endif; ?>

</div><!-- /.main -->

<?php get_footer(); ?>
