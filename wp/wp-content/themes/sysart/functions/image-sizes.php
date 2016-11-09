<?php
add_action('init', function () {
  $sizes = array(300, 600, 1200, 2400);

  foreach ($sizes as $size) {
    add_image_size("$size", $size, $size);
    add_image_size("{$size}_sq", $size, $size, array('center', 'center'));
  }

  add_image_size('fb-share', 1200, 600, array('center', 'center'));
});
