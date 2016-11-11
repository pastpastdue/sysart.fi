<?php
/**
 * create list view of clients
 */
class ClientList {

  // might be good idea to use array instead of
  // fucking 'orrible set of args
  public function __construct($posts, $title = 'Referenssit', $blacklist = array(), $fullPreviews = true, $footerPreviews = true) {
    $this->posts = $posts;
    $this->list = array();
    $this->title = $title;

    foreach ($this->posts as $item) {
      if (!in_array($item->ID, $blacklist)) {
        $classNames = array();

        $fields = get_fields($item->ID);

        if (!$footerPreviews && $fields['footer_preview']) {
            // do something?
        } else {
          if ($fields['full_preview'] && $fullPreviews) {
            $classNames[] = 'col-xs-12 client-preview-full';
          } else {
            $classNames[] = 'col-xs-12 col-sm-6 col-md-4 client-preview-tile';
          }

          $this->list[] = new ClientPreview($item, $classNames, $fields);
        }
      }
    }
  }

  public function __toString () {
    $list = implode($this->list, '');
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
    <section class="content-section">
      {$title}
      <div class="row preview-list">
      {$list}
      </div>
    </section>
EOT;
  }
}
