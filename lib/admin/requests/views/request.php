<?php
use SandersForPresidentLanding\Wordpress\Admin\Requests\RequestService;
$service = new RequestService();
$request = $service->getRequest($_REQUEST['post']);

$service->markAsRead($request['id']);
?>

<div class="wrap">
  <h2>View Request</h2>

  <div id="poststuff">
    <div id="post-body" class="columns-2">

      <div id="post-body-content">
        <div class="postbox">
          <h3 class="hndle">Organization: <?php echo $request['organization']; ?></h3>
          <h3 class="hndle">URL: <?php echo $request['url']; ?>.forberniesanders.com</h3>
          <div class="inside">
            <?php echo apply_filters('the_content', $request['message']); ?>
          </div>
        </div>
      </div>

      <div id="postbox-container-1">
        <div id="submitdiv" class="postbox">
          <h3 class="hndle">Request Information</h3>
          <div class="inside">
            <div id="submitpost" class="submitbox">

              <div id="misc-publishing-actions">
                <div class="misc-pub-section">
                  <label style="font-weight:bold;">From:</label>
                  <span><?php echo $request['contact_name']; ?></span>
                </div>
                <div class="misc-pub-section">
                  <label style="font-weight:bold;">Email:</label>
                  <span><?php echo $request['contact_email']; ?></span>
                </div>
                <div class="misc-pub-section">
                  <label style="font-weight:bold;">Date:</label>
                  <span><?php echo $request['date']; ?></span>
                </div>
              </div>

              <div id="major-publishing-actions">
                <div id="delete-action">
                  <a href="#" class="submitdelete deletion">Trash</a>
                </div>
                <div id="publishing-action">
                  <input type="button" value="Okay" id="publish" class="button button-primary button-large" />
                </div>
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
