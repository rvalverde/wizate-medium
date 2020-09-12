<?php
/**
 * @package WordPress
 * @subpackage Medium Theme by Wizate
 */

get_header(); ?>

  <div class="py-4 py-lg-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-11 font-alternative">

          <div class="row my-3 mt-lg-0 mb-lg-5">
            <?php $i=0; while (have_posts()) : the_post(); ?>
              <?php if ($i < 2 ) : ?>
                <div class="col-lg-6 <?php echo ($i == 0) ? 'mb-4 mb-lg-0' : ''; ?>">
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
                  <div class="line-height-14 mb-2">
                    <a href="<?php the_permalink() ?>" class="font-weight-bold" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
                      <?php the_title(); ?>
                    </a>
                  </div>

                  <div class="d-flex justify-content-between">
                    <div class="small">
                      <a class="small" title="View posts by <?php the_author(); ?>" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                        <?php the_author(); ?>
                      </a>

                      <div class="text-gray-200 mt-n2 pt-1">
                        <span class="small"><?php the_time('M j, Y') ?></span>
                      </div>
                    </div>

                    <a href="<?php the_permalink() ?>#respond" class="mr-3 d-flex align-items-center">
                      <i class="icon-comments"></i>
                      <span class="ml-2 mt-n1 small">
                        <?php echo get_comments_number($post->ID); ?>
                      </span>
                    </a>
                  </div>
                </div>
              <?php endif; ?>
            <?php $i++; endwhile; ?>
          </div>

          <div class="row">
            <div class="col-lg-8">
              <?php $i=0; while (have_posts()) : the_post(); ?>
                <?php if ($i > 1 ) : ?>

                  <div class="d-md-flex flex-row-reverse my-4">

                    <?php $imagen = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' ); if( $imagen ) : ?>
                      <div class="float-right float-md-none ml-4 ml-md-3">
                        <a href="<?php the_permalink() ?>" rel="bookmark">
                          <img src="<?php echo $imagen[0]; ?>" width="150" alt="<?php the_title(); ?>" />
                        </a>
                      </div>
                    <?php endif; ?>

                    <div class="">
                      <div class="text-uppercase mb-1 small">
                        <span class="small text-gray-200">Posted in <?php the_category(', ') ?></span>
                      </div>
                      <div class="line-height-14 mb-2">
                        <a href="<?php the_permalink() ?>" class="font-weight-bold" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
                          <?php the_title(); ?>
                        </a>
                      </div>

                      <div class="small mb-2 text-gray-200">
                        <?php the_excerpt_rss(); ?>
                      </div>

                      <div class="d-flex justify-content-between">
                        <div class="small">
                          <a class="small" title="View posts by <?php the_author(); ?>" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                            <?php the_author(); ?>
                          </a>

                          <div class="text-gray-200 mt-n2 pt-1">
                            <span class="small"><?php the_time('M j, Y') ?></span>
                          </div>
                        </div>

                        <a href="<?php the_permalink() ?>#respond" class="mr-3 d-flex align-items-center cp">
                          <i class="icon-comments"></i>
                          <span class="ml-2 mt-n1 small">
                            <?php echo get_comments_number($post->ID); ?>
                          </span>
                        </a>
                      </div>
                    </div>

                  </div>

                <?php endif; ?>
              <?php $i++; endwhile; ?>
            </div>

            <div class="col-lg-4">
              <div class="mt-4 mt-lg-0 pl-lg-5">
                <?php echo get_template_part( 'parts/popular' ); ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>