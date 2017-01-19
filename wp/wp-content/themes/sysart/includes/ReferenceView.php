<?php
class ReferenceView {
  public function __construct($post_id, $title, $text) {
    $link = get_post_permalink($post_id);
    $background = StyleInjector::addBackground(get_post_thumbnail_id($post_id));

    $this->content = <<<EOC
<div class="block block--border">
  <div class="row no-gutter">
    <div class="col-sm-6 item item--square item--background $background"></div>
    <div class="col-sm-6 item item--square">
      <div class="item__content child-margins">
        <p>
          {$title}
        </p>
        <a href="$link" class="button">
          {$text}
        </a>
      </div>
    </div>
  </div>
</div>
EOC;
  }

  public function __toString() {
    return $this->content;
  }
}
