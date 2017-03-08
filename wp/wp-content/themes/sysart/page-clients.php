<?php
/**
 * Template Name: Clients
 */
$hero_bg = StyleInjector::addBackground(get_post_thumbnail_id());

$clients_list = new ClientsList(get_field('featured_clients'));
$other_clients_list = new OtherClientsList(get_field('client_logos'));

get_header();

the_post();
?>
<div class="hero block <?php echo $hero_bg; ?>">
  <div class="block__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
  </div>
</div>
<div class="block wysiwyg">
  <div class="block__content text text--medium">
    <?php the_content(); ?>
  </div>
</div>
<?php echo $clients_list; ?>
<div class="block block--condensed-bottom">
  <div class="block__content">
    <h2 class="title title--medium">
      Muita asiakkaitamme
    </h2>
  </div>
</div>
<?php echo $other_clients_list; ?>
<?php get_footer(); ?>
