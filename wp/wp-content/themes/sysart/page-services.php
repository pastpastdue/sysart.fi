<?php
/**
 * Template Name: Services
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage sysart
 * @since sysart
 */
get_header();

the_post();

$contactForm = new PipedriveForm(get_field('pipedrive_form_id'));
?>
<div class="container">
  <section class="content-section">
    <div class="title">
      <h1><?php the_title(); ?></h1>
    </div>
    <div class="content post-content">
      <?php the_content(); ?>
    </div>
  </section>
  <?php echo Utils::getServicesList(null, '', array(), array('col-xs-12'),  array('col-xs-12','col-sm-6','col-lg-3')); ?>
  <?php echo $contactForm; ?>
</div>
<?php get_footer(); ?>
