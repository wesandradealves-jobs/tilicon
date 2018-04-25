<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IEMobile 7 ]> <html dir="ltr" lang="en-US"class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html dir="ltr" lang="en-US" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html dir="ltr" lang="en-US" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" lang="en-US" class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" itemscope itemtype="http://schema.org/Organization" dir="ltr" lang="en-US" class="no-js"><!--<![endif]-->
<head>
  <title><?php if (is_front_page()) { echo get_bloginfo('title'); } else { echo get_bloginfo('title')." - ".get_the_title(); } ?></title>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
  <meta http-equiv="cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />
  <meta name="viewport" content="width=device-width" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" />

  <link rel="canonical" href="<?php echo site_url(); ?>" />

  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="HandheldFriendly" content="true" />

  <!-- SEO -->

  <meta name="audience" content="all" />
  <meta name="keywords" content="" />

  <meta name="author" content="Wesley Andrade" />
  <meta name="copyright" content="" />
  <meta name="resource-type" content="Document" />
  <meta name="distribution" content="Global" />
  <meta name="robots" content="index, follow, ALL" />
  <meta name="GOOGLEBOT" content="index, follow" />
  <meta name="rating" content="General" />
  <meta name="revisit-after" content="2 Days" />
  <meta name="language" content="pt-br" />

  <?php wp_meta(); ?>

  <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/default.css?v='.rand(5, 15); ?>" type="text/css" media="all" />

  <link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_url')."?v=".rand(5, 15); ?>"> 

  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>

  <script src="http://code.jquery.com/jquery-latest.js"></script>

  <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv-printshiv.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mask.js" type="text/javascript"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

  <script src="http://bxslider.com/lib/jquery.bxslider.js"></script>

  <script src="<?php echo get_template_directory_uri(); ?>/js/functions.js?v=<?php echo rand(5, 15); ?>" type="text/javascript"></script>

  <script type="text/javascript">(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=493767340741485";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <?php wp_head(); ?>
</head>
<body 
<?php
global $post;
if (is_front_page()) {
  echo 'class="pg-home"';
} else if(is_archive()){
  echo 'class="pg-archive pg-interna"';
} else if(is_category()){
  echo 'class="pg-category pg-interna"';
} else if(is_search()){
  echo 'class="pg-search pg-interna"';
} else if(is_single()){
  echo 'class="pg-single pg-interna"';
} else {
  echo 'class="pg-interna page_id_'.$post->ID.'"';
}
?>>
<style type="text/css">
  @font-face {
    font-family: 'slick';
    src: url("<?php echo get_template_directory_uri(); ?>/fonts/slick.eot");
    src: url("<?php echo get_template_directory_uri(); ?>/fonts/slick.eot?#iefix&v=4.6.2") format("embedded-opentype"), 
    url("<?php echo get_template_directory_uri(); ?>/fonts/slick.woff2") format("woff2"), 
    url("<?php echo get_template_directory_uri(); ?>/fonts/slick.woff") format("woff"), 
    url("<?php echo get_template_directory_uri(); ?>/fonts/slick.ttf") format("truetype"), 
    url("<?php echo get_template_directory_uri(); ?>/fonts/slick.svg") format("svg");
    font-weight: normal;
    font-style: normal; }
  </style>
  <div id="wrap">
    <header>
      <div id="mobileNav">
        <nav>
          <ul>
            <?php wp_nav_menu( array( 'container' => false, 'menu' => 'header', 'items_wrap' => '%3$s' ) ); ?>
          </ul>
        </nav>
      </div>
      <div id="header">
        <div class="wrap">
          <div class="flex">
            <div class="flex30">
              <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                <?php 
                if ( get_theme_mod( 'logo' ) ) :
                  echo "<img src='".esc_url( get_theme_mod( 'logo' ) )."' alt='".esc_attr( get_bloginfo( 'name', 'display' ) )."'>";
                else :
                  echo "Abla";
                endif;
                ?>
              </a> 
            </div>
            <div class="flex70 flex">
              <div class="flex100 flex">
                <?php if(get_theme_mod( 'facebook' )||get_theme_mod( 'linkedin' )||get_theme_mod( 'twitter' )){ ?>
                <ul class='social flex10 flex'>
                  <?php
                  if(get_theme_mod( 'facebook' )) :
                    echo '<li class="flex33"><a href="'.get_theme_mod( 'facebook' ).'" title="Facebook"><!-- --></a></li>';
                  endif;
                  if(get_theme_mod( 'twitter' )) :
                    echo '<li class="flex33"><a href="'.get_theme_mod( 'twitter' ).'" title="Twitter"><!-- --></a></li>';
                  endif;
                  if(get_theme_mod( 'linkedin' )) :
                    echo '<li class="flex33"><a href="'.get_theme_mod( 'linkedin' ).'" title="Linkedin"><!-- --></a></li>';
                  endif;
                  ?>
                </ul>
                <?php } ?> 
              </div>
              <div class="flex100 flex">
                <nav class="flex85">
                  <ul class="flex">
                    <?php wp_nav_menu( array( 'container' => false, 'menu' => 'header', 'items_wrap' => '%3$s' ) ); ?>
                  </ul>  
                </nav>
                <div class="flex15">
                  <form class="flex" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <span class="flex15"><button></button></span>
                    <span class="flex85"><input placeholder="Busca" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" /></span>
                    <input type="hidden" name="post_type" value="empreendimentos" />
                  </form>    
                </div>
              </div>             
            </div>
          </div>
        </div>
      </div>
    </header>
    <script>
      $(document).ready(function(){
        <?php 
          $taxonomy = 'empreendimentos_categories';
          $terms = get_terms($taxonomy);
          echo 'var empreendimentos_categories = "';
          if ( $terms && !is_wp_error( $terms ) ) :
            foreach ( $terms as $term ) {
              echo "<li><a href='".get_bloginfo('url')."/empreendimento/?filter=".strtolower($term->slug)."'>".$term->name."</a></li>";
            }
          endif;
          echo '";';
        ?>
        $( "#header nav ul li a" ).each(function() {
          if($(this).text()=="Empreendimentos"){
            $(this).attr("href","javascript:void(0)").append("<ul>"+empreendimentos_categories+"</ul>");
          }
        }); 
      }); 
    </script>