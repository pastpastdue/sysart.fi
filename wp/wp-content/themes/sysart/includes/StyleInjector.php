<?php
class StyleInjector {
  private $backgrounds;
  static private $sizes = array(500, 1200);

  private function __construct() {
    add_action('wp_head', array($this, 'inject'));
  }

  public function inject() {
    echo '<style>';

    foreach ($this->backgrounds as $id => $attachment_id) {
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

  private static $instance;

  private static function init() {
    if (!self::$instance) {
      self::$instance = new StyleInjector();
    }

    return self::$instance;
  }

  public static function addBackground($attachment_id) {
    $injector = self::init();
    $id = uniqid('background-');
    $injector->backgrounds[$id] = $attachment_id;
    return $id;
  }
}
