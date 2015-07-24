<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="keywords" content="site selector, industrial park, economic development, wayne county, richmond indiana, edc, workforce, community development, workforce development, regional distribution, manufacturing, Information Technology, Life Science, Biotechnology, Biomedical">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  global $page, $paged;

    wp_title( '|', true, 'right' );
    bloginfo( 'name' );

    $site_description = get_bloginfo( 'description', 'display' );

    if ( $site_description && ( is_home() || is_front_page() ) ) {
      echo " | $site_description";
    }

    if ( $paged >= 2 || $page >= 2 ) {
      echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
    }
    ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/yui-reset-base.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
  <!--[if IE 6]>
    <link  rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie6.css">
  <![endif]-->
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <?php wp_head(); ?>
</head>

<body <?php body_class('section-'.EdcMenu::getSectionSlug()); ?>>
  <div id="pg">
    <div id="hd">
      <div id="banner">
        <a id="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"></a>

        <ul class="social">
          <li><a class="linkedin" target="_blank" href="http://www.linkedin.com/company/economic-development-corporation-of-wayne-county-in"><img src="/wp-content/themes/edc/images/linkedin.png"></a></li>
          <li><a class="twitter" target="_blank" href="https://twitter.com/EDCofWayneCo"><img src="/wp-content/themes/edc/images/twitter.png"></a></li>
          <li><a class="rss" target="_blank" href="/feed"><img src="/wp-content/themes/edc/images/rss.png"></a></li>
        </ul>

        <div id="search"><?php get_search_form(); ?></div>
      </div>
      <div class="m_navContainer">
        <!-- This is the mobile menu control. Should be in the menu file.  -->
          <input type="checkbox" class="menuctl" id="button" />
          <label for="button" class="menuctl" onclick>&equiv;</label>
          <a href="/" class="m_homeLink"><img src="/wp-content/themes/edc/images/home.png" /></a>
        <?php do_action('edc_page_menu'); ?>
      </div>
    </div>


  <!-- Optional featured image banner size -->
    <?php

      if ( has_post_thumbnail() ) {
        echo '<div class="banner">';
          echo the_post_thumbnail('banner');
        echo '</div>';
      }
      else {
      }

    ?>
  <div id="bd">
