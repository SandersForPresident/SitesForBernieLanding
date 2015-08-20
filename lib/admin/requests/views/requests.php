<?php
use SandersForPresidentLanding\Wordpress\Admin\Requests\RequestTable;
$table = new RequestTable();
$table->prepare_items();
?>

<div class="wrap">
  <h2>Requests</h2>

  <form method="post">
    <?php $table->views(); ?>
    <?php $table->display(); ?>
  </form>
</div>
