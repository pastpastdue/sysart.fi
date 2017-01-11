<?php
/**
 * Template Name: Service
 */

the_post();

$process = new Process(get_field('process'));
$reference_window = new ReferenceView(get_field('reference'), get_field('reference_title'), get_field('reference_link'));

$hero_bg = StyleInjector::addBackground(get_post_thumbnail_id());

get_header();
?>
<div class="hero block <?php echo $hero_bg; ?>">
  <div class="block__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
  </div>
</div>
<div class="block block--text wysiwyg">
  <div class="block__content">
    <?php the_content(); ?>
  </div>
</div>
<?php echo $process; ?>
<?php echo $reference_window; ?>
<?php get_footer(); ?>
