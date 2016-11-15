<?php
/**
 * Template Name: Clients
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

// $f = new FilterList($filters);

?>
<div class="container">
  <section class="content-section page-clients">
    <div class="title">
      <h1><?php echo $post->post_title; ?></h1>
    </div>
    <div class="content">
      <?php
      echo Utils::getClientsList(false, '', array(), false, false);
      ?>
      <div class="clientlist-wrapper">
        <div class="title">
          <h1>Muita asiakkaitamme</h1>
        </div>
        <?php
        echo Utils::getMinimalClientList();
        ?>
      </div>
    </div>
  </section>
</div>
<?php
get_footer();
?>
