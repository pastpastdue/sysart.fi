<?php
get_header();
the_post();
$downloadable_guide_block = Utils::getGuideBlock();
?>
<div class="hero block">
  <div class="block__content block--light">
    <h1 class="hero__title"><?php the_title(); ?></h1>
  </div>
</div>
<div class="block block--text wysiwyg">
  <div class="block__content">
    <?php the_post_thumbnail(array(600), array('class' => 'image image--floater')); ?>
    <?php the_content(); ?>
  </div>
</div>
<?php echo new AddThis(); ?>
<?php if ($downloadable_guide_block): ?>
  <?php echo $downloadable_guide_block; ?>
<?php endif; ?>
<?php get_footer(); ?>
