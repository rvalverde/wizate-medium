<?php
/**
 * @package WordPress
 * @subpackage Medium Theme by Wizate
 */

get_header(); ?>

    <div class="py-4 py-lg-5">
      <div class="container">
              
        <div class="center-vert">
          <div class="py-lg-5">
            <h1 class="mb-4">
              Error 404
            </h1>

            <div class="content">
              Not Found
            </div>

            <div class="pt-5">
              <a href="<?php echo get_option('home'); ?>/">
                &laquo; Go Home
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>

<?php get_footer(); ?>