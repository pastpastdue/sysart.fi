<?php
/**
 * @name MinimalClientList
 * @description MinimalClientList
 */

class MinimalClientList {

    public function __construct($clientlist, $parent_post_id) {
        $this->clients = '';
        $this->parent = $parent_post_id;

        foreach ($clientlist as $client) {
            if($client->ID == $this->parent) { continue; }
            
            $post = get_post($client->ID);
            $url = get_permalink($post);

            $background = StyleInjector::addBackground(get_post_thumbnail_id($post));

            $this->clients .= <<<EOC
<section class="col-xs-12 col-sm-4 col-md-3">
  <div class="item item--small-margin item--square item--background $background item--hover item--hide-blur">
    <a href="$url"></a>
  </div>
  <div class="people-content no-child-margins text--center">
    <a href="$url">
      <h2 class="title title--thinner">{$post->post_title}</h2>
    </a>
  </div>
</section>
EOC;
        }

    }

    public function __toString() {
        return <<<EOC
<div class="block block--condensed-top block--condensed-bottom">
  <div class="block__content">
    <h2 class="title title--medium">Muut asiakkaat</h2>
  </div>
</div>
<div class="block row no-gutter text text--small">
  {$this->clients}
</div>
EOC;
    }
}
