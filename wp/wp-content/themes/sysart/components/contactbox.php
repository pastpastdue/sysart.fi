<?php
/**
 * @name person
 * @description person-component
 */

// do shite

class ContactBox {
  public function __construct ($contactInfo) {
     //.Trashes/print_r($contactInfo);
     $this->contactInfo = $contactInfo;
     $this->image = new Image($this->contactInfo['image']);
  }

  public function __toString () {
    //echo '<pre>',print_r($this->contactInfo),'</pre>';
    $lines = preg_split('/\r\n|\n|\r/', $this->contactInfo['post_content']);
    $info = '<div>'.implode($lines, '</div><div>').'</div>';
    return
<<<EOT
    <div class="col-xs-12 col-md-4 contactbox">
        <div class="image">
            {$this->image}
        </div>
        <div class="info-wrapper">
            <h2>{$this->contactInfo['subtitle']}</h2>
            {$info}
        </div>
    </div>
EOT;
  }
}
