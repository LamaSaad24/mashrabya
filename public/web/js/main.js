$('.search-button').on('click', '.search-toggle', function(e) {
    var selector = $(this).data('selector');

    $(selector).toggleClass('show').find('.search-input').focus();
    $(this).toggleClass('active');

    e.preventDefault();
});


// change background color 
$(document).scroll(function() {
    $(".go-to-top").toggleClass("show", $(this).scrollTop() > 200)
});