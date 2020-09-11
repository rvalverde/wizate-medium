<?php
  
  require_once(get_template_directory() . '/inc/pagination.php');
  require_once(get_template_directory() . '/inc/views.php');
  require_once(get_template_directory() . '/inc/likes.php');
  require_once(get_template_directory() . '/inc/shares.php');
  require_once(get_template_directory() . '/inc/related.php');
  require_once(get_template_directory() . '/inc/comments.php');

  function wizate_remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
  }
  add_action('get_header', 'wizate_remove_admin_login_header');


  function wizate_support_thumbnails() {
    add_theme_support( 'post-thumbnails' );
  }
  add_action( 'after_setup_theme', 'wizate_support_thumbnails' );


  function wizate_excerpt_length( $length ) {
    return 15;
  }
  add_filter( 'excerpt_length', 'wizate_excerpt_length', 999 );


  function wizate_excerpt_more( $more ) {
    return '...';
  }
  add_filter('excerpt_more', 'wizate_excerpt_more');


  function wizate_load_jquery() { 
    wp_enqueue_script( 'jquery' );
  }
  add_action( 'wp_enqueue_scripts', 'wizate_load_jquery' );



  function wizate_statistics_title_column($defaults){
    $defaults['wizate_statistics'] = __('Statistics');
    return $defaults;
  }
  add_filter('manage_posts_columns', 'wizate_statistics_title_column');

  
  function wizate_statistics_content_column($column_name, $id){
    if ( $column_name === 'wizate_statistics' ) {

      $post_id = get_the_ID();
    ?>
      <table class="wizate_statistics_table">
        <tr>
          <td>Views:</td>
          <td><?php echo wizate_get_views($post_id); ?></td>
        </tr>
        <tr>
          <td>Likes:</td>
          <td><?php echo wizate_get_likes($post_id); ?></td>
        </tr>
        <tr>
          <td>Shares:</td>
          <td><?php echo wizate_get_shares($post_id); ?></td>
        </tr>
      </table>
    <?php }
  }
  add_action('manage_posts_custom_column', 'wizate_statistics_content_column', 5, 2);

  
  function wizate_admin_css() { ?>
    <style>
      .wizate_statistics_table td {
        padding: 1px 5px;
      }
    </style>
  <?php }
  add_action('admin_head', 'wizate_admin_css');

    
  function wizate_enqueue_custom_js() {
    wp_enqueue_script('wizate-medium', get_stylesheet_directory_uri().'/js/wizate-medium.js', array(), true, true);
  }
  add_action('wp_enqueue_scripts', 'wizate_enqueue_custom_js');

  
  function wizate_author_name($name) {
    global $post;
    $author = get_the_author_meta('nickname');
    return $author;
  }
  add_filter( 'the_author', 'wizate_author_name' );


  function wizate_script_head() {
    if ( is_single() ) {
      ?>
        <script type='text/javascript'>
          /* <![CDATA[ */
            const post_id = <?php echo get_the_ID(); ?>;
            const post_ajax = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
            const post_nonce = "<?php echo wp_create_nonce( 'my-ajax-nonce' ) ?>";
            const post_view = {
              "action": "wizate_views",
              "view_count": <?php echo get_post_meta(get_the_ID(), 'wizate_views', true); ?>
            };
            const post_like = {
              "action": "wizate_likes",
              "like_count": <?php echo get_post_meta(get_the_ID(), 'wizate_likes', true); ?>
            };
            const post_share = {
              "action": "wizate_shares",
              "share_count": <?php echo get_post_meta(get_the_ID(), 'wizate_shares', true); ?>
            };
          /* ]]> */
        </script>
      <?php
    }
  }
  add_action('wp_head', 'wizate_script_head');
