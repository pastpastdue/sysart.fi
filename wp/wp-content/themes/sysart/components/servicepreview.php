<?php
/**
 * @name ServicePreview
 * @description Preview tile of client
 */

class ServicePreview {
  public function __construct ($id, $fields = false, $classNames = array('col-xs-12','col-sm-6','col-md-4')) {
    if (is_object($id)) {
      $this->data = $id;
    } else {
      $this->data = get_post($id);
    }

    $this->classNames = $classNames;
    $this->id = $this->data->ID;
    $this->fields = $fields ? $field : get_fields($id);
    $this->image = new Image($this->fields['icon']);
  }

  public function __toString () {
    $link = get_permalink($this->id);
    $classNames = implode($this->classNames, ' ');

    return
<<<EOT
  <div class="service-preview preview-item floater {$classNames}">
    <div class="preview-item-inner-wrapper">
      <a href="{$link}">
        <div table>
          <div class="text-center" table-cell>
              <div class="service-icon">
                {$this->image}
              </div>

              <div class="service-text">
                <h2>{$this->data->post_title}</h2>
                <p>{$this->fields['description']}</p>
              </div>
          </div>
        </div>
      </a>
    </div>
  </div>
EOT;
  }
}
