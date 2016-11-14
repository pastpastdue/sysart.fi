<?php

class MainMenu {
  public function __construct($name) {
    $this->name = $name;
    $this->title = get_the_title();
    $this->id = uniqid();

    $frontpage = get_post( get_option( 'page_on_front' ) );
    $fields = get_fields($frontpage->ID);

    $this->logo = wp_get_attachment_image($fields['logo']['id']);
  }

  public function __toString() {
    $link = get_site_url();

    $items = wp_nav_menu(array(
      'menu' => $this->name,
      'walker' => new MenuWalker(),
      'echo' => false
    ));

    $content = <<<EOT
      <nav class="main-menu" id="{$this->id}">
        <div class="container">
          <div class="main-link">
            <a href="{$link}">
              {$this->logo}
            </a>
          </div>
          $items
        </div>
        <div id="menu-burger">&#9776;</div>
        <script type="text/javascript">(function(Site){ Site.initMenu(document.currentScript ? document.currentScript.parentElement : document.getElementById('{$this->id}'), document.getElementById('menu-burger')); })(Site);</script>
      </nav>
EOT;

    return $content;
  }
}
