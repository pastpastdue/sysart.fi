<?php
class ServicesList {
  public function __construct($service_ids) {
    $this->service_ids = $service_ids;
  }

  public function __toString() {
    $services = '';

    foreach ($this->service_ids as $i=>$id) {
      $post = get_post($id);
      $image = wp_get_attachment_image(get_field('icon', $id), array(480, 0), false, array('class' => 'item__image'));
      $url = get_permalink($id);

      $services .= <<<EOC
<div class="col-tn-12 col-sm-6 col-lg">
  <div class="item item--square index-$i">
    <a href="$url">
      <div class="item__content">
        $image
        <div class="item__title title title--medium title--light">
          {$post->post_title}
        </div>
      </div>
    </a>
  </div>
</div>
EOC;
    }

    return <<<EOC
<div class="block row services-list">
  $services
</div>
EOC;
  }
}
