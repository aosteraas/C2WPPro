<?php get_header('home'); ?>

  <body <?php body_class(); ?>>



   <!-- NAVBAR
    ================================================== -->
    <!-- Wrap the .navbar in .container to center it on the page and provide easy way to target it with .navbar-wrapper. -->
    <div class="container navbar-wrapper">

      <div class="navbar navbar-inverse">
        <div class="navbar-inner">
          <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php bloginfo( 'wpurl' ); ?>"><?php bloginfo( 'name' ); ?></a> 
          <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
          <div class="nav-collapse collapse">
            <?php wp_nav_menu( array(
              'container'       => 'false', 
              'menu_class'      => 'nav', 
              ) )?>
          </div><!--/.nav-collapse -->
        </div><!-- /.navbar-inner -->
      </div><!-- /.navbar -->

    </div><!-- /.container -->



    <!-- Carousel
    ================================================== -->

<div id="myCarousel" class="carousel slide">
  <div class="carousel-inner">
    <?php 
     $featured_query = new WP_Query(array(
      'tag' => 'featured', 
      'posts_per_page' => 1 
      )); 
     while ($featured_query->have_posts() ) : 
            $featured_query->the_post();
    ?>
    <div class="item active">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'featured' ); } ?>
                <div class="container">
      <div class="carousel-caption">
        <h1><?php the_title(); ?></h1>
        <p class="lead"><?php the_excerpt();?></p>
        <a class="btn btn-large btn-primary" href="<?php the_permalink(); ?>">Read More</a>
      </div>
    </div>
     </div><!-- item active -->
  <?php 
   endwhile; 
   wp_reset_postdata();
  ?>
        <?php 
   $featured_query = new WP_Query(array(
    'tag' => 'featured', 
    'posts_per_page' => 4, 
    'offset' => 1 
    )); 
   while ( $featured_query->have_posts() ) : 
           $featured_query->the_post();
  ?>
<div class="item">
  <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'featured' ); } ?>
  <div class="container">
    <div class="carousel-caption">
      <h1>
        <?php the_title(); ?></h1>
      <p class="lead">
        <?php the_excerpt();?></p>
      <a class="btn btn-large btn-primary" href="<?php the_permalink(); ?>">Read More</a>
    </div>
  </div>
</div>
<?php 
   endwhile; 
   wp_reset_postdata();
  ?>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <?php $featurettes = new WP_Query(array('posts_per_page' => 6));
        while ($featurettes->have_posts() ) :
                $featurettes->the_post();
              ?>
        <div class="span4">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'featurette' ); } ?>
          <!-- <img class="img-circle" src="http://placehold.it/140x140"> -->
          <h2><?php the_title(); ?></h2>
          <p><?php the_excerpt(); ?></p>
          <p><a class="btn" href="<?php the_permalink();?>">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        <?php
          endwhile;
          wp_reset_postdata();
          ?>
      </div><!-- /.row -->

      <!-- START THE FEATURETTES -->
<!-- 
      <hr class="featurette-divider">

      <div class="featurette">
        <img class="featurette-image pull-right" src="<?php echo get_template_directory_uri(); ?>/assets/img/examples/browser-icon-chrome.png">
        <h2 class="featurette-heading">First featurette headling. <span class="muted">It'll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>

      <hr class="featurette-divider">

      <div class="featurette">
        <img class="featurette-image pull-left" src="<?php echo get_template_directory_uri(); ?>/assets/img/examples/browser-icon-firefox.png">
        <h2 class="featurette-heading">Oh yeah, it's that good. <span class="muted">See for yourself.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>

      <hr class="featurette-divider">

      <div class="featurette">
        <img class="featurette-image pull-right" src="<?php echo get_template_directory_uri(); ?>/assets/img/examples/browser-icon-safari.png">
        <h2 class="featurette-heading">And lastly, this one. <span class="muted">Checkmate.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>

      <hr class="featurette-divider"> -->

      <!-- /END THE FEATURETTES -->
<?php get_footer(); ?>