<?php
/**
 * Template Name: People
 */

//$hero_bg = StyleInjector::addBackground(get_post_thumbnail_id());

$employees = get_posts(array(
  'post_type' => 'employee',
  'orderby' => 'menu_order',
  'numberposts' => -1
));

$people_list = new PeopleList($employees);
$downloadable_guide_block = Utils::getGuideBlock();

get_header();
?>
<div class="hero block">
  <div class="block__content block--light">
    <h1 class="hero__title"><?php the_title(); ?></h1>
  </div>
</div>
<?php echo $people_list; ?>
<?php if ($downloadable_guide_block): ?>
  <?php echo $downloadable_guide_block; ?>
<?php endif; ?>
<?php get_footer(); ?>
