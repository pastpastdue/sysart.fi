<?php
/**
 * Twenty Thirteen functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see https://codex.wordpress.org/Theme_Development
 * and https://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage sysart
 * @since sysart
 */

define('BUILD_STAMP', filemtime(__DIR__ . '/styles/style.min.css'));

add_action('init', 'create_post_type');
add_action('init', 'register_image_sizes');
add_action('init', 'register_main_menu');
add_action('init', 'register_image_sizes');
add_action('init', 'tags_for_pages');
add_action('wp_enqueue_scripts', 'enqueue_scripts');
add_action('wp_head', 'add_analytics');

add_shortcode('youtube', 'video_shortcode');

add_theme_support('post-thumbnails');

add_filter('json_prepare_post', 'json_api_encode_acf');
add_filter( 'acf/rest_api/types', function( $types ) {
    if ( array_key_exists( 'post', $types ) ) {
        unset( $types['post'] );
    }

    return $types;
} );

function enqueue_scripts() {
  wp_enqueue_script('polyfill', get_template_directory_uri() . '/scripts/polyfills.min.js', null,  BUILD_STAMP);
  wp_enqueue_script('sysart', get_template_directory_uri() . '/scripts/index.min.js', null,  BUILD_STAMP);
  wp_enqueue_style('sysart', get_template_directory_uri() . '/styles/style.min.css', null, BUILD_STAMP);
}

function tags_for_pages() {
	register_taxonomy_for_object_type('post_tag', 'page');
}

function register_main_menu() {
  register_nav_menu('header-menu',__( 'Main Menu' ));
}

function register_image_sizes() {
  $sizes = array(300, 600, 1200, 2400);

  foreach ($sizes as $size) {
    add_image_size("$size", $size, $size);
    add_image_size("{$size}_sq", $size, $size, array('center', 'center'));
  }

  add_image_size('fb-share', 1200, 600, array('center', 'center'));
}

function video_shortcode($args) {
	$url = get_bloginfo('url');
	$autoplay = $args['autoplay'] ? $args['autoplay'] : '0';

	return <<<EOT
<div class="video-wrapper">
	<iframe type="text/html" class="video-component"
	  src="https://www.youtube.com/embed/{$args['id']}?autoplay={$autoplay}"
	  frameborder="0"></iframe>
</div>
EOT;
}

function create_post_type() {
  register_post_type( 'blog',
    array(
      'labels' => array(
        'name' => __( 'Blog posts' ),
        'singular_name' => __( 'Blog post' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'excerpt', 'thumbnail' ),
			'taxonomies' => array('post_tag')
    )
  );

  register_post_type( 'article',
    array(
      'labels' => array(
        'name' => __( 'Articles' ),
        'singular_name' => __( 'Article' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'excerpt', 'thumbnail' ),
			'taxonomies' => array('post_tag')
    )
  );

  register_post_type( 'employee',
    array(
      'labels' => array(
        'name' => __( 'Employees' ),
        'singular_name' => __( 'Employee' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title','thumbnail' ),
			'taxonomies' => array('post_tag')
    )
  );

  register_post_type( 'news',
    array(
      'labels' => array(
        'name' => __( 'News' ),
        'singular_name' => __( 'News' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'excerpt', 'thumbnail' ),
			'taxonomies' => array('post_tag')
    )
  );

  register_post_type( 'client',
    array(
      'labels' => array(
        'name' => __( 'Clients' ),
        'singular_name' => __( 'Client' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'excerpt', 'thumbnail' ),
			'taxonomies' => array('post_tag')
    )
  );

  register_post_type( 'service',
    array(
      'labels' => array(
        'name' => __( 'Services' ),
        'singular_name' => __( 'Service' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'excerpt', 'thumbnail' ),
	  'taxonomies' => array('post_tag')
    )
  );

  register_post_type( 'jobs',
    array(
      'labels' => array(
        'name' => __( 'Jobs' ),
        'singular_name' => __( 'Job' )
      ),
      'public' => true,
      'has_archive' => true,
			'taxonomies' => array('post_tag')
    )
  );

  register_post_type( 'contactinfo',
    array(
      'labels' => array(
        'name' => __( 'Contact Info' ),
        'singular_name' => __( 'Contact Info' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'excerpt', 'thumbnail', 'editor' ),
	  'taxonomies' => array('post_tag')
    )
  );

  register_post_type( 'processes',
    array(
      'labels' => array(
        'name' => __( 'Processes' ),
        'singular_name' => __( 'Process' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'editor' ),
	  'taxonomies' => array('post_tag')
    )
  );

  register_post_type( 'keynumbers',
    array(
      'labels' => array(
        'name' => __( 'Key numbers' ),
        'singular_name' => __( 'Key number' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array(),
	  'taxonomies' => array('post_tag')
    )
  );
}

function add_analytics() {
?>
  <script>
       (function (i, s, o, g, r, a, m) {
           i['GoogleAnalyticsObject'] = r;
           i[r] = i[r] || function () {
                       (i[r].q = i[r].q || []).push(arguments)
                   }, i[r].l = 1 * new Date();
           a = s.createElement(o),
                   m = s.getElementsByTagName(o)[0];
           a.async = 1;
           a.src = g;
           m.parentNode.insertBefore(a, m)
       })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

       ga('create', 'UA-1384247-1', 'auto');
       ga('send', 'pageview');

   </script>
<?php
}
