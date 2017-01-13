<?php
/**
 * Template Name: Service
 */

the_post();

$process = new Process(get_field('process'));
$reference_window = new ReferenceView(get_field('reference'), get_field('reference_title'), get_field('reference_link'));
$other_services_list = new ServicesList(get_field('other_services'));

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
<div class="block block--condensed-bottom">
  <div class="block__content">
    <h2 class="title title--medium">Muut palvelut</h2>
  </div>
</div>
<?php echo $other_services_list; ?>
<?php get_footer(); ?>
