
$(document).on('change', '.package_test', function() {
    var target = $(this).data('target');
    var show = $("option:selected", this).data('show');
    $(target).children().addClass('hide');
    $(show).removeClass('hide');
});

$(document).ready(function(){
    $('.package_test').trigger('change');
});
