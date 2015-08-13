<?php

namespace SandersForPresidentLanding\Wordpress\Config;

function assets() {
  wp_enqueue_style('sanders_landing_css', get_template_directory_uri() . '/dist/main.css');
  wp_enqueue_script('sanders_vendor', get_template_directory_uri() . '/dist/vendor.js', array('jquery'), null, true);
  wp_enqueue_script('sanders_js', get_template_directory_uri() . '/dist/site.js', array('sanders_vendor'), null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);
