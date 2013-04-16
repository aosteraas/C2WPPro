<?php get_header(); ?>
<div class="container">
  <?php get_sidebar(); ?>
  <div class="span9">
  <?php while ( have_posts() ) : the_post(); ?>
  <section <?php post_class(); ?>>
    <div class="page-header">
      <h1>
        <?php the_title(); ?>
      </h1>
      <small>
        By <?php the_author_posts_link(); ?>,
         in <?php the_category( ', ' ); //separated by a commma and space ?>,
         on <?php the_time( 'F j, Y' ); //DD Month, YYYY format dates ?>
       </small>
    </div>
    <?php the_content(); ?>
  </section>
  <section class="tags">
    <?php the_tags(); ?>
  </section>
  <!-- START POSTS NAVIGATION -->
    <section>
      <ul class="pager">
        <li class="previous">
          <?php previous_post_link( '%link' ); ?>
        </li>
        <li class="next">
          <?php next_post_link( '%link' ); ?>
        </li>
      </ul>
    </section>
    <!-- END POSTS NAVIGATION -->
    <!-- BEGIN COMMENTS -->
    <section class="comments">
      <?php comments_template(); ?>
    </section>
    <!-- END COMMENTS -->
  <?php endwhile; ?>
  </div>
</div>
<!-- closing .container -->
<?php get_footer(); ?>