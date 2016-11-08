<?php
/**
 * Template Name: Contact
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage sysart
 * @since sysart
 */
$fields = get_fields();

get_header();

$contact = Utils::getContactInfo();
$c = new ContactBoxList($contact);
$p = $fields['employees'] ? new PersonList(array('items' => $fields['employees'])) : '';
$contactForm = new PipedriveForm($fields['pipedrive_form_id']);

?>
<div id="wrapper" class="container">
  <div class="main-container">
    <section class="content-section">
      <div class="title">
        <h1><?php echo $post->post_title; ?></h1>
      </div>
      <div class="content">
        <?php echo $c ?>
        <?php echo $p ?>
        <?php echo $contactForm ?>
      </div>
    </section>

<?php
get_footer();
?>
