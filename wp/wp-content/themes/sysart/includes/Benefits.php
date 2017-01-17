<?php
class Benefits {
  public function __construct($benefits) {
    $this->benefits = $benefits;
  }

  public function __toString() {
    $benefits = '';

    foreach ($this->benefits as $benefit) {
      $image = wp_get_attachment_image($benefit['image'], array(768, 0), false, array('class' => 'item__image item__icon'));

      $benefits .= <<<EOC
        <div class="col-tn-6 col-xs-6 col-sm-3 col-md-3 col-lg-3">
          <div class="item item--square">
              <div class="item__content">
                $image
                <div class="title--icon">
                  {$benefit['benefit']}
                </div>
              </div>
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
