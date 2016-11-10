<?php
/**
 * Template Name: Jobs
 *
 */

get_header();
$fields = get_fields();
?>
<section class="content-section">
  <div class="row large-gutter">
    <div class="col-sm-6 col-sm-push-6 col-md-4 col-md-push-8">
      <?php the_post_thumbnail(null, array('class' => 'img-responsive')); ?>
    </div>
    <div class="col-sm-6 col-sm-pull-6 col-md-8 col-md-pull-4">
      <div class="content post-content">
        <?php echo apply_filters('the_content', $post->post_content); ?>
      </div>
    </div>
  </div>
  <?php echo new Benefits($fields['benefits']); ?>
  <div class="row text-center">
    <h2><?php echo $fields['jobs_title']; ?></h2>
  </div>
  <?php echo Utils::getJobsList(); ?>
</section>
<?php
get_footer();
?>
