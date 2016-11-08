<?php
/**
 * @name ClientPreview
 * @description Preview tile of client
 */

class ClientPreview {
  public function __construct ($post, $classNames = array(), $fields = false) {
    if (!is_object($post)) {
      $post = get_post($post);
    }

    $this->id = $post->ID;
    $this->data = $post;

    if ($fields) {
      $this->fields = $fields;
    } else {
      $this->fields = get_fields($id);
    }

    $this->image = new BackgroundImage($this->fields['image']);

    $this->classNames = $classNames;
  }

  private function getContent($image, $title, $desc) {
    return
<<<EOT
  <div class="client-preview-content-wrapper">
    <div class="client-preview-image floater">
      {$image}
    </div>
    <div class="client-preview-text">
      <h3>{$title}</h3>
      <p class="client-preview-description">{$desc}</p>
    </div>
  </div>
EOT;
  }

  private function wrapWithLink($link, $content) {
    return '<a href="' . $link . '">' . $content . '</a>';
  }

  private function renderContent($link) {
    $content = $this->getContent($this->image, $this->data->post_title, $this->fields['description']);

    if ($this->fields['disable_link']) {
      return $content;
    } else {
      return $this->wrapWithLink($link, $content);
    }
  }

  public function __toString () {
    $link = get_permalink($this->id);
    $classNames = implode($this->classNames, ' ');

    return
<<<EOT
    <div class="col-xs-12 ${classNames} client-preview">
      {$this->renderContent($link)}
    </div>
EOT;
  }
}
