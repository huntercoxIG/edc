<?php get_template_part('includes/header'); ?>

<!-- Featured Image -->
<?php get_template_part('featured-image.php'); ?>

<div id="main-section" class="container">
  <div class="row">
      <!-- Left Side Page Menu - Section Nav page links -->
      <div id="side-menu" class="col-md-3">
        <?php do_action('edc_section_nav'); ?>
      </div>

      <div id="ct" class="col-xs-12 col-md-9">
        
        <?php get_template_part('includes/loops/content', 'page'); ?>

        
        <?php  
          // This is the query for "staff" custom post type
          $args = array('post_type' => 'staff', 'order' => 'ASC' );
          $the_query = new WP_Query( $args );

          // The Loop
          if ( $the_query->have_posts() ) {
            echo '<ul class="staff-list">';

            while ( $the_query->have_posts() ) {
              $the_query->the_post(); ?>
              <li class="staff-member">
                <div class="row">
                  <div class="col-xs-3">
                    <div class="img-wrap">
                      <img src="<?php echo CFS()->get('staff_picture'); ?>" alt="<?php echo the_title(); ?>"> 
                    </div>  
                  </div>

                  <div class="col-xs-9">
                    <h3><?php the_title(); ?></h3>
                    <h4><?php echo CFS()->get('staff_title'); ?></h4>
                    <a href="MAILTO:<?php echo CFS()->get('staff_email'); ?>"><?php echo CFS()->get('staff_email'); ?></a>
                  </div>
                </div>
              </li>

           <?php }
            echo '</ul>';
          } else {
            // no posts found
          }
          /* Restore original Post Data */
          wp_reset_postdata();



          // outputs the 'print to pdf' button
          if(function_exists('mpdf_pdfbutton')) mpdf_pdfbutton(true); 
        ?>

        <div id="sbr"></div>
      </div>
    
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('includes/footer'); ?>