<?php get_header(); ?>
<?php 
  if ( is_front_page()||is_home() ){
?>
  <main>
    <?php if ( have_posts () ) : while (have_posts()):the_post();?>
      <?php 
        include(get_template_directory()."/".get_post( $post )->post_name.".php");
      ?>
    <?php endwhile; ?>
  <?php endif; ?>
  </main>
<?php } else { ?>
    <main>
      <?php if ( have_posts () ) : while (have_posts()):the_post();?>
        <?php 
          include(get_template_directory()."/".get_post( $post )->post_name.".php");
        ?>
      <?php endwhile; ?>
    <?php endif; ?>
    </main>
<?php } ?>
<?php get_footer(); ?>

