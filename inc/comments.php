<?php

	function wizate_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'div-comment';
		} else {
			$tag = 'div';
			$add_below = 'div-comment';
		}

		?>
		<<?php echo $tag ?> <?php comment_class('border-bottom pb-4 mb-4', empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
      <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        
        <div class="d-flex align-items-center mb-3">
          <div class="mr-3">
            <?php echo get_avatar( $comment, 32, '', 'Author’s gravatar' ); ?>
          </div>
          <div class="">
            <div>
              <a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author">
                <?php comment_author(); ?>
              </a>
            </div>
            <time class="small text-gray-200 mt-n2 d-block pt-1" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished">
              <?php comment_date('M j, Y') ?> - <?php comment_time() ?>
            </time>
          </div>
        </div>
        
        <div class="comment-author-content" itemprop="text">
          <?php if ($comment->comment_approved == '0') : ?>
            <p class="comment-meta-item">Your comment is awaiting moderation.</p>
          <?php endif; ?>
          
          <?php comment_text() ?>
        </div>

        <div class="d-flex mt-n2">
          <?php 
          
            comment_reply_link( array_merge( $args, 
              array (
                'add_below' => $add_below,
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
                'before'    => '<div class="reply">',
                'after'     => '</div>'
              )
            ));

          ?>
          <?php edit_comment_link('<p class="mb-0">Edit this comment</p>',' <span class="mx-2">|</span> ',''); ?>
        </div>
      </div>
		<?php }

	// end of awesome semantic comment

	function wizate_comments_close() {
		echo '</div>';
  }
