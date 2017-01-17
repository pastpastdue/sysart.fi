<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage sysart
 * @since sysart
 */

get_header();

$frontpage = get_post( get_option( 'page_on_front' ) );
$fields = get_fields($frontpage->ID);
$service_list = new ServicesList(get_field('services', 66));

?>
<div class="block">
  <div class="block__content">
    <h2 class="title title--medium">Jahas, nyt meni vikaan</h2>
    <p>entäs jos kokeilisit jotakin näistä:</p>
  </div>
</div>
<div class="block block--condensed-top block--condensed-bottom">
  <div class="block__content">
    <h2 class="title title--medium">Palvelut</h2>
  </div>
</div>
<?php echo $service_list; ?>
<?php get_footer(); ?>
