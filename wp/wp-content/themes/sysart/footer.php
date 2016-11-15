<?php
/**
 * do magic for footer components
 */
$frontpage = get_post( get_option( 'page_on_front' ) );
$fields = get_fields($frontpage->ID);
$footerLines = preg_split('/\r\n|\n|\r/', $fields['footer']);

$footerComponents = array();
$currentComponent = array();

foreach ($footerLines as $key => $value) {
  if (!empty($value)) {
    $currentComponent[] = $value;
  } else {
    $footerComponents[] = new FooterComponent($currentComponent, array('col-xs-12','col-sm-6','col-md-3'));
    $currentComponent = array();
  }
}

$footerComponents[] = new FooterComponent($currentComponent, array('col-xs-12','col-md-3'));

$footerImage = new Image($fields['footer_image'], array('col-xs-12', 'col-sm-8 col-sm-offset-2', 'col-md-offset-0 col-md-3'));

?>
    <footer class="footer row">
      <div class="container">
        <?php echo implode($footerComponents, ''); ?>
        <?php echo $footerImage; ?>
        <div class="text-center copyright-info col-xs-12">
          <p class="copyright">&copy; Sysart Oy 2016</p>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
