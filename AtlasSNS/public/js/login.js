
// dropdownを動かすJS
$(function () {
  $(".dropdown__btn").click(function () {
    $("ul").fadeToggle("open");
  });
});

// dropdownボタン
$(function () {
  $(".dropdown__btn").click(function () {
    $(this).toggleClass('selected');
  });
});

//モーダル
$(function () {
  $('.js-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var post = $(this).attr('post'); //投稿いれた
    $('.retweet').val(post);
    var id = $(this).attr('id'); //idいれた
    $('.retweet-id').val(id);
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
