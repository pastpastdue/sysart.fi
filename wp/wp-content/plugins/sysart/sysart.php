<?php
/*
Plugin Name: Sysart
Author: Sysart
Version: 0.1
*/

add_action('admin_menu', function () {
  $cap = 'manage_options';
  $slug = 'sysart';

  add_menu_page('Plugin Page', 'Sysart', $cap, $slug, function () {
    $data = base64_encode(json_encode(acf_get_local_field_groups()));
    $dataUri = 'data:application/json;base64,' . $data;

    echo <<<EOC
      <a href="$dataUri" download="custom-fields.json">Custom Fields JSON</a>
EOC;
  });
});
