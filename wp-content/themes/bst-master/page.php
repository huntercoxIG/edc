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
        
        <?php // outputs the 'print to pdf' button
      if(function_exists('mpdf_pdfbutton')) mpdf_pdfbutton(true); ?>
        <div id="sbr">
          
          <?php get_template_part('includes/sidebar'); ?>
        </div>
      </div>
    
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('includes/footer'); ?>