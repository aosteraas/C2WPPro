<?php get_header(); ?>

<div class="container">
  <?php get_sidebar(); ?>
  <div class="span9">

<?php if ( have_posts() ) : ?>

    <div class="archives page-header"><h1>All Articles In <?php single_cat_title(); ?></h1></div>
    <section><?php echo category_description(); ?></section>


   <?php while ( have_posts() ) : the_post(); ?>
  <section <?php post_class(); ?>>
    <div class="page-header">
      <h1>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
      </h1>
      
    </div>
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