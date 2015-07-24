<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
			<?php get_template_part('featured-image.php'); ?>

			<div id="sbl">
  			<div class="sbl-section">
				<?php do_action('edc_section_nav'); ?>
				</div>
			</div>

			<div id="ct">
				<div id="sbr"><?php get_template_part('sbr'); ?></div>
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>

			<?php // outputs the 'print to pdf' button
			if(function_exists('mpdf_pdfbutton')) mpdf_pdfbutton(true); ?>

			</div><!-- #ct -->

<?php get_footer(); ?>
