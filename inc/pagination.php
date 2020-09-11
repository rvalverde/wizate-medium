<?php

  function wizate_pagination() {
    $big = 999999999; // need an unlikely integer

    if ( is_singular() ) 
      return;

    global $wp_query;

    if ( !$paged )
      $paged = get_query_var('paged');

    if ( !$max_page )
      $max_page = $wp_query->max_num_pages;

    echo paginate_links( array(
      'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link( $big ))),
      'format'     => '?paged=%#%',
      'current'    => max( 1, $paged ),
      'total'      => $max_page,
      'mid_size'   => 1,
      'prev_text'  => __('«'),
      'next_text'  => __('»')
    ));
  }
