<?php get_header(); ?>
<?php
if ( is_front_page()||is_home() ){
?>
<main>
<div class="wrap">
<?php if ( have_posts () ) : while (have_posts()):the_post();?>
<?php
include(get_template_directory()."/".get_post( $post )->post_name.".php");
?>
<?php endwhile; ?>
<?php endif; ?>
</div>
</main>
<?php } else { ?>
<main>
<div class="wrap">
  <?php if ( have_posts () ) : while (have_posts()):the_post();?>
  <?php if($post->post_name!="empreendimento") : ?>
  <div id="webdoor" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>);">
    <div>
      <h1><?php echo get_the_title(); ?></h1>
    </div>
  </div>
  <?php endif; ?>
  <?php
  include(get_template_directory()."/".get_post( $post )->post_name.".php");
  ?>
  <?php endwhile; ?>
  <?php endif; ?>
</div>
</main>
<?php } ?>
<?php get_footer(); ?>