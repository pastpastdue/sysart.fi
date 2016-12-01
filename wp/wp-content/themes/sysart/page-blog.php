<?php
/**
 * Template Name: Blogs
 */
$blog_list = new BlogList(get_field('blogs'));

get_header();
the_post();
?>
<div class="hero block block--light">
  <div class="block__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
  </div>
</div>
<?php echo $blog_list; ?>
<?php get_footer(); ?>
