<?php
/**
 * @name person
 * @description related posts component
 */

class RelatedPost {
  public function __construct ($postId, $classNames = array()) {
    if (!is_object($postId)) {
        $this->post = get_post($postId);
    }

    $this->fields = get_fields($postId);
    $this->image = new BackgroundImage($this->fields['image']);
    $this->url = get_permalink($this->post);

    $this->classNames = $classNames;
  }

  public function __toString () {

    $classNames = implode($this->classNames, ' ');

    return
<<<EOT
    <div class="col-xs-12 col-sm-6 col-md-4 relatedpost {$classNames}">
      <a href="{$this->url}">
        <div class="contentwrapper">
            {$this->image}
        </div>
        <div class="title-wrapper">
          <div class="title">{$this->post->post_title}</div>
        </div>
      </a>
    </div>
EOT;
  }
}
