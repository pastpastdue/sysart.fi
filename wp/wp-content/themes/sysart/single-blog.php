<?php
/**
 * Template Name: Service
 */

the_post();

$hero_bg = StyleInjector::addBackground(get_post_thumbnail_id());

$people_list = new PeopleList(get_field('author'), true);
$related_articles = get_field('related_articles');
$blog_list = $related_articles ? new BlogList($related_articles, true) : '';

get_header();

$post = get_post();
$fields = get_fields();

$image = $fields['jumbotron_image'] ? $fields['jumbotron_image'] : $fields['image'];
?>
<div class="hero block <?php echo $hero_bg; ?>">
</div>
<div class="block block--text wysiwyg">
  <div class="block__content">
    <h1 class="title title--large"><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </div>
</div>
<?php echo $people_list; ?>
<?php if ($related_articles): ?>
  <div class="block block--condensed-bottom">
    <div class="block__content">
      <h2 class="title title--medium">
        Lue myös
      </h2>
    </div>
  </div>
  <?php echo $blog_list; ?>
<?php endif; ?>
<?php echo new AddThis(); ?>
<?php get_footer(); ?>
