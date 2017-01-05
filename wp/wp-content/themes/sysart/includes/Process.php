<?php
class Process {
  public function __construct($process) {
    $steps = '';

    foreach ($process as $step) {
      $bg = StyleInjector::addBackground($step['image']);

      $steps .= <<<EOC
<div class="col-xs-6 col-md-3">
  <div class="item item--background item--square $bg">
  </div>
  <div class="item__content text--center">
    <div class="title title--small">
      {$step['title']}
    </div>
    <p>{$step['text']}</p>
  </div>
</div>
EOC;
    }

    $this->content = <<<EOC
<div class="block">
  <div class="block__content">
    <h2 class="title title--medium">Näin me toimimme:</h2>
  </div>
</div>
<div class="block block--light row no-gutter">
  $steps
</div>
EOC;
  }

  public function __toString() {
    return $this->content;
  }
}
