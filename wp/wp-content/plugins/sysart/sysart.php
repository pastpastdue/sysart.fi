<?php
/*
Plugin Name: Sysart
Author: Sysart
*/

add_filter('tiny_mce_before_init', function ($mceInit, $editor_id) {
  $mceInit['paste_as_text'] = true;
	return $mceInit;
}, 1, 2);
