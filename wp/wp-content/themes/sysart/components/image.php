<?php

class Image {

  public function __construct ($imageObject,  $classNames = array(), $sizes = array(), $square = false) {
    $this->imageData = array(
      'id' => $imageObject['id'],
      'title' => $imageObject['title'],
      'alt' => $imageObject['alt'],
      'caption' => $imageObject['caption'],
      'description' => $imageObject['description']
    );

    $this->id = uniqid();
    $this->classNames = $classNames;
    $this->parseImageSizes($imageObject);
    $this->preferredSizes = $sizes;

    $this->square = $square;
    if ($this->sizes['original']['width'] == $this->sizes['original']['height']) {
      $this->square = true;
    }
  }

  public function parseImageSizes($image) {
    $imageSizes = array();
    if (!$image['sizes']) {
      return $imageSizes;
    }

    foreach ($image['sizes'] as $key => $value) {
        if (strpos($key, '-width')) {
            $imageSizes[str_replace('-width', '', $key)]['width'] = $value;
        } else if (strpos($key, '-height')) {
            $imageSizes[str_replace('-height', '', $key)]['height'] = $value;
        } else {
          $imageSizes[$key]['url'] = $value;
        }
    }

    $imageSizes['original'] = array(
      'width' => $image['width'],
      'height' => $image['height'],
      'url' => $image['url']
    );

    $this->sizes = $imageSizes;
  }

  public function getImageUrls () {
    $sizes = $this->sizes;
    if (count($this->preferredSizes) > 0) {
      $sizes = array();

      foreach ($this->preferredSizes as $key) {
        $sizes[$key] = $this->sizes[$key];
      }
    }

    $sizeArray = array();
    foreach ($sizes as $size) {
      $sizeArray[$size['width'] . 'x' . $size['height']] = $size;
    }

    return htmlentities(json_encode(array_values($sizeArray)), ENT_QUOTES, 'UTF-8');
  }

  public function getImage($size) {
    return $this->sizes[$size];
  }

  public function getSquareValue() {
    return $this->square ? 'true' : 'false';
  }


  public function __toString () {
    $classNames = implode($this->classNames, ' ');
    if ($this->imageData['id']) {
      return
<<<EOT
      <div class="image-container loading js-image ${classNames}" id={$this->id} data-square="{$this->getSquareValue()}">
        <div class="image-inner-wrapper">
          <img data-size="auto" data-src="{$this->getImageUrls()}"/>
        </div>
        <script type="text/javascript">
          (function(Site) {
            //Site.loadImage(document.currentScript ? document.currentScript.parentElement : document.getElementById('{$this->id}'), {$this->getSquareValue()});
          })(Site);
        </script>
      </div>
EOT;
    } else {
      return '';
    }
  }
}
