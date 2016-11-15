<?php
class PostGrid extends BaseObject {

  public $DEFAULT_CONFIG = array();

  public function __construct($config = array()) {
    parent::__construct($config);

    $this->posts = Utils::getPosts($config['items']);
    // force two column layout for all items
    $this->force = $config['force'];
  }

  public function __toString() {

    $counter = 0;
    $content = array_map(function($post) {
      global $counter;

      $counter++;
      $fields = get_fields($post->ID);

      $postImage = new BackgroundImage($fields['image']);
      $link = get_permalink($post->ID);
      $classNames = 'col-xs-12 col-sm-6 col-md-4';

      if ($this->force || $counter <= 2) {
        $classNames = 'col-xs-12 col-sm-6';
      }


      return <<<EOT
      <div class="post-grid-item {$classNames}">
        <a href="{$link}">
          <div class="content-wrapper">
            {$postImage}
            <div class="title-wrapper">
              <div class="title-content">
                <h3 class="title">{$post->post_title}</h3>
              </div>
            </div>
          </div>
        </a>
      </div>
EOT;
    }, $this->posts);

    $content = implode($content, '');

    return <<<EOT
    <div class="post-grid row">
      {$content}
    </div>
EOT;
  }
}
