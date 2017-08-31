<?php
$footer = get_field('footer', get_option('page_on_front'));
$elements = array_filter($footer, function ($e) {
  return $e['acf_fc_layout'] != "address" || $e['show_on_footer'];
});

?>
    </div><? // close wrapper ?>
    <footer class="footer">
      <div id="footer-wrapper">
        <div class="block row no-gutter">
          <?php foreach ($elements as $element): ?>
            <div class="item col-sm-3">
              <div class="item__content">
                <?php if ($element['acf_fc_layout'] == 'address'): ?>
                  <div class="title title--margin title--small"><?php echo $element['title']; ?></div>
                  <address class="address"><?php echo $element['text']; ?></address>
                <?php else: ?>
                  <?php echo wp_get_attachment_image($element['image']); ?>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
          <div class="text-center copyright-info col-xs-12">
            <p class="copyright">&copy; Sysart Oy 2016</p>
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
