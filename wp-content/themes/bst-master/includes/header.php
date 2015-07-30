<!DOCTYPE html>
<html class="no-js">
<head>
	<title><?php wp_title('•', true, 'right'); bloginfo('name'); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--[if lt IE 8]>
<div class="alert alert-warning">
	You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
</div>
<![endif]-->

<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url('/'); ?>"><img src="/wp-content/themes/bst-master/img/edc-logo.png" alt=""></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
      <div class="top">

        <ul class="social">
          <li><img src="/wp-content/themes/bst-master/img/facebook-icon.png" alt=""></li>
          <li><img src="/wp-content/themes/bst-master/img/twitter-icon.png" alt=""></li>
          <li><img src="/wp-content/themes/bst-master/img/youtube-icon.png" alt=""></li>
        </ul>

        <?php get_template_part('includes/navbar-search'); ?>
      </div>
        
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->

</nav>


<div id="navigation">
  <div class="container">  
    <div class="row">
      <?php
        wp_nav_menu( array(
          'theme_location'    => 'navbar-left',
          'depth'             => 3,
          'menu_class'        => 'nav navbar-nav',
          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
          'walker'            => new wp_bootstrap_navwalker())
        );
      ?>
    </div>
  </div><!-- /.container -->  
</div><!-- /#navigation -->
<!--
Site Title
==========
If you are displaying your site title in the "brand" link in the Bootstrap navbar, 
then you probably don't require a site title. Alternatively you can use the example below. 
See also the accompanying CSS example in css/bst.css .

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1 id="site-title">
      	<a class="text-muted" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
      </h1>
    </div>
  </div>
</div>
-->
