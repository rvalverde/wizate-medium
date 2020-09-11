<?php
/**
 * @package WordPress
 * @subpackage Medium Theme by Wizate
 */

get_header(); ?>

  <div class="py-4 py-lg-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7 font-alternative">
          <div class="px-lg-3">

            <h1 class="h4 font-alternative mb-n4 font-weight-bold">
              <?php the_archive_title(); ?>
            </h1>
            
            <?php echo get_template_part( 'parts/loop' ); ?>

          </div>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>