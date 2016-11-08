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

$post = get_post();
$fields = get_fields();

$contactForm = new PipedriveForm($fields['pipedrive_form_id']);

?>
    <section class="content-section">
      <div class="title">
        <h1><?php echo $post->post_title; ?></h1>
      </div>
      <div class="content post-content">
        <?php echo apply_filters('the_content', $post->post_content); ?>
      </div>
    </section>
<?php

    echo Utils::getServicesList(null, '', array(), array('col-xs-12'),  array('col-xs-12','col-sm-6','col-lg-3'));
    echo $contactForm;

    get_footer();
?>
