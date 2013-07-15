<section class="well well-small">
	<h4>About <?php the_author(); ?></h4>
	<div class="pull-left author-gravatar">
		<?php echo get_avatar(get_the_author_meta( 'ID' ), 64); ?>
	</div>

	<div class="author-meta">
		<p><?php the_author_meta('description'); ?></p>
		<ul class="inline">
			<li><a href="<?php the_author_meta('user_url'); ?>"><i class="icon-globe"></i> Website</a></li>
			<li><a href="<?php the_author_meta('twitter'); ?>"><i class="icon-twitter-sign"></i> Twitter</a></li>
			<li><a href="<?php the_author_meta('facebook'); ?>"><i class="icon-facebook-sign"></i> Facebook</a></li>
	</ul>
	</div>

</section>