<?php

/**
 * SandersForPresident includes
 */

$landing_includes = array(
  'lib/init.php',
  'lib/assets.php',
  'lib/admin/requests/init.php',
  'lib/admin/requests/service.php',
  'lib/admin/requests/table.php'
);

foreach ($landing_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }

  require_once($filepath);
}

// cleanup global vars
unset($file, $filepath);
