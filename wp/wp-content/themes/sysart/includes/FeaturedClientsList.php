<?php
class FeaturedClientsList {
  public function __construct($client_ids) {
    $this->clients = '';


    foreach ($client_ids as $id) {
      $post = get_post($id);
      $url = get_permalink($post);

      $background = StyleInjector::addBackground(get_post_thumbnail_id($post));

      $this->clients .= <<<EOC
<article class="row no-gutter">
  <div class="col-sm-6 $background item item--square item--background">
  </div>
  <div class="col-sm-6 item item--square item--text">
    <div class="item__content text-block">
      <div class="title title--highlight">
        Case tecnortree
      </div>
      <h1 class="title title--medium">prööt</h1>
      <p>{$post->post_excerpt}</p>
      <div>
        <a href="$url" class="button">Lue lisää</a>
      </div>
    </div>
  </div>
</article>
EOC;
    }

  }

  public function __toString() {
    return <<<EOC
<div class="block block--border featured-clients-list">
  {$this->clients}
</div>
EOC;
  }
}
