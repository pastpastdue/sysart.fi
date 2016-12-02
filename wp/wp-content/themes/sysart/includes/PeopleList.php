<?php
class PeopleList {
  const SOCIAL_LINKS = array(
    'link_linkedin' => 'ion ion-social-linkedin',
    'link_twitter' => 'ion ion-social-twitter',
    'link_github' => 'ion ion-social-github',
    'link_homepage' => 'ion ion-link'
  );

  public function __construct($people, $center = false) {
    $this->people = $people;
    $this->center = $center;

    $this->content = "";

    foreach ($this->people as $person_id) {
      $person = get_post($person_id);
      $bg = StyleInjector::addBackground(get_field('image', $person->ID));

      $fields = get_fields($person->ID);
      $email = $this->create_email_link($fields['email']);
      $phone = $this->create_phone_link($fields['phone']);
      $social_links = $this->create_social_links($fields);

      $this->content .= <<<EOC
<section class="col-tn-12 col-xs-6 col-sm-4 col-md-3 employee-card">
  <div class="item item--background item--square $bg">
  </div>
  <div class="item item--square">
    <div class="item__content people-content">
      <h1 class="title title--small">{$person->post_title}</h1>
      <h2 class="title title--thinner">{$fields['title']}</h2>
      $phone
      $email
      $social_links
    </div>
  </div>
</section>
EOC;
    }
  }

  public function __toString() {
    $class = "row";

    if ($this->center) {
      $class .= " row--center";
    }

    return <<<EOC
<div class="block">
  <div class="$class">
    {$this->content}
  </div>
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

    return $links ? "<div class=\"employee-card__social-links\">$links</div>" : "";
  }
}
