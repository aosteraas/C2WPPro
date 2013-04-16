<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p>This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<h3><?php comments_number('No Comments', 'One Comment', '% Comments' );?> on "<?php the_title(); ?>"</h3>
		
		<ul class="media-list">
			<?php wp_list_comments('type=comment&callback=wppro_comments'); ?>
		</ul>
		<?php paginate_comments_links(); ?>
		<?php if ( comments_open() ) : ?>
			<?php comment_form(); ?>
		<?php endif; ?>
	<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
		<?php comment_form(); ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		Comments are Closed
		<!-- If comments are closed. -->
	<?php endif; ?>
<?php endif; ?>