<?php
$query = new WP_Query( array( 'post_type' => 'webdoor', 'order' => 'DESC') );
if($query->have_posts()=="1") : ?>
<section id="webdoor">
	<div class="slide">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>);">
			<div>
				<div>
					<h1><?php echo get_the_title(); ?></h1>
					<?php if(get_the_excerpt()) : ?>
					<p><?php echo get_the_excerpt(); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endwhile; wp_reset_query(); ?>
	</div>
</section>
<?php endif; ?>