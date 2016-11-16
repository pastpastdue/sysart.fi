<?php
setup_postdata(get_post(get_option('page_on_front')));
?>
    </div><? // close wrapper ?>
    <footer>
      <div id="footer-wrapper">
        <div class="block row no-gutter">
          <?php while(have_rows('footer')): the_row(); ?>
            <div class="item col-sm-3">
              <div class="item__content">
                <?php if (get_row_layout() == 'address'): ?>
                  <div class="title title--small"><?php the_sub_field('title'); ?></div>
                  <address><?php the_sub_field('text'); ?></address>
                <?php else: ?>
                  <?php echo wp_get_attachment_image(get_sub_field('image')); ?>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
          <div class="text-center copyright-info col-xs-12">
            <p class="copyright">&copy; Sysart Oy 2016</p>
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
