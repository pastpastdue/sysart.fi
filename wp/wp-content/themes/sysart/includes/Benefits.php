<?php
class Benefits {
  public function __construct($benefits) {
    $this->benefits = $benefits;
  }

  public function __toString() {
    $benefits = '';

    foreach ($this->benefits as $benefit) {
      $image = wp_get_attachment_image($benefit['image'], array(768, 0), false, array('class' => 'item__image'));

      $benefits .= <<<EOC
        <div class="col-xs-6 col-md-4 col-lg-2">
          <div class="item item--square">
            <a href="$url">
              <div class="item__content">
                $image
                <div class="item__title">
                  {$benefit['benefit']}
                </div>
              </div>
            </a>
          </div>
        </div>
EOC;
    }

    return <<<EOC
      <div class="row">
        $benefits
      </div>
EOC;
  }
}
