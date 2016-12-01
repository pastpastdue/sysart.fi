<?php
/**
 * Template Name: Services
 */

the_post();
$hero_bg = StyleInjector::addBackground(get_post_thumbnail_id());
$service_list = new ServicesList(get_field('services'));

get_header();

?>
<div class="hero block <?php echo $hero_bg; ?>">
  <div class="block__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
  </div>
</div>
<div class="block">
  <div class="block__content text text--medium">
    <?php the_content(); ?>
  </div>
</div>
<?php echo $service_list; ?>
<?php get_footer(); ?>
