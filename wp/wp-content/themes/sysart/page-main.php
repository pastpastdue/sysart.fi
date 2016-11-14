<?php
    /**
     * Template Name: MainPage
     *
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package WordPress
     * @subpackage sysart
     * @since sysart
     */
    get_header();

    $fields = get_fields();
    $jumbotron = new Jumbotron($fields);
    $clientslist = Utils::getClientsList($fields['clients'], '');
    $servicelist = Utils::getServicesList(null, null, array(), array('col-xs-12 fp-preview-list'),  array('col-xs-12','col-sm-6 col-lg-3'));
    $twitterwall = new Twitterwall();
?>

</div> <!-- .container-->

<div class="container">
    <div class="content-block">
        <?php echo $jumbotron; ?>
    </div>
</div>

<div class="alt-bg-color">
    <div class="container">
        <section class="content-block">
            <h2 class="">Palvelut</h2>
            <?php echo $servicelist; ?>
        </section>
    </div>
</div>

<div class="container">
    <section class="content-block">
        <h2 class="">Asiakkaat</h2>
        <?php echo $clientslist; ?>
    </section>
</div>

<div class="alt-bg-color">
    <div class="container">
        <section class="content-block">
            <h2 class="">Twitter</h2>
            <?php echo $twitterwall; ?>
        </section>
    </div>
</div>

<?php get_footer();
