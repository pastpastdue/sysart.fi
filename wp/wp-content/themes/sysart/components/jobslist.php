<?php
class JobsList {
  public function __construct($jobs) {
    $this->jobs = $jobs;
  }

  public function __toString() {
    /** @var WP_Post $job */

    $content = '<div class="jobs-list">';

    foreach ($this->jobs as $job) {
      $link = get_permalink($job->ID);

      $content .= <<<EOC
        <div class="job-item">
          <a href="{$link}">
            <div class="job-title">
              <h3>{$job->post_title}</h3>
              <p>{$job->post_excerpt}</p>
            </div>
          </a>
        </div>
EOC;
    }

    $content .= '</div>';

    return $content;
  }
}
