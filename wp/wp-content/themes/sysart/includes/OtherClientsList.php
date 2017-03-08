<?php
class OtherClientsList {
  public function __construct($client_logos) {
    $this->clients = '';

    foreach ($client_logos as $data) {
      $background = StyleInjector::addBackground($data['logo']);

      $this->clients .= <<<EOC
<section class="col-xs-6 col-sm-3 col-md-2">
  <div class="item item--square item--background item--contain $background" title="{$data['name']}">
  </div>
</section>
EOC;
    }

  }

  public function __toString() {
    return <<<EOC
<div class="block row no-gutter text text--small">
  {$this->clients}
</div>
EOC;
  }
}
