<?php
/**
 * Template Name: MainPage
 */

$jumbotron_bg = StyleInjector::addBackground(get_field('jumbotron_image'));

get_header();

$service_list = new ServiceList(get_field('services'));
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
<?php echo $service_list; ?>
<div class="block">
  <div class="block__content">
    <h2 class="title title--highlight">Toimintatapamme</h2>
    <p class="title title--medium">Olemme poistaneet häsläyksen ohjelmistokehityksestä.</p>
    <p>Me autamme uusien digitaalisten palveluiden luomisessa, vanhojen järjestelmien modernisoinnissa sekä järjestelmäintegraatioissa.</p>
  </div>
</div>

<?php get_footer(); ?>
