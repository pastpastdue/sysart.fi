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

$post = get_post();
$fields = get_fields();

//echo '<pre>', print_r($fields), '</pre>';

$image = $fields['jumbotron_image'] ? $fields['jumbotron_image'] : $fields['image'];

?>
<?php echo new OverflowJumbotron($image, $fields['jumbotron_text']); ?>
    <section class="content-section">
      <div class="bold-title">
        <h1><?php echo $post->post_title; ?></h1>
      </div>
      <div class="content post-content">
        <?php echo $fields['content']; ?>
      </div>
        <?php
          $p = $fields['author'] ? new PersonList(array('items' => $fields['author'])) : '';
          echo $p;
        ?>

        <?php

        $related = $fields['related_articles'] ? new RelatedPostList($fields['related_articles']) : '';
        echo $related;

        ?>
    </section>
<?php
    echo new AddThis();
    get_footer();
?>
