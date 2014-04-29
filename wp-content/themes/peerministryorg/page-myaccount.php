<?php
/*
Template Name: My Account
*/

get_header(); ?>

<main role="main">
  <article class="page">
    <header>
      <h2>My Account</h2>
    </header>
    <div class="grid">
        <?php
    		if (have_posts()) : while (have_posts()) : the_post();
    			the_content('<p class="serif">Read the rest of this page &raquo;</p>');
    		endwhile; endif;
        ?>
    </div>
  </article>

</main>

<?php get_footer(); ?>
