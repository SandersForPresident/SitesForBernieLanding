<?php
namespace SandersForPresidentLanding\Wordpress\Admin\Requests;

class RequestService {
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

}
