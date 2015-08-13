<?php

namespace SandersForPresidentLanding\Wordpress\Config;

function assets() {
  // wp_enqueue_style('sanders_landing_css', get_template_directory_uri() . '/dist/main.css');
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);
