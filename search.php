<?php get_header(); ?>
<main>
	<div class="wrap">
		<div class="results">
		<?php if (have_posts()): while (have_posts()) : the_post();?>
			<article id="post_<?php echo $post->ID; ?>">
				<div>
					<div class="thumb" style='background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>);'><!-- --></div>
					<h2><?php echo get_the_title(); ?></h2>
					<p>
						<?php 
							echo "<b>".get_post_meta($post->ID, "Cidade", true)." - ".get_post_meta($post->ID, "Bairro", true)."</b><br/>".get_post_meta($post->ID, "Tipo", true);
							echo "<br/><br/>".get_the_excerpt();
						?>
					</p>
				</div>
			</article>
		<?php endwhile; ?> 
		</div>
		<?php else: ?>
		<h4>Desculpe! Não encontramos restultados para <b><?php the_search_query(); ?></b>.</h4>
		<?php endif;?> 	
	</div>
</main>
<?php get_footer(); ?>


