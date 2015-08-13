<?php
namespace SandersForPresidentLanding\Wordpress\Admin\Requests;

if(!class_exists('WP_List_Table')){
   require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
use WP_List_Table;

class RequestTable extends WP_List_Table {
  private $service;

  public function __construct() {
    parent::__construct(array(
      'singular' => 'Request',
      'plural' => 'Requests',
      'ajax' => false
    ));
    $this->service = new RequestService();
  }

  public function get_columns() {
    return array(
      'cb' => '<input type="checkbox" />',
      'request_organization' => 'Organization',
      'request_organizer' => 'Organizer',
      'request_url' => 'URL',
      'request_date' => 'Date'
    );
  }

  public function get_views() {
    return array(
      'all' => '<a href="#">All</a>',
      'trash' => '<a href="#">Trash</a>'
    );
  }

  public function column_cb($item) {
    return "<input type=\"checkbox\" name=\"request[]\" value=\"{$item->id}\" />";
  }

  public function column_request_organization($item) {
    if (!$item['read']) {
      $title = "<strong>{$item['organization']}</strong>";
    } else {
      $title = $item['organization'];
    }
    $actions = array(
      'view' => "<a href=\"?page={$_REQUEST['page']}&action=view&post=XYZ\">View</a>"
    );
    return $title . $this->row_actions($actions, false);
  }

  public function column_request_organizer($item) {
    $name = $item['contact_name'];
    $email = "<a href=\"mailto:{$item['contact_email']}\">{$item['contact_email']}</a>";
    return $name . "<br/>" . $email;
  }

  public function column_request_url($item) {
    return $item['url'] . '.forberniesanders.com';
  }

  public function column_request_date($item) {
    return $item['date'];
  }

  public function get_sortable_columns() {
    return array(
      'message_title' => array('message_title', false)
    );
  }

  public function get_bulk_actions() {
    return array(
      'delete' => 'Delete'
    );
  }

  public function prepare_items() {
    $this->items = $this->service->getRequests();
    $this->_column_headers = array($this->get_columns(), array(), array());
    $this->set_pagination_args(array(
      'total_items' => count($this->items),
      'per_page' => 10
    ));
  }
}
