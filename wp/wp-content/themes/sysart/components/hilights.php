<?php


class Hilights extends BaseObject {

  public $DEFAULT_CONFIG = array(
    'translations' => array(
      'service' => 'Palvelut',
      'client' => 'Referenssi',
      'blog' => 'Blogi',
      'post' => 'Artikkeli',
      'employee' => 'Työmies'
    )
  );

  public function __construct($config) {
    parent::__construct($config);

    if ($this->config['items']) {
      $this->items = Utils::getPosts($config['items']);
    }
  }


  public function __toString() {
    if (!$this->config['items']) {
      return '';
    }


    $items = array_map(function($item) {
      $link = get_page_link($item->ID);
      $fields = get_fields($item);

      $image = new BackgroundImage($fields['image']);


      return <<<EOT
    <a href="{$link}">
      <div class="hilight-item col-xs-12 col-sm-6">
        <div class="hilight-container">
          {$image}
          <div class="hilight-image-overlay"></div>
          <div class="hilight-content-wrapper">
            <div class="hilight-content">
              <h3 class="hilight-title">{$item->post_title}</h3>
              <h5 class="hilight-title">{$this->config['translations'][$item->post_type]}</h5>
            </div>
          </div>
        </div>
      </div>
    </a>
EOT;
    }, $this->items);

    $items = implode($items, '');

    return <<<EOT
      </div>
    </div>
      <div class="hilight-items">
        <div class="row">
          <div class="items-wrapper col-xs-12">
          {$items}
          </div>
        </div>
      </div>
    <div id="wrapper" class="container">
      <div class="main-container">
EOT;
  }
}
