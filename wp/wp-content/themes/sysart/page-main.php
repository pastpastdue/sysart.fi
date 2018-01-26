<?php
/**
 * Template Name: MainPage
 */

$jumbotron_bg = StyleInjector::addBackground(get_field('hero_image'));

$service_list = new ServicesList(get_field('services'));
$featured_clients_list = new FeaturedClientsList(get_field('clients'));
$featured_blog_list = new BlogList(get_field('featured_blogs'));
$downloadable_guide_block = Utils::getGuideBlock();

get_header();
?>
<div class="hero hero--large block custom-hero <?php echo $jumbotron_bg; ?>">
  <div class="block__content">
    <h1 class="hero__title"><?php the_field('hero_text'); ?></h1>
    

    <div class="hub-link">
    <!--HubSpot Call-to-Action Code -->
    <span class="hs-cta-wrapper" id="hs-cta-wrapper-2b60b2e4-689b-4584-a6c3-fefa54c30562">
      <span class="hs-cta-node hs-cta-2b60b2e4-689b-4584-a6c3-fefa54c30562" id="hs-cta-2b60b2e4-689b-4584-a6c3-fefa54c30562">
      <!--[if lte IE 8]><div id="hs-cta-ie-element"></div><![endif]-->
        <a href="https://cta-redirect.hubspot.com/cta/redirect/2685480/2b60b2e4-689b-4584-a6c3-fefa54c30562" >
        <img class="hs-cta-img" id="hs-cta-img-2b60b2e4-689b-4584-a6c3-fefa54c30562" style="border-width:0px;" src="https://no-cache.hubspot.com/cta/default/2685480/2b60b2e4-689b-4584-a6c3-fefa54c30562.png"  alt="Sysart Podcast"/>
        </a>
      </span>
      <script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script>
      <script type="text/javascript"> hbspt.cta.load(2685480, '2b60b2e4-689b-4584-a6c3-fefa54c30562', {}); </script>
    </span><!-- end HubSpot Call-to-Action Code -->
    </div>




  </div>
</div>
<div class="block block--large">
  <div class="block__content child-margins">
    <h2 class="title title--highlight"><?php the_field('services_title'); ?></h2>
    <p class="title title--medium"><?php the_field('services_subtitle'); ?></p>
    <p><?php the_field('services_text'); ?></p>
  </div>
</div>
<?php echo $service_list; ?>
<?php if ($downloadable_guide_block): ?>
      <?php echo $downloadable_guide_block; ?>
<?php endif; ?>
<div class="block block--large">
  <div class="block__content child-margins">
    <h2 class="title title--highlight"><?php the_field('block_title'); ?></h2>
    <p class="title title--medium"><?php the_field('block_subtitle'); ?></p>
    <p><?php the_field('block_text'); ?></p>
    <div>
      <?php echo wp_get_attachment_image(get_field('block_image'), 'large', false, array('class' => 'image image--responsive')); ?>
    </div>
    <div>
      <a href="<?php the_field('block_link'); ?>" class="button">
        <?php the_field('block_link_text'); ?>
      </a>
    </div>
  </div>
</div>
<?php echo $featured_clients_list; ?>
<div class="block block--large">
  <div class="block__content child-margins">
    <h2 class="title title--highlight"><?php the_field('blog_intro_title'); ?></h2>
    <p class="title title--medium"><?php the_field('blog_intro_subtitle'); ?></p>
    <p><?php the_field('blog_intro_text'); ?></p>
  </div>
</div>
<div class="block block--full-width block--condensed-top">
  <div class="block__content block__content--condensed-bottom">
    <?php echo $featured_blog_list; ?>
  </div>
</div>

<?php get_footer(); ?>
