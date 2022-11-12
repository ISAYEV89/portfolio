$(document).ready(function () {

    $('.blogGallery').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    $('.search__open').click(function () {
        $('.search__input').slideToggle();
        let checkClass = $(this).hasClass('sprite--search-icon');
        if (checkClass) {
            $(this).removeClass('sprite--search-icon').addClass('sprite--search-close')
        } else {
            $(this).removeClass('sprite--search-close').addClass('sprite--search-icon')
        }
    });

    $('.sprite--search-icon').click(function () {
        $('.search__input').focus();
    });

    $('.search__input').focus(function () {
        $(this).parent('.search').addClass('active');
    });

    $('.search__input').blur(function () {
        $(this).parent('.search').removeClass('active');
    });


    ///////////////////// date today

    var monthNameAz = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'İyun', 'İyul', 'Avqust', 'Sentyabr', 'Oktyabr', 'Noyabr', 'Dekabr'];
    var weekDayNameAz = ['Bazar ertəsi', 'Çərşənbə axşamı', 'Çərşənbə', 'Cümə axşamı', 'Cümə', 'Şənbə', 'Bazar'];

    var today = new Date();
    var month = today.getMonth();
    var day = today.getDate();
    var weekDay = today.getDay() - 1;

    var dayToday = day + ' ' + monthNameAz[month] + ', ' + weekDayNameAz[weekDay];

    $('.header__top-date').text(dayToday);


    //////////////////////

    $('.dropdown-menu__link').mouseenter(function () {
        $(this).addClass('active');
        $(this).parent().siblings().children().removeClass('active');

        var dataMenuValue = $(this).attr('data-menu');
        var menuNumber = '.menu' + dataMenuValue;
        $(menuNumber).removeClass('dropdownMenu');
        $(menuNumber).siblings().addClass('dropdownMenu');

    });

});
