<?php
/**
 * Template Name: Jobs
 */

the_post();

$jobs = Utils::getJobs();

$jobs_list = new JobsList($jobs);

$hero_bg = StyleInjector::addBackground(get_post_thumbnail_id());

get_header();
?>
<div class="hero block <?php echo $hero_bg; ?>">
  <div class="block__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
  </div>
</div>
<div class="block">
  <div class="block__content text text--medium wysiwyg">
    <?php the_content(); ?>
  </div>
</div>
<?php echo new Benefits(get_field('benefits')); ?>
<div class="block block--condensed-bottom">
  <div class="block__content">
    <h2 class="title title--medium">
      <?php the_field('jobs_title'); ?>
    </h2>
  </div>
</div>
<?php echo $jobs_list; ?>
<?php get_footer(); ?>
