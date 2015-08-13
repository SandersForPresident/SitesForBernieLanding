<?php
namespace SandersForPresidentLanding\Wordpress\Ajax;
use SandersForPresidentLanding\Wordpress\Admin\Requests\RequestService;

function create_site_request() {
  $nonce = $_POST['contactNonce'];
  if (!wp_verify_nonce($nonce, 'site_request')){
    echo 'Invalid request';
    exit(0);
  }
  echo 'Valid!';
  $requestService = new RequestService();
  $requestService->createRequest($_POST['site_request']);
  exit(0);
}
add_action('wp_ajax_siteRequest', __NAMESPACE__ . '\\create_site_request');
add_action('wp_ajax_nopriv_siteRequest', __NAMESPACE__ . '\\create_site_request');
