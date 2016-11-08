<?php
class CaseNumbers {
    public function __construct($numbers = array()) {
        $this->numbers = $numbers;
    }

    private function _createSingleKeyNumber($keyNumber) {
        return
<<<EOT
    <div class="col-xs-12 col-sm-4 case-number">
        <span class="amount">{$keyNumber->post_title}</span>
        <span class="title">{$keyNumber->post_content}</span>
   </div>
EOT;
    }

    public function __toString () {
      if (is_array($this->numbers) && count($this->numbers)) {

        $numbers = array_map(function($keyNumber) {
            return $this->_createSingleKeyNumber($keyNumber);
        }, $this->numbers);

        $st = implode($numbers, '');

        return
<<<EOT
  </div>
</div>
    <div class="case-numbers clearfix">
        <div class="container">
           {$st}
        </div>
    </div>
    <div id="wrapper" class="container">
      <div class="main-container">
EOT;
    } else {
      return '';
    }

    }
}
