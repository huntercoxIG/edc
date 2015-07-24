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

      <div id="sbl">
        <div class="sbl-section">
        <?php do_action('edc_section_nav'); ?>
        </div>
      </div>

      <div id="ct">
      <?php
        wp_list_pages();
      ?>
      </div><!-- #ct -->

<?php get_footer(); ?>
