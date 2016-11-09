<?php
add_shortcode('youtube', function ($args) {
  $url = get_bloginfo('url');
	$autoplay = $args['autoplay'] ? $args['autoplay'] : '0';

	return <<<EOT
<div class="video-wrapper">
	<iframe type="text/html" class="video-component"
	  src="https://www.youtube.com/embed/{$args['id']}?autoplay={$autoplay}"
	  frameborder="0"></iframe>
</div>
EOT;
});
