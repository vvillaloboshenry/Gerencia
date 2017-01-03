
$("#ul-menu-list li").click(function () {
    $('.box').hide().eq($(this).index()).show();
});
