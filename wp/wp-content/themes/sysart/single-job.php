<?php
get_header();
the_post();
?>
<div class="container">
  <section class="content-block">
    <div class="row large-gutter">
      <div class="col-sm-6 col-sm-push-6">
        <?php the_post_thumbnail(array(600), array('class' => 'img-responsive post-image')); ?>
      </div>
      <div class="col-sm-6 col-sm-pull-6">
        <div class="content post-content">
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
</div>
<?php echo new AddThis(); ?>
<?php get_footer(); ?>
