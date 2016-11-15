<?php
/**
 * Template Name: Service
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage sysart
 * @since sysart
 */
get_header();

$post = get_post();
$fields = get_fields();
$availableProjects = Utils::getPostsByType('client');

$projects = array();

foreach ($availableProjects as $projectId) {
  $projectFields = get_fields($projectId);

  if (is_array($projectFields['employees']) && in_array($post->ID, $projectFields['employees'])) {
    $projects[] = $projectId->ID;
  }
}

?>
    <section class="content-section row single-person">

      <div class="col-xs-12 col-md-8 person-title">
        <h1><?php echo $post->post_title; ?></h1>
      </div>


      <div class="col-xs-12 col-md-4 person-image-container">
        <div class="row">
        <?php
          echo new PersonPreview(array('item'=>$post->ID, 'classNames' => array('col-xs-12')));
        ?>
        </div>
      </div>

      <div class="col-xs-12 col-md-7 person-text post-content">
        <?php echo $fields['text']; ?>
      </div>


      <div class="col-xs-12">
        <div class="col-xs-12">
        <?php
        echo new RelatedPostList($projects, 'Mukana esimerkiksi näissä projekteissa:');
        ?>
        </div>
      </div>

      <div class="clear"></div>

    </section>



<?php
    get_footer();
?>
