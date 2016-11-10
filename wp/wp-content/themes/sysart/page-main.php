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
    </div>
</div> <!-- #wrapper-->

<div class="fp-blocks">
    <div class="fp-block fp-block__jumbotron">
        <div class="container">
            <div class="main-container">
                <div class="row content-section">
                    <?php echo $jumbotron; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="fp-block fp-block__services">
        <div class="container">
            <div class="main-container">
                <h2 class="fp-block__header">Palvelut</h2>
                <?php echo $servicelist; ?>
            </div>
        </div>
    </div>

    <div class="fp-block fp-block__clientlist">
        <div class="container">
            <div class="main-container">
                <h2 class="fp-block__header">Asiakkaat</h2>
                <?php echo $clientslist; ?>
            </div>
        </div>
    </div>

    <div class="fp-block fp-block__twitterfeed">
        <div class="container">
            <div class="main-container">
                <h2 class="fp-block__header">Twitter</h2>
                <?php echo $twitterwall; ?>
            </div>
        </div>
    </div>
</div>

<div class="container fp-footer-container">
    <div class="main-container">
        <?php
        get_footer();
