<?php
/**
 * Template Name: Contact
 */
$fields = get_fields();

the_post();

$footer = get_field('footer', get_option('page_on_front'));

$peoples_list = new PeoplesList(get_field('employees'));


get_header();
?>
<div class="hero block block--light">
  <div class="block__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
  </div>
</div>
<div class="block block--full-width text text--small">
  <div class="block__content">
    <div class="row">
      <?php foreach ($footer as $element): if ($element['acf_fc_layout'] === 'address'): ?>
        <section class="col-md-4">
          <div class="item item--center">
            <div class="item__content">
              <?php echo wp_get_attachment_image($element['image'], 'thumbnail', false, array('class' => 'item__image')); ?>
              <div class="title title--small"><?php echo $element['title']; ?></div>
              <address class="address"><?php echo $element['text']; ?></address>
            </div>
          </div>
        </section>
      <?php endif; endforeach; ?>
    </div>
  </div>
</div>
<?php echo $peoples_list; ?>
<?php get_footer(); ?>
