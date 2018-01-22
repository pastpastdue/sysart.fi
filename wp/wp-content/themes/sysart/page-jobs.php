<?php
/**
 * Template Name: Jobs
 */

the_post();

$jobs = Utils::getJobs();

$jobs_list = new JobsList($jobs);

$hero_bg = StyleInjector::addBackground(get_post_thumbnail_id());

$featured_blog_list = new BlogList(get_field('featured_blogs'));
$downloadable_guide_block = Utils::getGuideBlock();

get_header();
?>
<div class="hero block <?php echo $hero_bg; ?>">
  <div class="block__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
    <a
          class="cta_button button" 
          href="https://hubs.ly/H09LkxZ0" 
          title="Lataa opas">
            <div class="hero-button">
              <span class="bait">Kuuntele podcast</span>
              <span class="subject">PALKKAMALLI</span>
            </div>
    </a>
  </div>
</div>
<div class="block">
  <div class="block__content text text--medium wysiwyg">
    <?php the_content(); ?>
  </div>
</div>
<div class="block block--condensed-top block--condensed-bottom">
  <div class="block__content">
<?php echo new Benefits(get_field('benefits')); ?>
  </div>
</div>
<div class="block block--condensed-bottom">
  <div class="block__content">
    <h2 class="title title--medium">
      <?php the_field('jobs_title'); ?>
    </h2>
  </div>
</div>
<?php echo $jobs_list; ?>
<div class="block block--large">
  <div class="block__content child-margins">
    <?php if (get_field('blog_intro_title')) { ?>
      <h2 class="title title--highlight"><?php the_field('blog_intro_title'); ?></h2>
    <?php }; ?>
    <?php if (get_field('blog_intro_subtitle')) { ?>
      <p class="title title--medium"><?php the_field('blog_intro_subtitle'); ?></p>
    <?php }; ?>
    <?php if (get_field('blog_intro_text')) { ?>
      <p><?php the_field('blog_intro_text'); ?></p>
    <?php }; ?>
  </div>
</div>
<?php if ($featured_blog_list) { ?>
  <div class="block block--full-width block--condensed-top">
    <div class="block__content block__content--condensed-bottom">
      <?php echo $featured_blog_list; ?>
    </div>
  </div>
<?php }; ?>
<?php if ($downloadable_guide_block): ?>
  <?php echo $downloadable_guide_block; ?>
<?php endif; ?>
<?php get_footer(); ?>
