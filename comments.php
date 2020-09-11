<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

  <div class="comments font-alternative">
    <div class="comments-wrapper">

      <?php if ( comments_open() ) : ?>

        <div class="d-flex align-items-center">
          <h2 id="comments" class="h4 mb-0 w-100">
            <?php comments_number('No Responses', 'Response (1)', 'Responses (%)' );?>
          </h2>
          <div class="comments-close h4 mb-0 cp">
            <i class="icon-close"></i>
          </div>
        </div>

        <div id="respond" class="w-100">

          <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
            <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
          <?php else : ?>

            <div class="comments-form mini mt-3">
              <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

                <div class="mb-3">
                  <?php if ( is_user_logged_in() ) : ?>
                    <div>
                      <span>Logged in as</span>
                      <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
                        <?php echo $user_identity; ?>
                      </a> 
                      <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">
                        Log out &raquo;
                      </a>
                    </div>
                  <?php else : ?>
                    <div class="d-sm-flex">
                      <div class="border-bottom w-80 mr-3">
                        <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" placeholder="Name" <?php if ($req) echo "aria-required='true'"; ?> />
                        <label for="author" class="d-none">
                          <small>Name <?php if ($req) echo "(required)"; ?></small>
                        </label>
                      </div>

                      <div class="border-bottom w-100 ml-3">
                        <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" placeholder="Email" <?php if ($req) echo "aria-required='true'"; ?> />
                        <label for="email" class="d-none">
                          <small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small>
                        </label>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>

                <textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" placeholder="Message"></textarea>

                <div class="mt-2 mb-n1">
                  <div class="d-flex align-items-center justify-content-end">
                    <div class="mini">
                      <?php cancel_comment_reply_link( __( 'Cancel Reply', 'textdomain' ) ); ?>
                    </div>
                    <div class="ml-3">
                      <input name="submit" type="submit" id="submit" tabindex="5" class="respond" value="Respond" />
                      <?php comment_id_fields(); ?>
                    </div>
                  </div>
                  <?php do_action('comment_form', $post->ID); ?>
                </div>

              </form>
            </div>

          <?php endif; // If registration required and not logged in ?>
        </div>

      <?php endif; // if you delete this the sky will fall on your head ?>

      <div class="mt-4 pt-1">
        <?php if ( have_comments() ) : ?>
          <?php wp_list_comments('callback=wizate_comments&end-callback=wizate_comments_close'); ?>
        <?php else : // this is displayed if there are no comments so far ?>

          <?php if ( comments_open() ) : ?>
            <!-- If comments are open, but there are no comments. -->

          <?php else : // comments are closed ?>
            <!-- If comments are closed. -->
            <p class="nocomments">Comments are closed.</p>

          <?php endif; ?>
        
        <?php endif; ?>
      </div>

    </div>
  </div>
