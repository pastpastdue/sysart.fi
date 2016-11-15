<?php
class ReferenceWindow {
  public function __construct($post_id, $title, $text) {
    $this->post_id = $post_id;
    $this->title = $title;
    $this->text = $text;
  }

  public function __toString() {
    if (!$this->post_id) return '';

    $link = get_post_permalink($this->post_id);
    $image = get_the_post_thumbnail($this->post_id);

    return <<<EOC
      <section class="reference-window">
        <span class="title-jotain">{$this->title}</span>
        <a href="$link">
          {$image}
          <div class="link-box">
            {$this->text}
          </div>
        </a>
      </section>
EOC;
  }
}
