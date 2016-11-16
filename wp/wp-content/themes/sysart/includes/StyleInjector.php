<?php
class StyleInjector {
  private static $initialized = false;
  private static $backgrounds;
  private static $sizes = array(500, 1200);


  public static function inject() {
    echo '<style>';

    foreach (self::$backgrounds as $id => $attachment_id) {
      list($url) = wp_get_attachment_image_src($attachment_id, array(self::$sizes[0], 0));

      echo <<<EOS
        .$id {
          background-image: url("$url");
        }
EOS;

      for ($i = 0; $i < count(self::$sizes); $i++) {
        $image_size = isset(self::$sizes[$i + 1]) ? array(self::$sizes[$i + 1], 0) : null;
        list($url) = wp_get_attachment_image_src($attachment_id, $image_size);
        $size = self::$sizes[$i];
        echo <<<EOS
          @media (min-width: {$size}px) {
            .$id {
              background-image: url("$url");
            }
          }
EOS;
      }
    }

    echo '</style>';
  }

  public static function addBackground($attachment_id) {
    self::init();
    $id = uniqid('background-');
    self::$backgrounds[$id] = $attachment_id;
    return $id;
  }

  private static function init() {
    if (!self::$initialized) {
      add_action('wp_head', 'StyleInjector::inject');
      self::$initialized = true;
    }
  }
}
