<?php

/*
Plugin Name: slider
Plugin URI: https://my.plugin.com
Description: My plugin description create custom post type
Version: 1.0.0
Author: Me
Author URI: https://my.website.com
License: GPL2 (or whatever)

*/

class myClass {
public $meta_fields = array( 'title', 'description', 'image', 'hide' );
    function __construct() {

       add_action( 'init', array( $this, 'create_post_type' ) );
      
     add_shortcode( 'slider-sort', array( $this,'create_shortcode_slider_post_type' )); 
    }
     
    function create_post_type() {

       $labels = array(
        'name'                => _x( 'Slider', 'Post Type General Name', 'twentytwentyone' ),
        'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'twentytwentyone' ),
        'menu_name'           => __( 'Slider', 'twentytwentyone' ),
        'parent_item_colon'   => __( 'Parent Slider', 'twentytwentyone' ),
        'all_items'           => __( 'All Slider', 'twentytwentyone' ),
        'view_item'           => __( 'View Slider', 'twentytwentyone' ),
        'add_new_item'        => __( 'Add New Slider', 'twentytwentyone' ),
        'add_new'             => __( 'Add New', 'twentytwentyone' ),
        'edit_item'           => __( 'Edit Slider', 'twentytwentyone' ),
        'update_item'         => __( 'Update Slider', 'twentytwentyone' ),
        'search_items'        => __( 'Search Slider', 'twentytwentyone' ),
        'not_found'           => __( 'Not Found', 'twentytwentyone' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
    );
      
// Set other options for Custom Post Type
      
    $args = array(
        'label'               => __( 'Slider', 'twentytwentyone' ),
        'description'         => __( 'Slider news and reviews', 'twentytwentyone' ),
        'labels'              => $labels,
        
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
       
        'taxonomies'          => array( 'slide1' ),
       
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( 'Slider', $args );
  
}



//add_action( 'add_meta_boxes', 'add_custom_meta_box' );


function create_shortcode_slider_post_type(){
 
    $args = array(
                    'post_type'      => 'slider',
                    'posts_per_page' => '10',
                    'publish_status' => 'published',
                 );
 
    $query = new WP_Query($args);
 
    if($query->have_posts()) :
 
        while($query->have_posts()) :
 
            $query->the_post() ;
                     
        $result = '';
        $result .= '' . get_the_post_thumbnail() ;
        $result .= '' . get_the_title() . '';
        $result .= '' . get_the_content() . ''; 
        $result .= '';
 
        endwhile;
 
        wp_reset_postdata();
 
    endif;    
 
    return $result;            
}
 
//add_shortcode( 'slider-sort', 'diwp_create_shortcode_movies_post_type' ); 





}

$my_class = new myClass();?>

