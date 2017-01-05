<?php
get_header();
the_post();
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
<?php get_footer(); ?>
