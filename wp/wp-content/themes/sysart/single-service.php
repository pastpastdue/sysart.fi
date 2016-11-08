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

$fields = get_fields();
$post = get_post();

?>
    <section class="content-section post-content">
        <div class="content">
            <div class="bold-title">
              <h1><?php echo $post->post_title; ?></h1>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php

                    echo new ServiceDescription(apply_filters('the_content', $post->content), $fields['icon']);

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php

                    echo new ProcessWalktrough($fields['processes']);

                    ?>
                </div>
            </div>
            <?php

            echo Utils::getServicesList(false, '', array($post->ID));

            ?>
        </div>
    </section>
<?php get_footer(); ?>
