<?php
/*
Plugin name: Honestbrew Events Plugin
Description: Custom plugin developed to create events for Honestbrew
Author: Parvathi Saseendran
Version: 1
*/

register_activation_hook( __FILE__, 'activate_hb_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_hb_plugin');

add_action('init', 'activate_hb_plugin');

function activate_hb_plugin() {
    // Custom event labels
    $labels = array(
        'name' => 'Events',
        'singular_name' => 'Event',
        'add_new' => 'Add New Event',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event',
        'new_item' => 'New Event',
        'all_items' => 'All Events',
        'view_item' => 'View Event',
        'search_items' => 'Search Events',
        'not_found' =>  'No Events Found',
        'not_found_in_trash' => 'No Events found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Events',
    );

    // Register post type event
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'event'),
        'query_var' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'show_in_rest' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes'
        )
    );
    register_post_type( 'event', $args );

    // register taxonomy
    register_taxonomy('event_category', 'event', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'event-category' )));

}

function deactivate_hb_plugin() {

}

function get_custom_field($object, $field_name, $value) {
    return get_post_meta($object['id'])[$field_name][0];
}

function register_start_date_in_api() {
    register_rest_field('event', 'start_date', array(
        'get_callback' => 'get_custom_field',
        'update_callback' => null,
        'schema' => null,
    ));
}

add_action( 'rest_api_init', 'register_start_date_in_api' );

function register_end_date_in_api() {
    register_rest_field('event', 'end_date', array(
        'get_callback' => 'get_custom_field',
        'update_callback' => null,
        'schema' => null,
    ));
}

add_action( 'rest_api_init', 'register_end_date_in_api' );

function register_venue_in_api() {
    register_rest_field('event', 'venue', array(
        'get_callback' => 'get_custom_field',
        'update_callback' => null,
        'schema' => null,
    ));
}

add_action( 'rest_api_init', 'register_venue_in_api' );