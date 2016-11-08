<?php
class Process {
  public function __construct($process) {
      if (is_object($process)) {
        $this->data = $process;
      } else {
        $this->data = get_post($process);
      }

      $this->fields = get_fields($process);
      $this->image = new BackgroundImage($this->fields['image']);


      //echo '<pre>',print_r($this->data),'</pre>';
      //echo '<pre>',print_r($this->fields),'</pre>';


  }

  public function __toString () {

    return
<<<EOT
    <div class="col-xs-12 col-sm-6 col-md-3 process">
        <div class="imagewrapper">
            {$this->image}
        </div>
        <div class="textcontent">
            <span class="title">{$this->data->post_title}</span>
            <span class="description">{$this->data->post_content}</span>
        </div>
    </div>
EOT;
  }
}
