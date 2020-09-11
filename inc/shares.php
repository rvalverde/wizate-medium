<?php
  
  function wizate_get_shares($post_id){
    $count_key  = 'wizate_shares';
    $count      = get_post_meta($post_id, $count_key, true);

    if ( $count == '' ) {
      delete_post_meta($post_id, $count_key);
      add_post_meta($post_id, $count_key, '0');
      return "0";
    }

    return $count;

    wp_die();
  }

  function wizate_set_shares($post_id) {
    $count_key  = 'wizate_shares';
    $post_id    = $_POST['post_id'];
    $count      = get_post_meta($post_id, $count_key, true);

    if ( $count == '' ) {
      $count = 0;
      delete_post_meta($post_id, $count_key);
      add_post_meta($post_id, $count_key, '0');
    } else {
      $count++;
      update_post_meta($post_id, $count_key, $count);
    }

    echo $count;

    wp_die();
  }
  
  add_action('wp_ajax_wizate_shares', 'wizate_set_shares');
  add_action('wp_ajax_nopriv_wizate_shares', 'wizate_set_shares');
