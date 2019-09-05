<?php

if ( ! function_exists('megaaddons_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function megaaddons_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
            'labels'                 => array(
                'name'               => _x( 'Portfolio', 'post type general name', 'megaaddons' ),
                'singular_name'      => _x( 'Portfolio', 'post type singular name', 'megaaddons' ),
                'menu_name'          => _x( 'Portfolio', 'admin menu', 'megaaddons' ),
                'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'megaaddons' ),
                'add_new'            => _x( 'Add New', 'Portfolio', 'megaaddons' ),
                'add_new_item'       => __( 'Add New Portfolio', 'megaaddons' ),
                'new_item'           => __( 'New Portfolio', 'megaaddons' ),
                'edit_item'          => __( 'Edit Portfolio', 'megaaddons' ),
                'view_item'          => __( 'View Portfolio', 'megaaddons' ),
                'all_items'          => __( 'All Portfolio', 'megaaddons' ),
                'search_items'       => __( 'Search Portfolio', 'megaaddons' ),
                'parent_item_colon'  => __( 'Parent Portfolio:', 'megaaddons' ),
                'not_found'          => __( 'No Portfolio found.', 'megaaddons' ),
                'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'megaaddons' )
            ),

            'description'        => __( 'Description.', 'megaaddons' ),
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
                    'name' => __( 'Portfolio Category', 'megaaddons' ),
                    'add_new_item'      => __( 'Add New Category', 'megaaddons' ),
                ),
                'hierarchical' => true,
                'show_admin_column'     => true
        ));
    }

    add_action( 'init', 'megaaddons_custom_post_type' );

}