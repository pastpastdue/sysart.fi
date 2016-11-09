<?php
get_header();
?>
<section class="content-section">
  <div class="bold-title">
    <h1><?php echo $post->post_title; ?></h1>
  </div>
  <div class="row large-gutter">
    <div class="col-sm-6 col-sm-push-6">
      <?php the_post_thumbnail(null, array('class' => 'img-responsive')); ?>
    </div>
    <div class="col-sm-6 col-sm-pull-6">
      <div class="content post-content">
        <?php echo apply_filters('the_content', $post->post_content); ?>
      </div>
    </div>
  </div>

</section>
<?php
get_footer();
?>
