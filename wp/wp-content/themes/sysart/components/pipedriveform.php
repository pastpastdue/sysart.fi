<?php

class PipedriveForm {
  public function __construct($formId = null) {
    $this->formId = $formId;
  }

  public function __toString () {
    if (!$this->formId) return '';

return
<<<EOT
<div class="pipedriveform">
    <div class="pipedriveWebForms" data-pd-webforms="https://pipedrivewebforms.com/form/{$this->formId}"><script src="https://pipedrivewebforms.com/webforms.min.js"></script></div>
</div>
<script>
    window.onload = function() {
        var cont = document.querySelector('.pipedriveform');
        var frame = cont.querySelector('iframe');
        frame.onload = function() {
            cont.style.display = "block";
        }
    }
</script>
EOT;
  }
}
