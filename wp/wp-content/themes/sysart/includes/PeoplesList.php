<?php
class PeoplesList {
  const SOCIAL_LINKS = array(
    'link_linkedin' => 'ion ion-social-linkedin',
    'link_twitter' => 'ion ion-social-twitter',
    'link_github' => 'ion ion-social-github',
    'link_homepage' => 'ion ion-link'
  );

  public function __construct($peoples) {
    $this->peoples = $peoples;
  }

  public function __toString() {
    /** @var WP_Post $people */
    $content = "";

    foreach ($this->peoples as $people) {
      $image = wp_get_attachment_image(get_field('image', $people->ID), array(768, 768), false, array('class' => 'image image--responsive'));
      $fields = get_fields($people->ID);

      $email = $this->create_email_link($fields['email']);
      $phone = $this->create_phone_link($fields['phone']);
      $social_links = $this->create_social_links($fields);

      $content .= <<<EOC
<section class="col-xs-12 col-sm-4 col-md-3">
  $image
  <div class="item item--square">
    <div class="item__content no-child-margins people-content">
      <h1 class="title title--small">{$people->post_title}</h1>
      <h2 class="title title--thinner">{$fields['title']}</h2>
      $phone
      $email
      $social_links
    </div>
  </div>
</section>
EOC;
    }

    return <<<EOC
<div class="block row no-gutter peoples-list text text--small">
  $content
</div>
EOC;
  }

  private function create_email_link($email) {
    if (!$email) return '';

    $obfuscated_email = str_rot13($email);

    return <<<EOC
<div>
  <a class="secretive-link link-email" href="mailto:$obfuscated_email">$obfuscated_email</a>
</div>
EOC;
  }

  private function create_phone_link($phone) {
    if (!$phone) return '';

    return <<<EOC
<div>
  <a href="tel:$phone">$phone</a>
</div>
EOC;
  }

  private function create_social_links($fields) {
    $links = '';

    foreach (self::SOCIAL_LINKS as $link_key => $link_class) {
      if ($fields[$link_key]) {
        $value = $fields[$link_key];
        $links .= "<a href=\"$value\" target=\"_blank\"><i class=\"$link_class\"></i></a>";
      }
    }

    return $links ? "<div class=\"social-links\">$links</div>" : "";
  }
}
