<?php
/**
 * @name person
 * @description person-component
 */

// do shite

class PersonPreview extends BaseObject{
  const DEFAULT_EMAIL = '@sysart.fi';

  public $DEFAULT_CONFIG = array(
    'displayPhoneNumber' => true,
    'classNames' => array(),
    'displayLink' => true
  );

  public $LINKS = array(
    'link_linkedin' => 'ion ion-social-linkedin',
    'link_twitter' => 'ion ion-social-twitter',
    'link_github' => 'ion ion-social-github',
    'link_homepage' => 'ion ion-link'
  );


  public function __construct ($options = array()) {
    $this->setOptions($options);

    $this->person = Utils::getPerson($this->config['item']);
    $this->image = new BackgroundImage($this->person['image']);
  }

  public function _phonenumber() {
    if ($this->config['displayPhonenumber']) {
        return $this->person['phone'];
    } else {
        return '';
    }
  }

  public function buildLinks () {
    $links = '';
    foreach ($this->LINKS as $field => $icon) {
      if (isset($this->person[$field]) && !empty($this->person[$field])) {
        $links .= '<a href="'.$this->person[$field].'" target="_blank"><i class="person-social-link '.$icon.'"></i></a>';
      }
    }
    return $links;
  }

  public function __toString () {

    $tel = '';
    $email = '';

    if (isset($this->person['phone']) && $this->config['displayPhonenumber']) {
      $tel = Utils::getPhoneLink($this->person['phone']);
    }

    if (isset($this->person['email']) && $this->person['email'] !== DEFAULT_EMAIL) {
      $email = Utils::getEmailLink($this->person['email']);
    }

    $link = get_post_permalink($this->person['ID']);

    $classNames = $this->getClassNames();
    $linkStart = '';
    $linkEnd = '';

    // if ($this->config['displayLink']) {
    //   $linkStart = '<a href="'.$link.'">';
    //   $linkEnd = '</a>';
    // }

    $links = $this->buildLinks();

    return
<<<EOT
    <div class="personpreview ${classNames}">
      {$linkStart}
        <div class="person-image">
          {$this->image}
        </div>
        <div class="persontext text-center">
          <h4 class="strong">{$this->person['post_title']}</h4>
          <h5>{$this->person['title']}</h5>
          <div>
            {$tel}
          </div>
          <div>
            {$email}
          </div>
        </div>
      {$linkEnd}

      <div class="social-links-wrapper">
        {$links}
      </div>
    </div>
EOT;
  }
}
