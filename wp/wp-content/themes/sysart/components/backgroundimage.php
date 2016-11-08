<?php

class BackgroundImage extends Image {

  public function __toString () {
    return
<<<EOT
    <div class="background-image-container loading"  data-src="{$this->getImageUrls()}" id="{$this->id}">
      <script type="text/javascript">
        (function(Site){
          Site.loadBackgroundImage(document.currentScript ? document.currentScript.parentElement : document.getElementById('{$this->id}'), {$this->getSquareValue()});
        })(Site);
      </script>
    </div>
EOT;
  }}
