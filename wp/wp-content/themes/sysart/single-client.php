<?php
/**
 * Template Name: Service
 */

the_post();
$hero_bg = StyleInjector::addBackground(get_post_thumbnail_id());

get_header();
?>
<div class="hero block <?php echo $hero_bg; ?>">
</div>
<div class="block block--text wysiwyg">
  <div class="block__content">
    <?php the_content(); ?>
  </div>
</div>
<?php echo new AddThis(); ?>
<?php get_footer(); ?>
