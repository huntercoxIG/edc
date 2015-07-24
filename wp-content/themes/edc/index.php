<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

			<div id="sbl">
			  <div class="sbl-section">
			  <?php do_action('edc_section_nav'); ?>
			  </div>
			</div>

			<div id="ct">
				<div id="sbr"><?php get_template_part('sbr'); ?></div>
				<?php
				is_home();
				/* Run the loop to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-index.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'index' );
				?>
			</div><!-- #ct -->

<?php get_footer(); ?>
