"use strict";

function modalShare(url) {
  const dualScreenLeft =
    window.screenLeft != undefined ? window.screenLeft : screen.left;
  const dualScreenTop =
    window.screenTop != undefined ? window.screenTop : screen.top;

  const width = window.innerWidth ?
    window.innerWidth :
    document.documentElement.clientWidth ?
    document.documentElement.clientWidth :
    screen.width;

  const height = window.innerHeight ?
    window.innerHeight :
    document.documentElement.clientHeight ?
    document.documentElement.clientHeight :
    screen.height;

  const left = width / 2 - 300 + dualScreenLeft;
  const top = height / 2 - 300 + dualScreenTop;
  const newWindow = window.open(
    url,
    "_blank",
    "scrollbars=yes, width=600, height=600, top=" + top + ", left=" + left
  );

  if (window.focus) {
    newWindow.focus();
  }
}

jQuery(document).ready(function ($) {

  function open_comment() {
    const body = $("body");
    const comments = $(".comments");
    const scroll = "scroll-hidden";
    const active = "comments-active";

    body.removeClass(scroll).addClass(active);
    comments.stop(true, true).animate({
      width: "toggle"
    }, 400);

    if (body.hasClass(active)) {
      body.addClass(scroll);
    }
  }

  function close_comment() {
    const body = $("body");
    const comments = $(".comments");

    body.removeClass("scroll-hidden comments-active");
    comments.animate({
      width: "toggle"
    }, 400);
  }

  const offset = $(".content").offset().top - 400;
  const footer = $(".taxonomy").offset().top - 800;
  const comments = $(".click-comments");
  const comments_close = $(".comments-close");
  const share = $(".click-share");
  const share_close = $(".share-close");
  const copied = $(".click-copied");
  const like = $('.click-like');
  const social = $('.click-social');
  const social_count = $('.social-count');

  let clicked = 0;

  $(window).scroll(function () {
    const share_fixed = $(".options");

    if ($(this).scrollTop() > footer) {
      share_fixed.fadeOut(100);
    } else if ($(this).scrollTop() > offset) {
      share_fixed.fadeIn(400);
    } else {
      share_fixed.fadeOut(100);
    }
  });

  comments.on("click", function () {
    open_comment();
  });

  if (window.location.hash) {
    open_comment();
  }

  comments_close.on("click", function () {
    close_comment();
  });

  share.on("click", function () {
    const body = $("body");
    const scroll = "scroll-hidden";
    const content = $(".share");

    body.addClass(scroll);
    content.fadeIn(400);
  });

  share_close.on("click", function () {
    const body = $("body");
    const scroll = "scroll-hidden";
    const content = $(".share");

    body.removeClass(scroll);
    content.fadeOut(100);
  });

  copied.on("click", function () {
    const temp = $("<input>");
    const url = $(this).attr("data-url");
    const body = $("body");

    body.append(temp);

    temp.val(url).select();
    document.execCommand("copy");
    temp.remove();
  });

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