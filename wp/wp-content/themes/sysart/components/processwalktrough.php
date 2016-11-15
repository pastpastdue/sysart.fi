<?php
class ProcessWalktrough {
  public function __construct($processes = []) {
     //echo '<pre>',print_r($processes),'</pre>';
    $this->processes = $processes;
  }

  private function createProcess($process) {
    return new Process($process);
  }

  public function __toString () {

    if (is_array($this->processes) && count($this->processes)) {
      $processes = array_map(function($process) {
        return $this->createProcess($process);
      }, $this->processes);

      $renderString = implode($processes, '');

      return
<<<EOT
    <h4 class="bold-title">Näin me toimimme:</h4>
    <div class="processwalktrough row">
        {$renderString}
    </div>
EOT;
  } else {
    return '';
  }

  }
}
