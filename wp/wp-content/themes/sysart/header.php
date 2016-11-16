<?php
spl_autoload_register(function ($name) {
  include 'components/'.strtolower($name).'.php';
});

$frontpage = get_post( get_option( 'page_on_front' ) );
$fields = get_fields($frontpage->ID);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="initial-scale=1.0">
    <meta name="description" content="<?php echo $fields['meta_description']; ?>">
    <meta name="keywords" content="<?php echo $fields['meta_keywords']; ?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script type="text/javascript">

      // this is not our view of security, it is just for keeping most of useseless spambots away from our emails and phones
      var OBFUSCATION_KEY = '<?php echo Utils::KEY; ?>';

    </script>
    <link rel="icon" href="<?php  echo get_template_directory_uri(); ?>/favicon.ico">

    <title><?php the_title(); ?></title>
    <?php
    echo new Social(get_fields(), $post);
    wp_head();
    ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="wrapper">
      <?php // echo new MainMenu('header-menu'); ?>
