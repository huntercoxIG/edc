<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

      <div id="sbl">
        <div class="sbl-section">
          <h2>404 - Page not found</h2>
        </div>
      </div>

      <div id="ct">
        <div id="sbr"><?php get_template_part('sbr'); ?></div>
        <h1>oops!</h1>
        <p>We can't find the page that you are looking for. The page may have changed, or the URL may be spelled incorrectly.</p>
        <p>Please use the search bar in the header, check the URL spelling, or feel free to email Renee &rarr;</p>
      </div><!-- #ct -->

<?php get_footer(); ?>