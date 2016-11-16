<?php
class ServiceList {
  public function __construct($service_ids) {
    $this->service_ids = $service_ids;
  }

  public function __toString() {
    $services = '';

    foreach ($this->service_ids as $id) {
      $post = get_post($id);
      $image = wp_get_attachment_image(get_field('icon', $id), 'thumbnail', false, array('class' => 'item__image'));

      $services .= <<<EOC
<div class="col-sm-4 item item--square">
  <div class="item__content">
    $image
    <div class="item__title">
      {$post->post_title}
    </div>
  </div>
</div>
EOC;
    }

    return <<<EOC
<div class="block block--dark row no-gutter service-list">
  $services
</div>
EOC;
  }
}
