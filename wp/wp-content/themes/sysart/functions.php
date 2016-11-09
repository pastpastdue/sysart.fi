<?php
define('BUILD_STAMP', filemtime(__DIR__ . '/styles/style.min.css'));

foreach (glob(__DIR__ . '/functions/*.php') as $file) {
  include $file;
}

add_theme_support('post-thumbnails');
