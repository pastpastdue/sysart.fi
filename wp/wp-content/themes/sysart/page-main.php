<?php
/**
 * Template Name: MainPage
 */

$jumbotron_bg = StyleInjector::addBackground(get_field('jumbotron_image'));

$service_list = new ServicesList(get_field('services'));
$featured_clients_list = new FeaturedClientsList(get_field('clients'));

get_header();
?>
<div class="hero block <?php echo $jumbotron_bg; ?>">
  <div class="block__content">
    <h1><?php the_field('hero_text'); ?></h1>
  </div>
</div>
<div class="block">
  <div class="block__content text-block">
    <h2 class="title title--highlight">Palvelumme</h2>
    <p class="title title--medium">Kasvatetaan liiketoimintaasi digitaalisilla palveluilla</p>
    <p>Me autamme uusien digitaalisten palveluiden luomisessa, vanhojen järjestelmien modernisoinnissa sekä järjestelmäintegraatioissa.</p>
  </div>
</div>
<?php echo $service_list; ?>
<div class="block">
  <div class="block__content text-block">
    <h2 class="title title--highlight">Toimintatapamme</h2>
    <p class="title title--medium">Olemme poistaneet häsläyksen ohjelmistokehityksestä.</p>
    <p>Me autamme uusien digitaalisten palveluiden luomisessa, vanhojen järjestelmien modernisoinnissa sekä järjestelmäintegraatioissa.</p>
    <div>
      <a href="http://www.google.fi" class="button">
        Lue lisää toimitavoista ja sopimusmalleista
      </a>
    </div>
  </div>
</div>
<?php echo $featured_clients_list; ?>
<?php get_footer(); ?>
