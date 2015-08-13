<?php
namespace SandersForPresidentLanding\Wordpress\Admin\Requests;

class RequestService {
  const POST_TYPE = 'request';
  const POST_TITLE_KEY = 'organization';
  const POST_CONTENT_KEY = 'message';
  const META_KEY_CAUSE = 'cause';
  const META_KEY_URL = 'url';
  const META_KEY_EMAIL = 'contact_email';
  const META_KEY_NAME = 'contact_name';
  private $mocks = array();

  public function __construct() {
    $this->mocks[0] = array('id' => 1);
    $this->mocks[1] = array('id' => 2);
  }

  public function getRequests() {
    return $this->mocks;
  }

  public function getRequest($id) {
    foreach ($this->mocks as $mock) {
      if ($mock->id == $id) {
        return $mock;
      }
    }
    return null;
  }

  public function createRequest($request) {
    $postArgs = array(
      'post_title' => $request[self::POST_TITLE_KEY],
      'post_content' => $request[self::POST_CONTENT_KEY],
      'post_type' => self::POST_TYPE
    );
    $postId = wp_insert_post($postArgs);
    if (!is_wp_error($postId)) {
      add_post_meta($postId, self::META_KEY_CAUSE, $request[self::META_KEY_CAUSE]);
      add_post_meta($postId, self::META_KEY_URL, $request[self::META_KEY_URL]);
      add_post_meta($postId, self::META_KEY_EMAIL, $request[self::META_KEY_EMAIL]);
      add_post_meta($postId, self::META_KEY_NAME, $request[self::META_KEY_NAME]);
      return true;
    } else {
      return false;
    }
  }
}
