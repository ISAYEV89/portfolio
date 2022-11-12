/* DOCUMENT INFORMATION
 - Document: Theme_Name
 - Version:  1.0.0
 - Client:   Client_Name
 - Author:   Emin Azeroglu
 */

$(function () {

    /* Only Number */
    $('body').on('input', '.only-number', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    /* Input Mask */
    $(document).ready(function () {
        $('[data-mask]').inputmask({'mask': '\\9\\94 99 999 99 99'});
    });

    $('.datepicker').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    });

    $('.select2').select2();

    $('.scrollbar-macosx').scrollbar();

    ///// scroll page

    $('#fullpage').fullpage({
        navigation: true,
        navigationPosition: 'left',
        navigationTooltips: ['section-1', 'section-2', 'section-3', 'section-4', 'section-5', 'section-6', 'section-7', 'section-8'],
        showActiveTooltip: true,
        slidesNavigation: true,
        slidesNavPosition: 'bottom',
        controlArrows: false,
    });


    $('.fp-show-active').css('margin-top', 0);
    $('.fp-nav-list').children('li').text('');
    $('.fp-nav-list').children('li:first-child').append('<a href="" class="active"><span></span></a>');
    $('.fp-nav-list').children('li').not(':first-child').append('<a href="" ><span></span></a>');

    $('.fp-nav-list').find('span').css({
        width: '11px',
        height: '11px',
        'border-radius': '50%',
        //color: 'white',
        display: 'inline-block',
        zIndex: '101',
        border: '1px solid white',
    });


    ///// page number

    $('.pageNumber').click(function () {
        var index = $(this).parents('.section').index() + 1;
        $(this).text('0' + index);
    });

    $('.pageNumber').click();


    /////////// careers  accordion

    $('.careers__item').click(function () {
        $(this).children('.careers__content').slideToggle(500);
        $(this).toggleClass('active');

        $(this).siblings().removeClass('active');
        $(this).siblings().children('.careers__content').slideUp();

        $(this).parent().siblings().find('.careers__content').slideUp();
        $(this).parent().siblings().find('.careers__item').removeClass('active');
    });

    ///// menu blog

    $('.menu-blog').click(function (e) {
        e.preventDefault();
        $('.menu').slideToggle(500);
        $('body').addClass('overflow-hidden');
    });

    $('.menu__close').click(function (e) {
        $('.menu').slideToggle(500);
        $('body').removeClass('overflow-hidden');
    })

    ////// index prev-next button




});
