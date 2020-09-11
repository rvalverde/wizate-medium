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

              <div class="content">
                <?php the_content(); ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>