<?php

if ( ! function_exists('saasbeyond_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function saasbeyond_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
            'labels'                 => array(
                'name'               => _x( 'Portfolio', 'post type general name', 'saasbeyond' ),
                'singular_name'      => _x( 'Portfolio', 'post type singular name', 'saasbeyond' ),
                'menu_name'          => _x( 'Portfolio', 'admin menu', 'saasbeyond' ),
                'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'saasbeyond' ),
                'add_new'            => _x( 'Add New', 'Portfolio', 'saasbeyond' ),
                'add_new_item'       => __( 'Add New Portfolio', 'saasbeyond' ),
                'new_item'           => __( 'New Portfolio', 'saasbeyond' ),
                'edit_item'          => __( 'Edit Portfolio', 'saasbeyond' ),
                'view_item'          => __( 'View Portfolio', 'saasbeyond' ),
                'all_items'          => __( 'All Portfolio', 'saasbeyond' ),
                'search_items'       => __( 'Search Portfolio', 'saasbeyond' ),
                'parent_item_colon'  => __( 'Parent Portfolio:', 'saasbeyond' ),
                'not_found'          => __( 'No Portfolio found.', 'saasbeyond' ),
                'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'saasbeyond' )
            ),

            'description'        => __( 'Description.', 'saasbeyond' ),
            'menu_icon'          => 'dashicons-layout',
            'public'             => true,
            'show_in_menu'       => true,
            'has_archive'        => false,
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        ));

        // portfolio taxonomy
        register_taxonomy(
            'portfolio_category',
            'portfolio',
            array(
                'labels' => array(
                    'name' => __( 'Portfolio Category', 'saasbeyond' ),
                    'add_new_item'      => __( 'Add New Category', 'saasbeyond' ),
                ),
                'hierarchical' => true,
                'show_admin_column'     => true
        ));
    }

    add_action( 'init', 'saasbeyond_custom_post_type' );

}