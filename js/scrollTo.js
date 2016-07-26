(function($) {
    $.fn.goTo = function() {
        $('html, body').animate({
            scrollTop: ($(this).offset().top - 70) + 'px'
        }, 'slow');
        return this; // for chaining...
    };
})(jQuery);

