<?php

namespace SandersForPresidentLanding\Wordpress\Init;

function custom_post_types() {
  $args = array(
    'labels' => array(
      'name' => 'Requests',
      'singular_name' => 'Request'
    ),
    'public' => false,
    'publicly_queryable' => false,
    'show_ui' => false,
    'show_in_menu' => false,
    'query_var' => false
  );
  register_post_type('request', $args);
}

add_action('init', __NAMESPACE__ . '\\custom_post_types');
