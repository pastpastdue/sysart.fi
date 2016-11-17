<?php
class CustomWalker extends Walker {
  public function __construct($li_class = '') {
    $this->li_class = $li_class;
  }

  var $db_fields = array( 'parent' => 'parent_id', 'id' => 'object_id' );

  public function start_lvl(&$output, $depth = 0, $args = array()) {
    $output .= "<ul>";
  }

  public function end_lvl (&$output, $depth = 0, $args = array()) {
    $output .= '</ul>';
  }

  public function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
    $output .= "<li class=\"{$this->li_class}\"><a href=\"{$item->url}\"> {$item->title}";
  }

  public function end_el(&$output, $item, $depth = 0, $args = array()) {
    $output .= '</a></li>';
  }
}
