<?php
/**
 * Template Name: MainPage
 */

$jumbotron_bg = StyleInjector::addBackground(get_field('jumbotron_image'));

get_header();

$fields = get_fields();
$jumbotron = new Jumbotron($fields);
$clientslist = Utils::getClientsList($fields['clients'], '');
$servicelist = Utils::getServicesList(null, null, array(), array('col-xs-12'),  array('col-xs-12','col-sm-6 col-lg-3'));
$twitterwall = new Twitterwall();
$jumbotron_image = get_field('jumbotron_image');
?>
<div class="hero block <?php echo $jumbotron_bg; ?>">
  <div class="block__content">
    <h1>Ohjelmistokehityksen ammattilaiset palveluksessasi</h1>
  </div>
</div>

<?php get_footer(); ?>
