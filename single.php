<?php get_header(); ?>
<main>
	<?php if ( have_posts () ) : while (have_posts()):the_post(); ?>
		<article id="post_<?php echo $post->ID; ?>">
			<?php the_content(); ?>
		</article>
	<?php endwhile; ?>
<?php endif; ?> 	
</main>
<?php get_footer(); ?>