<?php

  $title = get_the_title();
  $title_without_space = rawurlencode($title);

  $permalink = get_the_permalink();
  $permalink_without_space = rawurlencode($permalink);

?>

  <div class="share font-alternative">
    <div class="d-flex align-items-center justify-content-center py-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 position-relative py-5">
            <div class="share-wrapper">
              <div class="share-close text-right h3 cp mb-0">
                <i class="icon-close"></i>
              </div>
              <ul class="m-0 p-0">
                <li>
                  <a 
                    href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $permalink; ?>" 
                    target="_blank" 
                    onclick="modalShare(this.href);" 
                    rel="nofollow noopener noreferrer"
                    class="button click-social"
                  >
                    <i class="icon-facebook mr-2 pr-1"></i> 
                    <span>Facebook</span>
                  </a>
                </li>
                <li>
                  <a 
                    href="https://linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink; ?>&amp;title=<?php echo $title_without_space; ?>" 
                    target="_blank" 
                    onclick="modalShare(this.href);" 
                    rel="nofollow noopener noreferrer" 
                    class="button click-social"
                  >
                    <i class="icon-linkedin mr-2 pr-1"></i> 
                    <span>Linkedin</span>
                  </a>
                </li>
                <li>
                  <a 
                    href="https://twitter.com/intent/tweet?url=<?php echo $permalink; ?>&text=<?php echo $title_without_space; ?>" 
                    target="_blank" 
                    onclick="modalShare(this.href);" 
                    rel="nofollow noopener noreferrer" 
                    class="button click-social"
                  >
                    <i class="icon-twitter mr-2 pr-1"></i> 
                    <span>Twitter</span>
                  </a>
                </li>
                <li>
                  <a 
                    href="https://wa.me/?text=<?php echo $title_without_space; ?>+<?php echo $permalink_without_space; ?>" 
                    target="_blank" 
                    rel="nofollow noopener noreferrer" 
                    class="button click-social"
                  >
                    <i class="icon-whatsapp mr-2 pr-1"></i> 
                    <span>WhatsApp</span>
                  </a>
                </li>
                <li>
                  <button 
                    data-url="<?php echo $permalink; ?>" 
                    class="button click-copied click-social"
                  >
                    <i class="icon-link mr-2 pr-1"></i> 
                    <span>Link</span>
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
