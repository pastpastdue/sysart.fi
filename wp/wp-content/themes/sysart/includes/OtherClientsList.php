<?php
class OtherClientsList {
  public function __construct($client_ids) {
    $this->clients = '';

    foreach ($client_ids as $id) {
      $post = get_post($id);
      $url = get_permalink($post);

      $background = StyleInjector::addBackground(get_field('image', $id));

      $this->clients .= <<<EOC
<section class="col-xs-6 col-sm-3 col-md-2">
  <div class="item item--square item--background item--contain $background">
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
