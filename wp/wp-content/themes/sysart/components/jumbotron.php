<?php
class Jumbotron {
  public function __construct($pageData) {
    $this->image = new Image( $pageData['jumbotron_image'] );
    $this->text = $pageData['jumbotron_text'];
    $this->excerpt = $pageData['jumbotron_excerpt'];
    // $this->link = $pageData['jumbotron_link'];
  }

  private function getContent() {
    $excerpt = '';

    if ($this->excerpt) {
        $excerpt = '<div class="jumbotron-excerpt-wrapper">'.apply_filters('the_content', $this->excerpt).'</div>';
    }

    return
<<<EOT
      {$this->image}
      <h1>{$this->text}</h1>

      {$excerpt}
EOT;
  }

  public function setLink($content) {
    if (!$this->link) {
      return $content;
    }

    return <<<EOT
      <a href="{$this->link}">
        {$content}
      </a>
EOT;
  }

  public function __toString () {

    $content = $this->getContent();
    $content = $this->setLink($content);

    return
<<<EOT
    <div class="main-jumbotron col-xs-12" table>
        <div class="text-center text-container" table-cell>
          {$content}
        </div>
    </div>
EOT;
  }
}
