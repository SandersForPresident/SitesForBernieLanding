<?php

namespace SandersForPresidentLanding\Wordpress\Admin\Requests\Init;

function register_menus() {
  add_menu_page('Requests', 'Requests', 'manage_options', 'requests', __NAMESPACE__ . '\\render_page', 'dashicons-list-view');
}
add_action('admin_menu', __NAMESPACE__ . '\\register_menus');

function render_page() {
  if (isset($_REQUEST['post'] && isset($_REQUEST['action']) && $_REQUEST['action'] == 'view')) {
    include(__DIR__ . '/views/request.php');
  } else {
    include(__DIR__ . '/views/requests.php');
  }
}
