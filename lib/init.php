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


function register_post_statuses() {
  register_post_status('approved', array(
    'label' => 'Approved',
    'public' => false,
    'exclude_from_search' => true,
    'show_in_admin_all_list' => false,
    'show_in_admin_status_list' => false,
    'label_count' => _n_noop('Approved <span class="count">(%s)</span>', 'Approved <span class="count">(%s)</span>')
  ));

  register_post_status('rejected', array(
    'label' => 'Rejected',
    'public' => false,
    'exclude_from_search' => true,
    'show_in_admin_all_list' => false,
    'show_in_admin_status_list' => false,
    'label_count' => _n_noop('Rejected <span class="count">(%s)</span>', 'Rejected <span class="count">(%s)</span>')
  ));
}

add_action('init', __NAMESPACE__ . '\\register_post_statuses');
add_action('init', __NAMESPACE__ . '\\custom_post_types');
