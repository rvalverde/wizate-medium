<?php

  function wizate_related_posts( $post_id, $count ) {

    $terms = get_the_terms( $post_id, 'category' );

    if ( empty( $terms ) ) $terms = array();

    $term_list = wp_list_pluck( $terms, 'slug' );

    $related_args = array(
      'post_type'       => 'post',
      'posts_per_page'  => $count,
      'post_status'     => 'publish',
      'post__not_in'    => array( $post_id ),
      'orderby'         => 'rand',
      'tax_query' => array(
        'relation' => 'OR',
        array(
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => $term_list
        ),
        array(
          'taxonomy' => 'post_tag',
          'field' => 'slug',
          'terms' => $term_list
        ),
      ),
    );

    return new WP_Query( $related_args );
  }
