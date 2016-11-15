<?php
/**
 * create list view of service
 */
class ServiceList extends ClientList {
  public function __construct($posts, $title = 'Palvelut', $blacklist = array(), $classNames = array(), $itemClassNames = array('col-xs-12','col-sm-6','col-md-4')) {
    $this->posts = $posts;
    $this->list = array();
    $this->title = $title;
    $this->classNames = $classNames;

    foreach ($this->posts as $item) {
      if (!in_array($item->ID, $blacklist)) {
        $this->list[] = new ServicePreview($item, false, $itemClassNames);
      }
    }
  }

  public function __toString () {
    $list = implode($this->list, '');
    $classNames = implode($this->classNames, ' ');
    if ($this->title) {

    $title = <<<EOT
    <div class="title">
      <h1>{$this->title}</h1>
    </div>
EOT;
    } else {
      $title = '';
    }

    return <<<EOT
    <div class="service-list">
      {$title}
      <div class="row">
        <div class="preview-list {$classNames}">
        {$list}
        </div>
      </div>
    </div>
EOT;
  }
}
