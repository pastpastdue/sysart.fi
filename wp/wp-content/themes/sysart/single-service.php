<?php
/**
 * Template Name: Service
 */

the_post();

$post_id = get_the_ID();
$process = new Process(get_field('process'));
$reference_window = new ReferenceView(get_field('reference'), get_field('reference_title'), get_field('reference_link'));
$other_services_list = new ServicesList(get_field('other_services'));

$hero_bg = StyleInjector::addBackground(get_post_thumbnail_id());

get_header();
?>
<div class="hero block <?php echo $hero_bg; ?>">
  <div class="block__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
  </div>
</div>
<div class="block block--text wysiwyg">
  <div class="block__content">
    <?php the_content(); ?>
  </div>
</div>
<?php echo $process; ?>
<?php if($post_id === 1306) { ?>
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
          formId: '7a633944-ce41-40f7-bc1f-58a02369a9e1'
        });
      </script>
    </div>
  </div>
<?php } ?>
<?php if($post_id === 1307) { ?>
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
          formId: '5194c4e6-87ff-47b3-903a-5f543a87fdd3'
        });
      </script>
    </div>
  </div>
<?php } ?>
<?php if($post_id === 1308) { ?>
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
          formId: '944dfc01-921c-4ad6-be84-ee9fd47e9b5c'
        });
      </script>
    </div>
  </div>
<?php } ?>
<?php echo $reference_window; ?>
<div class="block block--condensed-bottom">
  <div class="block__content">
    <h2 class="title title--medium">Palvelut</h2>
  </div>
</div>
<?php echo $other_services_list; ?>
<?php get_footer(); ?>
