<?php
/**
 * Template Name: Service
 */

the_post();
$team_list = new PeopleList(get_field('employees'), true);
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
<div class="block block--full-width block--condensed-top block--condensed-bottom">
  <div class="block__content">
    <h2 class="title title--medium title--margin">Projektin tiimi:</h2>
  </div>
</div>
<div class="block block--full-width block--condensed-bottom">
  <div class="block__content">
    <?php echo $team_list; ?>
  </div>
</div>
<?php echo new AddThis(); ?>
<?php get_footer(); ?>