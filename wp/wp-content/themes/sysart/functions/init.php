<?php
add_action('init', function () {
  register_taxonomy_for_object_type('post_tag', 'page');
  register_nav_menu('header-menu', __('Main Menu'));
});
