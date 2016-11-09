<?php
define('BUILD_STAMP', filemtime(__DIR__ . '/styles/style.min.css'));

foreach (glob(__DIR__ . '/functions/*.php') as $file) {
  include $file;
}

add_theme_support('post-thumbnails');

// XXX: do we need these? no?
//
// add_filter('json_prepare_post', 'json_api_encode_acf');
// add_filter( 'acf/rest_api/types', function( $types ) {
//     if ( array_key_exists( 'post', $types ) ) {
//         unset( $types['post'] );
//     }
//
//     return $types;
// } );
