<?php

    $args = array( 
      'posts_per_page' => 10, 
      'meta_key' => 'wizate_post_views_count', 
      'orderby' => 'meta_value_num', 
      'order' => 'DESC'
    ); $popular = new WP_Query( $args );

?>

  <?php if ( $popular->have_posts() ) : ?>
    <h2 class="h5 mb-2 font-alternative font-weight-bold">Popular Posts</h2>
    <div class="border-top popular">
      <?php while ( $popular->have_posts() ) : $popular->the_post(); ?>
        <div class="my-3">
          <div class="ml-3">
            <div class="small font-alternative line-height-14 mb-0">
              <a href="<?php the_permalink() ?>" class="text-gray-100 font-weight-bold" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
                <?php the_title(); ?>
              </a>
            </div>
            <div class="small">
              <a class="text-gray-100 small" title="View posts by <?php the_author(); ?>" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?php the_author(); ?>
              </a>

              <div class="text-gray-200 mt-n2 pt-1">
                <span class="small"><?php the_time('M j, Y') ?></span>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php wp_reset_postdata(); endif; ?>
