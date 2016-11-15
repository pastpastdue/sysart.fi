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

$serviceDescription = new ServiceDescription(apply_filters('the_content', $post->content), $fields['icon']);
$processWalktrough = new ProcessWalktrough($fields['processes']);
$servicesList = Utils::getServicesList(false, '', array($post->ID));

?>
    <section class="content-section post-content">
        <div class="content">
            
            <section class="content-block">
                <h1><?php echo $post->post_title; ?></h1>
                <?php echo $serviceDescription; ?>
            </section>

            <section class="content-block">
                <?php echo $processWalktrough; ?>
            </section>

            <?php echo $servicesList; ?>
        </div>
    </section>
<?php get_footer(); ?>
