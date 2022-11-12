$(document).ready(function () {

    var modalOpen = false;

    $('#button__more').on('click',function () {
        $('.header__logo').children('a').attr('href', 'javascript:void(0)');
        modalOpen = true;
        $('.modal').addClass('modal--open');
        $('.home__page').addClass('home__page--blured');
        $('.about__page--img').addClass('home__page--blured');
        $('.content--w').addClass('content--w--hide');
        setTimeout(function () {
            $('.modal__content')
                .addClass('modal__zoom--out')
                .removeClass('modal__with--anim');
        },30);
    });

    $('#button__close').on('click',function () {

        modalOpen = false;

        $('.header__logo').children('a').attr('href', '/');

        $('.home__page').removeClass('home__page--blured');
        $('.about__page--img').removeClass('home__page--blured');
        $('.content--w').removeClass('content--w--hide');
        $('.header').removeClass('hidden');
        setTimeout(function () {
            $('.modal').removeClass('modal--open');

        },100);
        $('.modal__content').removeClass('modal__zoom--out')
            .addClass('modal__with--anim');
    });


    if (window.location.pathname === '/about')
    {

            $('.header__logo').click(function (e) {
                if (modalOpen) {
                    e.preventDefault();
                    $('.home__page').removeClass('home__page--blured');
                    $('.about__page--img').removeClass('home__page--blured');
                    $('.content--w').removeClass('content--w--hide');
                    setTimeout(function () {
                        $('.modal').removeClass('modal--open');

                    }, 100);
                    $('.modal__content').removeClass('modal__zoom--out')
                        .addClass('modal__with--anim');
                }
            });
    }



    $('.product__gall--item').on({

        mouseenter: function () {
            if ($(window).width() > 768 ) {
                $(this).children('.product__img').addClass('img--blured');
                $(this).children('.product__gall--content').addClass('product__gall--content-open');
            }
        },
        mouseleave:function () {
            if ($(window).width() > 768 ) {

                $('.product__img').removeClass('img--blured');
                $('.product__gall--content').removeClass('product__gall--content-open');
            }
        },
        click:function (e) {
            if ($(window).width() <= 768)
            {

                $('.product__gall--content').removeClass('product__gall--content-open');
                $('.product__img').removeClass('img--blured');
                if (!$(e.target).closest('.zoom__icon').length) {
                    $(this).children('.product__img').addClass('img--blured');
                    $(this).children('.product__gall--content').addClass('product__gall--content-open');
                }
            }
        },
        touchstart: function (e) {
            if ($(window).width() <= 768)
            {
                    $('.product__gall--content').removeClass('product__gall--content-open');
                    $('.product__img').removeClass('img--blured');
                if (!$(e.target).closest('.zoom__icon').length) {
                    $(this).children('.product__img').addClass('img--blured');
                    $(this).children('.product__gall--content').addClass('product__gall--content-open');
                }
            }
        }

    });


    $('.zoom__icon').bind('touchstart click',function () {
        var gallImg = $(this).parent('.product__gall--content').siblings('img');
        gallImg.css('opacity', 0);
        if ($(window).width() <= 768)
        {
            $('.product__gall--content').removeClass('product__gall--content-open');

            setTimeout(function () {
                $('.product__gall--modal').addClass('product__gall--modal--open');
            },50)

        }else if ($(window).width() > 768) {

            $('.product__gall--modal').addClass('product__gall--modal--open');
        }
        $('.gall__modal--img').attr('src', gallImg.attr('src'));
        $('#modal__img').css('background-image', 'url('+ gallImg.attr('src') +')')
        $('.header').css('filter', 'blur(15px)');


        $('#modal__title').text($(this).siblings('.product__gall--title').text());
        $('#modal__txt').html($(this).siblings('.product__gall--txt').html());
        $('#modal__footer').text($(this).siblings('.product__gall--foter').text());


        setTimeout(function () {
            $('.product__img').addClass('img--blured');
            $('.product__gall--img-w').addClass('scale');
        },50)
    });

    $('.product__gall--close').click(function () {

        $('.contacts__modal').css('display', '');
        $('.modal__order--done').css('display', '');
        $('.modal__content--full').css('display', '');
        $('#front__banner').removeClass('home__page--blured');
        $('.product__img').removeClass('img--blured');
        $('.product__gall--img-w').removeClass('scale');
        $('#contacts__cont').removeClass('hidden');
        $('.header').css('filter', '');
        $('.header').removeClass('hidden');

        setTimeout(function () {
            $('.product__gall--modal').removeClass('product__gall--modal--open');
            $('.product__gall--item img').css('opacity', 1);

        },50)

    });

    $(window).on('resize', function () {

       if ($(window).width() <= 768)
       {
           $('.product__gall--item').on('click touchstart', function (e) {
               e.preventDefault();
               $(this).children('.product__img').addClass('img--blured');
               if (e.target.closest('div').length !== $('.zoom__icon').length) {
                   // $(this).children('.product__gall--content').addClass('product__gall--content-open');
               }
           });

           $(window).on('click touchstart',function (e) {
              if (e.target.closest('div').length !== $('.product__gall--item').length)
              {
                  $('.product__img').removeClass('img--blured');
              }
           });
       }
    });

    $('#front__banner').owlCarousel({
        items: 1,
        dots:false,
        navigation:false,
        nav:false,
        loop: true,
        pagination: false,
        singleItem: true,
        autoPlay: true,
        autoplayTimeout:5000,
        autoplayHoverPause:false
    });

});
$(window).on('load',function () {
    $('.loader').fadeOut(1000);
});

$(window).bind('load', function () {

    var $grid = $('#items__content').isotope({
        itemSelector: '.product__gall--item'
    });

    $('.content__category--link').on( 'click', function(e) {
        e.preventDefault();
        var filterValue = $(this).data('filter');
        $grid.isotope({ filter: filterValue });
        $('.header__cat--item').removeClass('active');
        $(this).parent('.header__cat--item').addClass('active');

        var elems = $('.product__gall--item'+filterValue+':visible');
        if (elems.length === 1){
            elems.css('width', '100%')
        }else if (elems.length === 2){
            elems.css('width', '50%')
        } else{
            elems.css('width' ,'')
        }
    });

});

$('.open__order').click(function (e) {
   e.preventDefault();
   $('.header').addClass('hidden');
   $('#contacts__cont').addClass('hidden');
   $('#front__banner').addClass('home__page--blured');
   $('.contacts__modal').css('display', 'block')
});

$('#select__recomment--type').click(function () {
    $(this).toggleClass('form__select-open');
    $('.subject--w').toggleClass('mt160');
    $('#recommendation__type').toggle();

    if ($(window).width() <= 768)
    {
        if (!$('.form__products').is('hidden')){
            $('.form__products').css('display','none')
        }
    }
});
if ($(window).width() > 768){
    $('#sm__prods').empty();
}
$('#recommendation__type li label').click(function () {
    $('#select__recomment--type').removeClass('form__select-open');

    if ($(this).data('value') === 'suzulme_teklifi'){
        $('.form__products').css('display', 'block');

        $.get("/ajax/getProducts", function(data, status){
            var $parsedData = JSON.parse(data);
            $('.form__list--prod').empty();
            $.each($parsedData.translations, function (index, data) {
                if (status === 'success'){
                    $('.form__list--prod').append(
                            '<li>' +
                            '<div class="form__panel">' +
                            '<input type="checkbox" name="ContactForm[recommendations][]" value="'+data.id+'" id="suzulme_teklifi'+data.id+'" class="form__radio products__radio">' +
                            '<label for="suzulme_teklifi'+data.id+'" class="product__selection" data-value="'+data.id+'">'+data.name+'</label>' +
                            '</div>' +
                            '</li>'
                        );
                }
            });
        });
    }else{
        $('.form__products').css('display', 'none');
    }
    $('.recommend__type-w')
        .text($(this).text())
        .css('display','flex');
    $('.subject--w').removeClass('mt160');

    $('#recommendation__type').hide();
});

$('#contact-form').submit(function (e) {
   e.preventDefault();
   var $inputsOK = false;

    $('.form__inp').each(function (index, inp) {
        if ($(this).children('.recommend__type-w').length === 0){
           if ($(this).val().length === 0){
               $(this).addClass('shaked')
           }
        }else if ($(this).children('.recommend__type-w').text() === ''){
            $('.form__select').addClass('shaked');
        }else if ($('.form__inp--area').val().length === 0 && $('.form__inp--area').val() === '') {
            $('#subject').addClass('shaked');
        }else{
            $inputsOK = true;
        }
    });

    if ($('.form__inp--area').val().length === 0 && $('.form__inp--area').val() === ''){
        $('#subject').addClass('shaked');
    } else{

        if (!$('#suzulme_teklifi').is(':checked') && $inputsOK) {

                $.ajax({
                    url: '/ajax/contactForm',
                    dataType: 'json',
                    data: $(this).serialize(),
                    type: 'post',
                    complete: function (response) {
                        if (response.status === 200){
                            $('.modal__order--done').css('display', 'flex');
                            $('.modal__content--full').css('display', 'none')
                        }
                    }
                });
        }else{
            if ($('.products__radio:checked').length > 0 && $inputsOK && $('.form__inp--area').val().length === 0 && $('.form__inp--area').val() === ''){

                $.ajax({
                    url: '/ajax/contactForm',
                    dataType: 'json',
                    data: $(this).serialize(),
                    type: 'post',
                    complete: function (response) {
                        if (response.status === 200){
                            $('.modal__order--done').css('display', 'flex');
                            $('.modal__content--full').css('display', 'none')
                        }
                    }
                });
            }else{
                $('#form__list--prod').addClass('shaked')
            }
        }
    }

    setTimeout(function () {
        $('.form__inp').removeClass('shaked');
        $('#form__list--prod').removeClass('shaked');
        $('.form__inp--area').removeClass('shaked');
    },1500);

    $html = '<tr class="information">\n' +
        '                   <td colspan="2">\n' +
        '                      <table class="inner__first-tbl">\n' +
        '                         <tr>\n' +
        '                           <td>${result[0].address}</td>\n' +
        '                         </tr>\n' +
        '                      </table>\n' +
        '                   </td>\n' +
        '                </tr>\n' +
        '                <tr class="tbl__usr-data">\n' +
        '                   <td>\n' +
        '                        <table class="tbl__usr-data">\n' +
        '                              <tr>\n' +
        '                                <td>${result[0].fullname} (${result[0].protocol_id})</td>\n' +
        '                              </tr>\n' +
        '                           </table>\n' +
        '                   </td>\n' +
        '                </tr>\n' +
        '               \n' +
        '                <tr>\n' +
        '                     <table class="tbl__date">\n' +
        '                           <tr>\n' +
        '                             <td>${today}</td>\n' +
        '                           </tr>\n' +
        '                        </table>\n' +
        '                </tr>'
});


function move() {
    var elem = $('#progress__bar');

    var width = 1;
    var id = setInterval(frame,10);
    function frame() {
        if (width >= 100){
            clearInterval(id);
            // elem.classList.remove("animate");
        }
        else{
            width++;
            $('.preloader__logo--w').text(width + ' %');
            elem.css('width' ,width +'%')
        }
    }
}
move();

