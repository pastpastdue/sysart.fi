<?php

class Social {


  public static $tags = array(
    'og:title' => null,
    'og:image' => null,
    'og:author' => null,
    'og:url' => null,
    'og:description' => null
  );

  public function __construct ($share_data, $postData) {
    $this->tags['og:site_name'] = get_bloginfo('name');
    $this->tags['og:site_url'] = get_bloginfo('url');
    $this->tags['og:title'] = $share_data['share_title'] ? $share_data['share_title'] : get_the_title();
    $this->tags['og:image'] = $share_data['share_image'] ? $share_data['share_image']['sizes']['fb-share'] : $share_data['image']['sizes']['fb-share'];
    $this->tags['og:description'] = $share_data['share_text'];
    $this->tags['og:url'] = $share_data['share_url'] ? $share_data['share_url'] : get_permalink();
    $this->tags['og:type'] = $share_data['share_type'];
    $this->tags['og:author'] = $share_data['share_author'];
  }

  public function __toString () {
    $tags = '';
    foreach ($this->tags as $key => $value) {
      if ($value) {
        $tags .= '<meta property="'.$key. '" content="'.$value.'">
        ';
      }
    }
    return $tags;
  }
}
