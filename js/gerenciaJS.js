
$("#ul-menu-list li").click(function () {
    $('.box').hide().eq($(this).index()).show();
});

$('.selectpicker').selectpicker({
    style: 'btn-default',
    size: 10
});