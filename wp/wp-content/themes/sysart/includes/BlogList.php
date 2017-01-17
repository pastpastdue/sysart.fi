<?php
class BlogList {
  public function __construct($blog_ids, $center = false) {
    $this->blogs = '';
    $this->center = $center;

    foreach ($blog_ids as $id) {
      $post = get_post($id);
      $url = get_permalink($post);

      $background = StyleInjector::addBackground(get_field('image', $id));

      $this->blogs .= <<<EOC
<article class="col-xs-12 col-sm-6 col-md-4">
  <div class="item item--small-margin item--square item--background $background item--hover">
    <a href="$url">
      <div class="item__content">
        <h1 class="title title--medium">
          {$post->post_title}
        </h1>
      </div>
    </a>
  </div>
</article>
EOC;
    }

  }

  public function __toString() {
    $class = "row";

    if ($this->center) {
      $class .= " row--center";
    }

    return <<<EOC
<div class="block $class text text--small">
  {$this->blogs}
</div>
EOC;
  }
}
