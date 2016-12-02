<?php
/**
 * Template Name: Jobs
 */

get_header();
the_post();
?>
<div class="container">
  <section class="content-block">
    <div class="row large-gutter">
      <div class="col-sm-6 col-sm-push-6 col-md-4 col-md-push-8">
        <?php the_post_thumbnail(array(500), array('class' => 'img-responsive post-image')); ?>
      </div>
      <div class="col-sm-6 col-sm-pull-6 col-md-8 col-md-pull-4">
        <div class="content post-content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
  <section class="content-block">
    <?php echo new Benefits(get_field('benefits')); ?>
  </section>
  <section class="content-block">
    <div class="row text-center">
      <h2><?php the_field('jobs_title'); ?></h2>
    </div>
    <?php echo Utils::getJobsList(); ?>
  </section>
</div>
<?php
get_footer();
?>
