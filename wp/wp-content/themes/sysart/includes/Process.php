<?php
class Process {
  public function __construct($process) {
    $this->process = $process;
  }

  public function __toString() {
    $steps = '';


    foreach ($this->process as $step) {
      $image = wp_get_attachment_image($step['image'], 'thumbnail', false, array('class' => 'image image--responsive image--center'));

      $steps .= <<<EOC
<div class="col-sm-3 text-center">
  $image
  <div class="title title--small">
    {$step['title']}
  </div>
  <p>{$step['text']}</p>
</div>
EOC;
    }

    return <<<EOC
<div class="row">
  $steps
</div>
EOC;
  }
}
