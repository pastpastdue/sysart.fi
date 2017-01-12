<?php
/**
 * Template Name: MainPage
 */

$jumbotron_bg = StyleInjector::addBackground(get_field('hero_image'));

$service_list = new ServicesList(get_field('services'));
$featured_clients_list = new FeaturedClientsList(get_field('clients'));
$featured_blog_list = new BlogList(get_field('featured_blogs'));

get_header();
?>
<div class="hero hero--large block <?php echo $jumbotron_bg; ?>">
  <div class="block__content">
    <h1 class="hero__title"><?php the_field('hero_text'); ?></h1>
  </div>
</div>
<div class="block block--large">
  <div class="block__content child-margins">
    <h2 class="title title--highlight"><?php the_field('services_title'); ?></h2>
    <p class="title title--medium"><?php the_field('services_subtitle'); ?></p>
    <p><?php the_field('services_text'); ?></p>
  </div>
</div>
<?php echo $service_list; ?>
<div class="block block--large">
  <div class="block__content child-margins">
    <h2 class="title title--highlight"><?php the_field('block_title'); ?></h2>
    <p class="title title--medium"><?php the_field('block_subtitle'); ?></p>
    <p><?php the_field('block_text'); ?></p>
    <div>
      <?php echo wp_get_attachment_image(get_field('block_image'), 'large', false, array('class' => 'image image--responsive')); ?>
    </div>
    <div>
      <a href="<?php the_field('block_link'); ?>" class="button">
        <?php the_field('block_link_text'); ?>
      </a>
    </div>
  </div>
</div>
<?php echo $featured_clients_list; ?>
<div class="block block--large">
  <div class="block__content child-margins">
    <h2 class="title title--highlight"><?php the_field('blog_intro_title'); ?></h2>
    <p class="title title--medium"><?php the_field('blog_intro_subtitle'); ?></p>
    <p><?php the_field('blog_intro_text'); ?></p>
  </div>
</div>
<div class="block block--full-width block--condensed-top">
  <div class="block__content">
    <?php echo $featured_blog_list; ?>
  </div>
</div>

<?php get_footer(); ?>
