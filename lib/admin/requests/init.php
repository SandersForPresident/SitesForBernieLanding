<?php

namespace SandersForPresidentLanding\Wordpress\Admin\Requests\Init;
use SandersForPresidentLanding\Wordpress\Admin\Requests\RequestService;

function register_menus() {
  add_menu_page('Requests', 'Requests', 'manage_options', 'requests', __NAMESPACE__ . '\\render_page', 'dashicons-list-view');
}
add_action('admin_menu', __NAMESPACE__ . '\\register_menus');

add_action('admin_init', __NAMESPACE__ . '\\handle_post_status_update');

function render_page() {
  if (isset($_REQUEST['post']) && isset($_REQUEST['action']) && $_REQUEST['action'] == 'view') {
    include(__DIR__ . '/views/request.php');
  } else {
    include(__DIR__ . '/views/requests.php');
  }
}

function handle_post_status_update() {
  $siteRequestService = new RequestService();
  if (is_super_admin() && $_REQUEST['page'] == 'requests' && !empty($_REQUEST['post']) && !empty($_REQUEST['action'])) {
    $siteRequest = $siteRequestService->getRequest($_REQUEST['post']);
    if (!$siteRequest) {
      return;
    }

    if ($_REQUEST['action'] == 'approve') {
      $siteRequestService->approve($_REQUEST['post']);
    } else if ($_REQUEST['action'] == 'reject') {
      $siteRequestService->reject($_REQUEST['post']);
    }
  }
}
