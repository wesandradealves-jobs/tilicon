<?php

$webdoor_label = array(
    'name' => _x('Webdoor', 'post type general name'),
    'singular_name' => _x('Webdoor', 'post type singular name'),
    'add_new' => _x('Add New', 'Webdoor '),
    'add_new_item' => __('Add New Webdoor '),
    'edit_item' => __('Edit Webdoor '),
    'new_item' => __('New Link util '),
    'view_item' => __('View Webdoor '),
    'search_items' => __('Search Webdoor'),
    'not_found' =>  __('Nothing found'),
    'not_found_in_trash' => __('Nothing found in Trash'),
    'parent_item_colon' => ''
);

$webdoor = array(
        'labels' => $webdoor_label,
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'webdoor', 'with_front' => false ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => -5,
        'supports'           => array( 'title', 'thumbnail', 'excerpt')
);

register_post_type( 'webdoor', $webdoor );

function empreendimentos_register() {
    $labels = array(
        'name' => _x('Empreendimento', 'post type general name'),
        'singular_name' => _x('Empreendimento Item', 'post type singular name'),
        'add_new' => _x('Add New', 'Empreendimento item'),
        'add_new_item' => __('Add New Empreendimento Item'),
        'edit_item' => __('Edit Empreendimento Item'),
        'new_item' => __('New Empreendimento Item'),
        'view_item' => __('View Empreendimento Item'),
        'search_items' => __('Search Empreendimento Items'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 8,
        'supports' => array('title', 'thumbnail', 'excerpt', 'custom-fields')
    ); 
    register_post_type( 'empreendimentos' , $args );
}
add_action('init', 'empreendimentos_register');

function create_empreendimentos_taxonomies() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categories' ),
    );

    register_taxonomy( 'empreendimentos_categories', array( 'empreendimentos' ), $args );
}
add_action( 'init', 'create_empreendimentos_taxonomies');

// 

function remove_menus(){
  
  remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'jetpack' );                    //Jetpack* 
  remove_menu_page( 'edit.php' );                   //Posts
  // remove_menu_page( 'upload.php' );                 //Media
  // remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'themes.php' );                 //Appearance
  // remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'users.php' );                  //Users
  remove_menu_page( 'tools.php' );                  //Tools
  // remove_menu_page( 'options-general.php' );        //Settings
  
}


add_action( 'admin_menu', 'remove_menus' );

// 

add_action( 'init', 'getrid' );

function getrid() {
  remove_post_type_support( 'page', 'editor' );
  //remove_post_type_support( 'page', 'thumbnail' );
  remove_post_type_support( 'page', 'page-attributes' );
}

// Handle the post_type parameter given in get_terms function

function df_terms_clauses($clauses, $taxonomy, $args) {
    if (!empty($args['post_type'])) {
        global $wpdb;
        $post_types = array();
        foreach($args['post_type'] as $cpt) {
            $post_types[] = "'".$cpt."'";
        }
        if(!empty($post_types)) {
            $clauses['fields'] = 'DISTINCT '.str_replace('tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields']).', COUNT(t.term_id) AS count';
            $clauses['join'] .= ' INNER JOIN '.$wpdb->term_relationships.' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN '.$wpdb->posts.' AS p ON p.ID = r.object_id';
            $clauses['where'] .= ' AND p.post_type IN ('.implode(',', $post_types).')';
            $clauses['orderby'] = 'GROUP BY t.term_id '.$clauses['orderby'];
        }
    }
    return $clauses;
}
add_filter('terms_clauses', 'df_terms_clauses', 10, 3);
// 
// function add_taxonomies_to_pages() {
//  register_taxonomy_for_object_type( 'category', 'page' );
//  }
// add_action( 'init', 'add_taxonomies_to_pages' );
// if ( ! is_admin() ) {
//    add_action( 'pre_get_posts', 'category_and_tag_archives' );
   
// }
// function category_and_tag_archives( $wp_query ) {
//     $my_post_array = array('post','page');
    
//     if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
//        $wp_query->set( 'post_type', $my_post_array );
   
//    if ( $wp_query->get( 'tag' ) )
//        $wp_query->set( 'post_type', $my_post_array );
// }
// 
function themeslug_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'logo_section' , array(
        'title'       => __( 'Logo', 'themeslug' ),
        'priority'    => 1
    ));
    $wp_customize->add_setting( 'logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
        'label'    => __( 'Logo', 'themeslug' ),
        'section'  => 'logo_section',
        'settings' => 'logo'
    )));  
    $wp_customize->add_section( 'social' , array(
        'title'       => __( 'Redes Sociais', 'themeslug' ),
        'priority'    => 1
    ));
    $wp_customize->add_setting( 'facebook' );
    $wp_customize->add_control('facebook',  array(
        'label' => 'Facebook',
        'section' => 'social',
        'type' => 'text',
        'sanitize_callback' => 'esc_url_raw',
        'settings' => 'facebook'
    ));
    $wp_customize->add_setting( 'twitter' );
    $wp_customize->add_control('twitter',  array(
        'label' => 'Twitter',
        'section' => 'social',
        'type' => 'text',
        'sanitize_callback' => 'esc_url_raw',
        'settings' => 'twitter'
    ));
    $wp_customize->add_setting( 'linkedin' );
    $wp_customize->add_control('linkedin',  array(
        'label' => 'Linkedin',
        'section' => 'social',
        'type' => 'text',
        'sanitize_callback' => 'esc_url_raw',
        'settings' => 'linkedin'
    ));
    $wp_customize->add_section( 'footer' , array(
        'title'       => __( 'Footer', 'themeslug' ),
        'priority'    => 2
    ));
    $wp_customize->add_setting( 'endereco' );
    $wp_customize->add_control('endereco',  array(
        'label' => 'Endereço',
        'section' => 'footer',
        'type' => 'text',
        'sanitize_callback' => 'esc_url_raw',
        'settings' => 'endereco'
    ));  
    $wp_customize->add_setting( 'telefone' );
    $wp_customize->add_control('telefone',  array(
        'label' => 'Telefone',
        'section' => 'footer',
        'type' => 'text',
        'sanitize_callback' => 'esc_url_raw',
        'settings' => 'telefone'
    ));  
    $wp_customize->add_setting( 'contato' );
    $wp_customize->add_control('contato',  array(
        'label' => 'Contato',
        'section' => 'footer',
        'type' => 'text',
        'sanitize_callback' => 'esc_url_raw',
        'settings' => 'contato'
    ));  
}
add_action( 'customize_register', 'themeslug_theme_customizer' );
function remove_customizer_settings( $wp_customize ){
  $wp_customize->remove_panel('nav_menus');
  $wp_customize->remove_section('static_front_page');
}
add_action( 'customize_register', 'remove_customizer_settings', 20 );
// 
function get_the_category_bytax( $id = false, $tcat = 'category' ) {
    $categories = get_the_terms( $id, $tcat );
    if ( ! $categories )
        $categories = array();
    $categories = array_values( $categories );
    foreach ( array_keys( $categories ) as $key ) {
        _make_cat_compat( $categories[$key] );
    }
    // Filter name is plural because we return alot of categories (possibly more than #13237) not just one
    return apply_filters( 'get_the_categories', $categories );
}
// 
function get_custom_field_data($key, $echo = false) {
    global $post;
    $value = get_post_meta($post->ID, $key, true);
    if($echo == false) {
        return $value;
    } else {
        echo $value;
    }
}
//
function hide_admin_bar() {
    wp_add_inline_style('admin-bar', '<style> html { margin-top: 0 !important; } </style>');
    return false;
}
add_filter( 'show_admin_bar', 'hide_admin_bar' );
//
function menu() {
  register_nav_menus(
    array(
      'header' => __( 'Header' )
    )
  );
}
add_action( 'init', 'menu' );

//

function updateNumbers() {
    global $wpdb;
    $querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' ";
    $pageposts = $wpdb->get_results($querystr, OBJECT);
    $counts = 0 ;
    if ($pageposts):
    foreach ($pageposts as $post):
    setup_postdata($post);
    $counts++;
    add_post_meta($post->ID, 'incr_number', $counts, true);
    update_post_meta($post->ID, 'incr_number', $counts);
    endforeach;
    endif;
}
 
add_action ( 'publish_post', 'updateNumbers' );
add_action ( 'deleted_post', 'updateNumbers' );
add_action ( 'edit_post', 'updateNumbers' );

// 

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 600, 600 );

// 

if (class_exists('MultiPostThumbnails')) {
    for ($i=1;$i<11;$i++) {
        new MultiPostThumbnails(
            array(
                'label' => 'Imagem '.$i,
                'id' => 'featured-image-'.$i,
                'post_type' => 'empreendimentos'
            )
        ); 
    }
}

// 

update_option( 'siteurl', 'http://www.tilicon.com.br' );
update_option( 'home', 'http://www.tilicon.com.br' );

// 

require_once('class-tgm-plugin-activation.php');

function register_required_plugins() {
    $plugins = array(
        array(
            'name' => 'MultiPostThumbnails', // The plugin name.
            'slug' => 'multiple-post-thumbnails', // The plugin slug (typically the folder name).
            'source' => get_template_directory_uri() . '/plugins/multiple-post-thumbnails.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url' => '', // If set, overrides default API URL and points to an external URL.
        ),
    );
    /**
    * Array of configuration settings. Amend each line as needed.
    * If you want the default strings to be available under your own theme domain,
    * leave the strings uncommented.
    * Some of the strings are added into a sprintf, so see the comments at the
    * end of each line for what each argument will be.
    */
    $config = array(
        'default_path' => '', // Default absolute path to pre-packaged plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
        'strings' => array(
        'page_title' => __( 'Install Required Plugins', 'tgmpa' ),
        'menu_title' => __( 'Install Plugins', 'tgmpa' ),
        'installing' => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
        'oops' => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
        'notice_can_install_required' => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
        'notice_can_install_recommended' => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
        'notice_cannot_install' => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
        'notice_can_activate_required' => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
        'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
        'notice_cannot_activate' => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
        'notice_ask_to_update' => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
        'notice_cannot_update' => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
        'install_link' => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
        'activate_link' => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
        'return' => __( 'Return to Required Plugins Installer', 'tgmpa' ),
        'plugin_activated' => __( 'Plugin activated successfully.', 'tgmpa' ),
        'complete' => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
        'nag_type' => 'updated' // Determines admin notice type – can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'register_required_plugins');
// 
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item','post','articles');
    $query->set('post_type',$post_type);
    return $query;
    }
}
// 
function custom_pagination($numpages = '', $pagerange = '', $paged='') {
  if (empty($pagerange)) {
    $pagerange = 2;
  }
  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }
  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => False,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );
  $paginate_links = paginate_links($pagination_args);
  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo $paginate_links;
    echo "</nav>";
  }
}
function my_formatter($content) {
 $new_content = '';
 $pattern_full = '{(\[raw\].*?\[/raw\])}is';
 $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
 $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
 
 foreach ($pieces as $piece) {
 if (preg_match($pattern_contents, $piece, $matches)) {
 $new_content .= $matches[1];
 } else {
 $new_content .= wptexturize(wpautop($piece));
 }
 }
 
 return $new_content;
}
add_filter('the_content', 'my_formatter', 99);

 function template_chooser($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'empreendimentos' )   
  {
    return locate_template('search.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'template_chooser');  

?>