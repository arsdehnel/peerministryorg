<?php
/*
Template Name: 3-6tabs-3well
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
    	<div class="grid-6-12 nav-tab-wrapper grid-sm-12-12">
		    <?php
				$args = array(
					'child_of' => get_the_id(),
					'post_type' => 'page',
					'sort_column' => 'menu_order',
					'sort_order' => 'ASC'
				);
				$pages = get_pages($args);

				if( is_array( $pages ) && count( $pages ) ):

					$tab_content = '<div class="tab-content-wrapper content">';

					echo '<nav class="tabs">';

					foreach( $pages as $page ):
						echo '<a href="#tab-content-'.$page->ID.'"';
						echo '>'.get_field('tab_name',$page->ID).'</a>';
						$tab_content .= '<div class="tab-content active" id="tab-content-'.$page->ID.'">';
						if( get_edit_post_link( $page->ID ) ):
							$tab_content .= '<a href="'.get_edit_post_link( $page->ID ).'" class="edit-post-link">EDIT THIS TAB</a>';
						endif;
						$tab_content .= $page->post_content.'</div>';
					endforeach;

					echo '</nav>';

					$tab_content .= '</div><!--/.tab-content-wrapper -->';

					echo $tab_content;

				endif;

		    ?>
    	</div>
    	<div class="grid-3-12 grid-sm-12-12 well content">
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
