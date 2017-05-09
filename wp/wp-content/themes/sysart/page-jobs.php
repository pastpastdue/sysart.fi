<?php
/**
 * Template Name: Jobs
 */

the_post();

$jobs = Utils::getJobs();

$jobs_list = new JobsList($jobs);

$hero_bg = StyleInjector::addBackground(get_post_thumbnail_id());

$featured_blog_list = new BlogList(get_field('featured_blogs', get_option('page_on_front')));
$blog_intro_title = get_field('blog_intro_title', get_option('page_on_front'));
$blog_intro_subtitle = get_field('blog_intro_subtitle', get_option('page_on_front'));
$blog_intro_text = get_field('blog_intro_text', get_option('page_on_front'));

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
    <h2 class="title title--highlight"><?php echo $blog_intro_title; ?></h2>
    <p class="title title--medium"><?php echo $blog_intro_subtitle; ?></p>
    <p><?php echo $blog_intro_text; ?></p>
  </div>
</div>
<div class="block block--full-width block--condensed-top">
  <div class="block__content block__content--condensed-bottom">
    <?php echo $featured_blog_list; ?>
  </div>
</div>
<?php get_footer(); ?>
