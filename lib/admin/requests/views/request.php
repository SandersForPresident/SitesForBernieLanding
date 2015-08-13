<?php
use SandersForPresident\Wordpress\Admin\Requests\RequestService;
$service = new RequestService();
$request = $service->getRequest($_REQUEST['post']);
?>

<div class="wrap">
  <h2>View Request</h2>

  <div id="poststuff">
    <div id="post-body" class="columns-2">

      <div id="post-body-content">
        <div class="postbox">
          <h3 class="hndle ">The Title</h3>
          <div class="inside">
            The Content
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
                  <span>NAME</span>
                </div>
                <div class="misc-pub-section">
                  <label style="font-weight:bold;">Email:</label>
                  <span>EMAIL</span>
                </div>
                <div class="misc-pub-section">
                  <label style="font-weight:bold;">Date:</label>
                  <span>DATE</span>
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
