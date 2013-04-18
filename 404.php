<?php get_header(); ?>
<div class="container">
  <?php get_sidebar(); ?>
  <div class="span9">
    <div class="page-header">
      <h1>
        Not Found
      </h1>
      <p>Apologies, but the page you requested could not be found.</p>
    </div>
    <section>
      <div class="span4">

      <h2>Popular Categories</h2>

      <ul>
        <?php wp_list_categories( array(
          'orderby' => 'count', //lists categories in order of which has the most posts
          'order' => 'DESC', //lists categories in descending order from most to least posts
          'show_count' => 1, //shows the number of posts in the category in brackets, set to 0 to disable
          'title_li' => '', //disables the title form being shown, as we've entered that ourselves.
          'number' => 10 //number of categories to display
             ) ); ?>
      </ul>

      </div>
        <div class="span4">

      <!-- <h2>Recent Posts</h2> -->

      <ul>
        <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

      </ul>

      </div>
    </section>
  </div>
</div>
<!-- closing .container -->
<?php get_footer(); ?>