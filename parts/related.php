
  <?php $the_query = wizate_related_posts( get_the_ID(), 3 ); ?>
  <?php if ( $the_query->have_posts() ) : ?>
    <div class="container">
      <h2 class="h5 mb-2">Related Posts</h2>
      <div class="border-top py-4">
      
        <div class="row mb-n4 mb-lg-0 py-lg-1">
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php $imagen = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium_large' ); ?>
            <div class="col-lg-4">
              
              <?php if( $imagen ) : ?>
                <div class="image-post mb-3">
                  <a href="<?php the_permalink() ?>" rel="bookmark">
                    <span style="background-image:url('<?php echo $imagen[0]; ?>');"></span>
                  </a>
                </div>
              <?php endif; ?>

              <div class="mb-3 line-height-14">
                <a href="<?php the_permalink() ?>" class="font-weight-bold" rel="bookmark">
                  <?php the_title(); ?>
                </a>
              </div>

              <div class="font-alternative d-flex align-items-center mb-5">
                <div class="author_avatar">
                  <?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 36 ), '', '', [ 'extra_attr' => 'itemprop="image"' ] );  ?>
                </div>
                <div class="ml-3 small">
                  <div class="mb-n1">
                    <a title="View posts by <?php the_author(); ?>" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                      <?php the_author(); ?>
                    </a>
                  </div>

                  <div class="pt-1 text-gray-200 small">
                    <?php the_time('M j, Y') ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>

        </div>
    </div>
  <?php wp_reset_postdata(); endif; ?>
