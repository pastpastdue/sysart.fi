<?php
function postSort($a, $b) {
  return $a->menu_order - $b->menu_order;
}

class Utils {

  const KEY = 'ALYJUIGMBH- +';

  public static function getEmailLink($email) {
    $mailAddress = self::obfuscateString($email);
    return '<a class="secretive-link link-email" href="mailto:'.$mailAddress.'">'.$mailAddress.'</a>';
  }

  public static function getPhoneLink($tel) {
    // $phone = self::obfuscateNumber($tel);
    return '<a class="secretive-link link-tel" href="tel:'.$tel.'">'.$tel.'</a>';
  }

  public static function obfuscateString($string) {
    return str_rot13($string);
  }

  public static function obfuscateNumber($number) {
    $string = '';

    for ($i = 0; $i < strlen($number); $i++) {

      $currentNumber = substr($number, $i, 1);
      if (!is_numeric($currentNumber)) {
        $currentNumber = 12;
      }

      $encoded = substr(self::KEY, $currentNumber, 1);

      if (!$encoded) {
        $encoded = '+';
      }

      $string .= $encoded;
    }

    return $string;
  }


  public static function getPosts($list) {
    $posts = array_map('get_post', $list);
    self::postSort($posts);
    return $posts;
  }

  public static function postSort($posts) {
    usort($posts, 'postSort');
  }

  /**
   * retrieve a list of services
   * if list is given, get all by id in the list,
   * else load all posts
   *
   * @param  array  $list [description]
   * @param  string  $title [description]
   * @param  array  $blacklist [description]
   * @return [type]       [description]
   */
  public static function getServicesList($list = array(), $title = 'Palvelut', $blacklist = array(), $classNames = array(), $itemClassNames = array('col-xs-12','col-sm-6','col-md-4','col-lg-3')) {
    if (!$list) {
      $args = array(
      	'posts_per_page'   => 100,
      	'offset'           => 0,
      	'orderby'          => 'menu_order',
      	'order'            => 'DESC',
      	'post_type'        => 'service',
      	'post_status'      => 'publish',
      	'suppress_filters' => true
      );

      $posts = get_posts( $args );
      self::postSort($posts);

    } else {
      $posts = self::getPosts($list);
    }

    return new ServiceList($posts, $title, $blacklist, $classNames, $itemClassNames);
  }

  /**
   * retrieve a list of clients
   * if list is given, get all by id in the list,
   * else load all posts
   *
   *
   * @param  array  $list [description]
   * @param  string  $title [description]
   * @param  array  $blacklist [description]
   * @return [type]       [description]
   */
  public static function getClientsList($list = array(), $title = 'Referenssit', $blacklist = array(), $fullPreviews = true, $footerPreviews = true) {
    if (!$list) {
      $args = array(
      	'posts_per_page'   => 100,
      	'offset'           => 0,
      	'orderby'          => 'menu_order',
      	'order'            => 'DESC',
      	'post_type'        => 'client',
      	'post_status'      => 'publish',
      	'suppress_filters' => true
      );

      $posts = get_posts( $args );
      self::postSort($posts);

    } else {
      $posts = self::getPosts($list);
    }

    return new ClientList($posts, $title, $blacklist, $fullPreviews, $footerPreviews);
  }
  /**
   * retrieve a list of clients
   * if list is given, get all by id in the list,
   * else load all posts
   *
   *
   * @param  array  $list [description]
   * @param  string  $title [description]
   * @param  array  $blacklist [description]
   * @return [type]       [description]
   */
  public static function getPeople($list = array(), $options = array()) {
    if (!$list) {
      $posts = self::getPostsByType('employee');
    } else {
      $posts = self::getPosts($list);
    }

    $options['items'] = $posts;

    return new PersonList($options);
  }
  /**
   * retrieve a list of clients
   * if list is given, get all by id in the list,
   * else load all posts
   *
   *
   * @param  array  $list [description]
   * @param  string  $title [description]
   * @param  array  $blacklist [description]
   * @return [type]       [description]
   */
  public static function getPostsByType($type) {
      $args = array(
      	'posts_per_page'   => 100,
      	'offset'           => 0,
      	'orderby'          => 'menu_order',
      	'order'            => 'DESC',
      	'post_type'        => $type,
      	'post_status'      => 'publish',
      	'suppress_filters' => true
      );

      $posts = get_posts( $args );
      self::postSort($posts);

      return $posts;
  }

  public static function getMinimalClientList() {
    $current_post_id = get_the_ID();
    $args = array(
      'numberposts'	=> -1,
      'post_type'	=> 'client',
      'meta_query'  => array(
        'relation'    => 'AND',
        array(
          'key'    => 'footer_preview',
          'value'	=> '1',
          'compare'     => '=',
        ),
      ),
    );

    $posts = get_posts( $args );
    self::postSort($posts);

    return new MinimalClientList($posts, $current_post_id);
  }


  /**
   * get person post and fields
   * @param  int $postId person post id
   * @return array         merged array
   */
  public static function getPerson($postId) {
    if($postId) {
      $fields = get_fields($postId);
      $post = get_post($postId);

      //$post is object and $fields is an array, cast them both to an array and
      //then to an final merged array
      $merged = (array) array_merge_recursive((array) $fields, (array) $post);

      return $merged;
    }
  }

  public static function getContactInfo() {
      $args = array(
        'posts_per_page'   => 100,
        'offset'           => 0,
        'orderby'          => 'menu_order',
        'order'            => 'DESC',
        'post_type'        => 'contactinfo',
        'post_status'      => 'publish',
        'suppress_filters' => true
      );

      $posts = get_posts( $args );

      foreach($posts as &$post) {
          $fields = get_fields($post->ID);
          $post = (array) array_merge_recursive((array) $fields, (array) $post);
      }

      return $posts;
  }

  public static function getJobs() {
    $args = array(
      'orderby'          => 'menu_order',
      'order'            => 'DESC',
      'post_type'        => 'job',
      'post_status'      => 'publish',
      'suppress_filters' => true
    );

    $posts = get_posts($args);
    self::postSort($posts);

    return $posts;
  }

  public static function getGuideBlock() {
    $guide_visibility = get_field('guide_block_visibility');
    $guide_block_content_order = get_field('guide_block_content_order');
    $guide_title = get_field('guide_title');
    $guide_subtitle = get_field('guide_subtitle');
    $guide_description = get_field('guide_description');
    $guide_image = get_field('guide_image');
    $guide_download_button_text = get_field('guide_download_button_text');
    $guide_download_link = get_field('guide_download_link');

    if ($guide_visibility
        && $guide_block_content_order
        && $guide_title
        && $guide_subtitle
        && $guide_description
        && $guide_image
        && $guide_download_button_text
        && $guide_download_link) {
      $block = new DownloadableGuideBlock(
          $guide_block_content_order,
          $guide_title,
          $guide_subtitle,
          $guide_description,
          $guide_image,
          $guide_download_button_text,
          $guide_download_link);
      return $block->__toString();
    }

    return "";
  }
}
