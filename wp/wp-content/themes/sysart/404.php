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

?>
<section class="content-section text-center">
  <h2>Jahas, nyt meni vikaan</h2>
  <p>entäs jos kokeilisit jotakin näistä:</p>
</section>
<?php

echo Utils::getServicesList();

echo Utils::getClientsList($fields['clients']);

get_footer();

?>
