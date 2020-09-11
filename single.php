<?php
/**
 * @package WordPress
 * @subpackage Medium Theme by Wizate
 */

get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="py-4 py-lg-5">
      <div class="container overflow-hidden">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="px-lg-4">
              <h1 class="mb-4">
                <?php the_title(); ?>
              </h1>

              <div class="d-flex justify-content-between align-items-center font-alternative mb-3">
                <div class="d-flex align-items-center">
                  <div class="avatar">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 48 ), '', '', [ 'extra_attr' => 'itemprop="image"' ] );  ?>
                  </div>
                  <div class="ml-3 small">
                    <div class="mb-n1">
                      <a class="text-gray-100" title="View posts by <?php the_author(); ?>" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                        <?php the_author(); ?>
                      </a>
                    </div>

                    <div class="pt-1 text-gray-200 small">
                      <?php the_time('M j, Y') ?>
                    </div>
                  </div>
                </div>

                <div class="font-alternative d-md-flex align-items-center justify-content-between">
                  <div class="d-flex">
                    <div class="mr-3 d-flex align-items-center cp">
                      <span class="click-like">
                        <i class="icon-favorite"></i>
                        <span class="like-count">1</span>
                      </span>
                      <span class="ml-2 mt-n1 small d-block">
                        0
                      </span>
                    </div>
                    <div class="mr-3 d-flex align-items-center cp">
                      <i class="icon-comments click-comments"></i>
                      <div class="ml-2 mt-n1 small">
                        <?php comments_popup_link('0', '1', '%'); ?>
                      </div>
                    </div>
                    <div class="mr-3 d-flex align-items-center cp">
                      <div class="click-share">
                        <i class="icon-share"></i>
                      </div>
                      <span class="ml-2 mt-n1 small d-block social-count">
                        0
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <?php $imagen = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
              <?php if ( $imagen ) : ?>
                <div class="single-featured mb-4">
                  <img class="" src="<?php echo $imagen[0]; ?>" alt="<?php the_title(); ?>" />
                </div>
              <?php endif; ?>

              <div class="content">
                <?php the_content(); ?>
              </div>

              <div class="taxonomy">
                <?php the_tags( '', ' ', '<br />' ); ?>
              </div>

              <div class="font-alternative d-md-flex align-items-center justify-content-between my-4 py-2">
                <div class="d-flex">
                  <div class="mr-3 d-flex align-items-center cp">
                    <span class="click-like">
                      <i class="icon-favorite"></i>
                      <span class="like-count">1</span>
                    </span>
                    <span class="ml-2 mt-n1 small d-block">
                      0
                    </span>
                  </div>
                  <div class="mr-3 d-flex align-items-center cp">
                    <i class="icon-comments click-comments"></i>
                    <div class="ml-2 mt-n1 small">
                      <?php comments_popup_link('0', '1', '%'); ?>
                    </div>
                  </div>
                  <div class="mr-3 d-flex align-items-center cp">
                    <div class="click-share">
                      <i class="icon-share"></i>
                    </div>
                    <span class="ml-2 mt-n1 small d-block social-count">
                      0
                    </span>
                  </div>
                </div>
              </div>

              <div class="d-flex font-alternative border-top py-4">
                <div class="avatar">
                  <?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 80 ), '', '', [ 'extra_attr' => 'itemprop="image"' ] );  ?>
                </div>
                <div class="ml-4">
                  <div class="author_written">
                    WRITTEN BY
                  </div>
                  <div class="mt-n2">
                    <a class="text-gray-100 font-weight-bold" title="View posts by <?php the_author(); ?>" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                      <?php the_author(); ?>
                    </a>
                  </div>

                  <div class="small text-gray-200">
                    <?php the_author_meta('description'); ?>
                  </div>
                </div>
              </div>

              <?php comments_template(); ?>

            </div>
          </div>
        </div>
      </div>
    </div>

  <?php endwhile; endif; ?>

  <?php echo get_template_part( 'parts/related' ); ?>
  <?php echo get_template_part( 'parts/share' ); ?>
  <?php echo get_template_part( 'parts/options' ); ?>

<?php get_footer(); ?>