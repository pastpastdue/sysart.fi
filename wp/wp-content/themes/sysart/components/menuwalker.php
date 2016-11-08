<?php
/**
 * @name Navigation
 * @description main menu nav
 */
class MenuWalker extends Walker {

  var $db_fields = array( 'parent' => 'parent_id', 'id' => 'object_id' );

  function start_lvl (&$output, $depth = 0, $args = array()) {
    $output .= '<ul class="menu">';
  }

  function end_lvl (&$output, $depth = 0, $args = array()) {
    $output .= '</ul>';
  }

  function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
    $output .= '<li class="menu-item"><a href="'.$item->url.'">'. $item->title;
  }

  function end_el(&$output, $item, $depth = 0, $args = array()) {
    $output .= '</a></li>';
  }
}
