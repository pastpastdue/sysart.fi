<?php
class JobsList {
  public function __construct($jobs) {
    $this->jobs = $jobs;
  }

  public function __toString() {
    /** @var WP_Post $job */

    $content = '';

    foreach ($this->jobs as $job) {
      $url = get_permalink($job->ID);

      $content .= <<<EOC
<article class="col-xs-6 col-sm-4 col-md-3">
  <div class="item item--small-margin item--square">
    <a href="$url" class="button button--reverse">
      <div class="item__content">
        <h1 class="title title--small title--margin-double">
          {$job->post_title}
        </h1>
        <p>{$job->post_excerpt}</p>
      </div>
    </a>
  </div>
</article>
EOC;
    }

    return <<<EOC
<div class="block">
  <div class="row row--center">
    $content
  </div>
</div>
EOC;
  }
}
