<?php
class NavBar {
  public function __construct() {

  }

  public function __toString() {
    $menu_id = uniqid();
    $burger_id = uniqid();
    $container_id = uniqid();

    $home_link = get_site_url();
    $frontpage = get_post(get_option('page_on_front'));
    $logo = wp_get_attachment_image(get_field('logo', $frontpage), thumbnail, false, array('class' => 'image image--responsive'));

    $items = wp_nav_menu(array(
      'walker' => new CustomWalker(),
      'echo' => false,
      'container' => null,
      'menu_id' => $container_id,
      'menu_class' => ''
    ));

    return <<<EOC
<nav class="nav-bar" id="$menu_id">
  <div class="nav-bar__wrapper">
    <div class="nav-bar__logo">
      <a href="$home_link">
        $logo
      </a>
    </div>
    <div class="spacer"></div>
    $items
    <button id="$burger_id" class="burger-button button button--icon button--dark button--borderless">
      &#9776;
    </button>
  </div>
</nav>
EOC;
  }
}
