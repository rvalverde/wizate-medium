  
  <?php while (have_posts()) : the_post(); ?>
    <div class="mt-5 border-top pt-5">

      <div class="font-alternative d-flex align-items-center mb-4">
        <div class="author_avatar">
          <?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 48 ), '', '', [ 'extra_attr' => 'itemprop="image"' ] );  ?>
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

      <?php $imagen = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium_large' ); if( $imagen ) : ?>
        <div class="image-post mb-3">
          <a href="<?php the_permalink() ?>" rel="bookmark">
            <span style="background-image:url('<?php echo $imagen[0]; ?>');"></span>
          </a>
        </div>
      <?php endif; ?>

      <div class="text-uppercase mb-1 small">
        <span class="small text-gray-200">Posted in <?php the_category(', ') ?></span>
      </div>

      <div class="line-height-14 h4 font-alternative mb-2">
        <a href="<?php the_permalink() ?>" class="font-weight-bold" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
          <?php the_title(); ?>
        </a>
      </div>

      <div class="small mb-2 text-gray-200">
        <?php the_excerpt_rss(); ?>
      </div>

      <div class="small">
        <a href="<?php the_permalink() ?>" class="text-gray-200" rel="bookmark">
          Read more...
        </a>
      </div>
      
    </div>
  <?php endwhile; ?>

  <div class="pagination border-top mt-5 pt-4">
    <?php wizate_pagination(); ?>
  </div>
  