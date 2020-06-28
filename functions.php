<?php

function food_enqueue_script() {
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script('jquery', get_template_directory_uri().'/jquery.js', [], '2.0', true);

    wp_enqueue_script('custom_script', get_template_directory_uri().'/script.js', [], '1.0', true);
}

add_action('wp_enqueue_scripts', 'food_enqueue_script');

//change exceprt length
add_filter('excerpt_length', function($length) {
    return 15;
});

// add theme support thumbnail
add_theme_support('post-thumbnails');

// register api for like functionality
add_action('rest_api_init', 'register_like_api');
function register_like_api() {
    register_rest_route('/v2', '/likes/(?P<id>\d+)', [
        'methods' => ['GET','POST'],
        'callback' => 'custom_like'
    ]);
}

function custom_like(WP_REST_Request $request) {
    $fieldName = 'recipe_like';

    $curLike = get_field($fieldName, $request['id']);

    $updatedLike = $curLike + 1;

    $likes = update_field($fieldName, $updatedLike, $request['id']);

    return $likes;
}

// view counter
function blog_post_view($post_id) {
    $key = 'foodguide_blog_view';
    $view_count = get_post_meta($post_id, $key, true);

    if($view_count == '') {
        $view_count = 1;
        // delete_post_meta($post_id, $key);
        add_post_meta($post_id, $key, $view_count);
    }else{
        $view_count++;
        update_post_meta($post_id, $key, $view_count);
    }
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function blog_check_view($post_id) {
    if(!is_single()) return;

    if(empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    blog_post_view($post_id);
}
add_action('wp_head', 'blog_check_view');

function get_blog_post_view($post_id) {
    $key = 'foodguide_blog_view';
    $count = get_post_meta($post_id, $key, true);
    if($count=="") {
        return "0 View";
    }
    return "$count views";
}

// register sidebar
function fg_register_sidebar() {
    register_sidebar([
        'name' => 'Primary Sidebar',
        'id' => 'primary-sidebar',
    ]);

    unregister_widget('WP_Widget_Search');
}

add_action('widgets_init', 'fg_register_sidebar');

function fg_pre_post(WP_Query $query) {
    if(isset($query->query['post_type']) && ($query->query['post_type'] == 'ingredient' || $query->query['post_type'] == 'blog' || $query->query['post_type']) == 'recipe') {
        $query->set('posts_per_page', 7);
    }
}
add_action('pre_get_posts', 'fg_pre_post');