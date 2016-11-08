<?php

class FooterComponent {
  public function __construct($data, $classNames = array()) {
    $this->data = $data;
    $this->title = array_splice($this->data, 0, 1)[0];
    $this->infoRows = $this->data;
    $this->classNames = $classNames;
  }

  public function __toString () {
    $info = '<p>'. implode($this->infoRows, '</p><p>') .'</p>';
    $classNames = implode($this->classNames, ' ');

    return <<<EOT
    <div class="footer-component {$classNames}">
      <h4 class="footer-item-title">{$this->title}</h4>
      {$info}
    </div>
EOT;
  }
}
