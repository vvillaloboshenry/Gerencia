
$("#ul-menu-list li").click(function () {
    $('.box').hide().eq($(this).index()).show();
});

$('.selectpicker').selectpicker({
    style: 'btn-default',
    size: 10
});
function limpiar() {
    $(':input').iCheck('uncheck');
    $(':input').not(':button, :submit, :reset, :hidden').not('‌​:checkbox, :radio, select').val('');
    $('.selectpicker').val('');
    $('.selectpicker').selectpicker('refresh');
}

function limpiar_() {
    $(':input').not(':button, :submit, :reset, :hidden').not('‌​:checkbox, :radio, select').val('');
    $('.selectpicker').val('');
    $('.selectpicker').selectpicker('refresh');
}