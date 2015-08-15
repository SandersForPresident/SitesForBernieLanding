<?php
namespace SandersForPresidentLanding\Wordpress\Ajax;
use SandersForPresidentLanding\Wordpress\Admin\Requests\RequestService;
use SandersForPresidentLanding\Wordpress\Services\SiteService;

function create_site_request() {
  $nonce = $_POST['nonce'];
  if (!wp_verify_nonce($nonce, 'site_request')){
    echo 'Invalid request';
    exit(0);
  }
  $requestService = new RequestService();
  $requestService->createRequest($_POST['site_request']);
  echo 'Valid!';
  exit(0);
}
add_action('wp_ajax_siteRequest', __NAMESPACE__ . '\\create_site_request');
add_action('wp_ajax_nopriv_siteRequest', __NAMESPACE__ . '\\create_site_request');

function does_site_exist() {
  $nonce = $_POST['nonce'];
  if (!wp_verify_nonce($nonce, 'site_request')){
    echo 'Invalid request';
    exit(0);
  }
  $siteService = new SiteService();
  $site = $siteService->getSiteBySlug($_POST['site']);
  wp_mail(
    get_field('email_notifications', 'options'),
    'ForBernieSanders - New Request',
    'You have a new request for the group ' . $_POST['site']['organization']
  );
  echo json_encode(array('exists' => !empty($site)));
  exit(0);
}
add_action('wp_ajax_siteExists', __NAMESPACE__ . '\\does_site_exist');
add_action('wp_ajax_nopriv_siteExists', __NAMESPACE__ . '\\does_site_exist');
