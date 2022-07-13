//js-tab element where click user

//js-tabs elements where show and hide

$('.js-tab').on('click', function() {
    const idElememt = $(this).attr('id');
    $('.js-tabs').removeClass('active');
     console.log(idElememt);
    $('.' + idElememt).addClass('active');
});