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

            <div class="search-form mb-5">
              <form role="search" action="<?php echo get_option('home'); ?>/" method="get">
                <label for="search-form" class="d-none"><?php echo _x( 'Search for:', 'label' ) ?></label>
                <input type="text" name="s" id="search-form" value="<?php the_search_query(); ?>" />
              </form>
            </div>

            <h1 class="h4 font-alternative mb-n4 font-weight-bold">
              Search results
            </h1>

            <?php echo get_template_part( 'parts/loop' ); ?>

          </div>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>