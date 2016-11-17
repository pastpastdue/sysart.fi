<?php
/**
 * Template Name: Service
 */

the_post();

$process = new Process(get_field('process'));
new ReferenceWindow(get_field('reference'), get_field('reference_title'), get_field('reference_link'));

get_header();
?>
<div class="row block block--text">
  <div class="col-sm-6">
    <div class="block__content">
      <h1 class="title title--large"><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </div>
  </div>
</div>
<div class="block">
  <h2 class="title title--small">Näin me toimimme:</h2>
  <?php echo $process; ?>
</div>
<?php get_footer(); ?>
