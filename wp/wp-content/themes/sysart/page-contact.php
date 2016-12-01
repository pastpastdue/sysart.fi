<?php
/**
 * Template Name: Contact
 */
$fields = get_fields();

the_post();

$peoples_list = new PeoplesList(get_field('employees'));

get_header();
?>
<div class="hero block block--light">
  <div class="block__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
  </div>
</div>
<?php echo $peoples_list; ?>
<?php get_footer(); ?>
