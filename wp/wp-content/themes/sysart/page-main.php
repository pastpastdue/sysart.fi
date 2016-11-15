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
<div class="block">
  <div class="block__content">
    <h2 class="title title--highlight">Palvelumme</h2>
    <p class="title title--medium">Kasvatetaan liiketoimintaasi digitaalisilla palveluilla</p>
    <p>Me autamme uusien digitaalisten palveluiden luomisessa, vanhojen järjestelmien modernisoinnissa sekä järjestelmäintegraatioissa.</p>
  </div>
</div>
<div class="block row no-gutter">
  <div class="col-sm-4 item item--square">
    <div class="item__content">
      Uudet digitaaliset palvelut
    </div>
  </div>
  <div class="col-sm-4 item item--square">
    <div class="item__content">
      Vanhojen järjestelmien modernisointi
    </div>
  </div>
  <div class="col-sm-4 item item--square">
    <div class="item__content">
      Järjestelmä&shy;integraatiot
    </div>
  </div>
</div>

<?php get_footer(); ?>
