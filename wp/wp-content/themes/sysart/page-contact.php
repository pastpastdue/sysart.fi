<?php
/**
 * Template Name: Contact
 */
$fields = get_fields();

the_post();

$footer = get_field('footer', get_option('page_on_front'));

$people_list = new PeopleList(get_field('employees'));
$downloadable_guide_block = Utils::getGuideBlock();

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
<?php echo $people_list; ?>
<div class="block block--large block--condensed-bottom">
  <div class="block__content child-margins">
    <h2 class="title title--highlight"><?php the_field('contact_form_title'); ?></h2>
    <p class="title title--medium"><?php the_field('contact_form_subtitle'); ?></p>
    <p><?php the_field('contact_form_text'); ?></p>
  </div>
</div>
<div class="block block--condensed-top">
  <div class="block__content">
    <!--[if lte IE 8]>
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
    <![endif]-->
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
    <script>
      hbspt.forms.create({
        css: '',
        portalId: '2685480',
        formId: 'd9edee91-632c-497f-8180-4db95404ac01'
      });
    </script>
  </div>
</div>
<?php if ($downloadable_guide_block): ?>
  <?php echo $downloadable_guide_block; ?>
<?php endif; ?>
<?php get_footer(); ?>
