<?php
define('BUILD_STAMP', filemtime(__DIR__ . '/styles/styles.min.css'));

foreach (glob(__DIR__ . '/functions/*.php') as $file) {
  include $file;
}

add_theme_support('post-thumbnails');

spl_autoload_register(function ($name) {
  $path = __DIR__ . "/includes/$name.php";
  if (file_exists($path)) {
    include $path;
  }
});
