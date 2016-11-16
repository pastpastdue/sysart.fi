<?php
class NavBar {
  public function __construct() {

  }

  public function __toString() {
    $home_link = get_site_url();
    $frontpage = get_post(get_option('page_on_front'));
    $logo = wp_get_attachment_image(get_field('logo', $frontpage));

    $items = wp_nav_menu(array(
      'walker' => new CustomWalker(),
      'echo' => false,
      'container' => null,
      'menu_class' => ''
    ));

    return <<<EOC
<header class="nav-bar">
  <div class="nav-bar__wrapper">
    <div class="nav-bar__logo">
      <a href="$home_link">
        $logo
      </a>
    </div>
    $items
    <button class="button button--icon button--dark button--borderless">
      &#9776;
    </button>
  </div>
</header>
EOC;
  }
}
