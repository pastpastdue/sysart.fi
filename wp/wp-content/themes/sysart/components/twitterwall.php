<?php
class Twitterwall {
  public function __construct() {

  }

  public function __toString () {
    $url = get_template_directory_uri() . '/scripts/twitterwall.min.js';
    return
<<<EOT
    <div class="twitterwall">
        <div class="tweet-container" id="tweet-container">
        </div>
        <script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="{$url}"></script>
    </div>
EOT;
  }
}
