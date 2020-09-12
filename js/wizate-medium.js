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

  function comment_open_resize() {
    const width = $(window).width();
    const comments = $(".comments");

    if (width >= 991) {
      comments.stop(true, true).animate({
        width: "toggle"
      }, 400);
    } else {
      comments.stop(true, true).slideDown(400);
    }
  }

  function comment_close_resize() {
    const width = $(window).width();
    const comments = $(".comments");

    if (width >= 991) {
      comments.animate({
        width: "toggle"
      }, 400);
    } else {
      comments.stop(true, true).slideUp();
    }
  }

  function open_comment() {
    const body = $("body");
    const scroll = "scroll-hidden";
    const active = "comments-active";

    body.removeClass(scroll).addClass(active);

    comment_open_resize();

    $(window).resize(function () {
      comment_open_resize();
    });

    if (body.hasClass(active)) {
      body.addClass(scroll);
    }
  }

  function close_comment() {
    const body = $("body");
    const comments = $(".comments");

    body.removeClass("scroll-hidden comments-active");

    comment_close_resize();

    $(window).resize(function () {
      comment_close_resize();
    });

  }

  const offset = $(".content");
  const footer = $(".taxonomy");
  const comments = $(".click-comments");
  const comments_close = $(".comments-close");
  const share = $(".click-share");
  const share_close = $(".share-close");
  const copied = $(".click-copied");

  if (offset.length && footer.length) {

    const scroll_top = offset.offset().top - 400;
    const scroll_bottom = footer.offset().top - 800;

    $(window).scroll(function () {
      const share_fixed = $(".options");

      if ($(this).scrollTop() > scroll_bottom) {
        share_fixed.fadeOut(100);
      } else if ($(this).scrollTop() > scroll_top) {
        share_fixed.fadeIn(400);
      } else {
        share_fixed.fadeOut(100);
      }
    });
  }

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

});