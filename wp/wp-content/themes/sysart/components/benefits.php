<?php
class Benefits {
  public function __construct($benefits) {
    $this->benefits = $benefits;
  }

  public function __toString() {
    $content = '';

    foreach ($this->benefits as $benefit) {
      $image = wp_get_attachment_image($benefit['image'], null, false);
      $content .= <<<EOC
        <div class="benefit">
          $image
          {$benefit['benefit']}
        </div>
EOC;
    }

    return <<<EOC
      <div class="benefits">
        $content
      </div>
EOC;
  }
}
