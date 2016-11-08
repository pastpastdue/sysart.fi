<?php
class AddThis {
  public function __construct() {
  }

  public function __toString () {
    $url = get_the_permalink();
    $title = html_entity_decode(get_the_title());

    $fields = get_fields();

    $twitter = array(
      'via' => 'SysartOy'
    );

    if (isset($fields['twitter_text'])) {
      $twitter['text'] = $fields['twitter_text'];
    }

    $passthrough = json_encode(array(
      'twitter' => $twitter
    ));

return
<<<EOT
<script type="text/javascript">
var addthis_share = {
  url: "$url",
  title: "$title",
  passthrough: {$passthrough}
}
</script>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58109599db3d91f5"></script>
EOT;
  }
}
