jQuery(document).ready(function ($) {

  let clicked = 0;

  const like = $('.click-like');
  const social = $('.click-social');
  const social_count = $('.social-count');

  /* 
    Data View 
  */
  $.ajax({
    type: "post",
    url: post_ajax,
    data: {
      action: post_view.action,
      post_id: post_id,
      count: post_view.view_count,
      _wpnonce: post_nonce
    },
    success: function (data) {},
    error: function (data) {}
  });

  /* 
    Data Like 
  */
  like.next('span').text(post_like.like_count);
  like.on("click", function () {
    clicked++;

    const like_count = ".like-count";

    if (clicked <= 10) {
      $(this).find(like_count).addClass('active').text(clicked);

      $.ajax({
        type: "POST",
        url: post_ajax,
        data: {
          action: post_like.action,
          post_id: post_id,
          count: post_like.like_count,
          _wpnonce: post_nonce
        },
        success: function (response) {
          like.addClass('active').next('span').text(response);

          setTimeout(function () {
            like.find(like_count).removeClass('active');
          }, 2500);
        },
        error: function (response) {}
      });
    }
  });

  /* 
    Data Social 
  */
  social_count.text(post_share.share_count);
  social.on("click", function () {
    $.ajax({
      type: "POST",
      url: post_ajax,
      data: {
        action: post_share.action,
        post_id: post_id,
        count: post_share.share_count,
        _wpnonce: post_nonce
      },
      success: function (response) {
        social_count.text(response);
      },
      error: function (response) {}
    });
  });
});