<?php
add_action('wp_head', function () {
  $properties = array();

  $properties["og:title"] = get_field('share_title');
  $properties["og:description"] = get_field('share_text');
  $properties["og:url"] = get_permalink(get_the_ID());

  $image = wp_get_attachment_metadata(get_field("share_image"));
  if ($image) {
    $fb_share = $image['sizes']['fb-share'];
    $properties["og:image"] = wp_get_attachment_image_url(get_field("share_image"), 'fb-share');
    $properties["og:image:width"] = $fb_share['width'];
    $properties["og:image:height"] = $fb_share['height'];
  }

  foreach ($properties as $key=>$value) {
    if ($value) {
      echo "<meta property=\"$key\" value=\"$value\"/>";
    }
  }

  echo <<<EOC
    <meta name="twitter:card" content="summary" />
EOC;
});
