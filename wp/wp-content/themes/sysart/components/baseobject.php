<?php

class BaseObject {

  public function __construct($config) {
    $this->setOptions($config);
  }

  public function setOptions($config) {
    $this->config = array_merge($this->DEFAULT_CONFIG, $config);
  }

  public function getClassNames() {
    return implode($this->config['classNames'], ' ');
  }
}
