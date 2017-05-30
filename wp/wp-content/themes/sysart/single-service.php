<?php
/**
 * Template Name: Service
 */

the_post();

$process = new Process(get_field('process'));
$reference_window = new ReferenceView(get_field('reference'), get_field('reference_title'), get_field('reference_link'));
$other_services_list = new ServicesList(get_field('other_services'));
$downloadable_guide_block = Utils::getGuideBlock();

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
<?php echo $reference_window; ?>
<?php if (get_field('hubspot_portal_id') && get_field('hubspot_form_id')): ?>
  <div class="block">
    <div class="block__content">
      <!--[if lte IE 8]>
      <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
      <![endif]-->
      <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
      <script>
        hbspt.forms.create({
          css: '',
          portalId: '<?php echo get_field('hubspot_portal_id'); ?>',
          formId: '<?php echo get_field('hubspot_form_id'); ?>'
        });
      </script>
    </div>
  </div>
<?php endif; ?>
<div class="block block--condensed-bottom">
  <div class="block__content">
    <h2 class="title title--medium">Palvelut</h2>
  </div>
</div>
<?php echo $other_services_list; ?>
<?php if ($downloadable_guide_block): ?>
  <?php echo $downloadable_guide_block; ?>
<?php endif; ?>
<?php get_footer(); ?>
