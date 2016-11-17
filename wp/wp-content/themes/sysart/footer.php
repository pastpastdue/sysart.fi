<?php
$footer = get_field('footer', get_option('page_on_front'));
?>
    </div><? // close wrapper ?>
    <footer>
      <div id="footer-wrapper">
        <div class="block row no-gutter">
          <?php foreach ($footer as $element): ?>
            <div class="item col-sm-3">
              <div class="item__content">
                <?php if ($element['acf_fc_layout'] == 'address'): ?>
                  <div class="title title--small"><?php echo $element['title']; ?></div>
                  <address><?php echo $element['text']; ?></address>
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
