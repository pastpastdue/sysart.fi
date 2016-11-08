<?php

class MainMenu {
  public function __construct($name) {
    $this->name = $name;
    $this->title = get_the_title();
    $this->id = uniqid();

    $frontpage = get_post( get_option( 'page_on_front' ) );
    $fields = get_fields($frontpage->ID);

    $this->logo = new Image($fields['logo'], array(), array('original'));
  }

  public function __toString() {
    $link = get_site_url();

    $content = <<<EOT
<nav class="main-menu" id="{$this->id}">
  <div class="container">
    <div class="menu-logo">
      {$this->logo}
      <a class="main-link" href="{$link}"></a>
    </div>
EOT;

      $content .= wp_nav_menu(array(
        'menu' => $this->name,
        'walker' => new MenuWalker(),
        'echo' => false
      ));

      $content .= <<<EOT
    </div>
    <div class="menu-burger">&#9776;</div>
    <script type="text/javascript">(function(Site){ Site.initMenu(document.currentScript ? document.currentScript.parentElement : document.getElementById('{$this->id}')); })(Site);</script>
  </nav>
EOT;

    return $content;
  }
}
