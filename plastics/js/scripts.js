
$(document).ready(function () {

    $('#back-to-top').click(function (e) {
        e.preventDefault();
        $.scrollTo($('#top'), 1000, {offset:-100});
    });
    $('.location').click(function (e) {
        e.preventDefault();
        if ($('.menu-toggle').is(":visible")) {
            $('#nav').slideUp('fast');
        }
        $.scrollTo($('#location-anchor'), 1000, {offset:-100});

    });
    $('.community').click(function (e) {
        e.preventDefault();
        if ($('.menu-toggle').is(":visible")) {
            $('#nav').slideUp('fast');
        }
        $.scrollTo($('#community-anchor'), 1000, {offset:-100});
    });
    $('.labor').click(function (e) {
        e.preventDefault();
        if ($('.menu-toggle').is(":visible")) {
            $('#nav').slideUp('fast');
        }
        $.scrollTo($('#labor-anchor'), 1000, {offset:-100});
    });
    $('.cost').click(function (e) {
        e.preventDefault();
        if ($('.menu-toggle').is(":visible")) {
            $('#nav').slideUp('fast');
        }
        $.scrollTo($('#cost-anchor'), 1000, {offset:-100});
    });
     $('.sites').click(function (e) {
        e.preventDefault();
        if ($('.menu-toggle').is(":visible")) {
            $('#nav').slideUp('fast');
        }
        $.scrollTo($('#sites-anchor'), 1000, {offset:-100});
    });
    $('.quality').click(function (e) {
        e.preventDefault();
        if ($('.menu-toggle').is(":visible")) {
            $('#nav').slideUp('fast');
        }
        $.scrollTo($('#quality-anchor'), 1000, {offset:-100});
    });
    $('.ranking').click(function (e) {
        e.preventDefault();
        if ($('.menu-toggle').is(":visible")) {
            $('#nav').slideUp('fast');
        }
        $.scrollTo($('#ranking-anchor'), 1000, {offset:-100});
    });
        $('.menu-toggle').click(function (e) {
        e.preventDefault();
        $('#nav').slideToggle('fast');
    });
        // STICKY NAV
        // change navbar styles on scroll position
        $(window).scroll(function() {
            var scrollPos = $(window).scrollTop();

            if(scrollPos  > 190) {
              if (! $(".top-header").hasClass("scrolled")) {
                $(".top-header").addClass("scrolled");
              }
            } else {
              if ($(".top-header").hasClass("scrolled")) {
                $(".top-header").removeClass("scrolled");
              }
            }
        });

});