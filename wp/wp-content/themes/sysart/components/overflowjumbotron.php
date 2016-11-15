<?php
class OverflowJumbotron {
  public function __construct($imageArray, $overlayText = '') {
    $this->image = new BackgroundImage($imageArray);
    $this->overlayText = $overlayText;
  }

  public function __toString () {
    return <<<EOT
  <div class="overflow-jumbotron">
    {$this->image}
    <div class="jumbotron-text-wrapper" table>
      <div class="jumbotron-text" table-cell>
        <a href="{$this->link}">
          <h1>{$this->overlayText}</h1>
        </a>
      </div>
    </div>
  </div>
EOT;
  }
}
