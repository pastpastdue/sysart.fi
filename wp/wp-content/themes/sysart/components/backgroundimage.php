<?php

class BackgroundImage extends Image {

  public function __toString () {
    return
<<<EOT
    <div class="background-image-container loading js-background-image"  data-src="{$this->getImageUrls()}" id="{$this->id}" data-square="{$this->getSquareValue()}"></div>
EOT;
  }}
