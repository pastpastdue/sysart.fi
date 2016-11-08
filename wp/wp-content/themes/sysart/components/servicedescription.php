<?php
class ServiceDescription {
  public function __construct($text, $image) {
    $this->image = new Image($image);
    $this->text = $text;
  }

  public function __toString () {
    return
<<<EOT
      <div class="servicedescription row">
        <div class="col-xs-6 col-sm-4 col-xs-offset-3 col-sm-offset-0 col-sm-push-8 iconimage">
          <div class="contentwrapper">
            {$this->image}
          </div>
        </div>
        <div class="col-xs-12 col-sm-7 col-sm-pull-4 description">
          {$this->text}
        </div>
      </div>
EOT;
  }
}
