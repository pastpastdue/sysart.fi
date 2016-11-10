<?php
class Benefits {
  public function __construct($benefits) {
    $this->benefits = $benefits;
  }

  public function __toString() {
    $content = '<div class="benefits">';

    foreach ($this->benefits as $benefit) {
      $image = wp_get_attachment_image($benefit['image'], null, false);
      $content .= <<<EOC
        <div class="benefit">
          $image
          {$benefit['benefit']}
        </div>
EOC;
    }

    $content .= '</div>';
    return $content;
  }
}
