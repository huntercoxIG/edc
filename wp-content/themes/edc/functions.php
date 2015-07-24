<?php


add_theme_support( 'post-thumbnails' );

  /*
  * Modifying TinyMCE editor to remove unused items.
  */




  function customformatTinyMCE($init) {
    // Add block format elements you want to show in dropdown
    $init['theme_advanced_blockformats'] = 'p,h3,h4,h5,h6';
    //$init['theme_advanced_disable'] = 'strikethrough,underline,forecolor,justifyfull';

    return $init;
  }

  add_filter('tiny_mce_before_init', 'customformatTinyMCE' );


  function slide_post_type() {
      $labels = array(
          'name'                => _x( 'Slides', 'Post Type General Name', 'text_domain' ),
          'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'text_domain' ),
          'menu_name'           => __( 'Slides', 'text_domain' ),
          'parent_item_colon'   => __( 'Parent Slide:', 'text_domain' ),
          'all_items'           => __( 'All Slides', 'text_domain' ),
          'view_item'           => __( 'View Slide', 'text_domain' ),
          'add_new_item'        => __( 'Add New Slide', 'text_domain' ),
          'add_new'             => __( 'Add New', 'text_domain' ),
          'edit_item'           => __( 'Edit Slide', 'text_domain' ),
          'update_item'         => __( 'Update Slide', 'text_domain' ),
          'search_items'        => __( 'Search Slide', 'text_domain' ),
          'not_found'           => __( 'Not found', 'text_domain' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
      );
      $args = array(
          'label'               => __( array('slides','slide'), 'text_domain' ),
          'description'         => __( 'For news stories that relate specifically to Reid', 'text_domain' ),
          'labels'              => $labels,
          'supports'            => array( 'title' ),
          'taxonomies'          => array( ),
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'menu_icon'           => 'dashicons-format-image',
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'post',
      );
      register_post_type( 'slide', $args );
  }

  add_action( 'init', 'slide_post_type', 0 );

  add_image_size( banner, 1024, 300, true );
?>