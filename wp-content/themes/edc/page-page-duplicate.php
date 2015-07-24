<?php

/*
Template Name: Duplicate of Living in Wayne Co
*/

get_header(); ?>

			<div id="sbl">
  			<div class="sbl-section">
				<?php do_action('edc_section_nav'); ?>
				</div>
			</div>

			<div id="ct">
				<div id="sbr"><?php get_template_part('sbr'); ?></div>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php 
						$src_page = 29;  // Would like to make this obtainable from the duplicatepage shortcode or maybe a custom field. 

						$id=$src_page; 
						$post = get_post($id);
					?>
					<h1 class="entry-title"><?php echo apply_filters('the_title', $post->post_title);  ?></h1>
					<div class="entry-content">
						<?php 
							echo apply_filters('the_content', $post->post_content); 
						?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
			</div><!-- #ct -->

<?php get_footer(); ?>
