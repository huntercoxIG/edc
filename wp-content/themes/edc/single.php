<?php
/**
 * The Template for displaying all single posts.
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
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop-single', 'page' );
			?>

			<?php // outputs the 'print to pdf' button
			if(function_exists('mpdf_pdfbutton')) mpdf_pdfbutton(true); ?>

			</div><!-- #ct -->

<?php get_footer(); ?>
