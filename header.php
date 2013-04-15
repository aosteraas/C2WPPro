<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php bloginfo( 'name' ); ?><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/assets/ico/apple-touch-icon-57-precomposed.png">
  <?php wp_head(); ?>
  <?php if ( is_admin_bar_showing() ) {?>
    <style>
    .navbar-fixed-top { top: 28px !important; }
    </style>
  <?php
  }?>

  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">

    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php bloginfo( 'wpurl' ); ?>"><?php bloginfo( 'name' ); ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="<?php bloginfo( 'wpurl' ); ?>">Home</a>
              </li>
              <li class="active">
                <a href="./getting-started.html">Get started</a>
              </li>
              <li class="">
                <a href="./scaffolding.html">Scaffolding</a>
              </li>
              <li class="">
                <a href="./base-css.html">Base CSS</a>
              </li>
              <li class="">
                <a href="./components.html">Components</a>
              </li>
              <li class="">
                <a href="./javascript.html">JavaScript</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1><?php bloginfo( 'name' ); ?></h1>
    <p class="lead"><?php bloginfo( 'description' ); ?></p>
  </div>
</header>