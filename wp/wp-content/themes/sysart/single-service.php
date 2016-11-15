<?php
/**
 * Template Name: Service
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
?>
    <section class="content-section post-content">
        <div class="content">
            <div class="bold-title">
              <h1><?php the_title(); ?></h1>
            </div>
            <div class="row large-gutter">
              <div class="col-xs-12 col-md-7 description">
                <?php the_content(); ?>
              </div>
              <div class="col-xs-6 col-md-4 col-xs-offset-3 col-md-offset-0">
                <?php echo new ReferenceWindow(get_field('reference'), get_field('reference_title'), get_field('reference_link')); ?>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php

                    echo new ProcessWalktrough(get_field('processes'));

                    ?>
                </div>
            </div>
            <?php

            echo Utils::getServicesList(false, '', array($post->ID));

            ?>
        </div>
    </section>
<?php get_footer(); ?>
