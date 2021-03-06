<?php get_header(); ?>

<div class="container">
  <?php get_sidebar(); ?>
  <div class="span9">

<?php if ( have_posts() ) : ?>

    <div class="archives page-header"><h1>All Posts By: <?php echo get_the_author() ?></h1></div>
    <?php get_template_part( 'author', 'single' ); ?>

   <?php while ( have_posts() ) : the_post(); ?>
  <section <?php post_class(); ?>>
    <div class="page-header">
      <h1>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
      </h1>
      <small>
        By <?php the_author_posts_link(); ?>,
         in <?php the_category(', '); //separated by a commma and space ?>,
         on <?php the_time('F j, Y'); //DD Month, YYYY format dates ?>
       </small>
    </div>
    <?php the_excerpt(); ?>
      <a class="btn btn-small pull-right" href="<?php the_permalink(); ?>" >Continue Reading <i class="icon-hand-right"></i></a>
  </section>

  <?php endwhile; ?>

  <!-- START PAGINATION -->
    <section>
      <ul class="pager">
        <li class="previous"><?php previous_posts_link('« Previous Page') ?></li>
        <li class="next"><?php next_posts_link('Next Page »') ?></li>
      </ul>
    </section>
  <!-- END PAGINATION -->
<?php endif; ?>
  </div><!-- closing .row -->
</div>
<!-- closing .container -->
<?php get_footer(); ?>