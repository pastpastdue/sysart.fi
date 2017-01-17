<?php
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_script('polyfill', get_template_directory_uri() . '/scripts/polyfills.min.js', null,  BUILD_STAMP, true);
  wp_enqueue_script('sysart', get_template_directory_uri() . '/scripts/index.min.js', null,  BUILD_STAMP, true);
  wp_enqueue_style('sysart', get_template_directory_uri() . '/styles/styles.min.css', null, BUILD_STAMP);
});
