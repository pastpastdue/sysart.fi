<?php
/**
 * @name person
 * @description related posts component
 */

class RelatedPostList {
  public function __construct ($postIds, $title = 'Lue myös:', $classNames = array(), $postClassNames = array('has-overlay')) {
    $this->postIds = $postIds;
    $this->title = $title;

    $this->classNames = $classNames;
    $this->postClassNames = $postClassNames;
  }

  private function createRelatedPost($postId) {
    return new RelatedPost($postId);
  }

  public function __toString () {

    if (count($this->postIds) <= 0) {
      return '';
    }

    $relatedPosts = array_map(function($relatedPostId) {
        return $this->createRelatedPost($relatedPostId, $this->postClassNames);
    }, $this->postIds);

    //print_r($relatedPosts);

    $renderString = implode($relatedPosts, '');
    $classNames = implode($this->classNames, ' ');

    return
<<<EOT
    <div class="row relatedpostlist ${classNames}">
        <h2 class="centered-title">{$this->title}</h2>
        <div class="content-section row">
          {$renderString}
        </div>
    </div>
EOT;
  }
}
