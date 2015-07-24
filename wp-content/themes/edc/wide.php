<?php
/**
 *  Template Name: Wide
 */
get_header(); ?>



			<div id="wide">
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>
			</div><!-- #ct -->

<?php get_footer();?>
