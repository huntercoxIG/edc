<?php get_template_part('includes/header'); ?>

<div class="container">
  <div class="row">
    
    <ul class="site-map">
      <?php $args = array(
        'authors'      => '',
        'child_of'     => 0,
        'date_format'  => get_option('date_format'),
        'depth'        => 3,
        'echo'         => 1,
        'exclude'      => '',
        'include'      => '',
        'link_after'   => '',
        'link_before'  => '',
        'post_type'    => 'page',
        'post_status'  => 'publish',
        'show_date'    => '',
        'sort_column'  => 'menu_order, post_title',
              'sort_order'   => '',
        'title_li'     => __('test'), 
        'walker'       => new Walker_Page
        ); 

      wp_list_pages($args)

      ?>
    </ul>

  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('includes/footer'); ?>
