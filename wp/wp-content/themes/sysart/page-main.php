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
<div class="hero hero--large block <?php echo $jumbotron_bg; ?>">
  <div class="block__content">
    <h1 class="hero__title"><?php the_field('hero_text'); ?></h1>
    

    <div>
      <!--HubSpot Call-to-Action Code -->
      <span class="hs-cta-wrapper" 
      id="hs-cta-wrapper-db68a8b1-774b-45b4-b56b-3877acf21cc7">
        <span class="hs-cta-node hs-cta-db68a8b1-774b-45b4-b56b-3877acf21cc7" 
        id="hs-cta-db68a8b1-774b-45b4-b56b-3877acf21cc7" 
        data-hs-drop="true" 
        style="visibility: visible;">
          <a id="cta_button_2685480_5b580352-34bd-4934-9429-e357eeb8f296" 
          class="cta_button button" 
          href="https://soundcloud.com/sysart" 
          style="" 
          cta_dest_link="http://tietopankki.sysart.fi/lataa-minimoi-riskit-yrityspaattajan-opas-ohjelmistohankintoihi" 
          title="Lataa opas">
            <span style="font-weight: 400; color: #f58242;">
              Kuuntele podcast
            </span>
          </a>
        </span>
        <script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script>
        <script type="text/javascript"> hbspt.cta.load(2685480, 'db68a8b1-774b-45b4-b56b-3877acf21cc7', {}); </script>
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
