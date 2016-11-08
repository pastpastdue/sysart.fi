<?php
class PricingModel {
  public function __construct($text, $image) {
    $this->image = new BackgroundImage($image);
    $this->text = $text;
  }

  public function __toString () {

    return
<<<EOT
    <div class="pricingmodel row">
        <div class="col-xs-12 col-sm-6 iconimage">
            <div class="contentwrapper">
                {$this->image}
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 description">
            <div class="contentwrapper">
                <p class="text">
                    {$this->text}
                </p>
            </div>
        </div>
    </div>
EOT;
  }
}
